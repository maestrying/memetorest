<?php
    session_start();
    include_once ("connect.php");

    $login = mysqli_real_escape_string($conn, $_POST['login']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $result = mysqli_query($conn, "select * from users where login='$login'");
    $row = $result->fetch_assoc();

    if (!isset($row['login'])){
        $_SESSION['message'] = "аккаунт не найден";
        header("Location: ../user/signIn.php");
    }
    else {
        if (password_verify($password, $row['password'])){
            $user_id = $row['id'];
            $_SESSION['id'] = $user_id;
            header("Location: ../user/profile.php?id=$user_id");
        }
        else {
            $_SESSION['message'] = "неверный пароль";
            header("Location: ../user/signIn.php");
        }
    }

