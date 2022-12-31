<?php 
    session_start();
    if(isset($_SESSION['unique_id'])){
        include_once "../../php/config.php";
        $outgoing_id = $_SESSION['unique_id'];
        $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
        $output = "";
        $sql = "SELECT * FROM bills;";
        $query = mysqli_query($conn, $sql);
        if(mysqli_num_rows($query) > 0){
            while($row = mysqli_fetch_assoc($query)){
                if($row['status'] === "NP"){
                    $output .= '<div class="content bill">
                            <div class="details">
                                <h3 style="margin-top: 10px;">'.$row['bill_name'].': #'.$row['bill_id'].'</h3>
                                <p>'.$row['cost'].'</p>
                                <p>Unpaid</p>
                                <p>To be paid on : '.$row['due'].'</p>
                            </div>
                            <div class="check-bill">
                                <p>✓</p>
                                <span name="bill_id_hidden"hidden>'.$row['bill_id'].'</span>
                            </div>
                        </div>';
                }else{
                    $output .= '<div class="content bill">
                            <div class="details">
                                <h3 style="margin-top: 10px;">'.$row['bill_name'].': #'.$row['bill_id'].'</h3>
                                <p>'.$row['cost'].'</p>
                                <p style="color: #2f684e;">Paid</p>
                                <p>To be paid on : '.$row['due'].'</p>
                            </div>
                        </div>';

                }
            }
        }else{
            $output .= '<div class="text">No bills are available. Once you send message they will appear here.</div>';
        }
        echo $output;
    }else{
        header("location: ../login.php");
    }

?>