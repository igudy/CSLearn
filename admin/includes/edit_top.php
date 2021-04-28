<?php
	if(isset($_GET['t_id'])){
		$the_top_id = escape($_GET['t_id']);
	}

	$query = "SELECT * FROM top WHERE top_id = $the_top_id  ";
	$select_all_top_id = mysqli_query($connection, $query);

	while($row = mysqli_fetch_assoc($select_all_top_id)){
			$top_id 			= $row['top_id'];
			$top_title 			= $row['top_title'];
			$top_content 		= $row['top_content'];
			$top_image1 		= $row['top_image1'];
			$top_image2 		= $row['top_image2'];
			$top_image3 		= $row['top_image3'];
			$top_tags			= $row['top_tags'];
			// $top_date 			= $row['top_date'];
			
		}



// UPDATE THE POST
	if (isset($_POST['update_top'])) {

		$top_title           =  escape($_POST['top_title']);
        $top_content          =  escape($_POST['top_content']);
        
        $top_image1          =  $_FILES['top_image1']['name'];
        $top_image1_temp     =  $_FILES['top_image1']['tmp_name'];
        $top_image2          =  $_FILES['top_image2']['name'];
        $top_image2_temp     =  $_FILES['top_image2']['tmp_name'];
        $top_image3          =  $_FILES['top_image3']['name'];
        $top_image3_temp     =  $_FILES['top_image3']['tmp_name'];
        $top_tags           =  escape($_POST['top_tags']);
        
        move_uploaded_file($top_image1_temp, "../images/topImages/topImage1/$top_image1"); 
        move_uploaded_file($top_image2_temp, "../images/topImages/topImage2/$top_image2"); 
        move_uploaded_file($top_image3_temp, "../images/topImages/topImage3/$top_image3"); 

        if(empty($top_image1 || $top_image2 || $top_image3)) {
        $query = "SELECT * FROM top WHERE top_id = $the_top_id ";
        $top_images = mysqli_query($connection, $query);
            
        while($row = mysqli_fetch_array($top_images)) {
           $top_image1 = $row['top_image1'];
           $top_image2 = $row['top_image2'];
           $top_image3 = $row['top_image3'];
        }
		}
        $top_title = mysqli_real_escape_string($connection, $top_title);


		$query = "UPDATE top SET top_title=?, top_content=?, top_image1=?, top_image2=?, top_image3=?, top_tags=? WHERE top_id = ?";
		$stmt = mysqli_prepare($connection, $query);
		mysqli_stmt_bind_param($stmt, 'ssssssi', $top_title, $top_content, $top_image1, $top_image2, $top_image3, $top_tags, $the_top_id);
		mysqli_stmt_execute($stmt);

		if(!$stmt){
		die("QUERY FAILED " . mysqli_error($connection));
		}
        

    	echo "<p class='bg-success'>Top Updated. <a href='../top?t_id={$the_top_id}'> View Post</a> or <a href='top'>Edit More Top</a></p>";





	}
	?>

<form action="" method="post" enctype="multipart/form-data">

<div class="form-group">
    <label for="top_title">Top Title</label>
    <input value="<?php echo $top_title; ?>" type="text" class="form-control" name="top_title">
</div>



 	<div class="form-group">
       <img width="100" src="../images/topImages/topImage1/<?php echo $top_image1; ?>" alt="">
       <input  type="file" name="top_image1">
     </div>

     <div class="form-group">
       <img width="100" src="../images/topImages/topImage2/<?php echo $top_image2; ?>" alt="">
       <input  type="file" name="top_image2">
     </div>

      <div class="form-group">
       <img width="100" src="../images/topImages/topImage3/<?php echo $top_image3; ?>" alt="">
       <input  type="file" name="top_image3">
      </div>


	<div class="form-group">
	    <label for="top_tags">Top Tags</label>
	    <input type="text" value="<?php echo $top_tags; ?>" class="form-control" name="top_tags">
	</div>

	<div class="form-group">
	    <label for="top_content">Top Content</label>
	    <textarea type="text"  class="form-control"  value="" name="top_content"
	    id="" cols="30" rows="10" > <?php echo $top_content; ?></textarea>
	</div>

	<div class="form-group">
	    <input class = "btn btn-primary" type = "submit" name ="update_top" value="Update Top">
	</div>
</form>
