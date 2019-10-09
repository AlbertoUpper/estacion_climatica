<?php 
	require_once('../../conexion/conexion.php');
	$conexion = conectar();
	$temperatura = $_GET['temperatura'];
	$sqlAgregarTemperatura = "CALL agregarTemperatura($temperatura)";
	mysqli_query($conexion, $sqlAgregarTemperatura);
    mysqli_close($conexion);
?>