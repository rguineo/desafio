<?php 
  //error_reporting(0);
  session_start(); //para iniciar una nueva sesion

  include_once('models/session.php');

  $user = $_POST['username'];
  $pass = $_POST['password'];

  $respuesta = ModeloSesion::iniciarSesionMdl($user, $pass);
  $registro = registroLog::registrarLog($user, $pass);
  

  if ($respuesta == null){
   // echo "<script> alert('DATOS INCORRECTOS VUELVE A INTENTAR') </script>";
    echo '<script> window.location = "index.php" </script>';
  } else {
    $intentos = registroLog::buscarLog();
  }

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="css/custom.css">

    <title>Programacion Segura</title>
  </head>
  <body class="home">
    

    <div class="container">
      <h1>Felicitaciones !</h1>
      <h4> Lo Solucionaste... </h4>
      <br><img class="skater" src="img/occami_hoverboad_gif.gif">
      <h3>Intentos </h3>

      <table class="table table-success table-striped ">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Fecha Hora</th>
            <th scope="col">Usuario</th>
            <th scope="col">Pass</th>
          </tr>
        </thead>
        <tbody>

          <?php 
            foreach ($intentos as $key => $value){
              echo "<tr>";
                echo "<td>".$value['id_log']."</td>";
                echo "<td>".$value['date_log']."</td>";
                echo "<td>".$value['user_log']."</td>";
                echo "<td>".$value['pass_log']."</td>";
              echo "</tr>"; 
            }

          ?>
        </tbody>
      </table>

      <center><img src="img/deadpool.png"></center>
    </div>


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
  </body>
</html>