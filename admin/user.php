<?php include "includes/header.php" ?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
<div class="container-fluid">

          <!-- Page Heading -->
   <h1 class="h3 mb-4 text-gray-800">View all Blog users</h1>


    <?php
       $do=isset($_GET['do'])? $_GET['do']:'Manage'; 

            if($do=='Manage'){?>

              <div class="row">
                    <div class="col-md-12"> 
                        <div class="card text-center">
                            <div class="card-header">
                              ALL User HERE
                            </div>
                            <div class="card-body">

                           <table class="table  table-striped">
                            <thead class="table-dark">
                              <tr>
                                <th scope="col">SI</th>
                                <th scope="col">Avatar</th>
                                <th scope="col">Full Name</th>
                                <th scope="col">User Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Phone</th>
                                 <th scope="col">Status</th>
                                <th scope="col">Role</th>
                                 <th scope="col">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php 
                                $user_query="SELECT *FROM users";
                                $query_connect=mysqli_query($connect,$user_query);
                                $i=0;
                                while($row=mysqli_fetch_assoc($query_connect)){
                                  $userId=$row['id'];
                                  $userAvatar=$row['avatar'];
                                  
                                  $userFullName=$row['name'];
                                  
                                  $userName=$row['user_name'];
                                  $userEmail=$row['email'];
                                  $userPhone=$row['phone'];
                                  $is_active=$row['is_active'];
                                  $userRole=$row['role'];
                                  $i++;

                                  ?>

                                   <tr>
                                <th scope="row"><?php echo $i; ?></th>
                                
                                <td>
                                  <?php 
                                  if(!empty($userAvatar)){?>
                                     <img src="img/avatar-image/<?php echo $userAvatar;?>" class="user-avatar">

                                <?php  }
                                else{?>
                                    <img src="img/avatar-image/default.jpg" class="user-avatar">
                               <?php }


                                  ?>
                                 
                                </td>
                                <td><?php echo $userFullName; ?></td>
                                <td><?php echo $userName; ?></td>
                                <td><?php echo $userEmail; ?></td>
                                <td><?php echo $userPhone; ?></td>
                                <td>
                                  
                              <?php 

                              if($userRole==0){
                              echo '<span class="badge badge-success">Adminstrator </span>';
                                  }

                                  else if($userRole==1){
                              echo '<span class="badge badge-primary">Editor</span>';
                                  }
                                   else {
                              echo '<span class="badge badge-success">suspen</span>';
                                  }

                                    ?>
                                </td>
                                <td>
                                  
                              <?php 

                              if($is_active==0){
                              echo '<span class="badge badge-success">Inactive </span>';
                                  }

                                  else if($is_active==1){
                              echo '<span class="badge badge-primary">Active</span>';
                                  }
                                   else {
                              echo '<span class="badge badge-success">suspen</span>';
                                  }

                                    ?>
                                </td>

                                <td> 
                                <div class="action-bar"> 
                                 <ul> 
                                  <li><i class="fa fa-eye"> </i> </li>
                                   <li><a href="user.php?do=Edit&update=<?php echo $userId;?>"> <i class="fa fa-edit"> </i></a> </li>

                                    <li> <i class="fa fa-trash" data-toggle="modal" data-target="#exampleModal<?php echo $userId; ?>"></i> </li>


                                 </ul>

                                </div>

                                     
                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal<?php echo $userId; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                      <div class="modal-dialog">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Do You Want to Delete</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>
                                          <div class="modal-body">
                                            
                                          </div>
                                          <div class="modal-footer">
                                            <a href="user.php?do=delete&delete=<?php echo $userId;?>" class="btn btn-danger">Yes</a>
                                            <button type="button" class="btn btn-primary" data-dismiss="modal">No</button>
                                            
                                          </div>
                                        </div>
                                      </div>
                                    </div>

                                  
                                                                     

                                </td>
                                
                              </tr>


                              <?php  }



                              ?>

                                
                               


                             
                              
                              
                            </tbody>
                          </table>
                                                                  
                              </div>
                              <div class="card-footer text-muted">
                               All User Show here
                              </div>
                            </div>

                      </div> 
                      <div class="useraddbutton"> 
                        <a href="user.php?do=Add" class="btn btn-primary">Add New User </a>

                      </div>

                   </div>     
                     
              
                     
           
           <?php }

            else if($do=='Add'){?>


              <div class="row"> 
                 <div class="col-md-12">
                   
                      <div class="card-header">
                            ALL User HERE
                           </div>
                        <div class="card-body">

                           <div class="container">
                             <div class="row"> 
                               <div class="col-md-6">
                                  <form action="?do=Insert" method="POST" enctype="multipart/form-data">

                                        <div class="form-group">
                                          <label>Full Name </label> 
                                          <input type="text" name="fname" class="form-control" required="required">
                                        </div>

                                         <div class="form-group">
                                          <label>User Name </label> 
                                          <input type="text" name="usname" class="form-control" required="required">
                                        </div>
                                         <div class="form-group">
                                          <label>Password </label> 
                                          <input type="password" name="password" class="form-control" required="required">
                                        </div>
                                         <div class="form-group">
                                          <label>Re-type Password </label> 
                                          <input type="password" name="repassword" class="form-control" required="required">
                                        </div>
                                         <div class="form-group">
                                          <label>Email Adress </label> 
                                          <input type="email" name="email" class="form-control" required="required">
                                        </div>
                                        


                               </div>
                                <div class="col-md-6"> 
                                       <div class="form-group">
                                          <label>Phone </label> 
                                          <input type="text" name="phone" class="form-control" required="required">
                                        </div>
                                        <div class="form-group">
                                          <label>Adress </label> 
                                          <input type="text" name="adress" class="form-control" required="required">
                                        </div>

                                  <div class="form-group">
                                    <label> User Role</label> 
                                    <select name="activeRole" class="form-control" >
                                      <option>Please Select Role </option>
                                <option value="0">Adminstrator </option>
                                      <option value="1">Editor</option>
                                      
                                    </select>
                                  </div>

                                  <div class="form-group">
                                    <label>Active status</label> 
                                    <select name="activeRole" class="form-control" >
                                      <option>Please Select Role </option>
                                <option value="0" <?php if($userRole==0){echo 'selected';} ?> >Inactive</option>
                                      <option value="1" <?php if($userRole==1){echo 'selected';}?>>Active</option>
                                      
                                    </select>
                                  </div>

                                        <div class="form-group">
                                          <label>User Profile </label> 
                                          <input type="file" name="avatar" class="form-control-file" required="required">
                                        </div>
                                        <div class="form-group"> 
                                          <input type="submit" name="submitbtn" value="Add New user" class="btn btn-primary">

                                        </div>

                           </form>

                                </div>
                             </div> 

                           </div>
                        </div>
                      </div>

                

              </div>
                    
                
         <?php }
            else if($do=='Insert'){?>

              
                  <div class="row">
                    <div class="col-md-12"> 
                      <?php 
                      
                        if($_SERVER['REQUEST_METHOD']=='POST'){
                         
                          $name       = $_POST['fname'];
                          $usernmae   = $_POST['usname'];
                          $pasword    = $_POST['password'];
                          $repasword  = $_POST['repassword'];
                          $useremail  = $_POST['email'];
                          $userphone  = $_POST['phone'];
                          $useradress = $_POST['adress'];
                          $userrole   = $_POST['activeRole'];

                          $userAvatar = $_FILES['avatar'];
                          $userAvatarname = $_FILES['avatar']['name'];
                          $userAvatarsize = $_FILES['avatar']['size'];
                          $userAvatartype   = $_FILES['avatar']['type'];
                          $avatartmp        =$_FILES['avatar']['tmp_name'];
                          $avatarallowexetension=array("jpg","jpeg","png");
                          $avatarexetension= strtolower( end(explode('.',  $userAvatarname) ) );

                            $fromerror=array();

                            if(strlen($usernmae)<4){
                              $fromerror='your user name is small ';
                            }
                            if($pasword != $repasword){
                              $fromerror='your password does not match';
                            }
                            if(empty(!$userAvatarname) && !in_array($avatarexetension,$avatarallowexetension)){
                              $fromerror='please upload your valid image';
                            }
                            if(empty(!$userAvatarsize) &&$userAvatarsize>2097152) {
                              $fromerror='your image size is big';
                            }


                            foreach ($fromerror as $error) {
                              echo '<div class="alert alert-danger">'. $error.' </div>';
                            }
                            if(empty($fromerror)){
                              $ranavatar=rand(0,200000).'_'.$userAvatarname;
                                move_uploaded_file($avatartmp, "img\avatar-image\\".$userAvatar);

                          $userquery="INSERT INTO users(name,user_name,password,email,  phone,adress,avatar,role,join_date) VALUES(' $name','$usernmae','$pasword','$useremail','$userphone','$useradress', '$userAvatarname','$userrole',now())";
                          $queryconnect=mysqli_query($connect,$userquery);
                             if(!$queryconnect){
                              die("query faild".mysqli_error($connect));
                            }
                            else{
                              header("location:user.php?do=Manage");
                            }
                            }


                          
                          
                           
                          
                        }

                      ?>

                    </div> 
                  </div>
              

           <?php }

            else if($do=='Edit'){
                 if(isset($_GET['update'])){
                      $userupdate=$_GET['update'];
                      $updatequery="SELECT *FROM users WHERE id= '$userupdate'";
                      $queryConnect=mysqli_query($connect,$updatequery);
                      while($row=mysqli_fetch_assoc($queryConnect)){
                             
                                $userId=$row['id'];
                                $userAvatar=$row['avatar'];
                                
                                $userFullName=$row['name'];
                                
                                $userName=$row['user_name'];
                                $userEmail=$row['email'];
                                $userPhone=$row['phone'];
                                $userAdress=$row['adress'];
                                $userRole=$row['role'];

                                ?>



                             <div class="row"> 
                 <div class="col-md-12">
                   
                      <div class="card-header">
                            ALL User Update HERE
                           </div>
                        <div class="card-body">

                           <div class="container">
                             <div class="row"> 
                               <div class="col-md-6">
                                  <form action="?do=update" method="POST" enctype="multipart/form-data">

                                        <div class="form-group">
                                          <label>Full Name </label> 
                                          <input type="text" name="fname" class="form-control" required="required" value="<?php echo $userFullName; ?>">
                                        </div>

                                         <div class="form-group">
                                          <label>User Name </label> 
                                          <input type="text" name="usname" class="form-control" required="required" value="<?php echo $userName; ?>">
                                        </div>
                                         
                                         
                                         <div class="form-group">
                                          <label>Email Adress </label> 
                                          <input type="email" name="email" class="form-control" required="required" value="<?php echo $userEmail; ?>">
                                        </div>
                                        


                               </div>
                                <div class="col-md-6"> 
                                       <div class="form-group">
                                          <label>Phone </label> 
                                          <input type="text" name="phone" class="form-control" required="required" value="<?php echo $userPhone;?>">
                                        </div>
                                        <div class="form-group">
                                          <label>Adress </label> 
                                          <input type="text" name="adress" class="form-control" required="required" value="<?php echo $userAdress; ?>">
                                        </div>
                                        <div class="form-group">
                                          <label>Role</label> 
                                          <select name="activeRole" class="form-control" >
                                            <option>Please Select Role </option>
                                            <option value="0"

                                            <?php if($userRole==0){

                                               echo 'selected';
                                            } ?>

                                          >Adminstrator</option>
                                            <option value="1"
                                             <?php if($userRole==1){

                                               echo 'selected';
                                            } ?>

                                            >Editor</option>
                                            
                                          </select>
                                        </div>

                                        <div class="form-group">
                                          <label>User Profile </label> 
                                          <img src="img/avatar-image/<?php echo $userAvatar ?>">;
                                        </div>
                                        <div class="form-group"> 
                                          <input type="hidden" name="updateUserid" value="<?php echo $userId;  ?>">
                                          <input type="submit" name="submitbtn" value="Save And Change" class="btn btn-primary">

                                        </div>

                           </form>

                                </div>
                             </div> 

                           </div>
                        </div>
                      </div>

                

              </div>
                    


                      <?php }
                 }
            }

            else if($do=='update'){?>
                 <div class="row"> 
                   <div class="col-md-12">
                     <div class="card-body">
                      <?php 

                       if( $_SERVER['REQUEST_METHOD'] == 'POST'){
                          $updateuserid=$_POST['updateUserid'];
                           $name      = $_POST['fname'];
                          $usernmae   = $_POST['usname'];
                          $pasword    = $_POST['password'];
                          $repasword  = $_POST['repassword'];
                          $useremail  = $_POST['email'];
                          $userphone  = $_POST['phone'];
                          $useradress = $_POST['adress'];
                          $userrole   = $_POST['activeRole'];

                          $userAvatar = $_FILES['avatar'];
                          $userAvatarname = $_FILES['avatar']['name'];
                          $userAvatarsize = $_FILES['avatar']['size'];
                          $userAvatartype   = $_FILES['avatar']['type'];
                          $avatartmp        =$_FILES['avatar']['tmp_name'];
                          $avatarallowexetension=array("jpg","jpeg","png");
                          $avatarexetension= strtolower( end(explode('.',  $userAvatarname) ) );

                            $fromerror=array();

                            if(strlen($usernmae)<4){
                              $fromerror='your user name is small ';
                            }
                            if($pasword != $repasword){
                              $fromerror='your password does not match';
                            }
                            if(empty(!$userAvatarname) && !in_array($avatarexetension,$avatarallowexetension)){
                              $fromerror='please upload your valid image';
                            }
                            if(empty(!$userAvatarsize) &&$userAvatarsize>2097152) {
                              $fromerror='your image size is big';
                            }


                            foreach ($fromerror as $error) {
                              echo '<div class="alert alert-danger">'. $error.' </div>';
                            }
                            if(empty($fromerror)){
                              $ranavatar=rand(0,200000).'_'.$userAvatarname;
                                move_uploaded_file($avatartmp, "img\avatar-image\\".$userAvatar);

                          

                          //exsting query for image delete
                          $sec_query="SELECT *FROM users WHERE id='$updateuserid'";
                          $sec_queryConnect=mysqli_query($connect,$sec_query);

                          while($row=mysqli_fetch_assoc($sec_queryConnect)){
                                $userAvatarexist=$row['avatar'];
                          }
                          unlink("img/avatar-image".$userAvatarexist);

                          $userquery="UPDATE users SET name='$name',user_name='$usernmae',email='$useremail',  phone='$userphone',adress='$useradress',avatar='$userAvatarname',role='$userrole' WHERE id='$updateuserid' "; 

                          $queryconnect=mysqli_query($connect,$userquery);
                         

                             if(!$queryconnect){
                               die("query faild".mysqli_error($connect));
                             }
                             else{
                               header("location:user.php?do=Manage");
                             }
                           }
                           





                       }
                      ?>
                     </div>
                   </div>
                 </div>
           <?php }
            else if($do=='delete'){

                           if(isset($_GET['delete'])){
                            $deleteid=$_GET['delete'];
                            $delimage_query="SELECT *FROM users WHERE id='$deleteid'";
                            $delimg_queryConnect=mysqli_query($connect,$sec_query);

                          while($row=mysqli_fetch_assoc($delimg_queryConnect)){
                                $userAvatarexist=$row['avatar'];
                          }
                          unlink("img/avatar-image".$userAvatarexist);
                          $deleteuser="DELETE FROM users WHERE id='$deleteid'";
                          $queryconnect=mysqli_query($connect,$deleteuser);
                          if(!$queryconnect){
                            die("query faild".mysqli_eror($connect));
                          }
                          else{
                            header("location:user.php?do=Manage");
                          }


                           }


                          
            }
  
           ?>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
      <?php include "includes/footer.php" ?>

      