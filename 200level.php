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
                <div class="segment-top">
                <h2 style="color: black; !important; padding-top: 30px; text-align: center; ">LEVEL POSTS</h2>
              </div>

            <!-- Blog Entries Column -->
            <div class="col-md-7">

            


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




                 ?>

                <?php } }?>

                <!-- 200 LEVEL COURSES -->
                <h2 style="color: gray;">200 Level Courses</h2>
                  <table class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>Term</th>
                        <th>Code</th>
                        <th>Title</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>1st</td>
                        <td>CSC211</td>
                        <td>Structured Programming in PASCAL</td>
                      </tr>
                      <tr>
                        <td>1st</td>
                        <td>CSC212</td>
                        <td>Symbolic Programming in FORTRAN</td>
                      </tr>
                      <tr>
                        <td>1st</td>
                        <td>CSC217</td>
                        <td>Information Technology Design, Policy and Application</td>
                      </tr>
                      <tr>
                        <td>1st</td>
                        <td>CSC237</td>
                        <td>Information Interfaces Presentation</td>
                      </tr>
                      <tr>
                        <td>1st</td>
                        <td>CSC237</td>
                        <td>Statistics</td>
                      </tr>
                     <tr>
                        <td>1st</td>
                        <td>MTH230</td>
                        <td>Line Algebra</td>
                      </tr>    
                    <tr>
                        <td>2nd</td>
                        <td>CSC220</td>
                        <td>Introduction to Data Processing</td>
                      </tr>                     
                      <tr>
                        <td>2nd</td>
                        <td>CSC222</td>
                        <td>Assembly Language I</td>
                      </tr>                     
                      <tr>
                        <td>2nd</td>
                        <td>CSC224</td>
                        <td>Introduction to C and C++</td>
                      </tr>                     
                      <tr>
                        <td>2nd</td>
                        <td>MTH227</td>
                        <td>Introduction to Numerical Analysis</td>
                      </tr>                     
                      <tr>
                        <td>2nd</td>
                        <td>PHY224</td>
                        <td>Electromagnetism and electronics</td>
                      </tr>                     
                    </tbody>
                  </table>
                  <!-- END OF 200 LEVEL COURSES -->



                <!-- Whatsapp link -->

                    <div style="border-color: green; position: fixed; bottom: 100px; right: 1%; bottom: 1%; z-index: 1;"><a href="https://wa.me/2348154673170?text=Welcome%20to%20Krazy%20World%20Ent.%20TV.%20Please%20do%20save%20this%20number.%20Your%20name%20is"><img  src="images/categories/Whatsapp.png" style="width: 60px; height: 60px;" alt="Whatsapp Image"></a></div>



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