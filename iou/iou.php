<?php 
  session_start();
  include_once "../php/config.php";
  if(!isset($_SESSION['unique_id'])){
    header("location: login.php");
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Room-me</title>
  <link rel="stylesheet" href="../style.css">
  <script src="https://kit.fontawesome.com/5f546344bc.js" crossorigin="anonymous"></script>

</head>
<body>
  <div class="box">
    
  </div>
  <div class="wrapper">
  <div class="buttons">
  <a id="button" class="messages" href="../users.php"><i class="fa-solid fa-message"></i></a>
    <a id="button" class="messages" href="../Bills/bill_list.php"><i class="fa-solid fa-receipt"></i></a>
    <a id="button" class="messages" href="#"><i class="fa-solid fa-money">$</i></a>
    <a id="button" class="messages" href="../chores/chores.php"><i class="fa-solid fa-broom"></i></a>
  </div>
    <section class="users">
      <header>
        <div class="content">
          <?php 
            $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
            if(mysqli_num_rows($sql) > 0){
              $row = mysqli_fetch_assoc($sql);
            }
          ?>
          <img src="../php/images/<?php echo $row['img']; ?>" alt="">
          <div class="details">
            <span><?php echo $row['fname']. " " . $row['lname'] ?></span>
            <p><?php echo $row['status']; ?></p>
          </div>
        </div>
        <a href="../php/logout.php?logout_id=<?php echo $row['unique_id']; ?>" class="logout">Logout</a>
      </header>
      <div class="search">
      <span class="text">Select user to talk finance</span>
        <input type="text" placeholder="Enter name to search...">
        <button><i class="fas fa-search"></i></button>
      </div>
      <div class="users-list">
      <!-- <a href="chat.php?grp_id=1234">
                            <div class="content">
                            <img src="php/images/group-dp.webp" alt="">
                            <div class="details">
                                <span>ALL ROOMIES</span>
                                <p>Group chat </p>
                            </div>
                            </div>
                        </a>            -->
      </div>
    </section>
  </div>

  <script src="iou.js"></script>
  
</body>
</html>
