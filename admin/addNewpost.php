<?php include "includes/header.php" ?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Added Blog New Blo Post</h1>
           <div class="row"> 
           	 <div class="col-md-12">

           	    <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Blog New  POst</h6>
                </div>
                 
                    <div class="card-body">
                  <!--  Start Form Add New Post--->
                        <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group"> 
                        	<label> Post Tittle </label>
                        	<input type="text" name="postTittle" class="form-control">

                        </div>
                        <div class="form-group"> 
                        	<label> Post Descraption </label>
                        	<textarea name="postDescraption" class="form-control"> </textarea>

                        </div>
                        <div class="form-group"> 
                        	<label> Post Author </label>
                        	<input type="text" name="postAuthor" class="form-control">

                        </div> 
                        <div class="form-group"> 
                        	<label> Post Thumb </label>
                        	<input type="file" name="postThumb" class="form-control-file">

                        </div>
                        <div class="form-group"> 
                        	<label> Post Catagory </label>
                        	<select class="form-control" name="post_catagory"> 
                            <option >Please Select Post Catagory</option>
                           <?php 
                             $showcatagory ="SELECT * FROM   catagories";
                             $queryConnect = mysqli_query($connect,$showcatagory);
                             while($row=mysqli_fetch_assoc($queryConnect)){
                                    $catagoriid     =   $row['Cat_id'];
                                    $catagoryName   =   $row['Cat_name'];
                                    ?>
                                
                               <option value="<?php  echo $catagoriid ; ?>"><?php echo $catagoryName; ?></option>
                               
                                 

                            <?php }

                            
                           ?>

                          </select>

                        </div>
                        <div class="form-group"> 
                        	<label> Post Tags </label>
                        	<input type="text" name="postTags" class="form-control">

                        </div>  
                        <div class="form-group"> 
                        	<input type="submit" name="submitBtn" value="publish Post" class="btn btn-danger">

                        </div> 


                        </form>
                           
                  <!-- End Form Add New Post --->
                </div>
                
                
              </div> 

           	 </div>

           </div>

           <?php
            if(isset($_POST['submitBtn'])){
                 //form ar  input field
                 $postTittle       =    $_POST['postTittle'];
                 $postDescraption  =    $_POST['postDescraption'];
                 $postAutor        =    $_POST['postAuthor'];
                 $postImage        =    $_FILES['postThumb'];
                 $postImageNmae    =    $_FILES['postThumb']['name'];
                 $postImage_size   =    $_FILES['postThumb']['size'];
                 $postImage_type   =    $_FILES['postThumb']['type'];
                 $postImage_temp   =    $_FILES['postThumb']['tmp_name'];
                 $postCatagory     =    $_POST['postCatagory'];
                 $postTags         =    $_POST['postTags'];

                 $postallowextension=array("jpg","jpeg","png");
                 $postExetension=strtolower(end(explode('.', $postImageNmae)));
                 $formerror=array();
                 if(empty($postImageNmae)){
                     $formerror='<div class="alert-alert-danger">Please Upload your Post Image </div>' ;   
                 }

                 if(!empty($postImageNmae) && !in_array($postExetension,$postallowextension)) {
                         $formerror='<div class="alert-alert-danger">Please Upload jpeg,png, Image </div>';    
                 }
                 if(strlen($postTittle<10)){
                  $formerror='<div class="alert alert-danger">Post Ttittle is small  </div>';
                 }
                 foreach ($formerror as $error) {
                   echo '<div>. $formerror. </div>';
                 }
                 if(!empty($postImageNmae)){
                  $postImage=rand(0,10000).'_'.$postImageNmae;

                  move_uploaded_file($postImage_temp, "img/post-image/$postImage");

                $post_query="INSERT INTO posts (post_tittle, post_descraption,  post_autor, post_thumb, pos_catagory_id, post_tag, post_date) VALUES ('$postTittle','$postDescraption','$postAutor','$postImage','$postCatagory','$postTags', now())";

                $post_query_connect=mysqli_query($connect,$post_query);
                if(!$post_query_connect){
                    die("query faild".mysqli_error($connect));
                }
                else{
                  header("location:all-post.php");
                }


                 }
                


            }

            ?>

        </div>
        <!-- /.container-fluid -->

      
      <!-- End of Main Content -->
      <?php include "includes/footer.php" ?>

      