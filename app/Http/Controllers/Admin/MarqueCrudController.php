<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\MarqueRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class MarqueCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class MarqueCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel('App\Models\Marque');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/marque');
        $this->crud->setEntityNameStrings('une marque', 'marques');
    }

    protected function setupListOperation()
    {
        $this->crud->addColumn([
            'name' => 'nom', // The db column name
            'label' => "Nom", // Table column heading
            'type' => 'text'
        ]);

        $this->crud->addColumn([
            'name'  => 'logo',
            'label' => 'logo',
            'type' => 'image',
            'prefix' => 'storage/',
        ]);
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(MarqueRequest::class);

        // TODO: remove setFromDb() and manually define Fields
        //$this->crud->setFromDb();
        $this->crud->addFields([
            [
                'name'  => 'nom',
                'type'  => 'text',
                'label' => 'Nom',
            ],
            [   
                'name'  => 'logo',
                'label' => 'logo',
                'type' => 'upload',
                'upload' => true,
                'crop' => true,
            ],
        ]);
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
