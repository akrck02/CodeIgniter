<div style="overflow-y: auto; height:100%">
    <div class="box-row box-y-center box-x-between" style="height:70px; border-bottom:1px solid #f1f1f1">
        <?php echo form_open(base_url('index.php/app/user_team_search'), ''); ?>
        <div class="box-row box-y-center" style="padding: 10px 15px; border-radius:100px; margin:15px; background:#f1f1f1;">
            <i style="color:#a5a5a5" class="material-icons">search</i>
            <input type="hidden" name="user" value="<?php echo $profile['username']; ?>">
            <input type="text" name="team_name" placeholder="Search team" style="margin-left:10px; background: transparent; border: none;">
        </div>
        <?php echo form_close(); ?>

        <a href='' class="box-row box-y-center" style="padding: 10px 15px; border-radius:100px; margin:15px; color: #808080; font-weight:400; font-size: 13px; background:#f1f1f1;">
            <i class="material-icons">add</i> &nbsp; New team
        </a>
    </div>


    <?php
    if (count($entries) == 0)
        echo "<div class='box-column box-center' style='width:100%; color: #808080;  margin-top: 50px'>" .
            "<i class='material-icons' style='font-size: 64px'>people</i>" .
            "<div class='box-center' style='font-size: 20px; border-radius:6.25px; background:transparent; width:400px; height:50px;'>" .
            "No teams here yet. &nbsp;  " .
            "</div> " .
            "</div>";

    foreach ($entries as $team) {

        echo "<div href='" . base_url('index.php/teams/') . "?user=" . $team['name'] . "' class='card box-row box-y-center'>";
        echo $team['logo'] ?
            "<img class='profile_pic' src='" . base_url(TEAM_LOGOS) . $team['logo'] . "'/>"
            : "<div class='profile_icon box-row box-center'><i class='material-icons'>people</i></div>";

        echo "<div style='margin-left:20px' class='box-column'>" .
            "<b style='font-size: 22px; font-family: Roboto'>" . $team['name'] . "</b>" .
            "<text style='margin-bottom:5px; margin-top:3px'>" . $team['description'] . "</text>" .
            "<div class='box-row' style='margin-top:7px'>";
        foreach ($team['members'] as $member) {
            if ($member['profile_pic']) {
                $url = base_url(PROFILE_PICS) . $member['profile_pic'];
                echo "<a href='" . base_url("index.php/app/") . "?user=" . $member['username'] . "'><img src='" . $url . "' style='width:35px; height:35px; object-fit:cover; border-radius:100px;'></a>";
            } else {
                echo "<a  href='" . base_url("index.php/app/") . "?user=" . $member['username'] . "' class='box-row box-center' style='color:#404040;height:35px; width:35px; border-radius:100px; background: #f1f1f1;'><i class='material-icons'>person</i></a>";
            }
            echo "&nbsp;";
        }
        echo "</div></div></div>";
    }
    ?>
</div>
<!--CLOSING PROFILE DIV-->
</div>