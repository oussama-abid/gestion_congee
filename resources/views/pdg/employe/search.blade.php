
@include('layouts.pdg')
@include('layouts.navbarpdg')

<meta name="_token" content="{{ csrf_token() }}">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
@section('main')
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <div class="row">
            <a  class="btn btn-secondary btn-lg"  href="{{ route('employes.create') }}" role="button" > <i
                class="ti-arrow-right"></i> ajouter un  employe </a>

        </div>
     <br>
  

     <div class="form-group">
        <input type="text" class="form-controller" id="search" name="search">
        </div>
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
            </tbody>
            
            </table>
            <script type="text/javascript">
                $('#search').on('keyup',function(){
                $value=$(this).val();
                $.ajax({
                type : 'get',
                url : '{{URL::to('search')}}',
                data:{'search':$value},
                success:function(data){
                $('tbody').html(data);
                }
                });
                })
                </script>
                <script type="text/javascript">
                $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
                </script>
         
        </div>

    </div>

@endsection