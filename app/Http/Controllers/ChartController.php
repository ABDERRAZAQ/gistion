<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Charts;
use App\Visiteur;
use App\Demande;
use DB;


class ChartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $visiteurs = Visiteur::where(DB::raw("(DATE_FORMAT(created_at,'%Y'))"),date('Y'))
        ->get();
$chart = Charts::database($visiteurs, 'bar', 'highcharts')
      ->title("Visites Par Mois")
      ->elementLabel("Total Visites")
      ->dimensions(500, 400)
      ->responsive(false)
      ->groupByMonth(date('Y'), true);
      
      $chart1 = Charts::database($visiteurs,'line', 'highcharts')
      ->elementLabel("Total Visites")
      ->title('Visites Par Jours')
      ->dimensions(500, 400)
      ->responsive(false)
      ->groupByDay();
       
$chart_demandes = Charts::database(Demande::all(), 'bar', 'highcharts')
      ->title("Visiteurs Par Mois")
      ->elementLabel("Total Visiteurs")
      ->dimensions(500, 400)
      ->responsive(false)
      ->groupByMonth(date('Y'), true);
      $chart1_demandes = Charts::database(Demande::all(),'line', 'highcharts')
      ->elementLabel("Total Visiteurs")
      ->title('Visiteurs Par Jours')
      ->dimensions(500, 400)
      ->responsive(false)
      ->groupByDay();

        
       $pie_chart = Charts::create('pie', 'highcharts')
				    ->title('Communes')
				    ->labels(['Chichaoua', 'Marrakech', 'Imintanout', 'AIT HADI', 'Oudaia', 'Souihla'])
				    ->values([15,25,50, 5,10,20])
				    ->dimensions(500, 400)
                    ->responsive(false);
                   
 
 
		/**$line_chart = Charts::create('line', 'highcharts')
			    ->title('Line Chart Demo')
			    ->elementLabel('Chart Labels')
			    ->labels(['Product 1', 'Product 2', 'Product 3', 'Product 4', 'Product 5', 'Product 6'])
			    ->values([15,25,50, 5,10,20])
                ->dimensions(500, 400)
               
                ->responsive(false);*/
               
				    
return view('chart.chart',compact('chart' ,'chart1', 'chart_demandes', 'chart1_demandes','pie_chart'));



    }

    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
