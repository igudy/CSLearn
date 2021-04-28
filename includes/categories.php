<?php
$query = "SELECT * FROM categories ORDER BY cat_id DESC";
$select_all_categories = mysqli_query($connection, $query);
?>
            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-5">
                <hr>
                <!-- Blog Categories Well -->
                <div class="well">
                    <h4>Related</h4>
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
                                        <img src='images/categories/favicon.png' alt='img';><a href='category?category={$cat_id}' style='color: #4D5DAD;'>{$cat_title}</a>
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
            </div>

                <!-- Side Widget Well -->
               <!--  <div class="well">
                    <h4>Side Widget Well</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
                </div> -->
