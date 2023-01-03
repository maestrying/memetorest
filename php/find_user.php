<?php
    session_start();
    include_once ('connect.php');

    $id = $_POST['id'];
    $query = mysqli_query($conn, "select * from users,stats where id=user_id and id='$id'");
    $user = $query->fetch_assoc();

    echo json_encode($user);