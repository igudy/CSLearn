<?php
   $query = "SELECT * FROM categories";
   $select_all_categories = mysqli_query($connection, $query);
?>
    <div class="col-md-12">
            <div class="pagination">
              <?php
                  $row = mysqli_fetch_assoc($select_all_categories);
                  $cat_id = $row['cat_id'];
                  $cat_title = $row['cat_title'];

                  // echo "<a href='category?category={$cat_id}?page={$previous}'>&laquo;Prev.</a>";
                  // echo "<a href='category?category={$cat_id}?page={$next}'>Next&raquo;</a>";                    
              
              ?>

            </div>
        <br>
      <hr>
    </div>
    <!-- End of pagination -->

    <!-- End of col-md-7 part  -->