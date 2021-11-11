<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    if(is_array($lend) and count($lend) > 0){
        echo "<h1>Libros prestados</h1>";
        foreach ($lend as $book) {
            echo "<li>$book</li>";
        }
    }

    if(is_array($notLend) and count($notLend) > 0){
        echo "<h1>Libros no prestados</h1>";
        foreach ($notLend as $book) {
            echo "<li>$book</li>";
        }
    }

?>

