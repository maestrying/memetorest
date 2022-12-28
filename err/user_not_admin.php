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
    <link rel="icon" type="image/x-icon" href="../assets/fav.jpg">
    <link rel="stylesheet" href="../assets/styles/main.css">
</head>
<body>
    <header>
        <img class="logo" src="../assets/logo.svg"></img>
        <div class="menu">
            <a class="menu_link" href="../index.php" style="padding: 0 1.4vw;">пикчи</a>
            <a class="menu_link" href="../about_us.php" style="padding: 0 0.8vw;">что это такое?</a>
            <a class="menu_link" href="../user/profile.php<?php if (isset($_SESSION['id'])) echo ("?id=".$_SESSION['id']); ?>" style="padding: 0 1vw;">мой уголок</a>
        </div>
        <button>сделать вброс</button>
    </header>

    <div class="content" style="background-color: #101010;">
        <div class="content_container" style="height: 82vh;">
            <div class="err_block" style="height: 40vh;">
                <div class="err_title">
                    <div class="line" style="border-color: rgb(220, 52, 23);"></div>
                    <div class="err_p" style="color: rgb(220, 52, 23);;">ошибка</div>
                    <div class="line" style="border-color: rgb(220, 52, 23);;"></div>
                </div>
                <p class="err_descr" style="color: rgb(220, 52, 23);">куда ты лезешь боже...</p>
                <img src="../assets/img/not_adm.jpg" width="300px">
            </div>
        </div>
    </div>

    <footer>
        <div class="footer_logo">
            <img class="logo" src="../assets/logo_white.svg"></img>
            <p>© все права защищены</p>
        </div>
        <div class="menu">
            <a class="menu_link" href="../">пикчи</a>
            <a class="menu_link" href="../about_us.php">что это такое?</a>
            <a class="menu_link" href="../user/profile.php<?php if (isset($_SESSION['id'])) echo ("?id=".$_SESSION['id']); ?>">мой уголок</a>
        </div>
        <div class="git_block">
            <p>github</p>
            <a href="https://github.com/maestrying" class="git_link" target="_blank">maestrying</a>
            <a href="https://github.com/lonelywh1te" class="git_link" target="_blank">lonelywh1te</a>
        </div>
    </footer>
</body>
<script> </script>
</html>