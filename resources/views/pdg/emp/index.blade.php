
@extends('layouts.pdg')
@section('main')
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <div class="row">
            <br>
            <h2>employes:</h2>
            <table   class="table table-hover" style="color: black">
                <thead style="color: black" class="thead-dark">
                 <tr >
                    <th>ID</th>
                    <th>Nom </th>
                    <th>Prenom </th>
                    <th>Poste</th>
                    <th>email</th>
                    <th>tel</th>
                    <th>nb jours total</th>
                    <th>nb jours rest</th>
                    
                   
                </tr>
            </thead>
            <tbody >
                @foreach ($employe as $employ)
                
                <tr >
                       
                    <td >{{ $employ->id }}</td>
                        
                    <td>{{ $employ->nomemploye   }}</td>
                    <td>{{ $employ->prenomemploye }}</td>
                    <td>{{ $employ->poste }}</td>
                    <td>{{ $employ->emailemploye }}</td>
                    <td>{{ $employ->tel }}</td>
                    <td>{{ $employ->nbjours_tot   }}</td>
                    <td>{{ $employ->nbjours_rest  }}</td>
                    
                   
                              </tr>
              
                @endforeach
               
            </tbody>
            
            </table>
            <div class="mx-auto"  style="width: 200px;">
                {{ $employe->links() }}
        </div>
    </div>
@endsection
 
            
               
          
