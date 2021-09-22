@extends('layouts.admin')
@section('main')
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <div class="row">
                <br>
                <h2>demandes you have:</h2>
                <table   class="table table-hover" style="color: black">
                    <thead style="color: black" class="thead-dark">
                     <tr style="text-align: center">
                        <th>ID</th>
                        <th>user id</th>
                        <th>Date debut </th>
                        <th>Date fin </th>
                        <th>nb jours</th>
                        <th>raison</th>
                       <th style="text-align: center">actions</th>
                        <th>etat</th>
                        
                       
                    </tr>
                </thead>
                <tbody style="text-align: center">
                    @foreach ($demande as $demande)
                    
                    <tr >
                           
                        <td >{{ $demande->id }}</td>
                        <td>{{ $demande->user_id }}</td>
                        <td>{{ $demande->date_debut }}</td>
                        <td>{{ $demande->date_fin }}</td>
                        <td>{{ $demande->nb_jours }}</td>
                        <td>{{ $demande->Raison }}</td>
                        <td> 
                        <a class="btn btn-success" href=" {{ route('accept', ['demande' => $demande->id]) }} ">accepter </a>
                        <a class="btn btn-danger" href=" {{ route('refuse', ['demande' => $demande->id]) }} ">refuser </a>


                    </td>
                        <td>{{ $demande->etat }}</td>
                        
                       
                                  </tr>
                  
                    @endforeach
                   
                </tbody>
                
                </table>
              
                
        </div>
@endsection
 
            
               
          
