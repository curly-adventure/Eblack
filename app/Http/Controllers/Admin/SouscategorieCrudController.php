<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\SouscategorieRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class SouscategorieCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class SouscategorieCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel('App\Models\Souscategorie');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/souscategorie');
        $this->crud->setEntityNameStrings('une sous categorie', 'sous categories');
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
            'name' => 'categories',
            'type' => 'select',
            'label' => "Categorie",
            'entity' => 'categories',
            'attribute' => 'nom',
            'model' => "App\Models\Category", // foreign key model
            'pivot' => true,
        ]);
        
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(SouscategorieRequest::class);

        // TODO: remove setFromDb() and manually define Fields
        //$this->crud->setFromDb();
        $this->crud->addFields([
            [
                'name'  => 'nom',
                'type'  => 'text',
                'label' => 'Nom',
            ],
            [   // Browse
                'name'  => 'logo',
                'label' => 'logo',
                'type' => 'upload',
                'upload' => true,
                'wrapperAttributes' => [
                    'class' => 'form-group col-md-6'
                ],
            ],
            [
                'name' => 'categories',
                'type' => 'select2_multiple',
                'label' => "Categories",
                'entity' => 'categories',
                'attribute' => 'nom',
               
                'model' => "App\Models\Category", // foreign key model
                'pivot' => true,
            ]
        ]);
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
