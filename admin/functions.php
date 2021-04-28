<?php
function users_online() {
    if(isset($_GET['onlineusers'])) {

    global $connection;

    if(!$connection) {

        session_start();

        include("../includes/db.php");

        $session = session_id();
        $time = time();
        $time_out_in_seconds = 05;
        $time_out = $time - $time_out_in_seconds;

        $query = "SELECT * FROM users_online WHERE session = '$session'";
        $send_query = mysqli_query($connection, $query);
        $count = mysqli_num_rows($send_query);

            if($count == NULL) {

            mysqli_query($connection, "INSERT INTO users_online(session, time) VALUES('$session','$time')");


            } else {

            mysqli_query($connection, "UPDATE users_online SET time = '$time' WHERE session = '$session'");


            }

        $users_online_query =  mysqli_query($connection, "SELECT * FROM users_online WHERE time > '$time_out'");
        echo $count_user = mysqli_num_rows($users_online_query);


    }
    } // get request isset()


}

users_online();





// Function for escape
function escape($string) {
global $connection;
return mysqli_real_escape_string($connection, trim($string));
}



function username_exists($username){
    global $connection;
    $query = "SELECT username FROM users WHERE username = '$username'";
    $result = mysqli_query($connection, $query);
    if(mysqli_num_rows($result) > 0) {
        return true;
    } else {
        return false;
    }
}


function email_exists($user_email){
    global $connection;
    $query = "SELECT user_email FROM users WHERE user_email = '$user_email'";
    $result = mysqli_query($connection, $query);
    if(mysqli_num_rows($result) > 0) {
        return true;
    } else {
        return false;
    }
}



function register_user($username, $email, $password){

    global $connection;

        $username = mysqli_real_escape_string($connection, $username);
        $email    = mysqli_real_escape_string($connection, $email);
        $password = mysqli_real_escape_string($connection, $password);

        $password = password_hash( $password, PASSWORD_BCRYPT, array('cost' => 12));

        $query = "INSERT INTO users (username, user_email, user_password, user_role ) ";
        $query .="VALUES('{$username}', '{$email}', '{$password}', 'subscriber' )";
        $register_user_query = mysqli_query($connection, $query);

}

 function login_user($username, $password)
 {

     global $connection;

     $username = trim($username);
     $password = trim($password);

     $username = mysqli_real_escape_string($connection, $username);
     $password = mysqli_real_escape_string($connection, $password);


     $query = "SELECT * FROM users WHERE username = '{$username}' ";
     $select_user_query = mysqli_query($connection, $query);
     if (!$select_user_query) {

         die("QUERY FAILED" . mysqli_error($connection));

     }


     while ($row = mysqli_fetch_array($select_user_query)) {

         $db_user_id = $row['user_id'];
         $db_username = $row['username'];
         $db_user_password = $row['user_password'];
         $db_user_firstname = $row['user_firstname'];
         $db_user_lastname = $row['user_lastname'];
         $db_user_role = $row['user_role'];


         if (password_verify($password,$db_user_password)) {

             $_SESSION['username'] = $db_username;
             $_SESSION['firstname'] = $db_user_firstname;
             $_SESSION['lastname'] = $db_user_lastname;
             $_SESSION['user_role'] = $db_user_role;


             header("location: admin/index.php");

         } else {
             return false;
         }

     }

     return true;
 }
?>