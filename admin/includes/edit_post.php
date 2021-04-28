<?php
	if(isset($_GET['p_id'])){
		$the_post_id = escape($_GET['p_id']);
	}

	$query = "SELECT * FROM posts WHERE post_id = $the_post_id  ";
	$select_all_post_id = mysqli_query($connection, $query);

	while($row = mysqli_fetch_assoc($select_all_post_id)){
			$post_id 			= $row['post_id'];
			$post_user 			= $row['post_user'];
			$post_title 		= $row['post_title'];
			$post_category_id 	= $row['post_category_id'];
			$post_status 		= $row['post_status'];
			$post_image 		= $row['post_image'];
			$post_tags 			= $row['post_tags'];
			$post_type 			= $row['post_type'];
			$post_video 		= $row['post_video'];

            $post_image_thread1 = $row['thread1'];
            $post_image_thread2 = $row['thread2'];
            $post_image_thread3 = $row['thread3'];


			$post_video_thumbnail 		= $row['post_video_thumbnail'];
			$post_music 				= $row['post_music'];
			$post_music_thumbnail 		= $row['post_music_thumbnail'];

			$post_movies 				= $row['post_movies'];
			$post_movies_thumbnail 		= $row['post_movies_thumbnail'];
			$post_content 				= $row['post_content'];
			$post_date 					= $row['post_date'];
			$post_type 					= $row['post_type'];
		}


// UPDATE THE POST
	if (isset($_POST['update_post'])) {

		$post_user           =  escape($_POST['post_user']);
        $post_title          =  escape($_POST['post_title']);
        $post_category_id    =  escape($_POST['post_category']);
        $post_status         =  escape($_POST['post_status']);

        $post_image          =  $_FILES['image']['name'];
        $post_image_temp     =  $_FILES['image']['tmp_name'];
        
        $post_music          =  $_FILES['music']['name'];
        $post_music_temp     =  $_FILES['music']['tmp_name'];
        
        $post_video          =  $_FILES['video']['name'];
        $post_video_temp     =  $_FILES['video']['tmp_name'];

        $post_movies          =  $_FILES['movies']['name'];
        $post_movies_temp     =  $_FILES['movies']['tmp_name'];


	// Thread
	    // Thread 1
	    $post_image_thread1 = $_FILES['thread1']['name'];
	    $post_image_thread1_temp = $_FILES['thread1']['tmp_name'];
	    move_uploaded_file($post_image_thread1_temp, "../images/threads/$post_image_thread1");


	    // Thread 2
	    $post_image_thread2 = $_FILES['thread2']['name'];
	    $post_image_thread2_temp = $_FILES['thread2']['tmp_name'];
	    move_uploaded_file($post_image_thread2_temp, "../images/threads/$post_image_thread2");


	    // Thread 3
	    $post_image_thread3 = $_FILES['thread3']['name'];
	    $post_image_thread3_temp = $_FILES['thread3']['tmp_name'];
	    move_uploaded_file($post_image_thread3_temp, "../images/threads/$post_image_thread3");



        $post_video_thumbnail          =  $_FILES['video_thumbnail']['name'];
        $post_video_thumbnail_temp     =  $_FILES['video_thumbnail']['tmp_name'];
        
        $post_music_thumbnail          =  $_FILES['music_thumbnail']['name'];
        $post_music_thumbnail_temp     =  $_FILES['music_thumbnail']['tmp_name'];

        $post_movies_thumbnail          =  $_FILES['movies_thumbnail']['name'];
        $post_movies_thumbnail_temp     =  $_FILES['movies_thumbnail']['tmp_name'];

        $post_tags           =  escape($_POST['post_tags']);
        $post_content        =  escape($_POST['post_content']);
        $post_type        	 =  escape($_POST['post_type']);


        move_uploaded_file($post_image_temp, "../images/$post_image"); 

        move_uploaded_file($post_music_temp, "$post_music"); 
        move_uploaded_file($post_video_temp, "$post_video"); 
        move_uploaded_file($post_movies_temp, "$post_movies");


        move_uploaded_file($post_video_thumbnail_temp, "../videos/videos_thumbnail/$post_video_thumbnail"); 
        move_uploaded_file($post_music_thumbnail_temp, "../music/music_thumbnail/$post_music_thumbnail"); 
        move_uploaded_file($post_movies_thumbnail_temp, "../movies/movies_thumbnail/$post_movies_thumbnail"); 
        
        if(empty($post_image) || empty($post_image_thread1) || empty($post_image_thread2) || empty($post_image_thread3) || empty($post_video_thumbnail) || empty($post_music_thumbnail)) {
        
        $query = "SELECT * FROM posts WHERE post_id = $the_post_id ";
        $select_image = mysqli_query($connection, $query);
            
        while($row = mysqli_fetch_array($select_image)) {
           $post_image = $row['post_image'];

           // Threads
           $post_image_thread1 = $row['thread1'];
           $post_image_thread2 = $row['thread2'];
           $post_image_thread3 = $row['thread3'];

           // Music and video
           	$post_video_thumbnail 		= $row['post_video_thumbnail'];
           	$post_movies_thumbnail 		= $row['post_movies_thumbnail'];
			$post_music_thumbnail 		= $row['post_music_thumbnail'];
        	}
		}
        $post_title = mysqli_real_escape_string($connection, $post_title);

		$query = "UPDATE posts SET post_title=?, post_category_id=?, post_date=?, post_user=?, post_type=?, post_music=?, post_video=?, post_movies=?, post_status=?, post_tags=?, post_content=?, post_image=?, thread1=?, thread2=?, thread3=?, post_music_thumbnail=?, post_video_thumbnail=?, post_movies_thumbnail=? WHERE post_id = ?";
		$stmt = mysqli_prepare($connection, $query);
		mysqli_stmt_bind_param($stmt, 'ssssssssssssssssssi', $post_title, $post_category_id, $post_date, $post_user, $post_type, $post_music, $post_video, $post_movies, $post_status, $post_tags, $post_content, $post_image, $post_image_thread1, $post_image_thread2, $post_image_thread3, $post_music_thumbnail, $post_video_thumbnail, $post_movies_thumbnail, $the_post_id);
		mysqli_stmt_execute($stmt);

		if(!$stmt){
		die("QUERY FAILED " . mysqli_error($connection));
		}
        
    	echo "<p class='bg-success'>Post Updated. <a href='../post?p_id={$the_post_id}'>View Post</a> or <a href='posts'>Edit More Posts</a></p>";

	}
	?>

