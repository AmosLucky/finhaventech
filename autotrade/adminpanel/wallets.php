<?php

require "header.php";
$msg = "";
$mst = "";


$msg = "";
 $name = "";
  $address =  "";
  $qr_code = "";

  if(isset($_GET['v'])){
    $id = $_GET['v'];

    $sql = "SELECT * FROM payment_methods where id = '$id'";
     $result = $con -> query($sql);
     while ($row = $result -> fetch_array()) {
      $name = $row['name'];
       $address = $row['address'];
      $qr_code = $row['qr_code'];
      
     }
  

  }


  if(isset($_POST['suspend'])){

    $id = $_POST['id'];
    $reason = $_POST['suspend'];
    $sql = "DELETE from payment_methods  where id = '$id' ";
    $result = mysqli_query($con,$sql);
    if( $result){
      $msg = '<div class="alert alert-success">Successfully deleted</div>';
    }else{
     $msg = '<div class="alert alert-danger">Failed</div>';
  
    }
  }

  
if(isset($_POST['add_method'])){
    $name = $_POST['name'];
    $address = $_POST['address'];
    $qr_code = $_FILES['qr_code']["tmp_name"];
    $date = date("d M");
    $target_dir = "../uploads/";
  $target_file = $target_dir . basename($_FILES["qr_code"]["name"]);
  $qr_code = basename($_FILES["qr_code"]["name"]);
  $upload = move_uploaded_file($_FILES['qr_code']["tmp_name"], $target_file);
  $sql = "INSERT INTO payment_methods (name, address, qr_code,reg_date) values('$name','$address','$qr_code','$date')";
  $result = mysqli_query($con,$sql);
    if( $result){
      $msg = '<div class="alert alert-success">Successfully saved</div>';
    }else{
     $msg = '<div class="alert alert-danger">Failed</div>';
  
    }
  }
  

  if(isset($_POST['update_method'])){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $address = $_POST['address'];
    $qr_code = $_FILES['qr_code']["tmp_name"];
    $date = date("d M");
    $target_dir = "../uploads/";
  $target_file = $target_dir . basename($_FILES["qr_code"]["name"]);
  $qr_code = basename($_FILES["qr_code"]["name"]);
  if(strlen($qr_code) > 5){
    $upload = move_uploaded_file($_FILES['qr_code']["tmp_name"], $target_file);
  
  }else{
    $qr_code = $_POST['hidden_image'];
  
  }
  
  $sql = "UPDATE  payment_methods set name = '$name', address = '$address', qr_code = '$qr_code',reg_date = '$date' where id = '$id'";
  $result = mysqli_query($con,$sql) or die(mysqli_error($con));
    if( $result){
      $msg = '<div class="alert alert-success">Successfully Updated</div>';
    }else{
     $msg = "<div class='alert alert-danger'>Failed </div>";
  
    }
  }

  


?>
                <!-- Start content -->
                <div class="content">
                    <div class="container-fluid">

                        <!-- Page-Title -->
                        
<div class="row">
<div class="alert alert-<?php echo $msgt ?>"><?php echo $msg ?></div>
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
                                        <h3 class="card-title text-white">Create wallet</h3>
                                    </div>
                                    <div class="card-body">
                                    <form method="POST" enctype="multipart/form-data">
              <input type="hidden" name="hidden_image" value="<?php echo $qr_code ?>">
                <div class="form-group">
                  <div><?php echo $msg ?></div>
                 
                                
                            </div>
                                       <div class="form-group">
                                Add new payment method
                            </div>
                            <div class="form-group">
                              <label>Name</label>
               <input class="form-control" name="name"  type="text" value="<?php echo $name ?>" >
                              
                            </div>

                            <div class="form-group">
                              <label>Wallet address</label>
               <input class="form-control" name="address"  type="text" value="<?php echo $address ?>">
                              
                            </div>
                             <?php  if(isset($_GET['v'])){
                              ?>
                              <div class="form-group">
                              <img src="../uploads/<?php echo $qr_code ?>" width="100">
                              <label>Qr Code</label>
               <input class="form-control" name="qr_code"  type="file" >
                              
                            </div>
                            <input type="hidden" name="id" value="<?php echo $id ?>">
                      
                                     
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <button type="submit" name="update_method" class="btn btn-primary">Update</button>
                                            <div id="msgSubmit" class="h3 hidden"></div> 
                                            <div class="clearfix"></div>
                                        </div>

                          <?php    } else { ?>
                            <div class="form-group">
                             
                              <label>Qr Code</label>
               <input class="form-control" name="qr_code"  type="file" >
                              
                            </div>
                      
                                     
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <button type="submit" name="add_method" class="btn btn-primary">Save</button>
                                            <div id="msgSubmit" class="h3 hidden"></div> 
                                            <div class="clearfix"></div>
                                        </div>

                          <?php  } ?>
                                      
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
                                        <h3 class="card-title text-white">Frequently Asked Questions</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-12">
                                                <div class="table-responsive">
                                                <table id="datatable" class="table table-striped  table-bordered nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                    <thead>
                                                        <tr>
                                                            <th>SN</th>
                                                            <th>Wallet type</th>
                                                            <th>Wallet type</th>
                                                            <th>qr</th>
                                                            <th>View/Delete</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                    <?php  

$sql = "SELECT * FROM payment_methods order by id desc";
 $sn = 1;
$result = mysqli_query($con,$sql) or die("cant select members ".mysqli_error($con));
while ($row = mysqli_fetch_array($result)) {
   // $author =  $row['author'];
//$body = strip_tags($row['body']);
$name = $row['name'];
$address = $row['address'];
 $qr = $row['qr_code'];
// $link = $row['title'];
 $id = $row['id'];



   # code...


?>
                                                        
                                                        <tr>
                                                            <td><?php echo $sn++; ?></td>
                                                            
                                                            <td><?php echo $name; ?></td>
                                                            <td><?php echo $address; ?></td>
                                                            <td><img height='100' src="../uploads/<?php echo $qr; ?>" /></td>
                                                                <td>
                                                                <form method="post">
                                                                    <input type="hidden" name="id" value="<?=$id ?>">
                                                                    <input type="hidden" name="suspend" value="<?=$id ?>">
                                                                <button name="delete" type="submit" class="btn btn-danger"> Delete wallet</button>
                                                                </form>
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