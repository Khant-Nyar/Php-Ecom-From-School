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
    if(isset($_GET['edit_id'])){
      $id=$_GET['edit_id'];
      $query=query("SELECT * FROM products WHERE id=$id");
      confirm($query);
      $data=fetch_array($query);
      if(isset($_POST['update'])){
        echo $title=$_POST['product_title'];
        echo $product_category_id=$_POST['product_category'];
        echo $price=$_POST['product_price'];
        echo $quantity=$_POST['product_quantity'];
        echo $short_des=$_POST['product_short_description'];
        echo $des=$_POST['product_description'];


        $image=$_FILES['product_image']['name'];
        
        if(empty($image)){
          $img_query=query("SELECT * FROM products WHERE id=$id");
          confirm($img_query);
          $img_data=fetch_array($img_query);
          $image=$img_data['product_image'];
        }else{
          $img_query=query("SELECT * FROM products WHERE id=$id");
          confirm($img_query);
          $img_data=fetch_array($img_query);
          $old_image=$img_data['product_image'];
          $path='../images/'.$old_image;
          if(file_exists($path)){
            unlink($path);
          }
        }
        $tmp_image=$_FILES['product_image']['tmp_name'];
        move_uploaded_file($tmp_image,'../images/'.$image);
        echo $date=date('Y-m-d');
        $update_query=query("UPDATE `products` SET `product_title`='$title',`product_category_id`=
          '$product_category_id',`product_price`='$price',`product_quantity`=
          '$quantity',`product_image`='$image',`product_short_description`='$short_des',`product_description`=
          '$des',`upload_date`=
          '$date' WHERE id=$id");
        confirm($update_query);
        redirect('products.php');
      }
    
 ?> 
<?php } ?>

<form action="" method="post" enctype="multipart/form-data">


<div class="col-md-8">

<div class="form-group">
    <label for="product-title">Product Title </label>
        <input type="text" name="product_title" class="form-control" value="<?php echo $data['product_title'] ?>">
       
    </div>


    <div class="form-group">
           <label for="product-title">Product Description</label>
      <textarea name="product_description" id="editor1" cols="30" rows="10" class="form-control">
        <?php echo $data['product_description'] ?>
      </textarea>
    </div>
    <div class="form-group">
           <label for="product-title">Product Short Description</label>
      <textarea name="product_short_description" id="editor2" cols="30" rows="4" class="form-control">
        <?php echo $data['product_short_description'] ?>
      </textarea>
    </div>


    <div class="form-group row">

      <div class="col-xs-3">
        <label for="product-price">Product Price</label>
        <input type="text" name="product_price" class="form-control" size="60" value="<?php 
        echo $data['product_price'] ?>">
      </div>
    </div>




    
    

</div><!--Main Content-->


<!-- SIDEBAR-->


<aside id="admin_sidebar" class="col-md-4">

     
    


     <!-- Product Categories-->

    <div class="form-group">
         <label for="product-title">Product Category</label>
          <hr>
          <?php 
            $show_query=query("SELECT * FROM category WHERE id={$data['product_category_id']}");
            confirm($show_query);
            $row=fetch_array($show_query);
          
           ?>
          <input type="text" readonly="" value="<?php echo $row['cat_title'] ?>" class="form-control"><br>
        <select name="product_category" id="" class="form-control" >
          <?php 
          $cat_query=query("SELECT * FROM category");
          confirm($cat_query);
          while($cat_data=fetch_array($cat_query)){
           ?>
            <option value="<?php echo $cat_data['id'] ?>"><?php echo $cat_data['cat_title'] ?></option>
           <?php } ?>
        </select>


</div>





    <!-- Product Brands-->


    <div class="form-group">
      <label for="product-title">Product Quantity</label>
         <input type="number" name="product_quantity" value="<?php echo $data['product_quantity'] ?>">
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
        <img src="../images/<?php echo $data['product_image'] ?>" alt="" width="350px" height="150px" class="img-responsive"><br>
        <input type="file" name="product_image">
      
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-lg btn-primary" name="update" value="Update">
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
