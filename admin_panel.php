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
        <img class="logo" src="assets/admin_logo.svg"></img>
        <div class="menu">
            <a class="menu_link" href="#" style="padding: 0 1.4vw">пикчи</a>
            <a class="menu_link" href="about_us.php" style="padding: 0 0.8vw">что это такое?</a>
            <a class="menu_link" href="user/profile.php<?php if (isset($_SESSION['id'])) echo ("?id=".$_SESSION['id']); ?>" style="padding: 0 1vw">мой уголок</a>
        </div>
        <button>сделать вброс</button>
    </header>

    <div class="content">
        <div class="content_container" style="height: 82vh; flex-direction: row; justify-content:space-between;">
            <div class="panel_bar">
                <div class="panel_link" onclick="panel_show(i=1);">
                    <p>заблочить чела</p>
                    <img src="assets/svg/arrow_r_white.svg" width="3%">
                </div>
                <div class="panel_link" onclick="panel_show(i=2);">
                    <p>разблочить чела</p>
                    <img src="assets/svg/arrow_r_white.svg" width="3%">
                </div>
                <div class="panel_link" onclick="panel_show(i=3);">
                    <p>удалить запись</p>
                    <img src="assets/svg/arrow_r_white.svg" width="3%">
                </div>
                <div class="panel_link" onclick="panel_show(i=4);">
                    <p>добавить админа</p>
                    <img src="assets/svg/arrow_r_white.svg" width="3%">
                </div>
                <div class="panel_link" onclick="panel_show(i=5);">
                    <p>удалить админа</p>
                    <img src="assets/svg/arrow_r_white.svg" width="3%">
                </div>
            </div>
            <div id="panel_block1">
                <div class="block_l">
                    <form action="php/block_user.php" method="post">
                        <label>заблочить чела</label>
                        <input name="id" onkeyup="find(value, 1)" type="text" placeholder="id чела">
                        <input name="reason" type="text" placeholder="причина">
                        <button type="submit" style="margin-top: 2vh; width: 12vw">блокнуть</button>
                    </form>
                </div>
                <div class="block_r">
                    <div class="profile_info" style="margin-top: 5vh;">
                        <img class="profile_ava"  id='avatar1' src="avatars/default.jpg" style="width: 150px; height: 150px;">
                        <div class="profile_log_descr">
                            <p class="profile_login" id="login1"></p>
                            <p class="profile_descr" id="status1"></p>
                        </div>
                        <div class="profile_stat">
                            <div class="stat_block">
                                <p class="stat_count" id="published1"></p>
                                <p class="stat_descr">опубликованных пикч</p>
                            </div>
                            <div class="stat_block">
                                <p class="stat_count" id="liked1"></p>
                                <p class="stat_descr">найденных пикч</p>
                            </div>
                            <div class="stat_block">
                                <p class="stat_count" id="subscribers1"></p>
                                <p class="stat_descr">подписчиков</p>
                            </div>
                            <div class="stat_block">
                                <p class="stat_count" id="subsribes1"></p>
                                <p class="stat_descr">подписок</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="panel_block2">
                <div class="block_l">
                    <form action="php/unblock_user.php" method="post">
                        <label>разблочить чела</label>
                        <input name='id' onkeyup="find(value, 2)" type="text" placeholder="id чела">
                        <button type="submit" style="margin-top: 2vh; width: 10vw">разблок</button>
                    </form>
                </div>
                <div class="block_r">
                    <div class="profile_info" style="margin-top: 5vh;">
                        <img class="profile_ava"  id='avatar2' src="avatars/default.jpg" style="width: 150px; height: 150px;">
                        <div class="profile_log_descr">
                            <p class="profile_login" id="login2"></p>
                            <p class="profile_descr" id="status2"></p>
                        </div>
                        <div class="profile_stat">
                            <div class="stat_block">
                                <p class="stat_count" id="published2"></p>
                                <p class="stat_descr">опубликованных пикч</p>
                            </div>
                            <div class="stat_block">
                                <p class="stat_count" id="liked2"></p>
                                <p class="stat_descr">найденных пикч</p>
                            </div>
                            <div class="stat_block">
                                <p class="stat_count" id="subscribers2"></p>
                                <p class="stat_descr">подписчиков</p>
                            </div>
                            <div class="stat_block">
                                <p class="stat_count" id="subsribes2"></p>
                                <p class="stat_descr">подписок</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="panel_block3">
                <div class="block_l">
                    <form action="">
                        <label>удалить запись</label>
                        <input type="text" placeholder="id записи">
                        <button style="margin-top: 2vh; width: 10vw">удалить</button>
                    </form>
                </div>
                <div class="block_r">
                    <div class="mem_block" style="margin-top: 4vh;">
                        <div class="mem_info">
                            <div class="mem_info_ava">
                                <img src="assets/img/скала.jpg" style="border-radius: 3px;" width="100%" height="100%"> <!-- тут ава -->
                            </div>
                            <div class="nick_descr">
                                <p class="nick">login</p> <!-- тут имя пользователя -->
                                <p class="descr">когда позвал старшего брата на стрелу</p> <!-- тут подпись мема -->
                            </div>
                        </div>

                        <div class="mem_carousel">
                            <div class="mem_img">
                                <img src="assets/img/пес.jpg" style="border-radius: 3px;"> <!-- тут мем -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="panel_block4">
                <div class="block_l">
                    <form action="php/add_admin.php" method="post">
                        <label>добавить админа</label>
                        <input name='id' onkeyup="find(value, 3)" type="text" placeholder="id чела">
                        <button type="submit" style="margin-top: 2vh; width: 10vw">добавить</button>
                    </form>
                </div>
                <div class="block_r">
                    <div class="profile_info" style="margin-top: 5vh;">
                        <img class="profile_ava"  id='avatar3' src="avatars/default.jpg" style="width: 150px; height: 150px;">
                        <div class="profile_log_descr">
                            <p class="profile_login" id="login3"></p>
                            <p class="profile_descr" id="status3"></p>
                        </div>
                        <div class="profile_stat">
                            <div class="stat_block">
                                <p class="stat_count" id="published3"></p>
                                <p class="stat_descr">опубликованных пикч</p>
                            </div>
                            <div class="stat_block">
                                <p class="stat_count" id="liked3"></p>
                                <p class="stat_descr">найденных пикч</p>
                            </div>
                            <div class="stat_block">
                                <p class="stat_count" id="subscribers3"></p>
                                <p class="stat_descr">подписчиков</p>
                            </div>
                            <div class="stat_block">
                                <p class="stat_count" id="subsribes3"></p>
                                <p class="stat_descr">подписок</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="panel_block5">
                <div class="block_l">
                    <form action="php/del_admin.php" method="post">
                        <label>удалить админа</label>
                        <input name='id' onkeyup="find(value, 4)" type="text" placeholder="id чела">
                        <button type="submit" style="margin-top: 2vh; width: 10vw">удалить</button>
                    </form>
                </div>
                <div class="block_r">
                    <div class="profile_info" style="margin-top: 5vh;">
                        <img class="profile_ava"  id='avatar4' src="avatars/default.jpg" style="width: 150px; height: 150px;">
                        <div class="profile_log_descr">
                            <p class="profile_login" id="login4"></p>
                            <p class="profile_descr" id="status4"></p>
                        </div>
                        <div class="profile_stat">
                            <div class="stat_block">
                                <p class="stat_count" id="published4"></p>
                                <p class="stat_descr">опубликованных пикч</p>
                            </div>
                            <div class="stat_block">
                                <p class="stat_count" id="liked4"></p>
                                <p class="stat_descr">найденных пикч</p>
                            </div>
                            <div class="stat_block">
                                <p class="stat_count" id="subscribers4"></p>
                                <p class="stat_descr">подписчиков</p>
                            </div>
                            <div class="stat_block">
                                <p class="stat_count" id="subsribes4"></p>
                                <p class="stat_descr">подписок</p>
                            </div>
                        </div>
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
</body>
<script src="assets/scripts/jquery-3.6.3.min.js"></script>
<script>
    function find(id, block_number){
        $.ajax({
            url: 'php/find_user.php',
            method: 'post',
            data: {id: id},
            success: function(result){
                let user = JSON.parse(result);
                if (!(user === null)) {
                    document.getElementById('avatar' + block_number).src = 'avatars/' + user['avatar'];
                    document.getElementById('login' + block_number).innerHTML = user['login'];
                    if (user['is_blocked'] === '1'){
                        document.getElementById('status' + block_number).innerHTML = 'пользователь заблокирован';
                        document.getElementById('status' + block_number).style.color = 'red';
                    }
                    else if (user['admin'] === '1'){
                        document.getElementById('status' + block_number).innerHTML = 'администратор';
                        document.getElementById('status' + block_number).style.color = '#F69523';
                    }
                    else {
                        document.getElementById('status' + block_number).innerHTML = user['status'];
                        document.getElementById('status' + block_number).style.color = 'black';
                    }
                    document.getElementById('published' + block_number).innerHTML = user['published'];
                    document.getElementById('liked' + block_number).innerHTML = user['finded'];
                    document.getElementById('subscribers' + block_number).innerHTML = user['subscribers'];
                    document.getElementById('subsribes' + block_number).innerHTML = user['subscribes'];
                }
                else {
                    document.getElementById('avatar' + block_number).src = 'avatars/default.jpg';
                    document.getElementById('login' + block_number).innerHTML = 'пользователь не найден';
                    document.getElementById('status' + block_number).innerHTML = '';
                    document.getElementById('published' + block_number).innerHTML = '-';
                    document.getElementById('liked' + block_number).innerHTML = '-';
                    document.getElementById('subscribers' + block_number).innerHTML = '-';
                    document.getElementById('subsribes' + block_number).innerHTML = '-';
                }
            }
        });
    }

    function panel_show(){
        elem = document.getElementById('panel_block' + i);
        for (j = 1; j <= 5; j++) {
            if (j != i) {
                elem_hide = document.getElementById('panel_block' + j);
                elem_hide.style.display='none';
            }
        }
        state = elem.style.display;
        if (state == 'flex') {
            elem.style.display='none';
        }
        else {
            elem.style.display='flex';
        }
    }
</script>
</html>