<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<style>	
	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 10px normal Helvetica, Arial, sans-serif;
	}
	</style>
</head>
<body>
<table style="width: 100%;">
	<tr>
		<td> <img src=" <?php echo base_url().'/assets/images/sacimex.png' ?> " alt=""> </td>
		<td> <img src=" <?php echo base_url().'/assets/images/tech.png' ?> " alt=""> </td>
	</tr>
	<tr>
		<td></td>
		<td><strong>
			<?php
			$dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
			$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
			 
			echo $dias[date('w')]." ".date('d')." de ".$meses[date('n')-1]. " del ".date('Y') ;
			//Salida: Viernes 24 de Febrero del 2012 
			?>
		 	<br>
            ASUNTO:</strong> <?php echo 'asunto'; ?>
		</td>
	</tr>
	<tr><td><br></td></tr> <!-- espacio -->
	<tr>
		<td><strong>GERENCIA DE DESARROLLO HUMANO Y ORGANIZACIONAL <br>
			TECHNOLOGICAL HUMAN PROVISION, SA DE CV <br>
			PRESENTE.</strong>
		</td>
	</tr>
</table>

	
