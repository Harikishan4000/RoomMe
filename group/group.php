<?php 
  session_start();
  if(isset($_SESSION['unique_id'])){
    // header("location: users.php");
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
    <section class="form group">
    <a href="../users.php" class="back-icon" ><i class="fas fa-arrow-left"></i></a>
    <div class="main">
	<span>R</span>
  <span class="letter"> </span>
	<span>O</span>
	<span>M</span>
	<span>-</span>
	<span>M</span>
	<span>E</span>
</div>

      <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
        <div class="error-text"></div>
        <div class="name-details">
          <div class="field input">
            <label>Room ID</label>
            <input type="text" name="group_id" placeholder="Room ID">
          </div>
        <div class="field button join">
          <input type="submit" name="submit" value="Join room">
        </div>
      </form>
      <div class="field button create">
        <input type="submit" name="new_grp" value="Create Room">
      </div>
    </section>
  </div>
  <!-- <script src="javascript/pass-show-hide.js"></script> -->
  <script src="group.js"></script>

</body>
</html>