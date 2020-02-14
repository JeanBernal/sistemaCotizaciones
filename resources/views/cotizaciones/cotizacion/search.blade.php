{!!Form::open(array('url'=>'cotizaciones/cotizacion','method'=>'GET','autocomplete'=>'off','role'=>'search'))!!}

<div class="form-group">
   <div class="input-group">
        <input type="text" class="" name="searchText" placeholder="Buscar..." value="{{$searchText}}">
        <span class="input-group-btn">
            <button type="submit" class="btn btn-primary">Buscar</button>
        </span>
    </div>

</div>
<!--<script>
      $(document).ready(function () {
          $("#t1").change(function () {
              var value = $("#texto3").val();
              $("#texto2").val(value);
          });
      });
</script>
<div class="col-8 mb-3">
              <label for="validationTooltip01" id="clinom">Cliente</label>
              <input type="text" class="form-control" id="t1" name="searchText" placeholder="Nombre o Razón Social" value="{{$searchText}}">
              <div class="valid-tooltip">
                Looks good!
              </div>  
 </div>-->


{{Form::close()}}