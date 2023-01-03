<?php
    session_start();
    include_once ('connect.php');

    $id = $_POST['id'];
    mysqli_query($conn, "update users set admin='0' where id='$id'");

    header("Location: ../admin_panel.php");