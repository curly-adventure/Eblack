<?php

namespace App\Http\Controllers\Admin\Charts;

use App\Models\Achats;
use ConsoleTVs\Charts\Classes\Chartjs\Chart;
use Backpack\CRUD\app\Http\Controllers\ChartController;

/**
 * Class AchatsChartController
 * @package App\Http\Controllers\Admin\Charts
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class AchatsChartController extends ChartController
{
    public function setup()
    {
        $this->chart = new Chart();
 
        $labels=["decembre","novembre","octobre","septembre","aout","juillet","juin","mai","avril","mars","fevrier",'janvier'];
        $produit_acheter=[];
        for ($days_backwards = 12; $days_backwards >= 0; $days_backwards--) {
            if ($days_backwards == 1) {
            }
            $produit_acheter[]=Achats::whereMonth('created_at', today()->subMonths()->month($days_backwards))->count();
           
        }
        //dd($produit_acheter);

        $this->chart->labels($labels);
        $this->chart->dataset('Produits achetés', 'line', $produit_acheter)
        ->color('rgb(96, 92, 168)')
        ->backgroundColor('rgba(96, 92, 168, 0.4)');
        // RECOMMENDED. Set URL that the ChartJS library should call, to get its data using AJAX.
        //$this->chart->load(backpack_url('charts/achats'));

        // OPTIONAL
        // $this->chart->minimalist(false);
        // $this->chart->displayLegend(true);
    }

    /**
     * Respond to AJAX calls with all the chart data points.
     *
     * @return json
     */
    // public function data()
    // {
    //     $users_created_today = \App\User::whereDate('created_at', today())->count();

    //     $this->chart->dataset('Users Created', 'bar', [
    //                 $users_created_today,
    //             ])
    //         ->color('rgba(205, 32, 31, 1)')
    //         ->backgroundColor('rgba(205, 32, 31, 0.4)');
    // }
}