<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>responsive</title>
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap-select.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/styleclientes.css')}}">
  </head>
  <body>
    <div class="contenedor">
      <header class="header col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <a href="index.html"><div class="logo col-lg-2 col-md-2 col-sm-2 col-xs-6"></div></a>
        <div class="bienvenida col-lg-8 col-md-8 col-sm-7 col-xs-6">
          <input type="checkbox" name="" value="" id="btn-menu">
          <label for="btn-menu"><img src="css/img/menu30.png" alt=""></label>
          <nav class="menu">
            <ul>
              <li> <a href="index.html">Inicio</a></li>
              <li> <a href="clientes.html" style="border-bottom: 3px solid #17a59d;">Clientes</a></li>
              <li> <a href="proveedoresyproductos.html">Proveedores y Productos</a></li>
              <li> <a href="roles.html">Roles</a></li>
              <li> <a href="reportes.html">Reportes</a></li></a>
              <li> <a href="cotizacionyventa.html">Cotización y Venta</a></li>
            </ul>
          </nav>
        </div>
        @yield('contenido')
        <a href="cuenta.html">
          <div class="perfil col-lg-2 col-md-2 col-sm-3 col-xs-6"><img  src="css/img/perfil.png"  alt=""style="
            border-right-width: 50px; margin-right: 23%;">Administrador1
          </div>
        </a>
        <div class="perfilh col-md-2 col-sm-3 col-xs-6">
          <div class="perfil1"><img src="css/img/perfilh.png"  alt=""style="border-right-width: 50px;margin-top: 1%;">
            <div class="Administrador1">Administrador1</div> <div class="nombreuser">hhhhhhhhh</div></div>
          <div class="perfil2">
            <a href="cuenta.html"><div class="cuenta"> <p>Cuenta</p> </div></a> <a href="lodding.html"><div class="salir"> <p>Salir</p> </div></a>
          </div>
        </div>
      </header>

      <div class="general col-md-12">
         
      </div>
      
      </div>
      


  <footer>
    <div class="footer col-lg-12 col-md-12 col-sm-12 col-xs-12"> <p>SOLAR v2.0 by Think2Click 2019</p> </div>
  </footer>
  </body>
</html>