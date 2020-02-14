<meta name="csrf-token" content="{{ csrf_token() }}">




<div class="">
        <div class="">
            <div class="">
                <div class="form-group">
                    <label for="cliente"> <strong> Cliente </strong></label>
                <p>{{$cotizacion_producto->nombre}}</p>
                </div> 
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                <div class="form-group">
                    <!--<a href="{{url('dynamic_pdf/pdf')}}"> <button type="button" class="btn btn-success">PDF</button></a>-->
                </div> 
            </div>
        </div>    
        <div class="">    
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="form-group">  
                    <label for=""> <strong> Tipo Comprobante </strong></label>
                    <p>{{$cotizacion_producto->tipo_comprobante}}</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="form-group">
                    <label for="serie_comprobante"> <strong> Serie Comprobante </strong></label>
                    <p>{{$cotizacion_producto->serie_comprobante}}</p>
                </div> 
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="form-group">
                    <label for="num_comprobante"> <strong> Número Comprobante </strong></label>
                    <p>{{$cotizacion_producto->num_comprobante}}</p>
                </div> 
            </div>
        </div>
        <div class="">
            <div class="">
                <div class="">
                    
                    <div class="">
                        <table width=100% style="border-collapse: collapse; border:1px">
                            <tr>
                            
                                <th style="border: 1px solid; padding12px;" width="20%">Producto</th>
                                <th style="border: 1px solid; padding12px;" width="20%">Cantidad</th>
                                <th style="border: 1px solid; padding12px;" width="20%">Precio Venta</th>
                                <th style="border: 1px solid; padding12px;" width="20%">Descuento</th>
                                <th style="border: 1px solid; padding12px;" width="20%">Subtotal</th>
                            </tr>
                            
                            
                            @foreach ($detallespro as $det)
                                <tr>
                                    <td style="border: 1px solid; padding12px;" width="20%">{{$det->producto}}</td>
                                    <td style="border: 1px solid; padding12px;" width="20%">{{$det->cantidad}}</td>
                                    <td style="border: 1px solid; padding12px;" width="20%">{{$det->precio_cotizacion}}</td>
                                    <td style="border: 1px solid; padding12px;" width="20%">{{$det->descuento}}</td>
                                    <td style="border: 1px solid; padding12px;" width="20%">{{$det->cantidad*$det->precio_cotizacion-$det->descuento}}</td>
                                    
                                    
                                </tr>
                            @endforeach    
                            
                            <tfoot>                                
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th ><h4 id="total">{{$cotizacion_producto->total_cotizacion}}</h4></th>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div> 
         </div> 
</div>    
