<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\VillesRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class VillesCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class VillesCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel('App\Models\Villes');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/villes');
        $this->crud->setEntityNameStrings('une ville', 'Villes');
    }

    protected function setupListOperation()
    {
        // TODO: remove setFromDb() and manually define Columns, maybe Filters
      //  $this->crud->setFromDb();
          $this->crud->addColumn([
                "name"=>"id",

                'type'=>"text",
                "label"=>"identifiant",
            ]);
          $this->crud->addColumn([
                "name"=>"nom",
               
                'type'=>"text",
                "label"=>"nom",
            ]);
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(VillesRequest::class);

        // TODO: remove setFromDb() and manually define Fields
        $this->crud->setFromDb();
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
