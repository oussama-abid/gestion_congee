    @extends('layouts.admin')
    @section('main')
    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="card">
                        <div class="stat-widget-two card-body">
                            <div class="stat-content">
                                <div class="stat-text">nombres total d'employees </div>
                                <div class="stat-digit"> </i>{{ DB::table('users')->where('role','employe')->count() }}</div>
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
                                <div class="stat-text"> nombres total de demandes </div>
                                <div class="stat-digit"> {{ DB::table('demandes')->where('etat','enattente')->count() }}</div>
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
                                <div class="stat-text">nombres d'employess disponibles </div>
                                <div class="stat-digit">   {{ DB::table('users')->where('role','employe')->where('statut','disponible')->count() }}</div>
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
                                <div class="stat-text">nombres d'employess en cong??s</div>
                                <div class="stat-digit"> {{ DB::table('users')->where('statut','en_conge')->count() }}</div>
                            </div>
                            <div class="progress">
                                <div class="progress-bar progress-bar-danger w-65" role="progressbar" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                    <!-- /# card -->
                </div>
                <!-- /# column -->
            </div>
            
    @endsection
     
                
                   
              
