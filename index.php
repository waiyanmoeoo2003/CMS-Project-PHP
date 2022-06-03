<?php include_once "layout/header.php"?>

    <!-- Navigation -->
<?php include_once "layout/nav.php"?>   

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <h1 class="page-header">
                    All Posts
                    <small>Secondary Text</small>
                </h1>

                <!-- First Blog Post -->
                <?php
                    $per_page=5;

                    if(isset($_GET['page'])){
                        $page=$_GET['page'];
                    }else{
                        $page='';
                    }
                    if($page=='' || $page==1){
                        $page_one=0;
                    }else{
                        $page_one=($page*5)-5;
                    }
                    $query="SELECT * FROM posts WHERE post_status='1'";
                    $find_count=mysqli_query($connect,$query);
                    $count=mysqli_num_rows($find_count);
                    $count=ceil($count/$per_page);
                    
                    $query="SELECT * FROM posts WHERE post_status='1' ORDER BY post_id DESC LIMIT $page_one,$per_page";
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
                    by <a href="post_author.php?author=<?php echo $post_author ?>"><?php echo $post_author ?></a>
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
                <?php } ?>
                <!-- Pager -->
                <ul class="pager">
                    <?php 
                        for($i=1; $i<=$count; $i++){
                            if($i==$page){
                                echo "<li><a href='index.php?page=$i ?>' class='active-link'>$i</a></li>";
                            }else{
                                echo "<li><a href='index.php?page=$i'>$i</a></li>";
                            }
                    ?>

                    
                    <?php }?>
                </ul>

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <?php include_once "layout/sidebar.php"?>

        </div>
        <!-- /.row -->

        <hr>

<!-- Footer -->
<?php include_once "layout/footer.php"?>