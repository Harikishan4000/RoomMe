<?php 
  session_start();
  if(!isset($_SESSION['unique_id'])){
    header("location: ../login.php");
  }
?>

<?php include_once "header.php"; ?>


<head>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
  <div class="wrapper">
    <section class="form bills">
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
          <i class="fas fa-eye"></i>
        </div>
        <div class="field button">
          <input type="submit" name="submit" value="Submit">
        </div>
      </form>
      <!-- <div class="link">Not yet signed up? <a href="index.php">Signup now</a></div> -->
    </section>
  </div>
  
  <!-- <script src="javascript/pass-show-hide.js"></script> -->
  <script src="bills.js"></script>

</body>
</html>
