<?php

   $query="SELECT * From catagories WHERE  Cat_id=$cat_id";
                      $select_catagory_id=mysqli_query($connect,$query);
                      while($row=mysqli_fetch_assoc($select_catagory_id)){
                             //table ar field name
                             $cat_id=$row['Cat_id'];
                             $cat_name=$row['Cat_name'];
                      }


                ?>

              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary"> Edit Catagory</h6>
                </div>
                <div class="card-body">
                  <!-- Catagory From satart--->
                  <form action="" method="post">
                    <div class="form-group">
                      <label> Edit Catagory</label> 
                      <input type="text" name="catagory_name" class="form-control" autocomplete="off" value="<?php echo $cat_name; ?>">

                    </div>

                    <div class="form-group">
                     
                      <input type="submit" name="editcatagory_btn" class="btn btn-primary" value="Update catagory">

                    </div>  

                  </form>

                  <!-- Catagory From end--->

                  
                </div>
              </div>     

              <?php }

 ?>