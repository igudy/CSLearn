<?php
$query = "SELECT * FROM categories ORDER BY cat_id DESC";
$select_all_categories = mysqli_query($connection, $query);
?>
            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-5">
            
                <!-- Blog Categories Well -->
                <div class="well wow animate__animated animate__zoomIn delay-1">
                <h2 style="color: gray !important; text-align: center; ">CATEGORIES</h2>
                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="list-unstyled">
                                <?php
                                    while($row = mysqli_fetch_assoc($select_all_categories)){
                                    $cat_id = $row['cat_id'];
                                    $cat_title = $row['cat_title'];

                                    if($cat_title === 'No Category'){
                                        continue;
                                    }
                                    else{
                                        echo "<div class='chip'>
                                       <a href='category?category={$cat_id}' style='color: black; font-size:19px;'>{$cat_title}</a>
                                        </div>"; 
                                        }
                                    }

                                    // echo "<li><a href='category.php?category={$cat_id}'>{$cat_title}</a></li>"; }
                                ?>
                            </ul>
                        </div>
                        <!-- /.col-lg-6 -->
                    </div>
                    <!-- /.row -->
                </div>


            <!-- ADD LEVELS HERE -->

                <div class="col-md-12 col-xs-6 wow animate__animated animate__zoomIn delay-2">
                    <div class="card">
                      <a href="100level"><img src="./images/levels/100level.png" alt="Avatar" style="width:100%">
                            <h4><b>View 100 Level Courses</b></h4></a>
                    </div>
                </div>

                <div class="col-md-12 col-xs-6 wow animate__animated animate__zoomIn delay-2" alt="200level">
                    <div class="card">
                      <a href="200level.php"><img src="./images/levels/200level.png" alt="Avatar" style="width:100%">
                            <h4><b>View 200 Level Courses</b></h4></a>
                    </div>
                </div>

                <div class="col-md-12 col-xs-6 wow animate__animated animate__zoomIn delay-2">
                    <div class="card">
                      <a href="300level"><img src="./images/levels/300level.png" alt="Avatar" style="width:100%">
                            <h4><b>View 300 Level Courses</b></h4></a>
                    </div>
                </div>

                <div class="col-md-12 col-xs-6 wow animate__animated animate__zoomIn delay-2">
                    <div class="card">
                      <a href="400level"><img src="./images/levels/400level.png" alt="Avatar" style="width:100%">
                            <h4><b>View 400 Level Courses</b></h4></a>
                    </div>
            </div>
        </div>



            <!-- END OF LEVELS -->

