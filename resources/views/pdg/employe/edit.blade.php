@extends('layouts.pdg')
@section('main')

<div class="content-body">
    
<fieldset class="container">
    <h2 >Edit employe : <strong>{{ $user->id }}</strong></h2>
       
  
    <form action="{{ route ('user.update',['user' => $user->id])  }} " method="post">
        @method('PUT')
        @include('layouts.empform')
    </form>
</fieldset>

</div>

                
            

@endsection