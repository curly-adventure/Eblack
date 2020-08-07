<?php

namespace App\Http\Controllers\Admin;

use App\Ville;
use App\Adresse;
use App\Commune;
use App\Models\Achats;
use App\StatusCommande;
use App\Mail\OrderCancelled;
use App\Http\Requests\AchatsRequest;
use App\Mail\OrderEtatChange;
use App\Models\Clients;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;
use Symfony\Component\HttpFoundation\Request;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class AchatsCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class AchatsCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel('App\Models\Achats');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/achats');
        $this->crud->setEntityNameStrings('Commandes', 'Commandes');
        $this->crud->getTitle('create');
        $this->crud->setTitle('NEW ENTRY', 'list');
        $this->crud->enableExportButtons();
        $this->setPermissions();
    }

    protected function setupListOperation()
    {
        // TODO: remove setFromDb() and manually define Columns, maybe Filters
        // $this->crud->removeButton('create');
        //$this->crud->removeButton('update');
        //$this->crud->setFromDb();
        $this->crud->addColumns([
            [
                'name'  => "num_achat",
                'label' => 'Commande',
            ],
            [
                'name'  => "quantite",
                'label' => 'QTE',
            ],
            [
                'name'  => 'created_at',
                'label' => "Date",
            ],
            [
                'label'     => 'Client',
                'type'      => 'select',
                'name'      => 'client_id',
                'entity'    => 'client',
                'attribute' => 'nom',
                'model'     => 'App\Client',
            ],
            [
                'label'     => 'Status',
                'type'      => 'select_perso',
                'name'      => 'status_id',
                'entity'    => 'status',
                'attribute' => 'nom',
                'model'     => 'App\StatusCommande',
            ],
            [
                'name'  => 'montant',
                'label' => "Total",
            ],

            
        ]);
    }
   
    protected function setupCreateOperation()
    {
        $this->crud->setValidation(AchatsRequest::class);

        // TODO: remove setFromDb() and manually define Fields
        $this->crud->setFromDb();
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
    public function setPermissions()
    {
        // Get authenticated user
        $user = auth()->user();
        $this->crud->denyAccess(['create', 'update', 'reorder', 'delete']);
        // Deny all accesses
        //$this->crud->denyAccess(['create', 'delete', 'update']);
        
        // Allow access to show and replace preview button with view
        $this->crud->allowAccess('show');
        $this->crud->addButtonFromView('line', 'view', 'view', 'end');
        $this->crud->removeButton('view');
    }
    public function show(Achats $id)
    {
        $this->crud->hasAccessOrFail('show');
        $order = $id;
        $orderStatuses = StatusCommande::get();
        $adresse=Adresse::where('client_id',$order->client->id)->first();
        $crud = $this->crud;
        return view('admin.order.view', compact('crud', 'order', 'orderStatuses','adresse'));
    }
    public function updateStatus(Request $request)
    {
        $satusid=$request->input('status_id');
        if ($satusid!=$request->input('orderStatus')) {
        $this->crud->update($request->input('order_id'), ['status_id' => $request->input('status_id')]);
        $commande=\App\Models\Achats::find($request->input('order_id'));
        $idstatus=$request->input('status_id');
        $client =Clients::find($commande->client->id);
        $adresse = \App\Adresse::where('client_id', $client->id)->first();
        $commune = \App\Models\Communes::where('id', $adresse->commune_id)->first();
        $ville_id = \App\Models\Villes::where('id', $commune->ville_id)->first()->id;
        if ($satusid==2 or $satusid==3 or $satusid==4) {
        Mail::to($client->email)->send(new OrderEtatChange($idstatus,$commande->id,$adresse->id,$ville_id,$commune->id,$commande->soustotal));
            
        }
        Alert::success("status mise à jour")->flash();
        return redirect()->back();
    }
    else{
        return redirect()->back();
    }
    }
}
