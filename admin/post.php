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
                                    <h1>View All Post</h1>
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
                    if(isset($_GET['source'])){
                        $source=$_GET['source'];
                    }else{
                        $source='';
                    }
                    switch($source){
                        case 'add_post':
                            include_once "admin_layout/add_post.php";
                            break;
                        case 'edit_post':
                            include_once "admin_layout/edit_post.php";
                        break;
                        default:
                            include_once "admin_layout/view_all_post.php";
                        break;
                    }
                    

                ?>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
   <?php include_once "admin_layout/footer.php" ?>