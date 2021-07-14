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
                <hr>
              </div>

            <!-- Blog Entries Column -->
            <div class="col-md-7">

              <div class="segment-top">
                
                <h2 style="color: black; !important; padding-top: 30px; text-align: center; ">100 - 400 Level Courses</h2>
                
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

                <h2 style="color: gray;">100 Level Courses</h2>
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
                        <td>CHM111</td>
                        <td>General Chemistry 1</td>
                      </tr>
                      <tr>
                        <td>1st</td>
                        <td>CSC110</td>
                        <td>Introduction to Computing</td>
                      </tr>
                      <tr>
                        <td>1st</td>
                        <td>GST111</td>
                        <td>Philosophy and Logic</td>
                      </tr>
                      <tr>
                        <td>1st</td>
                        <td>GST112</td>
                        <td>Algebra and Trigonometry</td>
                      </tr>
                      <tr>
                        <td>1st</td>
                        <td>MTH110</td>
                        <td>Calculus</td>
                      </tr>
                      <tr>
                        <td>1st</td>
                        <td>PHY109</td>
                        <td>Practical Physics(1st and 2nd Semesters)</td>
                      </tr>
                     <tr>
                        <td>1st</td>
                        <td>PHY111</td>
                        <td>Mech, Thermal Phy Properties Matter</td>
                      </tr>    
                    <tr>
                        <td>2nd</td>
                        <td>CHM112</td>
                        <td>General Chemistry II</td>
                      </tr>                     
                      <tr>
                        <td>2nd</td>
                        <td>CSC120</td>
                        <td>Introduction to Software Package</td>
                      </tr>                     
                      <tr>
                        <td>2nd</td>
                        <td>GST121</td>
                        <td>Peace Conflict Studies and Conflicts Resolution</td>
                      </tr>                     
                      <tr>
                        <td>2nd</td>
                        <td>GST122</td>
                        <td>Nigeria People and Culture</td>
                      </tr>                     
                      <tr>
                        <td>2nd</td>
                        <td>GST123</td>
                        <td>History and Philosophy of Science and Technology</td>
                      </tr>                     
                      <tr>
                        <td>2nd</td>
                        <td>MTH123</td>
                        <td>Vectors, Geometry and Statistics</td>
                      </tr>                     
                      <tr>
                        <td>2nd</td>
                        <td>MTH125</td>
                        <td>Differential equation and Dynamics</td>
                      </tr>                     
                      <tr>
                        <td>2nd</td>
                        <td>PHY124</td>
                        <td>Electromagnetism and Modern Physics</td>
                      </tr>
                    </tbody>
                  </table>

                  <!-- END OF 100 LEVEL COURSES -->


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


                <!-- 300 LEVEL COURSES -->
                <h2 style="color: gray;">300 Level Courses</h2>
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
                        <td>CSC311</td>
                        <td>Web Technology Applications</td>
                      </tr>
                      <tr>
                        <td>1st</td>
                        <td>CSC312</td>
                        <td>Assembly Language Programming</td>
                      </tr>
                      <tr>
                        <td>1st</td>
                        <td>CSC313</td>
                        <td>Data Structure</td>
                      </tr>
                      <tr>
                        <td>1st</td>
                        <td>CSC314</td>
                        <td>Operations Research</td>
                      </tr>
                      <tr>
                        <td>1st</td>
                        <td>CSC316</td>
                        <td>Digital Computer Design</td>
                      </tr>
                     <tr>
                        <td>1st</td>
                        <td>CSC318</td>
                        <td>Introduction to Formal Languages</td>
                      </tr>    
                    <tr>
                        <td>1st</td>
                        <td>MTH317</td>
                        <td>Numerical Linear Algebra</td>
                      </tr>                     
                      <tr>
                        <td>1st</td>
                        <td>CED300</td>
                        <td>Entrepreneuship Development</td>
                      </tr>                     
                      <tr>
                        <td>1st</td>
                        <td>CSC321</td>
                        <td>Systems Analysis and Design</td>
                      </tr>                     
                      <tr>
                        <td>1st</td>
                        <td>CSC325</td>
                        <td>Compiler Construction</td>
                      </tr>                     
                      <tr>
                        <td>1st</td>
                        <td>CSC329</td>
                        <td>Research Methodology</td>
                      </tr>                     
                    </tbody>
                  </table>
                  <!-- END OF 300 LEVEL COURSES -->



                <!-- 400 LEVEL COURSES -->
                <h2 style="color: gray;">400 Level Courses</h2>
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
                        <td>CSC400</td>
                        <td>Seminars</td>
                      </tr>
                      <tr>
                        <td>1st</td>
                        <td>CSC411</td>
                        <td>Operating Systems</td>
                      </tr>
                      <tr>
                        <td>1st</td>
                        <td>CSC413</td>
                        <td>Data Base Management</td>
                      </tr>
                      <tr>
                        <td>1st</td>
                        <td>CSC415</td>
                        <td>Artificial Intelligence</td>
                      </tr>
                      <tr>
                        <td>1st</td>
                        <td>CSC418</td>
                        <td>Advanced design and analysis of algorthm</td>
                      </tr>
                     <tr>
                        <td>1st</td>
                        <td>CSC432</td>
                        <td>Systems programming</td>
                      </tr>    
                    <tr>
                        <td>2nd</td>
                        <td>CSC326</td>
                        <td>Computer Architecture I</td>
                      </tr>                     
                      <tr>
                        <td>2nd</td>
                        <td>CSC328</td>
                        <td>Discrete maths Network and Graph Theory</td>
                      </tr>                     
                      <tr>
                        <td>2nd</td>
                        <td>CSC421</td>
                        <td>Software Engieering</td>
                      </tr>                     
                      <tr>
                        <td>2nd</td>
                        <td>CSC422</td>
                        <td>Concept of Programming Language</td>
                      </tr>                     
                      <tr>
                        <td>2nd</td>
                        <td>CSC427</td>
                        <td>Data Communication Network</td>
                      </tr>    
                     <tr>
                        <td>2nd</td>
                        <td>CSC499</td>
                        <td>Project</td>
                      </tr>                     
                    </tbody>
                  </table>
                  <!-- END OF 400 LEVEL COURSES -->


                <!-- Whatsapp link -->

                    <div style="border-color: green; position: fixed; bottom: 100px; right: 1%; bottom: 1%; z-index: 1;"><a href="#"><img  src="images/categories/Whatsapp.png" style="width: 60px; height: 60px;" alt="Whatsapp Image"></a></div>

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
            <!--================Footer Area =================->