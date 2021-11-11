

<div style="overflow-y: auto; height:100%">

    <?php
    foreach ($entries as $row => $follower) {
        echo "<a href='".base_url('index.php/app/')."?user=".$follower['profile']['username']."' class='card box-row box-y-center'>";
            echo $follower['profile']['profile_pic']? 
                "<img class='profile_pic' src='".base_url(PROFILE_PICS).$follower['profile']['profile_pic']."'/>"
                : "<div class='profile_icon box-row box-center'><i class='material-icons'>person</i></div>";
        

        echo "<div style='margin-left:20px' class='box-column'>".
                "<b style='font-size: 22px; font-family: Roboto'>".$follower['profile']['username']."</b>".
                "<text style='margin-bottom:5px; margin-top:3px'>".$follower['profile']['description']."</text>".
                "<div class='box-row box-y-center'>".
                    "<i class='material-icons'>code</i>&nbsp;".
                    "<div class='langTag'>".$follower['profile']['main_lang']."</div>".
                "</div>".
            "</div>".
        "</a>";
    }
    ?>
</div>
<!--CLOSING PROFILE DIV-->
</div>