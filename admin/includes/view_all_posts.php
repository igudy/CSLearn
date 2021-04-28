<?php
if (isset($_POST['checkBoxArray'])) {
    foreach ($_POST['checkBoxArray'] as $postValueId) {
        $bulk_options = $_POST['bulk_options'];

        switch ($bulk_options) {
            case 'published':
                $query = "UPDATE posts SET post_status = '{$bulk_options}' WHERE post_id = '{$postValueId}'";
                $update_to_published_post = mysqli_query($connection, $query);
                break;
            
            case 'draft':
                $query = "UPDATE posts SET post_status = '{$bulk_options}' WHERE post_id = '{$postValueId}'";
                $update_to_draft_post = mysqli_query($connection, $query);
                break;


            case 'delete':
            $query = "DELETE FROM posts WHERE post_id = '{$postValueId}'";
            $update_to_delete_post = mysqli_query($connection, $query);
            break;

            case 'clone':
            
            $query = "SELECT * FROM posts WHERE post_id = '{$postValueId}' ";
            $select_post_query = mysqli_query($connection, $query);

            while ($row = mysqli_fetch_array($select_post_query)) {
            $post_title         = $row['post_title'];
            $post_category_id   = $row['post_category_id'];
            $post_date          = $row['post_date']; 
            $post_user          = $row['post_user'];
            $post_status        = $row['post_status'];
            $post_image         = $row['post_image'] ;
            $post_tags          = $row['post_tags'];
            $post_content       = $row['post_content'];
            
          }
        $query = "INSERT INTO posts(post_category_id, post_title, post_user, post_date,post_image,post_content,post_tags,post_status) ";
        $query .= "VALUES({$post_category_id},'{$post_title}','{$post_user}',now(),'{$post_image}','{$post_content}','{$post_tags}', '{$post_status}') "; 
                $copy_query = mysqli_query($connection, escape($query)); 
                 break;
        
            

            default:
                # code...
                break;
        }


    }
}


?>



<form action="" method='post'>

<table class="table table-bordered table-hover">
              

        <div id="bulkOptionContainer" class="col-xs-4">

        <select class="form-control" name="bulk_options" id="">
        <option value="">Select Options</option>
        <option value="published">Publish</option>
        <option value="draft">Draft</option>
        <option value="delete">Delete</option>
         <option value="clone">Clone</option>
        </select>

        </div> 

            
<div class="col-xs-4">

<input type="submit" name="submit" class="btn btn-success" value="Apply">
<a class="btn btn-primary" href="posts.php?source=add_post">Add New</a>
<a class="btn btn-warning" href="posts?source=view_all_posts2">View All Post2</a>

 </div>


<div class="col-md-12 col-xs-12">
    <table class="table table-bordered">
    <thead>
        <tr>
            <th><input type="checkbox" id="selectAllBoxes" name=""></th>
            <th>Id</th>
