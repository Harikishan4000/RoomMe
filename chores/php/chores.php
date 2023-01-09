<?php 
    session_start();
    if(isset($_SESSION['unique_id'])){
        include_once "../../php/config.php";
        $outgoing_id = $_SESSION['unique_id'];
        $output = "";
        $sql = "SELECT * FROM chores;";//add session id
        $query = mysqli_query($conn, $sql);

        if(mysqli_num_rows($query) > 0){
            while($row = mysqli_fetch_assoc($query)){
                $sql2="SELECT * from users where unique_id={$row['chore_by']}";
                $query2=mysqli_query($conn, $sql2);
                $row_users=mysqli_fetch_assoc($query2);
                if($row['chore_by']==$outgoing_id){
                    if($row['status'] === "N"){
                    $output .= '<div class="content bill">
                            <div class="details">
                                <h3 style="margin-top: 10px;">'.$row['chore_name'].'</h3>
                                <p style="color: #fff;">To be done by: '.$row_users['fname'].' '.$row_users['lname'].'</p> <!--ADD NAME HEREE--!>
                                <p>Undone</p>
                            </div>
                            <div class="check-bill">
                            <a href="" onclick="removee()">✓</a>
                                <span name="bill_id_hidden"hidden>'.$row['bill_id'].'</span>
                            </div>
                        </div>';
                    }
                    else{
                        $output .= '<div class="content bill">
                                <div class="details">
                                    <h3 style="margin-top: 10px;">'.$row['chore_name'].'</h3>
                                    <p style="color: #2f684e;">To be done by: '.$row_users['fname'].' '.$row_users['lname'].'</p>
                                    <p style="color: #2f684e;">Done</p>
                                </div>
                            </div>';
    
                    }
                }else{
                    if($row['status'] === "N"){
                        $output .= '<div class="content bill">
                                <div class="details">
                                    <h3 style="margin-top: 10px;">'.$row['chore_name'].'</h3>
                                    <p>To be done by: '.$row_users['fname'].' '.$row_users['lname'].'</p> <!--ADD NAME HEREE--!>
                                    <p>Undone</p>
                                </div>
                                <div class="check-bill">
                                <a href="" onclick="removee()">✓</a>
                                    <span name="bill_id_hidden"hidden>'.$row['bill_id'].'</span>
                                </div>
                            </div>';
                    }
                    else{
                        $output .= '<div class="content bill">
                                <div class="details">
                                    <h3 style="margin-top: 10px;">'.$row['chore_name'].'</h3>
                                    <p>To be done by: '.$row_users['fname'].' '.$row_users['lname'].'</p> <!--ADD NAME HEREE--!>
                                    <p style="color: #2f684e;">Done</p>
                                    <p>To be paid on : '.$row['due'].'</p>
                                </div>
                            </div>';
    
                    }

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