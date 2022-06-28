<?php
    include_once "../../resource/config.php";
 ?>
<?php
    include_once template_back.DS."header.php";
 ?>



        <div id="page-wrapper">

            <div class="container-fluid">






<div class="col-md-12">

<div class="row">
<h1 class="page-header">
   Add Product

</h1>
</div>
  <?php 
    if(isset($_POST['insert'])){
      $title=$_POST['product_title'];
      $description=$_POST['product_description'];
      $short_des=$_POST['product_short_description'];
      $price=$_POST['product_price'];
      $product_category_id=$_POST['product_category'];
      $quantity=$_POST['product_quantity'];
      $image=$_FILES['product_image']['name'];
      $tmp_image=$_FILES['product_image']['tmp_name'];
      move_uploaded_file($tmp_image, '../images/'.$image);
      $date=$_POST['product_date'];
      $pquery=query("INSERT INTO `products`( `product_title`, `product_category_id`, `product_price`, `product_quantity`, `product_image`, `product_short_description`, `product_description`, `upload_date`) VALUES ('$title','$product_category_id','$price','$quantity','$image','$short_des','$description',
        '$date')");
      confirm($pquery);
    }
   ?>


<form action="" method="post" enctype="multipart/form-data">


<div class="col-md-8">

<div class="form-group">
    <label for="product-title">Product Title </label>
        <input type="text" name="product_title" class="form-control">
       
    </div>


    <div class="form-group">
           <label for="product-title">Product Description</label>
      <textarea name="product_description" id="editor1" cols="30" rows="10" class="form-control"></textarea>
    </div>
    <div class="form-group">
           <label for="product-title">Product Short Description</label>
      <textarea name="product_short_description" id="editor2" cols="30" rows="4" class="form-control"></textarea>
    </div>


    <div class="form-group row">

      <div class="col-xs-3">
        <label for="product-price">Product Price</label>
        <input type="number" name="product_price" class="form-control" size="60">
      </div>
    </div>




    
    

</div><!--Main Content-->


<!-- SIDEBAR-->


<aside id="admin_sidebar" class="col-md-4">

     
    


     <!-- Product Categories-->

    <div class="form-group">
         <label for="product-title">Product Category</label>
          <hr>
        <select name="product_category" id="" class="form-control">
          <?php 
          $query=query("SELECT * FROM category");
          confirm($query);
          while($data=fetch_array($query)){
           ?>
            <option value="<?php echo $data['id'] ?>"><?php echo $data['cat_title'] ?></option>
           <?php } ?>
        </select>


</div>





    <!-- Product Brands-->


    <div class="form-group">
      <label for="product-title">Product Quantity</label>
         <input type="number" name="product_quantity">
    </div>


<!-- Product Tags -->


    <div class="form-group">
          <label for="product-title">Product Date</label>
          <hr>
        <input type="date" name="product_date" class="form-control">
    </div>

    <!-- Product Image -->
    <div class="form-group">
        <label for="product-title">Product Image</label>
        <input type="file" name="product_image">
      
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-lg btn-primary" name="insert" value="Insert">
    </div>


</aside><!--SIDEBAR-->


    
</form>



                



            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
<?php
    include_once template_back.DS."footer.php";
 ?>
