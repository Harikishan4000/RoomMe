<?php 
  session_start();
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
  <link rel="stylesheet" href="../style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
  <!-- <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script> -->
</head>
<body>
  <div class="wrapper">
    <section class="form bills">
         <a href="bill_list.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>

        <div class="bills-img">
        <img src="../frontend/imgs/bill.png" alt="">
        </div>
        
      
        <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
        <div class="error-text"></div>
        <div class="field input">
          <label>Bill Name</label>
          <input type="text" name="bill_name" placeholder="Bill name" required>
        </div>
        <div class="field input">
          <label>Bill ID</label>
          <input type="text" name="bill_id" placeholder="Bill ID" required>
        </div>
        <div class="field input">
          <label>Bill Cost</label>
          <input type="text" name="cost" placeholder="Bill cost" required>
        </div>
        <div class="field input">
          <label>Due on</label>
          <input type="date" name="dueon" placeholder="Due on" required>
        </div>
        <div class="field button">
          <input type="submit" name="submit" value="Submit">
        </div>
      </form>
      <!-- <div class="link">Not yet signed up? <a href="index.php">Signup now</a></div> -->
    </section>
  </div>
  
  <script src="bills.js"></script>

</body>
</html>
