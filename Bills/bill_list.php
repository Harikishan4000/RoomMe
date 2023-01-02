<?php 
  session_start();
  include_once "../php/config.php";
  if(!isset($_SESSION['unique_id'])){
    header("location: login.php");
  }
?>

<?php
  function removee(){
    include_once "../php/config.php";
    $paidby=$_SESSION['unique_id'];
    $id= $_POST['bill_id_hidden'];
  
    $query="UPDATE TABLE bills SET status='P' AND paid_by='{$paidby}' WHERE bill_id='{$id}';";
    $sql=mysqli_query($conn,$query);
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Room-me Bill</title>
  <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="../style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
</head>
<body>
  <div class="wrapper">
    <section class="users">
    <a href="#" class="back-icon"><i class="fas fa-arrow-left"></i></a>
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
                <a href="" onclick="remove()">✓</a>
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
      <a href="bills.php" class="add">+</a>
    </section>
  </div>

  <script src="bill_list.js"></script>
  <!-- <script>
    
    $("body").on('click', '.check-bill', function(){   //DONE BUTTON IN BILLS
    let xhr = new XMLHttpRequesonclick="remove()"();
    xhr.open("POST", "php/bill_paid.php", true);
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
              let data = xhr.response;
              if(data === "success"){
                console.log(data);
              }else{
                errorText.style.display = "block";
                errorText.textContent = data;
              }
          }
      }
    }
});</script> -->

</body>
</html>
