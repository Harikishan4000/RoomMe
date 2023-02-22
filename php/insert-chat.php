<?php 
    session_start();
    if(isset($_SESSION['unique_id'])){
        include_once "config.php";
        $outgoing_id = $_SESSION['unique_id'];
        $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
        $message = mysqli_real_escape_string($conn, $_POST['message']);
        
        // Storingthe cipher method
        $ciphering = "AES-128-CTR";

        // Using OpenSSl Encryption method
        $iv_length = openssl_cipher_iv_length($ciphering);
        $options = 0;

        $encryption_iv = '1234567891011121';

        $encryption_key = "Pollen-Grains";

        $encryption = openssl_encrypt($message, $ciphering, $encryption_key, $options, $encryption_iv);

        if(!empty($message)){
            $sql = mysqli_query($conn, "INSERT INTO messages (in_msg_id, out_msg_id, msg)
                                        VALUES ({$incoming_id}, {$outgoing_id}, '{$encryption}')") or die();
        }
    }else{
        header("location: ../login.php");
    }


    
?>