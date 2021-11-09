@extends('layouts.admin')
@section('main')
<div class="content-body">


    <div class="container">
        <div class="main-body">
        
              <!-- Breadcrumb -->
        
              <!-- /Breadcrumb -->
        
              <div class="row gutters-sm">
                <div class="col-md-4 mb-3">
                  <div class="card">
                    <div class="card-body">
                      <div class="d-flex flex-column align-items-center text-center">
                        <img src="{{ asset('/user.png') }}" alt="Admin" class="rounded-circle" width="150">
                        <div class="mt-3">
                          <h4>{{Auth::user()->name}}</h4>
                          
                          
                        </div>
                      </div>
                    </div>
                  </div>
                  
                </div>
                <div class="col-md-8">
                  <div class="card mb-3">
                    <div class="card-body">
                        <form action="{{ route ('user.update',['user' => Auth::user()->id])  }} " method="post">
                            @method('PUT')
                            @csrf
                            <div class="row">
                                <div class="col-sm-3">
                                  <h6 class="mb-0">Full Name</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="  {{Auth::user()->name}}" required autocomplete="name" autofocus>
                                </div>
                              </div>
                              
                              <hr>
                              <div class="row">
                                <div class="col-sm-3">
                                  <h6 class="mb-0">Email</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{Auth::user()->email}}" required autocomplete="email">
                                </div>
                              </div>
                              <hr>
                              <div class="row">
                                <div class="col-sm-3">
                                  <h6 class="mb-0">password</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{Auth::user()->email}}" required autocomplete="new-password">
                                </div>
                              </div>
                              <hr>

                              <div class="row">
                                <div class="col-sm-3">
                                  <h6 class="mb-0">confirm password</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" value="{{Auth::user()->email}}">
                                </div>
                              </div>
                              <hr>
                              <hr>
                              <div class="row">
                                    
                              </div>
                            </div>
                            <div class="col-sm-12">
                              <button type="submit" class="btn btn-warning">save </button>
                            </form>
                
                    </div>
                  </div>
    
                  
    
    
                </div>
              </div>
    
            </div>
        </div>



        </div>
@endsection
 
            
               
          
