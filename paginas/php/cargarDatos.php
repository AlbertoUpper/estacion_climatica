<?php 
	require_once('../../conexion/conexion.php');
	$conexion = conectar();
	if (isset($_GET['fecha'])) {
		$fechaa = $_GET['fecha'];
		$fechatratada = date_format(date_create($fechaa),'d-M-Y');
		$sql = "select * from temperaturasdiarias WHERE Date_format(HoraRegistro,'%Y-%m-%d') = '$fechaa' ";
	}else{
		$sql = "select * from temperaturasdiarias";
	}	
	$resultado = mysqli_query($conexion, $sql);
	if(mysqli_num_rows($resultado) < 1){
   		echo "<tr><td class='col-12 text-center'>No hay registro de temperaturas</td></tr>";
	}else{  
	$conta=0; 
		while($temp = mysqli_fetch_array($resultado)){	
			$fecha = date_format(date_create($temp['HoraRegistro']), 'd-M-Y h:i A');	
    		echo "<tr>";
	    	echo "<td>".$temp['ID']."</td>";
	    	echo "<td>&nbsp;&nbsp;&nbsp;&nbsp;".$temp['Temperatura']."</td>";
	    	echo "<td>".$fecha."</td>";
    		echo "</tr>";	
    		$conta +=$temp['ID'];
		}
	}	 	 
	mysqli_close($conexion);				
?>