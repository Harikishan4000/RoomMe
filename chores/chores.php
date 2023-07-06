<?php 
  session_start();
  include_once "../php/config.php";
  if(!isset($_SESSION['unique_id'])){
    // header("location: login.php");
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Room-me chores</title>
  <link rel="stylesheet" href="../style.css">
  <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>

  <script src="https://kit.fontawesome.com/5f546344bc.js" crossorigin="anonymous"></script>
</head>
<?php

// if(isset($_POST['submit']))
// {
//   session_start();
//   include_once "../php/config.php";
//   $gid=$_SESSION['group_id'];
//   $id=$_POST['chore_id'];
//   $query="UPDATE `chores` SET `status`='D' WHERE `chore_id`=$id AND `group_id`='$gid'";
//   if($sql=mysqli_query($conn, $query)){

//   }else{
//     echo "Some error occurred";
//   }
// }  

?>
<body>
<div class="ld"></div>

<div class="wrapper">
  <div class="buttons">
  <a id="button" class="messages" href="../users.php"><i class="fa-solid fa-message"></i></a>
    <a id="button" class="messages" href="../Bills/bill_list.php"><i class="fa-solid fa-receipt"></i></a>
    <a id="button" class="messages" href="../iou/iou.php"><i class="fa-solid fa-money">$</i></a>
    <a id="button" class="messages" href="#"><i class="fa-solid fa-broom"></i></a>

    </div>
    <section class="users">

      <header>
        <div class="content">
        <?php 
           $gid=$_SESSION['group_id'];
            $sql = mysqli_query($conn, "SELECT count(*) FROM chores where status='N' AND group_id= '$gid';");
            if(mysqli_num_rows($sql) > 0){
              $row = mysqli_fetch_assoc($sql);
            }
          ?>
          <div class="details">
            <span>CHORES</span>
            <p style="margin-top: 10px;">Number of undone chores: <?php echo $row['count(*)']; ?></p>
          </div>
        </div>
        
      </header>
      <div class="users-list">
            

      </div>
      <a href="choreadd.php" class="add">+</a>
    </section>
  </div>

  <script src="chores.js"></script>
  <script>

        $('.users-list').on("click", "a" , function() {
            <?php
              include_once "php/chore_remove.php";
              ?>
        });
</script> 

<script src="../lightDark.js"></script>
</body>
</html>
