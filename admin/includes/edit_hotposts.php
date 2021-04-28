<?php
	if(isset($_GET['hp_id'])){
		$the_hotposts_id = escape($_GET['hp_id']);
	}

	$query = "SELECT * FROM hotposts WHERE hotposts_id = $the_hotposts_id  ";
	$select_all_hotposts_id = mysqli_query($connection, $query);

	while($row = mysqli_fetch_assoc($select_all_hotposts_id)){
			$hotposts_id 		= $row['hotposts_id'];
			
			$hotposts_title1 			= $row['hotposts_title1'];
			$hotposts_title2			= $row['hotposts_title2'];
			$hotposts_title3 			= $row['hotposts_title3'];
			$hotposts_title4 			= $row['hotposts_title4'];
			$hotposts_title5 			= $row['hotposts_title5'];
			
			$hotposts_content1 		= $row['hotposts_content1'];
			$hotposts_content2 		= $row['hotposts_content2'];
			$hotposts_content3 		= $row['hotposts_content3'];
			$hotposts_content4 		= $row['hotposts_content4'];
			$hotposts_content5 		= $row['hotposts_content5'];
			

			$hotposts_image1 		= $row['hotposts_image1'];
			$hotposts_image2 		= $row['hotposts_image2'];
			$hotposts_image3 		= $row['hotposts_image3'];
			$hotposts_image4 		= $row['hotposts_image4'];
			$hotposts_image5 		= $row['hotposts_image5'];

			$hotposts_file1 		= $row['hotposts_file1'];
			$hotposts_file2 		= $row['hotposts_file2'];
			$hotposts_file3 		= $row['hotposts_file3'];
			$hotposts_file4 		= $row['hotposts_file4'];
			$hotposts_file5 		= $row['hotposts_file5'];

			$hotposts_tags			= $row['hotposts_tags'];
			
		}



