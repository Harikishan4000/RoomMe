<?php 
    session_start();
    if(isset($_SESSION['unique_id'])){
        include_once "../php/config.php";
        $outgoing_id = $_SESSION['unique_id'];
        $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
        $uoi = mysqli_real_escape_string($conn, $_POST['uoi']);
        $msg= mysqli_real_escape_string($conn, $_POST['msg']);
        // $enc_msg=$message;
        if(!empty($uoi)){
            $sql = mysqli_query($conn, "INSERT INTO iou (i_iou, u_iou, amt, msg)
                                        VALUES ({$incoming_id}, {$outgoing_id}, '{$uoi}', '{$msg}')") or die();
            
        }
    }else{
        header("location: ../login.php");
    }


    
?>