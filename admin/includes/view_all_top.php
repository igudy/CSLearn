<div class="col-xs-4">

<a class="btn btn-primary" href="top.php?source=add_top">Add New</a>

 </div>


<form action="" method='post'>

<div class="col-md-12 col-xs-12">
    <table class="table table-bordered">
    <thead>
        <tr>
            <th>Id</th>
            <th>Title</th>
            <th>Content</th>
            <th>Image1</th>
            <th>Image2</th>
            <th>Image3</th>
            <th>Views</th>
            <th>Tags</th>
            <th>Date</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $query = "SELECT * FROM top ORDER BY top_id DESC ";
        $select_all_posts = mysqli_query($connection, $query);

        while($row = mysqli_fetch_assoc($select_all_posts)){
            $top_id = $row['top_id'];
            $top_title = $row['top_title'];
            $top_content = $row['top_content'];
            $top_image1 = $row['top_image1'];
            $top_image2 = $row['top_image2'];
            $top_image3 = $row['top_image3'];
            $top_views_count   = $row['top_views_count'];

            $top_tags = $row['top_tags'];
            $top_date = $row['top_date'];

            echo "<tr>";
            ?>

            <?php
            echo "<td>{$top_id}</td>";
            echo "<td>{$top_title}</td>";
            echo "<td>{$top_content}</td>";

            echo "<td><img width='100' height='150' src='../images/topImages/topImage1/$top_image1' alt='image'></td>";
            echo "<td><img width='100' height='150' src='../images/topImages/topImage2/$top_image2' alt='image'></td>";
            echo "<td><img width='100' height='150' src='../images/topImages/topImage3/$top_image3' alt='image'></td>";
            echo "<td> $top_views_count </td>";

            echo "<td>{$top_tags}</td>";
            echo "<td>{$top_date}</td>";

            // echo "<td><a href='../post?p_id={$post_id}'>View Post</td>";
            // echo "<td> $top_views_count </td>";
            // echo "<td><a href='posts.php?reset={$post_id}'>Reset Views</td>";
            echo "<td><a href='top.php?source=edit_top&t_id={$top_id}'>Edit</td>";
            echo "<td><a href='top.php?delete={$top_id}'>Delete</td>";
            echo "</tr>";

        }
        ?>

    </tbody>

</table>

</form>

<!-- Delete Top -->
<?php
if(isset($_GET['delete'])){
    $the_top_id = $_GET['delete'];
    $query = "DELETE FROM top WHERE top_id = {$the_top_id}";
    $top_delete_query = mysqli_query($connection, $query);

    if(!$top_delete_query){
        die("Query Failed " . mysqli_error($connection));
    }

    header("location: top.php");
}


// Delete Top
// if(isset($_GET['reset'])){

//     $the_post_id = $_GET['reset'];
    
//     $query = "UPDATE posts SET post_views_count = 0 WHERE post_id = " . mysqli_real_escape_string($connection, $the_post_id);
//     $reset_query = mysqli_query($connection, $query);

//     header("location: posts.php");
// }


?>
</div>