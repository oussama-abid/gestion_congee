
@extends('layouts.pdg')
@section('main')

<div class="content-body">
    @if (session('ajout'))
    <div class="alert alert-dismissible alert-success fade show" role="alert">
        {{ session('ajout') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
@if (session('delete'))
<div class="alert alert-dismissible alert-danger fade show" role="alert">
    {{ session('delete') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
    <div class="container-fluid">
        {{ csrf_field() }}
      
        <div class="row">
         
                <br>
            <a  class="btn btn-secondary btn-lg"  href="{{ route('employes.create') }}" role="button" > <i
                class="ti-arrow-right"></i> ajouter un  employe </a>

        </div>
     <br>
     
     
       
         

        
        <br>
        <div class="row">
            <br>
            <h2>employes:</h2>
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
                @foreach ($users as $user)
                
                <tr >
                       
                    <td >{{ $user->id }}</td>
                        
                    <td>{{ $user->name   }}</td>
                    <td>{{ $user->role }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->nbjours_tot }}</td>
                    <td>{{ $user->nbjours_rest }}</td>
                    <td> 
                        <a href="{{ route ('user.show',['user' => $user->id])}}" class="btn btn-warning"> show </a>
                        <a data-toggle="modal" data-target=".bd-example-modal-sm1" href="#" class="btn btn-danger" >Delete </a>
                        <form action="{{ route('user.destroy', ['user' => $user->id]) }}" method="post" id="delete-user-form">@csrf @method('DELETE')</form>
                     </td>
                  
                    
                   
                              </tr>
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
                                        <a href="#" class="btn btn-danger" title="Delete user {{ $user->id }}"
                                            onclick="event.preventDefault(); document.querySelector('#delete-user-form').submit()"
                                            ><i class="fas fa-user-slash"></i> delete </a>
                                        <form action="{{ route('user.destroy', ['user' => $user->id]) }}" method="post" id="delete-user-form">@csrf @method('DELETE')</form>            
                                      </div>
                                  </div>
                                 
                                </div>
                              </div>
                @endforeach
               
            </tbody>
            
            </table>
            <div class="mx-auto"  style="width: 200px;">
                {{ $users->links() }}
            </div>
        </div>



@endsection
 
            
               
          
