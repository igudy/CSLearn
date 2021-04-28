<?php
if(isset($_POST['create_top'])){
    // $top_id = escape($_POST['top_id']);
    $top_title = escape($_POST['top_title']);
    $top_content = escape($_POST['top_content']);
    

    $top_image1_temp = $_FILES['image1']['tmp_name'];
    $top_image1 = $_FILES['image1']['name'];
    move_uploaded_file($top_image1_temp, "../images/topImages/topImage1/$top_image1");


    $top_image2_temp = $_FILES['image2']['tmp_name'];
    $top_image2 = $_FILES['image2']['name'];
    move_uploaded_file($top_image2_temp, "../images/topImages/topImage2/$top_image2");

    $top_image3_temp = $_FILES['image3']['tmp_name'];
    $top_image3 = $_FILES['image3']['name'];
    move_uploaded_file($top_image3_temp, "../images/topImages/topImage3/$top_image3");


    $top_tags = escape($_POST['top_tags']);
    $top_date = escape(date('Y-m-d h:i:sa'));

    $query = "INSERT INTO top(top_title, top_content, top_image1, top_image2, top_image3, 
    top_tags, top_date) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($connection, $query);
    mysqli_stmt_bind_param($stmt, 'sssssss', $top_title, $top_content, $top_image1, $top_image2, $top_image3, $top_tags, $top_date);
    mysqli_stmt_execute($stmt);


    if(!$stmt){
        die("Query Failed " . mysqli_error($connection));
    }
}

    $the_top_id = escape(mysqli_insert_id($connection));
    echo "<p class='bg-success'>Post Updated. <a href='../top?t_id={$the_top_id}'>View Post</a> ||||||||";
    echo "<a href='top'>Edit More Posts</a></p>";
?>



<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="topTitle">Top Title</label>
        <input type="text" class="form-control" name="top_title">
    </div>



<!-- Add Top Category -->

<!-- <div class="form-group">
<label for="category">Categories</label>
<select name="post_category_id" id="post_category_id" value="" class="form-control"> -->
    <?php
//     $query = "SELECT * FROM categories";
//     $select_all_categories = mysqli_query($connection, $query);

//         while ($row = mysqli_fetch_assoc($select_all_categories)) {
//             $cat_id = $row['cat_id'];
//             $cat_title = $row['cat_title'];

//         echo "<option value='{$cat_id}'>{$cat_title}</option>";
// }
    ?>
<!-- </select>
</div> -->



    <div class="form-group">
        <label for="top_image1">Top Image1</label>
        <input type="file" name="image1">
    </div>


    <div class="form-group">
        <label for="top_image2">Top Image2</label>
        <input type="file" name="image2">
    </div>


    <div class="form-group">
        <label for="top_image3">Post Image</label>
        <input type="file" name="image3">
    </div>


    <div class="form-group">
        <label for="top_tags">Top Tags</label>
        <input type="text" class="form-control" name="top_tags">
    </div>

    <div class="form-group">
        <label for="top_content">Top Content</label>
        <textarea type="text" class="form-control" name="top_content"
        id="" cols="30" rows="10"></textarea>
    </div>

    <div class="form-group">
        <input class = "btn btn-primary" type = "submit" name ="create_top" value="Publish Top">
    </div>

</form>

