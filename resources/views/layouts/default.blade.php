<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    @include('includes.head')
    <title></title>
  </head>
  <body>
    <header class="row">
    @include('includes.header')
    </header>

  <div class="container">
    <div class="container-fluid">
        <div class="col-lg-12">
            <h1 class="page-header">
                <!-- <i class="glyphicon glyphicon-calendar"></i> -->
                @yield('pageTitle')
                <!-- <small>Publicados</small>
                <small>Planeados</small> -->
            </h1>
        </div>
    </div>

  <div class="container-fluid">
    @yield('vistaCalendario')
  </div>

<div class="container-fluid">
    @yield('infoCalendario')

</div>
  </div>

  </body>
</html>
