<?php
    session_start();
    include_once "../php/config.php";
    $user_id = $_SESSION['unique_id'];
    $sql = mysqli_query($conn, "SELECT * FROM `users` WHERE `unique_id` = '$user_id'");
    if(mysqli_num_rows($sql)>0){
        $sql2=mysqli_query($conn, "UPDATE `users` SET `group_id`=NULL WHERE `unique_id`='{$user_id}'");
        $_SESSION['group_id'] = NULL;
        header("location: ../users.php");
    }
?>