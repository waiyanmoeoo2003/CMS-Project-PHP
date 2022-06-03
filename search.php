<?php include_once "layout/header.php"?>

    <!-- Navigation -->
<?php include_once "layout/nav.php"?>   

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <h1 class="page-header">
                    <?php //echo $_SESSION['author']."'";?>
                    <small>Posts</small>
                </h1>

                <!-- First Blog Post -->
                <?php
                if(isset($_POST['search'])){
                    
                       $search=$_POST['search_text'];
                    
                    $query="SELECT * FROM posts WHERE post_title LIKE '%$search%'";
                    $result=mysqli_query($connect,$query);
                    
                    $count=mysqli_num_rows($result);
                    
                    if($count>0){
                        foreach($result as $data){
                    
                ?>
                <h2>
                    <a href="post_detail.php?post_id=<?php echo $data['post_id'] ?>"><?php echo $data['post_title'] ?></a>
                </h2>
                <p class="lead">
                    by <a href="post_author.php?author=<?php echo $data['post_author'] ?>"><?php echo $data['post_author'] ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $data['post_date'] ?></p>
                <hr>
                <a href="post_detail.php?post_id=<?php echo $data['post_id'] ?>">
                    <img class="img-responsive" src="images/<?php echo $data['post_image'] ?>" alt="">
                </a>
                
                <hr>
                <p><?php echo $data['post_content'] ?></p>
                <a class="btn btn-primary" href="post_detail.php?post_id=<?php echo $data['post_id'] ?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

            
                <hr>
                <?php 
                }    
            }else{
                    echo "not found";
                }
                    
                }else{
                    echo "index.php";
                } ?>
                <!-- Pager -->
                <ul class="pager">
                    <li class="previous">
                        <a href="#">&larr; Older</a>
                    </li>
                    <li class="next">
                        <a href="#">Newer &rarr;</a>
                    </li>
                </ul>

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <?php include_once "layout/sidebar.php"?>

        </div>
        <!-- /.row -->

        <hr>

<!-- Footer -->
<?php include_once "layout/footer.php"?>