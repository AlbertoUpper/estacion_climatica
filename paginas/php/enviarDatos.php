<?php 
	require_once('../../conexion/conexion.php');
	$conexion = conectar();
	$temperatura = $_GET['temperatura'];
	$humedad = $_GET['humedad'];
	$luz = $_GET['luz'];
	$sqlAgregarTemperatura = "INSERT INTO temperaturasdiarias (Temperatura, humedad, luz) VALUES ($temperatura, $humedad,$luz)";
	if (mysqli_query($conexion, $sqlAgregarTemperatura)) {
		echo "Datos agregados con exito";
	}
    mysqli_close($conexion);
?>
