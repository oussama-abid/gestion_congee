@extends('layouts.employe')
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
                      <div class="row">
                        <div class="col-sm-3">
                          <h6 class="mb-0">Full Name</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            {{Auth::user()->name}}
                        </div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-sm-3">
                          <h6 class="mb-0">Email</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            {{Auth::user()->email}}
                        </div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-sm-12">
                            <a href="{{ route ('user.edit',['user' => Auth::user()->id])}}" class="btn btn-warning"> edit </a>

                        </div>
                      </div>
                    </div>
                  </div>
    
                  
    
    
                </div>
              </div>
    
            </div>
        </div>



        </div>
@endsection
 
            
               
          
