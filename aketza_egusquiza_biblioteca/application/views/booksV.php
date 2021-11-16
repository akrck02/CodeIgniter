<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    if(is_array($books) and count($books)){
?>

<?=form_open(site_url("genre/$genre"))?>
<input type="hidden" name="genre" value='<?=$genre?>'>
<table>
    <tr>
        <th></th>
        <th>LIBRO</th>
        <th>AUTOR</th>
    </tr>
    <?php
        if($genre !== false)
            echo "<h1>Libros del género $genre</h1>";
        else
            echo "<h1>Todos los libros</h1>";

        if(is_array($books) and count($books) > 0){
            
            foreach ($books as $book) {
                echo "<tr>"; 
                echo "<td>" . form_checkbox( ['name' => 'book[]', 'value' => $book['id']]) . "</td>";
                echo "<td>".$book['title']."</td>";
                echo "<td>(".$book['author'].")</td>";
                echo "</tr>";
            }

            echo "<tr><td colspan='3'>". form_submit(['class' => 'roundBlack', 'name' => 'lend', 'value' => 'Prestar libros']) . "</td></tr>";
        }
    ?>
</table>

<?php 
    echo form_close();
}
?>