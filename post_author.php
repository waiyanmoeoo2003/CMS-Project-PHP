<?php include_once "layout/header.php"?>

    <!-- Navigation -->
<?php include_once "layout/nav.php"?>   

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <h1 class="page-header">
                    <?php
                     if(isset($_GET['author'])){
                    $post_author=$_GET['author']; 
                    echo "<h1>$post_author</h1>";}
                    ?>
                    <small>Posts</small>
                </h1>

                <!-- First Blog Post -->
                <?php
                if(isset($_GET['author'])){
                    $post_author=$_GET['author'];
                    $_SESSION['author']=$post_author;
                    $query="SELECT * FROM posts WHERE post_author='$post_author'";
                    $result=mysqli_query($connect,$query);
                    while($row=mysqli_fetch_assoc($result)){
                        $post_id=$row['post_id'];
                        $post_title=$row['post_title'];
                        $post_author=$row['post_author'];
                        $post_image=$row['post_image'];
                        $post_content=substr($row['post_content'],0,100)." . . . . . ";
                        $post_date=$row['post_date'];
                    
                ?>
                <h2>
                    <a href="post_detail.php?post_id=<?php echo $post_id ?>"><?php echo $post_title ?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo $post_author ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date ?></p>
                <hr>
                <a href="post_detail.php?post_id=<?php echo $post_id ?>">
                    <img class="img-responsive" src="images/<?php echo $post_image ?>" alt="">
                </a>
                
                <hr>
                <p><?php echo $post_content ?></p>
                <a class="btn btn-primary" href="post_detail.php?post_id=<?php echo $post_id ?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

            
                <hr>
                <?php } } ?>
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