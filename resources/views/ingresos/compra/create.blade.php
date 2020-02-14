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
<div class="col-lg-6 container-fluid">
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <h3>Compras</h3>

            @if(count($errors)>0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
            @endif
        </div>
    </div>


    {!!Form::open(array('url'=>'ingresos/compra','method'=>'POST','autocomplete'=>'off'))!!}
    {{Form::token()}}

    <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <div class="form-group">
                <label for="nombre">Proveedor</label>
                <select name="proveedor_id" id="proveedor_id" class="form-control selectpicker" data-live-search="true">
                    @foreach($proveedores as $proveedor)
                    <option value="{{$proveedor->idproveedor}}">{{$proveedor->nombre}}</option>
                    @endforeach
                </select>                
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 mt-4">
            <div class="form-group">
                <a href="{{URL::action('ProveedorController@edit',$proveedor->idproveedor)}}"> <button type="button" id="bt-edit" class="btn btn-info">Editar</button></a>
                <a href="{{URL('almacen/proveedor/create')}}"> <button type="button" class="btn btn-success ml-2">Nuevo</button></a>
            </div>
        </div> 
    </div>    
       
        <div class="form-row">
            <div class="col-4">                    
                <label for="validationTooltip01">País</label>
                <input type="text" class="form-control" id="pais" placeholder="" required readonly>                        
             </div>
            <div class="col-4">
                <label for="validationTooltip01">Ciudad</label>
                <input type="text" class="form-control" id="ciudad" placeholder="" required readonly>
            </div>
            <div class="col-4">
                <label for="validationTooltip01">Dirección</label>
                <input type="text" class="form-control" id="direccion" placeholder="" required readonly>
            </div>
        </div>
        <div class="form-row">
            <div class="col-4">
                <label for="validationTooltip01">Email</label>
                <input type="text" class="form-control" id="email" placeholder="" required readonly>
            </div>
            <div class="col-4">
                <label for="validationTooltip01">Teléfono</label>
                <input type="text" class="form-control" id="telefono" placeholder="" required readonly>
            </div>
            <div class="col-4 mb-3">
                <label for="validationTooltip01">Moneda</label>
                <input type="text" class="form-control" id="moneda" placeholder="Peso Colombiano" required readonly>
            </div>
        </div>
        
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="form-group">
                        <label for="direccion">Tipo Comprobante</label>
                        <select name="tipo_comprobante" id="tipo_comprobante" class="form-control">
                            <option value="Factura">Factura</option>
                            <option value="Recibo">Recibo</option>
                            <option value="Ticket">Ticket</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="form-group">
                        <label for="serie_comprobante">Serie Comprobante</label>
                        <input type="text" name="serie_comprobante" id="serie_comprobante"
                            value="{{old('serie_comprobante')}}" class="form-control"
                            placeholder="Serie Comprobante">
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="form-group">
                        <label for="num_comprobante">Número Comprobante</label>
                        <input type="text" name="num_comprobante" id="num_comprobante" required
                            value="{{old('num_comprobante')}}" class="form-control"
                            placeholder="Número Comprobante">
                    </div>
                </div>
            </div>
            <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <div class="form-group">
                            <label for="lpproducto" id="lpproducto"> Producto</label>
                            <input type="text" style="border-color: #007bff" name="pproducto" id="pproducto" class="form-control" placeholder="Nombre Producto">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <div class="form-group">
                            <label for="idproducto" id="idproducto"> Producto Id</label>
                            <input type="hidden" name="producto_id" id="producto_id" class="form-control" placeholder="Id Producto">
                        </div>
                    </div>
            </div>
            <div class="row">                    
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    <div class="form-group">
                        <label for="cantidad">Cantidad</label>
                        <input type="number" name="pcantidad" id="pcantidad" class="form-control"
                            placeholder="Cantidad">
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    <div class="form-group">
                        <label for="stock">Stock</label>
                        <input type="number" name="pstock" disabled id="pstock"  class="form-control"
                            placeholder="Stock">
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    <div class="form-group">
                        <label for="precio_cotizacion">Precio Compra</label>
                        <input type="number" disabled name="pprecio_compra" id="pprecio_compra"
                            class="form-control" placeholder="P. Compra">
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    <div class="form-group">
                        <label for="descuento">Precio Venta</label>
                        <input type="number" name="pprecio_venta" id="pprecio_venta" class="form-control"
                            placeholder="P. Venta">
                    </div>
                </div>                   
            </div>            
                    
            
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="form-group">
                        <!--<input name="_token" value="{{ csrf_token() }}" type="hidden">-->
                        <button class="btn btn-primary" id="bt-add" type="button">Agregar</button>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="">
                    <table id="iddetalles" class="table table-striped table-bordered table-condensed table-hover">
                        <thead style="background-color:#00a69e">
                            <th style="color:white">Opciones</th>
                            <th style="color:white">Producto</th>
                            <th style="color:white">Cantidad</th>
                            <th style="color:white">Precio Compra</th>
                            <th style="color:white">Precio Venta</th>
                            <th style="color:white">Subtotal</th>
                        </thead>
                        <tfoot id="allprods">
                            <th>TOTAL</th>
                            <th id="nomprods"></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th> <h4 id="total">$ 0.00</h4> <input type="hidden" name="total_cotizacion" id="total_cotizacion"> </th>
                        </tfoot>
                        <tbody>

                        </tbody>
                    </table>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button class="btn btn-primary" type="submit" id="guardar">Guardar</button>
                        <button class="btn btn-danger" type="reset">Cancelar</button>
                    </div>
                </div>
            </div>   
        </div>
            <div class="col-lg-6 container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <h3>Productos <a href="{{URL('almacen/producto/create')}}"> <button type="button" class="btn btn-success">Nuevo</button></a>
                        </h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-condensed table-hover" id="myTable">
                                <thead>
                                    <th>Id</th>
                                    <th>Nombre</th>
                                    <th>Código</th>
                                    <th>Categoría</th>
                                    <th>Stock</th>
                                    <th>Imagen</th>
                                    <th>Estado</th>
                                    <th>Opciones</th>
                                </thead>
                                <tbody class="o" id="products"></tbody>
                            </table>
                        </div>
                    </div>
                
                </div>   
            </div>
        </div>   
    </div>
    {!!Form::close()!!}


    <!-- Modal --
    <div class="modal fade" id="productCotization" tabindex="-1" role="dialog" aria-labelledby="productCotizationTitle"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="productCotizationTitle">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="row justify-content-center">-->
                        
                    <!--</div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" id="saveCotizacion">Guardar cambios</button>
                </div>
            </div>
        </div>
    </div>-->

    <script>
/////////****************  AGREGAR A TABLA COTIZACION   **************///////////        
    $(document).ready(function(){
        $('#bt-add').click(function(){
            agregar();
    });
});
        var cont = 0;
        total = 0;
        subtotal = [];
        $("#guardar").hide();
       // $("#pidproducto").hide();

       // function mostrarDatos() {
            //datosProducto = document.getElementById('pidproducto').value.split('_');
          //  $("#pprecio_cotizacion").val(datosProducto[2]);
            //$("#pstock").val(datosProducto[1]);

        //}

        function agregar() {
           // datosProducto = document.getElementById('pproducto').value();

           // idproducto = datosProducto[0];
            //producto = $("#pidproducto option:selected").text();
            idproducto = $("#producto_id").val();
            cantidad = $("#pcantidad").val();
            producto = $("#pproducto").val();
            precio_cotizacion=100;
            descuento = $("#pdescuento").val();
            stock = parseInt($("#pstock").val());

            //precio_cotizacion = $("#pprecio_cotizacion").val();
            //stock = $("#pstock").val();

            if (idproducto != "" && cantidad != "" && cantidad > 0) {
                if (cantidad <= stock) {
                    subtotal[cont]= (cantidad * precio_cotizacion - descuento);
                    total = total + subtotal[cont];

                    var fila = '<tr class="selected" id="fila' + cont + '"><td><button type="button" style="color:white" class="btn btn-warning" onclick="eliminar(' + cont + ');">X</button></td><td><input type="hidden" name="producto_id[]" value="' + idproducto + '">' + producto + '</td><td><input type="hidden" name="cantidad[]" id="pcantidad" value="' + cantidad + '">'+ cantidad +'</td><td><input type="hidden" name="precio_cotizacion[]" value="' + precio_cotizacion + '">' + precio_cotizacion + '</td><td><input type="hidden" name="descuento[]" id="pdescuento" value="' + descuento + '">' + descuento + '</td><td>' + subtotal[cont] + '</td></tr>';
                    cont++;
                    limpiar();
                    $("#total").html("$ " + total);
                    $("#total_cotizacion").val(total);
                    evaluar();
                    $("#iddetalles").append(fila);
                }
                else {
                    alert('su stock no cuenta con las unidades requeridas')
                }
            }
            else {
                alert('Error revise los detalles ingresados')
            }
        }
        function limpiar() {
            $("#pcantidad").val("");
            $("#pdescuento").val("");
            $("#pprecio_cotizacion").val("");

        }
        function evaluar() {
            if (total > 0) {
                $("#guardar").show();
            }
            else {
                $("#guardar").hide();
            }
        }
       function eliminar(index) {
            total = total - subtotal[index];
            $("#total").html("$ " + total);
            $("#total_cotizacion").val(total);
            $("#fila" + index).remove();
            evaluar();

        }
    

////////////********* FIN AGREGAR A COTIZACION  ***********/////////////
        $("#pproducto").hide();
        $("#lpproducto").hide();
        $("#producto_id").hide();
        $("#idproducto").hide();

       function getProducts() {
            $.ajax({
                url: "{{route('getProduct')}}",
                method: 'get',
                data: { client: '' },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: ({ data }) => {
                    var tbody = ''
                    data.forEach(element => {
                        tbody += `<tr  prodid="${element.idproducto}">
                          <td>${element.idproducto}</td>
                          <td>${element.nombre}</td>
                          <td id="pscodigo">${element.codigo}</td>
                          <td>${element.categoria}</td>
                          <td>${element.stock}</td>
                          <td>
                              <img src="{{asset('/imagenes/productos')}}/${element.imagen}" alt="${element.nombre}" height="70px" width="70px" class="img-thumbnail">
                          </td>
                          <td>${element.estado}</td>
                          <td>
                              <!--<a href="" data-target="#modal-delete-${element.idproducto}" data-toggle="modal"> <button class="btn btn-danger">Eliminar</button></a>-->
                              <!--<button type="button" class="btn btn-primary  add-cotizacion" idProd="${element.idproducto}">-->
                              <button type="button" class="btn btn-success add-cotizacion" idProd="${element.idproducto}">
                                    ✓
                              </button>
                          </td>
                        </tr>`
                        
                    });
                    // DataTable - Tabla Productos
                    $(document).ready(function () {
                    $('#myTable').DataTable();
                    });

                    $('#products').html(tbody);
                    
                    
                    $(".add-cotizacion").on('click', function(){
                        var id_cot = $(this).attr("idprod");
                        var rowName = $("tr[prodid='" + id_cot + "'] td").eq(1).text();
                        var rowId = $("tr[prodid='" + id_cot + "'] td").eq(0).text();
                        var rowStock = $("tr[prodid='" + id_cot + "'] td").eq(4).text();
                        $("#pstock").val(rowStock);
                        $("#producto_id").val(rowId);
                        $("#pproducto").val(rowName);
                        $("#pproducto").slideDown().css({color:"007bff", fontWeight:"bold"});
                        $("#lpproducto").slideDown();
                    });
                   
                }
            })
        }
        getProducts();
        
            $('#cliente_id').val('').select2({ placeholder: 'Seleccione un cliente' });
            $('#pidproducto').val('').select2({ placeholder: 'Select an option' });
            
            $('#cliente_id').change(function (e) {
                $.ajax({
                    url: "{{route('getClientId')}}",
                    method: 'post',
                    data: { client: e.currentTarget.value },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: ({ vendedor, fecha, pais, ciudad, direccion, email, idcliente, nombre, num_documento, telefono, tipo_cliente, tipo_documento }) => {
                            $("#nombre").val(nombre),
                            $("#direccion").val(direccion),
                            $("#telefono").val(telefono),
                            $("#email").val(email),
                            $("#ciudad").val(ciudad),
                            $("#pais").val(pais)
                            
                    }
                })





});
       
    </script>