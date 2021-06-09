<!-- Start of Navigation -->
<?php
$faqs_class='';
$levels_class='';
$about_class = '';
$index_class = '';
$login_class = '';
$admin_class = '';


$pageName = basename($_SERVER['PHP_SELF']);

$faqs = 'faqs.php';
$levels = 'levels.php';
$about = 'about.php';
$index = 'index.php';
$login = 'login.php';
$admin = 'admin.php';

if($pageName == $faqs){
    $faqs_class = 'active';
}
else if($pageName == $levels){
    $levels_class = 'active';
}
else if($pageName == $about){
    $about_class = 'active';
}
else if ($pageName == $index){
    $index_class = 'active';
}
else if ($pageName == $login){
    $login_class = 'active';
}
else if ($pageName == $admin){
    $admin_class = 'active';
}


?>


  <!--banner-->
  <section id="banner" class="banner">
    <div class="bg-color">
      <nav class="navbar navbar-default">
        <div class="container">
          <div class="col-md-12">
            <div class="navbar-header">

              
              <a class="navbar-brand" href="../cslearn/index" style="float: left; font-size: 15px;">
                 <div class="krazy">
                 <span><img src='images/categories/favicon.png' alt='img';></span>
                  <b>CS Learn</b></a>
                  
              </div>

              <button type="button" class="navbar-toggle"  data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
            </div>
            <div class="collapse navbar-collapse navbar-right" id="myNavbar">
              <ul class="nav navbar-nav">
                <li class="<?php echo $index_class; ?>"><a href="index">Home</a></li>
                <li class="<?php echo $levels_class; ?>"><a href="levels">Levels</a></li>
                <li class="<?php echo $faqs_class; ?>"><a href="faqs">FAQs</a></li>
                <li class="<?php echo $about_class; ?>"><a href="about">About & Contact Us</a></li>
                <li class="<?php echo $login_class; ?>"><a href="login">Login</a></li>
                <li class="<?php echo $admin_class; ?>"><a href="admin">Admin</a></li>
              </ul>
            </div>
          </div>
        </div>
      </nav>
      <div class="container">
        <div class="row">
          <div class="banner-info">
            <div class="banner-logo text-center">
<!--               <img src="img/logo.png" class="img-responsive">
 -->            </div>
            <div class="banner-text text-center">
              
              <h2>E-Learning For Computer Science Students</h2>
              <p style="color: white;"> Videos | Audio | FAQ's | News | PDF's</p>
            </div>
            <!-- <div class="overlay-detail text-center">
              <a href="#service"><i class="fa fa-angle-down"></i></a>
            </div> -->
          </div>
        </div>
      </div>
    </div>
  </section>
  <br>