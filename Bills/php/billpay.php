<?php 
    session_start();
    include_once "../../php/config.php";
    $gid=$_SESSION['group_id'];
    $bill_name = $_POST['bill_name'];
    $id = $_POST['bill_id'];
    $cost = $_POST['cost'];
    $dueon = $_POST['dueon'];
    if(!empty($cost) && !empty($dueon) && !empty($id) && !empty($bill_name) ){
        $sql=mysqli_query($conn, "INSERT INTO bills (bill_name, bill_id, cost, due, group_id)
        VALUES ('{$bill_name}', '{$id}','{$cost}', '{$dueon}', '$gid');");
        
        echo "success";
    }else{
        echo "All input fields are required!";
    }
?>