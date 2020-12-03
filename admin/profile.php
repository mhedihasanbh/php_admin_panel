<?php include "includes/header.php" ?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">user profile update</h1>
          <div class="row"> 
            <div class="col-md-4">

              <div class="card" style="width: 18rem;">
                
                <div class="card-body">
                        <?php 
                   $userid=$_SESSION['userId'];
                   $userquery="SELECT *FROM users WHERE id='$userid'";
                   $query_connect=mysqli_query($connect,$userquery);
                   while($row=mysqli_fetch_assoc($query_connect)){
                        $userId=$row['id'];
                        $userAvatar=$row['avatar'];
                        
                        $userFullName=$row['name'];
                        
                        $userName=$row['user_name'];
                        $userEmail=$row['email'];
                        $userPhone=$row['phone'];
                        $userAdress=$row['adress'];
                        $userRole=$row['role'];
                   }



                   ?>
                   <?php 
                if(!empty($userAvatar)){ ?>
                  <img class="img-profile rounded-circle" src="img/avatar-image/<?php echo $userAvatar;?>">

                <?php }
                else{ ?>
                  <img class="img-profile rounded-circle" src="img/avatar-image/default.jpg">
                  
                <?php }

                ?>
                   <!-- img src="img/avatar-image/<?php echo $userAvatar; ?>" class="img-fluid" > -->
                   <h3> <span>Name:</span><?php echo $userFullName; ?> </h3>
                   <h4> <span>Email:</span> <?php echo $userName; ?> </h4>
                   <h4> <span>ueser:</span> <?php echo $userFullName; ?> </h4>
                   <h4> <span>Adress:</span> <?php echo $userAdress; ?> </h4>
                   <h4> <span>Phone:</span> <?php  echo $userPhone; ?> </h4>
                   
                  
                </div>
              </div>
              
                   

              
            </div>
             <div class="col-md-8">
                 <div class="card" >
                
                <div class="card-body">
                    <?php 
                   $userid=$_SESSION['userId'];
                   $userquery="SELECT *FROM users WHERE id='$userid'";
                   $query_connect=mysqli_query($connect,$userquery);
                   while($row=mysqli_fetch_assoc($query_connect)){
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
                         
                              <div class="col-md-6">
                                  <form action="?do=update" method="POST" enctype="multipart/form-data">

                                        <div class="form-group">
                                          <label>Full Name </label> 
                                          <input type="text" name="fname" class="form-control" required="required" value="<?php echo $userFullName; ?>">
                                        </div>

                                         <div class="form-group">
                                          <label>User Name </label> 
                                          <input  name="usname" class="form-control" required="required" value="<?php echo $userName; ?>"  readonly>
                                        </div>
                                         
                                         
                                         <div class="form-group">
                                          <label>Email Adress </label> 
                                          <input  name="email" class="form-control" required="required" value="<?php echo $userEmail; ?>" readonly>
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
                                          <label>User Profile </label> 
                                          <?php
                                          if(!empty($userAvatar)){ ?>
                                            <img src="img/avatar-image/<?php echo $userAvatar ?>" width="40" ><br>

                                          <?php } 

                                          ?>
                                          
                                          <input type="file"  name="avatar" class="form-control-file">
                                        </div>
                                        <div class="form-group"> 
                                          <input type="hidden" name="updateUserid" value="<?php echo $userId;  ?>">
                                          <input type="submit" name="submitbtn" value="Save And Change" class="btn btn-primary">

                                        </div>

                           </form>


                                </div>

                          

                        </div>


                      
                  <?php }



                   ?>
                   
                   
                  
                </div>
              </div> 


             </div>

          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
      <?php include "includes/footer.php" ?>
