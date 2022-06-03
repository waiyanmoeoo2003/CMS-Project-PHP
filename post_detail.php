<?php include_once "layout/header.php"?>

    <!-- Navigation -->
<?php include_once "layout/nav.php"?>   

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <!-- First Blog Post -->
                <?php
                if(isset($_GET['post_id'])){
                    $post_id=$_GET['post_id'];
                    $query="UPDATE `posts` SET `post_view_count`=post_view_count+1 WHERE post_id=$post_id";
                    mysqli_query($connect,$query);
                    $query="SELECT * FROM posts WHERE post_id=$post_id";
                    $result=mysqli_query($connect,$query);
                    $row=mysqli_fetch_assoc($result);
                        $post_id=$row['post_id'];
                        $post_title=$row['post_title'];
                        $post_author=$row['post_author'];
                        $post_image=$row['post_image'];
                        $post_content=$row['post_content'];
                        $post_date=$row['post_date'];
                    
                ?>
                <h2>
                    <a href="#"><?php echo $post_title ?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo $post_author ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date ?></p>
                <hr>
                <img class="img-responsive" src="images/<?php echo $post_image ?>" alt="">
                <hr>
                <p><?php echo $post_content ?></p>
            
                <hr>
                <?php } ?>
                <!-- Pager -->
                <?php
                    if(isset($_POST['create_comment'])){
                        $username=$_POST['username'];
                        $useremail=$_POST['useremail'];
                        $comment=$_POST['comment'];
                        $query="UPDATE `posts` SET `post_comment_count`=post_comment_count+1 WHERE post_id=$post_id";
                        mysqli_query($connect,$query);
                        $query="INSERT INTO `comment`(`comment_post_id`, `comment_user`, `comment_email`, `comment_text`,`comment_status` ,`comment_date`) VALUES ('$post_id','$username','$useremail','$comment',0,now())";
                        mysqli_query($connect,$query);
                    }
                ?>
                <div class="well">
                    <form action="" method="post">
                        <input type="text" name="username" class="form-control" placeholder="Username"><br>
                        <input type="email" name="useremail" class="form-control" placeholder="Useremail"><br>
                        <textarea name="comment" id="" cols="30" rows="10" placeholder="Comment" class="form-control"></textarea><br>
                        <input type="submit" name="create_comment" class="btn btn-primary">
                    </form>
                </div> 
                <hr>
                <?php 
                    $query="SELECT * FROM comment WHERE comment_post_id=$post_id AND comment_status=1";
                    $result=mysqli_query($connect,$query);
                    
                    foreach($result as $data){
                ?>
                <div class="media">
                        <a class="pull-left" href="#">
                            <img class="media-object" src="http://placehold.it/64x64" alt="">
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading"><?php echo $data['comment_user']; ?>
                                <small><?php echo $data['comment_date']; ?></small>
                            </h4>
                            <?php echo $data['comment_text']; ?>
                        </div>
                </div>
                <?php } ?> 
            </div>
            
            
            
            <?php include_once "layout/sidebar.php"?>
        </div>
    
        
    
        <!-- /.row -->

        

<!-- Footer -->
<?php include_once "layout/footer.php"?>