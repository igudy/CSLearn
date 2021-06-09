    <!--================Header Menu Area =================-->
    <?php include("includes/header.php"); ?>
    <!--================Header Menu Area =================-->

    

    <!--================Navigation Area=================-->
    <?php include("includes/navigation.php"); ?>
    <!--================Navigation Area=================-->


    <!-- Page Content -->
    <div class="container">

        <div class="row">

    <!--================Navigation Area=================-->
    <?php include("includes/searchbar.php"); ?>
    <!--================Navigation Area=================-->


    <!-- Searchbar ended its div well -->
            <!-- Blog Entries Column -->
            <div class="col-md-7">
            
            <hr>
            <?php 
             if(isset($_GET['page'])){
                    $page = $_GET['page'];

                }else{
                    $page = 1;
                }

                if($page == "" || $page == 1){
                    $page_1 = 0;
                }else{
                    $page_1 = ($page * 12) - 12;
                }
                $next = $page + 1;
                $previous = $page - 1;

            ?>
                <!-- Add space before read more -->
                <div style="margin: 10px;"></div>

                <div style="margin: 0px 30px 0px 0px;">
                 <?php
                if(isset($_POST['login'])){

                    login_user(escape($_POST['username']), escape($_POST['user_password']));

                }
            ?>


        
                 <!-- First Blog Post -->
                 <h1>Login</h1>
                    <form role="form" action="" method="post" id="login-form" autocomplete="off">
                        <div class="form-group">
                            <label for="username" class="sr-only">Username</label>
                            <input autocomplete="on" type="text" name="username" id="username" class="form-control" placeholder="Enter Username">
                        </div>
                         <div class="form-group">
                            <label for="password" class="sr-only">Password</label>
                            <input type="password" name="user_password" id="key" class="form-control" placeholder="Password">
                        </div>
                
                        <input au type="submit" name="login" id="btn-login" class="btn btn-success btn-lg btn-block" value="Login">
                    </form>


                <hr>
                <!-- Add space before the next post -->
                <div style="margin: 40px;"></div>


            </div>


            </div>
            <!-- End of col-md-7 -->

            <!--================Categories Area =================-->
            <?php include("includes/categories.php"); ?>
            <!--================Categories Area =================-->

                </div>
                <!-- Container -->


            </div>
            <!-- Row -->

            <!--================Footer Area =================-->
            <?php include("includes/footer.php"); ?>
            <!--================Footer Area =================-->