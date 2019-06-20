@extends('layouts.master')

@section('content')
 <div class="card center  ml-5">
                        <div class="card-header">
                            <h5>Liste des visiteurs</h5>
                            <div class=" add-task-row d-flex justify-content-end">
                                <a class="btn btn-success btn-sm pull-left" href="{{ route('visiteurs.create') }}">ajouter nouveaux visiteurs</a>
                            </div>
                        </div>
                        <!-- Search form -->
                        <div class="ml-4 mt-1">
                                <a href="{{url('/downloadExel')}}" class="btn btn-primary btn-sm">Exel</a>
                                <a href="{{url('/downloadExel')}}" class="btn btn-primary btn-sm">CVS</a>

                        <form class="form-inline d-flex justify-content-end mr-4" action="{{route('visiteurs.index')}}">
                               <i class="fas fa-search" aria-hidden="true"></i>
                           <input class="form-control form-control-sm " type="text" name="search" placeholder="recherche par CIN" value="{{request()->query('search')}}">
                          </form>
                        </div>
                        <div class="card-block"  style="width:100%">
                            <div class="dt-responsive table-responsive">
                                <table id="basic-btn" class="table table-striped table-bordered nowrap">
                                        
                                                
                                    <thead>
                                        <tr>
                                            <th style="width:50%">Nom</th>
                                            <th width="35%">Prenom</th>
                                            <th width="10%">CIN</th>
                                            <th width="20%">Email</th>
                                            <th width="20%">Téléphone</th>
                                            <th width="20%">Date</th>
                                            <th width="10%">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($visiteurs as $visiteur)
                                        <tr>
                                            <td>{{$visiteur->nomFR}}</td>
                                            <td>{{$visiteur->prenomFR}}</td>
                                            <td>{{$visiteur->numCIN}}</td>
                                            <td>{{$visiteur->email}}</td>
                                            <td>{{$visiteur->telephone}}</td>
                                            <td>{{$visiteur->created_at}}</td>
                                             <td>
                                                <a href="{{action('VisiteursController@downloadPDF', $visiteur->id)}}" class="btn btn-primary btn-sm"><i class="fas fa-eye"></i></a>
                                                <a href="{{route('visiteurs.edit' , $visiteur->id)}}" class="btn btn-warning btn-sm"><i class="fas fa-user-edit"></i></a>
                                                <button class="btn btn-danger btn-sm" onclick="handleDelete({{$visiteur->id}})"><i class="fas fa-trash-alt"></i></button>
                                             </td>
                                           
                                        </tr>
  
          
                                    </tbody>
                                    @empty
                                    <p class="text-center">
                                        Aucun résultat trouvé pour la requête : <strong>{{request()->query('search')}}</strong>
                                        </p>
                                    @endforelse
                                </table>  
                            <div class="pull-left d-flex justify-content-end">{{ $visiteurs->appends(['search' => request()->query('search')])->links() }}</div>
                            <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                      <form action="" method="POST" id="deleteVisiteurForm">
                                          @csrf
                                          @method('DELETE')
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <h5 class="modal-title" id="deleteModalLabel">Supprimer le Visiteur</h5>
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                              </button>
                                            </div>
                                            <div class="modal-body">
                                              <p class="text-center text-bold">
                                                    Voulez-vous vraiment supprimer ce Visiteur ?
                                              </p>
                                            </div>
                                            <div class="modal-footer">
                                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Non, Retourne</button>
                                              <button type="submit" class="btn btn-danger">Oui, Supprimer</button>
                                            </div>
                                          </div>
                                      </form>
                                    </div>
                                  </div>
                        </div>
                        </div>
                    </div>
    <script>
      function handleDelete(id) {
      var form = document.getElementById('deleteVisiteurForm')
       form.action = '/visiteurs/' + id
        $('#deleteModal').modal('show')
         }
        </script>
@endsection
