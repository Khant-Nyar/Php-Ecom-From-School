<?php require_once("../resource/config.php"); ?>


<?php 
    include_once template_front.DS."header.php";
   //echo $_SESSION['product_2'];
    
 ?>

 <?php 
    //$_SESSION['product_2']=1;
  ?>
  <?php 
    if(isset($_SESSION['item_total'])){
      echo $_SESSION['item_total'];
    }
  ?>

    <!-- Page Content -->
    <div class="container">
<?php

?>

<!-- /.row --> 

<div class="row">
      <h1>Checkout</h1>
      <h2 class="text-center text-danger"><?php display_message(); ?></h2>

<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
  <input type="hidden" name="cmd" value="_xclick">
  <input type="hidden" name="business" value="sb-s7kt53180678@business.example.com">
    <table class="table table-striped">
        <thead>
          <tr>
           <th>Product</th>
           <th>Price</th>
           <th>Quantity</th>
           <th>Sub Total</th>
           <!-- <th>Sub-total</th> -->
     
          </tr>
        </thead>
        <tbody>
            <?php cart() ?>
            
        </tbody>
    </table>
    <input type="image" name="submit"
    src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif"
    alt="PayPal - The safer, easier way to pay online">
</form>



<!--  ***********CART TOTALS*************-->
            
<div class="col-xs-4 pull-right ">
<h2>Cart Totals</h2>

<table class="table table-bordered" cellspacing="0">

<tr class="cart-subtotal">
<th>Items:</th>
<td>
  <?php 
    echo isset($_SESSION['item_quantity']) ? $_SESSION['item_quantity'] : $_SESSION['item_quantity']='0';
  ?>
</span></td>
</tr>
<tr class="shipping">
<th>Shipping and Handling</th>
<td>Free Shipping</td>
</tr>

<tr class="order-total">
<th>Order Total</th>
<td><strong><span class="amount">
<?php 
  echo isset($_SESSION['item_total']) ? $_SESSION['item_total'] : $_SESSION['item_total']='0';
?>
</span></strong> </td>
</tr>


</tbody>

</table>

</div><!-- CART TOTALS-->


 </div><!--Main Content-->


        <?php 
            include_once template_front.DS."footer.php";
         ?>
