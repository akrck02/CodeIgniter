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
</head>
<body>
	<div id="header">
		<h1>PRESTAMOS</h1>
	</div>
	<div id="container">
		<div id="bar">
			<?php
			foreach ($genres as $genre) {
				echo "<li><a href='?genre=$genre'>$genre</a></li>";
			}

			?>
		</div>
		<div id="main">