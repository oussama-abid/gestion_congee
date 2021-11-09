@extends('layouts.pdg')
@section('main')
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
      @if (session('accept'))
      <div class="alert alert-dismissible alert-success fade show" role="alert">
          {{ session('accept') }}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
      </div>
  @endif
  @if (session('refuse'))
  <div class="alert alert-dismissible alert-danger fade show" role="alert">
      {{ session('refuse') }}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </button>
  </div>
  @endif
        <div class="row">
                <br>
                <h2>Les demandes :</h2>
                <table   class="table table-hover" style="color: black">
                    <thead style="color: black" class="thead-dark">
                     <tr style="text-align: center">
                        <th>#</th>
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
                    @foreach ($demande as $key => $demande)
                    
                    <tr >
                           
                      <td scope="row">{{ $key+1 }}</td>                        <td ><a href="{{ route ('user.show',['user' => $demande->user_id])}}" style="color: rgb(47, 0, 255)">{{ $demande->user_id }}</a> </td> 
                        <td>{{ $demande->date_debut }}</td>
                        <td>{{ $demande->date_fin }}</td>
                        <td>{{ $demande->nb_jours }}</td>
                        <td>{{ $demande->Raison }}</td>
                        <td> 
                        <a class="btn btn-success" href=" {{ route('acceptpdg', ['demande' => $demande->id]) }} " data-toggle="modal" data-target="#exampleModal" >accepter </a>
                        <a class="btn btn-danger" href=" {{ route('refusepdg', ['demande' => $demande->id]) }} "data-toggle="modal" data-toggle="modal" data-target=".bd-example-modal-sm2">refuser </a>
                        <div style="display: none">

                            {{ $employe=DB::table('users')->where('role','employe')->where('id','!=',$demande->user_id)
                            ->where('statut','disponible')
                            ->get()
                             }}
                        
                        </div>
    
                       <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">choisir un remplaçant parmis les employees disponible   </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="{{route('notifications.store') }}" method="post">
                @csrf
                <label for="employe" style="color: black">les employes dispo </label>
    
                <select  name="employe"  class="form-control "    id="employe" required >
                    @foreach ($employe  as $emp)
                     <option value=" {{ $emp->name }} ">{{ $emp->name }}</option>    
                     @endforeach
                </select>
                <input type="number " name="id" hidden value="{{$demande->id}}">

                <br>
                <label  style="color: black">Un message sera envoyé a l'employé pour l'informer  </label>
    <br>
                <button class="btn btn-success" type="submit"  required> save </button>
            </form>

          </div>
        
        </div>
      </div>
    </div>

                    </td>
                        <td>{{ $demande->etat }}</td>
                        
                       
                                  </tr>
                      
                <div class="modal fade bd-example-modal-sm2" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
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
                          <a class="btn btn-danger" href=" {{ route('refusepdg', ['demande' => $demande->id]) }} ">refuser </a>
                        </div>
                    </div>
                   
                  </div>
                </div>
                    @endforeach

                 
                </tbody>
                
                </table>
              
                
        </div>
@endsection
 
            
               
          
