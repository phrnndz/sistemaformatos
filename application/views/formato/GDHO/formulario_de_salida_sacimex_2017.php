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
	<td style="text-align: center; border:0px;" colspan="2">FORMULARIO DE SALIDA DE SACIMEX</td>
	</tr>
	<tr>
		<td style="border:0px;"> <img width="150px" src="http://www.opcionessacimex.com/img/header/logoSacimex.png" alt=""> </td>
		<td style="text-align: right; border:0px;"> <strong> <?php echo 'CAS-DHO-FRM-SLD 2017'; ?></strong></td>
	</tr>
</table>
<table style="width: 100%;">
	<tr>
		<td style="border:0px;" colspan="2">
			<p>Agradecemos mucho tu trabajo realizado en Opciones Sacimex SA de CV SOFOM ENR en beneficio de la empresa, compañeros y ambiente de trabajo. Por favor, te solicitamos nos des la oportunidad de mejorar al contestar el siguiente formulario con la mayor veracidad posible</p>
		</td>
	</tr>
	<tr>
		<td style="border:0px;">
			<p><strong>I. Motivos del cambio</strong></p>
			<p><strong>1. ¿Cuáles son tus motivos de abandono?</strong></p>
			<?php for ($i = 0; $i<=$_GET['motivoskey']-1; $i++){
				$string = 'motivos'.$i;
				echo '<h3>'.$_GET[$string].'</h3>';
			} ?>

		</td>
	</tr>
	<tr>
		<td style="border:0px;">
			<p><strong>2. ¿Cuánto tiempo llevas pensando en dejar la empresa?</strong></p>
			<h3><?php echo $_GET['tiempo']; ?></h3>
		</td>
	</tr>
	<tr>
		<td style="border:0px;">
			<p><strong>II. Niveles de satisfacción</strong></p>
			<table width="100%;">
				<tr> <td style="border:0px; width: 200px;" >a) Ambiente y trato laboral  </td>
					<td style="border:0px;""><?php for ($i = 1; $i <= $_GET['ambiente']+0; $i++) {
					   echo '<img width="20px;" src="https://upload.wikimedia.org/wikipedia/commons/thumb/e/ef/Emoji_u263a.svg/220px-Emoji_u263a.svg.png" /> ';
					} ?> </td>
				</tr>

				<tr> <td style="border:0px; width: 200px;" >b) Aplicación justa de reglamentos </td>
					<td style="border:0px;""><?php for ($i = 1; $i <= $_GET['reglamentos']+0; $i++) {
					   echo '<img width="20px;" src="https://upload.wikimedia.org/wikipedia/commons/thumb/e/ef/Emoji_u263a.svg/220px-Emoji_u263a.svg.png" /> ';;
					} ?> </td>
				</tr>
				<tr> <td style="border:0px; width: 200px;" >c) Beneficios Sociales </td>
					<td style="border:0px;""><?php for ($i = 1; $i <= $_GET['beneficios']+0; $i++) {
					   echo '<img width="20px;" src="https://upload.wikimedia.org/wikipedia/commons/thumb/e/ef/Emoji_u263a.svg/220px-Emoji_u263a.svg.png" /> ';;
					} ?> </td>
				</tr>
				<tr> <td style="border:0px; width: 200px;" >d) Carga de trabajo y horarios </td>
					<td style="border:0px;""><?php for ($i = 1; $i <= $_GET['carga']+0; $i++) {
					   echo '<img width="20px;" src="https://upload.wikimedia.org/wikipedia/commons/thumb/e/ef/Emoji_u263a.svg/220px-Emoji_u263a.svg.png" /> ';;
					} ?> </td>
				</tr>
				<tr> <td style="border:0px; width: 200px;" >e) Carrera y ascenso interno </td>
					<td style="border:0px;""><?php for ($i = 1; $i <= $_GET['carrera']+0; $i++) {
					   echo '<img width="20px;" src="https://upload.wikimedia.org/wikipedia/commons/thumb/e/ef/Emoji_u263a.svg/220px-Emoji_u263a.svg.png" /> ';;
					} ?> </td>
				</tr>
				<tr> <td style="border:0px; width: 200px;" >f) Expectativas del puesto </td>
					<td style="border:0px;""><?php for ($i = 1; $i <= $_GET['expectativas']+0; $i++) {
					   echo '<img width="20px;" src="https://upload.wikimedia.org/wikipedia/commons/thumb/e/ef/Emoji_u263a.svg/220px-Emoji_u263a.svg.png" /> ';;
					} ?> </td>
				</tr>
				<tr> <td style="border:0px; width: 200px;" >g) Objetivos de la empresa </td>
					<td style="border:0px;""><?php for ($i = 1; $i <= $_GET['objetivos']+0; $i++) {
					   echo '<img width="20px;" src="https://upload.wikimedia.org/wikipedia/commons/thumb/e/ef/Emoji_u263a.svg/220px-Emoji_u263a.svg.png" /> ';;
					} ?> </td>
				</tr>
				<tr> <td style="border:0px; width: 200px;" >h) Reconocimiento de mi labor </td>
					<td style="border:0px;""><?php for ($i = 1; $i <= $_GET['reconocimiento']+0; $i++) { 
					   echo '<img width="20px;" src="https://upload.wikimedia.org/wikipedia/commons/thumb/e/ef/Emoji_u263a.svg/220px-Emoji_u263a.svg.png" /> ';;
					} ?> </td>
				</tr>
				<tr> <td style="border:0px; width: 200px;" >i) Salario respecto a la competencia </td>
					<td style="border:0px;""><?php for ($i = 1; $i <= $_GET['salario']+0; $i++) {
					   echo '<img width="20px;" src="https://upload.wikimedia.org/wikipedia/commons/thumb/e/ef/Emoji_u263a.svg/220px-Emoji_u263a.svg.png" /> ';;
					} ?> </td>
				</tr>
				<tr> <td style="border:0px; width: 200px;" >j) Valores de la empresa </td>
					<td style="border:0px;""><?php for ($i = 1; $i <= $_GET['valores']+0; $i++) {
					   echo '<img width="20px;" src="https://upload.wikimedia.org/wikipedia/commons/thumb/e/ef/Emoji_u263a.svg/220px-Emoji_u263a.svg.png" /> ';;
					} ?> </td>
				</tr>
			</table>s
		</td>
	</tr>
	<tr>
		<td style="border:0px;">
			<p><strong>¿Qué era lo que MÁS te gustaba de tu trabajo y lo que MENOS te gustaba de tu trabajo?</strong></p>
			<h3><?php  echo $_GET['txtExperiencia']; ?></h3>

		</td>
	</tr>
</table>
</body>
</html>