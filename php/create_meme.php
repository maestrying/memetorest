<?php
    session_start();
    include_once ('connect.php');
    $time = time();
    $user_id = $_SESSION['id'];
    $path = '../posts/'.time().'.jpg';
    if (isset($_SESSION['meme']) && $_SESSION['meme'] != $time){
        $last_id = $_SESSION['meme'];
        unlink('../posts/'.$_SESSION['meme'].'.jpg');
        $del = mysqli_query($conn, "delete from posts where id='$last_id'");
    }
    $add = mysqli_query($conn, "insert into posts (id, published_by) values ('$time', '$user_id')");
    move_uploaded_file($_FILES['img']['tmp_name'], $path);
    $_SESSION['meme'] = $time;
    echo $path;

