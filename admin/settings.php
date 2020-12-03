<?php include "includes/header.php" ?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Website Setting Logo and Favicon</h1>

         <!---website logo and favicon upload start   --->
             <div class="row">
              <div class="col-md-12">
                <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Logo And Favicon Upload</h6>
                </div>
                <div class="card-body">

                <form action="" method="POST" enctype="multipart/form-data"> 
                  <div class="form-group">
                    <label>Upload Logo </label>
                   <input type="file" name="logo" class="form-control-file"> 

                  </div>
                  <div class="form-group">
                    <label>Upload Favicon </label>
                   <input type="file" name="favicon" class="form-control-file"></div>
                   <div class="form-group">
                    
                   <input type="submit" name="sub_btn" value="save" class="btn btn-primary"></div>

                </form> 
              </div>
              

             </div>

             <?php 

                   if(isset($_POST['sub_btn'])){
                      $logo         = $_FILES['logo'];
                      $logoname     = $_FILES['logo']['name'];
                      $logotmp      =$_FILES['logo']['tmp_name'];

                      $favicon      = $_FILES['favicon'];
                      $favname      = $_FILES['favicon']['name'];
                      $favtmp       =$_FILES['favicon']['tmp_name'];

                      $randlogo=rand(0,200000). '_' . $logoname;
                      $randfavicon=rand(0,200000). '_' . $favname;


                      move_uploaded_file($logotmp, "img\\".$logoname);
                      move_uploaded_file($favtmp, "img\\".$favname);
                      // $query="INSERT INTO settings(logo,favicon) VALUES('$logoname','$favname') ";
                      $query="UPDATE settings SET logo='$randlogo', favicon='$randfavicon' WHERE set_id = 1 ";
                      $queryconnect=mysqli_query($connect,$query);
                      if(!$queryconnect){
                        die("query faild".mysqli_error($connect));
                      }
                      else{
                        header("location:settings.php");
                      }

                   }
             ?>

          <!---website logo and favicon upload end  --->

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
      <?php include "includes/footer.php" ?>

      