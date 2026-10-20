<?php
include 'header.php';
$msg ="";
$msgt = "";

$name = "";
 $author ="";
 $featured_image = "";
 $page_type = "";
 
  $body = "";
  $id = "";
   $occupation = "";

  if(isset($_GET['e'])){
    $id = $_GET['e'];
     $sql = "SELECT * FROM testimonies where id = '$id'";
   $result = mysqli_query($con,$sql);
   while ($row = mysqli_fetch_array($result)) {
    //$author =  $row['author'];
    $body = strip_tags($row['body']);
    $name = $row['name'];
     $featured_image = $row['featured_image'];
     $occupation = $row['occupation'];
     // code...
   }

  }
if(isset($_POST['post'])){

  $occupation = "Occupation";//$_POST['occupation'];
  $name = $_POST['name'];
  $body = $_POST['body'];
  $featured_image = $_FILES['featured_image'];

   ///$page_link = str_replace(" ",s"-",strtolower($title));

   if(strlen($name)>2){
    if(strlen($body)>2){
     /// echo $body;

      if(strlen($occupation)>2){
         
          $allowed = array('gif', 'png', 'jpg', 'jpeg');
$filename = $_FILES['featured_image']['name'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);
//$ext, $allowed
if (in_array(1==1)) {
   
   

$location = "../uploads/".$filename;
   move_uploaded_file($_FILES['featured_image']['tmp_name'],$location);
   $post_date = date("Y M j");

   $sql = "INSERT INTO testimonies(name,featured_image,body,occupation,post_date)
                          values('$name','$filename','$body','$occupation','$post_date')";
    $result = mysqli_query($con,$sql) or die("cant post".mysqli_error($con));
    if($result){
      $msg = "successful <br>";
    $msgt = "success";

    }else{
      $msg = "An error occoured";
    $msgt = "danger";

    }

   


  


}else{

    $msg = "featured image fomat not allowed";
    $msgt = "danger";

}


        

   


    }else{
    $msg = "occupation type too short";
    $msgt = "danger";

   }

    }else{
    $msg = "Body too short";
    $msgt = "danger";

   }
   }else{
    $msg = "Name too short";
    $msgt = "danger";

   }
}



if(isset($_GET['d'])){
    $id = $_GET['d'];
  
    $sql = "DELETE FROM testimonies where id = '$id'";
  $result = mysqli_query($con,$sql) or die("Cant delete ".mysqli_error($con));
     if($result){
  
              $msg =  '<div class="alert alert-success text-center">SUCCESSFULLY DELETED</div>';
           }else{
              $msg = '<div class="alert alert-danger text-center"> ERROR: USER CANT BE DELETED</div>';
           }
  
  }
  

?>
                <!-- Start content -->
                <div class="content">
                    <div class="container-fluid">

                        <!-- Page-Title -->
                        
<div class="row">

   <div class="alert alert-<?php echo $msgt ?>"> <?php echo $msg ?></div>
   
                        </div>

                        <!-- Start Widget -->
                        <!--Widget-4 -->
                        <div id="usd" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none">
                                          
                                        </div>
                        
                        
                        <!-- CONFIRM DELETE MODAL-->
                        <div id="del_tra" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none">
                                            <!-- /.modal-dialog -->
                                        </div>
                        
                        <button style="display: none;" type="button" id="show_tra" data-toggle="modal" data-target="#usd"></button>
                        <button style="display: none;" type="button" id="show_del" data-toggle="modal" data-target="#del_tra"></button>
                        
                        <!-- End row-->
                                                
                                                <div class="row">
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-header bg-primary">
                                        <h3 class="card-title text-white">Create New Testimonial</h3>
                                    </div>
                                    <div class="card-body">
                                        <form method="post" action="" enctype="multipart/form-data">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                <label>Photo of User(optional)</label><em class='text-primary'> </em>
                                                <div class=" mt-3">
                                                    <div>
                                                        <span class="img-div">
              <div class="text-center img-placeholder"  onClick="triggerClick('#getcatimage')" style="height: 200px; width: 200px;">
                
              </div>
                                                            <img src="assets/choose.jpg" onClick="triggerClick('#getcatimage')" id="dispcatimage" class='profileDisplay' style="height: 200px; width: 200px;">
                                         </span>
                                                        <input type="file" name="featured_image" onChange="displayImage(this,'#dispcatimage')" id="getcatimage" class="form-control" style="display:none;">
                                                    </div>
                                                </div>
                                            </div>
                                                </div>
                                            <div class="col-md-12">
                                            <div class="form-group">
                                                <label >Name Of User</label>
                                                <input type="text" class="form-control" name="name" placeholder="Name Of User">
                                            </div>
                                            </div>
                                            <div class="col-md-12">
                                            
                                            <div class="form-group">
                                                <label >Testimony</label>
                                                <textarea type="number" class="form-control" rows="5" name="body" placeholder="Write Testimony"></textarea>
                                            </div>
                                            </div>
                                            </div>
                                            <div class="text-center">
                                            <button type="submit" name="post" class="btn btn-primary waves-effect waves-light">Create Testimony</button>
                                            </div>
                                        </form>
                                    </div><!-- card-body -->
                                </div> <!-- card -->
                            </div> <!-- end col -->
                        </div>
                        
                        <div class="row">
                            <!-- INBOX -->
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header bg-primary">
                                        <h3 class="card-title text-white">Testimonials</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-12">
                                                <div class="table-responsive">
                                                <table id="datatable" class="table table-striped  table-bordered nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                    <thead>
                                                        <tr>
                                                            <th>SN</th>
                                                            <th>Name</th>
                                                            <th>Testimony</th>
                                                            <th>View/Delete</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                    <?php  

     $sql = "SELECT * FROM testimonies order by id desc";
      $sn = 1;
     $result = mysqli_query($con,$sql) or die("cant select members ".mysqli_error($con));
     while ($row = mysqli_fetch_array($result)) {
        // $author =  $row['author'];
    $body = strip_tags($row['body']);
    $name = $row['name'];
    $occupation = $row['occupation'];
    $featured_image = $row['featured_image'];
    // $link = $row['title'];
      $id = $row['id'];



        # code...
    

     ?>
                                                        
                                                        <tr>
                                                            <td><?php echo $sn++; ?></td>
                                                            
                                                            <td><?php echo substr($name, 0,30); ?></td>
                                                            <td><?php echo $body; ?></td>
                                                                <td>
                                                                  <button name="delete" type="submit" class="btn btn-danger"> Delete Testimoy</button>
                                                                </td>
                                                        </tr>

                                                        <?php } ?>
                                                        
                                                        
                                                       
                                                    </tbody>
                                                </table>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- end col -->

                            <!-- CHAT -->
                            <!-- end col-->


                            <!-- TODOs -->
                             <!-- end col -->
                        </div>
                                                
                        
                                                
                        
                                                
                                            </div> <!-- container -->
                               
                </div> <!-- content -->
<?php

require "footer.php";

?>