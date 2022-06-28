<?php 
    include_once "../resource/config.php";
 ?>
<?php 
    include_once template_front.DS."header.php";
 ?>

 
    <!-- Page Content -->
    <div class="container">

        <!-- Jumbotron Header -->
        <h1 class="text-center">Shop Page</h1>

        <hr>

        <!-- Title -->
        <div class="row">
            <div class="col-lg-12">
                <h3>Latest Features</h3>
            </div>
        </div>
        <!-- /.row -->

        <!-- Page Features -->
        <div class="row text-center">

            <?php shop_page(); ?>

        </div>
        </div>
        <!-- /.row -->

        <?php include_once template_front.DS."footer.php"; ?>