<?php 
 if(isset($_GET['edit_id'])){
     $edit_id=$_GET['edit_id'];
    $query="SELECT * FROM posts WHERE post_id=$edit_id";
    $result=mysqli_query($connect,$query);
    $data=mysqli_fetch_assoc($result);

 }
   if(isset($_POST['update_product'])){
    $post_title=$_POST['post_title'];
    $post_author=$_POST['post_author'];
    $post_category_id=$_POST['post_category_id'];
    $post_content=$_POST['post_content'];
    $post_tag=$_POST['post_tag'];
    $post_date=$_POST['post_date'];
    $post_image=$_FILES['post_image']['name'];
    if($post_image){
        $img_query="SELECT * FROM posts WHERE post_id=$edit_id";
        $img_result=mysqli_query($connect,$cat_query);
        $img_row=mysqli_fetch_assoc($img_result);
        $img=$img_row['post_image'];
        $img_path='../images/'.$img;
        if(file_exists($img_path)){
            unlink($img_path);
        }
    }
    if(empty($post_image)){
        $img_query="SELECT * FROM posts WHERE post_id=$edit_id";
        $img_result=mysqli_query($connect,$query);
        $img_row=mysqli_fetch_assoc($img_result);
        $post_image=$img_row['post_image'];
    }
    $tmp_image=$_FILES['post_image']['tmp_name'];
    move_uploaded_file($tmp_image,'../images/'.$post_image);
    $query="UPDATE `posts` SET `post_title`='$post_title',`post_category_id`='$post_category_id',`post_author`='$post_author',`post_image`='$post_image',`post_content`='$post_content',`post_tag`='$post_tag',`post_date`='$post_date' WHERE post_id=$edit_id";
    mysqli_query($connect,$query);
    header('location:post.php');

   }

?>


<div class="col-md-12">
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="">Post Title</label>
            <input type="text" name="post_title" class="form-control"  value="<?php echo $data['post_title']?>">
        </div>
        <div class="form-group">
            <label for="">Post Author</label>
            <input type="text" name="post_author" class="form-control" value="<?php echo $data['post_author']?>">
        </div>
        <div class="form-group">
            <label for="">Post Category</label>
            <select name="post_category_id" id="" class="form-control">
                <?php
                    $query="SELECT * FROM category";
                    $result=mysqli_query($connect,$query);
                    foreach($result as $row){
                ?>
                <option  value="<?php echo $row['cat_id']?>" 
                <?php if($data['post_category_id']==$row['cat_id']){
                ?>
                selected=""
                <?php    
                }?>
                >
                <?php echo $row['cat_title']?>
                </option>
                <?php } ?>
            </select>
        </div>
        <div class="form-group">
            
            <label for="">Post Image</label>
            <img src="../images/<?php echo $data['post_image'] ?>" alt="" class="img-responsive" width="300px" height="300px">
            <input type="file" name="post_image" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Post Content</label>
            <textarea name="post_content" id="editor1" cols="30" rows="10" class="form-control"><?php echo $data['post_content']?></textarea>
        </div>
        <div class="form-group">
            <label for="">Post Tag</label>
            <input type="text" name="post_tag" class="form-control" value="<?php echo $data['post_tag']?>">
        </div>
        <div class="form-group">
            <label for="">Post Date</label>
            <input type="date" name="post_date" class="form-control" value="<?php echo $data['post_date']?>">
        </div>
        <input type="submit" name="update_product"  value="Update Product" class="btn btn-primary">
    </form>
</div>