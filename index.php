<!--  POWERFUL NOTE IN INDEX........The htaccess file only work on index page...The video, savage and audio page...needs you
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


    <!--================Navigation Area=================-->
    <?php include("includes/levels.php"); ?>
    <!--================Navigation Area=================-->



            <!-- Blog Entries Column -->
            <div class="col-md-7">

            
            <hr>
            <div class="segment-top">
                
                <h2 style="color: gray !important; padding-top: 30px; text-align: center; ">POSTS</h2>
                <p></p>
            </div>

            <?php 
             if(isset($_GET['page'])){
                    $page = $_GET['page'];

                }else{
                    $page = 1;
                }

                if($page == "" || $page == 1){
                    $page_1 = 0;
                }
                else{
                    $page_1 = ($page * 15) - 15;
                }
                $next = $page + 1;
                $previous = $page - 1;

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

                    $post_audio = $row['post_audio'];
                    $post_video = $row['post_video'];
                    $post_audio_thumbnail = $row['post_audio_thumbnail'];
                    $post_video_thumbnail = $row['post_video_thumbnail'];
                    $post_pdf_thumbnail = $row['post_pdf_thumbnail'];
                    $post_content = substr($row['post_content'], 0,100);
                    $post_tags = $row['post_tags'];
                    $post_status = $row['post_status'];
                    $post_comment_count = $row['post_comment_count'];

            ?>


                 <!-- First Blog Post -->
                 <?php

                    if($post_type === 'audio')
                    {
                        echo "<div class='segment-title-audio'>
                        <a href='post?p_id=$post_id'><h2><span class='fa fa-audio'></span> $post_title  </h2></a>
                        </div>


                        
                        <div style='margin-top: -50px;'>
                            <a href='post?p_id=$post_id'><img class='video img-thumbnail' src='audio/audio_thumbnail/$post_audio_thumbnail' alt='img';></a><span class='content'>$post_content</span>

                        <a class='read_more' href='post?p_id=$post_id'>...Read More<span class='glyphicon glyphicon-chevron-right'></span></a>
                        </div>
                        <br>
                        <hr>

                        ";

                    }

                    else if($post_type === 'thread'){
                        echo "<div class='segment-title-thread'>
                        <a href='post?p_id=$post_id'><h2><span class='fas fa-images'></span> $post_title  </h2></a>
                        </div>

                        <a href='post?p_id=$post_id'><img class='img-responsive-image img-thumbnail' src='images/threads/$post_image_thread1' alt=''></a><br><span class='content'>$post_content</span>

                    <a class='read_more' href='post?p_id=$post_id'>...Read More<span class='glyphicon glyphicon-chevron-right'></span></a> 
                    <hr>
                    ";
                    
                    }

                    else if($post_type === 'video'){
                        echo "<div class='segment-title-video'>
                        <a href='post?p_id=$post_id'><h2><span class='fa fa-play'></span> $post_title </h2></a>
                        </div>

                        <div style='margin-top: -50px;'>
                            <a href='post?p_id=$post_id'><img class='video img-thumbnail' src='videos/videos_thumbnail/$post_video_thumbnail' alt='img';></a><span class='content'>$post_content</span>
                        

                    <a class='read_more' href='post?p_id=$post_id'>...Read More<span class='glyphicon glyphicon-chevron-right'></span></a>

                    </div>
                    <br>
                    <hr>

                    ";



                    }

                    else if($post_type === 'pdf'){
                        echo "<div class='segment-title-video'>
                        <a href='post?p_id=$post_id'><h2><span class='fa fa-play'></span> $post_title </h2></a>
                        </div>

                        <div style='margin-top: -50px;'>
                            <a href='post?p_id=$post_id'><img class='video img-thumbnail' src='pdf/pdf_thumbnail/$post_pdf_thumbnail' alt='img';></a><span class='content'>$post_content</span>
                        

                    <a class='read_more' href='post?p_id=$post_id'>...Read More<span class='glyphicon glyphicon-chevron-right'></span></a>

                    </div>
                    <br>
                    <hr>

                    ";



                    }



                    else if($post_type === 'image'){
                        echo "<div class='segment-title'>
                        <a href='post?p_id=$post_id'><h2><span class='fa fa-image'></span> $post_title </h2></a>
                        </div>

                        <a href='post?p_id=$post_id'><img class='img-responsive-image img-thumbnail' src='images/$post_image' alt=''></a><br><span class='content'>$post_content</span>


                        <a class='read_more' href='post?p_id=$post_id'>...Read More<span class='glyphicon glyphicon-chevron-right'></span></a>
                        <hr>

                        ";

                    }

                    else
                    {
                        continue;
                    }



                 ?>

                <?php } }?>


                <!-- Whatsapp link -->

                    <div style="border-color: green; position: fixed; bottom: 100px; right: 1%; bottom: 1%; z-index: 1;"><a href="https://wa.me/2348154673170?text=Welcome%20to%20Krazy%20World%20Ent.%20TV.%20Please%20do%20save%20this%20number.%20Your%20name%20is"><img  src="images/categories/Whatsapp.png" style="width: 60px; height: 60px;" alt="Whatsapp Image"></a></div>


            <!--================Categories Area =================-->
            <?php include("includes/pagination.php"); ?>
            <!--================Categories Area =================-->

            </div>
            <!-- End of col-md-7 -->


            <!--================Categories Area =================-->
            <?php include("includes/categories.php"); ?>
            <!--================Categories Area =================-->



                </div>
                <!-- Container -->


                <!-- Hotposts Area -->
                <?php // include("hotposts.php"); ?>
                <!-- Hotposts Area -->



            </div>
            <!-- Row -->


            <!--================Footer Area =================-->
            <?php include("includes/footer.php"); ?>
            <!--================Footer Area =================->