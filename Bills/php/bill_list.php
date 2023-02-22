<?php 
    session_start();
    if(isset($_SESSION['unique_id'])){
        include_once "../../php/config.php";
        $outgoing_id = $_SESSION['unique_id'];
        $gid=$_SESSION['group_id'];
        $output = "";
        $sql = "SELECT * FROM bills where group_id='$gid';";
        $query = mysqli_query($conn, $sql);
        if(mysqli_num_rows($query) > 0){
            while($row = mysqli_fetch_assoc($query)){
                if($row['status'] === "NP"){
                    $output .= '<div class="content bill">
                            <div class="details">
                                <h3 style="margin-top: 10px;">'.$row['bill_name'].': #'.$row['bill_id'].'</h3>
                                <p>₹'.$row['cost'].'</p>
                                <p>Unpaid</p>
                                <p>To be paid on : '.$row['due'].'</p>
                            </div>
                            <div class="check-bill">
                            
                            <form action="bill_list.php" method="POST">
                            <input name="bill_id_hidden" value="'.$row['bill_id'].'" type="hidden">
                            <input name="cost_hidden" value="'.$row['cost'].'" type="hidden">
                                <button type="submit">✓</button>
                            </form>
                                
                            </div>
                        </div>';
                }else{
                    $var=$row['paid_by'];
                    $q=mysqli_query($conn, "SELECT * from users where unique_id=$var");
                    $row2 = mysqli_fetch_assoc($q);
                    $output .= '<div class="content bill">
                            <div class="details">
                                <h3 style="margin-top: 10px;">'.$row['bill_name'].': #'.$row['bill_id'].'</h3>
                                <p>₹'.$row['cost'].'</p>
                                <p style="color: #2f684e;">Paid by: '.$row2['fname'].' '.$row2['lname'].'</p>
                                <p>Due on: '.$row['due'].'</p>
                            </div>
                        </div>';

                }
            }
        }else{
            $output .= '<div class="text" style="margin-top: 10px;">No bills are available.</div>';
        }
        echo $output;
    }else{
        header("location: ../login.php");
    }

?>