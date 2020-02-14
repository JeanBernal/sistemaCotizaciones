<html>
<head>
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="{{asset('bootstrap/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('css/main.css')}}">

<script src="{{asset('bootstrap/bootstrap.min.js')}}"></script>
</head>
<body>
    

<div class="p-4 ml-4 mr-4">
        <div class="row">
            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
                <div class="form-group">
                    <label for="cliente"> <strong> Cliente </strong></label>
                <p>{{$cotizacion_data->nombre}}</p>
                </div> 
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                <div class="form-group">
                <a href="{{url('dynamic_pdf/pdf')}}"> <button type="button" class="btn btn-success">PDF</button></a>
                </div> 
            </div>
        </div>    
        <div class="row">    
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="form-group">
                    <label for=""> <strong> Tipo Comprobante </strong></label>
                    <p>{{$cotizacion_data->tipo_comprobante}}</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="form-group">
                    <label for="serie_comprobante"> <strong> Serie Comprobante </strong></label>
                    <p>{{$cotizacion_data->serie_comprobante}}</p>
                </div> 
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="form-group">
                    <label for="num_comprobante"> <strong> Número Comprobante </strong></label>
                    <p>{{$cotizacion_data->num_comprobante}}</p>
                </div> 
            </div>
        </div>
        <div class="row col-lg-12">
            <div class="card col-lg-12">
                <div class="card-body">
                    
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <table id="detalles" class="table table-striped table-condensed table-bordered table-hover">
                            <thead style="background-color: 00a69e">
                            
                                <th style="color:white">Producto</th>
                                <th style="color:white">Cantidad</th>
                                <th style="color:white">Precio Venta</th>
                                <th style="color:white">Descuento</th>
                                <th style="color:white">Subtotal</th>
                            </thead>
                            <tfoot>                                
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th><h4 id="total">{{$cotizacion_data->total_cotizacion}}</h4></th>
                            </tfoot>
                            <tbody>
                            @foreach ($detallespro_data as $det)
                                <tr>
                                    <td>{{$det->producto}}</td>
                                    <td>{{$det->cantidad}}</td>
                                    <td>{{$det->precio_cotizacion}}</td>
                                    <td>{{$det->descuento}}</td>
                                    <td>{{$det->cantidad*$det->precio_cotizacion-$det->descuento}}</td>
                                    
                                    
                                </tr>
                            @endforeach    
                            </tbody>
                        </table>
                    </div>
                </div>
            </div> 
         </div> 
</div> 
</body>   
</html>