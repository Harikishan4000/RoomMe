<?php 
    session_start();
    if(isset($_SESSION['unique_id'])){
        include_once "../php/config.php";
        $outgoing_id = $_SESSION['unique_id'];
        $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
        $output = "";
        $sql = "SELECT * FROM iou LEFT JOIN users ON users.unique_id = iou.u_iou
                WHERE (u_iou = {$outgoing_id} AND i_iou = {$incoming_id})
                OR (u_iou = {$incoming_id} AND i_iou = {$outgoing_id}) ORDER BY transaction_id";
        $query = mysqli_query($conn, $sql);
        if(mysqli_num_rows($query) > 0){
            while($row = mysqli_fetch_assoc($query)){
                if($row['u_iou'] === $outgoing_id){
                    $output .= '<div class="chat outgoing">
                                <div class="details">
                                <p>₹'. $row['amt'] .'</br>For: '. $row['msg'] .'</br>'. $row['time'] .'</p>
                                </div>
                                </div>';
                }else{
                    $output .= '<div class="chat incoming">
                                <div class="details">
                                    <p>₹'. $row['amt'] .'</br>For: '. $row['msg'] .'</br>'. $row['time'] .'</p>
                                </div>
                                </div>';
                }
            }
        }else{
            $output .= '<div class="text">No messages are available. Once you send message they will appear here.</div>';
        }
        echo $output;
    }else{
        header("location: ../login.php");
    }

?>