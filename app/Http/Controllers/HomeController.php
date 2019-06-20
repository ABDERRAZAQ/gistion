<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Visiteur;
use App\Demande;
use Charts;
use DB;
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
        $demandes = Demande::where(DB::raw("(DATE_FORMAT(created_at,'%Y'))"),date('Y'))
        ->get();
$chart = Charts::database($demandes, 'bar', 'highcharts')
    ->elementLabel("Total Demandes")
       ->title('Demandes Par Jours')
       ->dimensions(1000, 500)
           ->responsive(false)
             ->groupByDay();
      
return view('home',compact('chart'))->with('demandes' , Demande::all())
                                    ->with('visiteurs' , Visiteur::all());
       
    }

    
}
