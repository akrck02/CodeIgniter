<?php defined('BASEPATH') or exit('No direct script access allowed'); 
    if(isset($lends) and is_array($lends) and count($lends) > 0){
        echo "<br>";
        echo "<table>";
        echo "<tr>"; 
        echo "<th>Nombre</th>";
        echo "<th>Fecha de prestamo</th>";
        echo "<th></th>";
        echo "</tr>";

        foreach ($lends as $lend) {
            $date = new Datetime($lend['fecha']);
            echo "<tr>";
            echo "<td>Prestamo Nº ".$lend['id']."</td>";
            echo "<td>".$date->format('Y-m-d')."</td>";
            echo "<td><a href='".site_url("/lends/delete/".$lend['id'])."'>Devolver</a></td>";
            echo "</tr>"; 
        }
        echo "</table>";

        if($erase)
            echo "<br><br><a href='".site_url("/lends/erase/")."'> Borrar definitivamente </a>";

    }
?>
