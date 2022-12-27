<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MEMETOREST</title>
    <link rel="icon" type="image/x-icon" href="assets/fav.jpg">
    <link rel="stylesheet" href="assets/styles/main.css">
</head>
<body>
    <header>
        <img class="logo" src="assets/logo.svg"></img>
        <div class="menu">
            <a class="menu_link" href="#" style="background-image: url('assets/svg/3.svg'); background-repeat: no-repeat;  background-position: 0% bottom; background-size: 100%; padding: 0 1.4vw">пикчи</a>
            <a class="menu_link" href="about_us.php" style="padding: 0 0.8vw">что это такое?</a>
            <a class="menu_link" href="user/profile.php<?php if (isset($_SESSION['id'])) echo ("?id=".$_SESSION['id']); ?>" style="padding: 0 1vw">мой уголок</a>
        </div>
        <button>сделать вброс</button>
    </header>

    <div class="content">
        <div class="content_container" style="height: 82vh; flex-direction: raw; justify-content:space-between;">
            <div class="publish_left_block">
                <form action="" style="align-items: center;">
                    <div class="drag_file_header">
                        залей <br> сюда <br> свой <br> мем
                        <input class="drag_input" type="file">
                    </div>
                    <input type="text" placeholder="// тут твоя подпись к мемесу" style="font-size: 11px; margin-top: 4vh;">
                    <button style="margin-top: 4vh; width: 16vw;">показать миру</button>
                </form>
            </div>
            <div class="publish_right_block">
                <div class="mem_block">
                    <div class="mem_info">
                        <div class="mem_info_ava">
                            <img src="assets/img/скала.jpg" style="border-radius: 3px;" width="100%" height="100%"> <!-- тут ава -->
                        </div>
                        <div class="nick_descr">
                            <p class="nick">login</p> <!-- тут имя пользователя -->
                            <p class="descr">// тут твоя подпись к мемесу</p> <!-- тут подпись мема -->
                        </div>
                    </div>

                    <div class="mem_carousel">
                        <div class="mem_img" style="align-items: center;">
                            <img src="assets/img/байден.jpg" style="border: 2px solid #1F3FEF; border-radius: 3px; width:20vw;"> <!-- тут мем -->
                        </div>
                    </div>

                    <div class="profile_buttons">
                        <button id="like_btn"">годно</button>
                        <button id="close_btn" onclick="mem_window();"">закрыть</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer>
        <div class="footer_logo">
            <img class="logo" src="assets/logo_white.svg"></img>
            <p>© все права защищены</p>
        </div>
        <div class="menu">
            <a class="menu_link" href="#">пикчи</a>
            <a class="menu_link" href="about_us.php">что это такое?</a>
            <a class="menu_link" href="user/profile.php<?php if (isset($_SESSION['id'])) echo ("?id=".$_SESSION['id']); ?>">мой уголок</a>
        </div>
        <div class="git_block">
            <p>github</p>
            <a href="https://github.com/maestrying" class="git_link" target="_blank">maestrying</a>
            <a href="https://github.com/lonelywh1te" class="git_link" target="_blank">lonelywh1te</a>
        </div>
    </footer>
</style>
</body>
<script> </script>
</html>