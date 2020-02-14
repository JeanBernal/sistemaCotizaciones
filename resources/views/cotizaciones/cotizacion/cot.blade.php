<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>cabezal</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap11.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/main11.css')}}">
    <script src="{{asset('js/jquery.js')}}"></script>
    <script src="{{asset('js/popper11.js')}} "></script>
    <script src="{{asset('js/jQuery-2.1.4.min.js')}}"></script>
    
    <!-- Bootstrap 3.3.5 -->
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/bootstrap-select.min.js')}}"></script>
    
  </head>
  <body>

    <div class=" row">
      <div class="col-lg-5 container-fluid cotizacion">
        <form class="needs-validation" novalidate>
          <div class="form-row cabezal">
            <!--<div class="col-8 mb-3">
              <label for="validationTooltip01">Formato</label>
              <input type="text" class="form-control" id="validationTooltip01" placeholder=""  required>
              <div class="valid-tooltip">
                Looks good!
              </div>
            </div>
            <div class="col-4 mb-3">
              <label for="validationTooltip01">Categoría</label>
              <input type="text" class="form-control" id="validationTooltip01" placeholder="Nombre de la categoría"  required>
              <div class="valid-tooltip">
                Looks good!
              </div>
            </div>-->
          </div>
          <div class="form-row">
          @include('cotizaciones.cliente.clicot')
          <!--Aqui llama el label "cliente"-->
            <div class="col-4 mb-3">
              <label for="validationTooltip01">Consecutivo</label>
              <input type="text" class="form-control" id="t1" placeholder=""  required>
              <div class="valid-tooltip">
                Looks good!
              </div>
            </div>
          </div>
          
          <div class="form-row">
            
            <div class="col-4 mb-3">
              <label for="validationTooltip01">Empresa</label>
              <input type="text" class="form-control" id="nombre" value="" placeholder=""  required>
              <div class="valid-tooltip">
                Looks good!
              </div>
            </div>
  
            <div class="col-4 mb-3">
              <label for="validationTooltip01">País</label>
              <input type="text" class="form-control" id="pais" placeholder=""  required>
              <div class="valid-tooltip">
                Looks good!
              </div>
            </div>
            <div class="col-4 mb-3">
              <label for="validationTooltip01">Fecha</label>
              <input type="text" class="form-control" id="fecha" placeholder=""  required>
              <div class="valid-tooltip">
                Looks good!
              </div>
            </div>
          </div>
          <div class="form-row">
            <div class="col-4 mb-3">
              <label for="validationTooltip01">Ciudad</label>
              <input type="text" class="form-control" id="ciudad" placeholder=""  required>
              <div class="valid-tooltip">
                Looks good!
              </div>
            </div>
            <div class="col-4 mb-3">
              <label for="validationTooltip01">Dirección</label>
              <input type="text" class="form-control" id="direccion" placeholder=""  required>
              <div class="valid-tooltip">
                Looks good!
              </div>
            </div>
            <div class="col-4 mb-3">
              <label for="validationTooltip01">Vendedor</label>
              <input type="text" class="form-control" id="vendedor" placeholder=""  required>
              <div class="valid-tooltip">
                Looks good!
              </div>
            </div>
          </div>
          <div class="form-row">
            <div class="col-4 mb-3">
              <label for="validationTooltip01">Email</label>
              <input type="text" class="form-control" id="email" placeholder=""  required>
              <div class="valid-tooltip">
                Looks good!
              </div>
            </div>
            <div class="col-4 mb-3">
              <label for="validationTooltip01">Teléfono</label>
              <input type="text" class="form-control" id="telefono" placeholder=""  required>
              <div class="valid-tooltip">
                Looks good!
              </div>
            </div>
            <div class="col-4 mb-3">
              <label for="validationTooltip01">Moneda</label>
              <input type="text" class="form-control" id="moneda" placeholder="Peso Colombiano"  required>
              <div class="valid-tooltip">
                Looks good!
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-4 mb-3">
              <label for="validationTooltip01">Celular</label>
              <input type="text" class="form-control" id="celular" placeholder="Celular"  required>
              <div class="valid-tooltip">
                Looks good!
              </div>
            </div>
            
            <div class="col-2 mb-3 mt-4">
              <a href="cliente/edit"> <button class="btn btn-primary" >Editar</button> </a>
            </div>
            <div class="col-2 mb-3 mt-4">
              <a href="cliente/create"> <button class="btn btn-primary" >Crear</button> </a>
            </div>
            <div class="col-2 mb-3 mt-4">
              <a href="#"> <button class="btn btn-primary" >Guardar</button> </a>
            </div>
          </div>
          
        </form>
        <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-condensed table-hover">
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
                        <a href="{{URL::action('Cotizacion_prodController@edit',$cotprod->idcotizacion_producto)}}"> <button class="btn btn-info">Editar</button></a>
                        <a href="" data-target="#modal-delete-{{$cotprod->idcotizacion_producto}}" data-toggle="modal"> <button class="btn btn-danger">Eliminar</button></a>

                    </td>
                    
                </tr>
                @include('cotizaciones.cotizacion.modal')
                @endforeach
            </table>
        </div>
        {{$cotizacionesprod->render()}}
    </div>
        </div>

        <div class="row estados">
          <h3>El estado de la cotización es</h3>
        </div>

        <div class="row ">
          <div class="col-4 mb-3">

          </div>
          <div class="col-4 mb-3">
            <button class="btn btn-primary boton" >Pendiente</button>
          </div>
          <div class="col-4 mb-3">
            <button class="btn btn-primary boton" >Aprobada</button>
          </div>
        </div>
        <div class="row ">
          <div class="col-12 mb-3">
            <button class="btn btn-primary boton" >Guardar</button>
          </div>
        </div>
      </div>
      <div class="col-lg-5 container-fluid stock">
        <p>Espacio para agregar tabla de productos</p>
        <table class="table table-dark">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">First</th>
              <th scope="col">Last</th>
              <th scope="col">Handle</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">1</th>
              <td>Mark</td>
              <td>Otto</td>
              <td>@mdo</td>
            </tr>
            <tr>
              <th scope="row">2</th>
              <td>Jacob</td>
              <td>Thornton</td>
              <td>@fat</td>
            </tr>
            <tr>
              <th scope="row">3</th>
              <td>Larry</td>
              <td>the Bird</td>
              <td>@twitter</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    
    
    <script>
      $(document).ready(function () {
          $("#t1").keydown(function ({ keyCode }) {
            if(keyCode===13){
              console.log($("#t1").val())
              $.ajax({
                url:"{{route('getClient')}}",
                method:'post',
                data:{ client:$("#t1").val() },
                headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success:({vendedor, fecha, pais, ciudad, direccion, email, idcliente, nombre, num_documento, telefono, tipo_cliente, tipo_documento})=>{
                  $("#nombre").val(nombre),
                  $("#direccion").val(direccion),
                  $("#telefono").val(telefono),
                  $("#email").val(email),
                  $("#ciudad").val(ciudad),
                  $("#pais").val(pais),
                  $("#fecha").val(fecha), 
                  $("#vendedor").val(vendedor)
                }
              })
            }
          });
      });
    </script>
  </body>
</html>
