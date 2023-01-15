<?php
    session_start();
    include_once "../php/config.php";
    $user_id = $_SESSION['unique_id'];
    $gid = mysqli_real_escape_string($conn, $_POST['group_id']);
    $sql = mysqli_query($conn, "SELECT * FROM `group` WHERE `group_id` = '{$gid}'");
    if(mysqli_num_rows($sql)>0){
        $sql2=mysqli_query($conn, "UPDATE `users` SET `group_id`='{$gid}' WHERE `unique_id`='{$user_id}'");
        $_SESSION['group_id'] = $gid;

        echo "success";
    }else{
        echo "Enter a valid Room ID";
    }
?>