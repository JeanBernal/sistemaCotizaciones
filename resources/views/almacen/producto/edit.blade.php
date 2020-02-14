<link rel="stylesheet" href="{{asset('css/bootstrap11.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/main11.css')}}">

  <div class="p-4">  
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <h3>Editar Producto: {{$producto->nombre}} </h3>
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
                {!!Form::model($producto,['method'=>'PATCH','route'=>['producto.update',$producto->idproducto],'files'=>'true'])!!}
                {{Form::token()}}
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" required value="{{$producto->nombre}}" class="form-control" placeholder="Ingrese el nombre del producto">
             </div> 
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for="categoria">Categoría</label>
                <select name="idcategoria_producto" class="form-control" id="">
                    @foreach ($categoriasprod as $catpro)
                        @if($catpro->idcategoria_producto==$producto->idcategoria_producto)
                        <option value="{{$catpro->idcategoria_producto}}" selected>{{$catpro->nombre}}</option>
                        @else
                        <option value="{{$catpro->idcategoria_producto}}">{{$catpro->nombre}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
             <div class="form-group">
                <label for="codigo">Código</label>
                <input type="text" name="codigo" value="{{$producto->codigo}}" class="form-control">
             </div> 
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for="cantidad">Stock</label>
                <input type="text" name="stock" value="{{$producto->stock}}" class="form-control">
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for="descripcion">Descripción</label>
                <input type="text" name="descripcion" value="{{$producto->descripcion}}" class="form-control" >
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for="imagen">Imagen</label>
                <input type="file" name="imagen" class="form-control">
                @if (($producto->imagen)!="")
                    <img src="{{asset('imagenes/productos/'.$producto->imagen)}}" alt="" height="300px" width="300px">
                @endif
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
