<?php
    session_start();
    include_once ('connect.php');
    $id = $_POST['id'];

    if ($id != $_SESSION['id']) {
        $reason = $_POST['reason'];

        mysqli_query($conn, "insert into blocked_users (user_id, reason) values ('$id', '$reason')");
        mysqli_query($conn, "update users set is_blocked='1' where id='$id'");

    }
    header("Location: ../admin_panel.php");

