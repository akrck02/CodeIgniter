<?php
    defined('BASEPATH') or exit('No direct script access allowed');

    foreach ($lends as $lend) {
        $date = new Datetime($lend['fecha']);
        echo "<li>Prestamo Nº ".$lend['id']." ".$date->format('Y-m-d')."</li>"; 
    }
?>
