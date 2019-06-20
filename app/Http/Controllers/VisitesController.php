<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Visiteur;
use App\Sexe;
use App\Classe;
use App\Province;
use App\Commune;
use App\Demande;
use App\Pay;
use PDF;
use App\Exports\VisiteursExport;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\Datatables\Facades\Datatables;
class VisitesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $search = request()->query('search');
        if ($search) {
            $visites = Visiteur::where('numCIN','LIKE', "%{$search}%")->orWhere('nomFR','LIKE', "%{$search}%")->paginate(3);
          }else {
            $visites = Visiteur::paginate(3);
          }
        return view('visites.index')->with('visites' , $visites);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('visites.create')
        ->with('sexes' , Sexe::all())
        ->with('demandes' , Demande::all())
        ->with('classes' , Classe::all())
        ->with('pays' , Pay::all())
        ->with('provinces' , Province::pluck("provinceFr","id"));
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'numCIN' => 'required',
            'nomAr' => 'required',
            'prenomAr' => 'required',
            'prenomFR' => 'required',
            'nomFR' => 'required'
            
          ]);

          Visiteur::create([
            'nomAr' => $request->nomAr,
            'prenomAr' => $request->prenomAr,
            'nomFR' => $request->nomFR,
            'prenomFR' => $request->prenomFR,
            'numCIN' => $request->numCIN,
            'telephone' => $request->telephone,
            'email' => $request->email,
            'adresse' => $request->adresse,
            'dateNaissance' => $request->dateNaissance,
            'sexe_id' => $request->sexe,
            'classe_id' => $request->classe,
            'pay_id' => $request->pay,
            'commune_id' => $request->commune,
          ]);
          session()->flash('success', 'visites a été créé avec succès.');
          return redirect(route('visites.index'));
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
    public function edit(Visiteur $visite)
    {
        return view('visites.create')
                                ->with('visite' , $visite)
                                ->with('sexes' , Sexe::all())
                                ->with('classes' , Classe::all())
                                ->with('pays' , Pay::all())
                                ->with('provinces' , Province::pluck("provinceFr","id"));
                               
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Visiteur $visite)
    {
     
        $this->validate($request,[
            'numCIN' => 'required',
            'nomAr' => 'required',
            'prenomAr' => 'required',
            'prenomFR' => 'required',
            'nomFR' => 'required'
            
          ]);
        

        $visite->update([

            'nomAr' => $request->nomAr,
            'prenomAr' => $request->prenomAr,
            'nomFR' => $request->nomFR,
            'prenomFR' => $request->prenomFR,
            'numCIN' => $request->numCIN,
            'telephone' => $request->telephone,
            'email' => $request->email,
            'adresse' => $request->adresse,
            'dateNaissance' => $request->dateNaissance,
            'sexe_id' => $request->sexe,
            'classe_id' => $request->classe,
            'pay_id' => $request->pay,
            'commune_id' => $request->commune,
            

        ]);

       
        
        session()->flash('success', 'visites a mise à jour avec succès.');

        return redirect(route('visites.index'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Visiteur $visite)
    {
        $visite->delete();

        session()->flash('success', 'visites supprimer avec succès.');

        return redirect(route('visites.index'));
    }

    public function getCommunes($id) {
        
        $communes = Commune::where("province_id",$id)->pluck("nomCommuneFr","id");
            
        return json_encode($communes);

    }

   

    
    public function downloadPDF($id)
 {
     $visites= Visiteur::findOrFail($id);
     $pdf = PDF::loadView('visites.pdf', compact('visiteurs'))->setPaper('a4', 'landscape');
     $name = "visiteur-".$visites->nomFR.".pdf";
     return $pdf->download($name);
 }
    
 public function export() 
 {
     return Excel::download(new VisiteursExport, 'visites.xlsx');
 }


}
