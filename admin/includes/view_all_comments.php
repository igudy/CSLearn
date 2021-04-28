<div class="col-md-12 col-xs-12">
    <table class="table table-bordered">
    <thead>
        <tr>
            <th>Id</th>
            <th>Author</th>
            <th>Comment</th>
            <th>Email</th>
            <th>Status</th>
            <th>In response</th>
            <th>Date</th>
            <th>Approve</th>
            <th>Unapprove</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $query = "SELECT * FROM comments ORDER BY comment_id DESC ";
        $select_all_comments = mysqli_query($connection, $query);



        while($row = mysqli_fetch_assoc($select_all_comments)){
            $comment_id = $row['comment_id'];
            $comment_post_id = $row['comment_post_id'];
            $comment_author = $row['comment_author'];
            $comment_email = $row['comment_email'];
            $comment_content = $row['comment_content'];
            $comment_status = $row['comment_status'];
            $comment_date = $row['comment_date'];
            
            echo "<tr>";
            echo "<td>{$comment_id}</td>";
            echo "<td>{$comment_author}</td>";
            echo "<td>{$comment_content}</td>";
            echo "<td>{$comment_email}</td>";
            echo "<td>{$comment_status}</td>";


            // In response to

            $query = "SELECT * FROM posts WHERE post_id = $comment_post_id ";
            $select_post_id_query = mysqli_query($connection,$query);
            
            while($row = mysqli_fetch_assoc($select_post_id_query)){
            $post_id = $row['post_id'];
            $post_title = $row['post_title'];

            echo "<td><a href='../post.php?p_id=$post_id'>$post_title</a></td>";


            }



            

            echo "<td>{$comment_date}</td>";
            echo "<td><a href='comments.php?approve=$comment_id'>Approve</td>";
            echo "<td><a href='comments.php?unapprove=$comment_id'>Unapprove</td>";
            echo "<td><a href='#'>Edit</td>";
            echo "<td><a href='comments.php?delete=$comment_id'>Delete</td>";
            echo "</tr>";

        }
        ?>

    </tbody>

</table>


<?php

// Approve individual comment
if(isset($_GET['approve'])){
    $the_comment_id = escape($_GET['approve']);
    $query = "UPDATE comments SET comment_status = 'approved' WHERE comment_id = {$the_comment_id}";
    $approve_query = mysqli_query($connection, escape($query));

    header("location: comments.php");
}


// Disapprove individual comment
if(isset($_GET['unapprove'])){
    $the_comment_id = escape($_GET['unapprove']);
    $query = "UPDATE comments SET comment_status = 'unapproved' WHERE comment_id = {$the_comment_id}";
    $unapprove_query = mysqli_query($connection, escape($query));

    header("location: comments.php");
}


// Deleting Comments
if(isset($_GET['delete'])){
    $the_comment_id = escape($_GET['delete']);
    $query = "DELETE FROM comments WHERE comment_id = {$the_comment_id}";
    $delete_query = mysqli_query($connection, escape($query));

    header("location: comments.php");
}


?>
</div>