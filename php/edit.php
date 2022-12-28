<?php
    session_start();
    include_once ("connect.php");
    $user_id = $_SESSION['id'];
    $query = mysqli_query($conn, "select * from users where id='$user_id'");
    $user = $query->fetch_assoc();

    if ($_POST['login'] != ""){
        $login = $_POST['login'];
        mysqli_query($conn, "update users set login='$login' where id='$user_id'");
    }
    if ($_POST['email'] != ""){
        $email = $_POST['email'];
        mysqli_query($conn, "update users set email='$email' where id='$user_id'");
    }
    if ($_POST['old_password'] != "" && $_POST['new_password'] != ""){

        $password = $_POST['old_password'];
        if (password_verify($password, $user['password'])){
            $new_password = password_hash($_POST['new_password'], PASSWORD_DEFAULT);
            mysqli_query($conn, "update users set password='$new_password' where id='$user_id'");
        }
    }
    if ($_POST['status'] != ""){
        $status = $_POST['status'];
        mysqli_query($conn, "update users set status='$status' where id='$user_id'");
    }
    if ($_FILES['avatar']['name'] != ""){
        $avatar_path = '../avatars/'.time().'.jpg';
        $name = time().'.jpg';
        mysqli_query($conn, "update users set avatar='$name' where id='$user_id'");
        move_uploaded_file($_FILES['avatar']['tmp_name'], $avatar_path);

        if ($user['avatar'] != 'default.jpg'){
            unlink('../avatars/'.$user['avatar']);
        }
    }
    if ($_FILES['cover']['name'] != ""){
        $cover_path = '../covers/'.time().'.jpg';
        $name = time().'.jpg';
        mysqli_query($conn, "update users set cover='$name' where id='$user_id'");
        move_uploaded_file($_FILES['cover']['tmp_name'], $cover_path);
        $_SESSION['cover_path'] = $cover_path;
    }
    if (isset($_POST['delete_avatar'])){
        mysqli_query($conn, "update users set avatar=default where id='$user_id'");
        unset($_POST['delete_avatar']);
        unlink('../avatars/'.$user['avatar']);
    }
    header("Location: ../user/profile.php?id=$user_id");