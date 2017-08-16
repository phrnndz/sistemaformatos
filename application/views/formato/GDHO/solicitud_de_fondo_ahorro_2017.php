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
	table {
	    border-collapse: collapse;
	}
	table td {border-collapse: collapse; border:1px solid black;}
	</style>
</head>
<body>
<table style="width: 100%;">
	<tr>
	<td style="text-align: center; border:0px;" colspan="2">SOLICITUD DE FONDO DE AHORRO 2017</td>
	</tr>
	<tr>
		<td style="border:0px;"> <img width="150px" src="http://www.opcionessacimex.com/img/header/logoSacimex.png" alt=""> </td>
		<td style="text-align: right; border:0px;"> <strong> <?php echo 'ASUNTO: SAC-DHO-FDA-2017'; ?></strong></td>
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
		<td style=" border:0px;"><strong><?php echo $_GET['claveRecibe']; ?></strong>
		<strong>GDHO- DE DESARROLLO HUMANO Y ORGANIZACIONAL <br>
			TECHNOLOGICAL HUMAN PROVISION, SA DE CV <br>
			PRESENTE.</strong>
		</td>
	</tr>
</table>
<table style="width: 100%;">
	<tr>
		<td style=" border:0px;">
			<p><?php echo $_GET['nombreEmpleado']; ?>,colaborador de la empresa TECHNOLOGICAL HUMAN PROVISION, S.A. DE C.V., y prestando mis servicios como: <?php echo $_GET['puestoTrabajo']; ?>en la empresa denominada OPCIONES SACIMEX S.A. DE C.V. SOFOM E.N.R., por mi propio derecho y en base a lo convenido en mis prestaciones empresariales, solicito respetuosamente el retiro total de mi fondo de ahorro integrado por mis aportaciones y aportaciones patronales las cuales fueron efectuadas durante el periodo semestral del:	
			<?php echo $_GET['fechaSolicitudInicio']; ?> al <?php echo $_GET['fechaSolicitudTermino']; ?> del presente año.</p>
			<table width="100%" >
				<tbody>
				<tr>
					<td>&nbsp;Nombre <br><br> <br></td>
					<td rowspan="2">Huellas<br /><br /></td>
				</tr>
				<tr>
					<td>&nbsp; Firma <br> <br><br></td>
				</tr>
				</tbody>
			</table>
			<br>	
			<hr>
			<br>
			<p style="text-align: center;"><strong>SÓLO DESARROLLO HUMANO Y ORGANIZACIONAL</strong></p>
			<p>Le notifico que su solicitud ha sido procesada, y se le hace entrega de su fondo de ahorro integrado de la siguiente forma:</p>															
			<table  width="100%">
				<tr>
					<td>
						<strong>CONCEPTO</strong>
					</td>
					<td>
						<strong>IMPORTE</strong>
					</td>
				</tr>
				<tr>
					<td>
						Fondo de Ahorro -Colaborador					
					</td>
					<td></td>
				</tr>
				<tr>
					<td>
						Fondo de Ahorro -Patrón				
					</td>
					<td></td>
				</tr>
				<tr>
					<td>TOTAL</td>
					<td></td>
				</tr>
			</table>
			<br>
			<p>Esperando que el mencionado recurso sea de mucho beneficio a su persona, quedo de usted para cualquier duda.</p>
			<br>
			<br>
			<table  width="100%" >
				<tr>
					<td style=" border:0px;">Atentamente</td>
					<td style=" border:0px; text-align: right;">Firma de conocimiento</td>
				</tr>
				<tr>
					<td style=" border:0px;">______________________________ <br>Nombre y firma representante DHO</td>
					<td style=" border:0px; text-align: right;">______________________________ <br><strong><?php echo $_GET['nombreEmpleado']; ?></strong><br><strong><?php echo $_GET['puestoTrabajo']; ?></strong></td>
				</tr>
			</table>
		</td>
	</tr>
</table>

	

</body>
</html>