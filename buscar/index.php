<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Buscar Musica con Spotify Web API PHP</title>

    <script src="http://code.jquery.com/jquery-2.1.4.min.js" type="text/javascript"></script>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js" type="text/javascript"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <link rel="stylesheet" type="text/css" href="../css/estilos.css">

  </head>
  <body>
  	<div class="container">

        <div class="row">
            <div class="col-md-12">
                <h1>Buscar Artista</h1>
                <p>Escribe el nombre de un artista y luego has clic en el botón Buscar:</p>
                <form id="search-form" role="form">
                    <div class="form-group">
                        <input type="text" id="query" value="" class="form-control" placeholder="Escribe el nombre de un Artista..."/>
                    </div>
                    <button type="submit" id="search" class="btn btn-primary" />Buscar</button>
                    <button type="reset" id="search" class="btn btn-alert" />Limpiar</button>
                </form>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div id="resultados">                   
                </div>
            </div>        
        </div>

    </div>

    <!-- Handeblars JS -->
    <script src="../js/handlebars-v4.0.0.js" type="text/javascript"></script>    
    <script id="resultados-template" type="text/x-handlebars-template">
        {{#each albums.items}}
            <div style="background-image:url({{images.0.url}})" data-album-id="{{id}}" class="cover">               
            </div>
            <!--
            <br>
            <h6 class="nombre">{{name}}</h6>
            <h6 class="popularidad">{{href}}</h6>
            -->        
        {{/each}}
    </script>
    <script src="../js/buscar.js" type="text/javascript"></script>
    <!-- Fin Handeblars JS -->

  </body>
</html>