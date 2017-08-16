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
	<meta name="author" content="">

	<!-- css -->
	<link href="<?= base_url('assets/css/bootstrap.css') ?>" rel="stylesheet">
	<link href="<?= base_url('assets/css/style.css') ?>" rel="stylesheet">
	<link href="<?= base_url('assets/css/custom.css') ?>" rel="stylesheet">
	<link href="<?= base_url('assets/css/datepicker.min.css') ?>" rel="stylesheet" type="text/css">
	<link href="<?= base_url('assets/css/paginador.css') ?>" rel="stylesheet">


	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<link href="<?= base_url('assets/js/modernizr.custom.js') ?>" >
	<script src="<?= base_url('assets/js/paginador.js') ?>"></script>

    <!-- Include English language -->
	<script src="https://use.fontawesome.com/ce3806c1b4.js"></script>
	<!--webfonts-->
	<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
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
							<span><?php echo $_SESSION['nombre_usuario'];  ?></span> <br>
							<span><?php echo $_SESSION['puesto_nombre_oficial']; ?></span>
						<?php else : ?>
							<a href="<?= base_url('login') ?>">Login</a>
						<?php endif; ?>
					</p>
					
				</div>
			</div>
		</div>
		
