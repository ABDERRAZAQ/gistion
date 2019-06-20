
@extends('layouts.master')

@section('content')
<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div> -->
<div class="pcoded-inner-content">
    <div class="main-body">
        <div class="page-wrapper">
            <div class="page-body">
                <!-- [ page content ] start -->
                <div class="row">
                    <div class="col-md-6 col-lg-4">
                        <div class="card">
                            <div class="card-block text-center">
                                <i class="feather icon-users text-c-red d-block f-40"></i>
                                <h5 class="m-t-20">Visites</h5>
                                <h4 class="m-b-20"><span class="text-c-red">{{$visiteurs->count()}}</span></h4>
                                <a href="{{route('visites.index')}}" class="btn btn-danger btn-sm btn-round">voir les visites</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="card">
                            <div class="card-block text-center">
                                <i class="feather icon-file-text text-c-green d-block f-40"></i>
                                <h5 class="m-t-20">Demandes</h5>
                                <h4 class="m-b-20"><span class="text-c-green">{{$demandes->count()}}</span></h4>
                                <a href="{{route('visiteurs.index')}}" class="btn btn-success btn-sm btn-round">voir les Demandes</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-4">
                        <div class="card">
                            <div class="card-block text-center">
                                <i class="feather icon-mail text-c-blue d-block f-40"></i>
                                <h5 class="m-t-20"><span class="text-c-blue">Messages</h5>
                                    <h4 class="m-b-20"><span class="text-c-blue">2</span></h4>
                                <button class="btn btn-primary btn-sm btn-round">Lire les messages</button>
                            </div>
                        </div>
                    </div>
                    
                   
                    <div class="row ml-1" style="width:100%">
                        <div class="col-lg-12">
                                <div class="card">
                                 <div class="card-block">
                                    {!! $chart->html() !!}
                            </div>
                        </div>
                        </div>
                    
                    <!-- seo end -->
                    {!! Charts::scripts() !!}
                    {!! $chart->script() !!}
                </div>
                <!-- [ page content ] end -->
            </div>
        </div>
    </div>
</div>

@endsection
