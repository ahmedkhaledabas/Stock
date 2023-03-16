<?php
use App\Models\Product;
use App\Models\User;

if(!function_exists('showCharts')){
    function showCharts(){
        $active_users= User::where('status','1')->count();
        $inactive_users= User::where('status','0')->count();

        // $inactive_product= ((Product::count())-$active_product);

        $chartjs_round = app()->chartjs
        ->name('pieChartTest')
        ->type('pie')
        ->size(['width' => 400, 'height' => 200])
        ->labels(['Activel Users' , 'Inctive Users'])
        ->datasets([
            [
                'backgroundColor' => ['#1d46c7', '#f7627c'],
                'hoverBackgroundColor' => ['#FF6384', '#36A2EB'],
                'data' => [$active_users , $inactive_users]
            ]
        ])
        ->options([]);

      

return ($chartjs_round);
    }
    }

    
if(!function_exists('showCharts2')){
    function showCharts2(){
        
        $all = Product::count();
        $active_product= Product::where('status','1')->count();
        $inactive_product= Product::where('status','0')->count();

        $chartjs = app()->chartjs
            ->name('barChartTest')
            ->type('bar')
            ->size(['width' => 500, 'height' => 250])
            ->labels(['All Product', 'Active Product' , 'Inactive Product'])
            ->datasets([
                [
                    "label" => "All Product",
                    'backgroundColor' => ['#f7627c'],
                    'data' => [$all]
                ],
                [
                    "label" => "Active Product",
                    'backgroundColor' => ['#1d46c7'],
                    'data' => [$active_product]
                ],
                [
                    "label" => "Inactive Product",
                    'backgroundColor' => ['#ff9642'],
                    'data' => [$inactive_product]
                ],


            ])
            ->options([]);

      

return ($chartjs);
    }
    }

    
