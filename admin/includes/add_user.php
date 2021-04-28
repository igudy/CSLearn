<?php
if(isset($_POST['create_user'])){
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
    

    $user_password = password_hash($user_password, PASSWORD_BCRYPT, array('cost' => 12));
    $query = "INSERT INTO users(user_id, username, user_firstname, user_lastname, user_role, user_email,user_password ) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($connection, $query);
    mysqli_stmt_bind_param($stmt, 'sssssss', $user_id, $username, $user_firstname, $user_lastname, $user_role, $user_email, $user_password);
    mysqli_stmt_execute($stmt);


    echo "User Created " . "<a href='users'>View Users</a>";

}
?>



<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="user_firstname">Firstname</label>
        <input type="text" class="form-control" name="user_firstname">
    </div>



    <div class="form-group">
    <label for="user_lastname">Lastname</label>
    <input type="text" name="user_lastname" class="form-control">
    </div>




    <div class="form-group">
        <label>User Role</label>
    <select name="user_role" class="form-control" id="">
        <option value="subscriber">Select Option</option>
        <option value="admin">Admin</option>
        <option value="subscriber">Subscriber</option>
    </select>
    </div>



    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" name="username" class="form-control">
    </div>  

<!-- 
    <div class="form-group">
        <label for="post_image">Post Image</label>
        <input type="file" name="image">
    </div> -->

    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" name="user_email">
    </div>

    <div class="form-group">
        <label for="user_password">Password</label>
        <input type="password" class="form-control" name="user_password">
    </div>

    <div class="form-group">
        <input class = "btn btn-primary" type = "submit" name ="create_user" value="Add User">
    </div>

</form>

