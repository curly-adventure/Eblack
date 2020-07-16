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
        $this->crud->setEntityNameStrings('une categorie', 'categories');
        $this->crud->enableExportButtons();
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
            'name'  => 'logo',
            'label' => 'logo',
            'type' => 'image',
            'prefix' => 'storage/',
        ]);
        $this->crud->addColumn([
            'name' => 'sousCategories',
            'type' => 'select',
            'label' => "sous categorie",
            'entity' => 'sousCategories',
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
                'wrapperAttributes' => [
                    'class' => 'form-group col-md-6'
                ],
            ],
            [   // Browse
                'name'  => 'logo',
                'label' => 'logo',
                'type' => 'upload',
                'upload' => true,
                'wrapperAttributes' => [
                    'class' => 'form-group col-md-6'
                ],
            ]
        ]);
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
