<?php 
  require_once('../../conexion/conexion.php');
  $conexion = conectar();
  $mes = $_POST['mes'];
  $d1 = mysqli_fetch_array(mysqli_query($conexion,"select ROUND(AVG(Temperatura),2) AS temp from temperaturasdiarias WHERE MONTH(HoraRegistro) = $mes and DAY(HoraRegistro) = 1 "));
  $conexion = conectar();
  $d2 = mysqli_fetch_array(mysqli_query($conexion,"select ROUND(AVG(Temperatura),2) AS temp from temperaturasdiarias WHERE MONTH(HoraRegistro) = $mes and DAY(HoraRegistro) = 2 "));
  $conexion = conectar();
  $d3 = mysqli_fetch_array(mysqli_query($conexion,"select ROUND(AVG(Temperatura),2) AS temp from temperaturasdiarias WHERE MONTH(HoraRegistro) = $mes and DAY(HoraRegistro) = 3 "));
  $conexion = conectar();
  $d4 = mysqli_fetch_array(mysqli_query($conexion,"select ROUND(AVG(Temperatura),2) AS temp from temperaturasdiarias WHERE MONTH(HoraRegistro) = $mes and DAY(HoraRegistro) = 4 "));
  $conexion = conectar();
  $d5 = mysqli_fetch_array(mysqli_query($conexion,"select ROUND(AVG(Temperatura),2) AS temp from temperaturasdiarias WHERE MONTH(HoraRegistro) = $mes and DAY(HoraRegistro) = 5 "));
  $conexion = conectar();
  $d6 = mysqli_fetch_array(mysqli_query($conexion,"select ROUND(AVG(Temperatura),2) AS temp from temperaturasdiarias WHERE MONTH(HoraRegistro) = $mes and DAY(HoraRegistro) = 6 "));
  $conexion = conectar();
  $d7 = mysqli_fetch_array(mysqli_query($conexion,"select ROUND(AVG(Temperatura),2) AS temp from temperaturasdiarias WHERE MONTH(HoraRegistro) = $mes and DAY(HoraRegistro) = 7 "));
  $conexion = conectar();
  $d8 = mysqli_fetch_array(mysqli_query($conexion,"select ROUND(AVG(Temperatura),2) AS temp from temperaturasdiarias WHERE MONTH(HoraRegistro) = $mes and DAY(HoraRegistro) = 8 "));
  $conexion = conectar();
  $d9 = mysqli_fetch_array(mysqli_query($conexion,"select ROUND(AVG(Temperatura),2) AS temp from temperaturasdiarias WHERE MONTH(HoraRegistro) = $mes and DAY(HoraRegistro) = 9 "));
  $conexion = conectar();
  $d10 = mysqli_fetch_array(mysqli_query($conexion,"select ROUND(AVG(Temperatura),2) AS temp from temperaturasdiarias WHERE MONTH(HoraRegistro) = $mes and DAY(HoraRegistro) = 10 "));
  $conexion = conectar();
  $d11 = mysqli_fetch_array(mysqli_query($conexion,"select ROUND(AVG(Temperatura),2) AS temp from temperaturasdiarias WHERE MONTH(HoraRegistro) = $mes and DAY(HoraRegistro) = 11 "));
  $conexion = conectar();
  $d12 = mysqli_fetch_array(mysqli_query($conexion,"select ROUND(AVG(Temperatura),2) AS temp from temperaturasdiarias WHERE MONTH(HoraRegistro) = $mes and DAY(HoraRegistro) = 12 "));
  $conexion = conectar();
  $d13 = mysqli_fetch_array(mysqli_query($conexion,"select ROUND(AVG(Temperatura),2) AS temp from temperaturasdiarias WHERE MONTH(HoraRegistro) = $mes and DAY(HoraRegistro) = 13 "));
  $conexion = conectar();
  $d14 = mysqli_fetch_array(mysqli_query($conexion,"select ROUND(AVG(Temperatura),2) AS temp from temperaturasdiarias WHERE MONTH(HoraRegistro) = $mes and DAY(HoraRegistro) = 14 "));
  $conexion = conectar();
  $d15 = mysqli_fetch_array(mysqli_query($conexion,"select ROUND(AVG(Temperatura),2) AS temp from temperaturasdiarias WHERE MONTH(HoraRegistro) = $mes and DAY(HoraRegistro) = 15 "));
  $conexion = conectar();
  $d16 = mysqli_fetch_array(mysqli_query($conexion,"select ROUND(AVG(Temperatura),2) AS temp from temperaturasdiarias WHERE MONTH(HoraRegistro) = $mes and DAY(HoraRegistro) = 16 "));
  $conexion = conectar();
  $d17 = mysqli_fetch_array(mysqli_query($conexion,"select ROUND(AVG(Temperatura),2) AS temp from temperaturasdiarias WHERE MONTH(HoraRegistro) = $mes and DAY(HoraRegistro) = 17 "));
  $conexion = conectar();
  $d18 = mysqli_fetch_array(mysqli_query($conexion,"select ROUND(AVG(Temperatura),2) AS temp from temperaturasdiarias WHERE MONTH(HoraRegistro) = $mes and DAY(HoraRegistro) = 18 "));
  $conexion = conectar();
  $d19 = mysqli_fetch_array(mysqli_query($conexion,"select ROUND(AVG(Temperatura),2) AS temp from temperaturasdiarias WHERE MONTH(HoraRegistro) = $mes and DAY(HoraRegistro) = 19 "));
  $conexion = conectar();
  $d20 = mysqli_fetch_array(mysqli_query($conexion,"select ROUND(AVG(Temperatura),2) AS temp from temperaturasdiarias WHERE MONTH(HoraRegistro) = $mes and DAY(HoraRegistro) = 20 "));
  $conexion = conectar();
  $d21 = mysqli_fetch_array(mysqli_query($conexion,"select ROUND(AVG(Temperatura),2) AS temp from temperaturasdiarias WHERE MONTH(HoraRegistro) = $mes and DAY(HoraRegistro) = 21 "));
  $conexion = conectar();
  $d22 = mysqli_fetch_array(mysqli_query($conexion,"select ROUND(AVG(Temperatura),2) AS temp from temperaturasdiarias WHERE MONTH(HoraRegistro) = $mes and DAY(HoraRegistro) = 22 "));
  $conexion = conectar();
  $d23 = mysqli_fetch_array(mysqli_query($conexion,"select ROUND(AVG(Temperatura),2) AS temp from temperaturasdiarias WHERE MONTH(HoraRegistro) = $mes and DAY(HoraRegistro) = 23 "));
  $conexion = conectar();
  $d24 = mysqli_fetch_array(mysqli_query($conexion,"select ROUND(AVG(Temperatura),2) AS temp from temperaturasdiarias WHERE MONTH(HoraRegistro) = $mes and DAY(HoraRegistro) = 24 "));
  $conexion = conectar();
  $d25 = mysqli_fetch_array(mysqli_query($conexion,"select ROUND(AVG(Temperatura),2) AS temp from temperaturasdiarias WHERE MONTH(HoraRegistro) = $mes and DAY(HoraRegistro) = 25 "));
  $conexion = conectar();
  $d26 = mysqli_fetch_array(mysqli_query($conexion,"select ROUND(AVG(Temperatura),2) AS temp from temperaturasdiarias WHERE MONTH(HoraRegistro) = $mes and DAY(HoraRegistro) = 26 "));
  $conexion = conectar();
  $d27 = mysqli_fetch_array(mysqli_query($conexion,"select ROUND(AVG(Temperatura),2) AS temp from temperaturasdiarias WHERE MONTH(HoraRegistro) = $mes and DAY(HoraRegistro) = 27 "));
  $conexion = conectar();
  $d28 = mysqli_fetch_array(mysqli_query($conexion,"select ROUND(AVG(Temperatura),2) AS temp from temperaturasdiarias WHERE MONTH(HoraRegistro) = $mes and DAY(HoraRegistro) = 28 "));
  $conexion = conectar();
  $d29 = mysqli_fetch_array(mysqli_query($conexion,"select ROUND(AVG(Temperatura),2) AS temp from temperaturasdiarias WHERE MONTH(HoraRegistro) = $mes and DAY(HoraRegistro) = 29 "));
  $conexion = conectar();
  $d30 = mysqli_fetch_array(mysqli_query($conexion,"select ROUND(AVG(Temperatura),2) AS temp from temperaturasdiarias WHERE MONTH(HoraRegistro) = $mes and DAY(HoraRegistro) = 30 "));
  $conexion = conectar();
  $d31 = mysqli_fetch_array(mysqli_query($conexion,"select ROUND(AVG(Temperatura),2) AS temp from temperaturasdiarias WHERE MONTH(HoraRegistro) = $mes and DAY(HoraRegistro) = 31 "));


  $data = array(0 => $d1['temp'], 
        1 => $d2['temp'], 
        2 => $d3['temp'], 
        3 => $d4['temp'], 
        4 => $d5['temp'], 
        5 => $d6['temp'], 
        6 => $d7['temp'], 
        7 => $d8['temp'], 
        8 => $d9['temp'], 
        9 => $d10['temp'], 
        10 => $d11['temp'], 
        11 => $d12['temp'], 
        12 => $d13['temp'], 
        13 => $d14['temp'], 
        14 => $d15['temp'], 
        15 => $d16['temp'], 
        16 => $d17['temp'], 
        17 => $d18['temp'], 
        18 => $d19['temp'], 
        19 => $d20['temp'], 
        20 => $d21['temp'], 
        21 => $d22['temp'], 
        22 => $d23['temp'], 
        23 => $d24['temp'], 
        24 => $d25['temp'], 
        25 => $d26['temp'], 
        26 => $d27['temp'], 
        27 => $d28['temp'], 
        28 => $d29['temp'], 
        29 => $d30['temp'], 
        30 => $d31['temp']
  );

  echo json_encode($data);

?>

