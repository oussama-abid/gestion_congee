
@extends('layouts.pdg')
@section('main')
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <div class="row">
            <a  class="btn btn-secondary btn-lg"  href="{{ route('employes.create') }}" role="button" > <i
                class="ti-arrow-right"></i> ajouter un  employe </a>

        </div>
        
        <br>
        <div class="row">
            <br>
            <h2>employe:</h2>
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
                @foreach ($users as $user)
                
                <tr >
                       
                    <td >{{ $user->id }}</td>
                        
                    <td>{{ $user->name   }}</td>
                    <td>{{ $user->role }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->nbjours_tot }}</td>
                    <td>{{ $user->nbjours_rest }}</td>
                    <td> 
                        <a href="" class="btn btn-warning"> edit </a>
                       
                     </td>
                  
                    
                   
                              </tr>
              
                @endforeach
               
            </tbody>
            
            </table>
            <div class="mx-auto"  style="width: 200px;">
                {{ $users->links() }}
            </div>
        </div>

    </div>
@endsection
 
            
               
          