<form action="" method="post" enctype="multipart/form-data">

<div class="form-group">
    <label for="title">Post Title</label>
    <input value="<?php echo $post_title; ?>" type="text" class="form-control" name="post_title">
</div>



 <div class="form-group">
       <label for="categories">Categories</label>
       <select name="post_category" id="">
           
      <?php
        $query = "SELECT * FROM categories ";
        $select_categories = mysqli_query($connection,$query);
        
        while($row = mysqli_fetch_assoc($select_categories )) {
        $cat_id = $row['cat_id'];
        $cat_title = $row['cat_title'];

        if($cat_id == $post_category_id){
		echo "<option selected value='{$cat_id}'>{$cat_title}</option>";
        }
        else{
        	echo "<option value='{$cat_id}'>{$cat_title}</option>";
        }
		

        }
?>
</select>
</div>


<div class="form-group">
	<label for="users">Users</label>
	<input value="<?php echo $post_user; ?>" type="text" class="form-control" name="post_user">
	</div>

	<div class="form-group">
	    <label for="post_status" >Post Status</label>
	    <select class="form-control" name="post_status">
	    	<option value="<?php echo $post_status; ?>"><?php echo $post_status; ?></option>
	    	<?php
	    		if($post_status == 'published'){
	    			echo "<option value='draft'>Draft</option>";
	    		}
	    		else{
	    			echo "<option value='published'>Publish</option>"; 
	    		}

	    	?>
	    </select>

	    <!-- <input " type="text" class="form-control" name="post_status"> -->


	</div>    


	<div class="form-group">
	    <label for="post_type" >Post Type</label>
	    <select class="form-control" name="post_type">
	    	<option value="<?php echo $post_type; ?>"><?php echo $post_type; ?></option>
	    	<?php
	    		if($post_type == 'image'){
	    			echo "<option value='video'>Video</option>";
	    			echo "<option value='music'>Music</option>";
	    			echo "<option value='thread'>Thread</option>";
	    			echo "<option value='movies'>Movies</option>";

	    		}
	    		else if($post_type == 'video'){
	    			echo "<option value='music'>Music</option>"; 
	    			echo "<option value='image'>Image</option>"; 
	    			echo "<option value='thread'>thread</option>"; 
	    			echo "<option value='movies'>Movies</option>"; 
	    		}

	    		else if($post_type == 'thread'){
	    			echo "<option value='music'>Music</option>"; 
	    			echo "<option value='image'>Image</option>"; 
	    			echo "<option value='video'>Video</option>"; 
	    			echo "<option value='movies'>Movies</option>"; 
	    		}
	    		else if($post_type == 'movies'){
	    			echo "<option value='music'>Music</option>"; 
	    			echo "<option value='image'>Image</option>"; 
	    			echo "<option value='video'>Video</option>"; 
	    			echo "<option value='thread'>Thread</option>"; 
	    		}
	    		else{
	    			echo "<option value='music'>Music</option>";
	    			echo "<option value='video'>Video</option>"; 
	    			echo "<option value='image'>Image</option>";
	    			echo "<option value='movies'>Movies</option>";
	    		}

	    	?>
	    </select>

	</div>    

    <h1>Single Image</h1>
 	<div class="form-group">
 		<label>Post Image</label>
       <img width="100" src="../images/<?php echo $post_image; ?>" alt="">
       <input  type="file" name="image">
     </div>


    <h1>Thread</h1>
    <!-- Adding 3 threads -->
    <div class="form-group">
        <label for="post_image_thread1">Thread 1</label>
        <img width="100" src="../images/threads/<?php echo $post_image_thread1; ?>" alt="">
        <input type="file" name="thread1">
    </div>

    <div class="form-group">
        <label for="post_image_thread2">Thread 2</label>
        <img width="100" src="../images/threads/<?php echo $post_image_thread2; ?>" alt="">
        <input type="file" name="thread2">
    </div>

    <div class="form-group">
        <label for="post_image_thread3">Thread 3</label>
        <img width="100" src="../images/threads/<?php echo $post_image_thread3; ?>" alt="">
        <input type="file" name="thread3">
    </div>

    <!-- End of thread -->



    <h1>Music</h1>
     <div class="form-group">
     	<label for="post_music">Post Music</label>
        <input  type="file" name="music">
     </div>

     <div class="form-group">
     	<label for="post_music_thumbnail">Post Music Thumbnail</label>
     	<img width="100" src="../music/music_thumbnail/<?php echo $post_music_thumbnail; ?>" alt="">
        <input  type="file" name="music_thumbnail">
     </div>


     <!-- Vidoes -->
    <h1>Videos</h1>
      <div class="form-group">
      	<label for="post_video">Post Video</label>
        <input  type="file" name="video">
     </div>

     <div class="form-group">
      	<label for="post_video_thumbnail">Post Video Thumbnail</label>
		<img width="100" src="../videos/videos_thumbnail/<?php echo $post_video_thumbnail; ?>" alt="">
        <input  type="file" name="video_thumbnail">
     </div>


     <!-- Movies -->
      <h1>Movies</h1>
      <div class="form-group">
      	<label for="post_movies">Post Movies</label>
        <input  type="file" name="movies">
     </div>

     <div class="form-group">
      	<label for="post_movies_thumbnail">Post Movies Thumbnail</label>
		<img width="100" src="../movies/movies_thumbnail/<?php echo $post_movies_thumbnail; ?>" alt="">
        <input  type="file" name="movies_thumbnail">
     </div>



	<div class="form-group">
	    <label for="post_tags">Post Tags</label>
	    <input type="text" value="<?php echo $post_tags; ?>" class="form-control" name="post_tags">
	</div>

	<div class="form-group">
	    <label for="post_content">Post Content</label>
	    <textarea type="text"  class="form-control"  value="" name="post_content"
	    id="" cols="30" rows="10" > <?php echo $post_content; ?></textarea>
	</div>

	<div class="form-group">
	    <input class = "btn btn-primary" type = "submit" name ="update_post" value="Update Post">
	</div>
</form>