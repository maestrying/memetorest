<?php
    session_start();
    include_once ('connect.php');

    $post_id = $_POST['id'];
    $query = mysqli_query($conn, ("select * from users, posts where users.id=published_by and posts.id='$post_id'"));
    $post = $query->fetch_assoc();
    echo json_encode($post);
