<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<style>	
	body {
		font: 10px normal Helvetica, Arial, sans-serif;
	}
	table {
	    border-collapse: collapse;
	    width: 100%;
	}
	table td {border-collapse: collapse; border:1px solid black;}
	</style>
</head>
<body>
<table style="width: 100%;">
	<tr>
	<td style="text-align: center; border:0px;" colspan="2">SOLICITUD DE PRESTAMO LABORAL 2017</td>
	</tr>
	<tr>
		<td style="border:0px;"> <img width="150px" src="http://www.opcionessacimex.com/img/header/logoSacimex.png" alt=""> </td>
		<td style="text-align: right; border:0px;"> <strong> <?php echo ' SAC-DHO-PRS-2017'; ?></strong></td>
	</tr>
	<tr>
		<td style="text-align: right; border:0px;" colspan="2"><strong>
			<?php
			$dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
			$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
			 
			echo 'Oaxaca de Juárez, Oaxaca, a <br>'.$dias[date('w')]." ".date('d')." de ".$meses[date('n')-1]. " del ".date('Y') ;
			//Salida: Viernes 24 de Febrero del 2012 
			?>
			</strong>
		 	<br>
            <img width="150px" src="http://www.opcionessacimex.com/img/header/logoHuman.png" alt="">
		</td>
	</tr>
	<tr>
		<td style="border:0px;" colspan="2">
			GERENCIA DE DESARROLLO HUMANO Y ORGANIZACIONAL <br>
			TECHNOLOGICAL HUMAN PROVISION, SA DE CV <br>
			PRESENTE.</strong>
		</td>
	</tr>
</table>
<table style="width: 100%; ">
	<tr>
		<td style="border:0px;">
			<p><?php echo $_GET['nombreEmpleado'] ?>, colaborador de la empresa TECHNOLOGICAL HUMAN PROVISION, SA DE CV, desde <?php echo $_GET['fechaInicioLaboral']; ?> y actualmente prestando mis servicios a la empresa OPCIONES SACIMEX SA DE CV SOFOM ENR como <?php echo $_GET['puestoTrabajo']; ?> solicito, de acuerdo a los beneficios empresariales vigentes, un préstamo personal urgente sin interés</p>

			<p>El monto solicitado asciende a $<?php echo $_GET['montoSolicitado'];?>  
			<!-- CONVERSION DE NÚMERO A LETRA -->
			<?php 
			$cantidad =  $_GET['montoSolicitado'];
			$xcantidad = str_replace('.', '', $cantidad);
			echo "(".num_to_letras($cantidad).")";
			 ?>
			 <!-- TERMINA CONVERSION -->
			comprometiéndome a pagar la totalidad del mismo en un periodo no mayor a <?php echo $_GET['numeroCatorcenas'] ?> catorcenas, autorizando al área de DHO me haga retenciones del sueldo que percibo por la cantidad de $<?php echo $_GET['montoRetencion']; ?> las primeras catorcenas, y la última de $<?php echo $_GET['ultimaRetencion'] ?>, todo en el entendido que se esté de acuerdo en lo descrito. Esperando contar con su compresión, quedo a sus órdenes.</p>
		</td>
	</tr>
</table>
<br>

<table width="100%" >
	<tr>
		<td>Tipo de imprevisto: <?php echo $_GET['tipoImprevisto'] ?><br> </td>
		<td>Nombre: <?php echo $_GET['nombreEmpleado'] ?><br></td>
	</tr>
	<tr>
		<td>Fecha requerida para el préstamo: <?php echo $_GET['fechaPrestamo'] ?><br></td>
		<td>WNFIUEIENEINR<br></td>
	</tr>
	<tr>
		<td>Notas: <br><br><br></td>
		<td>Firma y fecha: <br><br><br></td>
	</tr>
	<tr>
		<td>Firma y Huellas (Índices ambas manos): <br><br><br></td>
		<td>Observaciones:<br><br><br></td>
	</tr>
</table>
<br>
<hr>
<br>
<table width="100%"  >
	<tr>
		<td  align="center">SÓLO DESARROLLO HUMANO Y ORGANIZACIONAL</td>
	</tr>
	<tr>
		<td ><p>Estimado colaborador le notifico que su solicitud ha sido procesada, autorizandose un préstamo personal de:
			$<?php echo $_GET['montoSolicitado'];?>  pagaredo a  <?php echo $_GET['numeroCatorcenas'] ?> catrocenas, con descuentos de $<?php echo $_GET['montoRetencion']; ?> las primeras catorcenas, y la última de $<?php echo $_GET['ultimaRetencion'] ?>.</p>
		</td>
	</tr>
	<tr>
</table>
<?php echo '<table width="100%" ;>
			<tr>
				<td>Catorcena</td>
				<td>Descuento</td>
				<td>Saldo</td>
			</tr>'; ?>
<?php  	
$numeroCatorcenas 	= $_GET['numeroCatorcenas'];
$montoSolicitado	= $_GET['montoSolicitado'];
$montoRetencion 	= $_GET['montoRetencion'];
$i=1;
$saldo = $montoSolicitado;
while ($i <= $numeroCatorcenas-1) {
	$saldo = $saldo-$montoRetencion;
	echo '<tr>
			<td>'.$i.'</td>
			<td> $'.$montoRetencion.'</td>
			<td> $'.$saldo.'</td>
		  </tr>';
   	$i++;
}
echo '<tr>
		<td>'.$numeroCatorcenas.'</td>
		<td> $'.$saldo.'</td>
		<td> $ ---.--</td>
	  </tr>';
?>	
<?php echo '</table>'; ?>
<br>
<br>
<table  >
	<tr>
		<td style="border:0px;" width="50%;">Atentamente</td>
		<td style="text-align: right; border:0px;"><small>Debo y pagaré incondicionalmente a la orden de OPCIONES SACIMEX SA DE CV SOFOM ENR, en su domicilio fiscal y de acuerdo a la forma de pago, la cantidad descrita </small></td>
	</tr>
	<tr >
		<td style="border:0px;" width="50%;">_____________________________________<br> Nombre y firma representante DHO</td>
		<td style="text-align: right; border:0px;">_____________________________________<br><strong><?php echo $_GET['nombreEmpleado']; ?></strong><br><strong><?php echo $_GET['puestoTrabajo']; ?></strong></td>
	</tr>
</table>
<br>
<table style="width: 100%;"">
	<tr>
		<td style="border:0px;">
			<small>C.C. Lic. Erick García Pérez-----------------------Gerente de Administración <br>
			C.C. Lic. Jaime Jimenez Cristóbal --------------- Gerente Comercial</small>

		</td>
	</tr>
</table>

</body>
</html>