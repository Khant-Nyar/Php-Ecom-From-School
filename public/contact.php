
<!-- Configuration-->

<?php include_once("../resource/config.php"); ?>


<?php 
    include_once template_front.DS."header.php";
 ?>

         <!-- Contact Section -->

        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Contact Us</h2>
                    <h3 class="section-subheading text-muted"><?php display_message(); ?></h3>
                </div>
            </div>
            <div class="row">
                <?php   send_message(); ?>
                <div class="col-lg-12">
                    <form action="" method="post" name="sentMessage" id="contactForm" >
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" name="username" class="form-control" placeholder="Your Name *" id="name" required data-validation-required-message="Please enter your name.">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input type="email" name="useremail" class="form-control" placeholder="Your Email *" id="email" required data-validation-required-message="Please enter your email address.">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="subject" placeholder="Your Subject *" id="subject" required data-validation-required-message="Please enter a Subject.">
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <textarea type="text" name="usermessage" class="form-control" placeholder="Your Message *" id="message" required data-validation-required-message="Please enter your Message."></textarea>
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-lg-12 text-center">
                                <div id="success"></div>
                                <button type="submit" name="send" class="btn btn-xl">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container -->
<?php 
    include_once template_front.DS."footer.php";
 ?>