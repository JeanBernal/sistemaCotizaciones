<link rel="stylesheet" href="{{asset('css/bootstrap11.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/main11.css')}}">

  <div class="p-5">  
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <h3>Nueva Categoria</h3>
                
                @if(count($errors)>0)
                <div class="alert alert-danger">
                    <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                    @endforeach
                    </ul>
                </div> 
                @endif

                {!!Form::open(array('url'=>'almacen/categoria_producto','method'=>'POST','autocomplete'=>'off'))!!}
                {{Form::token()}}

                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" name="nombre" class="form-control" placeholder="Ingrese el nombre de la categoria">
                    </div>   
                    <div class="form-group">
                        <label for="descripcion">Descripción</label>
                        <input type="text" name="descripcion" class="form-control" placeholder="Ingrese una descripcion">
                    </div>   
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">Guardar</button>
                        <button class="btn btn-danger" type="reset">Cancelar</button>
                    </div>  
                {!!Form::close()!!}
        </div>
    </div>
</div>
