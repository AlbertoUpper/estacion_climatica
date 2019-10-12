<?php 
	require_once('../../conexion/conexion.php');
	$conexion = conectar();
	$temperatura = $_GET['temperatura'];
	$sqlAgregarTemperatura = "INSERT INTO temperaturasdiarias (Temperatura) VALUES ($temperatura)";
	mysqli_query($conexion, $sqlAgregarTemperatura);
    mysqli_close($conexion);
?>
