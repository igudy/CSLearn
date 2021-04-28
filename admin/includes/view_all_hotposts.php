<div class="col-xs-4">

<a class="btn btn-primary" href="hotposts.php?source=add_hotposts">Add New</a>

 </div>


<form action="" method='post'>

<div class="col-md-12 col-xs-12">
    <table class="table table-bordered">
    <thead>
        <tr>
            <th>Id</th>
            
            <th>Title1</th>
            <th>Image1</th>
            <th>File1</th>
            <th>Content1</th>


            <th>Title2</th>
            <th>Image2</th>
            <th>File2</th>
            <th>Content2</th>


            <th>Title3</th>
            <th>Image3</th>
            <th>File3</th>
            <th>Content3</th>
            

            <th>Title4</th>
            <th>Image4</th>
            <th>File4</th>
            <th>Content4</th>
            

            <th>Title5</th>
            <th>Image5</th>
            <th>File5</th>
            <th>Content5</th>

            <th>Views</th>
            <th>Tags</th>
            <th>Date</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $query = "SELECT * FROM hotposts ORDER BY hotposts_id DESC ";
        $select_all_hotposts = mysqli_query($connection, $query);

        while($row = mysqli_fetch_assoc($select_all_hotposts)){
            $hotposts_id = $row['hotposts_id'];

            $hotposts_title1 = $row['hotposts_title1'];
            $hotposts_title2 = $row['hotposts_title2'];
            $hotposts_title3 = $row['hotposts_title3'];
            $hotposts_title4 = $row['hotposts_title4'];
            $hotposts_title5 = $row['hotposts_title5'];
            
            $hotposts_content1 = $row['hotposts_content1'];
            $hotposts_content2 = $row['hotposts_content2'];
            $hotposts_content3 = $row['hotposts_content3'];
            $hotposts_content4 = $row['hotposts_content4'];
            $hotposts_content5 = $row['hotposts_content5'];


            $hotposts_image1 = $row['hotposts_image1'];
            $hotposts_image2 = $row['hotposts_image2'];
            $hotposts_image3 = $row['hotposts_image3'];
            $hotposts_image4 = $row['hotposts_image4'];
            $hotposts_image5 = $row['hotposts_image5'];


            // Hotposts File
            $hotposts_file1 = $row['hotposts_file1'];
            $hotposts_file2 = $row['hotposts_file2'];
            $hotposts_file3 = $row['hotposts_file3'];
            $hotposts_file4 = $row['hotposts_file4'];
            $hotposts_file5 = $row['hotposts_file5'];

            $hotposts_views_count = $row['hotposts_views_count'];
            $hotposts_tags = $row['hotposts_tags'];
            $hotposts_date = $row['hotposts_date'];

            echo "<tr>";
            ?>

            <?php
            echo "<td>{$hotposts_id}</td>";

            echo "<td>{$hotposts_title1}</td>";
            echo "<td><img width='100' height='150' src='../images/hotposts/$hotposts_image1' alt='image'></td>";
            echo "<td>{$hotposts_file1}</td>";
            echo "<td>{$hotposts_content1}</td>";

            echo "<td>{$hotposts_title2}</td>";
            echo "<td><img width='100' height='150' src='../images/hotposts/$hotposts_image2' alt='image'></td>";
            echo "<td>{$hotposts_file2}</td>";
            echo "<td>{$hotposts_content2}</td>";
            

            echo "<td>{$hotposts_title3}</td>";
            echo "<td><img width='100' height='150' src='../images/hotposts/$hotposts_image3' alt='image'></td>";
            echo "<td>{$hotposts_file3}</td>";
            echo "<td>{$hotposts_content3}</td>";
            

            echo "<td>{$hotposts_title4}</td>";
            echo "<td><img width='100' height='150' src='../images/hotposts/$hotposts_image4' alt='image'></td>";
            echo "<td>{$hotposts_file4}</td>";
            echo "<td>{$hotposts_content4}</td>";

            echo "<td>{$hotposts_title5}</td>";
            echo "<td><img width='100' height='150' src='../images/hotposts/$hotposts_image5' alt='image'></td>";
            echo "<td>{$hotposts_file5}</td>";
            echo "<td>{$hotposts_content5}</td>";


            echo "<td>{$hotposts_views_count}</td>";
 
            echo "<td>{$hotposts_tags}</td>";
            echo "<td>{$hotposts_date}</td>";


            echo "<td><a href='hotposts.php?source=edit_hotposts&hp_id={$hotposts_id}'>Edit</td>";
            echo "<td><a href='hotposts.php?delete={$hotposts_id}'>Delete</td>";
            echo "</tr>";

        }
        ?>

    </tbody>

</table>

</form>

<!-- Delete Hotposts -->
<?php
if(isset($_GET['delete'])){
    $the_hotposts_id = $_GET['delete'];
    $query = "DELETE FROM hotposts WHERE hotposts_id = {$the_hotposts_id}";
    $hotposts_delete_query = mysqli_query($connection, $query);

    if(!$hotposts_delete_query){
        die("Query Failed " . mysqli_error($connection));
    }

    header("location: hotposts.php");
}


?>
</div>