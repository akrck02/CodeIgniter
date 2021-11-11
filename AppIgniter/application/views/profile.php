<?php
defined('BASEPATH') or exit('No direct script access allowed');

if (!isset($selected))
    $selected = 0;

if (!isset($profile['followers']))
    $profile['followers'] = 0;

if (!isset($profile['following']))
    $profile['following'] = 0;

if (!isset($profile['repositories']))
    $profile['repositories'] = 0;


?>


<!-- GETTING STARTED -->
<div style="height: calc(100% - 50px)" class="all box-row">
    <div style="position:relative; padding:20px; height: calc(100% - 20px); min-width: 325px; width: 30%; border-right :1px solid #f1f1f1" class="box-column box-y-center">
        <?php
        if ($profile['profile_pic'])
            echo "<img src='" . base_url(PROFILE_PICS) . $profile['profile_pic'] . "' style='object-fit:cover; margin-top:20px; width:250px; height:250px; border-radius:100%'>";
        else {
            echo "<div class='box-column box-center' style='margin-top:20px; width:250px; height:250px; border-radius:100%; background:#f1f1f1'>" .
                "<i class='material-icons' style='font-size: 100px'>person</i>"
                . "</div>";
        }
        ?>
        <h1 style="margin:0px; height: 40px; margin-top:10px; text-align: center;"><?php echo $profile['username'] ?></h1>
        <div class="box-row">
            <b class="box-row box-y-center"><i class="material-icons" style="font-size:20px;">visibility</i>&nbsp; <?php echo $profile['followers']; ?></b> &nbsp;|&nbsp;
            <b class="box-row box-y-center"><i class="material-icons" style="font-size:20px;">favorite</i>&nbsp; <?php echo $profile['following']; ?></b>  &nbsp;|&nbsp;
            <b class="box-row box-y-center"><i class="material-icons" style="font-size:20px;">code</i>&nbsp; <?php echo $profile['repositories']; ?></b>
        </div>
        <p style="width: 80%; margin:0px; margin-top:10px; text-align: justify;"><?php echo $profile['description'] ?></p><br>
        <div class="box-row box-y-center" style="width:80%; margin-top:10px">
            <text>Main: </text>&nbsp;
            <div class='langTag'><?php echo $profile['main_lang'] ?></div>
        </div>


        <?php
        if ($profile['username'] != $me) {
            echo form_open('/People/follow', ["class" => "box-column box-x-start", "style" => "width:80%"]);
            echo "<button class='login_btn box-row box-y-center' style='width:100px'><i class='material-icons'>person</i> &nbsp;Follow</button>";
            echo form_close();
        }
        ?>

        <div class="box-row box-y-center box-x-between" style="position:absolute; bottom:5%; width:80%;">
            <i class="material-icons" style="cursor:pointer;" onclick="setTimeout(
                () => {
                    tokenText.select();
                    document.execCommand('copy');
                    console.info('Token copied!')
                },
            )">lock</i>&nbsp;

            <a href="<?php echo base_url("index.php/app/logout/") ?>" style="color:#404040"><i class="material-icons">logout</i></a>
        </div>
        <input hidden id="tokenText" value="<?php echo $token ?>" />
    </div>

    <div class=" all box-column" style="height: calc(100% - 20px);">
        <div class="tab_bar box-row" style="background:transparent; height: 65px">
            <a class="tab <?php echo $selected == 0 ? "selected" : "" ?>" href="<?php echo base_url("index.php/app/") ?>apps<?php echo isset($_REQUEST['user']) ? "?user=" . $_REQUEST['user'] : ""; ?>">
                <div class="box-row box-y-center">
                    <i class="material-icons">apps</i>&nbsp;Apps
                </div>
            </a>
            <a class="tab <?php echo $selected == 1 ? "selected" : "" ?> " href="<?php echo base_url("index.php/app/") ?>repositories<?php echo isset($_REQUEST['user']) ? "?user=" . $_REQUEST['user'] : ""; ?>">
                <div class="box-row box-y-center">
                    <i class="material-icons">code</i>&nbsp;Repositories
                </div>
            </a>
            <a class="tab <?php echo $selected == 2 ? "selected" : "" ?> " href="<?php echo base_url("index.php/app/") ?>followers<?php echo isset($_REQUEST['user']) ? "?user=" . $_REQUEST['user'] : ""; ?>">
                <div class="box-row box-y-center">
                    <i class="material-icons">visibility</i>&nbsp;Followers
                </div>
            </a>
            <a class="tab <?php echo $selected == 3 ? "selected" : "" ?> " href="<?php echo base_url("index.php/app/") ?>following<?php echo isset($_REQUEST['user']) ? "?user=" . $_REQUEST['user'] : ""; ?>">
                <div class="box-row box-y-center">
                    <i class="material-icons" style="font-size:20px">favorite</i>&nbsp;Following
                </div>
            </a>
            <a class="tab <?php echo $selected == 4 ? "selected" : "" ?> " href="<?php echo base_url("index.php/app/") ?>teams<?php echo isset($_REQUEST['user']) ? "?user=" . $_REQUEST['user'] : ""; ?>">
                <div class="box-row box-y-center">
                    <i class="material-icons" style="font-size:20px">people</i>&nbsp;Teams
                </div>
            </a>
        </div>