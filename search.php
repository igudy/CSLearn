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

                if(isset($_POST['submit'])){
                $search = $_POST['search'];

                $query = "SELECT * FROM posts WHERE post_tags LIKE '%$search%' ORDER BY post_id DESC";
                $search_query = mysqli_query($connection, $query);

                $count = mysqli_num_rows($search_query);


                if($count == 0) {
                echo "<h1> NO RESULT</h1>";
                } else {

                    while($row = mysqli_fetch_assoc($search_query)){
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
                            <a href='post?p_id=$post_id'><img class='video img-thumbnail' src='music/music_thumbnail/$post_audio_thumbnail' alt='img';></a><span class='content'>$post_content</span>

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

                    else if($post_type === 'movies'){
                        echo "<div class='segment-title-video'>
                        <a href='post?p_id=$post_id'><h2><span class='fa fa-play'></span> $post_title </h2></a>
                        </div>

                        <div style='margin-top: -50px;'>
                            <a href='post?p_id=$post_id'><img class='video img-thumbnail' src='movies/movies_thumbnail/$post_movies_thumbnail' alt='img';></a><span class='content'>$post_content</span>
                        

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

                    }else
                    {
                        continue;
                    }

                    ?>

       
                <?php } } } ?> 


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