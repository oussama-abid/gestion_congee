

</div>

@extends('layouts.employe')
@section('main')

<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="stat-widget-two card-body">
                        <div class="stat-content">
                            <div class="stat-text">nombres total de demandes </div>
                            <div class="stat-digit"> </i>{{ DB::table('demandes')->where('user_id',Auth::user()->id)->count() }}</div>
                        </div>
                        <div class="progress">
                            <div class="progress-bar progress-bar-primary w-85" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="stat-widget-two card-body">
                        <div class="stat-content">
                            <div class="stat-text"> nombres total de demandes en attente </div>
                            <div class="stat-digit"> {{ DB::table('demandes')->where('user_id',Auth::user()->id)->where('etat','enattente')->count() }}</div>
                        </div>
                        <div class="progress">
                            <div class="progress-bar progress-bar-primary w-75" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="stat-widget-two card-body">
                        <div class="stat-content">
                            <div class="stat-text">nombres de demandes accptés </div>
                            <div class="stat-digit">{{ DB::table('demandes')->where('user_id',Auth::user()->id)->where('etat','accepterparpdg')->count() }}</div>
                        </div>
                        <div class="progress">
                            <div class="progress-bar progress-bar-success w-50" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="stat-widget-two card-body">
                        <div class="stat-content">
                            <div class="stat-text">nombres de demandes refusés </div>
                            <div class="stat-digit"> {{ DB::table('demandes')->where('user_id',Auth::user()->id)->where('etat','refuse')->count() }}</div>
                        </div>
                        <div class="progress">
                            <div class="progress-bar progress-bar-danger w-65" role="progressbar" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        
                    </div>
                </div>
                
                <!-- /# card -->
            </div>
            <div class="container">
                <h1>statut : {{Auth::user()->statut}} </h1>
               <h3>nb jours total :</h3> <h4> {{Auth::user()->nbjours_tot}} </h2> 
                <h3>nb jours restant :</h3> <h4> {{Auth::user()->nbjours_rest}} </h2> 

                       </div>
           

            
            <!-- /# column -->
        </div>
@endsection
 
            
               
          
