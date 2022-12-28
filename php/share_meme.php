<?php
    session_start();
    include_once ('connect.php');
    $meme_id = $_SESSION['meme'];
    $user_id = $_SESSION['id'];
    $text = $_POST['text'];
    if ($text == "") $text = "< без комментариев >";
    mysqli_query($conn, "update posts set share='1', text='$text' where id='$meme_id'");
    unset($_SESSION['meme']);
    header("Location: ../user/profile.php?id=$user_id");
