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


<div class="modal fade" aria-hidden="true" 
role="dialog" tabindex="-1" id="modal-delete-{{$prod->idproducto}}">
    {{Form::Open(array('action'=>array('ProductoController@destroy', $prod->idproducto),'method'=>'delete'))}}
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-tittle">Eliminar Producto</h4> 
                    <button type="button" class="close" data-dimiss="modal"
                    aria-label="Close">
                    <span aria-hidden="true">x</span>
                    </button>
                
            </div>
            <div class="modal-body">
                <p>Está a punto de eliminar un producto</p>
            
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary">Confirmar</button>
            </div>
        </div>
    </div>
    {{Form::Close()}}
</div>