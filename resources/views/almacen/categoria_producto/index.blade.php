<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="{{asset('bootstrap/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('css/select2.min.css')}}">
<link rel="stylesheet" href="{{asset('http://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css')}}">
<script src="{{asset('js/jquery11.js')}}"></script>
<script src="{{asset('bootstrap/popper.min.js')}}"></script>
<script src="{{asset('bootstrap/bootstrap.min.js')}}"></script>
<script src="{{asset('js/select2.min.js')}}"></script>
<script src="{{asset('js/app.min.js')}}"></script>
<script src="{{asset('http://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js')}}"></script>

<div class="p-5">
<div class="row">
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">

        <h3>Listado de Categorias <a href="categoria_producto/create"> <button class="btn btn-success">Nuevo</button></a></h3>
        
    </div>
</div>

<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-condensed table-hover" id="myTable">
                <thead>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Opciones</th>
                </thead>
                @foreach ($categoriasprod as $catprod)
                <tr>
                    <td>{{$catprod->idcategoria_producto}}</td>
                    <td>{{$catprod->nombre}}</td>
                    <td>{{$catprod->descripcion}}</td>
                    <td>
                        <a href="{{URL::action('Categoria_productoController@edit',$catprod->idcategoria_producto)}}"> <button class="btn btn-info">Editar</button></a>
                        <a href="" data-target="#modal-delete-{{$catprod->idcategoria_producto}}" data-toggle="modal"> <button class="btn btn-danger">Eliminar</button></a>

                    </td>
                    
                </tr>
                @include('almacen.categoria_producto.modal')
                @endforeach
            </table>
        </div>
        {{$categoriasprod->render()}}
    </div>
</div>
</div>
<script src="{{asset('http://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js')}}"></script>
<script>
    $(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>