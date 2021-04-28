<!-- EDIT QUERY -->
<?php
    if(isset($_GET['edit'])){

        $the_cat_id = $_GET['edit'];
        $query = "SELECT * FROM categories WHERE cat_id = {$the_cat_id} ";
        $select_categories_id = mysqli_query($connection, $query);

        while ($row = mysqli_fetch_assoc($select_categories_id)) {
            $cat_id = $row['cat_id'];
            $cat_title = $row['cat_title'];
        
        ?>
        <input class="form-control" type="text" value="<?php if(isset($cat_title)){echo $cat_title;} ?>" name="cat_title">

    <br>
<button class="form-control btn btn-primary" type="submit" name="update">Update</button>
    <?php }} ?>



<!-- UPDATE QUERY -->
    <?php
        //Update
        if(isset($_POST['update'])){
        $the_cat_title = $_POST['cat_title'];

        $stmt = mysqli_prepare($connection, "UPDATE categories SET cat_title = ? WHERE cat_id = ? ");
        mysqli_stmt_bind_param($stmt, 'si', $the_cat_title, $cat_id);
        mysqli_stmt_execute($stmt);
        
        if(!$stmt){
            die("QUERY FAILED " . mysqli_error($connection));
        }


        header("Location: categories");
        }
?>