// UPDATE THE POST
	if (isset($_POST['update_hotposts'])) {

		$hotposts_title1        =  $_POST['hotposts_title1'];
		$hotposts_title2        =  $_POST['hotposts_title2'];
		$hotposts_title3        =  $_POST['hotposts_title3'];
		$hotposts_title4        =  $_POST['hotposts_title4'];
		$hotposts_title5        =  $_POST['hotposts_title5'];


        $hotposts_content1      = $_POST['hotposts_content1'];
        $hotposts_content2      = $_POST['hotposts_content2'];
        $hotposts_content3      = $_POST['hotposts_content3'];
        $hotposts_content4      = $_POST['hotposts_content4'];
        $hotposts_content5      = $_POST['hotposts_content5'];
        
        $hotposts_image1          =  $_FILES['hotposts_image1']['name'];
        $hotposts_image1_temp     =  $_FILES['hotposts_image1']['tmp_name'];
        
        $hotposts_image2          =  $_FILES['hotposts_image2']['name'];
        $hotposts_image2_temp     =  $_FILES['hotposts_image2']['tmp_name'];
        
        $hotposts_image3          =  $_FILES['hotposts_image3']['name'];
        $hotposts_image3_temp     =  $_FILES['hotposts_image3']['tmp_name'];

        $hotposts_image4          =  $_FILES['hotposts_image4']['name'];
        $hotposts_image4_temp     =  $_FILES['hotposts_image4']['tmp_name'];
        
        $hotposts_image5          =  $_FILES['hotposts_image5']['name'];
        $hotposts_image5_temp     =  $_FILES['hotposts_image5']['tmp_name'];


		// Hotposts File 
        $hotposts_file1          =  $_FILES['hotposts_file1']['name'];
        $hotposts_file1_temp     =  $_FILES['hotposts_file1']['tmp_name'];
        
        $hotposts_file2          =  $_FILES['hotposts_file2']['name'];
        $hotposts_file2_temp     =  $_FILES['hotposts_file2']['tmp_name'];
        
        $hotposts_file3          =  $_FILES['hotposts_file3']['name'];
        $hotposts_file3_temp     =  $_FILES['hotposts_file3']['tmp_name'];

        $hotposts_file4          =  $_FILES['hotposts_file4']['name'];
        $hotposts_file4_temp     =  $_FILES['hotposts_file4']['tmp_name'];
        
        $hotposts_file5          =  $_FILES['hotposts_file5']['name'];
        $hotposts_file5_temp     =  $_FILES['hotposts_file5']['tmp_name'];


        $hotposts_tags           =  escape($_POST['hotposts_tags']);

        
        move_uploaded_file($hotposts_image1_temp, "../images/hotposts/$hotposts_image1"); 
        move_uploaded_file($hotposts_image2_temp, "../images/hotposts/$hotposts_image2"); 
        move_uploaded_file($hotposts_image3_temp, "../images/hotposts/$hotposts_image3"); 
        move_uploaded_file($hotposts_image4_temp, "../images/hotposts/$hotposts_image4"); 
        move_uploaded_file($hotposts_image5_temp, "../images/hotposts/$hotposts_image5"); 

        // Hotposts File
        move_uploaded_file($hotposts_file1_temp, "$hotposts_file1"); 
        move_uploaded_file($hotposts_file2_temp, "$hotposts_file2"); 
        move_uploaded_file($hotposts_file3_temp, "$hotposts_file3"); 
        move_uploaded_file($hotposts_file4_temp, "$hotposts_file4"); 
        move_uploaded_file($hotposts_file5_temp, "$hotposts_file5"); 


        if(empty($hotposts_image1 || $hotposts_image2 || $hotposts_image3 || $hotposts_image4 || $hotposts_image5 || $hotposts_file1
        	|| $hotposts_file2 || $hotposts_file3 || $hotposts_file4 || $hotposts_file5))
        {
        
        $query = "SELECT * FROM hotposts WHERE hotposts_id = $the_hotposts_id ";
        $hotposts_images = mysqli_query($connection, $query);
            
        while($row = mysqli_fetch_array($hotposts_images)) {
           $hotposts_image1 = $row['hotposts_image1'];
           $hotposts_image2 = $row['hotposts_image2'];
           $hotposts_image3 = $row['hotposts_image3'];
           $hotposts_image4 = $row['hotposts_image4'];
           $hotposts_image5 = $row['hotposts_image5'];

           $hotposts_file1 = $row['hotposts_file1'];
           $hotposts_file2 = $row['hotposts_file2'];
           $hotposts_file3 = $row['hotposts_file3'];
           $hotposts_file4 = $row['hotposts_file4'];
           $hotposts_file5 = $row['hotposts_file5'];
           }
		}
        $hotposts_title1 = mysqli_real_escape_string($connection, $hotposts_title1);
        $hotposts_title2 = mysqli_real_escape_string($connection, $hotposts_title2);
        $hotposts_title3 = mysqli_real_escape_string($connection, $hotposts_title3);
        $hotposts_title4 = mysqli_real_escape_string($connection, $hotposts_title4);
        $hotposts_title5 = mysqli_real_escape_string($connection, $hotposts_title5);

		$query = "UPDATE hotposts SET hotposts_title1=?, hotposts_title2=?, hotposts_title3=?, hotposts_title4=?, hotposts_title5=?, hotposts_content1=?, hotposts_content2=?, hotposts_content3 = ?, hotposts_content4=?, hotposts_content5=?, hotposts_image1=?, hotposts_image2=?, hotposts_image3=?, hotposts_image4=?, hotposts_image5=?, hotposts_file1=?, hotposts_file2=?, hotposts_file3=?, hotposts_file4=?, hotposts_file5=?, hotposts_tags=? WHERE hotposts_id = ?";
		$stmt = mysqli_prepare($connection, $query);
		mysqli_stmt_bind_param($stmt, 'sssssssssssssssssssssi', $hotposts_title1, $hotposts_title2, $hotposts_title3, $hotposts_title4, $hotposts_title5, $hotposts_content1, $hotposts_content2, $hotposts_content3, $hotposts_content4, $hotposts_content5, $hotposts_image1, $hotposts_image2, $hotposts_image3, $hotposts_image4, $hotposts_image5, $hotposts_file1, $hotposts_file2, $hotposts_file3, $hotposts_file4, $hotposts_file5, $hotposts_tags, $the_hotposts_id);
		mysqli_stmt_execute($stmt);

		if(!$stmt)
		{
			die("QUERY FAILED " . mysqli_error($connection));
		}
        

    	echo "<p class='bg-success'>Hotposts Updated. <a href='../hotposts_post?hp_id=$hotposts_id'> View Post</a> or <a href='hotposts'>Edit More Hotposts</a></p>";

		}
	?>
