@extends('layouts.employe')
@section('main')

<div class="content-body">
    
<fieldset class="container">
    <h2 >Edit demande : <strong>{{ $demande->id }}</strong></h2>
       
  
    <form action="{{route('demandes.update' ,['demande' => $demande->id]) }} " method="post">
        @method('PUT')
        @include('employe.mesdemandes.form')
    </form>
</fieldset>

</div>

                
            

@endsection
 
            
               
          
