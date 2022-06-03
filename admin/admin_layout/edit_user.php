<?php 
	
	if(isset($_GET['edit'])){
		$edit_id=$_GET['edit'];
		$query="SELECT * FROM `user` WHERE user_id=$edit_id";
		$result=mysqli_query($connect,$query);
		while($row=mysqli_fetch_assoc($result)){
			
	        $username=$row['username'];
	        $user_role=$row['userrole'];
	        $userpassword=$row['userpassword'];
		}
	}
	if(isset($_POST['edit_user'])){
		
        $username=$_POST['username'];
        $user_role=$_POST['user_role'];
        $userpassword=$_POST['userpassword'];
		$userpassword=password_hash($userpassword,PASSWORD_BCRYPT,['aa'=>22]);
        $query="UPDATE `user` SET `username`='$username',`userpassword`='$userpassword',`userrole`='$user_role' WHERE user_id=$edit_id";
        $result=mysqli_query($connect,$query);
 		if(!$result){
 			die('failed');
 		}
 		header('location:user.php');
	}
 ?>
<form action="" method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label for="">User Name</label>
		<input type="text" class="form-control" name="username" value="<?php echo $username?>">
	</div>
	<div class="form-group">
		<label for="">User Role</label>
		<select name="user_role" class="form-control">
			<option value="<?php echo $user_role?>"><?php echo $user_role; ?></option>
			<?php 
				if($user_role=='admin'){
					echo "<option value='subscriber'>Subscriber</option>";
				}else{
					echo "<option value='admin'>Admin</option>";
				}
			 ?>
		</select>
	</div>
	<div class="form-group">
		<label for="">User Password</label>
		<input type="password" class="form-control" name="userpassword">
	</div>
	<div class="form-group">
		<input type="submit" class="btn btn-primary" name="edit_user" value="Update User">
	</div>
</form>
