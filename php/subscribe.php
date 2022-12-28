<?php
    session_start();
    include_once ('connect.php');
    $user = $_SESSION['id'];
    $subscribe_id = $_POST['id'];

    $query = mysqli_query($conn, "select * from subscribes where user_id='$user' and subscribes_to='$subscribe_id'");
    $result = $query->fetch_assoc();
    if (empty($result)) {
        mysqli_query($conn, "insert into subscribes (user_id, subscribes_to) values ('$user', '$subscribe_id')");
        mysqli_query($conn, "update stats set subscribes=`subscribes` + 1 where user_id='$user'");
        mysqli_query($conn, "update stats set subscribers=`subscribers` + 1 where user_id='$subscribe_id'");
        echo 'subscribed';
    }
    else {
        mysqli_query($conn, "delete from subscribes where user_id='$user'and subscribes_to='$subscribe_id'");
        mysqli_query($conn, "update stats set subscribes=`subscribes`-1 where user_id='$user'");
        mysqli_query($conn, "update stats set subscribers=`subscribers` - 1 where user_id='$subscribe_id'");
        echo 'unsubscribed';
    }

