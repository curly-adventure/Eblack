<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CategoryRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class CategoryCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class CategoryCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel('App\Models\Category');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/category');
        $this->crud->setEntityNameStrings('category', 'categories');
    }

    protected function setupListOperation()
    {
        // TODO: remove setFromDb() and manually define Columns, maybe Filters
        $this->crud->addColumn([
            'name' => 'nom', // The db column name
            'label' => "Nom", // Table column heading
            'type' => 'text'
        ]);
        $this->crud->addColumn([
            'name' => 'sousCategories', // la methode qui defini la relation dans ton model
            'type' => 'select',
            'label' => "sous categories",
            'entity' => 'sousCategories', // la methode qui defini la relation dans ton model
            'attribute' => 'nom',
            'model' => "App\Models\Souscategorie", // foreign key model
            'pivot' => true,
        ]);
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(CategoryRequest::class);
        
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
            [   
                'name' => 'sousCategories', // la methode qui defini la relation dans ton model
                'type' => 'select2_multiple',
                'label' => "sous categories",
                'entity' => 'sousCategories', // la methode qui defini la relation dans ton model
                'attribute' => 'nom',
                'model' => "App\Models\Souscategorie", // foreign key model
                'pivot' => true,
            ]
        ]);
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}