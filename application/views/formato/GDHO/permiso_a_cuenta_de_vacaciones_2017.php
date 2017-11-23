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
	<td style="text-align: center; border:0px;" colspan="2">PERMISO A CUENTA DE VACACIONES 2017</td>
	</tr>
	<tr>
		<td style="border:0px;"> <img width="150px" src="http://www.opcionessacimex.com/img/header/logoSacimex.png" alt=""> </td>
		<td style="text-align: right; border:0px;"> <strong> <?php echo 'ASUNTO: SAC-DHO-VCC-2017'; ?></strong></td>
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
		<td style="border:0px;" colspan="2"><strong><?php echo $_GET['nombreRecibe']; ?><br>
			GDHO- DE DESARROLLO HUMANO Y ORGANIZACIONAL <br>
			TECHNOLOGICAL HUMAN PROVISION, SA DE CV <br>
			PRESENTE.</strong>
		</td>
	</tr>

	<tr>
		<td style="border:0px;" colspan="2">
				<p><strong><?php echo $_GET['nombreEmpleado']; ?></strong>, colaborador de la empresa TECHNOLOGICAL HUMAN PROVISION, SA DE CV, 
				y actualmente prestando mis servicios en la empresa denominada: OPCIONES SACIMEX S.A. DE C.V. SOFOM E.N.R. 
				por medio de la presente hago llegar ante usted una solicitud para que me sea otorgado un <strong>"permiso a cuenta de vacaciones"</strong> 
				con fecha
					<?php 
						if (empty($_GET['permisoPeriodo2'])) {
							echo $_GET['permisoPeriodo1'];
						}else{
							echo $_GET['permisoPeriodo1']." y fecha ".$_GET['permisoPeriodo2'];
						}
					 ?>
				</p>

			<p>Me comprometo a que mis actividades correspondientes al periodo solicitado quedarán cubiertas y con conocimiento de mi 
				jefe inmediato. Esperando poder contar con su responsable apoyo, quedo a sus órdenes.</p>

			<small>*El periodo descrito integra (1) Domingo y (0) días inhábiles los cuales no se contabilizan en los cálculos.</small>
			<table >
				<tr>
					<td colspan="2">Notas<br><br><br></td>
				</tr>
				<tr>
					<td>&nbsp;Nombre <br><br><br></td>
					<td rowspan="2">Huellas<br><br><br></td>
				</tr>
				<tr>
					<td>&nbsp; Firma <br><br><br></td>
				</tr>
			</table>
			<br>																			
			<table  >
				<tr>
					<td style="text-align: center;" colspan="3">
						<strong>OBSERVACIONES JEFE INMEDIATO</strong>
					</td>
				</tr>
				<tr>
					<td colspan="3">
						Notas(bolígrafo azul)
						<br>
						<br>
						<br>
					</td>
				</tr>
				<tr>
					<td>Nombre y puesto(bolígrafo azul) <br><br><br></td>
					<td>Firma(bolígrafo azul) <br><br><br></td>
					<td>Fecha(bolígrafo azul) <br><br><br></td>
				</tr>
			</table>
			<br>
			<table  >
				<tr>
					<td style="text-align: center;"><strong>SÓLO DESARROLLO HUMANO Y ORGANIZACIONAL</strong></td>

				</tr>
				<tr>
					<td>Describir si se autoriza, condiciona o rechaza en bolígrafo azul <br><br><br></td>
				</tr>
			</table>
			<br>
			<br>
			<br>
			<table>
				<tr>
					<td style="border:0px;">Atentamente</td>
					<td style="text-align: right; border:0px;">Firma de conocimiento</td>
				</tr>
				<tr >
					<td style="border:0px;">_____________________________________<br> Nombre y firma representante DHO</td>
					<td style="text-align: right; border:0px;">_____________________________________<br><strong><?php echo $_GET['nombreEmpleado']; ?></strong><br><strong><?php echo $_GET['puestoTrabajo']; ?></strong></td>
				</tr>
			</table>
		</td>
	</tr>
</table>

</body>
</html>