<link rel="stylesheet" href="{{asset('css/bootstrap11.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/main11.css')}}">
    
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <h3>Editar Categoria: {{$categoria_producto->nombre}} </h3>
                {!!Form::model($categoria_producto,['method'=>'PATCH','route'=>['categoria_producto.update',$categoria_producto->idcategoria_producto]])!!}
                {{Form::token()}} 
                    <div class="form-group">
                        <label for="nombre"></label>
                        <input type="text" name="nombre" class="form-control" value="{{$categoria_producto->nombre}}" placeholder="Ingrese el nombre de la catrgoria">
                    </div>   
                    <div class="form-group">
                        <label for="descripcion"></label>
                        <input type="text" name="descripcion" class="form-control" value="{{$categoria_producto->descripcion}}" placeholder="Ingrese una descripcion">
                    </div>   
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">Guardar</button>
                        <button class="btn btn-danger" type="reset">Cancelar</button>
                    </div>  
                {!!Form::close()!!}
        </div>
    </div>

