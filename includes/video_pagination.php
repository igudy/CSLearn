
            <div class="col-md-12">
                    <div class="pagination">
                      <?php
                      if($page < 1)
                      {
                        header("location: videos.php");
                      }
                      else{

                      echo "<a href='videos.php?page={$previous}'>&laquo;Prev.</a>";
                    
                        ?>

                        <?php
                            $page = 2;
                            $count = 2;
                             for($i = 1; $i <= $count; $i++){
                             if($i == $page){
                                 echo "<a href='videos.php?page={$i}'>{$i}</a>";
                                 }
                                 else{
                                    echo "<a class='active-link' href='videos.php?page={$i}'>{$i}</a>";
                                 }
                                } 
                     ?>        

                     <?php
                        echo "
                        <a href='#'>..</a>
                        <a href='videos.php?page={$next}'>Next&raquo;</a>";
                    }
                    ?>
                    



                    </div>
                <br>
                <hr>
            </div>
            <!-- End of pagination -->

            <!-- End of col-md-7 part  -->
