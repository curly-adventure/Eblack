<?php

namespace Backpack\Generators\Console\Commands;

use Illuminate\Console\GeneratorCommand;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class CrudControllerBackpackCommand extends GeneratorCommand
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'backpack:crud-controller';

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'backpack:crud-controller {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate a Backpack CRUD controller';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Controller';

    /**
     * Get the destination class path.
     *
     * @param string $name
     *
     * @return string
     */
    protected function getPath($name)
    {
        $name = str_replace($this->laravel->getNamespace(), '', $name);

        return $this->laravel['path'].'/'.str_replace('\\', '/', $name).'CrudController.php';
    }

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return __DIR__.'/../stubs/crud-controller.stub';
    }

    /**
     * Get the default namespace for the class.
     *
     * @param string $rootNamespace
     *
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace.'\Http\Controllers\Admin';
    }

    /**
     * Replace the table name for the given stub.
     *
     * @param string $stub
     * @param string $name
     *
     * @return string
     */
    protected function replaceNameStrings(&$stub, $name)
    {
        $table = Str::plural(ltrim(strtolower(preg_replace('/[A-Z]/', '_$0', str_replace($this->getNamespace($name).'\\', '', $name))), '_'));

        $stub = str_replace('DummyTable', $table, $stub);
        $stub = str_replace('dummy_class', strtolower(str_replace($this->getNamespace($name).'\\', '', $name)), $stub);

        return $this;
    }

    protected function getAttributes($model)
    {
        $attributes = [];
        $model = new $model;

        // if fillable was defined, use that as the attributes
        if (! count($model->getFillable())) {
            $attributes = $model->getFillable();
        } else {
            // otherwise, if guarded is used, just pick up the columns straight from the bd table
            $attributes = \Schema::getColumnListing($model->getTable());
        }

        return $attributes;
    }

    /**
     * Replace the table name for the given stub.
     *
     * @param string $stub
     * @param string $name
     *
     * @return string
     */
    protected function replaceSetFromDb(&$stub, $name)
    {
        $class = str_replace($this->getNamespace($name).'\\', '', $name);
        $model = 'App\Models\\'.$class;

        if (! class_exists($model)) {
            return $this;
        }

        $attributes = $this->getAttributes($model);

        // create an array with the needed code for defining fields
        $fields = Arr::where($attributes, function ($value, $key) {
            return ! in_array($value, ['id', 'created_at', 'updated_at', 'deleted_at']);
        });
        if (count($fields)) {
            foreach ($fields as $key => $field) {
                $fields[$key] = "CRUD::field('".$field."');";
            }
        }

        // create an array with the needed code for defining columns
        $columns = Arr::where($attributes, function ($value, $key) {
            return ! in_array($value, ['id']);
        });
        if (count($columns)) {
            foreach ($columns as $key => $column) {
                $columns[$key] = "CRUD::column('".$column."');";
            }
        }

        // replace setFromDb with actual fields and columns
        $stub = str_replace('CRUD::setFromDb(); // fields', implode(PHP_EOL.'        ', $fields), $stub);
        $stub = str_replace('CRUD::setFromDb(); // columns', implode(PHP_EOL.'        ', $columns), $stub);

        return $this;
    }

    /**
     * Replace the class name for the given stub.
     *
     * @param  string  $stub
     * @param  string  $name
     *
     * @return string
     */
    protected function replaceModel(&$stub, $name)
    {
        $class = str_replace($this->getNamespace($name).'\\', '', $name);
        $stub = str_replace(['DummyClass', '{{ class }}', '{{class}}'], $class, $stub);

        return $this;
    }

    /**
     * Build the class with the given name.
     *
     * @param string $name
     *
     * @return string
     */
    protected function buildClass($name)
    {
        $stub = $this->files->get($this->getStub());

        $this->replaceNamespace($stub, $name)
                ->replaceNameStrings($stub, $name)
                ->replaceModel($stub, $name)
                ->replaceSetFromDb($stub, $name);

        return $stub;
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return [

        ];
    }
}
