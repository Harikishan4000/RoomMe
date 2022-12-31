<?php 
  session_start();
  include_once "../php/config.php";
  if(!isset($_SESSION['unique_id'])){
    // header("location: login.php");
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
            <p>ID: <?php echo $row['count(*)']; ?></p>
          </div>
        </div>
        <a href="../php/logout.php?logout_id=<?php echo $row['unique_id']; ?>" class="logout">Logout</a>
      </header>
      </div>
      <div class="users-list">
      
      </div>
    </section>
  </div>

  <script src="javascript/users.js"></script>

</body>
</html>
