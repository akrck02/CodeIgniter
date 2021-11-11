<?php 
    /* Open scripts here */
    function createBar($view)
    {
        $bartmp =
        "<div class='box-row box-y-center'>
            <a href='".base_url("index.php/app/")."' class='material-icons'>local_fire_department</a>
            <text class='title box-row box-y-center'>AppIgniter ".SEPARATOR." $view</text>
        </div>
        <form action='".base_url("index.php/search")."' method='post'>
            <div class='box-row box-y-center'>
                <input name='word' placeholder='Search..' style='color: #fff; background: rgba(255,255,255,.05); border:none; height:100%; width: 250px; padding:7px'>
                <i class='material-icons' style='color:#fff'>search</i>        
            </div>
        </form>
        "   ;
        return $bartmp;
    }

    if(!isset($view)){
        $view = "home";
    }
    if(!isset($title)) $title = "home";
    $title = "AppIgniter - ".$title;
    $bar = createBar($view);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?php echo base_url(); ?>css/bubble.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>css/loader.css" rel="stylesheet">
    <script src="<?php echo base_url(); ?>js/loader.js"></script>
    <link rel="shortcut icon" href="<?php echo base_url() ?>res/img/logo.png" type="image/x-icon">
    <title><?php echo $title ?></title>
</head>
<body class="onepage_app">
    <nav class="minimal_bar box-x-between">
        <?php echo $bar?>
    </nav>

    
