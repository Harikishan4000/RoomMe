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
  <div class="wrapper">
    <section class="chat-area">
      <header>
        <?php 
          $user_id = mysqli_real_escape_string($conn, $_GET['user_id']);
          $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$user_id}");
          if(mysqli_num_rows($sql) > 0){
            $row = mysqli_fetch_assoc($sql);
          }else{
            header("location: users.php");
          }
        ?>
        <a href="iou.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>
        <img src="../php/images/<?php echo $row['img']; ?>" alt="">
        <div class="details">
          <span><?php echo $row['fname']. " " . $row['lname'] ?></span>
        </div>
      </header>
      <div class="chat-box iou-chat">

      
      </div>
      <form action="#" class="typing-area uoi">
        <input type="text" class="incoming_id" name="incoming_id" value="<?php echo $user_id; ?>" hidden>
        <input style="border-radius: 0; font-size: 10px; margin-right:3px;" type="text" name="uoi" class="input-field uoi" placeholder="Use minus(-) to remove what they owe." autocomplete="off">
        <input style="border-radius: 0;" type="text" name="msg" class="input-field msg" placeholder="reason..." autocomplete="off">
        <button><i class="fa fa-paper-plane"></i></button>
      </form>
    </section>
  </div>
  <script src="pays.js"></script>

</body>
</html>
