<?php

namespace App\Http\Controllers\Admin;

use App\Models\Marge;
use App\Models\Produit;
use App\Personnalisable;
use App\Http\Requests\ProduitRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;

/**
 * Class ProduitCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class ProduitCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel('App\Models\Produit');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/produit');
        $this->crud->setEntityNameStrings('un produit', 'Produits');
        $this->crud->enableExportButtons();
    }

    protected function setupListOperation()
    {

        $this->crud->addColumn(
            [
                'name'  => 'nom',
                'type'  => 'text',
                'label' => 'nom du produit',
            ]
        );

        $this->crud->addColumn([
            'name' => 'marque_id',
            'type' => 'select',
            'label' => "Marque",
            'entity' => 'marque',
            'attribute' => 'nom',
            'model' => "App\Models\Marque",
        ]);

        $this->crud->addColumn(
            [
                'name'  => 'prix_vente',
                'type'  => 'number',
                'label' => 'prix de vente'
            ]
        );
        $this->crud->addColumn(
            [
                'name'  => 'quantite',
                'type'  => 'number',
                'label' => 'qantite'
            ]
        );
    }
 
    protected function setupCreateOperation()
    {
        $this->crud->setValidation(ProduitRequest::class);

        $this->crud->addField(
            [
                'name' => 'categorie_id',
                'type' => 'select2',
                'label' => "Categorie du produit",
                'entity' => 'categorie',
                'attribute' => 'nom',
                'model' => "App\Models\Category", // foreign key model
                //'pivot' => true,
                'wrapperAttributes' => [
                    'class' => 'form-group col-md-6'
                ]
            ]
        );

        $this->crud->addField(
            [
                'name' => 'sous_categorie_id',
                'type' => 'select2',
                'label' => "sous catégorie du produit",
                'entity' => 'sousCategorie',
                'attribute' => 'nom',
                'model' => "App\Models\Souscategorie", // foreign key model
                //'pivot' => true,
                'wrapperAttributes' => [
                    'class' => 'form-group col-md-6'
                ],
            ]
        );
        $this->crud->addField([
            'name' => 'marque_id',
            'type' => 'select2',
            'label' => "Marque du produit",
            'entity' => 'marque',
            'attribute' => 'nom',
            'model' => "App\Models\Marque", // foreign key model
            //'pivot' => true,
            'wrapperAttributes' => [
                'class' => 'form-group col-md-6'
            ],
        ]);
        
        $this->crud->addField(
            [   // Browse
                'label' => "image(s)",
                'name' => "images",
                'type' => 'upload_multiple',
                'upload' => true,

            ]
        );
        
        $this->crud->addField(
            [
                'name'  => 'nom',
                'type'  => 'text',
                'label' => 'nom du produit',
                'wrapperAttributes' => [
                    'class' => 'form-group col-md-6'
                ],
            ]
        );
        $this->crud->addField(
            [
                'name'  => 'quantite',
                'type'  => 'number',
                'label' => 'quantité disponible',
                'wrapperAttributes' => [
                    'class' => 'form-group col-md-6'
                ],
            ]
        );
        $this->crud->addField([
            'name'  => 'personnalisable',
            'type'  => 'checkbox',
            'label' => 'personnalisable',
            
        ]);
        $this->crud->addField([
            'name'  => 'description',
            'type'  => 'wysiwyg',
            'label' => 'description du produit',
        ]);
        $this->crud->addField(
            [
                'name'  => 'prix_achat',
                'type' => 'number',
                'label' => 'prix initial',
                'wrapperAttributes' => [
                    'class' => 'form-group col-md-6'
                ],
            ]
        );
        $this->crud->addField(
            [
                'name'  => 'prix_vente',
                'type'  => 'text',
                'label' => 'prix de vente',
                'type'=>'hidden',
                'wrapperAttributes' => [
                    'class' => 'form-group col-md-6 '
                ],
            ]
        );
        $this->crud->addField(
            [
                'name'  => 'faux_percent',
                'type'  => 'number',
                'label' => 'faux pourcentage de reduction',
                'wrapperAttributes' => [
                    'readonly',
                    'class' => 'form-group col-md-6'
                ],
            ]
        );
        $this->crud->addField(
            [
                'name'  => 'vrai_percent',
                'type'  => 'number',
                'label' => 'vrai pourcentage de reduction',
                'wrapperAttributes' => [
                    'class' => 'form-group col-md-6'
                ],
            ]
        );
        $pers=request()->input('personnalisable');
        
        $mtn=request()->input('prix_achat');
        $prix_vente=Marge::prix_vente($mtn);
        request()->merge(array('prix_vente'=>$prix_vente));
        $pv=Produit::ApplyPercent(request()->input('vrai_percent'),$prix_vente);
        if($pv){
            request()->merge(array('prix_vente'=>$pv));
        }
        $id = Produit::latest()->first()->id+1;
        Personnalisable::AddOrRemove($pers,$id);
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
        
    }
}
