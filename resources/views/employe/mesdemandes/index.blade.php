@extends('layouts.employe')
@section('main')
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <div class="row">
                <br>
                <h2>demandes you have:</h2>
                <table   class="table table-hover" style="color: black">
                    <thead style="color: black" class="thead-dark">
                     <tr>
                        <th>ID</th>
                        <th>Date debut </th>
                        <th>Date fin </th>
                        <th>nb jours</th>
                        <th>raison</th>
                        <th>user id</th>
                        <th>etat</th>
                        
                       
                    </tr>
                </thead>
                <tbody >
                    @foreach ($demande as $demand)
                    
                    <tr >
                           
                        <td >{{ $demand->id }}</td>
                            
                        <td>{{ $demand->date_debut }}</td>
                        <td>{{ $demand->date_fin }}</td>
                        <td>{{ $demand->nb_jours }}</td>
                        <td>{{ $demand->Raison }}</td>
                        <td>{{ $demand->user_id }}</td>
                        <td>{{ $demand->etat }}</td>
                        
                       
                                  </tr>
                  
                    @endforeach
                   
                </tbody>
                
                </table>
                <div class="mx-auto"  style="width: 200px;">
                    {{ $demande->links() }}
                </div>
                
        </div>
@endsection
 
            
               
          
