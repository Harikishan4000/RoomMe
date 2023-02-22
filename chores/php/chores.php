<?php 
    session_start();
    if(isset($_SESSION['unique_id'])){
        include_once "../../php/config.php";
        $outgoing_id = $_SESSION['unique_id'];
        $gid=$_SESSION['group_id'];
        $output = "";
        $sql = "SELECT * FROM chores where group_id='$gid';";//add session id
        $query = mysqli_query($conn, $sql);

        if(mysqli_num_rows($query) > 0){
            while($row = mysqli_fetch_assoc($query)){
                if($row['chore_by']){
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
                                <p>'.$row['time'].'</p>
                            </div>
                            <div class="check-bill">
                            <form action="chores.php" method="POST">
                            <input name="chore_id" value="'.$row['chore_id'].'" type="hidden">
                                <button type="submit">✓</button>
                                </form>
                                </div>
                            </div>';
                    }
                    else{
                        $output .= '<div class="content bill">
                                <div class="details">
                                    <h3 style="margin-top: 10px;">'.$row['chore_name'].'</h3>
                                    <p style="color: #2f684e;">To be done by: '.$row_users['fname'].' '.$row_users['lname'].'</p>
                                    <p style="color: #2f684e;">Done</p>
                                    <p>'.$row['time'].'</p>

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
                                <p>'.$row['time'].'</p>

                                </div>
                                <div class="check-bill">

                                <form action="chores.php" method="POST">
                            <input name="chore_id" value="'.$row['chore_id'].'" type="hidden">
                                <button type="submit">✓</button>
                            </form>

                                </div>
                            </div>';
                    }
                    else{
                        $output .= '<div class="content bill">
                                <div class="details">
                                    <h3 style="margin-top: 10px;">'.$row['chore_name'].'</h3>
                                    <p>To be done by: '.$row_users['fname'].' '.$row_users['lname'].'</p> <!--ADD NAME HEREE--!>
                                    <p style="color: #2f684e;">Done</p>

                                     <p>'.$row['time'].'</p>

                                </div>
                            </div>';
    
                    }

                }
                }
               else{
                if($row['status'] === "N"){
                    $output .= '<div class="content bill">
                            <div class="details">
                                <h3 style="margin-top: 10px;">PAY BILL</h3>
                                <p>Unpaid</p>
                            </div>
                            <div class="check-bill">
                            <form action="chores.php" method="POST">
                            <input name="chore_id" value="'.$row['chore_id'].'" type="hidden">
                                <button type="submit">✓</button>
                                </form>
                                </div>
                            </div>';
                    }
                    else{
                        $delete="DELETE FROM `chores` WHERE chore_id={$row['chore_id']}";
                        $del_q=mysqli_query($conn, $delete);
                    }
               } 
                
            }
        }else{
            $output .= '<div class="text" style="margin-top: 10px;">No chores are available.</div>';
        }
        echo $output;
    }else{
        header("location: ../login.php");
    }

?>