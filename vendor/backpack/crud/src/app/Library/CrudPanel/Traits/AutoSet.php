<?php

namespace Backpack\CRUD\app\Library\CrudPanel\Traits;

trait AutoSet
{
    /**
     * For a simple CRUD Panel, there should be no need to add/define the fields.
     * The public columns in the database will be converted to be fields.
     *
     * @return void
     */
    public function setFromDb()
    {
        if (! $this->driverIsMongoDb()) {
            $this->setDoctrineTypesMapping();
            $this->getDbColumnTypes();
        }

        array_map(function ($field) {
            $new_field = [
                'name'       => $field,
                'label'      => $this->makeLabel($field),
                'value'      => null,
                'default'    => isset($this->autoset['db_column_types'][$field]['default']) ? $this->autoset['db_column_types'][$field]['default'] : null,
                'type'       => $this->inferFieldTypeFromDbColumnType($field),
                'values'     => [],
                'attributes' => [],
                'autoset'    => true,
            ];

            if (! isset($this->fields()[$field])) {
                $this->addField($new_field);
            }

            if (! in_array($field, $this->model->getHidden()) && ! in_array($field, $this->columns())) {
                $this->addColumn([
                    'name'    => $field,
                    'label'   => $this->makeLabel($field),
                    'type'    => $this->inferFieldTypeFromDbColumnType($field),
                    'autoset' => true,
                ]);
            }
        }, $this->getDbColumnsNames());

        unset($this->autoset);
    }

    /**
     * Get all columns from the database for that table.
     *
     * @return array
     */
    public function getDbColumnTypes()
    {
        $dbColumnTypes = [];

        foreach ($this->getDbTableColumns() as $key => $column) {
            $column_type = $column->getType()->getName();
            $dbColumnTypes[$column->getName()]['type'] = trim(preg_replace('/\(\d+\)(.*)/i', '', $column_type));
            $dbColumnTypes[$column->getName()]['default'] = $column->getDefault();
        }

        $this->autoset['db_column_types'] = $dbColumnTypes;

        return $dbColumnTypes;
    }

    /**
     * Get all columns in the database table.
     *
     * @return array
     */
    public function getDbTableColumns()
    {
        if (isset($this->autoset['table_columns']) && $this->autoset['table_columns']) {
            return $this->autoset['table_columns'];
        }

        $conn = $this->model->getConnection();
        $table = $conn->getTablePrefix().$this->model->getTable();
        $columns = $conn->getDoctrineSchemaManager()->listTableColumns($table);

        $this->autoset['table_columns'] = $columns;

        return $this->autoset['table_columns'];
    }

    /**
     * Infer a field type, judging from the database column type.
     *
     * @param string $field Field name.
     *
     * @return string Field type.
     */
    protected function inferFieldTypeFromDbColumnType($fieldName)
    {
        if ($fieldName == 'password') {
            return 'password';
        }

        if ($fieldName == 'email') {
            return 'email';
        }

        if (is_array($fieldName)) {
            return 'text'; // not because it's right, but because we don't know what it is
        }

        $dbColumnTypes = $this->getDbColumnTypes();

        if (! isset($dbColumnTypes[$fieldName])) {
            return 'text';
        }

        switch ($dbColumnTypes[$fieldName]['type']) {
            case 'int':
            case 'integer':
            case 'smallint':
            case 'mediumint':
            case 'longint':
                return 'number';

            case 'string':
            case 'varchar':
            case 'set':
                return 'text';

            // case 'enum':
            //     return 'enum';
            // break;

            case 'boolean':
                return 'boolean';

            case 'tinyint':
                return 'active';

            case 'text':
            case 'mediumtext':
            case 'longtext':
                return 'textarea';

            case 'date':
                return 'date';

            case 'datetime':
            case 'timestamp':
                return 'datetime';

            case 'time':
                return 'time';

            case 'json':
                return 'table';

            default:
                return 'text';
        }

        return 'text';
    }

    // Fix for DBAL not supporting enum
    public function setDoctrineTypesMapping()
    {
        $types = ['enum' => 'string'];
        $platform = $this->getSchema()->getConnection()->getDoctrineConnection()->getDatabasePlatform();
        foreach ($types as $type_key => $type_value) {
            if (! $platform->hasDoctrineTypeMappingFor($type_key)) {
                $platform->registerDoctrineTypeMapping($type_key, $type_value);
            }
        }
    }

    /**
     * Turn a database column name or PHP variable into a pretty label to be shown to the user.
     *
     * @param string $value The value.
     *
     * @return string The transformed value.
     */
    public function makeLabel($value)
    {
        if (isset($this->autoset['labeller']) && is_callable($this->autoset['labeller'])) {
            return ($this->autoset['labeller'])($value);
        }

        return trim(mb_ucfirst(str_replace('_', ' ', preg_replace('/(_id|_at|\[\])$/i', '', $value))));
    }

    /**
     * Alias to the makeLabel method.
     */
    public function getLabel($value)
    {
        return $this->makeLabel($value);
    }

    /**
     * Change the way labels are made.
     *
     * @param callable $labeller A function that receives a string and returns the formatted string, after stripping down useless characters.
     *
     * @return self
     */
    public function setLabeller(callable $labeller)
    {
        $this->autoset['labeller'] = $labeller;

        return $this;
    }

    /**
     * Get the database column names, in order to figure out what fields/columns to show in the auto-fields-and-columns functionality.
     *
     * @return array Database column names as an array.
     */
    public function getDbColumnsNames()
    {
        $fillable = $this->model->getFillable();

        if ($this->driverIsMongoDb()) {
            $columns = $fillable;
        } else {
            // Automatically-set columns should be both in the database, and in the $fillable variable on the Eloquent Model
            $columns = $this->model->getConnection()->getSchemaBuilder()->getColumnListing($this->model->getTable());

            if (! empty($fillable)) {
                $columns = array_intersect($columns, $fillable);
            }
        }

        // but not updated_at, deleted_at
        return array_values(array_diff($columns, [$this->model->getKeyName(), $this->model->getCreatedAtColumn(), $this->model->getUpdatedAtColumn(), 'deleted_at']));
    }
}
