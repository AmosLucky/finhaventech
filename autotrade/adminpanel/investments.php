<?php

require "header.php";

$msg = "";

if(isset($_GET['d'])){
    $id = $_GET['d'];
    $sql = "DELETE FROM transactions where id = '$id'";
    $result = mysqli_query($con,$sql);
    if($result){
     $msg = '<div class="alert alert-danger">Deleted successfuly</div>';
    }
  }




  if(isset($_POST['delete'])){
    $id = $_POST['id'];
 
 //   $sql = "DELETE FROM transactions where id = '$id'";
 // $result = mysqli_query($con,$sql) or die("Cant delete ".mysqli_error($con));
   $investment = $model->selectFromTable("investments","id='$id'");
   if($investment['status']){
       $investment = $model->selectFromTable("investments","id='$id'")['msg'][0];
   $profit = $investment['profit'];
   $amount = $investment['amount'];
    $user_id = $investment['user_id'];
 
    $details = $model->selectFromTable("members","id='$user_id'")['msg'][0];
    $old_balance = $details['balance'];
    $new_balance = $old_balance + $amount;
    $old_profit = $details['profit'];
    $new_profit = $old_profit + $profit;
 
 
   $params = array("profit" => $new_profit,"balance"=>$new_balance);
   $updateUser = $model->updateTable("members",$params,$user_id);
   if($updateUser['status']){
     $params = array("deleted"=>1);
     $updateInvestment = $model->deleteFromTable("investments","id='$id'");
     //print_r($updateInvestment);
     if($updateInvestment['status']){
 
        $msg =  '<div class="alert alert-success text-center">SUCCESSFULLY DELETED</div>';
      }else{
       $msg = '<div class="alert alert-danger text-center"> ERROR: An erro occoured</div>';
      }
 
   }else{
             $msg = '<div class="alert alert-danger text-center"> ERROR: Cant be removed</div>';
     }
  // print_r($updateUser);
  
 
 }else{
             $msg = '<div class="alert alert-danger text-center"> ERROR: no row detcted </div>';
     }
 }



?>
                <!-- Start content -->
                <div class="content">
                    <div class="container-fluid">

                        <!-- Page-Title -->
                        
<div class="row">
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
                        <?php echo $msg ?>
                            <!-- INBOX -->
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header bg-primary">
                                        <h3 class="card-title text-white"><?php echo $type ?> Investment</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-12">
                                                <div class="table-responsive">
                                                <table id="datatable" class="table table-striped  table-bordered nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                <thead>
                    <tr>
                     <th>S/N</th>
        <th>username</th>
        <th> Amount</th>
        <th>Plan </th>
           <th>Days </th>
        <th>Profit</th>
        <th></th>
                    </tr>
                  </thead>
                  <tfoot>
                      <th>S/N</th>
        <th>username</th>
        <th> Amount</th>
        <th>Plan </th>
        <th>Days </th>
        <th>profit</th>
        <th> </th>
                    
                  </tfoot>
                  
                  <tbody>
     <?php  

     $sql = "SELECT * from investments where deleted = '0' && is_hidden = '0'  order by id desc";
      $sn = 1;
      $username = "";
     $result = mysqli_query($con,$sql) or die("cant select transactions ".mysqli_error($con));
     while ($row = mysqli_fetch_array($result)) {
      $username = $row['username'];
      $id = $row['id'];
      $plan_id = $row['plan_id'];
      $running_days  = $row['running_days'];
      $profit = $row['profit'];
      $plan_name = $row['plan_name'];
      $amount = $row['amount'];
       $user_id = $row['user_id'];
       $profit_days = $row['profit_days'];
       $active = $row['active'];
       $capital_running_hours = $row['capital_running_hours'];
       $status = "";
       if(!$active){
        $status = "Paused";

       }
       $days = round($capital_running_hours /24);

       $sql_r = "SELECT username FROM members WHERE id = '$user_id'";
       $res = mysqli_query($con,$sql_r);
       while($row1 = mysqli_fetch_array($res)){
        $username = $row1['username'];
       }

      
    

     ?>

      <tr>
        <td><?php echo $sn++; ?></td>
        <td><?php echo $username; ?> <span class="color:red"><?php echo $status; ?></span></td>
        <!-- <td><?php //echo $balance; ?></td> -->
         <td><?php echo $amount; ?></td>
         <td><?php echo $plan_name; ?></td>
        
        <td><?php echo $days."days " ?>(<?php echo $capital_running_hours." hrs "; ?>)</td>
       
        <td><?php echo round($profit,3); ?></td>
         
        <td> 
        <!-- <a class="" href="investors.php?r=<?php echo $id ?>">
        <button class="btn btn-danger">Remove</button>
    </a> -->

    <!-- <form method="POST">
             <input type="hidden" name="id" value="<?php echo $id ?>">
            
            <button class="btn btn-danger" name="delete" type="submit"> Delete </button>

    </form> -->
          




        </td>
     

          

         
      </tr>




     <?php  }  ?>
     
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