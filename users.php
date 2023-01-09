<?php 
  session_start();
  include_once "php/config.php";
  if(!isset($_SESSION['unique_id'])){
    header("location: login.php");
  }
?>
<?php include_once "header.php"; ?>
<body>
  <!-- <div class="svggg">
        <svg id="logo" width="698" height="98" viewBox="0 0 698 98" fill="none" xmlns="http://www.w3.org/2000/svg">
            <mask id="path-1-outside-1_1_9" maskUnits="userSpaceOnUse" x="0" y="0" width="698" height="98" fill="black">
            <rect fill="white" width="698" height="98"/>
            <path d="M5 92.5V5H80V17.5H92.5V55H67.5V67.5H80V80H92.5V92.5H55V80H42.5V67.5H30V92.5H5ZM30 55H55V42.5H67.5V17.5H30V55Z"/>
            <path d="M117.5 92.5V80H105V42.5H117.5V30H180V42.5H192.5V80H180V92.5H117.5ZM130 80H167.5V42.5H130V80Z"/>
            <path d="M217.5 92.5V80H205V42.5H217.5V30H280V42.5H292.5V80H280V92.5H217.5ZM230 80H267.5V42.5H230V80Z"/>
            <path d="M305 92.5V30H380V42.5H392.5V92.5H367.5V42.5H355V92.5H330V42.5H317.5V92.5H305Z"/>
            <path d="M417.5 55V42.5H492.5V55H417.5Z"/>
            <path d="M505 92.5V5H530V17.5H542.5V30H555V17.5H567.5V5H592.5V92.5H567.5V42.5H555V67.5H542.5V42.5H530V92.5H505Z"/>
            <path d="M617.5 92.5V80H605V42.5H617.5V30H680V42.5H692.5V67.5H630V80H680V92.5H617.5ZM630 55H667.5V42.5H630V55Z"/>
            </mask>
            <path d="M5 92.5V5H80V17.5H92.5V55H67.5V67.5H80V80H92.5V92.5H55V80H42.5V67.5H30V92.5H5ZM30 55H55V42.5H67.5V17.5H30V55Z" stroke="white" stroke-width="10" mask="url(#path-1-outside-1_1_9)"/>
            <path d="M117.5 92.5V80H105V42.5H117.5V30H180V42.5H192.5V80H180V92.5H117.5ZM130 80H167.5V42.5H130V80Z" stroke="white" stroke-width="10" mask="url(#path-1-outside-1_1_9)"/>
            <path d="M217.5 92.5V80H205V42.5H217.5V30H280V42.5H292.5V80H280V92.5H217.5ZM230 80H267.5V42.5H230V80Z" stroke="white" stroke-width="10" mask="url(#path-1-outside-1_1_9)"/>
            <path d="M305 92.5V30H380V42.5H392.5V92.5H367.5V42.5H355V92.5H330V42.5H317.5V92.5H305Z" stroke="white" stroke-width="10" mask="url(#path-1-outside-1_1_9)"/>
            <path d="M417.5 55V42.5H492.5V55H417.5Z" stroke="white" stroke-width="10" mask="url(#path-1-outside-1_1_9)"/>
            <path d="M505 92.5V5H530V17.5H542.5V30H555V17.5H567.5V5H592.5V92.5H567.5V42.5H555V67.5H542.5V42.5H530V92.5H505Z" stroke="white" stroke-width="10" mask="url(#path-1-outside-1_1_9)"/>
            <path d="M617.5 92.5V80H605V42.5H617.5V30H680V42.5H692.5V67.5H630V80H680V92.5H617.5ZM630 55H667.5V42.5H630V55Z" stroke="white" stroke-width="10" mask="url(#path-1-outside-1_1_9)"/>
        </svg>
  </div> -->
  <div class="box">
    
  </div>
  <div class="wrapper">
  <div class="buttons">
    <a id="button" class="messages" href="users.php"><i class="fa-solid fa-message"></i></a>
    <a id="button" class="messages" href="Bills/bill_list.php"><i class="fa-solid fa-list"></i></a>
    <a id="button" class="messages" href="iou/iou.php"><i class="fa-solid fa-money-bill"></i></a>
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
