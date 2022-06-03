<?php include_once "admin_layout/nav.php" ?>
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Category
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
                    if(isset($_POST['add_category'])){
                        $cat_title=$_POST['cat_title'];
                        $query="INSERT INTO `category`(`cat_title`) VALUES ('$cat_title')";
                        $result=mysqli_query($connect,$query);
                        if($result){
                            echo "success";
                        }
                    }
                   
                ?>
                <!-- /.row -->
                <div class="row">
                    <div class="col-md-6">
                        <form action="" method="post">
                            <input type="text" name="cat_title" class="form-control"><br>
                            <input type="submit" name="add_category" value="Add Category" class="btn btn-primary">
                        </form>
                        <br>
                    <?php
                        if(isset($_GET['edit_id'])){
                            $edit_id=$_GET['edit_id'];
                            $query="SELECT * FROM category WHERE cat_id=$edit_id";
                            $result=mysqli_query($connect,$query);
                            $data=mysqli_fetch_assoc($result);
                            if(isset($_POST['update_category'])){
                                $cat_title=$_POST['cat_title'];
                                $query="UPDATE `category` SET `cat_title`='$cat_title' WHERE cat_id=$edit_id";
                                mysqli_query($connect,$query);
                                header('location:category.php');
                            }

                    ?>
                        <form action="" method="post">
                            <input type="text" name="cat_title" class="form-control" value="<?php echo $data['cat_title'] ?>"><br>
                            <input type="submit" name="update_category" value="Update Category" class="btn btn-primary">
                        </form>
                   
                    <?php 
                    }
                    ?>
                    </div>
                    <div class="col-md-6">
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered">
                                <tr>
                                    <th>NO.</th>
                                    <th>Category</th>
                                    <th>Update</th>
                                    <th>Delete</th>
                                </tr>
                                <?php 
                                    $i=1;
                                    $query="SELECT * FROM category";
                                    $result=mysqli_query($connect,$query);
                                    foreach($result as $data){
                                ?>
                                <tr>
                                    <td><?php echo $i++ ?></td>
                                    <td><?php echo $data['cat_title'] ?></td>
                                    <td><a href="category.php?edit_id=<?php echo $data['cat_id'] ?>" class="btn btn-success">Update</a></td>
                                    <td><a href="category.php?delete_id=<?php echo $data['cat_id'] ?>" class="btn btn-danger">Delete</a></td>
                                </tr>
                                <?php } ?>
                            </table>
                        </div>
                        
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
   <?php include_once "admin_layout/footer.php" ?>

   <?php 
    if(isset($_GET['delete_id'])){
        $del_id=$_GET['delete_id'];
        $query="DELETE FROM category WHERE cat_id=$del_id";
        mysqli_query($connect,$query);
        header('location:category.php');
    }
   
   ?>