<form action="" method="post" enctype="multipart/form-data">

	<!-- Hotposts 1 -->
	<div class="form-group">
	    <label for="hotposts_title1">Hotposts Title 1</label>
	    <input value="<?php echo $hotposts_title1; ?>" type="text" class="form-control" name="hotposts_title1">
	</div>


 	<div class="form-group">
       <img width="100" src="../hotposts/<?php echo $hotposts_image1; ?>" alt="">
       <input  type="file" name="hotposts_image1">
     </div>

     <div class="form-group">
       <input  type="file" name="hotposts_file1">
     </div>

     <div class="form-group">
	    <label for="hotposts_content1">Hotposts Content 1</label>
	    <textarea type="text"  class="form-control"  value="" name="hotposts_content1"
	    id="" cols="30" rows="10" > <?php echo $hotposts_content1; ?></textarea>
	</div>

	<!-- Hotposts 2 -->
	<div class="form-group">
	    <label for="hotposts_title2">Hotposts Title 2</label>
	    <input value="<?php echo $hotposts_title2; ?>" type="text" class="form-control" name="hotposts_title2">
	</div>

 	<div class="form-group">
       <img width="100" src="../hotposts/<?php echo $hotposts_image2; ?>" alt="">
       <input  type="file" name="hotposts_image2">
     </div>

     <div class="form-group">
       <input  type="file" name="hotposts_file2">
     </div>

    <div class="form-group">
	    <label for="hotposts_content2">Hotposts Content 2</label>
	    <textarea type="text"  class="form-control"  value="" name="hotposts_content2"
	    id="" cols="30" rows="10" > <?php echo $hotposts_content2; ?></textarea>
	</div>


	<!-- Hotposts 3 -->
	<div class="form-group">
	    <label for="hotposts_title3">Hotposts Title 3</label>
	    <input value="<?php echo $hotposts_title3; ?>" type="text" class="form-control" name="hotposts_title3">
	</div>

	<div class="form-group">
       <input  type="file" name="hotposts_file3">
     </div>
 	
 	<div class="form-group">
       <img width="100" src="../hotposts/<?php echo $hotposts_image3; ?>" alt="">
       <input  type="file" name="hotposts_image3">
     </div>

    <div class="form-group">
	    <label for="hotposts_content3">Hotposts Content 3</label>
	    <textarea type="text"  class="form-control"  value="" name="hotposts_content3"
	    id="" cols="30" rows="10" > <?php echo $hotposts_content3; ?></textarea>
	</div>



	<!-- Hotposts 4 -->
	<div class="form-group">
	    <label for="hotposts_title4">Hotposts Title 4</label>
	    <input value="<?php echo $hotposts_title4; ?>" type="text" class="form-control" name="hotposts_title4">
	</div>

 	<div class="form-group">
       <img width="100" src="../hotposts/<?php echo $hotposts_image4; ?>" alt="">
       <input  type="file" name="hotposts_image4">
     </div>

    <div class="form-group">
       <input  type="file" name="hotposts_file4">
     </div>

    <div class="form-group">
	    <label for="hotposts_content4">Hotposts Content 4</label>
	    <textarea type="text"  class="form-control"  value="" name="hotposts_content4"
	    id="" cols="30" rows="10" > <?php echo $hotposts_content4; ?></textarea>
	</div>


	<!-- Hotposts 5 -->
	<div class="form-group">
	    <label for="hotposts_title5">Hotposts Title 5</label>
	    <input value="<?php echo $hotposts_title5; ?>" type="text" class="form-control" name="hotposts_title5">
	</div>

 	<div class="form-group">
       <img width="100" src="../hotposts/<?php echo $hotposts_image5; ?>" alt="">
       <input  type="file" name="hotposts_image5">
     </div>

    <div class="form-group">
       <input  type="file" name="hotposts_file5">
    </div>

	<div class="form-group">
	    <label for="hotposts_content5">Hotposts Content 5</label>
	    <textarea type="text"  class="form-control"  value="" name="hotposts_content5"
	    id="" cols="30" rows="10" > <?php echo $hotposts_content5; ?></textarea>
	</div>


	<div class="form-group">
	    <label for="hotposts_tags">Hotposts Tags</label>
	    <input type="text" value="<?php echo $hotposts_tags; ?>" class="form-control" name="hotposts_tags">
	</div>



	<div class="form-group">
	    <input class = "btn btn-primary" type = "submit" name ="update_hotposts" value="Update Hotposts">
	</div>
</form>