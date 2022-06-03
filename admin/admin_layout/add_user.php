<?php 
	if(isset($_POST['add_user'])){
        $username=$_POST['username'];
        $user_role=$_POST['user_role'];
        $useremail=$_POST['useremail'];
        $userpassword=$_POST['userpassword'];
        $userpassword=password_hash($userpassword,PASSWORD_BCRYPT,['aa'=>22]);
        $query="INSERT INTO `user`(`username`, `useremail`, `userpassword`, `userrole`) VALUES ('$username','$useremail','$userpassword','$user_role')";
        $result=mysqli_query($connect,$query);
 		if(!$result){
 			die('failed');
 		}
	}
 ?>
<form action="" method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label for="">User Name</label>
		<input type="text" class="form-control" name="username">
	</div>
	<div class="form-group">
		<label for="">User Role</label>
		<select name="user_role" class="form-control">
			<option value="subscriber">Subscriber</option>
			<option value="admin">Admin</option>
		</select>
	</div>
	<div class="form-group">
		<label for="">User Email</label>
		<input type="email" class="form-control" name="useremail">
	</div>
	<div class="form-group">
		<label for="">User Password</label>
		<input type="password" class="form-control" name="userpassword">
	</div>
	<div class="form-group">
		<input type="submit" class="btn btn-primary" name="add_user" value="Add User">
	</div>
</form>
