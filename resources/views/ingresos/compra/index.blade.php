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

<div class="p-4 ml-4 mr-4">
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">

            <h3>Listado de Compras <a href="compras/create"> <button class="btn btn-success">Nuevo</button></a></h3>
            
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="table-responsive">
                <table id="indexcomp" class="table table-striped table-bordered table-condensed table-hover">
                    <thead>
                        <th>Fecha</th>
                        <th>Proveedor</th>
                        <th>Comprobante</th>
                        <th>Impuesto</th>
                        <th>Total</th>
                        <th>Estado</th>
                        <th>Opciones</th>
                    </thead>
                    @foreach ($comprasprov as $comprov)
                    <tr>
                        <td>{{$comprov->fecha_hora}}</td>
                        <td>{{$comprov->nombre}}</td>
                        <td>{{$comprov->tipo_comprobante. ': '.$comprov->serie_comprobante. '-'.
                        $comprov->num_comprobante}}</td>
                        <td>{{$comprov->impuesto}}</td>
                        <td>{{$comprov->total_cotizacion}}</td>
                        <td>{{$comprov->estado}}</td>
                        <td>
                            <a href="{{URL::action('Comp_provController@show',$comprov->idcomp_prov)}}"> <button class="btn btn-info">Detalle</button></a>
                            <a href="" data-target="#modal-delete-{{$comprov->idcomp_prov}}" data-toggle="modal"> <button class="btn btn-danger">Cancelar</button></a>

                        </td>
                        
                    </tr>
                    @include('ingresos.compra.modal')
                    @endforeach
                </table>
            </div>
            {{$comprasprov->render()}}
        </div>
    </div>
</div>    
<!-- jQuery 2.1.4 -->
<script>  
    $(document).ready(function () {
        $('#indexcomp').DataTable();
    });
</script>