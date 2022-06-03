<div class="col-md-12">
                        <table class="table table-responsive table-hover table-bordered">
                            <tr>
                                <th>No:</th>
                                <th>User Name</th>
                                
                                <th>Email</th>
                                <th>Role</th>
                                <th>Admin</th>
                                <th>Subscriber</th>
                                <th>Update</th>
                                <th>Delete</th>
                            </tr>
                            <?php 
                                $no=1;
                                $query="SELECT * FROM `user`";
                                $result=mysqli_query($connect,$query);
                                while($row=mysqli_fetch_assoc($result)){
                                	$user_id=$row['user_id'];
                                    $user_name=$row['username'];
                                	
                                    $user_email=$row['useremail'];
                                    $user_role=$row['userrole'];
                             ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $user_name ?></td>
                                
                                <td><?php echo $user_email ?></td>
                                <td><?php echo $user_role ?></td>
                                <td><a href="user.php?admin=<?php echo $user_id ?>" class="btn btn-success">Admin</a></td>
                                <td><a href="user.php?subscriber=<?php echo $user_id ?>" class="btn btn-warning">Subscriber</a></td>
                                <td><a href="user.php?source=edit_user&edit=<?php echo $user_id ?>" class="btn btn-primary">Update</a></td>
                                <td><a href="user.php?delete_id=<?php echo $user_id ?>" class="btn btn-danger">Delete</a></td>
                                 
                            </tr>
                            <?php 
                                }
                             ?>
                        </table>
                    </div>

                    <?php 
                        if(isset($connect,$_GET['delete_id'])){
                            $delete_id = mysqli_real_escape_string($connect,$_GET['delete_id']);
                            
                            $query="DELETE FROM `user` WHERE user_id=$delete_id";
                            mysqli_query($connect,$query);
                            header('location:user.php');
                        }
                        if(isset($connect,$_GET['admin'])){
                            $admin = mysqli_real_escape_string($connect,$_GET['admin']);
                            
                            $query="UPDATE `user` SET `userrole`='admin' WHERE user_id=$admin";
                            mysqli_query($connect,$query);
                            header('location:user.php');
                        }
                        if(isset($connect,$_GET['subscriber'])){
                            $subscriber = mysqli_real_escape_string($connect,$_GET['subscriber']);
                            
                            $query="UPDATE `user` SET `userrole`='subscriber' WHERE user_id=$subscriber";
                            mysqli_query($connect,$query);
                            header('location:user.php');
                        }
                     ?>