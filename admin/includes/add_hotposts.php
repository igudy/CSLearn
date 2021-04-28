<?php
if(isset($_POST['create_hotposts']))
{
    $hotposts_id     = $_POST['hotposts_id'];
    $hotposts_title1 = $_POST['hotposts_title1'];
    $hotposts_title2 = $_POST['hotposts_title2'];
    $hotposts_title3 = $_POST['hotposts_title3'];
    $hotposts_title4 = $_POST['hotposts_title4'];
    $hotposts_title5 = $_POST['hotposts_title5'];
    
    $hotposts_content1 = $_POST['hotposts_content1'];
    $hotposts_content2 = $_POST['hotposts_content2'];
    $hotposts_content3 = $_POST['hotposts_content3'];
    $hotposts_content4 = $_POST['hotposts_content4'];
    $hotposts_content5 = $_POST['hotposts_content5'];
    

    $hotposts_image1_temp = $_FILES['hotposts_image1']['tmp_name'];
    $hotposts_image1 = $_FILES['hotposts_image1']['name'];
    move_uploaded_file($hotposts_image1_temp, "../images/hotposts/$hotposts_image1");

    $hotposts_image2_temp = $_FILES['hotposts_image2']['tmp_name'];
    $hotposts_image2 = $_FILES['hotposts_image2']['name'];
    move_uploaded_file($hotposts_image2_temp, "../images/hotposts/$hotposts_image2");

    $hotposts_image3_temp = $_FILES['hotposts_image3']['tmp_name'];
    $hotposts_image3 = $_FILES['hotposts_image3']['name'];
    move_uploaded_file($hotposts_image3_temp,  "../images/hotposts/$hotposts_image3");

    $hotposts_image4_temp = $_FILES['hotposts_image4']['tmp_name'];
    $hotposts_image4 = $_FILES['hotposts_image4']['name'];
    move_uploaded_file($hotposts_image4_temp,  "../images/hotposts/$hotposts_image4");

    $hotposts_image5_temp = $_FILES['hotposts_image5']['tmp_name'];
    $hotposts_image5 = $_FILES['hotposts_image5']['name'];
    move_uploaded_file($hotposts_image5_temp,  "../images/hotposts/$hotposts_image5");


    // Hotposts File
    $hotposts_file1_temp = $_FILES['hotposts_file1']['tmp_name'];
    $hotposts_file1 = $_FILES['hotposts_file1']['name'];
    move_uploaded_file($hotposts_file1_temp, "../$hotposts_file1");

    $hotposts_file2_temp = $_FILES['hotposts_file2']['tmp_name'];
    $hotposts_file2 = $_FILES['hotposts_file2']['name'];
    move_uploaded_file($hotposts_file2_temp, "../$hotposts_file2");

    $hotposts_file3_temp = $_FILES['hotposts_file3']['tmp_name'];
    $hotposts_file3 = $_FILES['hotposts_file3']['name'];
    move_uploaded_file($hotposts_file3_temp,  "../$hotposts_file3");

    $hotposts_file4_temp = $_FILES['hotposts_file4']['tmp_name'];
    $hotposts_file4 = $_FILES['hotposts_file4']['name'];
    move_uploaded_file($hotposts_file4_temp,  "../$hotposts_file4");

    $hotposts_file5_temp = $_FILES['hotposts_file5']['tmp_name'];
    $hotposts_file5 = $_FILES['hotposts_file5']['name'];
    move_uploaded_file($hotposts_file5_temp,  "../$hotposts_file5");

    $hotposts_tags = escape($_POST['hotposts_tags']);
    $hotposts_date = escape(date('Y-m-d h:i:sa'));

    $query = "INSERT INTO hotposts(hotposts_title1, hotposts_title2, hotposts_title3, hotposts_title4, hotposts_title5, hotposts_content1, hotposts_content2, hotposts_content3, hotposts_content4, hotposts_content5, hotposts_image1, hotposts_image2, hotposts_image3, hotposts_image4, hotposts_image5, hotposts_file1, hotposts_file2, hotposts_file3, hotposts_file4, hotposts_file5, hotposts_tags, hotposts_date) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($connection, $query);
    mysqli_stmt_bind_param($stmt, 'ssssssssssssssssssssss', $hotposts_title1, $hotposts_title2, $hotposts_title3, $hotposts_title4, $hotposts_title5, $hotposts_content1, $hotposts_content2, $hotposts_content3, $hotposts_content4, $hotposts_content5, $hotposts_image1, $hotposts_image2, $hotposts_image3, $hotposts_image4, $hotposts_image5, $hotposts_file1, $hotposts_file2, $hotposts_file3, $hotposts_file4, $hotposts_file5, $hotposts_tags, $hotposts_date);
    mysqli_stmt_execute($stmt);


    if(!$stmt){
        die("Query Failed " . mysqli_error($connection));
    }
}

    $the_hotposts_id = escape(mysqli_insert_id($connection));
    echo "<p class='bg-success'>Post Updated. <a href='../hotposts_post?hp_id=$hotposts_id'>View Post</a> ||||||||";
    echo "<a href='hotposts'>Edit More Hot Posts</a></p>";
