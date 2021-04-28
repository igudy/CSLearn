    <!--================Header Menu Area =================-->
    <?php include("includes/header.php"); ?>
    <!--================Header Menu Area =================-->


    <!--================Header Menu Area =================-->
    <?php include("includes/navigation.php"); ?>
    <!--================Header Menu Area =================-->
    <?php
        if(isset($_SESSION['username'])){
            $username = $_SESSION['username'];

            $query = "SELECT * FROM users WHERE username = '{$username}'";
            $select_profile_query = mysqli_query($connection, $query);

            while ($row = mysqli_fetch_assoc($select_profile_query)) {
            $user_id = $row['user_id'];
            $username = $row['username'];
            $user_password = $row['user_password'];
            $user_firstname = $row['user_firstname'];
            $user_lastname = $row['user_lastname'];
            $user_email = $row['user_email'];
            $user_role = $row['user_role'];
            }
        }



            if(isset($_POST['updateProfile'])){
            //$user_id = $_POST['user_id'];
            $username = escape($_POST['username']);
            $user_firstname = escape($_POST['user_firstname']);
            $user_lastname = escape($_POST['user_lastname']);
            $user_role = escape($_POST['user_role']);
            $user_email = escape($_POST['user_email']);
            $user_password = escape($_POST['user_password']);

            $query = "UPDATE users SET user_firstname=?, user_lastname=?, user_role=?, username=?, user_email=?,user_password=? WHERE username = ?";
            $stmt = mysqli_prepare($connection, $query);
            mysqli_stmt_bind_param($stmt, 'sssssss', $user_firstname, $user_lastname, $user_role, $username, $user_email, $user_password, $username);
            mysqli_stmt_execute($stmt);

            if(!$stmt){
                die("QUERY FAILED " . mysqli_error($connection));
            }


            // $query = "UPDATE users SET ";
            // $query .="user_firstname  = '{$user_firstname}', ";
            // $query .="user_lastname = '{$user_lastname}', ";
            // $query .="user_role   =  '{$user_role}', ";
            // $query .="username = '{$username}', ";
            // $query .="user_email = '{$user_email}', ";
            // $query .="user_password   = '{$user_password}' ";
            // $query .= "WHERE username = '{$username}' ";

            $profile_query = mysqli_query($connection, $query);
        }


    ?>
        
        <div id="page-wrapper">
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Admin
                            <small>Hi <?php echo $_SESSION['username']; ?>
                            </small>
                        </h1>
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


    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" value="<?php echo $user_email?>" class="form-control" name="user_email">
    </div>

    <div class="form-group">
        <label for="user_password">Password</label>
        <input type="password" value="<?php echo $user_password?>" class="form-control" name="user_password">
    </div>



    <div class="form-group">
        <input class = "btn btn-primary" type = "submit" name ="updateProfile" value="Update Profile">
    </div>

</form>


</div>
</div>
<!-- /.row -->


    <!--================Header Menu Area =================-->
    <?php include("includes/footer.php"); ?>
    <!--================Header Menu Area =================-->