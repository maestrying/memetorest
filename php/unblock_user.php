<?php
    session_start();
    include_once ('connect.php');
    $id = $_POST['id'];

    mysqli_query($conn, "delete from blocked_users where user_id='$id'");
    mysqli_query($conn, "update users set is_blocked='0' where id='$id'");

    header("Location: ../admin_panel.php");

