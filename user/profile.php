<?php
    session_start();
    include_once ('../php/connect.php');

    if (!isset($_SESSION['id'])){
        header("Location: signIn.php");
    }
    else {
        $user_id = $_GET['id'];
        $query = mysqli_query($conn,"select * from users, stats where id=user_id and id='$user_id'");
        $user = $query->fetch_assoc();

        if (!isset($user['login'])) {
            header('Location: ../php/404.php');
        }
        else {
            // получаем имя и статус пользователя
            $username = $user['login'];
            $status = $user['status'];
            $posts = $user['published'];
            $liked = $user['finded'];
            $subscribers = $user['subscribers'];
            $subscribes = $user['subscribes'];
        }
    }
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
    <script src="../assets/scripts/modal_win.js"></script>
</head>
<body>
    <header id="header">
        <img class="logo" src="../assets/logo.svg"></img>
        <div class="menu">
            <a class="menu_link" href="../index.php" style="padding: 0 1.4vw;">пикчи</a>
            <a class="menu_link" href="../about_us.php" style="padding: 0 0.8vw;">что это такое?</a>
            <a class="menu_link" href="
            <?php
                if ($user_id != $_SESSION['id']){
                    echo ('profile.php?id='.$_SESSION['id']);
                }
            ?>" style="background-image: url('../assets/svg/2.svg'); background-repeat: no-repeat;  background-position: 0% bottom; background-size: 100%; padding: 0 1vw;">мой уголок</a>
        </div>
        <button>сделать вброс</button>
    </header>

    <div class="content">
        <div class="content_container" style="min-height: 82vh; display: block;">
            <div id="modal_mem">
                <div class="mem_block">
                    <div class="mem_info">
                        <div class="mem_info_ava">
                            <img src="../assets/img/скала.jpg" style="border-radius: 3px;" width="100%" height="100%"> <!-- тут ава -->
                        </div>
                        <div class="nick_descr">
                            <p class="nick" style="color: #fff;">login</p> <!-- тут имя пользователя -->
                            <p class="descr" style="color: #fff;">когда позвал старшего брата на стрелу</p> <!-- тут подпись мема -->
                        </div>
                    </div>

                    <div class="mem_carousel">
                        <div class="mem_img" style="align-items: center;">
                            <img src="../assets/img/байден.jpg" style="border: 2px solid #1F3FEF; border-radius: 3px; width:20vw;"> <!-- тут мем -->
                        </div>
                    </div>

                    <div class="profile_buttons">
                        <button id="like_btn"">годно</button>
                        <button id="close_btn" onclick="mem_window();"">закрыть</button>
                    </div>
                </div>
            </div>
            <div class="profile_cover"></div>
            <div class="profile_content">
                <div class="profile_info">
                    <img class="profile_ava" src="../assets/img/скала.jpg">
                    <div class="profile_log_descr">
                        <p class="profile_login"><?=$username?></p>
                        <p class="profile_descr"><?=$status?></p>
                    </div>
                    <div class="profile_buttons">
                        <?php
                            if ($_SESSION['id'] == $user_id){
                                echo '<button onclick="edit()">редактировать</button>';
                                echo '<button onclick="logout()">встать и выйти</button>';
                                echo '<button onclick="logout()" class="admin_btn">аДмИнКа</button>';
                            }
                            else {
                                echo '<button>следить</button>';
                            }
                        ?>
                    </div>
                    <div class="profile_stat">
                        <div class="stat_block">
                            <p class="stat_count"><?=$posts?></p>
                            <p class="stat_descr">опубликованных пикч</p>
                        </div>
                        <div class="stat_block">
                            <p class="stat_count"><?=$liked?></p>
                            <p class="stat_descr">найденных пикч</p>
                        </div>
                        <div class="stat_block">
                            <p class="stat_count"><?=$subscribers?></p>
                            <p class="stat_descr">подписчиков</p>
                        </div>
                        <div class="stat_block">
                            <p class="stat_count"><?=$subscribes?></p>
                            <p class="stat_descr">подписок</p>
                        </div>
                    </div>
                </div>
                <div class="posts_content">
                    <p class="block_name">опубликованные пикчи</p>
                    <div class="posts">
                        <div class="post_click" onclick="mem_window();"><img class="post" src="../assets/img/байден.jpg" width="20%" height="80%"></img></div>
                    </div>
                    <p class="block_name">понравившиеся пикчи</p>
                    <div class="posts">
                    </div>
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
<script>
    function logout(){
        location.href = '../php/logout.php';
    }
    function edit(){
        location.href = 'profile_edit.php';
    }
</script>
</html>