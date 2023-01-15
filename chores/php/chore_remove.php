<?php
session_start();
include_once "../../php/config.php";
$gid=$_SESSION['group_id'];
$id=$_POST['chore_id'];
$query=mysqli_query($conn, "UPDATE `chores` SET `status`='D' WHERE `chore_id`=$id AND `group_id`='$gid'" );
?>