<!DOCTYPE html>
<html lang="es">
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
	<td style="text-align: center; border:0px;" colspan="2">LLAMADA DE ATENCION</td>
	</tr>
	<tr>
		<td style="border:0px;"> <img width="150px" src="http://www.opcionessacimex.com/img/header/logoSacimex.png" alt=""> </td>
		<td style="text-align: right; border:0px;"> <strong> <?php echo 'SAC-DHO-SNC-2017'; ?></strong></td>
	</tr>
	<tr>
		<td style="text-align: right; border:0px;"></td>
		<td style="text-align: right; border:0px;">
			<?php
			$dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
			$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");		 
			echo 'FECHA: '.$dias[date('w')]." ".date('d')." de ".$meses[date('n')-1]. " del ".date('Y').'<br>' ;
			//Salida: Viernes 24 de Febrero del 2012 
			?>
			Folio: OFC.10.AJL-2017. 10- 001	 <br>
			Asunto: LLAMADA DE ATENCION <br>
		</td>
	</tr>
	<tr>
		<td style="border:0px;">
			<?php echo $_GET['nombreRecibe']; ?>  <br>
			<?php echo $_GET['puestoRecibe']; ?> <br>
			OPCIONES SACIMEX S.A. DE C.V. SOFOM E.N.R. <br>
			TECNOLOGICAL HUMAN PROVISION S.A. DE C.V. <br>
			PRESENTE <br>
		</td>
	</tr>
</table>
<table style="width: 100%;">
	<tr>
		<td style="border:0px;" colspan="2">
			<br>
			<p>Por medio del presente me dirijo a usted de la manera más atenta, para informarle que de acuerdo a lo que establece el Código de Etica de la empresa, Usted ha incurrido en las siguientes irregularidades:</p>
		</td>
	</tr>
	<tr>
		<td style="border:0px;">
			<p></p>
			<?php echo $_GET['irregularidadTexto']; ?>
			</p>

		</td>
	</tr>
	<tr>
		<td style="border:0px;" colspan="2">
			<p>Por lo tanto se le hace llegar la presente <strong>LLAMADA DE ATENCION</strong>, para que corrija las conductas antes descritas, ya que de volver a incurrir en cualquiera de ellas, se procederá a la rescisión inmediata de su contrato de trabajo por no cumplir con las funciones que le corresponden.</p>
		</td>
	</tr>
	<tr>
		<td style="border:0px;">
			<p>Le agradezco de antemano su responsabilidad y compromiso para dar cumplimiento a lo solicitado, en términos de la Política interna de la empresa. Sin más por el momento quedo a sus órdenes.</p>
		</td>
	</tr>
	<tr>
		<td style="border:0px; text-align: center;">
			<br>
			<p><strong>Opciones Sacimex S.A. de C.V. SOFOM E.N.R.</strong></p>
			<br>
			<br>
			<br>
			<p><strong>__________________________________________</strong></p>
			<p><strong><?php echo $_GET['nombreEmpleado'];  ?></strong></p>
			<p><strong><?php echo $_GET['puestoRemitente'];  ?></strong></p>
		</td>
	</tr>
	<tr>
		<td  style="border:0px;"">CC: GOPR/GDHO</td>
		<td  style="border:0px;""></td>
	</tr>
</table>
<br><br>
<table >
	<tr>
		<td><strong>Solo para el destinatario</strong> <br><br><br></td>
		<td>Fecha de recepción <br><br><br></td>
	</tr>
	<tr>
		<td></td>
		<td>Nombre y Firma de recepción <br><br><br><br><br></td>
	</tr>
	<tr>
		<td colspan="2"><u><strong>COMPROMISO DEL COLABORARDOR</strong></u><br><br><br><br><br></td>
	</tr>
</table>
</body>
</html>