<?php
	defined('BASEPATH') or exit('No direct script access allowed');
	$styles = base_url() . "styles/master.css";
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Biblioteca</title>
	<link rel="stylesheet" href="<?= $styles ?>">
	<script>
		window.onload = () =>{
			setTimeout(() => {
				setTimeout(() => document.getElementById("bar").style.opacity = "1", 250);
				setTimeout(() => document.getElementById("header").style.opacity = "1", 100);
				setTimeout(() => document.getElementById("menu").style.opacity = "1", 100);
				setTimeout(() => document.getElementById("main").style.opacity = "1", 500);	
			}, 500);
		}

	</script>
</head>
<body>
	<div id="header">
		<h1>PRESTAMOS</h1>
	</div>
	<div id="menu">
		<a href="<?= site_url() ?>">Libros</a>
		<a href="<?= site_url()."/calendar" ?>">Calendario</a>
		<a href="<?= site_url()."/lends" ?>">Prestamos</a>
	</div>
	<div id="container">
		<div id="bar">
			<?php
				foreach ($genres as $genre) 
					echo "<li><a href='".site_url()."/genre/$genre'>$genre</a></li>";
			?>
		</div>
		<div id="main">