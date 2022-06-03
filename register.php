
<?php  include_once "layout/header.php"?>

<?php
    if(isset($_POST['register'])){
        $username=$_POST['username'];
        $userpassword=$_POST['userpassword'];
        $useremail=$_POST['useremail'];
        $userrole=$_POST['userrole'];
        $userpassword=password_hash($userpassword,PASSWORD_BCRYPT,['aa'=>12]);

        $query="INSERT INTO `user`(`username`, `useremail`, `userpassword`, `userrole`) VALUES ('username','$useremail','$userpassword','$userrole')";
        $result=mysqli_query($connect,$query);
        
        if($result){
            header('location:index.php');
        }
    }
?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
            
                <h1 class="display-2 text-center">Register Form</h1>
                <form action="" method="post" enctype="multipart/form-data"><br>
                   <input type="text" name="username" placeholder="Please enter your name" class="form-control"><br>
                   <input type="password" name="userpassword" placeholder="Please enter your password" class="form-control"><br>
                   <input type="email" name="useremail" placeholder="Please enter your email" class="form-control"><br>
                   <select name="userrole" id="" class="form-control">
                   <option value="">---Select Role---</option>
                    <option value="admin">Admin</option>
                    <option value="subscriber">Subscriber</option>
                   </select><br>
                   <input type="submit" name="register" value="Register" class="btn btn-primary form-control">
                </form>
            </div>
        </div>
    </div>
 
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
   
   
