            <!-- Start of pagination -->

            <div class="col-md-12">


                    <div class="pagination">
                      <?php
                      if($page < 1)
                      {
                        header("location: index");
                      }else{



                      echo "<a href='index?page={$previous}'>&laquo;Prev.</a>";
                    
                        ?>

                        <?php
                            $page = 2;
                            $count = 2;
                             for($i = 1; $i <= $count; $i++){
                             if($i == $page){
                                 echo "<a href='index.php?page={$i}'>{$i}</a>";
                                 }
                                 else{
                                    echo "<a class='active-link' href='index.php?page={$i}'>{$i}</a>";
                                 }
                                } 
                     ?>        

                     <?php
                        echo "
                        <a href='#'>..</a>
                        <a href='index?page={$next}'>Next&raquo;</a>";
                      }
                    ?>

                    </div>
                <br>
                <hr>
            </div>
            <!-- End of pagination -->

            <!-- End of col-md-7 part  -->
