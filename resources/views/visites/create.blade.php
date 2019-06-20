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
                                {{isset($visite) ? 'Modifier un visite' : 'Ajouter un nouveau visite'}}
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
            <form action="{{ isset($visite) ? route('visites.update', $visite->id) : route('visites.store')}}" method="Post">
             @csrf
             @if (isset($visite))
             @method('PUT')    
             @endif
             <div class="card-block">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Nom</label>
                            <input type="text" class="form-control"  name="nomFR" placeholder="Nom" value="{{isset($visite) ? $visite->nomFR : ''}}">
                        </div>
                        <div class="form-group col-md-6" dir="rtl">
                            <label for="inputEmail4" class="d-flex">الاسم العائلي</label>
                            <input type="text" class="form-control"  name="nomAr" placeholder="الاسم العائلي" value="{{isset($visite) ? $visite->nomAr : ''}}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Prenom</label>
                            <input type="text" class="form-control"  name="prenomFR" placeholder="Prenom" value="{{isset($visite) ? $visite->prenomFR : ''}}">
                        </div>
                        <div class="form-group col-md-6" dir="rtl">
                            <label for="inputEmail4" class="d-flex">الاسم الشخصي</label>
                            <input type="text" class="form-control"  name="prenomAr" placeholder="الاسم الشخصي" value="{{isset($visite) ? $visite->prenomAr : ''}}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">CIN</label>
                            <input type="text" class="form-control"  name="numCIN" placeholder="CIN" value="{{isset($visite) ? $visite->numCIN : ''}}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Téléphone</label>
                            <input type="text" class="form-control"  name="telephone" placeholder="Téléphone" value="{{isset($visite) ? $visite->telephone : ''}}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Email</label>
                            <input type="email" class="form-control"  name="email" placeholder="Email" value="{{isset($visite) ? $visite->email : ''}}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="sexe">Sexe</label>
                            <select name="sexe" id="sexe" class="form-control">
                                @foreach ($sexes as $sexe)
                                <option value="{{$sexe->id}}"
                                    @if (isset($visiteur))
                                 @if ($sexe->id == $visite->sexe_id) 
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
                            <input type="date" id="date" class="form-control"  name="dateNaissance" placeholder="Date de naissance" value="{{isset($visite) ? $visite->dateNaissance : ''}}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="classe">Classe</label>
                            <select name="classe" id="classe" class="form-control">
                                @foreach ($classes as $classe)
                                <option value="{{$classe->id}}"
                                    @if (isset($visite))
                                 @if ($classe->id == $visite->classe_id) 
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
                            <label for="inputState">Pays</label>
                            <select id="inputState" name="pay" class="form-control">
                                @foreach ($pays as $pay)
                                <option value="{{$pay->id}}"
                                    @if (isset($visite))
                                 @if ($pay->id == $visite->pay_id) 
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
                        <input type="text" class="form-control"  name="adresse" placeholder="1234 Main St" value="{{isset($visite) ? $visite->adresse : ''}}">
                    </div>

                   
                    </div>

                    <button type="submit" class="btn btn-primary my-2 ml-2">
                        {{isset($visite) ? 'Modifier' : ' Enregistrer'}}
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
</div>

@endsection