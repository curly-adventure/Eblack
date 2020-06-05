<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\AdministratorsRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class AdministratorsCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class AdministratorsCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel('App\Models\Administrators');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/administrators');
        $this->crud->setEntityNameStrings('un administrateur', 'Admin');
    }

    protected function setupListOperation()
    {
        // TODO: remove setFromDb() and manually define Columns, maybe Filters
        $this->crud->addColumn([
            'name' => 'name', // The db column name
            'label' => "nom", // Table column heading
            'type' => 'text'
        ]);
        $this->crud->addColumn([
        'name' => 'email', // The db column name
            'label' => "email", // Table column heading
            'type' => 'email'
        ]);
        $this->crud->addColumn([
            'name' => 'email_verified_at', // The db column name
            'label' => "date de verification", // Table column heading
            'type' => 'text'
        ]);
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(AdministratorsRequest::class);

        // TODO: remove setFromDb() and manually define Fields
        $this->crud->addField([
            'name' => 'name', // The db column name
            'label' => "nom", // Table column heading
            'type' => 'text'
        ]);
        
        $this->crud->addField([
            'name' => 'email', // The db column name
            'label' => "email", // Table column heading
            'type' => 'email'
        ]);
        $this->crud->addField([
            'name' => 'email_verified_at', // The db column name
            'label' => "date de verification", // Table column heading
            'type' => 'text'
        ]);
        $this->crud->addField([
            'name' => 'password', // The db column name
            'label' => "mot de passe", // Table column heading
            'type' => 'password'
        ]);
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
