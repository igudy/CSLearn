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



            if(isset($_GET['t_id'])){
                $the_top_post_id = $_GET['t_id'];

                $view_query = "UPDATE top SET top_views_count = top_views_count + 1 WHERE top_id = {$the_top_post_id}";
                $send_view_query = mysqli_query($connection, $view_query);


                if(!$send_view_query){
                    die("QUERY FAILED " . mysqli_error($connection));
                }


            
                $query = "SELECT * FROM top WHERE top_id = $the_top_post_id ";
                $select_all_top = mysqli_query($connection, $query);

                while($row = mysqli_fetch_assoc($select_all_top)){
                    $top_id = $row['top_id'];
                    $top_title = $row['top_title'];
                    $top_content = $row['top_content'];
                    $top_image1 = $row['top_image1'];
                    $top_image2 = $row['top_image2'];
                    $top_image3 = $row['top_image3'];
                    $top_tags = $row['top_tags'];
                    $top_date = $row['top_date'];




            ?>

               
                 <!-- First Blog Post -->
                <div class="segment-title" style="margin-bottom: 60px;">
                <a href="top_post.php?t_id=<?php echo $top_id; ?>"><h2><?php echo $top_title; ?></h2></a>
                </div>
                

                <div style='margin: 60px;'></div>
                <a href="top_post.php?t_id=<?php echo $top_id; ?>"> <img class="img-responsive-image img-thumbnail" src="images/topImages/topImage1/<?php echo $top_image1; ?>" alt=""></a>


                <div style='margin: 60px;'></div>
                <a href="top_post.php?t_id=<?php echo $top_id; ?>"> <img class="img-responsive-image img-thumbnail" src="images/topImages/topImage2/<?php echo $top_image2; ?>" alt=""></a>


                <div style='margin: 60px;'></div>
                <a href="top_post.php?t_id=<?php echo $top_id; ?>"> <img class="img-responsive-image img-thumbnail" src="images/topImages/topImage3/<?php echo $top_image3; ?>" alt=""></a>

                <div style="margin: 10px 10px 0px 0px;"> 
                
                    <span class="content">
                        <?php echo $top_content; ?>
                    </span>



                    <div style="margin: 10px 10px 0px 0px;"></div>

                </div>
                
                <?php
                    echo "
                    <a href='images/topImages/topImage1/$top_image1' class='download' download='images/topImages/topImage1/$top_image1' alt='' ><span class='fa fa-download small'>Download 1</a></span>

                    <a href='images/topImages/topImage2/$top_image2' class='download' download='images/topImages/topImage2/$top_image2' alt='' ><span class='fa fa-download small'>Download 2</a></span>

                    <a href='images/topImages/topImage3/$top_image3' class='download' download='images/topImages/topImage3/$top_image3' alt='' ><span class='fa fa-download small'>Download 3</a></span>

                    ";

                ?>


            <?php }} ?>


<!-- Comment Not Yet Working, Check It Out -->


                <!-- Comments Form -->
<?php 

    if(isset($_POST['create_comment'])) {
        $the_top_post_id = escape($_GET['t_id']);
        $comment_author = escape($_POST['comment_author']);
        $comment_email = escape($_POST['comment_email']);
        $comment_content = escape($_POST['comment_content']);
        $comment_status = 'approved';
        $comment_date = date("Y-m-d");


        if (!empty($comment_author) && !empty($comment_email) && !empty($comment_content))
        {
            $stmt = mysqli_prepare($connection, "INSERT INTO comments (comment_top_id, comment_author, comment_email, comment_content, comment_status, comment_date) VALUES(?, ?, ?, ?, ?, ?)");
            mysqli_stmt_bind_param($stmt, 'ssssss', $the_top_post_id, $comment_author, $comment_email, $comment_content, $comment_status, $comment_date);
            mysqli_stmt_execute($stmt);


            if(!$stmt) {
                die('QUERY FAILED' . mysqli_error($connection));
            }


            // $query = "INSERT INTO comments (comment_post_id, comment_author, comment_email, comment_content, comment_status,comment_date)";

            // $query .= "VALUES ($the_post_id ,'{$comment_author}', '{$comment_email}', '{$comment_content }', 'approved', now())";

            // $create_comment_query = mysqli_query($connection, $query);

            // if (!$create_comment_query) {
            //     die('QUERY FAILED' . mysqli_error($connection));
            // }

        }
    }




?> 


                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form role="form" action="" method="post" id="" autocomplete="on"> 
                        <div class="form-group">
                            <input type="name" name="comment_author" id="" class="form-control" placeholder="Enter Your Name">
                        </div>

                         <div class="form-group">
                            <input type="email" name="comment_email" id="" class="form-control" placeholder="Enter Your E-mail">
                        </div>

                         <div class="form-group">
                            <label for="subject" class="sr-only">Subject</label>
                           

                        <textarea class="form-control" id="text" cols="30" name="comment_content" rows="5"></textarea><hr>
                </div>
                        <input type="submit" name="create_comment" id="btn-login" class="btn btn-success btn-lg btn-block" value="Submit">
                    </form>
                </div>



           <?php 
            $query = "SELECT * FROM comments WHERE comment_top_id = {$the_top_post_id} ";
            $query .= "AND comment_status = 'approved' ";
            $query .= "ORDER BY comment_id DESC ";
            $select_comment_query = mysqli_query($connection, $query);

            while ($row = mysqli_fetch_array($select_comment_query)) {
            $comment_date   = $row['comment_date']; 
            $comment_content= $row['comment_content'];
            $comment_author = $row['comment_author'];

                
                ?>
                
                
                           <!-- Comment -->
                <div class="media">
                    <div class="media-body comments">
                        <h6 class="media-heading"><?php echo $comment_author; ?>
                        
                        <bold><?php echo $comment_date; ?></bold></h4>
                        
                        <p><h4><?php echo $comment_content; ?> </h4></p>
                        
                    </div>
                </div>

           <?php  } ?>

           <hr>

                    </div>
                        <!-- End of col-md-7 -->




            <!--================Categories Area =================-->
            <?php include("includes/categories.php"); ?>
            <!--================Categories Area =================-->

                    </div>
                    <!-- Container -->

                    
            <div class="well" style="color: white !important; font-family: 'Times New Romans'; background-color: #f0ad4e; text-transform: uppercase;">
            <h2 style="color: black;"><a style='color: white; font-size: 19px;' href="https://wa.me/2348154673170?text=Welcome%20to%20Krazy%20World%20Ent.%20TV.%20Please%20do%20save%20this%20number.%20Your%20name%20is">Click on the Whatsapp Icon to Join one of the biggest Whatsapp TV - Krazy World Ent.<img src="images/categories/Whatsapp.png" style="width: 30px; height: 30px;" alt="Whatsapp Image"></a></h2>
            </div>

                <!-- Hotposts Area -->
                <?php include("hotposts.php"); ?>
                <!-- Hotposts Area -->




        </div>
        <!-- Row -->



            <!--================Footer Area =================-->
            <?php include("includes/footer.php"); ?>
            <!--================Footer Area =================-->