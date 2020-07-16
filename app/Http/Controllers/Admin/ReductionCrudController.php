<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ReductionRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class ReductionCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class ReductionCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel('App\Models\Reduction');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/reduction');
        $this->crud->setEntityNameStrings('un bon', 'Bons de reduction');
        
    }

    protected function setupListOperation()
    {
        // TODO: remove setFromDb() and manually define Columns, maybe Filters
        $this->crud->addColumn([
            "name"=>"code",
            'type'=>"text",
            "label"=>"code",
        ]);
        $this->crud->addColumn([
            "name"=>"valeur",
            'type'=>"text",
            "label"=>"valeur ( % )",
        ]);
        $this->crud->addColumn([
            "name"=>"utilise",
            'type'=>"boolean",
            "label"=>"deja utiliser ?",
        ]);
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(ReductionRequest::class);

        $this->crud->addField([
            "name"=>"code",
            'type'=>"text",
            "label"=>"code",
        ]);
        $this->crud->addField([
            "name"=>"valeur",
            'type'=>"text",
            "label"=>"valeur ( % )",
        ]);
        $this->crud->addField([
            "name"=>"utilise",
            'type'=>"boolean",
            "label"=>"deja utiliser ?",
        ]);
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
