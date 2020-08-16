<?php

namespace Backpack\CRUD\app\Models\Traits;

use DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;

/*
|--------------------------------------------------------------------------
| Methods for working with relationships inside select/relationship fields.
|--------------------------------------------------------------------------
*/
trait HasRelationshipFields
{
    /**
     * Register aditional types in doctrine schema manager for the current connection.
     *
     * @return DB
     */
    public function getConnectionWithExtraTypeMappings()
    {
        $instance = new self;

        $conn = DB::connection($instance->getConnectionName());

        // register the enum, json and jsonb column type, because Doctrine doesn't support it
        $conn->getDoctrineSchemaManager()->getDatabasePlatform()->registerDoctrineTypeMapping('enum', 'string');
        $conn->getDoctrineSchemaManager()->getDatabasePlatform()->registerDoctrineTypeMapping('json', 'json_array');
        $conn->getDoctrineSchemaManager()->getDatabasePlatform()->registerDoctrineTypeMapping('jsonb', 'json_array');

        return $conn;
    }

    /**
     * Get the model's table name, with the prefix added from the configuration file.
     *
     * @return string Table name with prefix
     */
    public function getTableWithPrefix()
    {
        $prefix = Config::get('database.connections.'.$this->getConnectionName().'.prefix');
        $tableName = $this->getTable();

        return $prefix.$tableName;
    }

    /**
     * Get the column type for a certain db column.
     *
     * @param  string $columnName Name of the column in the db table.
     * @return string             Db column type.
     */
    public function getColumnType($columnName)
    {
        $conn = $this->getConnectionWithExtraTypeMappings();
        $table = $this->getTableWithPrefix();

        return $conn->getSchemaBuilder()->getColumnType($table, $columnName);
    }

    /**
     * Checks if the given column name is nullable.
     *
     * @param string $column_name The name of the db column.
     * @return bool
     */
    public static function isColumnNullable($column_name)
    {
        // create an instance of the model to be able to get the table name
        $instance = new static();

        $conn = $instance->getConnectionWithExtraTypeMappings();
        $table = $instance->getTableWithPrefix();

        // MongoDB columns are alway nullable
        if ($conn->getConfig()['driver'] === 'mongodb') {
            return true;
        }

        try {
            // check if the column exists in the database
            $column = $conn->getDoctrineColumn($table, $column_name);
            // check for NOT NULL
            $notNull = $column->getNotnull();
            // return the value of nullable (aka the inverse of NOT NULL)
            return ! $notNull;
        } catch (\Exception $e) {
            return true;
        }
    }
}
