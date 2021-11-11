<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
?>

<form action="<?php base_url()?>" method="post">
<input type="hidden" name="genre" value='<?=$genre?>'>
<table>
    <tr>
        <th></th>
        <th>LIBRO</th>
        <th>AUTOR</th>
    </tr>
    <?php
        if(is_array($books) and count($books)){
            foreach ($books as $book) {
                echo "<tr>"; 
                echo "<td><input type='checkbox' name='book[]' value='".$book['id']."'></td>";
                echo "<td>".$book['title']."</td>";
                echo "<td>(".$book['author'].")</td>";
                echo "</tr>";
            }
            
            echo "<tr><td colspan='3'><input class='roundBlack' name='lend' type='submit' value='Prestar libros'></td></tr>";    
        }
    ?>
</table>
</form>