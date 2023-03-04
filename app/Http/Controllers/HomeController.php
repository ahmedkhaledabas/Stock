<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $active_product= ((Product::where('status','1')->count()*100)/Product::count());
        $inactive_product= ((Product::where('status','0')->count()*100)/Product::count());

        // $inactive_product= ((Product::count())-$active_product);

        $chartjs_round = app()->chartjs
        ->name('pieChartTest')
        ->type('pie')
        ->size(['width' => 400, 'height' => 200])
        ->labels(['Inctive Products', 'Active Products'])
        ->datasets([
            [
                'backgroundColor' => ['#FF6384', '#36A2EB'],
                'hoverBackgroundColor' => ['#FF6384', '#36A2EB'],
                'data' => [$inactive_product, $active_product]
            ]
        ])
        ->options([]);

      

return view('index', compact('chartjs_round'));
    }
}
