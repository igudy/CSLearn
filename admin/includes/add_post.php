<?php
if(isset($_POST['create_post'])){
    $post_user = escape($_POST['post_user']);
    $post_title = escape($_POST['post_title']);
    $post_category_id = escape($_POST['post_category_id']);
    $post_status = escape($_POST['post_status']);
    $post_type = escape($_POST['post_type']);


    $post_image_temp = $_FILES['image']['tmp_name'];
    $post_image = $_FILES['image']['name'];
    move_uploaded_file($post_image_temp, "../images/$post_image");


    //Update 1.1 Adding thread
    // Thread 1
    $post_image_thread1_temp = $_FILES['thread1']['tmp_name'];
    $post_image_thread1 = $_FILES['thread1']['name'];
    move_uploaded_file($post_image_thread1_temp, "../images/threads/$post_image_thread1");


    // Thread 2
    $post_image_thread2_temp = $_FILES['thread2']['tmp_name'];
    $post_image_thread2 = $_FILES['thread2']['name'];
    move_uploaded_file($post_image_thread2_temp, "../images/threads/$post_image_thread2");


    // Thread 3
    $post_image_thread3_temp = $_FILES['thread3']['tmp_name'];
    $post_image_thread3 = $_FILES['thread3']['name'];
    move_uploaded_file($post_image_thread3_temp, "../images/threads/$post_image_thread3");


    // Videos - Tutorials
    $post_video_temp = $_FILES['video']['tmp_name'];
    $post_video = $_FILES['video']['name'];
    move_uploaded_file($post_video_temp, "../$post_video");

    $post_video_thumbnail_temp = $_FILES['video_thumbnail']['tmp_name'];
    $post_video_thumbnail = $_FILES['video_thumbnail']['name'];
    move_uploaded_file($post_video_thumbnail_temp, "../videos/videos_thumbnail/$post_video_thumbnail");


    //PDF's
    $post_pdf_temp = $_FILES['pdf']['tmp_name'];
    $post_pdf = $_FILES['pdf']['name'];
    move_uploaded_file($post_pdf_temp, "../$post_pdf");

    $post_pdf_thumbnail_temp = $_FILES['pdf_thumbnail']['tmp_name'];
    $post_pdf_thumbnail = $_FILES['pdf_thumbnail']['name'];
    move_uploaded_file($post_pdf_thumbnail_temp, "../pdf/pdf_thumbnail/$post_pdf_thumbnail");

    //Remember to always increase development upload size in php.ini
    //php development and php production file
    //C/Xampp/phpini
    //upload_max_filesize 
    //memory_limit  
    //max_execution_time 
    //post_max_size


    $post_audio_temp = $_FILES['audio']['tmp_name'];
    $post_audio = $_FILES['audio']['name'];
    move_uploaded_file($post_audio_temp, "../$post_audio");


    $post_audio_thumbnail_temp = $_FILES['audio_thumbnail']['tmp_name'];
    $post_audio_thumbnail = $_FILES['audio_thumbnail']['name'];
    move_uploaded_file($post_audio_thumbnail_temp, "../audio/audio_thumbnail/$post_audio_thumbnail");


    $post_tags = escape($_POST['post_tags']);
    $post_content = escape($_POST['post_content']);
    $post_date = escape(date('Y-m-d h:i:sa'));
    

    $query = "INSERT INTO posts(post_user, post_title, post_category_id, post_status, post_video, post_audio, post_audio_thumbnail, post_video_thumbnail, post_pdf, post_pdf_thumbnail, post_type, post_image, thread1, thread2, thread3, 
    post_tags, post_content, post_date) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($connection, $query);
    mysqli_stmt_bind_param($stmt, 'ssisssssssssssssss', $post_user, $post_title, $post_category_id, $post_status, $post_video, $post_audio, $post_audio_thumbnail, $post_video_thumbnail, $post_pdf, $post_pdf_thumbnail, $post_type, $post_image, $post_image_thread1, $post_image_thread2, $post_image_thread3, $post_tags, $post_content, $post_date);
    mysqli_stmt_execute($stmt);


    if(!$stmt)
        {
            die("Query Failed " . mysqli_error($stmt));
        }
    }

    $the_post_id = escape(mysqli_insert_id($connection));
    echo "<p class='bg-success'>Post Updated. <a href='../post?p_id={$the_post_id}'>View Post</a> or <a href='posts'>Edit More Posts</a></p>";
