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

<style type="text/css">
.faqs {
  border: 2px solid #ccc;
 /* background-color: #eee;
  border-radius: 5px;
 */ padding: 16px;
  margin: 16px 0
}

.faqs::after {
  content: "";
  clear: both;
  display: table;
}

.faqs img {
  float: left;
  margin-right: 20px;
  border-radius: 50%;
}

.faqs span {
	font-family: New Times Romans;
	font-size: 19px;
	margin-right: 15px;
}

@media (max-width: 500px) {
  .faqs {
      text-align: center;
  }
  .faqs img {
      margin: auto;
      float: none;
      display: inline-block;
  }
}

.faqs p{
		font-family: New Times Romans;
		font-size: 20px;
}

</style>

            <!-- Blog Entries Column -->
            <div class="col-md-7">

            
            <div class="segment-top">
                <h2 style="color: black !important; padding-top: 30px; text-align: center; font-size: 25px; ">FREQUENTLY ASKED SECTION (FAQ'S)</h2> 
					<div class="faqs">
					<img src="images/faqs/faq.png" alt="faqs" style="width:90px">
					<p><span>Is computer science difficult?</span></p>
					<p>Learning the discipline of Computer Science is a hard and difficult endeavor for most students. However, if you are willing to invest the time and learn serious time management skills, most students can successfully learn the discipline and pursue successful careers in Computer Science fields.</p>
					</div>

					<div class="faqs">
					<img src="images/faqs/faq.png" alt="Avatar" style="width:90px">
					<p><span >What is the difference betweeen computer science and computer engineering?</span></p>
					<p>Computer science focuses mostly on troubleshooting issues on a software level. Expect to learn different programming languages, how to work with operating systems, and how to maintain databases. Computer engineering focuses on solving problems and designing hardware and software interfaces</p>
					</div>
					
					<div class="faqs">
					<img src="images/faqs/faq.png" alt="faqs" style="width:90px">
					<p><span>What's software engineering?</span></p>
					<p>Software engineering is defined as a process of analyzing user requirements and then designing, building, and testing software application which will satisfy those requirements. ... It helps you to obtain, economically, software which is reliable and works efficiently on the real machines'.</p>
					</div>

					<div class="faqs">
					<img src="images/faqs/faq.png" alt="Avatar" style="width:90px">
					<p><span>What's the difference between front end development and back end development?</span></p>
					<p>Front end development is programming which focuses on the visual elements of a website or app that a user will interact with (the client side). Back end development focuses on the side of a website users can't see (the server side).</p>
					</div>
					
					<div class="faqs">
					<img src="images/faqs/faq.png" alt="faqs" style="width:90px">
					<p><span>How can i be a become a better programmer?</span></p>
					<p>1. Plan out how you're going to overcome limitations and distractions. Let's start with the basics.<br>
						2. Don't stop with just one iteration or example.<br>
						3. Always have a project in the works, especially with new code.<br>
						4. Avoid only learning one language.<br>
						5. Consult other more experienced coders whenever possible.</p>
					</div>

					<div class="faqs">
					<img src="images/faqs/faq.png" alt="Avatar" style="width:90px">
					<p><span >What is the basics you need to become a web developer</span></p>
					<p>1. User experience (UX)<br>
						2. User interface (UI)<br>
						3. Visual design.<br>
						4. Coding languages including HTML and CSS.<br>
						5. Frontend web programing languages and skills such as JavaScript, Ajax and web animation techniques.<br>
						6. Backend web programing languages such as C# or Java, PHP and Ruby.</p>
					</div>
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




                 ?>

                <?php } }?>


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