<?php
    defined('BASEPATH') or exit('No direct script access allowed');
?>

<form action="<?= site_url("/lends") ?>" method="post">
<?php 
    echo form_open(site_url("/lends"));

    if(isset($book))
        echo form_dropdown("book",$lends,$book);
    else 
        echo form_dropdown("book",$lends);
        
    echo form_submit(["value" => "Ver prestamos"]);
    echo form_close();
?>