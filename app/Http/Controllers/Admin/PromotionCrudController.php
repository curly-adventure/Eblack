<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\PromotionRequest;
use App\Models\Marque;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class PromotionCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class PromotionCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation { destroy as traitDestroy; }
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     * 
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Promotion::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/promotion');
        CRUD::setEntityNameStrings('une promotion', 'Promotions');
    }


    public function destroy($id)
    {
        $this->crud->hasAccessOrFail('delete');
        Marque::RemovePromoProduits($id);
        return $this->crud->delete($id);
    }

    protected function setupListOperation()
    {
        //CRUD::setFromDb(); // columns
        CRUD::column('titre')->type('text');
        $this->crud->addColumn([
            'name' => 'marque_id',
            'type' => 'select',
            'label' => "Marque",
            'entity' => 'marque',
            'attribute' => 'nom',
            'model' => "App\Models\Marque", // foreign key model        
        ]);
        $this->crud->addColumn([
            'name'  => 'percent',
            'label' => 'pourcentage de reduction',
            'type' => 'number',
        ]);
    }


    protected function setupCreateOperation()
    {
        CRUD::setValidation(PromotionRequest::class);

        

        $this->crud->addFields([
            [
                'name'  => 'titre',
                'type'  => 'text',
                'label' => 'Titre',
                'attributes' => [
                    'placeholder' => 'Ex : prmotion_eback02',
                ]
                
            ],
          
                [
                    'name' => 'marque_id',
                    'type' => 'select',
                    'label' => "Marque",
                    'entity' => 'marque',
                    'attribute' => 'nom',
                    'model' => "App\Models\Marque", // foreign key model
                    //'default'   => 0, // set the default value of the select2
                   
                ],
             
                [
                    'name' => 'percent',
                    'type' => 'number',
                    'label' => "pourcentage de reduction",
                ],
            ]);

            $id=request()->input('marque_id');
            $perc=request()->input('percent');
            Marque::PromoProduits($id,$perc);
        //request()->merge(array('prix_vente'=>$prix_vente));
    }


    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
