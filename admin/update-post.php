<?php include "includes/header.php" ?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Blog Update Post</h1>
           <div class="row"> 
             <div class="col-md-12">

                <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Blog Update or Edit POst</h6>
                </div>

                  <?php 
                   if(isset($_GET['update'])){
                        $updatePost=$_GET['update'];
              $postEditquery="SELECT * FROM posts WHERE post_id='$updatePost'";
                        $connect_query=mysqli_query ($connect, $postEditquery);

                        while($row=mysqli_fetch_assoc($connect_query)){
                             

                             $postId             = $row['post_id'];
                             $postTittle         = $row['post_tittle'];
                             $postDesc           = $row['post_descraption'];
                             $postauthor         = $row['post_autor'];
                             $postThumb          = $row['post_thumb'];
                             $postCatagoryid      = $row['pos_catagory_id'];
                             $postComment         =$row['post_comment_count'];
                             $postTage           = $row['post_tag'];
                             $postStatus         = $row['post_status'];
                             $postDate           = $row['post_date'];
                             ?>

                                 <div class="card-body">
                  <!--  Start Form Add New Post--->
                        <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group"> 
                          <label> Post Tittle </label>
                          <input type="text" name="postTittle" class="form-control" value="<?php echo $postTittle; ?>">

                        </div>
                        <div class="form-group"> 
                          <label> Post Descraption </label>
                          <textarea name="postDescraption" class="form-control" value="<?php echo $postDesc; ?>"> </textarea>

                        </div>
                        <div class="form-group"> 
                          <label> Post Author </label>
                          <input type="text" name="postAuthor" class="form-control" value="<?php echo $postauthor; ?>">

                        </div> 
                        <div class="form-group"> 
                          <label> Post Thumb </label>
                          <img src="img/post-image/<?php echo $postThumb; ?>" width="200">
                          <input type="file" name="postThumb" class="form-control-file">

                        </div>
                        <div class="form-group"> 
                          <label> Post Catagory </label>
                          <input type="text" name="postCatagory" class="form-control" value="<?php echo $postCatagoryid; ?>">

                        </div>
                        <div class="form-group"> 
                          <label> Post Tags </label>
                          <input type="text" name="postTags" class="form-control" value="<?php echo $postTage; ?>" >

                        </div>  
                        <div class="form-group"> 
                          <input type="submit" name="submitBtn" value="Update Post" class="btn btn-danger">

                        </div> 


                        </form>
                           
                  <!-- End Form Add New Post --->
                </div>


                       <?php }

                   }


                  ?>
                 
                    
                
                
              </div> 

             </div>

           </div>

           <?php
           //For Edit Post 
           
            if(isset($_POST['submitBtn'])){
                 //form ar  input field
        $postTittle       = mysqli_real_escape_string($connect,$_POST['postTittle']);   
      $postDescraption  = mysqli_real_escape_string($connect, $_POST['postDescraption']);
          $postAutor        =    $_POST['postAuthor'];
          $postImage        =    $_FILES['postThumb']['name'];
          $postImage_temp   =    $_FILES['postThumb']['tmp_name'];
          $postCatagory     =    $_POST['postCatagory'];
          $postTags         =    $_POST['postTags'];
          move_uploaded_file($postImage_temp, "img/post-image/$postImage");

         $editPost="UPDATE posts SET  post_tittle='$postTittle',  post_descraption='$postDescraption',post_autor='$postAutor',  post_thumb='$postImage',pos_catagory_id='$postCatagory',  post_tag='$postTags' WHERE  post_id='$postId'";

          $editPost_connect=mysqli_query($connect,$editPost);
          if(!$editPost_connect){
              die("query faild".mysqli_error($connect));
          }
          else{
            header("location:all-post.php");
          }


      }

      ?>

        </div>
        <!-- /.container-fluid -->

      
      <!-- End of Main Content -->
      <?php include "includes/footer.php" ?>

      