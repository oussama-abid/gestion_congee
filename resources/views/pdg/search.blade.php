@extends('layouts.pdg')
@section('main')
<meta name="_token" content="{{ csrf_token() }}">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<div class="content-body">
  
    <!-- row -->
    <div class="container-fluid">
        <div class="row">

            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="stat-widget-two card-body">
                        <div class="stat-content">
                            <div class="stat-text">nombres total d'employees </div>
                            <div class="stat-digit"> </i> {{ DB::table('users')->where('role','employe')->count() }} </div>
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
                            <div class="stat-digit"> {{ DB::table('demandes')->where('etat','accepterparadmin')->count() }}</div>
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
                            <div class="stat-digit">  {{ DB::table('users')->where('role','employe')->where('statut','disponible')->count() }}</div>
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
                            <div class="stat-text">nombres d'employess en congés</div>
                            <div class="stat-digit"> {{ DB::table('users')->where('statut','en_conge')->count() }}</div>
                        </div>
                        <div class="progress">
                            <div class="progress-bar progress-bar-danger w-65" role="progressbar" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    
                </div>
                <!-- /# card -->
            </div>
            <!-- Small modal -->
           
            <!-- /# column -->
        </div>
        <div class="form-group">
            <input type="text" class="form-control input-lg" id="search" name="search"  class="form-control" placeholder="search by name" style="border-color: black" >  
           </div>
           <br>
            
           <table   class="table table-hover" style="color: black">
               <thead style="color: black" class="thead-dark">
                <tr style="text-align: center">
                   <th>ID</th>
                   <th>name </th>
                   <th>role </th>
                   <th>email</th>
                   <th>nb jours total</th>
                   <th>nb jours restant</th>
                   <th>Actions</th>


                  
                   
                  
               </tr>
           </thead>
           <tbody style="text-align: center" >    
           </tbody>
           
           </table>


















           <script type="text/javascript">
            $('#search').on('keyup',function(){
            $value=$(this).val();
            $.ajax({
            type : 'get',
            url : '{{URL::to('search')}}',
            data:{'search':$value},
            success:function(data){
            $('tbody').html(data);
            }
            });
            })
            </script>
            <script type="text/javascript">
            $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
        </script>
@endsection
 
            
               
          
