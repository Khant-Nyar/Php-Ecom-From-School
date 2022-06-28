
<?php
    include_once "../../resource/config.php";
 ?>
<?php
    include_once template_back.DS."header.php";
 ?>

 

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Dashboard <small>Statistics Overview</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Dashboard
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                 <!-- FIRST ROW WITH PANELS -->
                 <?php 
                    //echo $_SERVER['REQUEST_URI'];
                    //echo "<br>";
                   // echo __DIR__;
                    if($_SERVER['REQUEST_URI']=="/phpecommerce/public/admin/" || $_SERVER['REQUEST_URI']=="/phpecommerce/public/admin/index.php" ){
                        include_once template_back.DS."admin_dashboard.php";
                    }
                  ?>
                
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    
<?php
    include_once template_back.DS."footer.php";
 ?>
