<div class="box-row box-y-center box-x-between" style="height:70px; border-bottom:1px solid #f1f1f1">
    <?php echo form_open(base_url('index.php/app/user_app_search'), ''); ?>
    <div class="box-row box-y-center" style="padding: 10px 15px; border-radius:100px; margin:15px; background:#f1f1f1;">
        <i style="color:#a5a5a5" class="material-icons">search</i>
        <input type="hidden" name="user" value="<?php echo $profile['username']; ?>">
        <input type="text" name="app_name" placeholder="Search app" style="margin-left:10px; background: transparent; border: none;">
    </div>
    <?php echo form_close(); ?>

    <a href='' class="box-row box-y-center" style="padding: 10px 15px; border-radius:100px; margin:15px; color: #808080; font-weight:400; font-size: 13px; background:#f1f1f1;">
        <i class="material-icons">add</i> &nbsp; New release
    </a>
</div>


<?php
if (count($entries) == 0)
    echo "<div class='box-column box-center' style='width:100%; color: #808080;  margin-top: 50px'>" .
        "<i class='material-icons' style='font-size: 64px'>computer</i>" .
        "<div class='box-center' style='font-size: 20px; border-radius:6.25px; background:transparent; width:400px; height:50px;'>" .
        "There are no apps released. &nbsp;  " .
        "</div> " .
        "</div>";

foreach ($entries as $row => $app) {
    echo "<div class='card box-row box-y-center'>";
    if ($app['logo']) echo "<img class='profile_pic' src='" . base_url(REPOSITORY_LOGOS) . $app['logo'] . "'/>";
    else echo "<div class='profile_icon box-row box-center'>" .
        "<i style='font-size: 36px;' class='material-icons'>extension</i>" .
        "</div>";


    echo "<div class='box-column' style='margin-left:20px'>" .
        "<b style='font-size: 22px; font-family: Roboto'>" . $app['name'] . "</b>" .
        "<div style='padding:5px' class='box-row box-y-center'>" .
        "<i style='font-size:20px' class='material-icons'>sell</i>" .
        "&nbsp;" . $app['version']
        . "</div>" .
        "<a target='_blank' href='" . base_url(REPOSITORY_RELEASE) . $app['name'] . "/" . $app['version'] . "/" . $app['binaryFile'] . "' style='padding:5px' class='box-row box-y-center'>" .
        "<i style='font-size:20px' class='material-icons'>file_download</i>" .
        "&nbsp;" . $app['binaryFile']
        . "</a>" .
        "</div>" .
        "</div>";
}
?>

<!--CLOSING PROFILE DIV-->
</div>