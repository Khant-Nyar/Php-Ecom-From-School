<?php 
    include_once "../resource/config.php";
 ?>
<?php 
    include_once template_front.DS."header.php";
 ?>

    <!-- Page Content -->
    <div class="container">
        <h2 class="text-center text-warning"><?php display_message(); ?></h2>
    <?php login_user(); ?>
      <header>
            <h1 class="text-center">Login</h1>
        <div class="col-sm-4 col-sm-offset-5">         
            <form class="" action="" method="post" enctype="multipart/form-data">
                <div class="form-group"><label for="">
                    Email<input type="email" name="useremail" class="form-control"></label>
                </div>
                 <div class="form-group"><label for="password">
                    Password<input type="password" name="userpassword" class="form-control"></label>
                </div>

                <div class="form-group">
                  <input type="submit" name="login" class="btn btn-primary" >
                </div>
            </form>
        </div>  


    </header>


        </div>

    </div>
    <!-- /.container -->

    <?php include_once template_front.DS."footer.php"; ?>
