<?php

namespace App\Http\Controllers\Admin\Charts;
use App\Administrator;
use App\Models\Achats;
use App\Models\Produit;
use App\Models\Category;
use App\Models\Clients;
use App\Models\Souscategorie;
use Backpack\CRUD\app\Http\Controllers\ChartController;
use ConsoleTVs\Charts\Classes\Chartjs\Chart;


/**
 * Class WeeklyUsersChartController
 * @package App\Http\Controllers\Admin\Charts
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class WeeklyUsersChartController extends ChartController
{
    public function setup()
    {
        $this->chart = new Chart();

        // MANDATORY. Set the labels for the dataset points
        $labels = [];
        for ($days_backwards = 30; $days_backwards >= 0; $days_backwards--) {
           
            if ($days_backwards == 0) {
                $labels[] = "aujourd'hui";
            }else{
            $labels[] = $days_backwards.' jour avant';}
        }
        $client = [];
        $produit_acheter=[];
        for ($days_backwards = 30; $days_backwards >= 0; $days_backwards--) {
            if ($days_backwards == 1) {
            }
            $client[] = Clients::whereDate('created_at', today()->subDays($days_backwards))->count(); 
            $produit_acheter[]=Achats::whereDate('updated_at', today()->subDays($days_backwards))->Where('status_id','>',2)->count();
        }
        $this->chart->labels($labels);
        
        $this->chart->dataset('Clients inscrits', 'line', $client)
                    ->color('rgba(70, 127, 208, 1)')
                    ->backgroundColor('rgba(70, 127, 208, 0.4)');
                
        $this->chart->dataset('Produits achetés', 'line', $produit_acheter)
                    ->color('rgba(205, 32, 31, 1)')
                    ->backgroundColor('rgba(205, 32, 31, 0.4)');
    }
    public function data(){

    //$this->chart->dataset();
    for ($days_backwards = 30; $days_backwards >= 0; $days_backwards--) {
        // Could also be an array_push if using an array rather than a collection.
        $produits[] = Produit::whereDate('created_at', today()->subDays($days_backwards))
                        ->count();
        $categories[] = Category::whereDate('created_at', today()->subDays($days_backwards))
                        ->count();
        $souscategories[] = Souscategorie::whereDate('created_at', today()->subDays($days_backwards))
                        ->count();
        //$tags[] = Tag::whereDate('created_at', today()->subDays($days_backwards))
                       // ->count();
    }

    $this->chart->dataset('Produits', 'line', $produits)
        ->color('rgb(77, 189, 116)')
        ->backgroundColor('rgba(77, 189, 116, 0.4)');

    $this->chart->dataset('Categories', 'line', $categories)
        ->color('rgb(96, 92, 168)')
        ->backgroundColor('rgba(96, 92, 168, 0.4)');

    $this->chart->dataset('Sous Categories', 'line', $souscategories)
        ->color('rgb(255, 193, 7)')
        ->backgroundColor('rgba(255, 193, 7, 0.4)');


    }
    
}