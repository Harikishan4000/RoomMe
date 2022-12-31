<?php
    session_start();
    include_once "../../php/config.php";
    $paidby=$_SESSION['unique_id'];
    $id= $_POST['bill_id_hidden'];
  
    $query="UPDATE TABLE bills SET status='P' AND paid_by='{$paidby} where bill_id='{$id}'';";
    if($sql=mysqli_query($conn,$query)){
        echo 'success';
    }else{
        echo "Some error occurred";
    }
?>