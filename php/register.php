<?php
    session_start();
    include_once ('connect.php');

    $login = mysqli_real_escape_string($conn, $_POST['login']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $submit_password = mysqli_real_escape_string($conn, $_POST['submit_password']);

    $result = mysqli_query($conn, "select * from users where login='$login'");
    $row = $result->fetch_assoc();

    if (isset($row['login']) && $login != "") {
        var_dump($row);
        $_SESSION['message'] = "логин занят";
        header("Location: ../user/signUp.php");
    } else if (isset($row['email']) && $email != "") {
        $_SESSION['message'] = "почта занята";
        header("Location: ../user/signUp.php");
    } else if ($password != $submit_password) {
        $_SESSION['message'] = "пароли не совпадают";
        header("Location: ../user/signUp.php");
    } else {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        mysqli_query($conn,"insert into users (login, password, email) values ('$login', '$hash', '$email')");

        $result = mysqli_query($conn, "select * from users where login='$login'");
        $user = $result->fetch_assoc();

        $user_id = $user['id'];
        mysqli_query($conn,"insert into stats (user_id) values ('$user_id')");
        $_SESSION['id'] = $user_id;

        header("Location: ../user/profile.php?id=$user_id");
    }





