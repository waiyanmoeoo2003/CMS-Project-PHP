<?php include_once "admin_layout/nav.php" ?>
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            <?php
                                if(isset($_GET['source'])){
                                    $source=$_GET['source'];
                                }else{
                                    $source='';
                                }
                                switch($source){
                                    case 'add_post':
                                    ?>
                                    <h1>Add Post</h1>
                                    <?php 
                                    break;
                                        case 'edit_post'
                                    ?>
                                    <h1>Edit Post</h1>
                                    <?php
                                    break;
                                        default:

                                    ?>
                                    <h1>View All Comment</h1>
                                <?php
                                break;
                                }

                            ?>
                            <small>Subheading</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Blank Page
                            </li>
                        </ol>
                    </div>
                </div>
<?php
    
?>


<div class="col-md-12">
    
    <div class="table-responsive">
        <table class="table table-hover table-bordered text-center">
            <tr>
                
                <th>NO.</th>
                <th>Comment Author</th>
                <th>Comment Email</th>
                <th>From Response</th>
                <th>Comment Content</th>
                <th>Comment Date</th>
                <th>Comment Status</th>
                <th>Approve</th>
                <th>Unapprove</th>
                <th>Delete</th>
            </tr>
            <?php
                $i=1;
                $query="SELECT * FROM comment";
                $result=mysqli_query($connect,$query);
                foreach($result as $data){
            ?>
            <tr>
            <td><?php echo $i++; ?></td>
                <td><?php echo $data['comment_user'] ?></td>
                
                <td><?php echo $data['comment_email']?></td>
                <td>
                
                    <?php 
                        $post_id=$data['comment_post_id'];
                        $post_query="SELECT * FROM posts WHERE post_id=$post_id";
                        $post_result=mysqli_query($connect,$post_query);
                        $post_row=mysqli_fetch_assoc($post_result);
                        echo $post_row['post_title'];   
                    ?>

                </td>
                <td><?php echo $data['comment_text'] ?></td>
                <td><?php echo $data['comment_date']?></td>
                
                <td>
                    <?php if($data['comment_status']==1){?>
                    Approved
                    <?php }else{
                    ?>
                   Unapproved
                    <?php    
                    } ?>
                </td>
                <td><a href="comment.php?status=1&comment_id=<?php echo $data['id'] ?>" class="btn btn-success">Approve</a></td>
                <td><a href="comment.php?status=0&comment_id=<?php echo $data['id'] ?>" class="btn btn-warning">Unapprove</a></td>
                
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
    
    if(isset($_GET['status'])){
        echo $status=$_GET['status'];
        echo $comment_id=$_GET['comment_id'];
        if($status==1){
            $query="UPDATE `comment` SET `comment_status`=1 WHERE id=$comment_id";
        }else{
            $query="UPDATE `comment` SET `comment_status`=0 WHERE id=$comment_id";
        }
        mysqli_query($connect,$query);
        header('location:comment.php');
    }
?>

<?php include_once "admin_layout/footer.php" ?>