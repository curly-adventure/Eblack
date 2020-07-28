<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ClientsRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class ClientsCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class ClientsCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation { store as traitStore; }
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation { update as traitUpdate; }
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel('App\Models\Clients');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/clients');
        $this->crud->setEntityNameStrings('un client', 'Clients');
        $this->crud->enableExportButtons();
    }
    
    

    protected function setupListOperation()
    {
        $this->crud->addColumn([
            'name' => 'nom', 
            'label' => "nom", 
            'type' => 'text'
        ]);
        $this->crud->addColumn([
            'name' => 'prenom', 
            'label' => "prenoms", 
            'type' => 'text'
        ]);
        $this->crud->addColumn([
            'name' => 'email', 
            'label' => "email", 
            'type' => 'email'
        ]);
        $this->crud->addColumn([
            'name' => 'numero', 
            'label' => "numero", 
            'type' => 'text'
        ]);
        $this->crud->addColumn([
            'name' => 'id', 
            'label' => "status", 
            'type' => 'text_perso'
        ]);
        
    }

    
    protected function setupCreateOperation()
    {
        $this->crud->setValidation(ClientsRequest::class);

        // TODO: remove setFromDb() and manually define Fields
        $this->crud->addField([
            'name' => 'nom', // The db column name
            'label' => "nom", // Table column heading
            'type' => 'text'
        ]);
        $this->crud->addField([
            'name' => 'prenom', // The db column name
            'label' => "prenoms", // Table column heading
            'type' => 'text'
        ]);
        $this->crud->addField([
            'name' => 'email', // The db column name
            'label' => "email", // Table column heading
            'type' => 'email'
        ]);
        $this->crud->addField([
            'name' => 'motdepasse', // The db column name
            'label' => "mot de passe", // Table column heading
            'type' => 'password'
        ]);

        if (request()->input('motdepasse')) {
            request()->request->set('motdepasse', Hash::make(request()->input('motdepasse')));
        } else {
            request()->request->remove('motdepasse');
        }

        
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    
    }
}
