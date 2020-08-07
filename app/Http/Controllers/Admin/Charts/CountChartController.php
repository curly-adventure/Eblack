<?php

namespace App\Http\Controllers\Admin\Charts;

use App\Models\Produit;
use App\Models\Category;
use App\Models\Marque;
use App\Models\Souscategorie;
use ConsoleTVs\Charts\Classes\Chartjs\Chart;
use Backpack\CRUD\app\Http\Controllers\ChartController;

/**
 * Class CountChartController
 * @package App\Http\Controllers\Admin\Charts
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class CountChartController extends ChartController
{
    public function setup()
    {
        $this->chart = new Chart();
        $produits[] = Produit::get()->count();
        $categories[] = Category::get()->count();
        $souscategories[] = Souscategorie::get()->count();
        $marque=Marque::get()->count();
        $this->chart->dataset('effectif', 'pie', [$produits, $categories, $souscategories,$marque])
                    ->color([
                        'rgb(70, 127, 208)',
                        'rgb(66, 186, 150)',
                        'rgb(96, 92, 168)',
                        'rgb(255, 193, 7)',])
                    ->backgroundColor([
                        'rgb(70, 127, 208)',
                        'rgb(66, 186, 150)',
                        'rgb(96, 92, 168)',
                        'rgb(255, 193, 7)', ]) ;

        // OPTIONAL
        $this->chart->displayAxes(false);
        $this->chart->displayLegend(true);

        // MANDATORY. Set the labels for the dataset points
        $this->chart->labels(['PRODUITS', 'CATEGORIES', 'SOUS CATEGORIES', 'MARQUES']);

  
    }

    
}