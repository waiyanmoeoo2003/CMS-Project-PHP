<?php 
   if(isset($_POST['add_product'])){
    $post_title=$_POST['post_title'];
    $post_author=$_POST['post_author'];
    $post_category_id=$_POST['post_category_id'];
    $post_content=$_POST['post_content'];
    $post_tag=$_POST['post_tag'];
    $post_date=$_POST['post_date'];
    $post_image=$_FILES['post_image']['name'];
    $tmp_image=$_FILES['post_image']['tmp_name'];
    move_uploaded_file($tmp_image,'../images/'.$post_image);
    $query="INSERT INTO `posts`(`post_title`, `post_category_id`, `post_author`, `post_image`, `post_content`, `post_tag`, `post_comment_count`, `post_view_count`, `post_status`, `post_date`) VALUES ('$post_title','$post_category_id','$post_author','$post_image','$post_content','$post_tag','0','0','1','$post_date')";
    mysqli_query($connect,$query);
    

   }

?>


<div class="col-md-12">
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="">Post Title</label>
            <input type="text" name="post_title" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Post Author</label>
            <input type="text" name="post_author" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Post Category</label>
            <select name="post_category_id" id="" class="form-control">
                <?php
                    $query="SELECT * FROM category";
                    $result=mysqli_query($connect,$query);
                    foreach($result as $row){
                ?>
                <option value="<?php echo $row['cat_id']?>"><?php echo $row['cat_title']?></option>
                <?php } ?>
            </select>
        </div>
        <div class="form-group">
            <label for="">Post Image</label>
            <input type="file" name="post_image" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Post Content</label>
            <textarea name="post_content" id="editor1" cols="30" rows="10" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label for="">Post Tag</label>
            <input type="text" name="post_tag" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Post Date</label>
            <input type="date" name="post_date" class="form-control">
        </div>
        <input type="submit" name="add_product" value="Add Product" class="btn btn-primary">
    </form>
</div>