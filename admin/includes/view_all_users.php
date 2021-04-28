<div class="col-md-12 col-xs-12">
    <table class="table table-bordered">
    <thead>
        <tr>
            <th>Id</th>
            <th>Username</th>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Email</th>
<!--        <th>Image</th>-->
            <th>Role</th>
            <th>Admin</th>
            <th>Subscriber</th>
            <th>Edit</th>
            <th>Delete</th>

        </tr>
    </thead>
    <tbody>
        <?php
        $query = "SELECT * FROM users";
        $select_all_users = mysqli_query($connection, $query);



        while($row = mysqli_fetch_assoc($select_all_users)){
            $user_id = $row['user_id'];
            $username = $row['username'];
            $user_password = $row['user_password'];
            $user_firstname = $row['user_firstname'];
            $user_lastname = $row['user_lastname'];
            $user_email = $row['user_email'];
            $user_image = $row['user_image'];
            $user_role = $row['user_role'];


            echo "<tr>";
            echo "<td>{$user_id}</td>";
            echo "<td>{$username}</td>";
            echo "<td>{$user_firstname}</td>";
            echo "<td>{$user_lastname}</td>";
            // echo "<td>{$user_image}</td>";
            echo "<td>{$user_email}</td>";

            echo "<td>{$user_role}</td>";
            echo "<td><a href='users.php?change_to_admin=$user_id'>Admin</td>";
            echo "<td><a href='users.php?change_to_sub=$user_id'>Subscriber</td>";
            echo "<td><a href='users.php?source=edit_user&edit_user={$user_id}'>Edit</td>";
            echo "<td><a href='users?delete=$user_id'>Delete</td>";
            echo "</tr>";

        }
        ?>

    </tbody>

</table>


<?php

//Change to admin
if(isset($_GET['change_to_admin'])){
    $the_user_id = $_GET['change_to_admin'];
    $query = "UPDATE users SET user_role = 'admin' WHERE user_id = {$the_user_id}";
    $change_to_admin_query = mysqli_query($connection, $query);

    header("location: users.php");
}


//Change to subscriber
if(isset($_GET['change_to_sub'])){
    $the_user_id = $_GET['change_to_sub'];
    $query = "UPDATE users SET user_role = 'subscriber' WHERE user_id = {$the_user_id}";
    $change_to_sub_query = mysqli_query($connection, $query);

    header("location: users.php");
}


// Deleting Comments

if(isset($_GET['delete'])){
    if(isset($_SESSION['user_role'])){
        if($_SESSION['user_role'] == 'admin'){
    $the_user_id = mysqli_real_escape_string($connection, $_GET['delete']);
    $query = "DELETE FROM users WHERE user_id = {$the_user_id}";
    $delete_query = mysqli_query($connection, $query);

    header("location: users.php");
}else{
    header("location: index.php");
}
}
}

?>
</div>