<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MEMETOREST</title>
    <link rel="icon" type="image/x-icon" href="../assets/fav.jpg">
    <link rel="stylesheet" href="../assets/styles/main.css">
    <script src="../assets/scripts/modal_win.js"></script>
</head>
<body>
    <header>
        <img class="logo" src="../assets/logo.svg"></img>
        <div class="menu">
            <a class="menu_link" href="../index.php" style="padding: 0 1.4vw">пикчи</a>
            <a class="menu_link" href="../about_us.php" style="padding: 0 0.8vw">что это такое?</a>
            <a class="menu_link" href="#" style="background-image: url('../assets/svg/2.svg'); background-repeat: no-repeat;  background-position: 0% bottom; background-size: 100%; padding: 0 1vw">мой уголок</a>
        </div>
        <button>сделать вброс</button>
    </header>
    <div class="content">
        <div class="content_container" style="min-height: 82vh; display: block;">
            <div class="profile_cover"></div>
            <div class="profile_content">
                <div class="profile_info">
                    <img class="profile_ava" src="../assets/img/ava.jpg">
                    <div class="profile_log_descr">
                        <p class="profile_login">login</p>
                        <p class="profile_descr">Lorem ipsum dolor sit amet consectetur. Risus felis luctus amet lectus mattis sem in. Id nibh neque vulputate vel tristique interdum volutpat.</p>
                    </div>
                    <div class="profile_stat">
                        <div class="stat_block">
                            <p class="stat_count">4</p>
                            <p class="stat_descr">опубликованных пикч</p>
                        </div>
                        <div class="stat_block">
                            <p class="stat_count">42</p>
                            <p class="stat_descr">найденных пикч</p>
                        </div>
                        <div class="stat_block">
                            <p class="stat_count">2</p>
                            <p class="stat_descr">подписчиков</p>
                        </div>
                        <div class="stat_block">
                            <p class="stat_count">10</p>
                            <p class="stat_descr">подписок</p>
                        </div>
                    </div>
                </div>
                <div class="edit_content">
                    <p class="edit_header">редачить профиль</p>
                    <form action="">
                        <div class="inp">
                            <label>логин</label>
                            <input type="text">
                        </div>
                        <div class="inp">
                            <label>почта</label>
                            <input type="email">
                        </div>
                        <div class="inp">
                            <label>тут старый пароль</label>
                            <input type="password">
                        </div>
                        <div class="inp">
                            <label>тут новый пароль</label>
                            <input type="password">
                        </div>
                        <div class="inp">
                            <label>статус</label>
                            <input type="text">
                        </div>
                        <div class="radio_btns">
                            <input type="checkbox">
                            <p>удалиться</p>
                        </div>
                        <button style="width: 200px; margin-top: 4vh;">сохранить</button>
                    </form>
                </div>
            </div>
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
            <a class="menu_link" href="#">мой уголок</a>
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