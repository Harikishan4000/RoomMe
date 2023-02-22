<?php 
  session_start();
  include_once "../php/config.php";
  if(!isset($_SESSION['unique_id'])){
    header("location: ../login.php");
  }
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Room-me Bill</title>
  <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="../style.css">
  <script src="https://kit.fontawesome.com/5f546344bc.js" crossorigin="anonymous"></script>

</head>
<?php

// if(isset($_POST['submit']))
// {
//   echo "Hiii";
//   session_start();
//   include_once "../php/config.php";
//   $paidby=$_SESSION['unique_id'];
//   $gid=$_SESSION['group_id'];
//   $id= $_POST['bill_id_hidden'];
//   $query="UPDATE `bills` SET `status`='P',`paid_by`='$paidby', `group_id`='$gid' WHERE `bill_id`='$id'";
//   if($sql=mysqli_query($conn,$query)){
      
//   }else{
//       echo "Some error occurred";
//   }
// }
    
?>
<body>
  <div class="wrapper">
  <div class="buttons">
  <a id="button" class="messages" href="../users.php"><i class="fa-solid fa-message"></i></a>
    <a id="button" class="messages" href="#"><i class="fa-solid fa-receipt"></i></a>
    <a id="button" class="messages" href="../iou/iou.php"><i class="fa-solid fa-money">$</i></a>
    <a id="button" class="messages" href="../chores/chores.php"><i class="fa-solid fa-broom"></i></a>
  </div>
    <section class="users">

      <header>
        <div class="content">

          <?php 
           $gid=$_SESSION['group_id'];
            $sql = mysqli_query($conn, "SELECT count(*) FROM bills where status='NP' AND group_id= '$gid';");
            if(mysqli_num_rows($sql) > 0){
              $row = mysqli_fetch_assoc($sql);
            }
          ?>
          <div class="details">
            <span>BILLS</span>
            <p style="margin-top: 10px;">Number of unpaid bills: <?php echo $row['count(*)']; ?></p>
          </div>
        </div>

      </header>
      <div class="users-list bills">

        <!-- <div class="content bill">
            <div class="details">
                <h3 style="margin-top: 10px;">Electricity: #2101</h3>
                <p>₹2014</p>
                <p>Unpaid</p>
                <p>To be paid on : 15/05/2020</p>
            </div>
            <div class="check-bill">
                
            </div>
        </div> -->
        
        <!-- <div class="content bill">
            <div class="details">
                <h3 style="margin-top: 10px;">Electricity: #2101</h3>
                <p>₹2014</p>
                <p style="color: #2f684e;">Paid</p>
                <p>To be paid on : 15/05/2020</p>
            </div>
        </div> -->

      </div>
      <a href="bills.php" class="add">+</a>
    </section>
  </div>

  <script src="bill_list.js"></script>
  <script>

        $('.users-list').on("click", "a" , function() {
            <?php
              include_once "php/bill_paid.php";
              ?>
        });
</script> 

</body>
</html>
