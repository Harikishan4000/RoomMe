<?php 
    session_start();
    if(isset($_SESSION['unique_id'])){
        include_once "config.php";
        $outgoing_id = $_SESSION['unique_id'];
        $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
        $output = "";

        $ciphering = "AES-128-CTR";

// Using OpenSSl Encryption method
        $iv_length = openssl_cipher_iv_length($ciphering);
        $options = 0;
        $sql = "SELECT * FROM messages LEFT JOIN users ON users.unique_id = messages.out_msg_id
                WHERE (out_msg_id = {$outgoing_id} AND in_msg_id = {$incoming_id})
                OR (out_msg_id = {$incoming_id} AND in_msg_id = {$outgoing_id}) ORDER BY msg_id";
        $query = mysqli_query($conn, $sql);
        if(mysqli_num_rows($query) > 0){
            while($row = mysqli_fetch_assoc($query)){
                $decryption_iv = '1234567891011121';

// Storing the decryption key
                $decryption_key = "Pollen-Grains";

// Using openssl_decrypt() function to decrypt the data
                $decryption = openssl_decrypt($row['msg'], $ciphering, $decryption_key, $options, $decryption_iv);
                if($row['out_msg_id'] === $outgoing_id){
                    $output .= '<div class="chat outgoing">
                                <span class="hoverTimeChatHiddenOut">'.$row['timestamp'].'</span>  
                                <div class="details">
                                    <p>'. $decryption .'</p>
                                </div>
                                </div>';
                }else{
                    $output .= '<div class="chat incoming">
                                <img src="php/images/'.$row['img'].'" alt="">
                                <div class="details">
                                    <p>'. $decryption .'</p>
                                </div>
                                <span class="hoverTimeChatHiddenIn">'.$row['timestamp'].'</span>  
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