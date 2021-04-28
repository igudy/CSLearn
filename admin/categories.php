    <!--================Header Menu Area =================-->
    <?php include("includes/header.php"); ?>
    <!--================Header Menu Area =================-->


    <!--================Header Menu Area =================-->
    <?php include("includes/navigation.php"); ?>
    <!--================Header Menu Area =================-->
    
        
        
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Blank Page
                            <small>Subheading</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Blank Page
                            </li>
                        </ol>



                    <div class="col-md-6 col-xs-6">
                        <!-- ADDING CATEGORIES -->
                        <?php
                            if(isset($_POST['submit'])){
                                $cat_id = escape($_POST['cat_id']);
                                $cat_title = escape($_POST['cat_title']);

                                if($cat_title == "" || empty($cat_title)){
                                    echo "NO RESULT FOUND";
                                }

                                else{
                                    $query = "INSERT INTO categories (cat_title) VALUES (?)";
                                    $stmt = mysqli_prepare($connection, $query);
                                    mysqli_stmt_bind_param($stmt, 's', $cat_title);
                                    mysqli_stmt_execute($stmt);


                                    if(!$stmt){
                                        die("Query Failed " . mysqli_error($connection));
                                    }
                                 }
                                 header("Location: categories");
                         }
                        ?>


                        <form action="" method="post">
                            <div class="form-group">
                            <label for="cat-title">Add Categories</label>
                            <input class="form-control" type="text" name="cat_title">
                            <br>
                            <button class="form-control btn btn-primary" type="submit" name="submit">Submit</button>
                            </div>




                            <div class="form-group">
                            <label for="cat-title">Edit Categories</label>

                            <?php
                            if(isset($_GET['edit'])){
                                 $the_cat_id = escape($_GET['edit']);

                                include "update_categories.php";
                            }


                            ?>

                            <br>
                            </div>


                        </form>
                    </div>



                    <div class="col-md-6 col-xs-6">



                        
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Category</th>
                                </tr>
                            </thead>
                            <tbody>

                        <!-- FIND ALL CATEGORIES  -->
                        <?php
                        $query = "SELECT * FROM categories";
                        $select_all_categories = mysqli_query($connection, $query);

                        while($row = mysqli_fetch_assoc($select_all_categories)){
                            $cat_id = $row['cat_id'];
                            $cat_title = $row['cat_title'];

                            echo "<tr>";
                            echo    "<td> {$cat_id} </td>";
                            echo    "<td> {$cat_title} </td>";
                            echo    "<td><a href='categories?delete={$cat_id}'>Delete</td>";
                            echo    "<td><a href='categories?edit={$cat_id}'>Edit</td>";
                            echo "</tr>";

                        }
                         ?>
                            </tbody>
                        </table>



                        <!-- DELETE FROM CATEGORIES -->
                        <?php
                        if(isset($_GET['delete'])){
                            $the_cat_id = $_GET['delete'];
                            $query = "DELETE FROM categories WHERE cat_id = {$the_cat_id} ";
                            $delete_query = mysqli_query($connection, $query);
                            header("Location: categories");
                        }
                        ?>
                    </div>
                    </div>

                        
                </div>

                <!-- /.row -->


    <!--================Header Menu Area =================-->
    <?php include("includes/footer.php"); ?>
    <!--================Header Menu Area =================-->