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
            <a class="menu_link" href="../index.php" style="padding: 0 1.4vw">пикчи</a>
            <a class="menu_link" href="../about_us.php" style="padding: 0 0.8vw">что это такое?</a>
            <a class="menu_link" href="profile.php" style="padding: 0 1vw">мой уголок</a>
        </div>
        <button>сделать вброс</button>
    </header>

    <div class="content">
        <div class="content_container" style="height: 82vh;">
            <div class="form_block">
                <?php
                    if (isset($_SESSION['message'])){
                        echo ' <p class="err">'.$_SESSION['message'].'</p> ';
                        unset($_SESSION['message']);
                    }
                ?>
                <p class="form_header">вместе мы сила</p>
                <form action="../php/register.php" method="post">
                    <label>тут логин</label>
                    <input type="text" name="login">
                    <label>тут почта</label>
                    <input type="email" name="email">
                    <label>тут пароль</label>
                    <input type="password" name="password">
                    <label>тут еще раз пароль</label>
                    <input type="password" name="submit_password">
                    <button type="submit">влететь с двух ног</button>
                </form>
                <p class="form_link">ты уже с нами с нами? - <a href="signIn.php">залетай</a></p>
            </div>

            <div class="sign_gif4"></div>
            <div class="sign_gif5"></div>
            <div class="sign_gif6"></div>
        </div>
    </div>

    <footer>
        <div class="footer_logo">
            <img class="logo" src="../assets/logo_white.svg"></img>
            <p>© все права защищены</p>
        </div>
        <div class="menu">
            <a class="menu_link" href="../index.php">пикчи</a>
            <a class="menu_link" href="../about_us.php">что это такое?</a>
            <a class="menu_link" href="profile.php">мой уголок</a>
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