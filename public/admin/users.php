<?php
    include_once "../../resource/config.php";
 ?>
<?php
    include_once template_back.DS."header.php";
 ?>


        <div id="page-wrapper">

            <div class="container-fluid">



                    <div class="col-lg-12">
                      

                        <h1 class="page-header">
                            Users
                         
                        </h1>
                          <p class="bg-success">
                            <?php //echo $message; ?>
                        </p>

                        <a href="add_user.php" class="btn btn-primary">Add User</a>


                        <div class="col-md-12">

                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Photo</th>
                                        <th>Username</th>
                                        <th>First Name</th>
                                        <th>Last Name </th>
                                    </tr>
                                </thead>
                                <tbody>

                                <?php //foreach($users as $users): 
                                    user();
                                ?>

                                    


                                <?php //endforeach; ?>


                                    
                                    
                                </tbody>
                            </table> <!--End of Table-->
                        

                        </div>

                        <?php 
                            if(isset($_GET['delete_id'])){
                                $id=$_GET['delete_id'];
                                $query=query("DELETE FROM `user` WHERE id=$id");
                                confirm($query);
                            }
                         ?>
                         <?php 
                            if(isset($_GET['edit_id'])){
                                $id=$_GET['edit_id'];
                                $val_query=query("SELECT * FROM user WHERE id=$id");
                                $data=fetch_array($val_query);
                                if(isset($_POST['update_user'])){
                                    $user_name=$_POST['user_name'];
                                    $user_email=$_POST['user_email'];
                                    $user_password=$_POST['user_password'];
                                    $user_image=$_FILES['user_image']['name'];
                                     if(empty($user_image)){
                                      $img_query=query("SELECT * FROM user WHERE id=$id");
                                      confirm($img_query);
                                      $img_data=fetch_array($img_query);
                                      $user_image=$img_data['image'];
                                    }else{
                                      $img_query=query("SELECT * FROM user WHERE id=$id");
                                      confirm($img_query);
                                      $img_data=fetch_array($img_query);
                                      $old_image=$img_data['image'];
                                      $path='../images/'.$old_image;
                                      if(file_exists($path)){
                                        unlink($path);
                                      }
                                    }
                                    $tmp_image=$_FILES['user_image']['tmp_name'];
                                    move_uploaded_file($tmp_image,'../images/'.$user_image);
                                    $update_query=query("UPDATE `user` SET `name`='$user_name',
                                        `image`='$user_image',`email`=
                                        '$user_email',`password`='$user_password' WHERE id=$id");
                                    confirm($update_query);
                                    redirect('users.php');
                                }
                         ?>
                         <form action="" method="post" enctype="multipart/form-data" class="text-center" id="my-form">
                             <div class="form-group col-md-3">
                                 <label for="user_name">User Name</label>
                                 <input type="text" class="form-control" id="user_name" name="user_name" value=
                                 "<?php echo $data['name'] ?>">
                             </div>
                             <div class="form-group col-md-3">
                                 <label for="user_email">Email Address</label>
                                 <input type="email" class="form-control" id="user_email" name="user_email"
                                 value=
                                 "<?php echo $data['email'] ?>">
                             </div>
                             <div class="form-group col-md-3">
                                 <label for="user_password">User Password</label>
                                 <input type="password" class="form-control" id="user_password" name="user_password" value=
                                 "<?php echo $data['password'] ?>">
                             </div>
                             <div class="form-group col-md-2" >
                                 <input type="file" name="user_image" class="form-control" id="image">
                            </div>
                             <div class="form-group col-md-1" >
                                 <input type="submit" name="update_user"  value="Update User" class="btn btn-primary" id="update_button">
                            </div>
                            
                        </form>
                        <style>
                            #update_button{
                                position: relative;
                                top: 25px;
                                //left: -95px;
                            }
                            #image{
                                position: relative;
                                top: 25px;
                            }
                        </style>
                        
                     <?php } ?>






                        
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


