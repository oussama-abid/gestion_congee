@extends('layouts.pdg')
@section('main')
<div class="content-body">
    <!-- row -->
    <form method="POST" action="{{ route('admins.store') }}">

    @include('layouts.adminform')

</form>

                
        </div>
@endsection