?>



<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="title">Post Title</label>
        <input type="text" class="form-control" name="post_title">
    </div>


<div class="form-group">
<label for="category">Categories</label>
<select name="post_category_id" id="post_category_id" value="" class="form-control">
    <?php
    $query = "SELECT * FROM categories";
    $select_all_categories = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($select_all_categories))
    {
        $cat_id = $row['cat_id'];
        $cat_title = $row['cat_title'];

        echo "<option value='{$cat_id}'>{$cat_title}</option>";
    }
    ?>
</select>
</div>


    <div class="form-group">
    <label for="users">Users</label>
    <input type="text" name="post_user" class="form-control">
    </div>

<div class="form-group">
        <label for="post_status" >Post Status</label>
        <select name="post_status" class="form-control">
            <option value="published">Select Options</option>
            <option value="draft">Draft</option>
            <option value="published">Publish</option>
        </select>
 </div>


 <div class="form-group">
        <label for="post_type" >Post Type</label>

        <select name="post_type" class="form-control">
            <option value="image">Select Options</option>
            <option value="image">Image</option>
            <option value="thread">Thread</option>
            <option value="audio">Audio</option>
            <option value="pdf">PDF</option>
            <option value="video">Video</option>
        </select>
 </div>  
  

    <h1>Single Image</h1>
    <div class="form-group">
        <label for="post_image">Post Image</label>
        <input type="file" name="image">
    </div>


    <h1>Thread</h1>
    <!-- Adding 3 threads -->
    <div class="form-group">
        <label for="post_image_thread1">Thread 1</label>
        <input type="file" name="thread1">
    </div>

    <div class="form-group">
        <label for="post_image_thread2">Thread 2</label>
        <input type="file" name="thread2">
    </div>

    <div class="form-group">
        <label for="post_image_thread3">Thread 3</label>
        <input type="file" name="thread3">
    </div>
    <!-- End of thread -->

    <!-- Audio -->
    <h1>Audio</h1>
    <div class="form-group">
        <label for="post_audio">Post Audio</label>
        <input type="file" name="audio">
    </div>

    <div class="form-group">
        <label for="post_audio_thumbnail">Post Audio Thumbnail</label>
        <input type="file" name="audio_thumbnail">
    </div>


    <!-- Videos -->
    <h1>Videos</h1>
    <div class="form-group">
        <label for="post_video">Post Video</label>
        <input type="file" name="video">
    </div>

    <div class="form-group">
        <label for="post_video_thumbnail">Post Video Thumbnail</label>
        <input type="file" name="video_thumbnail">
    </div>


    <!-- PDF -->
    <h1>PDF</h1>
    <div class="form-group">
        <label for="post_pdf">Post PDF</label>
        <input type="file" name="pdf">
    </div>

    <div class="form-group">
        <label for="post_pdf_thumbnail">Post PDF Thumbnail</label>
        <input type="file" name="pdf_thumbnail">
    </div>


    <div class="form-group">
        <label for="post_tags">Post Tags</label>
        <input type="text" class="form-control" name="post_tags">
    </div>

    <div class="form-group">
        <label for="post_content">Post Content</label>
        <textarea type="text" class="form-control" name="post_content"
        id="" cols="30" rows="10"></textarea>
    </div>

    <div class="form-group">
        <input class = "btn btn-primary" type = "submit" name ="create_post" value="Publish Post">
    </div>

</form>