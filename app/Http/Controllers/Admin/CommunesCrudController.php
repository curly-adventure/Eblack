<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CommunesRequest;
use App\Models\Villes;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class CommunesCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class CommunesCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel('App\Models\Communes');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/communes');
        $this->crud->setEntityNameStrings('une commune', 'Communes');
    }

    protected function setupListOperation()
    {
        $this->crud->addColumn([
            'name' => 'ville_id',
            'type' => 'select',
            'label' => "ville",
            'entity' => 'ville',
            'attribute' => 'nom',
            'model' => Villes::class,
        ]);

        $this->crud->addColumn([
            'name' => 'nom', // The db column name
            'label' => "nom", // Table column heading
            'type' => 'text'
        ]);
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(CommunesRequest::class);

        $this->crud->addField([
            'name' => 'ville_id',
            'type' => 'select2',
            'label' => "ville",
            'entity' => 'ville',
            'attribute' => 'nom',
            'model' => Villes::class,
        ]);

        $this->crud->addField([
            'name' => 'nom', // The db column name
            'label' => "nom", // Table column heading
            'type' => 'text'
        ]);


    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
