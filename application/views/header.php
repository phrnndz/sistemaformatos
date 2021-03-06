<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>SACIMEX - SISTEMA DE FORMATOS</title>
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="Pamela Hernandez">

	<!-- css -->
	<link href="<?= base_url('assets/css/bootstrap.css') ?>" rel="stylesheet">
	<link href="<?= base_url('assets/css/style.css') ?>" rel="stylesheet">
	<link href="<?= base_url('assets/css/custom.css') ?>" rel="stylesheet">
	<link href="<?= base_url('assets/css/datepicker.min.css') ?>" rel="stylesheet" type="text/css">
	<link href="<?= base_url('assets/css/DataTables/jquery.dataTables.min.css') ?>" rel="stylesheet">
	<link href="<?= base_url('assets/css/font-awesome/css/font-awesome.min.css') ?>" rel="stylesheet">



	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<script src="<?= base_url('assets/js/modernizr.custom.js'); ?>" ></script>
	<script src="<?= base_url('assets/js/DataTables/jquery.dataTables.min.js') ?>"></script>


	<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>
</head>
<body>
		<div class="sticky-header header-section ">
			<div class="header-left">
				<!--toggle button start-->
				<!--toggle button end-->
				<!--logo -->
				<div class="logo">
					<a href="<?= base_url('admin') ?>">
						<h1>SACIMEX</h1>
						<span>Sistema de formatos</span>
					</a>
				</div>
				<!--//logo-->
			</div>
			<div class="header-right">
				<div class="user-name">
					<p>
						<?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) : ?>
							<a href="<?= base_url('logout') ?>">Salir</a> <br>
							<span><small><?php echo $_SESSION['nombre_usuario'];  ?></small>  </span><br>
							<span><small> ID: <?php echo $_SESSION['badgenumber'];  ?></small>  </span><br>
							<span><small><?php echo $_SESSION['puesto_nombre']; ?></small> </span>
						<?php else : ?>
							<a href="<?= base_url('login') ?>">Login</a>
						<?php endif; ?>
					</p>
					
				</div>
			</div>
		</div>
<!-- 		<div class="header-section ">
			<a href="admin">Inicio</a>
		</div>
		 -->
