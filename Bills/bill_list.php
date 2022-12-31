<?php 
  session_start();
  include_once "../php/config.php";
  if(!isset($_SESSION['unique_id'])){
    header("location: login.php");
  }
?>
<?php include_once "header.php"; ?>
<link rel="stylesheet" href="../style.css">

<body>
  <div class="wrapper">
    <section class="users">
      <header>
        <div class="content">

          <?php 
            $sql = mysqli_query($conn, "SELECT count(*) FROM bills where status='NP';");
            if(mysqli_num_rows($sql) > 0){
              $row = mysqli_fetch_assoc($sql);
            }
          ?>
          <div class="details">
            <span>BILLS</span>
            <p style="margin-top: 10px;">Number of unpaid bills: <?php echo $row['count(*)']; ?></p>
          </div>
        </div>
        <a href="../php/logout.php?logout_id=<?php echo $row['unique_id']; ?>" class="logout">Logout</a>
      </header>
      <div class="users-list">

        <!-- <div class="content bill">
            <div class="details">
                <h3 style="margin-top: 10px;">Electricity: #2101</h3>
                <p>₹2014</p>
                <p>Unpaid</p>
                <p>To be paid on : 15/05/2020</p>
            </div>
            <div class="check-bill">
                <p>✓</p>
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
      
    </section>
  </div>

  <script src="bill_list.js"></script>

</body>
</html>
