@extends('layouts.employe')
@section('main')

<div class="content-body">
    <!-- row -->
    <div class="container">
        @if (session('storeDemande'))
        <div class="alert alert-dismissible alert-success fade show" role="alert">
            {{ session('storeDemande') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    @if (session('updateDemande'))
        <div class="alert alert-dismissible alert-success fade show" role="alert">
            {{ session('updateDemande') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
         <h2> votre demande : </h2> 
        
         <div class="d-flex justify-content-center">

             <div class="row">
            
                
                <div class="card" style="width: 38rem;">
                    <div class="card-body">
                        <h5 class="card-title"><strong> date debut : <br>{{ $demande->date_debut }}</strong></h5>
                        <h5 class="card-title"><strong> date fin : <br> {{ $demande->date_fin  }}</strong></h5>

                        <ul class="list-group list-group-flush" style="color: blue"> Details:
                            <li class="list-group-item" style="color: black"><strong> nb jours </strong> <br>{{ $demande->nb_jours }}</li>
                            <li class="list-group-item"style="color: black"><strong>raison </strong> <br> {{ $demande->Raison }}</li>
                            <li class="list-group-item"style="color: black"><strong>etat </strong> <br>{{ $demande->etat }}</li>
                        </ul>
                        <hr>
                        <a href="{{ route('demandes.edit', ['demande' => $demande->id]) }}" class="btn btn-warning" title="Edit demande {{ $demande->id }}">
                            <i class="fas fa-user-edit"></i> edit
                        </a> 
                        <a href="" data-toggle="modal" data-target=".bd-example-modal-sm1" class="btn btn-danger" >delete </a>
                        
                        <form action="{{ route('demandes.destroy', ['demande' => $demande->id]) }}" method="post" id="delete-demande-form">@csrf @method('DELETE')</form>
                       
                    </div>

                </div>
             </div>
        </div>
    </div>



      <div class="modal fade bd-example-modal-sm1" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title">Are you sure  ? </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          
            <div class="modal-footer">
                <button type="button"  data-dismiss="modal" class="btn btn-light btn-sm">Close</button>
                <a href="#" class="btn btn-danger btn-sm" title="Delete demande {{ $demande->id }}"
                  onclick="event.preventDefault(); document.querySelector('#delete-demande-form').submit()"
                  ><i class="fas fa-user-slash" ></i>  delete </a>
              </div>
          </div>
         
        </div>
      </div>
</div>

                
                


@endsection
 
            
               
          
