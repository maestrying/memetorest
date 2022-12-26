<?php
    $conn = mysqli_connect('your_hostname', 'your_username', 'your_password', 'database_name');

    if($conn->connect_error){
        die("Ошибка: " . $conn->connect_error);
    }
