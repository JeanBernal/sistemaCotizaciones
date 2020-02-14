<div class="row">
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">

        <h3>Listado de Clientes <a href="cliente/create"> <button class="btn btn-success">Nuevo</button></a></h3>
        @include('cotizaciones.cliente.search')
    </div>
</div>

<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-condensed table-hover">
                <thead>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Tipo Documento</th>
                    <th>Número Documento</th>
                    <th>Dirección</th>
                    <th>Teléfono</th>
                    <th>Email</th>
                </thead>
                @foreach ($clientes as $cli)
                <tr>
                    <td>{{$cli->idcliente}}</td>
                    <td>{{$cli->nombre}}</td>
                    <td>{{$cli->tipo_documento}}</td>
                    <td>{{$cli->num_documento}}</td>
                    <td>{{$cli->direccion}}</td>
                    <td>{{$cli->telefono}}</td>
                    <td>{{$cli->email}}</td>
                    <td>{{$cli->ciudad}}</td>
                    <td>{{$cli->pais}}</td>
                    <td>{{$cli->vendedor}}</td>
                    <td>
                        <a href="{{URL::action('ClienteController@edit',$cli->idcliente)}}"> <button class="btn btn-info">Editar</button></a>
                        <a href="" data-target="#modal-delete-{{$cli->idcliente}}" data-toggle="modal"> <button class="btn btn-danger">Eliminar</button></a>

                    </td>
                    
                </tr>
                @include('cotizaciones.cliente.modal')
                @endforeach
            </table>
        </div>
        {{$clientes->render()}}
    </div>
</div>
