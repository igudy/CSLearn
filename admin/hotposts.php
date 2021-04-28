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
                            Blank Page
                            <small>Subheading</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Blank Page
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
                                case 'add_hotposts':
                                include 'includes/add_hotposts.php';
                                break;


                                case 'edit_hotposts':
                                include 'includes/edit_hotposts.php';
                                break;

                                

                                default:
                                    include "includes/view_all_hotposts.php";
                                    break;
                            }
                        ?>
 
                    </div>
                </div>
                <!-- /.row -->


    <!--================Header Menu Area =================-->
    <?php include("includes/footer.php"); ?>
    <!--================Header Menu Area =================-->