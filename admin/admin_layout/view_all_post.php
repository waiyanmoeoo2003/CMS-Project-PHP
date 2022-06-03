<?php
    if(isset($_POST['checkBoxArray'])){
        foreach($_POST['checkBoxArray'] as $data){
            $option_value=$_POST['option_value'];
            switch($option_value){
                case 'public':
                    $query="UPDATE `posts` SET `post_status`='1' WHERE post_id=$data";
                    mysqli_query($connect,$query);
                break;
                case 'hide':
                    $query="UPDATE `posts` SET `post_status`='0' WHERE post_id=$data";
                    mysqli_query($connect,$query);
                break;
                case 'clone':
                    $query="SELECT * FROM posts WHERE post_id=$data";
                    $result=mysqli_query($connect,$query);
                    $row=mysqli_fetch_assoc($result);
                        $post_title=$row['post_title'];
                        $post_author=$row['post_author'];
                        $post_category_id=$row['post_category_id'];
                        $post_content=$row['post_content'];
                        $post_tag=$row['post_tag'];
                        $post_date=$row['post_date'];
                        $post_image=$row['post_image'];
                        $post_view_count=$row['post_view_count'];
                        $post_comment_count=$row['post_comment_count'];
                        $post_status=$row['post_status'];
                        $image=rand().'_'.$post_image;
                        copy('../images/'.$post_image,'../images/'.$image);
                        
                        $query="INSERT INTO `posts`(`post_title`, `post_category_id`, `post_author`, `post_image`, `post_content`, `post_tag`, `post_comment_count`, `post_view_count`, `post_status`, `post_date`) VALUES ('$post_title','$post_category_id','$post_author','$image','$post_content','$post_tag','$post_comment_count','$post_view_count','$post_status','$post_date')";
                        mysqli_query($connect,$query);
                    
                break;
                case 'delete':
                    $query="SELECT * FROM posts WHERE post_id=$data";
                    $result=mysqli_query($connect,$query);
                    $row=mysqli_fetch_assoc($result);
                    $post_image=$row['post_image'];
                    $img_path="../images/".$post_image;
                    if(file_exists($img_path)){
                        unlink($img_path);
                    }
                    $delete_query="DELETE FROM posts WHERE post_id=$data";
                    mysqli_query($connect,$delete_query);
                break;
            }
        }
    }
?>


<div class="col-md-12">
    <div class="row" style="margin-bottom:10px">
        <div class="col-md-4">
            <form action="" method="post">
            <select name="option_value" id="" class="form-control">
                <option value="">---SELECT ONE----</option>
                <option value="public">Public</option>
                <option value="delete">Delete</option>
                <option value="clone">Clone</option>
                <option value="hide">Hide</option>
            </select>
            
        </div>
        <div class="col-md-2">
            <input type="submit" name="apply" value="Apply" class="btn btn-primary">
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-hover table-bordered text-center">
            <tr>
                <th><input type="checkbox" id="select_all"></th>
                <th>NO.</th>
                <th>Post Title</th>
                <th>Post Image</th>
                <th>Post Author</th>
                <th>Post Category</th>
                <th>Post Content</th>
                <th>Post Tag</th>
                <th>Post View Count</th>
                <th>Post Comment Count</th>
                <th>Post Status</th>
                <th>Post Date</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>
            <?php
                $i=1;
                $query="SELECT * FROM posts";
                $result=mysqli_query($connect,$query);
                foreach($result as $data){
                    $cat_id=$data['post_category_id'];
                    $cat_query="SELECT * FROM category WHERE cat_id=$cat_id";
                    $cat_result=mysqli_query($connect,$cat_query);
                    $cat_row=mysqli_fetch_assoc($cat_result);
                    $cat_title=$cat_row['cat_title'];
            ?>
            <tr>
                <td><input type="checkbox" class="multi_check" name="checkBoxArray[]" value=
                <?php echo $data['post_id'] ?>></td>
                <td><?php echo $i++; ?></td>
                <td><?php echo $data['post_title']?></td>
                <td><img src="../images/<?php echo $data['post_image'] ?>" alt="" height="200px" width="200px " class="img-responsive"></td>
                <td><?php echo $data['post_author'] ?></td>
                <td><?php echo $cat_title?></td>
                <td><?php echo $data['post_content']?></td>
                <td><?php echo $data['post_tag']?></td>
                <td><?php echo $data['post_view_count']?></td>
                <td><?php echo $data['post_comment_count']?></td>
                <td>
                    <?php if($data['post_status']=='1'){?>
                    <a href="post.php?status_id=<?php echo $data['post_id'] ?>" class="btn btn-info">Public</a>
                    <?php }else{
                    ?>
                    <a href="post.php?status_id=<?php echo $data['post_id'] ?>" class="btn btn-info">Hide</a>
                    <?php    
                    } ?>
                </td>
                <td><?php echo $data['post_date']?></td>
                <td><a href="post.php?source=edit_post&edit_id=<?php echo $data['post_id']?>" class="btn btn-success">Update</a></td>
                <td><a href="post.php?delete_id=<?php echo $data['post_id']?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this post?')">Delete</a></td>
            </tr>
            <?php
                }
            ?>
        </table>
        </form>
    </div>
</div>

<?php
    if(isset($_GET['delete_id'])){
        $delete_id=$_GET['delete_id'];
        $img_query="SELECT * FROM posts WHERE post_id=$delete_id";
        $img_result=mysqli_query($connect,$img_query);
        $img_row=mysqli_fetch_assoc($img_result);
        $img=$img_row['post_image'];
        $img_path='../images/'.$img;
        if(file_exists($img_path)){
            unlink($img_path);
        }
        $query="DELETE FROM `posts` WHERE post_id=$delete_id";
        mysqli_query($connect,$query);
        header('location:post.php');
    }
    if(isset($_GET['status_id'])){
        $status_id=$_GET['status_id'];
        $query="SELECT * FROM posts WHERE post_id=$status_id";
        $result=mysqli_query($connect,$query);
        $data=mysqli_fetch_assoc($result);
        $post_status=$data['post_status'];
        if($post_status=='1'){
            $status_query="UPDATE `posts` SET `post_status`='0' WHERE post_id=$status_id";
        }else{
            $status_query="UPDATE `posts` SET `post_status`='1' WHERE post_id=$status_id";
        }
        mysqli_query($connect,$status_query);
        header('location:post.php');
    }
?>