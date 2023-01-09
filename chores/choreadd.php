<?php 
    include_once "../php/config.php";
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
  <title>Room-me Chores</title>
  <link rel="stylesheet" href="../style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
</head>
<body>
  <div class="wrapper">
    <section class="form chores">
         <a href="chores.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>

        <div class="bills-img">
        <img src="../frontend/imgs/cleaning.gif" alt="">
        </div>
        
      
        <form action="php/chores_add.php" method="POST" autocomplete="off">
        <div class="error-text"></div>
        <div class="field input">
          <label>Chore Name</label>
          <input type="text" name="chore_name" placeholder="Chore name" required>
        </div>
        <div class="field input">
          <label>To be done by: </label>
          <select name="chore_by" class='chore-by'>
          <?php 
            $sql=mysqli_query($conn, "SELECT * from users");
            while($row=mysqli_fetch_assoc($sql)){
                echo "<option value=\"$row[unique_id]\">$row[fname]</option>";
            } 
            ?>
          </select>
        </div>
        <div class="field button">
          <input type="submit" name="submit" value="Submit">
        </div>
      </form>
      <!-- <div class="link">Not yet signed up? <a href="index.php">Signup now</a></div> -->
    </section>
  </div>
  
  <script src="choreadd.js"></script>

</body>
</html>