?>



<form action="" method="post" enctype="multipart/form-data">

    <!-- Hotpost 1 -->
    <div class="form-group">
        <label for="hotposts_title1">Hotposts Title</label>
        <input type="text" class="form-control" name="hotposts_title1">
    </div>

    <div class="form-group">
        <label for="hotposts_image1">Hotposts Image1</label>
        <input type="file" name="hotposts_image1">
    </div>

    <div class="form-group">
        <label for="hotposts_file1">Hotposts File1</label>
        <input type="file" name="hotposts_file1">
    </div>

    <div class="form-group">
        <label for="hotposts_content1">Hotposts Content 1</label>
        <textarea type="text" class="form-control" name="hotposts_content1"
        id="" cols="30" rows="10"></textarea>
    </div>

    <!-- Hotposts 2 -->

    <div class="form-group">
        <label for="hotposts_title2">Hotposts Title 2</label>
        <input type="text" class="form-control" name="hotposts_title2">
    </div>

    <div class="form-group">
        <label for="hotposts_image2">Hotposts Image2</label>
        <input type="file" name="hotposts_image2">
    </div>

    <div class="form-group">
        <label for="hotposts_file2">Hotposts File2</label>
        <input type="file" name="hotposts_file2">
    </div>

    <div class="form-group">
        <label for="hotposts_content2">Hotposts Content 2</label>
        <textarea type="text" class="form-control" name="hotposts_content2"
        id="" cols="30" rows="10"></textarea>
    </div>

    <!-- Hotposts 3  -->

    <div class="form-group">
        <label for="hotposts_title3">Hotposts Title 3</label>
        <input type="text" class="form-control" name="hotposts_title3">
    </div>

    <div class="form-group">
        <label for="hotposts_image3">Hotposts Image3</label>
        <input type="file" name="hotposts_image3">
    </div>

    <div class="form-group">
        <label for="hotposts_file3">Hotposts File3</label>
        <input type="file" name="hotposts_file3">
    </div>

    <div class="form-group">
        <label for="hotposts_content3">Hotposts Content 3</label>
        <textarea type="text" class="form-control" name="hotposts_content3"
        id="" cols="30" rows="10"></textarea>
    </div>

    <!-- Hotposts 4 -->

    <div class="form-group">
        <label for="hotposts_title4">Hotposts Title 4</label>
        <input type="text" class="form-control" name="hotposts_title4">
    </div>

    <div class="form-group">
        <label for="hotposts_image4">Hotposts Image4</label>
        <input type="file" name="hotposts_image4">
    </div>

    <div class="form-group">
        <label for="hotposts_file4">Hotposts File4</label>
        <input type="file" name="hotposts_file4">
    </div>

    <div class="form-group">
        <label for="hotposts_content4">Hotposts Content 4</label>
        <textarea type="text" class="form-control" name="hotposts_content4"
        id="" cols="30" rows="10"></textarea>
    </div>

    <!-- Hotposts 5 -->

    <div class="form-group">
        <label for="hotposts_title5">Hotposts Title5</label>
        <input type="text" class="form-control" name="hotposts_title5">
    </div>


    <div class="form-group">
        <label for="hotposts_image5">Hotposts Image5</label>
        <input type="file" name="hotposts_image5">
    </div>

    <div class="form-group">
        <label for="hotposts_file5">Hotposts File5</label>
        <input type="file" name="hotposts_file5">
    </div>

    <div class="form-group">
        <label for="hotposts_content5">Hotposts Content5</label>
        <textarea type="text" class="form-control" name="hotposts_content5"
        id="" cols="30" rows="10"></textarea>
    </div>

    <div class="form-group">
        <label for="hotposts_tags">Hotposts Tags</label>
        <input type="text" class="form-control" name="hotposts_tags">
    </div>

    <div class="form-group">
        <input class = "btn btn-primary" type = "submit" name ="create_hotposts" value="Publish Hotpost">
    </div>

</form>

