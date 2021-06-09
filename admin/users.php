    <!--================Header Menu Area =================-->
    <?php include("includes/header.php"); ?>
    <!--================Header Menu Area =================-->


    <!--================Header Menu Area =================-->
    <?php include("includes/navigation.php"); ?>
    <!--================Header Menu Area =================-->
    
        
        
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Registration Page
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Admin
                            </li>
                        </ol>
                        
                        <?php
                            if(isset($_GET['source'])){
                                $source = $_GET['source'];
                            }
                            else{
                                $source = '';
                            }

                            switch ($source) {
                                case 'add_user':
                                include 'includes/add_user.php';
                                break;


                                case 'edit_user':
                                include 'includes/edit_user.php';
                                break;

                                

                                default:
                                    include "includes/view_all_users.php";
                                    break;
                            }
                        ?>
 
                    </div>
                </div>
                <!-- /.row -->


    <!--================Header Menu Area =================-->
    <?php include("includes/footer.php"); ?>
    <!--================Header Menu Area =================-->