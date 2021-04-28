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



            if(isset($_GET['hp_id'])){
                $the_hotposts_id = $_GET['hp_id'];

                $hotposts_query = "UPDATE hotposts SET hotposts_views_count = hotposts_views_count + 1 WHERE hotposts_id = {$the_hotposts_id}";
                $send_view_query = mysqli_query($connection, $hotposts_query);


                if(!$send_view_query){
                    die("QUERY FAILED " . mysqli_error($connection));
                }


            
                $query = "SELECT * FROM hotposts WHERE hotposts_id = $the_hotposts_id ";
                $select_all_hotposts = mysqli_query($connection, $query);

                while($row = mysqli_fetch_assoc($select_all_hotposts)){

                    $hotposts_id = $row['hotposts_id'];

                    $hotposts_title1 = $row['hotposts_title1'];
                    $hotposts_title2 = $row['hotposts_title2'];
                    $hotposts_title3 = $row['hotposts_title3'];
                    $hotposts_title4 = $row['hotposts_title4'];
                    $hotposts_title5 = $row['hotposts_title5'];
                    
                    $hotposts_content1 = $row['hotposts_content1'];
                    $hotposts_content2 = $row['hotposts_content2'];
                    $hotposts_content3 = $row['hotposts_content3'];
                    $hotposts_content4 = $row['hotposts_content4'];
                    $hotposts_content5 = $row['hotposts_content5'];


                    $hotposts_image1 = $row['hotposts_image1'];
                    $hotposts_image2 = $row['hotposts_image2'];
                    $hotposts_image3 = $row['hotposts_image3'];
                    $hotposts_image4 = $row['hotposts_image4'];
                    $hotposts_image5 = $row['hotposts_image5'];

                    // Hotposts File
                    $hotposts_file1 = $row['hotposts_file1'];
                    $hotposts_file2 = $row['hotposts_file2'];
                    $hotposts_file3 = $row['hotposts_file3'];
                    $hotposts_file4 = $row['hotposts_file4'];
                    $hotposts_file5 = $row['hotposts_file5'];

                    $hotposts_views_count = $row['hotposts_views_count'];
                    $hotposts_tags = $row['hotposts_tags'];
                    $hotposts_date = $row['hotposts_date'];

            ?>
                <div style="color: red;">
                    <h1>All Hotposts<i class="glyphicon glyphicon-fire"></i></h1>
                </div>
                 <!-- First Hotpost-->
                <div class="segment-title">
                    <a href="hotposts_post.php?hp_id=<?php echo $hotposts_id; ?>"><h2><?php echo $hotposts_title1; ?></h2></a>
                </div>
                
                <img class="img-responsive-image img-thumbnail" src="images/hotposts/<?php echo $hotposts_image1; ?>" alt="hotposts_image1">

                <div style="margin: 10px 10px 0px 0px;"> 
                
                    <span class="content">
                        <?php echo $hotposts_content1; ?>
                    </span>
                    
                    <p><a href=' <?php echo $hotposts_file1; ?>' class='download' download=' <?php echo $hotposts_file1; ?>' alt='' ><span class='fa fa-download small'>Download</a></span>

                 <div style="margin: 10px 10px 0px 0px;"></div>


                </div>

                <!-- Second Hotpost -->
                <div class="segment-title">
                    <a href="hotposts_post.php?hp_id=<?php echo $hotposts_id; ?>"><h2><?php echo $hotposts_title2; ?></h2></a>
                </div>
                
                <img class="img-responsive-image img-thumbnail" src="images/hotposts/<?php echo $hotposts_image2; ?>" alt="hotposts_image2">

                <div style="margin: 10px 10px 0px 0px;"> 
                
                    <span class="content">
                        <?php echo $hotposts_content2; ?>
                    </span>

                    <p><a href=' <?php echo $hotposts_file2; ?>' class='download' download=' <?php echo $hotposts_file2; ?>' alt='' ><span class='fa fa-download small'>Download</a></span>

                    <div style="margin: 10px 10px 0px 0px;"></div>

                </div>


                <!-- Third Post -->
                <div class="segment-title">
                    <a href="hotposts_post.php?hp_id=<?php echo $hotposts_id; ?>"><h2><?php echo $hotposts_title3; ?></h2></a>
                </div>
                
                <img class="img-responsive-image img-thumbnail" src="images/hotposts/<?php echo $hotposts_image3; ?>" alt="hotposts_image3">

                <div style="margin: 10px 10px 0px 0px;"> 
                
                    <span class="content">
                        <?php echo $hotposts_content3; ?>
                    </span>

                    <p><a href=' <?php echo $hotposts_file3; ?>' class='download' download=' <?php echo $hotposts_file3; ?>' alt='' ><span class='fa fa-download small'>Download</a></span>

                    <div style="margin: 10px 10px 0px 0px;"></div>


                </div>

                <!-- Fourth Post -->
              <div class="segment-title">
                    <a href="hotposts_post.php?hp_id=<?php echo $hotposts_id; ?>"><h2><?php echo $hotposts_title4; ?></h2></a>
                </div>
                
                <img class="img-responsive-image img-thumbnail" src="images/hotposts/<?php echo $hotposts_image4; ?>" alt="hotposts_image4">

                <div style="margin: 10px 10px 0px 0px;"> 
                
                    <span class="content">
                        <?php echo $hotposts_content4; ?>
                    </span>

                    <p><a href=' <?php echo $hotposts_file4; ?>' class='download' download=' <?php echo $hotposts_file4; ?>' alt='' ><span class='fa fa-download small'>Download</a></span>

                    <div style="margin: 10px 10px 0px 0px;"></div>

                </div>

              <!-- Fifth Post -->
              <div class="segment-title">
                    <a href="hotposts_post.php?hp_id=<?php echo $hotposts_id; ?>"><h2><?php echo $hotposts_title5; ?></h2></a>
                </div>
                
                <img class="img-responsive-image img-thumbnail" src="images/hotposts/<?php echo $hotposts_image5; ?>" alt="hotposts_image5">

                <div style="margin: 10px 10px 0px 0px;"> 
                
                    <span class="content">
                        <?php echo $hotposts_content5; ?>
                    </span>
                    
                    <p><a href=' <?php echo $hotposts_file5; ?>' class='download' download=' <?php echo $hotposts_file5; ?>' alt='' ><span class='fa fa-download small'>Download</a></span>

                    <div style="margin: 10px 10px 0px 0px;"></div>

                    <p><i class="fa fa-clock-o"> <?php echo $hotposts_date; ?></i></p>


                </div>

            <?php }} ?>


                <!-- Comments Form -->
