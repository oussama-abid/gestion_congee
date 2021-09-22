@extends('layouts.employe')
@section('main')
<div class="content-body">
    <!-- row -->
    
    
    <form action="{{route('mesdemandes.store') }} " method="post">
        @include('employe.mesdemandes.form')


    </form>
                
        </div>
@endsection
 
            
               
          
