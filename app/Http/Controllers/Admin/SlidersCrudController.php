<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\SlidersRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class SlidersCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class SlidersCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     * 
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Sliders::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/sliders');
        CRUD::setEntityNameStrings('un slide', 'Slider');
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        $this->crud->addColumn([
            'name'  => 'image',
            'label' => 'image',
            'type' => 'image',
            'prefix' => 'storage/',
        ]);
        CRUD::column('titre')->type('text');
    }

    /**
     * Define what happens when the Create operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(SlidersRequest::class);

        $this->crud->addFields([
            [
                'name'  => 'titre',
                'type'  => 'text',
                'label' => 'Titre',
                'attributes' => [
                    'placeholder' => 'Ex : Chaussures',
                ]
                
            ],
            [   // Browse
                'name'  => 'image',
                'label' => 'image',
                'type' => 'upload',
                'upload' => true,
                
                ],
                [
                    'name' => 'categorie_id',
                    'type' => 'select',
                    'label' => "Categorie",
                    'entity' => 'categorie',
                    'attribute' => 'nom',
                    'model' => "App\Models\Category", // foreign key model
                    //'default'   => 0, // set the default value of the select2
                   
                ],
                [
                    'name' => 'sous_categorie_id',
                    'type' => 'select',
                    'label' => "Sous Categorie",
                    'entity' => 'souscategorie',
                    'attribute' => 'nom',
                    'model' => "App\Models\Souscategorie", 
                ],
                [
                    'name' => 'produit_id',
                    'type' => 'select',
                    'label' => "Produit",
                    'entity' => 'souscategorie',
                    'attribute' => 'nom',
                    'model' => "App\Models\Produit", 
                ],
            ]);
            
    }

    /**
     * Define what happens when the Update operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
