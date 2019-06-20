@extends('layouts.master')

@section('content')
<div class="pcoded-inner-content">
    <!-- Main-body start -->
    <div class="main-body">
        <div class="page-wrapper">
            <div class="page-body">
                <div class="row">
                    <div class="col-md-12 col-lg-6">
                        <div class="card">
                           
                            <div class="card-block">
                                {!! $chart1->html() !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-6">
                        <div class="card">
                           
                            <div class="card-block">
                                {!! $chart->html() !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-6">
                        <div class="card">
                           
                            <div class="card-block">
                                {!! $chart_demandes->html() !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-6">
                        <div class="card">
                           
                            <div class="card-block">
                                {!! $chart1_demandes->html() !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-6">
                        <div class="card">
                           
                            <div class="card-block">
                                {!! $pie_chart->html() !!}
                            </div>
                        </div>
                    </div>
                    
 
                    
                </div>
            </div>
        </div>
    </div>
</div>

 <!--<div class="container"> 
    <div class="row">
        <div class="col-md-12">
                <div class="card">
                <div class="card-block">
            <div class="panel panel-default">
                <div class="panel-heading"></div>

                <div class="panel-body">
                    {!! $chart1->html() !!}
                </div>
                
            </div>
        </div>
    </div>
   </div>
    </div>
    <div class="row">
            <div class="col-md-12">
                    <div class="card">
                    <div class="card-block">
                <div class="panel panel-default">
                    <div class="panel-heading"></div>
    
                    <div class="panel-body">
                        {!! $chart->html() !!}
                    </div>
                    
                </div>
            </div>
        </div>
       </div>
        </div>
</div>-->
{!! Charts::scripts() !!}
{!! $chart1->script() !!}
{!! $chart->script() !!}
{!! $chart_demandes->script() !!}
{!! $pie_chart->script() !!}

{!! $chart1_demandes->script() !!}
@endsection