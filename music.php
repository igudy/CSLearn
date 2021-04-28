<!--  POWERFUL NOTE IN INDEX........The htaccess file only work on index page...The video, savage and music page...needs you
to add .php to the files when reffering them because it goes to the directory if not, which is stupid -->


    <!--================Header Menu Area =================-->
    <?php include_once("includes/header.php"); ?>
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
                    $page_1 = ($page * 15) - 15;
                }
                $next = $page + 1;
                $previous = $page - 1;

            ?>

            <?php
            // if(isset($_GET['index_id'])){
            //     $the_index_id = $_GET['index_id'];

            //     $index_view_query = "UPDATE posts SET index_views_count = index_views_count + 1 WHERE index_id = {$the_index_id}";
            //     $send_index_view_query = mysqli_query($connection, $index_view_query);


            //     if(!$send_index_view_query){
            //         die("QUERY FAILED " . mysqli_error($connection));
            //     }

            ?>

            <?php
            $post_query_count = "SELECT * FROM posts WHERE post_status = 'published'";
                $find_count = mysqli_query($connection, $post_query_count);
                $count = mysqli_num_rows($find_count);

                if($count < 1){
                    echo "NO POSTS AVAILABLE";
                }
                else{
                $count = ceil($count / 5);

                $query = "SELECT * FROM posts ORDER BY post_id DESC LIMIT $page_1 , 15";
                $select_all_posts = mysqli_query($connection, $query);

                while($row = mysqli_fetch_assoc($select_all_posts)){
                    $post_id = $row['post_id'];
                    $post_category_id = $row['post_category_id'];
                    $post_title = $row['post_title'];
                    $post_user = $row['post_user'];
                    $post_date = $row['post_date'];
                    $post_type = $row['post_type'];
                    $post_image = $row['post_image'];
                    
                    $post_image_thread1 = $row['thread1'];

                    $post_music = $row['post_music'];
                    $post_video = $row['post_video'];
                    $post_music_thumbnail = $row['post_music_thumbnail'];
                    $post_video_thumbnail = $row['post_video_thumbnail'];
                    $post_movies_thumbnail = $row['post_movies_thumbnail'];
                    $post_content = substr($row['post_content'], 0,100);
                    $post_tags = $row['post_tags'];
                    $post_status = $row['post_status'];
                    $post_comment_count = $row['post_comment_count'];

            ?>


                 <!-- First Blog Post -->
                 <?php

                    if($post_type === 'music'){
                        echo "<div class='segment-title-music'>
                        <a href='post?p_id=$post_id'><h2><span class='fa fa-music'></span> $post_title  </h2></a>
                        </div>


                        
                        <div style='margin-top: -50px;'>
                            <a href='post?p_id=$post_id'><img class='video img-thumbnail' src='music/music_thumbnail/$post_music_thumbnail' alt='img';></a><span class='content'>$post_content</span>

                        <a class='read_more' href='post?p_id=$post_id'>...Read More<span class='glyphicon glyphicon-chevron-right'></span></a>
                        </div>
                        <br>
                        <hr>

                        ";

                    }

                 ?>

                <?php } }?>


                <!-- Whatsapp link -->

                    <div style="border-color: green; position: fixed; bottom: 100px; right: 1%; bottom: 1%; z-index: 1;"><a href="https://wa.me/2348154673170?text=Welcome%20to%20Krazy%20World%20Ent.%20TV.%20Please%20do%20save%20this%20number.%20Your%20name%20is"><img  src="images/categories/Whatsapp.png" style="width: 60px; height: 60px;" alt="Whatsapp Image"></a></div>


            <!--================Categories Area =================-->
            <?php include("includes/music_pagination.php"); ?>
            <!--================Categories Area =================-->

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
            <!--================Footer Area =================