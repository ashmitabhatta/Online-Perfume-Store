<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>checkout</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
<?php

include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
   header('location:user_login.php');
};
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>checkout</title>
   
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php include 'components/user_header.php'; ?>
<?php
@include 'setting.php';?>

<section class="checkout-orders">

   <form action="" method="POST">

   <h3>your orders</h3>

      <div class="display-orders">
      <?php
         $grand_total = 0;
         $cart_items[] = '';
         $select_cart = $conn->prepare("SELECT * FROM `cart` WHERE user_id = ?");
         $select_cart->execute([$user_id]);
         if($select_cart->rowCount() > 0){
            while($fetch_cart = $select_cart->fetch(PDO::FETCH_ASSOC)){
               $cart_items[] = $fetch_cart['name'].' ('.$fetch_cart['price'].' x '. $fetch_cart['quantity'].') - ';
               $total_products = implode($cart_items);
               $grand_total += ($fetch_cart['price'] * $fetch_cart['quantity']);
      ?>
         <p> <?= $fetch_cart['name']; ?> <span>(<?= 'Rs.'.$fetch_cart['price'].' x '. $fetch_cart['quantity']; ?>)</span> </p>
      <?php
            }
         }else{
            echo '<p class="empty">your cart is empty!</p>';
         }
      ?>
         <input type="hidden" name="total_products" value="<?= $total_products; ?>">
         <input type="hidden" name="total_price" value="<?= $grand_total; ?>" value="">
         <span class="grand-total"> grand total : Rs.<?= $grand_total; ?> </span>
      </div>
   </form>
   <div class="col-md-6">
						<h1 style="font-size: 50px;"><centre>Pay With<centre></h1>
						<ul class="list-group">
							<li class="list-group-item">
								<form action="<?php echo $epay_url?>" method="POST">
									<input value="<?php echo $grand_total;?>" name="tAmt" type="hidden">
									<input value="<?php echo $grand_total;?>" name="amt" type="hidden">
									<input value="0" name="txAmt" type="hidden">
									<input value="0" name="psc" type="hidden">
									<input value="0" name="pdc" type="hidden">
									<input value=<?php echo $merchant_code?> name="scd" type="hidden">
									<input value="<?php echo $pid?>" name="pid" type="hidden">
									<input value="<?php echo $successurl?>" type="hidden" name="su">
									<input value="<?php echo $failedurl?>" type="hidden" name="fu">
									<input type="image" src="project images/esewa.jpg">
                                </form>
								</ul>
							</div>
							
						</div>
					</div>

</section>
<?php include 'components/footer.php'; ?>

<script src="js/script.js"></script>

</body>
</html>
