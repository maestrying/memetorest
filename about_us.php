<?php
    session_start();
    include_once ('php/connect.php');
    if(isset($_SESSION['meme'])){
        mysqli_query($conn, "delete from posts where share='0'");
        unlink('../posts/'.$_SESSION['meme'].'.jpg');
        unset($_SESSION['meme']);
    }
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
            <a class="menu_link" href="index.php" style="padding: 0 1.4vw">пикчи</a>
            <a class="menu_link" href="#" style="background-image: url('assets/svg/1.svg'); background-repeat: no-repeat; background-position: 0% bottom; background-size: 95%; padding: 0 0.8vw"><p>что это такое?</p></a>
            <a class="menu_link" href="user/profile.php<?php if (isset($_SESSION['id'])) echo ("?id=".$_SESSION['id']); ?>" style="padding: 0 1vw">мой уголок</a>
        </div>
        <button onclick="location.href='publish_mem.php'">сделать вброс</button>
    </header>

    <div class="marquee">
            <span><u>DISCLAIMER</u> сайт носит исключительно развлекательный характер. Мы не хотим никого обидеть. Все совпадения случайны. Мы не террористы. Всем добра, здоровых детей и счастья!</span>
            <span><u>DISCLAIMER</u> сайт носит исключительно развлекательный характер. Мы не хотим никого обидеть. Все совпадения случайны. Мы не террористы. Всем добра, здоровых детей и счастья!</span>
    </div>

    <div class="content">
        <div class="content_container" style="height: 78vh;">
            <p class="p-bg p-bg-1">что это такое?</p>
            <p class="p-bg p-bg-2">что это такое?</p>
            <p class="p-bg p-bg-3">что это такое?</p>
            <p class="p-bg p-bg-4">что это такое?</p>
            <p class="p-bg p-bg-5">что это такое?</p>

            <div class="img-bg1"></div>
            <div class="img-bg2"></div>
            <div class="img-bg3"></div>
            <div class="img-bg4"></div>
            <div class="img-bg5"></div>
            <div class="img-bg6"></div>
            <div class="img-bg7"></div>
            <div class="img-bg8"></div>
            <div class="img-bg9"></div>
            
            <div class="about_txt">
                cайт для тех, кто хочет немножко <b class="word-mark" style="background-image: url('assets/svg/4.svg'); background-repeat: no-repeat; background-position: 50% bottom; background-size: 95%; font-weight: normal;">посмеяться</b> или покринжевать. 
                регистрируйтесь. <br>
                ставьте классы. <b class="word-mark" style="background-image: url('assets/svg/5.svg'); background-repeat: no-repeat; background-position: 50% bottom; background-size: 95%; font-weight: normal;">кайфуйте</b>.
            </div>
        </div>
    </div>

    <footer>
        <div class="footer_logo">
            <img class="logo" src="assets/logo_white.svg"></img>
            <p>© все права защищены</p>
        </div>
        <div class="menu">
            <a class="menu_link" href="index.php">пикчи</a>
            <a class="menu_link" href="">что это такое?</a>
            <a class="menu_link" href="user/profile.php<?php if (isset($_SESSION['id'])) echo ("?id=".$_SESSION['id']); ?>">мой уголок</a>
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