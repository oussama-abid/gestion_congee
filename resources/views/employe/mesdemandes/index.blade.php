@extends('layouts.employe')
@section('main')
<div class="content-body">
    <!-- row -->
    @if (session('creerdemande'))
    <div class="alert alert-dismissible alert-success fade show" role="alert">
        {{ session('creerdemande') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
@if (session('enconge'))
<div class="alert alert-dismissible alert-danger fade show" role="alert">
    {{ session('enconge') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
@if (session('deleteDemande'))
<div class="alert alert-dismissible alert-success fade show" role="alert">
    {{ session('deleteDemande') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
@if (session('etat'))
<div class="alert alert-dismissible alert-danger fade show" role="alert">
    {{ session('etat') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

    
    <div class="container-fluid">
        <div class="row">
            <a  class="btn btn-secondary btn-lg"  href="{{ route('mesdemandes.create') }}" role="button" > <i
                class="ti-arrow-right"></i> Faire une demande de congé </a>

        </div>
        
        <br>
        
        <div class="row">
            
                <h2>vos demandes  :</h2>
                

                <table   class="table table-hover" style="color: black">
                    
                    <thead style="color: black" class="thead-dark">
                     <tr>
                        <th>#</th>
                        <th>Date debut </th>
                        <th>Date fin </th>
                        <th>nb jours</th>
                        <th>raison</th>
                        <th>Actions</th>
                        <th>etat</th>
                        
                       
                    </tr>
                </thead>
                <tbody >

                    @foreach ($demande as $key => $demande)
                    
                    <tr >
                           
                      <td scope="row">{{ $key+1 }}</td>    
                            
                        <td>{{ $demande->date_debut }}</td>
                        <td>{{ $demande->date_fin }}</td>
                        <td>{{ $demande->nb_jours }}</td>
                        <td>{{ $demande->Raison }}</td>
                        <td> 
                           <a href="{{ route('demandes.show', ['demande' => $demande->id]) }}" class="btn btn-warning"> show </a>
                           <a href="{{ route('demandes.edit', ['demande' => $demande->id]) }}" class="btn btn-success" >edit </a>


                            
                            
                        </td>
                        
                        <td  >{{ $demande->etat }}</td>
                        
                       
                                  </tr>
                  
                    @endforeach
                   
                </tbody>
                
                </table>
               
                
        </div>
        
@endsection
 
            
               
          
