<?php
    session_start();
    include_once ('php/connect.php');

    if(isset($_SESSION['meme'])){
        mysqli_query($conn, "delete from posts where share='0'");
        unlink('../posts/'.$_SESSION['meme'].'.jpg');
        unset($_SESSION['meme']);
    }

    if (!isset($_SESSION['id'])){
        header("Location: signIn.php");
    }
    else {
        $user_id = $_SESSION['id'];
        $query = mysqli_query($conn,"select * from users, stats where id=user_id and id='$user_id'");
        $user = $query->fetch_assoc();

        if (!isset($user['login'])) {
            header('Location: ../php/404.php');
        }

        else {
            // получаем имя и статус пользователя
            $username = $user['login'];
            $avatar = $user['avatar'];
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
        <div class="content_container" style="height: 82vh; flex-direction: row; justify-content:space-between;">
            <div class="publish_left_block">
                <form action="php/share_meme.php" method="post" style="align-items: center;">
                    <div class="drag_file_header">
                        залей <br> сюда <br> свой <br> мем
                        <input class="drag_input" type="file" accept='.image/jpeg' name='meme' id='meme' onchange="create_meme()">
                    </div>
                    <input type="text" name= 'text' placeholder="// тут твоя подпись к мемесу"  onkeyup="update_text()" id='input' maxlength="30" style="font-size: 11px; margin-top: 4vh;">
                    <button style="margin-top: 4vh; width: 16vw;" type="submit">показать миру</button>
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
                            <img id='preview' src="assets/img/байден.jpg" style="border: 2px solid #1F3FEF; border-radius: 3px; width:20vw;"> <!-- тут мем -->
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
</style>
</body>
<script src="assets/scripts/jquery-3.6.3.min.js"></script>
<script>
    let input = document.querySelector('input');
    function update_text(){
        document.getElementById('text').innerText = document.getElementById('input').value;
    }

    function create_meme(){
        let $input = $("#meme");
        let formData = new FormData;
        formData.append('img', $input.prop('files')[0]);

        $.ajax({
            url: "/php/create_meme.php",
            type: "post",
            cache: false,
            contentType: false,
            processData: false,
            data: formData,
            success: function (data){
                document.getElementById('preview').src = data;
            }

        })
    }

</script>
</html>