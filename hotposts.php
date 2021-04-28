                <!--Add fire picture to hot post  -->
                <h1 class="text-center" style="color: red"><i class="glyphicon glyphicon-fire"></i>HotPost<i class="glyphicon glyphicon-fire"></i></h1>
            
            <?php

                $query = "SELECT * FROM hotposts ORDER BY hotposts_id DESC";
                $select_all_hotposts = mysqli_query($connection, $query);

                while($row = mysqli_fetch_assoc($select_all_hotposts)){
                    $hotposts_id = $row['hotposts_id'];

                    $hotposts_title1 = $row['hotposts_title1'];
                    $hotposts_title2 = $row['hotposts_title2'];
                    $hotposts_title3 = $row['hotposts_title3'];
                    $hotposts_title4 = $row['hotposts_title4'];
                    $hotposts_title5 = $row['hotposts_title5'];

                    $hotposts_content1 = substr($row['hotposts_content1'], 0,100);
                    $hotposts_content2 = substr($row['hotposts_content2'], 0,100);
                    $hotposts_content3 = substr($row['hotposts_content3'], 0,100);
                    $hotposts_content4 = substr($row['hotposts_content4'], 0,100);
                    $hotposts_content5 = substr($row['hotposts_content5'], 0,100);

                    $hotposts_image1 = $row['hotposts_image1'];
                    $hotposts_image2 = $row['hotposts_image2'];
                    $hotposts_image3 = $row['hotposts_image3'];
                    $hotposts_image4 = $row['hotposts_image4'];
                    $hotposts_image5 = $row['hotposts_image5'];


                ?>

    
                 <!-- First Blog Post -->
                 <?php
                    // Write the css of thread i.e segemnt-title-thread

                        echo "
                        <div class='col-md-12'>
                        <div class='segment-title-hotposts'>
                        <a href='hotposts_post?hp_id=$hotposts_id'><h2><span class='fas fa-images'></span> $hotposts_title1  </h2></a>
                        </div>

                        <a href='hotposts_post?hp_id=$hotposts_id'>
                            <div class='text-center'>
                            <img class='hotposts_first_image img-thumbnail' src='images/hotposts/$hotposts_image1' alt=''></a>
                            <br><span class='content'>$hotposts_content1</span>
                            <a class='read_more' href='hotposts_post?hp_id=$hotposts_id'>...Read More<span class='glyphicon glyphicon-chevron-right'></span>
                        </a> 
                        </div>
                    
                    <hr>
                    </div>
                    ";

                    echo "<div class='col-md-6 col-xs-6'>

                    <div class='segment-title-hotposts_others'>
                        <a href='hotposts_post?hp_id=$hotposts_id '><h2><span class='fas fa-images'></span> $hotposts_title2  </h2></a>
                        </div>

                        <a href='hotposts_post?hp_id=$hotposts_id'><img class='hotposts_others' src='images/hotposts/$hotposts_image2' alt=''></a><br><span class='content'>$hotposts_content2</span>

                    <a class='read_more' href='hotposts_post?hp_id=$hotposts_id'>...Read More<span class='glyphicon glyphicon-chevron-right'></span></a>
                    <hr>
                    </div>";

                    echo "<div class='col-md-6 col-xs-6'>

                    <div class='segment-title-hotposts_others'>
                        <a href='hotposts_post?hp_id=$hotposts_id '><h2><span class='fas fa-images'></span> $hotposts_title3  </h2></a>
                        </div>

                        <a href='hotposts_post?hp_id=$hotposts_id'><img class='hotposts_others' src='images/hotposts/$hotposts_image3' alt=''></a><br><span class='content'>$hotposts_content3</span>

                    <a class='read_more' href='hotposts_post?hp_id=$hotposts_id'>...Read More<span class='glyphicon glyphicon-chevron-right'></span></a> 
                    <hr>
                    </div>";

                    echo "<div class='col-md-6 col-xs-6'>
                        <div class='segment-title-hotposts_others'><br>
                            <a href='hotposts_post?hp_id=$hotposts_id '><h2><span class='fas fa-images'></span> $hotposts_title4  </h2></a>
                        </div>

                        <a href='hotposts_post?hp_id=$hotposts_id'><img class='hotposts_others' src='images/hotposts/$hotposts_image4' alt=''></a><br><span class='content'>$hotposts_content4</span>

                    <a class='read_more' href='hotposts_post?hp_id=$hotposts_id'>...Read More<span class='glyphicon glyphicon-chevron-right'></span></a> 
                    <hr>
                    </div>";


                    echo "<div class='col-md-6 col-xs-6'>
                    <div class='segment-title-hotposts_others'><br>
                        <a href='hotposts_post?hp_id=$hotposts_id '><h2><span class='fas fa-images'></span> $hotposts_title5  </h2></a>
                        </div>

                        <a href='hotposts_post?hp_id=$hotposts_id'><img class='hotposts_others' src='images/hotposts/$hotposts_image5' alt=''></a><br><span class='content'>$hotposts_content5</span>

                    <a class='read_more' href='hotposts_post?hp_id=$hotposts_id'>...Read More<span class='glyphicon glyphicon-chevron-right'></span></a>
                    <hr>
                    </div>";
                    
                 ?>

                <?php }?>

