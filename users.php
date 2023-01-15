<?php 
  session_start();
  include_once "php/config.php";
  if(!isset($_SESSION['unique_id'])){
    header("location: login.php");
  }
?>
<?php include_once "header.php"; ?>
<body>
  <div class="box">
    
  </div>
  <div class="wrapper">
  <div class="buttons">
    <a id="button" class="messages" href="users.php"><i class="fa-solid fa-message"></i></a>
    <a id="button" class="messages" href="Bills/bill_list.php"><i class="fa-solid fa-receipt"></i></a>
    <a id="button" class="messages" href="iou/iou.php"><i class="fa-solid fa-money">$</i></a>
    <a id="button" class="messages" href="iou/iou.php"><i class="fa-solid fa-broom"></i></a>
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
          <img src="php/images/<?php echo $row['img']; ?>" alt="">
          <div class="details">
            <span><?php echo $row['fname']. " " . $row['lname'] ?></span>
            <p><?php echo $row['status']; ?></p>
            <p style="font-size: 12px; color: rgba(0,0,0,0.5)"><a style="padding: 3px; background: #333; color: #fff; margin-right: 5px; border-radius: 2px;" href="<?php if($row['group_id']){echo "group/change_grp.php";}else{echo "group/group.php";}?>">Room ID:</a><?php echo $row['group_id']; ?></p>
          </div>
        </div>
        <a href="php/logout.php?logout_id=<?php echo $row['unique_id']; ?>" class="logout">Logout</a>
      </header>
      <div class="search">
        <span class="text">Select an user to start chat</span>
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

  <script src="javascript/users.js"></script>

</body>
</html>
