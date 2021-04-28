
<?php  // Get request user id and database data extraction


if(isset($_GET['edit_user'])){


    $the_user_id =  $_GET['edit_user'];
    

    $query = "SELECT * FROM users WHERE user_id = $the_user_id ";
    $select_users_query = mysqli_query($connection,$query);  

      while($row = mysqli_fetch_assoc($select_users_query)) {

          $user_id        = $row['user_id'];
          $username       = $row['username'];
          $user_password  = $row['user_password'];
          $user_firstname = $row['user_firstname'];
          $user_lastname  = $row['user_lastname'];
          $user_email     = $row['user_email'];
          $user_image     = $row['user_image'];
          $user_role      = $row['user_role'];



		
  }
        


if(isset($_POST['submitEdit'])){
    //$user_id = $_POST['user_id'];
    $username = escape($_POST['username']);
    $user_firstname = escape($_POST['user_firstname']);
    $user_lastname = escape($_POST['user_lastname']);

    // $post_image_temp = $_FILES['image']['tmp_name'];
    // $post_image = $_FILES['image']['name'];
    // move_uploaded_file($post_image_temp, "../images/users/$post_image");

    $user_role = escape($_POST['user_role']);
    $user_email = escape($_POST['user_email']);
    $user_password = escape($_POST['user_password']);
    

	$query = "SELECT randSalt FROM users";
	$select_randsalt_query = mysqli_query($connection, $query);

	if(!$select_randsalt_query){
	die("QUERY FAILED " . mysqli_error($connection));
	}


	$row = mysqli_fetch_array($select_randsalt_query);
	$salt = $row['randSalt'];
	$hashed_password = crypt($user_password, $salt);

    $query = "UPDATE users SET user_firstname=?, user_lastname=?, user_role=?, username=?, user_email=?,user_password=? WHERE user_id = ?";
    $stmt = mysqli_prepare($connection, $query);
    mysqli_stmt_bind_param($stmt, 'ssssssi', $user_firstname, $user_lastname, $user_role, $username, $user_email, $user_password, $the_user_id);
    mysqli_stmt_execute($stmt);

    if(!$stmt){
    die("QUERY FAILED " . mysqli_error($connection));
    }

        //$query = "UPDATE users SET ";
		// $query .="user_firstname  = '{$user_firstname}', ";
		// $query .="user_lastname = '{$user_lastname}', ";
		// $query .="user_role   =  '{$user_role}', ";
		// $query .="username = '{$username}', ";
		// $query .="user_email = '{$user_email}', ";
		// $query .="user_password   = '{$hashed_password}' ";
		// $query .= "WHERE user_id = {$the_user_id} ";


		// $edit_user_query = mysqli_query($connection, $query);

	}
}

?>



<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="user_firstname">Firstname</label>
        <input type="text" value="<?php echo $user_firstname?>" class="form-control" name="user_firstname">
    </div>



    <div class="form-group">
    <label for="user_lastname">Lastname</label>
    <input type="text" value="<?php echo $user_lastname ?>" name="user_lastname" class="form-control">
    </div>




    <div class="form-group">
        <label>User Role</label>
    <select name="user_role" class="form-control" id="">
    	<option value="<?php echo $user_role; ?>"><?php echo $user_role; ?></option>
    	<?php
    		if($user_role == "admin"){
    			echo "<option value='subscriber'>Subscriber</option>";
    		}
    		else{
    			echo "<option value='admin'>Admin</option>";
    		}
    	?>


    </select>


    </select>
    </div>



    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" value="<?php echo $username ?>" name="username" class="form-control">
    </div>  

<!-- 
    <div class="form-group">
        <label for="post_image">Post Image</label>
        <input type="file" name="image">
    </div> -->

    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" value="<?php echo $user_email?>" class="form-control" name="user_email">
    </div>

    <div class="form-group">
        <label for="user_password">Password</label>
        <input type="password" value="<?php echo $user_password?>" class="form-control" name="user_password">
    </div>



<!-- 
    <div class="form-group">
        <label for="post_content">Post Content</label>
        <textarea type="text" class="form-control" name="post_content"
        id="" cols="30" rows="10"></textarea>
    </div> -->

    <div class="form-group">
        <input class = "btn btn-primary" type = "submit" name ="submitEdit" value="Add User">
    </div>

</form>

