<?php
    session_start();
    include_once "../../php/config.php";
    $paidby=$_SESSION['unique_id'];
    $gid=$_SESSION['group_id'];
    $id= $_POST['bill_id_hidden'];
    $cost=$_POST['cost_hidden'];

    $query="UPDATE `bills` SET `status`='P',`paid_by`='$paidby' WHERE `bill_id`='$id'";

    $sql=mysqli_query($conn,$query);
    $q=mysqli_query($conn, "SELECT * from bills where bill_id=$id");
    $row2=mysqli_fetch_assoc($q);

    if($row2['status']=='P'){
        $q3=mysqli_query($conn, "SELECT * FROM users where not unique_id='$paidby' and group_id='$gid'");
        $count=mysqli_num_rows($q3)+1;
        $amount=$cost/$count;
        while($row=mysqli_fetch_assoc($q3)){
            $query2=mysqli_query($conn, "INSERT INTO iou(i_iou, u_iou, amt, msg) VALUES ($row[unique_id], $paidby, $amount, 'Bill id : #$id')");
        } 
    }else{
        echo "Some error occurred";
    }
?>

<!-- $query="UPDATE `bills` SET `status`='P',`paid_by`='$paidby' WHERE `bill_id`='$id'"; -->
