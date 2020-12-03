
<!-- Add new or insert catagory form database this function---->   
<?php 
function add_catagory(){
      global$connect;
	  //$message=""; 
         if(isset($_POST['catagory_btn'])){
                 //from ar name asce akane
                $catagory_name=$_POST['catagory_name'];
                if(empty($catagory_name)){
                  $message='<div class="alert alert-warning">PLease can not empty catagory name  </div>';
                }
                else{
                  $query="INSERT INTO catagories (Cat_name) Values('$catagory_name') ";
                  $addcatagory=mysqli_query($connect,$query);
                  if(!$addcatagory){
                    die("query connection faild".mysqli_error($connect));
                  }
                  else{
                    $message='<div class="alert alert-success">Catagory Added Sucessfully </div>';
                    header("location:all-catagories.php");
                  }
                }
             }
           }



           //Delete catagory function
           function delete_catagory(){
                 global$connect;
           	   if(isset($_GET['delete'])){
               $delcatid=$_GET['delete'];  
               $query="DELETE FROM catagories WHERE Cat_id=$delcatid";
               $deletquery=mysqli_query($connect,$query);

               if(!$deletquery){
                die("query faild".mysqli_error($connnect));
               }
               else{
                header("location:all-catagories.php");
               }
        }
           }


           //viwe catagory function

           function view_catagory(){
                   global$connect;
           	    $query="SELECT * FROM catagories";
                         $selectCatagories=mysqli_query($connect,$query);
                         $i=0;
                         while($row=mysqli_fetch_assoc($selectCatagories)){
                          //table ar filed ar name
                             $i++;
                            $catid= $row['Cat_id'];
                            $cateName= $row['Cat_name'];
                            ?>


                           

                             <tr> 
                                <td><?php echo $i;?> </td>
                                <td><?php echo $cateName;?> </td>
                                
                                <td scope="row"><?php echo $catid; ?> </td>
                                <td> 
                                   <div class="btn-group"> 
                                    <a href="all-catagories.php?update=<?php  echo $catid;?>" class="btn btn-primary btn-sm">Edit </a>
                                    
                                  </div>
                                  
                                </td>
                                <td> 
                                   <div class="btn-group"> 
                                    
                                    <a href="all-catagories.php?delete=<?php echo $catid; ?>" class="btn btn-warning btn-sm">DElete </a>
                                  </div>
                                </td>
                            <
                        <?php }

           }

?> 


