@extends('layouts.pdg')
@section('main')
    
@if (session('storeUser'))
<div class="alert alert-dismissible alert-success fade show" role="alert">
    {{ session('storeUser') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
@if (session('updateUser'))
<div class="alert alert-dismissible alert-success fade show" role="alert">
    {{ session('updateUser') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
    

    <div class="content-body">
        <!-- row -->
        <div class="container">
    
             <h2> user : </h2> 
    
            
             <div class="d-flex justify-content-center">
    
                 <div class="row">
                
                    
                    <div class="card" style="width: 38rem;">
                        <div class="card-body">
                            <h5 class="card-title"><strong> nom : <br>{{ $user->name }}</strong></h5>
                            <h5 class="card-title"><strong> email : <br> {{ $user->email  }}</strong></h5>
    
                            <ul class="list-group list-group-flush" style="color: blue"> Details:
                                <li class="list-group-item" style="color: black"><strong> role </strong> <br>{{ $user->role }}</li>
                                <li class="list-group-item"style="color: black"><strong>nb jours total </strong> <br> {{ $user->nbjours_tot }}</li>
                                <li class="list-group-item"style="color: black"><strong>nb jours restant </strong> <br>{{ $user->nbjours_rest }}</li>
                            </ul>
                            <hr>
                           
           
                           
                        </div>
    
                    </div>
                 </div>
            </div>
        </div>
    </div>
    
                    
                    
    
    
     
                
                   
              
    


                
            

@endsection