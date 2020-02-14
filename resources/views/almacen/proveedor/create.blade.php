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
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <h3>Nuevo Proveedor</h3>
                
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
                

                {!!Form::open(array('url'=>'almacen/proveedor','method'=>'POST','autocomplete'=>'off'))!!}
                {{Form::token()}}

    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" required value="{{old('nombre')}}" class="form-control" placeholder="Ingrese el nombre">
             </div> 
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for="direccion">Dirección</label>
                <input type="text" name="direccion" value="{{old('direccion')}}" class="form-control" placeholder="Ingrese la dirección">
             </div> 
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for="tipo_documento">Documento</label>
                <select name="tipo_documento" class="form-control" id="">
                        <option value="NIT">NIT</option>
                        <option value="CC">CC</option>
                        <option value="CE">CE</option>
                </select>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
             <div class="form-group">
                <label for="num_documento">Número Documento</label>
                <input type="text" name="num_documento" required value="{{old('num_documento')}}" class="form-control" placeholder="Ingrese el número de documento">
             </div> 
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for="telefono">Teléfono</label>
                <input type="text" name="telefono" value="{{old('telefono')}}"class="form-control" placeholder="Ingrese el teléfono">
            </div>  
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" value="{{old('email')}}"class="form-control" placeholder="Ingrese el email">
            </div>  
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for="ciudad">Ciudad</label>
                <input type="text" name="ciudad" value="{{old('ciudad')}}"class="form-control" placeholder="Ingrese la ciudad">
            </div>  
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for="pais">Pais</label>
                <input type="text" name="pais" value="{{old('pais')}}"class="form-control" placeholder="Ingrese el pais">
            </div>  
        </div>
        <!--<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for="vendedor">Vendedor</label>
                <input type="text" name="vendedor" value="{{old('vendedor')}}"class="form-control" placeholder="Nombre del vendedor">
            </div>  
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                </div>  
        </div>-->
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <button class="btn btn-primary" type="submit">Guardar</button>
                <button class="btn btn-danger" type="reset">Cancelar</button>
             </div>  
        </div>
    </div>            
</div>
                {!!Form::close()!!}
