<?php
    session_start();
    include_once "../php/config.php";
    $outgoing_id = $_SESSION['unique_id'];
    $sql = "SELECT * FROM users WHERE NOT unique_id = {$outgoing_id} ORDER BY user_id DESC";
    $query = mysqli_query($conn, $sql);
    $output = "";
    $group="SELECT * from users";
    if(mysqli_num_rows($query) == 0){
        $output .= "No users are available to chat";
    }else{
        while($row = mysqli_fetch_assoc($query)){
                $sql2 = "SELECT * FROM messages WHERE (in_msg_id = {$row['unique_id']}
                        OR out_msg_id = {$row['unique_id']}) AND (out_msg_id = {$outgoing_id} 
                        OR in_msg_id = {$outgoing_id}) ORDER BY msg_id DESC LIMIT 1";
                $query2 = mysqli_query($conn, $sql2);
                $row2 = mysqli_fetch_assoc($query2);
                if(mysqli_num_rows($query2) > 0){
                    $result = $row2['msg'];
                }else{
                    $result ="No message available";
                }
                (strlen($result) > 28) ? $msg =  substr($result, 0, 28) . '...' : $msg = $result;
                if(isset($row2['out_msg_id'])){
                    ($outgoing_id == $row2['out_msg_id']) ? $you = "You: " : $you = "";
                }else{
                    $you = "";
                }
                ($row['status'] == "Offline now") ? $offline = "offline" : $offline = "";
                ($outgoing_id == $row['unique_id']) ? $hid_me = "hide" : $hid_me = "";
                
                $iou=mysqli_query($conn, "SELECT sum(amt) from iou where i_iou={$outgoing_id} AND u_iou={$row['unique_id']}");
                $uoi=mysqli_query($conn, "SELECT sum(amt) from iou where u_iou={$outgoing_id} AND i_iou={$row['unique_id']}");

                while($rowuoi=mysqli_fetch_array($uoi)){
                    $rowiou=mysqli_fetch_array($iou);
                    $output .= ' <a class="iou-a" href="pays.php?user_id='. $row['unique_id'] .'">
                            <div class="content iou-content">
                            <img src="../php/images/'. $row['img'] .'" alt="">
                            <div class="details iou-details">
                                <span>'. $row['fname']. " " . $row['lname'] .'</span>
                                <p>You owe '. $row['fname']. ' : '.$rowiou['sum(amt)'].'</p>
                                <p>'. $row['fname']. '  owes you : '.$rowuoi['sum(amt)'].'</p>
                            </div>
                            </div>
                        </a>';
                }
                
        }
    }
    echo $output;
?>