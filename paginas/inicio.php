<?php 
	date_default_timezone_set('America/El_Salvador');
	require_once('conexion/conexion.php');
	$conexion = conectar();
	if (isset($_POST['fecha'])) {
		$fechaa = $_POST['fecha'];
		$fechatratada = date_format(date_create($fechaa),'d-M-Y');
		$sql = "select * from temperaturasdiarias WHERE Date_format(HoraRegistro,'%Y-%m-%d') = '$fechaa' ";
	}else{
		$sql = "select * from temperaturasdiarias";
	}	
	$resultado = mysqli_query($conexion, $sql);



?>
<style>
	table {
        width: 100%;
    }

thead, tbody, tr, td, th { display: block; }

tr:after {
    content: ' ';
    display: block;
    visibility: hidden;
    clear: both;
}

tbody {
    height: 400px;
    overflow-y: auto;
}

tbody td, thead th {
    width: 32%;
    float: left;
}
</style>
<div class="container mt-5 pt-3">
	<h1>Registro de temperaturas</h1>	
	<div class="row mt-3">
		<div class="col-md-7">
			<table class="table table-hover table-">
    			<thead>
				    <tr>
				    	<th>ID</th>
						<th>Temperatura °C</th>
						<th>Fecha / hora</th>		      
				    </tr>
				</thead>
			    <tbody>			    	
			    	<?php if(mysqli_num_rows($resultado) < 1): 
			       		echo "<tr><td class='col-12 text-center'>No hay registro de temperaturas</td></tr>";
			       	else:			       
					while($temp = mysqli_fetch_array($resultado)):?>			       
					<?php
						$fecha = date_format(date_create($temp['HoraRegistro']), 'd-M-Y h:i A');
					?>
			        <tr>
			        	<td><?= $temp['ID']; ?></td>
			        	<td>&nbsp;&nbsp;&nbsp;&nbsp;<?= $temp['Temperatura']; ?></td>			        	
			        	<td><?= $fecha; ?></td>
			        </tr>
					<?php
					 endwhile;
					 endif; 				
					mysqli_close($conexion);			
					?>
			    </tbody>
			</table>
		</div>		
		<div class="col-md-5">
			<div class="row">
				<div class="col-md-6">
					<form action="" method="POST" id="formFecha">
						<div class="form-group">						
								<label for="fecha">Buscar por fecha:</label>
								<input type="date" class="form-control btn-outline-primary" id="fecha" name="fecha">
							<p class="small"><?php if(isset($fechaa)) echo "Fecha busqueda:  " . $fechatratada; ?></p>							
						</div>
					</form>
				</div>
				<div class="w-100"></div>
				<div class="col-md-12 border">
					<h4>Datos de interes:</h4>
					<?php
						$dia = date("d");
						$mes = date("m");
						
						$fecha_actual = date("d-m-Y");
						$ayer = date("d",strtotime($fecha_actual."- 1 days")); 
						$maniana = date("d",strtotime($fecha_actual."+ 1 days")); 

						$conex = conectar();
						$sqlPromedio = "select ROUND(AVG(Temperatura),2) AS tempProm, ROUND(AVG(humedad),2) AS humedadProm, ROUND(AVG(luz),2) AS luzProm from temperaturasdiarias WHERE MONTH(HoraRegistro) = $mes and DAY(HoraRegistro) = $dia ";
						$resultadoPromedio = mysqli_query($conex, $sqlPromedio); 
						$prom = mysqli_fetch_array($resultadoPromedio);
						////////////////////////////////////////////////////////
						$conexi = conectar();
						$sqlPromedioAyer = "select ROUND(AVG(Temperatura),2) AS tempPromAyer from temperaturasdiarias WHERE MONTH(HoraRegistro) = $mes and DAY(HoraRegistro) = $ayer";
						$resultadoPromedioAyer = mysqli_query($conexi, $sqlPromedioAyer); 
						$promAyer = mysqli_fetch_array($resultadoPromedioAyer);
						///////////////////////////////////////////////////////
						//reduccion
						$restaA = (-1 * intval($ayer)) + intval($dia);
						$restaTemps = -1* $promAyer['tempPromAyer'] + $prom['tempProm'];
						$a = $restaTemps / $restaA;
						//fin reduccion
						//sustitucion de a en ecuacion
						$multiplicacion = $a * $dia;
						$b = $prom['tempProm'] - $multiplicacion;
						$prediccion = $a * $maniana + $b;
						///////////////////////////////////////////////////////

					?>
					<div id="seccion" class="border">
					 	<p>Promedio de temperatura de hoy :  <?= $prom['tempProm'];?>°C </p>
					 	<p>Promedio de humedad de hoy :  <?= $prom['humedadProm'];?> </p>
					 	<p>Promedio de luz de hoy :  <?= $prom['luzProm'];?> </p>
					 	<p>Predicción para mañana: <?=$prediccion ?>°C</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	$('#fecha').on('change', function(e){
		
		$('#formFecha').submit();
	})
</script>