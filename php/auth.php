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
        $user_id = $row['id'];

        if ($row['is_blocked'] == '1'){
            $query = mysqli_query($conn, "select * from blocked_users where user_id='$user_id'");
            $block = $query->fetch_assoc();
            $_SESSION['message'] = 'Заблокирован по причине: '.$block['reason'];
            header("Location: ../user/signIn.php");
        }
        else {
            if (password_verify($password, $row['password'])){
                $_SESSION['id'] = $user_id;
                header("Location: ../user/profile.php?id=$user_id");
            }
            else {
                $_SESSION['message'] = "неверный пароль";
                header("Location: ../user/signIn.php");
            }
        }
    }

