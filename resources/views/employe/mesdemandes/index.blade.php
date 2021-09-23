@extends('layouts.employe')
@section('main')
<div class="content-body">
    <!-- row -->
    
    
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

                    @foreach ($demande as $demande)
                    
                    <tr >
                        
                           
                        <td >{{ $demande->id }}</td>
                            
                        <td>{{ $demande->date_debut }}</td>
                        <td>{{ $demande->date_fin }}</td>
                        <td>{{ $demande->nb_jours }}</td>
                        <td>{{ $demande->Raison }}</td>
                        <td> 
                           <a href="{{ route('demandes.show', ['demande' => $demande->id]) }}" class="btn btn-warning"> show </a>
                           <a href="{{ route('demandes.edit', ['demande' => $demande->id]) }}"class="btn btn-success">edit </a>


                            
                            
                        </td>
                        <td>{{ $demande->etat }}</td>
                        
                       
                                  </tr>
                  
                    @endforeach
                   
                </tbody>
                
                </table>
               
                
        </div>
@endsection
 
            
               
          