<!--        <th>Author</th> -->
            <th>Title</th>
            <th>Category</th>
            <th>Status</th>
            <th>Image</th>
            <th>Tags</th>
            <th>Content</th>
            <th>Comment Count</th>
            <th>View Post</th>
            <th>Views</th>
            <th>Reset Views</th>
            <th>Date</th>
            <th>Type</th>

            <!-- <th>Music</th>
            <th>Video</th>
            <th>Music Thumbnail</th>
            <th>Video Thumbnail</th> -->
            <th>Edit</th>
            <th>Delete</th>

        </tr>
    </thead>
    <tbody>
        <?php
        $query = "SELECT * FROM posts ORDER BY post_id DESC ";
        $select_all_posts = mysqli_query($connection, $query);



        while($row = mysqli_fetch_assoc($select_all_posts)){
            $post_id = $row['post_id'];
            // $post_user = $row['post_user'];
            $post_title = $row['post_title'];
            $post_category_id = $row['post_category_id'];
            $post_status = $row['post_status'];
            $post_image = $row['post_image'];
            $post_type = $row['post_type'];
            $post_tags = $row['post_tags'];
            $post_music = $row['post_music'];
            $post_video = $row['post_video'];
            $post_movies = $row['post_movies'];
            $post_content = $row['post_content'];
            $post_comment_count = $row['post_comment_count'];
            $post_date = $row['post_date'];


            $post_image_thread1 = $row['thread1'];
            $post_image_thread2 = $row['thread2'];
            $post_image_thread3 = $row['thread3'];


            $post_music_thumbnail = $row['post_music_thumbnail'];
            $post_video_thumbnail = $row['post_video_thumbnail'];
            $post_movies_thumbnail = $row['post_movies_thumbnail'];
            $post_views_count   = $row['post_views_count'];
        
            echo "<tr>";
            ?>

            <td><input type="checkbox" class="checkboxes" name="checkBoxArray[]" value='<?php echo $post_id; ?>'=></td>


            <?php
            echo "<td>{$post_id}</td>";
            // echo "<td>{$post_user}</td>";
            echo "<td>{$post_title}</td>";
  

            $query = "SELECT * FROM categories WHERE cat_id = {$post_category_id} ";
            $select_categories_id = mysqli_query($connection,$query);  

            while($row = mysqli_fetch_assoc($select_categories_id)) {
            $cat_id = $row['cat_id'];
            $cat_title = $row['cat_title'];

            
                echo "<td>$cat_title</td>";
                
            }

            echo "<td>{$post_status}</td>";
            if($post_type === 'image'){
                echo "<td><img width='100' height='150' src='../images/$post_image' alt='image'></td>";
            }
            else if($post_type === 'music'){
                echo "<td><img width='100' height='150' src='../music/music_thumbnail/$post_music_thumbnail' alt='image'></td>";
            }
            else if($post_type === 'video'){
                echo "<td><img width='100' height='150' src='../videos/videos_thumbnail/$post_video_thumbnail' alt='image'></td>";
            }
            else if($post_type === 'thread'){
                echo "<td><img width='100' height='150' src='../images/threads/$post_image_thread1' alt='image'></td>";
            }
            else if($post_type === 'movies'){
                echo "<td><img width='100' height='150' src='../movies/movies_thumbnail/$post_movies_thumbnail' alt='image'></td>";
            }

            else{
                continue;
            }
            echo "<td>{$post_tags}</td>";
            echo "<td>{$post_content}</td>";


            $query = "SELECT * FROM comments WHERE comment_post_id = $post_id";
            $send_comment_query = mysqli_query($connection, $query);

            $row = mysqli_fetch_array($send_comment_query);
            
            $count_comments = mysqli_num_rows($send_comment_query);

            echo "<td><a href='post_comments.php?id=$post_id'>$count_comments</a></td>";

            echo "<td><a href='../post?p_id={$post_id}'>View Post</td>";
            echo "<td> $post_views_count </td>";
            echo "<td><a href='posts.php?reset={$post_id}'>Reset Views</td>";
            echo "<td>{$post_date}</td>";

            echo "<td>{$post_type}</td>";

            echo "<td><a href='posts.php?source=edit_post&p_id={$post_id}'>Edit</td>";
            echo "<td><a href='posts.php?delete={$post_id}'>Delete</td>";

            echo "</tr>";

        }
        ?>

    </tbody>

</table>

</form>

<!-- Delete Posts -->
<?php
if(isset($_GET['delete'])){
    $the_post_id = $_GET['delete'];
    $query = "DELETE FROM posts WHERE post_id = {$the_post_id}";
    $delete_query = mysqli_query($connection, $query);

    header("location: posts.php");
}


// Reset View
if(isset($_GET['reset'])){

    $the_post_id = $_GET['reset'];
    
    $query = "UPDATE posts SET post_views_count = 0 WHERE post_id = " . mysqli_real_escape_string($connection, $the_post_id);
    $reset_query = mysqli_query($connection, $query);

    header("location: posts.php");
}


?>
</div>