<div class="box-row box-x-start box-warp" style=" overflow: auto; height:calc(100% - 40px); padding:20px 80px;">

    <?php

    # PROFILES
    # ------------------------------------------------
    if (count($profiles) != 0) {
        echo '<div class="box-column" style="min-width: 400px; margin: 0 3%; max-width: 100%;">';
        echo  "<h1 style='border-bottom:2px solid #f1f1f1; padding: 10px;'>Profiles: </h1>";

        foreach ($profiles as $profile) {
            echo "<div class='box-row box-y-center' style='padding: 5px;'>";
            if ($profile['profile_pic'])
                echo "<img style='height:55px; width:55px; border-radius:100px; object-fit: cover;' src='" . base_url(PROFILE_PICS) . $profile['profile_pic'] . "' >";
            else
                echo "<div class='box-row box-center' style='background: #f1f1f1; height:55px; width:55px; border-radius:100px; object-fit: cover;'><i class='material-icons'>person</i></div>";

            echo "<div class='box-column' style='margin-left: 10px'>" .
                "<text>" . $profile['username'] . "</text>" .
                "<text style='font-size: 13px; color: #a5a5a5;'>" . $profile['description'] . "</text>" .
                "</div>";
            echo "</div>";
        }
        echo "</div>";
    }

    #  REPOSITORIES
    # ------------------------------------------------
    if (count($repositories) != 0) {
        echo '<div class="box-column" style="min-width: 400px; margin: 0 3%;">';
        echo  "<h1 style='border-bottom:2px solid #f1f1f1; padding: 10px;'>Repositories: </h1>";

        foreach ($repositories as $repository) {
            echo "<div class='box-row box-y-center' style='padding: 5px;'>";
            if ($repository['logo'])
                echo "<img style='height:55px; width:55px; border-radius:100px; object-fit: cover;' src='" . base_url(REPOSITORY_LOGOS) . $repository['logo'] . "' >";
            else
                echo "<div class='box-row box-center' style='background: #f1f1f1; height:55px; width:55px; border-radius:100px; object-fit: cover;'><i class='material-icons'>extension</i></div>";

            echo "<div class='box-column' style='margin-left: 10px'>" .
                "<text>" . $repository['name'] . "</text>" .
                "<text style='font-size: 13px; color: #a5a5a5;'>" . $repository['description'] . "</text>";

                echo "<div class='box-row'>";
                foreach ($repository['langs'] as $lang) {
                    echo "<div class='langTag' style='padding:2px 5px; font-size: 10px'>" . $lang['language'] . "</div>";
                }

                echo "</div>";
            echo "</div>";
            echo "</div>";
        }
        echo "</div>";
    }


    #  PROFILES
    # -------------------------------------------------
    if (count($teams) != 0) {
        echo '<div class="box-column" style="min-width: 400px;  margin: 0 3%;">';
        echo  "<h1 style='border-bottom:2px solid #f1f1f1; padding: 10px;'>Teams: </h1>";

        foreach ($teams as $team) {
            echo "<div class='box-row box-y-center' style='padding: 5px;'>";
            if ($team['logo'])
                echo "<img style='height:55px; width:55px; border-radius:100px; object-fit: cover;' src='" . base_url(TEAM_LOGOS) . $team['logo'] . "' >";
            else
                echo "<div class='box-row box-center' style='background: #f1f1f1; height:55px; width:55px; border-radius:100px; object-fit: cover;'><i class='material-icons'>people</i></div>";

            echo "<div class='box-column' style='margin-left: 10px'>" .
                "<text>" . $team['name'] . "</text>" .
                "<text style='font-size: 13px; color: #a5a5a5;'>" . $team['description'] . "</text>";
                
                echo "<div class='box-row'>";
                foreach ($team['members'] as $member) {
                    if ($member['profile_pic']) {
                        $url = base_url(PROFILE_PICS) . $member['profile_pic'];
                        echo "<a href='" . base_url("index.php/app/") . "?user=" . $member['username'] . "'><img src='" . $url . "' style='width:25px; height:25px; object-fit:cover; border-radius:100px;'></a>";
                    } else {
                        echo "<a  href='" . base_url("index.php/app/") . "?user=" . $member['username'] . "' class='box-row box-center' style='color:#404040;height:25px; width:25px; border-radius:100px; background: #f1f1f1;'><i class='material-icons' style='font-size:80%'>person</i></a>";
                    }
                }
                
                echo "</div></div>";
            echo "</div>";
        }
        echo "</div>";
    }
    ?>
</div>