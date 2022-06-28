<?php
    include_once "../../resource/config.php";
 ?>
<?php
    include_once template_back.DS."header.php";
 ?>
        <div id="page-wrapper">

            <div class="container-fluid">

             <div class="row">

<h1 class="page-header">
   All Products

</h1>
<table class="table table-hover">


    <thead>

      <tr>
           <th>No</th>
           <th>Title</th>
           <th>Category</th>
           <th>Price</th>
           <th>Update</th>
           <th>Delete</th>
      </tr>
    </thead>
    <tbody>
      <?php 
        $no=1;
        $query=query("SELECT * FROM products ORDER BY id DESC");
        confirm($query);
        while($data=fetch_array($query)){


       ?>
      <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $data['product_title']; ?><br>
              <img src="../images/<?php echo $data['product_image'] ?>" alt="" width="100px" height="100px">
            </td>
            <?php   
                $cat_query=query("SELECT * FROM category WHERE id={$data['product_category_id']}");
                confirm($cat_query);
                $row=fetch_array($cat_query);
               ?>
            <td>

                <a href="categories.php?update_id=<?php echo $data['id'] ?>"><?php   echo $row['cat_title']; ?></a> 
            </td>
            <td><?php   echo $data['product_price']; ?> </td>  
            <td><a href="edit_product.php?edit_id=<?php echo $data['id'] ?>" class="btn btn-primary">Update</a></td>
            <td><a href="products.php?delete_id=<?php echo $data['id'] ?>" class="btn btn-warning">Delete</a></td>
        </tr>
      <?php } ?>
      


  </tbody>
</table>











                
                 


             </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->







    </div>
    <!-- /#wrapper -->
<?php
    include_once template_back.DS."footer.php";
 ?>
<?php 
  if(isset($_GET['delete_id'])){
    $id=$_GET['delete_id'];
    $img_query=query("SELECT * FROM products WHERE id=$id");
    confirm($img_query);
    $img_data=fetch_array($img_query);
    $image=$img_data['product_image'];
    $path='../images/'.$image;
    if(file_exists($path)){
      unlink($path);
    }
    $del_query=query("DELETE FROM products WHERE id=$id");
    confirm($del_query);
    redirect('products.php');
  }
 ?>