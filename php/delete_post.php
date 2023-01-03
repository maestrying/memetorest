<?php
    session_start();
    include_once ('connect.php');

    $post_id = $_POST['id'];
    mysqli_query($conn, "delete from posts where id='$post_id'");
    $query = mysqli_query($conn, "select * from posts where id='$post_id'");
    $result = $query->fetch_assoc();
    $user_id = $result['published_by'];

    mysqli_query($conn, "update stats set published=`published`-1 where user_id='$user_id'");
    header("Location: ../admin_panel.php");
