<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<form action="">
    <select>
        <?php
            foreach ($lends as $book) {
                echo "<option value=''> $book</option>"; 
            }

        ?>
    </select>
    <input type="submit" value="Ver prestamos">
</form>