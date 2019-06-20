<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Visiteur;
use App\Sexe;
use App\Classe;
use App\Province;
use App\Commune;
use App\Division;
use App\Service;
use App\Demande;
use App\Commandement;
use App\CommuneLocal;
use App\Pay;
use App\ServiceExt;
use App\Statut;
use App\Theme;
use App\Type;
use PDF;
use App\Exports\VisiteursExport;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\Datatables\Facades\Datatables;
class VisiteursController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /**if(request()->ajax())
        {
            return datatables()->of(Visiteur::latest()->get())
                    ->addColumn('action', function($data){
                        $button = '<button type="button" width="40%" name="edit" id="'.$data->id.'" class="edit btn btn-primary btn-sm">Edit</button>';
                        $button .= '&nbsp;&nbsp;';
                        $button .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm">Delete</button>';
                        $button .= '&nbsp;&nbsp;';
                        $button .= '<button type="button" name="view" id="'.$data->id.'" class="delete btn btn-warning btn-sm">View</button>';
                        return $button;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }*/
        $search = request()->query('search');
        if ($search) {
            $visiteurs = Visiteur::where('numCIN','LIKE', "%{$search}%")->orWhere('nomFR','LIKE', "%{$search}%")->paginate(2);
          }else {
            $visiteurs = Visiteur::paginate(2);
          }
        return view('visiteurs.index')->with('visiteurs' , $visiteurs);
                                       
                             
    }
        
   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('visiteurs.create')
                                     ->with('sexes' , Sexe::all())
                                     ->with('demandes' , Demande::all())
                                     ->with('classes' , Classe::all())
                                     ->with('pays' , Pay::all())
                                     ->with('serviceexts' , ServiceExt::all())
                                     ->with('status' , Statut::all())
                                     ->with('themes' , Theme::all())
                                     ->with('types' , Type::all())
                                     ->with('provinces' , Province::pluck("provinceFr","id"))
                                     ->with('divisions' , Division::pluck("nomDivisionFr","id"))
                                     ->with('commandements' , Commandement::pluck("commandementFr","id"));
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
          Demande::create([

            'numOrdre' => $request->numOrdre,
            'objet' => $request->objet,
            'dateVisite' => $request->dateVisite,
            'heurEntree' => $request->heurEntree,
            'heurSortie' => $request->heurSortie,
            'theme_id' => $request->theme,
            'statu_id' => $request->statu,
            'type_id' => $request->type,
            'division_id' => $request->division,
            'service_id' => $request->service,
            'commune_id' => $request->communeLocal,
            'sExt_id' => $request->sExt,
            'remarque' => $request->remarque,
            'serviceSuppl' => $request->serviceSuppl,
            'commandement_id' => $request->commandement,
            'nbrVisiteur' => $request->nbrVisiteur,
           
        ]);

        session()->flash('success', 'Visiteur a été créé avec succès.');
          return redirect(route('visiteurs.index'));
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
    public function edit(Visiteur $visiteur , Demande $demande)
    {
        return view('visiteurs.create')
                                ->with('visiteur' , $visiteur)
                                ->with('demande' , $demande)
                                ->with('sexes' , Sexe::all())
                                ->with('classes' , Classe::all())
                                ->with('pays' , Pay::all())
                                ->with('serviceexts' , ServiceExt::all())
                                ->with('status' , Statut::all())
                                ->with('themes' , Theme::all())
                                ->with('types' , Type::all())
                                ->with('provinces' , Province::pluck("provinceFr","id"))
                                ->with('divisions' , Division::pluck("nomDivisionFr","id"))
                                ->with('commandements' , Commandement::pluck("commandementFr","id"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Visiteur $visiteur, Demande $demande)
    {
     
        $this->validate($request,[
            'numCIN' => 'required',
            'nomAr' => 'required',
            'prenomAr' => 'required',
            'prenomFR' => 'required',
            'nomFR' => 'required'
            
          ]);
        

        $visiteur->update([

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

        $demande->update([

            'numOrdre' => $request->numOrdre,
            'objet' => $request->objet,
            'dateVisite' => $request->dateVisite,
            'heurEntree' => $request->heurEntree,
            'heurSortie' => $request->heurSortie,
            'theme_id' => $request->theme,
            'statu_id' => $request->statu,
            'type_id' => $request->type,
            'division_id' => $request->division,
            'service_id' => $request->service,
            'commune_id' => $request->communeLocal,
            'sExt_id' => $request->sExt,
            'remarque' => $request->remarque,
            'serviceSuppl' => $request->serviceSuppl,
            'commandement_id' => $request->commandement,
            'nbrVisiteur' => $request->nbrVisiteur,
           
        ]);
        
        
        
        session()->flash('success', 'Visiteur a mise à jour avec succès.');

        return redirect(route('visiteurs.index'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Visiteur $visiteur)
    {
        $visiteur->delete();

        session()->flash('success', 'Visiteur supprimer avec succès.');

        return redirect(route('visiteurs.index'));
    }

    public function getCommunes($id) {
        
        $communes = Commune::where("province_id",$id)->pluck("nomCommuneFr","id");
            
        return json_encode($communes);

    }

    public function getServices($id) {

        $services = Service::where("division_id",$id)->pluck("nomServiceFr","id");

        return json_encode($services);

        //$services = Service::where('division_id',$id)->get();
        //return response()->json($services); 

    }

    public function getCommandements($id) {
        
        $communeslocal = CommuneLocal::where("commandement_id",$id)->pluck("nomCommuneFr","id");
            
        return json_encode($communeslocal);

    }
    public function downloadPDF($id)
 {
     $visiteurs= Visiteur::findOrFail($id);
     $pdf = PDF::loadView('visiteurs.pdf', compact('visiteurs'))->setPaper('a4', 'landscape');
     $name = "visiteur-".$visiteurs->nomFR.".pdf";
     return $pdf->download($name);
 }
    
 public function export() 
 {
     return Excel::download(new VisiteursExport, 'visiteurs.xlsx');
 }


}
