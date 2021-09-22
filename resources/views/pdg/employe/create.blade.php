@extends('layouts.pdg')
@section('main')
<div class="content-body">
    <!-- row -->
    <form method="POST" action="{{ route('employes.store') }}">

    @include('layouts.empform')

</form>

                
        </div>
@endsection