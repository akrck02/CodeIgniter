<?php
    defined('BASEPATH') or exit('No direct script access allowed');
?>

<form action="<?= site_url()."/lends" ?>" method="post">
    <select name="books">
        <?php
            foreach ($lends as $id => $book) {
                echo "<option value='$id'>$book</option>"; 
            }
        ?>
    </select>
    <input type="submit" value="Ver prestamos">
</form>