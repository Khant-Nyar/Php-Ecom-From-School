<?php
    include_once "../../resource/config.php";
 ?>
<?php
    include_once template_back.DS."header.php";
 ?>

        <div id="page-wrapper">

            <div class="container-fluid">

            

            

<h1 class="page-header">
  Product Categories

</h1>
<?php 
    if(isset($_POST['add_category'])){
        $category=$_POST['category'];
        query("INSERT INTO `category`(`cat_title`) VALUES ('$category')");
    }
 ?>

<div class="col-md-4">
    
    <form action="" method="post">
    
        <div class="form-group">
            <label for="category-title">Title</label>
            <input type="text" name="category" class="form-control">
        </div>

        <div class="form-group">
            
            <input type="submit" class="btn btn-primary" value="Add Category" name="add_category">
        </div>      


    </form>
    <?php 
        if(isset($_GET['update_id'])){
        $update_id=$_GET['update_id'];
        $query=query("SELECT * FROM category WHERE id=$update_id");
        $data=fetch_array($query);
        confirm($query);
        if(isset($_POST['update_category'])){
            $category=$_POST['category'];
            $query=query("UPDATE `category` SET `cat_title`='$category' WHERE id=$update_id");
            confirm($query);
            
        }?>
        <form action="" method="post">
    
        <div class="form-group">
            <label for="category-title">Update Title</label>
            <input type="text" name="category" class="form-control" value="<?php echo $data['cat_title'] ?>">
        </div>

        <div class="form-group">
            
            <input type="submit" class="btn btn-primary" value="Update Category" name="update_category">
        </div>      


    </form>
        <?php } ?>

     
   


</div>


<div class="col-md-8">

    <table class="table">
            <thead>

        <tr>
            <th>id</th>
            <th>Title</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
            </thead>


    <tbody>
        <?php 
        $no=1;
        $query=query("SELECT * FROM category ORDER BY id DESC");
        confirm($query);
        
        while($data=fetch_array($query)){
         
        
        ?>
        <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $data['cat_title']; ?></td>
            <td><a href="categories.php?update_id=<?php echo $data['id'] ?>" class="btn btn-success">Update</a></td>
            <td><a href="categories.php?delete_id=<?php echo $data['id'] ?>" class="btn btn-warning">Delete</a></td>
        </tr>
    <?php } ?>
    </tbody>

        </table>

</div>
<?php 
if(isset($_GET['delete_id'])){
    $delete_id=$_GET['delete_id'];
    $query=query("DELETE FROM `category` WHERE id=$delete_id");
    confirm($query);
}

 ?>



                













            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
<?php
    include_once template_back.DS."footer.php";
 ?>