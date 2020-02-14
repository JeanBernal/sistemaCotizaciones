<link rel="stylesheet" href="{{asset('css/bootstrap11.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/main11.css')}}">

<div class="p-5">    
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <h3>Editar Cliente: {{$cliente->nombre}}</h3>
        @if(count($errors)>0)
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
    </div>
</div>

        {!!Form::model($cliente,['method'=>'PATCH','route'=>['cliente.update', $cliente->idcliente]])!!}
        {{Form::token()}}

<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" required value="{{$cliente->nombre}}" class="form-control">
        </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
            <label for="direccion">Direccion</label>
            <input type="text" name="direccion" value="{{$cliente->direccion}}" class="form-control">
        </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form group">
            <label for="documento">Documento</label>
            <select name="tipo_documento" id="" class="form-control">
                @if($cliente->tipo_documento=='NIT')
                <option value="NIT" selected>NIT</option>
                <option value="CC">CC</option>
                <option value="CE">CE</option>
                @elseif($cliente->tipo_documento=='CC')
                <option value="NIT">NIT</option>
                <option value="CC" selected>CC</option>
                <option value="CE">CE</option>
                @else
                <option value="NIT">NIT</option>
                <option value="CC">CC</option>
                <option value="CE" selected>CE</option>
                @endif
            </select>
        </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
            <label for="num_documento">Numero Documento</label>
            <input type="text" name="num_documento" value="{{$cliente->num_documento}}" class="form-control">
        </div>    
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
            <label for="telefono">telefono</label>
            <input type="text" name="telefono" value="{{$cliente->telefono}}" class="form-control">
        </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
            <label for="direccion">Dirección</label>
            <input type="text" name="direccion" value="{{$cliente->direccion}}" class="form-control">
        </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" value="{{$cliente->email}}" class="form-control">
        </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
            <label for="ciudad">Ciudad</label>
            <input type="text" name="ciudad" value="{{$cliente->ciudad}}" class="form-control">
        </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
            <label for="pais">País</label>
            <input type="text" name="pais" value="{{$cliente->pais}}" class="form-control">
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
     