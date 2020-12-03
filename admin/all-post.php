<?php include "includes/header.php" ?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">View all Blo Post</h1>
           <div class="row"> 

                
               
           	 <div class="col-md-12">

           	    <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Blog All POst</h6>
                </div>
                 

                 <?php ?>

                    <div class="card-body">
                  <!-- View All Post--->
                        
                           <table class="table table-striped">
							  <thead class="grey lighten-2">
							    <tr>
							      <th  scope="col">SI</th>
							      <th scope="col">Title</th>
							      <th scope="col">Author</th>
							      <th scope="col">Post Catagory</th>
							      <!--- <th scope="col">Thumbanil</th> --->
							      <!---<th scope="col">Post status</th> --->
							      <th scope="col">Date</th>
							      <th scope="col">Edit</th>
							      <th scope="col">Delete</th>

							    </tr>
							  </thead>
							  <tbody>

							  	<?php 
                                 
                                 $postView_query="SELECT *FROM posts";
                                 $viewquery_connect=mysqli_query($connect,$postView_query);
                                 $i=0;

                             while($row=mysqli_fetch_assoc($viewquery_connect)){
                                $i++;
                                //table filed ar num
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


                                    <tr>
							      <th scope="row"><?php echo $i; ?></th>
							      <td><?php echo $postTittle; ?></td>
							      <!--<td><?php echo  $postDesc; ?></td>-->
							      <td><?php echo  $postauthor; ?></td>
							      <td><?php echo  $postCatagoryid; ?></td>
							      <td><?php echo  $postDate; ?></td>
							      
							      
							      <td>
							      	<div class="btn-group">
                          <a href="update-post.php?update=<?php echo $postId ;?>" class="btn btn-success">Edit </a>
							      	 </div>

							      </td>
							      <td>
							      	<div class="btn-group">
                       <a href="all-post.php?delete=<?php echo  $postId; ?>" class="btn btn-danger">Delete </a>
							      	 </div>

							      </td>


							    </tr>


                                <?php }

							  	?>
							    
							    
							    
							  </tbody>
							</table>
                  <!-- View all post end --->
                </div>
                
                
              </div> 

           	 </div>

           </div>

           <?php 
           if(isset($_GET['delete'])){
                 $deletPost= $_GET['delete'];
                 $deletequery="DELETE FROM posts WHERE 	  post_id='$deletPost' ";
                 $query_connect=mysqli_query($connect, $deletequery);
                if(!$query_connect){
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

      