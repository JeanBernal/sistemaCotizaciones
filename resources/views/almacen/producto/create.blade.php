<link rel="stylesheet" href="{{asset('css/bootstrap11.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/main11.css')}}">
 <div class="p-5">   
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <h3>Nuevo Producto</h3>
                
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
                {!!Form::open(array('url'=>'almacen/producto','method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}
                {{Form::token()}}
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" value="{{old('nombre')}}" class="form-control" placeholder="Ingrese el nombre del producto">
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for="">Categoria</label>
                <select name="idcategoria_producto" id="" class="form-control" >
                    @foreach($categoriasprod as $catpro)
                        <option value="{{$catpro->idcategoria_producto}}">{{$catpro->nombre}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for="codigo">Código</label>
                <input type="text" name="codigo" value="{{old('codigo')}}" class="form-control" placeholder="Ingrese el código del producto">
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for="cantidad">Stock</label>
                <input type="text" name="stock" value="{{old('stock')}}" class="form-control" placeholder="Ingrese una cantidad">
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for="descripcion">Descripción</label>
                <input type="text" name="descripcion" value="{{old('descripcion')}}" class="form-control" placeholder="Ingrese una descripción">
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for="imagen">Imagen</label>
                <input type="file" name="imagen" class="form-control">
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
            <button class="btn btn-primary" type="submit">Guardar</button>
            <button class="btn btn-danger" type="reset">Cancelar</button> 
            </div>
        </div>
    </div>            
</div>
                {!!Form::close()!!}