<div class="box-row box-y-center box-x-between" style="height:70px; border-bottom:1px solid #f1f1f1">
    <?php echo form_open(base_url('index.php/app/user_repository_search'), ''); ?>
    <div class="box-row box-y-center" style="padding: 10px 15px; border-radius:100px; margin:15px; background:#f1f1f1;">
        <i style="color:#a5a5a5" class="material-icons">search</i>
        <input type="hidden" name="user" value="<?php echo $profile['username']; ?>">
        <input type="text" name="repo_name" placeholder="Search repository" style="margin-left:10px; background: transparent; border: none;">
    </div>
    <?php echo form_close(); ?>

    <a href='' class="box-row box-y-center" style="padding: 10px 15px; border-radius:100px; margin:15px; color: #808080; font-weight:400; font-size: 13px; background:#f1f1f1;">
        <i class="material-icons">add</i> &nbsp; New repository
    </a>
</div>
<?php

if (count($entries) == 0)
    echo "<div class='box-column box-center' style='width:100%; color: #808080;  margin-top: 50px'>".
            "<i class='material-icons' style='font-size: 64px'>coffee</i>".
            "<div class='box-center' style='font-size: 20px; border-radius:6.25px; background:transparent; width:400px; height:50px;'>".
                "There are no repositories, create one! &nbsp;  ".
            "</div> ".    
        "</div>";


    foreach ($entries as $row => $repository) {
        echo "<a href='' class='card box-row box-y-center'>";
        if ($repository['logo']) {
            echo "<img class='profile_pic' src='" . base_url(REPOSITORY_LOGOS) . $repository['logo'] . "'/>";
        } else {
            echo "<div class='profile_icon box-row box-center'>" .
                "<i style='font-size: 36px;' class='material-icons'>extension</i>" .
                "</div>";
        }

        echo "<div class='box-column' style='margin-left:20px'>";
        echo "<b style='font-size: 22px; font-family: Roboto'>" . $repository['name'] . "</b>";
        echo "<text style='margin-bottom:5px; margin-top:3px'>" . $repository['description'] . "</text>";

        echo "<div class='box-row'>";
        foreach ($repository['langs'] as $lang) {
            echo "<div class='langTag'>" . $lang['language'] . "</div>";
        }

        echo "</div>";
        echo "</div>";
        echo "</a>";
    }
?>

<!--CLOSING PROFILE DIV-->
</div>