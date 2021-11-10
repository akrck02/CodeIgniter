<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
?>

<form action="">
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
                echo "<td><input type='checkbox'></td>";
                echo "<td>".$book['title']."</td>";
                echo "<td>(".$book['author'].")</td>";
                echo "</tr>";
            }
            
            
            echo "<tr><td colspan='3'><input type='submit' value='Prestar libros'></td></tr>";    
        }
    ?>
</table>
</form>