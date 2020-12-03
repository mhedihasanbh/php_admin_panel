<?php include "includes/header.php" ?>
        <!-- End of Topbar -->
       <!-- Add New catagory added--->

       <?php
       add_catagory();

       ?>



        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">View all Catagory</h1>

           <div class="row"> 
             <!---Add catagory colum start --->
             <div class="col-lg-4"> 
                <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Add Catagory</h6>
                </div>
                <div class="card-body">
                  <!-- Catagory From satart--->
                  <form action="" method="post">
                    <div class="form-group">
                      <label> Add Catagory</label> 
                      <input type="text" name="catagory_name" class="form-control" autocomplete="off">

                    </div>

                    <div class="form-group">
                     
                      <input type="submit" name="catagory_btn" class="btn btn-primary" value="Add catagory">

                    </div>  

                  </form>

                  <!-- Catagory From end--->

                  <?php  //echo $message;?>
                </div>
              </div>
              <!-- catagory update-->
              <?php 
               if(isset($_GET['update'])){

                      $cat_id= $_GET['update'];
                      include "includes/updateCatagory.php";
                    }

              ?>

             </div>
            <!---Add catagory colum end  --->
            <!--- Ctagory table view table colum start------>

             <div class="col-lg-8">
             <h1 class="text-center">SOB CATAGORY DEKTE PARBEN AKANE </h1> 
                <table class="table table-striped"> 
                   <thead class="thead-dark">
                      <tr> 
                         <th scope="col">Catagory Serial</th>
                         <th scope="col"> Catagory Name</th>
                         <th scope="col">Id</th>
                         <th scope="col">Edit</th>
                         <th scope="col">Delete</th>
                       </tr> 
                     </thead>
                     <tbody>
                     <!----  database theke catagory tole anar jonno use  ---> 
                      <?php 
                         view_catagory();
                      ?>


                    




                  </tbody>



               </table>

             </div>
            <!--- Ctagory table view table colum end------>
           </div>

            


          

          
        </div>
        <!-- /.container-fluid -->
      </div>
      <!----catagory Edit and update field ---->
      <?php 
        if(isset($_POST['editcatagory_btn'])){
                 $catName=$_POST['catagory_name'];

                 $query="UPDATE  catagories SET  Cat_name=' $catName' WHERE   Cat_id =' $cat_id'";
                 $update_catagory=mysqli_query($connect,$query);
                 if(!$update_catagory){
                  die("query faild".mysqli_error($connect));
                 } 
                 else{
                  header("location:all-catagories.php");
                 }      
        }


      ?>

      <!--   Delete catagory query-->

      <?php 

        delete_catagory();
      ?>

      
      <!-- End of Main Content -->
      <?php include "includes/footer.php"; ?>

      