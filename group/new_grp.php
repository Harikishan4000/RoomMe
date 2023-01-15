<?php
    session_start();
    include_once "../php/config.php";
    $user_id = $_SESSION['unique_id'];

    function generateRandomString($length = 4) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
    
    $gid=generateRandomString();
    $sql=mysqli_query($conn, "INSERT INTO `group`(`group_id`) VALUES ('{$gid}')");
    $sql2=mysqli_query($conn, "UPDATE `users` SET `group_id`='{$gid}' WHERE `unique_id`='{$user_id}'");
    $_SESSION['group_id'] = $gid;

    echo "success";

?>