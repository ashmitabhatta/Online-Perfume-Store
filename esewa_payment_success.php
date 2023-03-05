<?php
include 'components/connect.php';
session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};?>
    <!DOCTYPE html>
<html lang="en">
<head>
  <title>Pay on Esewa</title>
  <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
  <style>
    * {
  transition: all 0.2s ease-in-out;
}
<?php include 'components/user_header.php';?>

body {
  background: #DCE35B; 
background: -webkit-linear-gradient(to right, #45B649, #DCE35B); 
background: linear-gradient(to right, #45B649, #DCE35B); 
  display: grid;
  place-items: center;
  height: 100vh;
  margin: 0;
  font-family: 'Open Sans', sans-serif;
}

.card {
  background: #FFB6C1;
  border-radius: 30px;
  height: 85vh;
  width: 80vw;
  box-shadow: 0 3px 6px rgba(0, 0, 0, 0.16), 0 3px 6px rgba(0, 0, 0, 0.23);
  text-align: center;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  padding: 1em;
}
    </style>
</head>
<body>
  <div class="card">
    <img src="images/thankyou.png" alt="thankyou" class="thankyou">
    <div class="text">
      <h1>Thank you</h1>
      <?php 
include 'setting.php';
echo "<h1> Payment Success. Thank you for choosing us.<h1>";
$oid=$_GET['oid'];
$amt=$_GET['amt'];
$ref=$_GET['refId'];
echo "Order ID: ".$oid."<br>";
echo "Amount:".$amt."<br>";
echo "Reference:".$ref."<br>";
?>
    </div>
    <div class="space"></div>
    <a href="home.php" class="option-btn">continue shopping</a>
  </div>
</body>
</html>