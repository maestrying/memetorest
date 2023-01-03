<?php
    session_start();
    include_once ('connect.php');
    $meme_id = $_POST['meme_id'];
    $user_id = $_SESSION['id'];
    $query = mysqli_query($conn, "select * from liked_memes where meme_id='$meme_id' and $user_id='$user_id'");
    $result = $query->fetch_assoc();

    if (empty($result)){
        mysqli_query($conn, "insert into liked_memes (meme_id, liked_by) values ('$meme_id', $user_id)");
        mysqli_query($conn, "update stats set finded=`finded`+1 where user_id='$user_id'");
        echo 'liked';
    }
    else {
        mysqli_query($conn, "delete from liked_memes where meme_id='$meme_id' and $user_id='$user_id'");
        mysqli_query($conn, "update stats set finded=`finded`-1 where user_id='$user_id'");
        echo 'unliked';
    }

