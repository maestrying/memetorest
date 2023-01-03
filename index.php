<?php
    session_start();
    include_once ('php/connect.php');
    if(isset($_SESSION['meme'])){
        mysqli_query($conn, "delete from posts where share='0'");
        unlink('../posts/'.$_SESSION['meme'].'.jpg');
        unset($_SESSION['meme']);
    }
    if(!isset($_SESSION['id'])){
        header('Location: user/signIn.php');
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
            <a class="menu_link" href="#" style="background-image: url('assets/svg/3.svg'); background-repeat: no-repeat;  background-position: 0% bottom; background-size: 100%; padding: 0 1.4vw;">пикчи</a>
            <a class="menu_link" href="about_us.php" style="padding: 0 0.8vw;">что это такое?</a>
            <a class="menu_link" href="user/profile.php<?php if (isset($_SESSION['id'])) echo ("?id=".$_SESSION['id']); ?>" style="padding: 0 1vw;">мой уголок</a>
        </div>
        <button onclick="location.href='publish_mem.php'">сделать вброс</button>
    </header>

    <div class="content" style="background-color: #f2f2f2;">
        <div class="content_container" style="min-height: 82vh; flex-direction: column; padding: 4vh 0">
            <?php
            $query = mysqli_query($conn, "select * from posts order by date desc");
            if (isset($_SESSION['id'])) $user_id = $_SESSION['id'];

            while ($post = $query->fetch_array()){
                $published_by = $post['published_by'];
                $find = mysqli_query($conn, "select * from users where id='$published_by'");
                $result = $find->fetch_assoc();

                $login = $result['login'];
                $avatar = $result['avatar'];
                $meme = $post['id'];
                $text = $post['text'];
                $date = $post['date'];
                if (isset($_SESSION['id'])){
                    $find_like = mysqli_query($conn, "select * from liked_memes where meme_id='$meme' and liked_by='$user_id'");
                    $check = $find_like->fetch_assoc();
                    if (!empty($check)){
                        $like_status = 'добавил';
                    }
                    else {
                        $like_status = 'годно';
                    }
                }
                echo '
                <div class="post_mem_block" id="'.$meme.'">
                    <div class="post_mem_info">
                        <div class="post_user_info">
                            <div class="post_mem_info_ava">
                                <img src="avatars/'.$avatar.'" style="border-radius: 3px;" width="100%" height="100%"> <!-- тут ава -->
                            </div>
                            <div class="post_nick_descr">
                                <div class="post_main_info">
                                    <p class="post_nick">'.$login.'</p> <!-- тут имя пользователя -->
                                    <p class="post_date">'.$date.'</p>
                                </div>
                                <p class="post_descr">'.$text.'</p> <!-- тут подпись мема -->
                                <img src="posts/'.$meme.'.jpg" class="post_img">
                                <button class="post_like_btn" onclick="like('.$meme.')" id="'.$meme.'post_status">'.$like_status.'</button>
                            </div>
                        </div>
                    </div>
                </div>
            ';
            }
            ?>

            <!-- <p class="p-bg main-p1">внимание мемы</p>
            <p class="p-bg main-p2">пикчи</p>
            <p class="p-bg main-p3">пикчи</p>
            <p class="p-bg main-p4">внимание мемы</p>
            <p class="p-bg main-p5">внимание мемы</p>
            <p class="p-bg main-p6">внимание мемы</p>
            <p class="p-bg main-p7">пикчи</p> -->
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
    function like(id){
        $.ajax({
            url: '../php/like.php',
            method: 'post',
            dataType: 'html',
            data: {meme_id: id},
            success: function(result){
                if (result === 'liked'){
                    document.getElementById(id + 'post_status').innerHTML = 'добавил';
                }
                else {
                    document.getElementById(id + 'post_status').innerHTML = 'годно';
                }
                console.log(result);
            }
        });
    }
</script>
</html>