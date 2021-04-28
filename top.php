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
                    $page_1 = ($page * 8) - 8;
                }
                $next = $page + 1;
                $previous = $page - 1;

            ?>

            <?php
                $top_query_count = "SELECT * FROM top";
                $find_count = mysqli_query($connection, $top_query_count);

                $count = mysqli_num_rows($find_count);
                if($count < 1){
                    echo "NO POSTS AVAILABLE";
                }
                else{
                $count = ceil($count / 5);

                $query = "SELECT * FROM top ORDER BY top_id DESC LIMIT $page_1 , 8";
                $select_all_tops = mysqli_query($connection, $query);

                while($row = mysqli_fetch_assoc($select_all_tops)){

                    $top_id = $row['top_id'];
                    $top_title = $row['top_title'];
                    $top_content = substr($row['top_content'], 0,50);
                    $top_image1 = $row['top_image1'];
                    $top_image2 = $row['top_image2'];
                    $top_image3 = $row['top_image3'];
                    $top_tags = $row['top_tags'];
                    $top_date = $row['top_date'];

                ?>

                 <!-- First Blog Post -->
                <div class="segment-title">
                <a  href="top_post.php?t_id=<?php echo $top_id; ?>"><img src="images/categories/a.png ?>" alt="" style="width: 100px; height: 100px;"><h2 style="display: inline-block;"><?php echo $top_title; ?></h2></a>
                </div>



                <?php } }?>



            <!--================Categories Area =================-->
            <?php include("includes/top_pagination.php"); ?>
            <!--================Categories Area =================-->


            

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