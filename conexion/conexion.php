<?php 
	function conectar(){
		$conex = mysqli_connect('localhost','root','');
		mysqli_select_db($conex,'b5_24563809_temperaturas');
		return $conex;
	}
?>