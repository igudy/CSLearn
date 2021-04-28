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

            <?php


            if(isset($_GET['p_id'])){
                $the_post_id = $_GET['p_id'];

                $view_query = "UPDATE posts SET post_views_count = post_views_count + 1 WHERE post_id = {$the_post_id}";
                $send_view_query = mysqli_query($connection, $view_query);


                if(!$send_view_query){
                     die("QUERY FAILED " . mysqli_error($connection));
                }

            
                $query = "SELECT * FROM posts WHERE post_id = $the_post_id ";
                $select_all_posts = mysqli_query($connection, $query);

                while($row = mysqli_fetch_assoc($select_all_posts)){

                    $post_id   = $row['post_id'];
                    $post_category_id   = $row['post_category_id'];
                    $post_title         = $row['post_title'];
                    $post_user          = $row['post_user'];
                    $post_date          = $row['post_date'];
                    $post_image         = $row['post_image'];

                    $post_image_thread1 = $row['thread1'];
                    $post_image_thread2 = $row['thread2'];
                    $post_image_thread3 = $row['thread3'];


                    $post_type          = $row['post_type'];
                    $post_music         = $row['post_music'];
                    $post_movies        = $row['post_movies'];
                    $post_music_thumbnail = $row['post_music_thumbnail'];
                    $post_movies_thumbnail = $row['post_movies_thumbnail'];
                    $post_video         = $row['post_video'];
                    $post_content       = $row['post_content'];
                    $post_tags          = $row['post_tags'];
                    $post_status        = $row['post_status'];
                    $post_comment_count = $row['post_comment_count'];

                
                ?> 
            

                <?php

                    if ($post_type == 'music') {
                    echo "<div class='segment-title-music'>
                        <a href='post.php?p_id=$post_id'><h2><span class='fa fa-music'></span> $post_title  </h2></a>
                        </div>";

                        echo "
                        <div style='margin: 60px;'></div><img class='img-responsive-image img-thumbnail'  src='music/music_thumbnail/$post_music_thumbnail' alt=''>

                        <hr>";


                    echo "
                        <audio controls>
                            <source src='$post_music' type='audio/mpeg' autostart='0'>
                         </audio>";



                    echo "<div style='margin: 0px 30px 0px 0px;'></div>
                            <span style='font-size: 13px;'>$post_content</span>
                                
                                <div style='margin: 10px 10px 0px 0px;'></div>
                                    <p><i class='fa fa-clock-o'> $post_date</i></p>
                                ";

                    echo "<p><a href='$post_music' class='download' download='$post_music' alt='' ><span class='fa fa-download small'>Download Music</a></span>";



                    }
                    else if($post_type === 'thread'){
                        echo "<div class='segment-title-thread'>
                        <a href='post?p_id=$post_id'><h2><span class='fas fa-images'></span> $post_title  </h2></a>
                        </div>";

                        if($post_image_thread1 == true){
                            echo "<div style='margin: 60px;'></div><img class='img-responsive-image img-thumbnail'  src='images/threads/$post_image_thread1' alt=''>";                            
                        }
                        if($post_image_thread2 == true){
                        echo "<div style='margin: 60px;'></div><img class='img-responsive-image img-thumbnail'  src='images/threads/$post_image_thread2' alt=''>";                            
                        }
                        if($post_image_thread3 == true){
                        echo "<div style='margin: 60px;'></div><img class='img-responsive-image img-thumbnail'  src='images/threads/$post_image_thread3' alt=''>";
                        }



                    echo "<div style='margin: 0px 30px 0px 0px;'></div>
                            <span style='font-size: 13px;'>$post_content</span>
                                
                                <div style='margin: 10px 10px 0px 0px;'></div>
                                    <p><i class='fa fa-clock-o'> $post_date</i></p>
                                ";

                    echo "

                    <a href='images/threads/$post_image_thread1' class='download' download='images/threads/$post_image_thread1' alt='' ><span class='fa fa-download small'>Download 1</a></span>

                    <a href='images/threads/$post_image_thread2' class='download' download='images/threads/$post_image_thread2' alt='' ><span class='fa fa-download small'>Download 2</a></span>

                    <a href='images/threads/$post_image_thread1' class='download' download='images/threads/$post_image_thread1' alt='' ><span class='fa fa-download small'>Download 3</a></span>

                    ";
                    }

                    // Movies
                    else if ($post_type == 'movies') {
                    echo "<div class='segment-title-video'>
                        <a href='post.php?p_id=$post_id'><h2><span class='fa fa-play'></span> $post_title  </h2></a>
                        </div>";

                        echo "
                        <div style='margin: 60px;'></div><img class='img-responsive-image img-thumbnail'  src='movies/movies_thumbnail/$post_movies_thumbnail' alt=''>

                        <hr>";


                    echo "<div style='margin: 0px 30px 0px 0px;'></div>
                            <span style='font-size: 13px;'>$post_content</span>
                                
                                <div style='margin: 10px 10px 0px 0px;'></div>
                                    <p><i class='fa fa-clock-o'> $post_date</i></p>
                        ";

                    echo "<p><a href='$post_movies' class='download' download='$post_movies' alt='' ><span class='fa fa-download small'>Download Movie</a></span>";

                    }

                    else if($post_type == 'video')
                    {
                    echo "<div class='segment-title-video'>
                    <a href='post.php?p_id=$post_id'><h2><span class='fa fa-play'></span> $post_title </h2></a>
                    </div>";


                    echo "<video width='350' height='350' src='$post_video' controls='All' loop='false' autostart='0'>
                        <embed width='350' height='350' src='$/post_video' autostart='0'></embed>
                    </video>";

                    echo "<div style='margin: 0px 30px 0px 0px;'></div>
                            <span style='font-size: 13px;'>$post_content</span>
                                
                                <div style='margin: 10px 10px 0px 0px;'></div>
                                    <p><i class='fa fa-clock-o'> $post_date</i></p>
                        ";

                    echo "<p><a href='$post_video' class='download' download='$post_video' alt='' ><span class='fa fa-download small'>Download Video</a></span>";
                    }


                    else{
                    echo "<div class='segment-title'>
                    <a href='post.php?p_id=$post_id'><h2><span class='fa fa-image'></span> $post_title </h2></a>
                    </div>";

                    echo "
                    <div style='margin: 60px;'></div><img class='img-responsive-image img-thumbnail' src='images/$post_image' alt=''><";
                    

                    echo "<div style='margin: 0px 30px 0px 0px;'></div>
                            <span style='font-size: 13px;'>$post_content</span>
                                
                                <div style='margin: 10px 10px 0px 0px;'></div>
                                    <p><i class='fa fa-clock-o'> $post_date</i></p>
                        ";


                    echo "<p><a href='images/$post_image' class='download' download='images/$post_image' alt='' ><span class='fa fa-download small'>Download</a></span>";


                    }
                ?>

                
            <?php }?>




                    <!-- Whatsapp link -->

            <div style="border-color: green; position: fixed; bottom: 100px; right: 1%; bottom: 1%; z-index: 1;"><a href="https://wa.me/2348154673170?text=Welcome%20to%20Krazy%20World%20Ent.%20TV.%20Please%20do%20save%20this%20number.%20Your%20name%20is"><img  src="images/categories/Whatsapp.png" style="width: 60px; height: 60px;" alt="Whatsapp Image"></a></div>

            <!-- Comments Form -->
<?php 

    if(isset($_POST['create_comment'])) {
        $the_post_id = escape($_GET['p_id']);
        $comment_author = escape($_POST['comment_author']);
        $comment_email = escape($_POST['comment_email']);
        $comment_content = escape($_POST['comment_content']);
        $comment_status = 'approved';
        $comment_date = date("Y-m-d");


        if (!empty($comment_author) && !empty($comment_email) && !empty($comment_content))
        {
            $stmt = mysqli_prepare($connection, "INSERT INTO comments (comment_post_id, comment_author, comment_email, comment_content, comment_status, comment_date) VALUES(?, ?, ?, ?, ?, ?)");
            mysqli_stmt_bind_param($stmt, 'ssssss', $the_post_id, $comment_author, $comment_email, $comment_content, $comment_status, $comment_date);
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
            $query = "SELECT * FROM comments WHERE comment_post_id = {$the_post_id}";
            $select_comment_query = mysqli_query($connection, $query);

            if(!$select_comment_query){
                die("Query Failed" . mysqli_error($connection));
            }

            while ($row = mysqli_fetch_array($select_comment_query)){
            $comment_date   = $row['comment_date']; 
            $comment_content= $row['comment_content'];
            $comment_author = $row['comment_author'];
                ?>  
                           <!-- Comment -->
                <div class="media">
                    <div class="media-body comments">
                        <h6 class="media-heading"><?php echo $comment_author; ?>
                        
                        <b class="fa fa-clock-o"> <?php echo $comment_date; ?></b></h4>
                        
                        <p><h4><?php echo $comment_content;?> </h4></p>
                        
                    </div>
                </div>

           <?php } } ?>

           <hr>

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
            <!--================Footer Area =================-->