@extends('layouts.master')

@section('content')
<div class="pcoded-inner-content">
    <div class="main-body">
        <div class="page-wrapper">
            <!-- Page body start -->
            <div class="page-body">
                <div class="row">
             <div class="card">
                    <div class="card-header">
                        <h5>
                                {{isset($visiteur) ? 'Modifier un visiteur' : 'Ajouter un nouveau visiteur'}}
                        </h5> 
                    </div>

                    @if ($errors->any())
          <div class="alert alert-danger">
            <ul>
             @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
              </ul>
           </div>
           @endif
            <form action="{{ isset($visiteur) ? route('visiteurs.update', $visiteur->id) : route('visiteurs.store')}}" method="Post">
             @csrf
             @if (isset($visiteur))
             @method('PUT')    
             @endif
             <div class="card-block">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Nom</label>
                            <input type="text" class="form-control"  name="nomFR" placeholder="Nom" value="{{isset($visiteur) ? $visiteur->nomFR : ''}}">
                        </div>
                        <div class="form-group col-md-6" dir="rtl">
                            <label for="inputEmail4" class="d-flex">الاسم العائلي</label>
                            <input type="text" class="form-control"  name="nomAr" placeholder="الاسم العائلي" value="{{isset($visiteur) ? $visiteur->nomAr : ''}}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Prenom</label>
                            <input type="text" class="form-control"  name="prenomFR" placeholder="Prenom" value="{{isset($visiteur) ? $visiteur->prenomFR : ''}}">
                        </div>
                        <div class="form-group col-md-6" dir="rtl">
                            <label for="inputEmail4" class="d-flex">الاسم الشخصي</label>
                            <input type="text" class="form-control"  name="prenomAr" placeholder="الاسم الشخصي" value="{{isset($visiteur) ? $visiteur->prenomAr : ''}}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">CIN</label>
                            <input type="text" class="form-control"  name="numCIN" placeholder="CIN" value="{{isset($visiteur) ? $visiteur->numCIN : ''}}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Téléphone</label>
                            <input type="text" class="form-control"  name="telephone" placeholder="Téléphone" value="{{isset($visiteur) ? $visiteur->telephone : ''}}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Email</label>
                            <input type="email" class="form-control"  name="email" placeholder="Email" value="{{isset($visiteur) ? $visiteur->email : ''}}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="sexe">Sexe</label>
                            <select name="sexe" id="sexe" class="form-control">
                                @foreach ($sexes as $sexe)
                                <option value="{{$sexe->id}}"
                                    @if (isset($visiteur))
                                 @if ($sexe->id == $visiteur->sexe_id) 
                              selected
                     
                                  @endif
                                  @endif
                                    >

                                 {{$sexe->nomSexeFr}}</option>
                                 @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Date de naissance </label>
                            <input type="date" id="date" class="form-control"  name="dateNaissance" placeholder="Date de naissance" value="{{isset($visiteur) ? $visiteur->dateNaissance : ''}}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="classe">Classe</label>
                            <select name="classe" id="classe" class="form-control">
                                @foreach ($classes as $classe)
                                <option value="{{$classe->id}}"
                                    @if (isset($visiteur))
                                 @if ($classe->id == $visiteur->classe_id) 
                              selected
                     
                                  @endif
                                  @endif
                                    >

                                 {{$classe->nomClasseFr}}</option>
                                 @endforeach
                            </select>
                        </div>

                    </div>
                   
                    <div class="form-row">
                        
                            <div class="form-group col-md-6">
                                    <label for="nbrVisiteur">Nombre de Visiteurs</label>
                                    <input type="integer" class="form-control"  name="nbrVisiteur" placeholder="Nombre de Visiteurs" value="{{isset($demande) ? $demande->nbrVisiteur : ''}}">
                                </div>

                        <div class="form-group col-md-6">
                            <label for="inputState">Pays</label>
                            <select id="inputState" name="pay" class="form-control">
                                @foreach ($pays as $pay)
                                <option value="{{$pay->id}}"
                                    @if (isset($visiteur))
                                 @if ($pay->id == $visiteur->pay_id) 
                              selected
                     
                                  @endif
                                  @endif
                                    >

                                 {{$pay->nomPayFr}}</option>
                                 @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="province">Province</label>
                            <select id="province" name="province" class="form-control">
                                <option value="">--Select Province--</option>
                                @foreach ($provinces as $province => $value)
                                <option value="{{ $province }}" 
                                @if (isset($demande))
                                 @if ($value == $demande->province_id) 
                              selected
                     
                                  @endif
                                  @endif
                                    
                                > {{ $value }}</option>   
                                @endforeach 
                            </select>
                        </div>

                        
                       <div class="form-group col-md-6">
                         <label for="commune">Commune</label>
                            <select id="commune" name="commune" class="form-control">
                                <option>--Commune--</option>
                                </select>
                              </div>
                            
                    </div>

                    
                    <div class="form-group">
                        <label for="inputAddress">Adress</label>
                        <input type="text" class="form-control"  name="adresse" placeholder="1234 Main St" value="{{isset($visiteur) ? $visiteur->adresse : ''}}">
                    </div>

                    <hr>
                       
                    <div class="card-header">
                        <h5>
                                Information du visite
                        </h5> 
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Numéro Ordre</label>
                            <input type="integer" class="form-control"  name="numOrdre" placeholder="Numéro Ordre" value="{{isset($demande) ? $demande->numOrdre : ''}}">
                        </div>
                        <div class="form-group col-md-6" >
                            <label for="inputEmail4" >Date de Visite</label>
                            <input type="date" class="form-control" id="date" name="dateVisite" placeholder="Date de Visite" value="{{isset($demande) ? $demande->dateVisite : ''}}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Heure d'entrée</label>
                            <input type="date" class="form-control" id="visite" name="heurEntree" placeholder="Heure d'entrée" value="{{isset($demande) ? $demande->heurEntree : ''}}">
                        </div>
                        <div class="form-group col-md-6" >
                            <label for="inputEmail4">Heure de sortie</label>
                            <input type="date" class="form-control" id="visite" name="heurSortie" placeholder="Heure de sortie" value="{{isset($demande) ? $demande->heurSortie : ''}}">
                        </div>
                       
                            <div class="form-group col-md-6">
                                <label for="statu">Status</label>
                                <select id="statu" name="statu" class="form-control">
                                    @foreach ($status as $statu)
                                    <option value="{{$statu->id}}"
                                        @if (isset($demande))
                                     @if ($statu->id == $demande->statu_id) 
                                  selected
                         
                                      @endif
                                      @endif
                                        >
    
                                     {{$statu->nomStatuFr}}</option>
                                     @endforeach
                                </select>
                            </div>
                        
                        
                            <div class="form-group col-md-6">
                                <label for="type">Type de visite</label>
                                <select id="type" name="type" class="form-control">
                                    @foreach ($types as $type)
                                    <option value="{{$type->id}}"
                                        @if (isset($demande))
                                     @if ($type->id == $demande->type_id) 
                                  selected
                         
                                      @endif
                                      @endif
                                        >
    
                                     {{$type->typeFr}}</option>
                                     @endforeach
                                </select>
                            </div>
                        
                        
                            <div class="form-group col-md-6">
                                <label for="theme">Theme de visite</label>
                                <select id="theme" name="theme" class="form-control">
                                    @foreach ($themes as $theme)
                                    <option value="{{$theme->id}}"
                                        @if (isset($demande))
                                     @if ($theme->id == $demande->theme_id) 
                                  selected
                         
                                      @endif
                                      @endif
                                        >
    
                                     {{$theme->themeFr}}</option>
                                     @endforeach
                                </select>
                            </div>
                        
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Objet</label>
                            <input type="text" class="form-control"  name="objet" placeholder="Objet" value="">
                        </div>
                        
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Remarque </label>
                            <textarea name="remarque" id="remarque"  class="form-control"  placeholder="Remarque" value="">{{isset($demande) ? $demande->remarque : ''}}</textarea>
                        
                        </div>
                        

                    </div>

                    <hr>
                       
                    <div class="card-header">
                        <h5>
                            Intérêts concernés
                        </h5> 
                    </div>
                    <div class="form-row">
                        
                            <div class="form-group col-md-6">
                                    <label for="commandement">Commandement</label>
                                    <select id="commandement" name="commandement" class="form-control">
                                        <option value="">--Select Commandement--</option>
                                        @foreach ($commandements as $commandement => $value)
                                        <option value="{{ $commandement }}"> {{ $value }}</option>   
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="communeLocal">Commune</label>
                                    <select id="communeLocal" name="communeLocal" class="form-control">
                                        <option>--Commune Local--</option>
                                    </select>
                                </div>
                            
                                <div class="form-group col-md-6">
                                    <label for="division">Division</label>
                                    <select id="division" name="division" class="form-control">
                                        <option value="">--Select division--</option>
                                        @foreach ($divisions as $division => $value)
                                        <option value="{{ $division }}"> {{ $value }}</option>   
                                        @endforeach
                                    </select>
                                </div>
                                  
                                <div class="form-group col-md-6">
                                    <label for="service">Service</label>
                                    <select id="service" name="service" class="form-control">
                                        <option>--Service--</option>
                                    </select>
                                </div>
   
                                <div class="form-group col-md-6">
                                    <label for="inputState">Service Extérieur</label>
                                    <select id="inputState" name="sExt" class="form-control">
                                        @foreach ($serviceexts as $serviceext)
                                        <option value="{{$serviceext->id}}"
                                            @if (isset($demande))
                                         @if ($serviceext->id == $demande->sExt_id) 
                                      selected
                             
                                          @endif
                                          @endif
                                            >
        
                                         {{$serviceext->nomSextFr}}</option>
                                         @endforeach
                                    </select>
                                </div>

                                

                                    

                                        <div class="form-group col-md-6">
                                                <label for="inputEmail4">Service Supplémentaire</label>
                                                <input type="text" class="form-control"  name="serviceSuppl" placeholder="Objet" value="{{isset($demande) ? $demande->serviceSuppl : ''}}">
                                            </div>
                    </div>

                    <button type="submit" class="btn btn-primary my-2">
                        {{isset($visiteur) ? 'Modifier' : ' Enregistrer'}}
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
</div>

@endsection