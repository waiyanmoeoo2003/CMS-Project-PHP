<?php 
    include_once "database.php";
    ob_start();
    session_start();


    if(isset($_POST['login'])){
         $useremail=$_POST['email'];
         $userpassword=$_POST['password'];

        $query="SELECT * FROM `user` WHERE useremail='$useremail'";
        $result=mysqli_query($connect,$query);
         if($num=mysqli_num_rows($result)){
            $row=mysqli_fetch_assoc($result);
            $db_email=$row['useremail'];
            $db_name=$row['username'];
            $db_password=$row['userpassword'];
            $db_role=$row['userrole'];
            if($db_email=$useremail && password_verify($userpassword,$db_password)){
                $_SESSION['name']=$db_name;
                $_SESSION['eamil']=$db_email;
                $_SESSION['role']=$db_role;
                if($_SESSION['role']=='admin'){
                    header('location:admin/index.php');
                }else{
                    header('location:index.php');
                }
            }
        }
        
    }

?>