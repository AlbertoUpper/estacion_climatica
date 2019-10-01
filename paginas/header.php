<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="temperaturas diarias regitradas segun medidor de temperatura DHT11">    
    <link rel="icon" type="image/png" href="multimedia/img/temper.png" />
    <title>Temperaturas</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="css/bootstrap.css">    

    <!-- Custom styles for this template -->    
     <script src="js/jquery.min.js"></script>   
    <link href="css/icomoon.css" rel="stylesheet">           
    <script src="js/pace.min.js"></script>    
    <style>
    .pace {
      -webkit-pointer-events: none;
      pointer-events: none;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
    }

    .pace-inactive {
      display: none;
    }

    .pace .pace-progress {
      background: #ffff;
      position: fixed;
      z-index: 2000;
      top: 0;
      right: 100%;
      width: 100%;
      height: 4px;
    }
    </style>
    <script>
       $(function(){                            
        $("body").niceScroll({
          cursorcolor:"#007dfd",
          cursorwidth:"7px",
          cursorfixedheight: 200,
          cursorborder: "1px solid aquamarine",
          cursorbordercolor: "#fff",
          cursorborderradius:2
        });
       })
    </script>    
  </head>
  <body style="display: flex; min-height: 100vh; flex-wrap: wrap;" >
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
     <a class="navbar-brand" href="index.php">
    <img src="" class="img-fluid" width="35" height="35" alt="Logo">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse text-white" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item ">
          <a class="nav-link <?php echo ($pagina == 'inicio') ? 'active' : ''; ?>" href="?p=inicio">Inicio <span class="sr-only">(current)</span></a>
        </li>                     
      </ul>
    </div>
    </nav>
    <div><span class="ir-arriba icon-arrow-up"></span></div>


