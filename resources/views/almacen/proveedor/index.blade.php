@extends('layouts.app')
@section('content')
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
<div class="p-4">
<div class="row">
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">

        <h3>Listado de Proveedores <a href="proveedor/create"> <button class="btn btn-success">Nuevo</button></a></h3>
    </div>
</div>

<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-condensed table-hover" id=provTab>
                <thead>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Tipo Documento</th>
                    <th>Número Documento</th>
                    <th>Dirección</th>
                    <th>Teléfono</th>
                    <th>Email</th>
                    <th>Ciudad</th>
                    <th>País</th>
                    <th>Opciones</th>
                </thead>
                @foreach ($proveedores as $pro)
                <tr>
                    <td>{{$pro->idproveedor}}</td>
                    <td>{{$pro->nombre}}</td>
                    <td>{{$pro->tipo_documento}}</td>
                    <td>{{$pro->num_documento}}</td>
                    <td>{{$pro->direccion}}</td>
                    <td>{{$pro->telefono}}</td>
                    <td>{{$pro->email}}</td>
                    <td>{{$pro->ciudad}}</td>
                    <td>{{$pro->pais}}</td>
                    <td>
                        <a href="{{URL::action('ProveedorController@edit',$pro->idproveedor)}}"> <button class="btn btn-info">Editar</button></a>
                        <a href="" data-target="#modal-delete-{{$pro->idproveedor}}" data-toggle="modal"> <button class="btn btn-danger">Eliminar</button></a>

                    </td>
                    
                </tr>
                @include('almacen.proveedor.modal')
                @endforeach
            </table>
        </div>
        {{$proveedores->render()}}
    </div>
</div>
</div>
<script>
$(document).ready(function () {
  $('#provTab').DataTable();
  });
</script>
@endsection