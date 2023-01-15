<?php
    session_start();
    include_once "../../php/config.php";
    $gid=$_SESSION['group_id'];
    $chore_name=$_POST['chore_name'];
    $chore_by=$_POST['chore_by'];
    if(!empty($chore_name)){
        $sql=mysqli_query($conn, "INSERT INTO chores(chore_name, chore_by, status, group_id) VALUES('{$chore_name}', '{$chore_by}', 'N', '$gid')");
        echo "success";
    }else{
        echo "All input fields required!";
    }
    
?>