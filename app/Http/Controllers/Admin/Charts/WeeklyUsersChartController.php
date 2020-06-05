<?php

namespace App\Http\Controllers\Admin\Charts;
use App\Administrator;
use App\Models\Produit;
use App\Models\Category;
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
        /*$this->chart->labels([
            'Today',
        ]);*/
        $today_users = Administrator::whereDate('created_at', today())->count();
        $yesterday_users = Administrator::whereDate('created_at', today()->subDays(1))->count();
        $users_2_days_ago =Administrator::whereDate('created_at', today()->subDays(2))->count();

        //$chart = new Chart();
        $this->chart->labels(['2 days ago', 'Yesterday', 'Today']);
        $this->chart->dataset('My dataset', 'line', [$users_2_days_ago, $yesterday_users, $today_users])
        ->color('rgb(77, 189, 116)')
            ->backgroundColor('rgba(77, 189, 116, 0.4)');

            //$this->chart->load(backpack_url('charts/new-entries'));
        

        // RECOMMENDED. Set URL that the ChartJS library should call, to get its data using AJAX.
        //$this->chart->load(backpack_url('charts/weekly-users'));

        // OPTIONAL
        // $this->chart->minimalist(false);
        // $this->chart->displayLegend(true);
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

    $this->chart->dataset('Users', 'line', $produits)
        ->color('rgb(77, 189, 116)')
        ->backgroundColor('rgba(77, 189, 116, 0.4)');

    $this->chart->dataset('Articles', 'line', $categories)
        ->color('rgb(96, 92, 168)')
        ->backgroundColor('rgba(96, 92, 168, 0.4)');

    $this->chart->dataset('Categories', 'line', $souscategories)
        ->color('rgb(255, 193, 7)')
        ->backgroundColor('rgba(255, 193, 7, 0.4)');

    /*$this->chart->dataset('Tags', 'line', $tags)
        ->color('rgba(70, 127, 208, 1)')
        ->backgroundColor('rgba(70, 127, 208, 0.4)');*/

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