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

            <h3>Listado de Cotizaciones <a href="cotizacion/create"> <button class="btn btn-success">Nuevo</button></a></h3>
            
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="table-responsive">
                <table id="indexcot" class="table table-striped table-bordered table-condensed table-hover">
                    <thead>
                        <th>Fecha</th>
                        <th>Cliente</th>
                        <th>Comprobante</th>
                        <th>Impuesto</th>
                        <th>Total</th>
                        <th>Estado</th>
                        <th>Opciones</th>
                    </thead>
                    @foreach ($cotizacionesprod as $cotprod)
                    <tr>
                        <td>{{$cotprod->fecha_hora}}</td>
                        <td>{{$cotprod->nombre}}</td>
                        <td>{{$cotprod->tipo_comprobante. ': '.$cotprod->serie_comprobante. '-'.
                        $cotprod->num_comprobante}}</td>
                        <td>{{$cotprod->impuesto}}</td>
                        <td>{{$cotprod->total_cotizacion}}</td>
                        <td>{{$cotprod->estado}}</td>
                        <td>
                            <a href="{{URL::action('Cotizacion_prodController@show',$cotprod->idcotizacion_producto)}}"> <button class="btn btn-info">Factura</button></a>
                            <a href="" data-target="#modal-delete-{{$cotprod->idcotizacion_producto}}" data-toggle="modal"> <button class="btn btn-danger">Cancelar</button></a>

                        </td>
                        
                    </tr>
                    @include('cotizaciones.cotizacion.modal')
                    @endforeach
                </table>
            </div>
            {{$cotizacionesprod->render()}}
        </div>
    </div>
</div>    
<!-- jQuery 2.1.4 -->
<script>  
    $(document).ready(function () {
        $('#indexcot').DataTable();
    });
</script>