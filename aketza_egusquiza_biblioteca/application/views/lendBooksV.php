<?php
    defined('BASEPATH') or exit('No direct script access allowed');
?>

<form action="<?= site_url()."/lends" ?>" method="post">
    <select name="books">
        <?php
            foreach ($lends as $id => $bookName) {
                if(isset($book) and $book == $id){
                    echo "<option selected value='$id'>$bookName</option>"; 
                } else 
                    echo "<option value='$id'>$bookName</option>";
            }
        ?>
    </select>
    <input type="submit" value="Ver prestamos">
</form>