<!-- Footer -->
<footer>
<?php
if(isset($_POST['e_submit'])){

$to = "goodnessigunma1@gmail.com";
$subject = escape(wordwrap($_POST['e_subject'], 70));
$body = escape($_POST['e_body']);
$headers = "From: " . escape($_POST['e_email']) .  " Name: " . escape($_POST['e_name']) . "\r\n";



mail($to, $subject, $body, $headers);


}
?>

<div class="footer-top">
    <div class="container">
        <div class="row">
<!--             <div class="col-md-6 col-sm-6 col-xs-12 segment-two segment-one md-mb-30 sm-mb-30">
                <h2>Follow Us</h2>
                <ul>
                    <li class=""><a href="#">Instagram</a></li>
                    <li class=""><a href="#">Twitter</a></li>
                </ul>
            </div> -->
            <div class="col-md-6 col-sm-6 col-xs-12 segment-three segment-one md-mb-30 sm-mb-30">
                <h2>Follow Us</h2>
                <p style="color: white;">Please follow us on our social media profile in order to keep you updated.</p>

                 <a href="#"><i class="fa fa-instagram"></i></a>
                <a href="#"><i class="fa fa-twitter"></i></a>
            
            </div>

            <div class="col-md-6 col-sm-6 col-xs-12 segment-four segment-one md-mb-30 sm-mb-30">
                <form role="form" action="" method="post" id="login-form" autocomplete="off"> 
                <h2>Contact Us</h2>
                

            <div class="form-group">
                <label for="email" class="sr-only">Name</label>
                <input type="name" name="e_name" id="name" class="form-control" placeholder="Enter Your Name">
            </div>

             <div class="form-group">
                <label for="email" class="sr-only">Email</label>
                <input type="email" name="e_email" id="email" class="form-control" placeholder="Enter Your E-mail">
            </div>

             <div class="form-group">
                <label for="subject" class="sr-only">Subject</label>
                <input type="text" name="e_subject" id="subject" class="form-control" placeholder="Enter Your Subject">
            </div>

            <textarea class="form-control" name="e_body" id="text" cols="50" rows="10"></textarea>
            <div class="form-group">
                <button type="submit" name="e_submit" class="btn btn-block form-control" placeholder="Submit">Submit</button>
            </div>

                </form>
            </div>
        </div>
    </div>
</div>
<p class="footer-bottom-text" style="color: white; z-index: -1;"><i>Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved <br> Computer Science Deptartment, Uniben.
</i></p>

</footer>

<!-- jQuery -->
<script src="js/script.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery-ui.min.js"></script>

<script src="js/wow.js"></script>
<script>
    new WOW().init();
</script>


<!-- Bootstrap Core JavaScript -->

</body>

</html>