<?php 

    if(isset($_POST['create_comment'])) {
        $the_hotposts_id = escape($_GET['hp_id']);
        $comment_author = escape($_POST['comment_author']);
        $comment_email = escape($_POST['comment_email']);
        $comment_content = escape($_POST['comment_content']);
        $comment_status = 'approved';
        $comment_date = date("Y-m-d");


        if (!empty($comment_author) && !empty($comment_email) && !empty($comment_content))
        {
            $stmt = mysqli_prepare($connection, "INSERT INTO comments (comment_hotposts_id, comment_author, comment_email, comment_content, comment_status, comment_date) VALUES(?, ?, ?, ?, ?, ?)");
            mysqli_stmt_bind_param($stmt, 'ssssss', $hotposts_id, $comment_author, $comment_email, $comment_content, $comment_status, $comment_date);
            mysqli_stmt_execute($stmt);


            if(!$stmt) {
                die('QUERY FAILED' . mysqli_error($connection));
            }

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
            $query = "SELECT * FROM comments WHERE comment_hotposts_id = {$the_hotposts_id} ";
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
                        
                        <b class="fa fa-clock-o"> <?php echo $comment_date; ?></b></h4>
                        
                        <p><h4><?php echo $comment_content;?> </h4></p>
                        
                    </div>
                </div>

               <?php  }  ?>

           <hr>

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