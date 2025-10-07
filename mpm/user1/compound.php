<?php
include "header.php";
$msg = "";



$username = $_SESSION['user'];
$user_id = $_SESSION['id'];


if(isset($_POST['compound'])){
    $user_id = $_SESSION['id'];
    $compounded_period = $_POST['compounded_period'];
    //$compounded_days = $row0['compounded_days'];
                 //  $compounded_period = $row0['compounded_period'];
    $sql = "UPDATE members set isCompounded = '1', compounded_period = '$compounded_period', compounded_days = '0' where id = '$user_id' ";
    $result = mysqli_query($con,$sql) or die("Cant coumpound ".mysqli_error($con));
     if($result){
    // $msg =  '<div class="alert alert-success text-center">Successfully compounded</div>';

        $sql = "UPDATE investments set isCompounded = '1', compounded_period = '$compounded_period', compounded_days = '0' where user_id = '$user_id' ";
    $result2 = mysqli_query($con,$sql) or die("Cant coumpound ".mysqli_error($con));
     if($result2){
     $msg =  '<div class="alert alert-success text-center">Successfully compounded</div>';
}

  }else{
    $msg =  '<div class="alert alert-failed text-center">Investment Couldnt strart mysqli_error($con) </div>';
  }

}

if(isset($_POST['uncompound'])){
    $user_id = $_SESSION['id'];
    $sql = "UPDATE members set isCompounded = '0' where id = '$user_id'";
    $result = mysqli_query($con,$sql) or die("Cant coumpound ".mysqli_error($con));
     if($result){
     $msg =  '<div class="alert alert-success text-center">Successfully uncompounded </div>';

  }else{
    $msg =  '<div class="alert alert-failed text-center">Investment Couldnt strart mysqli_error($con) </div>';
  }

}











?>


    
    


        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
      <div class="container-fluid">
        <!-- Add Project -->
        
                <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h4>Reinvest</h4>
                           
                        </div>
                         <div class="mt-5"><?php  echo $msg; ?></div>

                    </div>

                 
                </div>
                <!-- row -->
                <div class="row">
                    <div class="col-xl-8 col-lg-12" id="deposit-row">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title"></h4>
                            </div>
                            <form method="POST" action="" id="form">
                            <div class="card-body">
                                <div class="basic-form">
                                   
                                     

                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <label class="input-group-text">Period</label>
                                            </div>
                                            <!-- <select class="default-select form-control" id="bselectPlan">
                                              
                                                <option disabled selected="">Select a Plan</option>
                                                <option value="STARTER">STARTER</option>
                                                <option value="CLASSIC">CLASSIC</option>
                                                <option value="PREMIUM">PREMIUM</option>
                                            </select> -->
                                             <select class="default-select form-control" name="compounded_period" 
                                            >
                                            <option value="30">30 days</option>
                                            <option value="60">60 days</option>
                                            <option value="90">90 days</option>

                                          </select>
                                        </div>
                                   
                                        <div class="input-group mb-3  ">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">$</span>
                                            </div>
                                            <input type="number" name="amount" class="form-control" 
                                            value="<?php echo $running_invest ?>" readonly>
                                            <div class="input-group-append" >
                                                <span class="input-group-text">.00</span>
                                            </div>
                                        </div>
                                        <div class="row justify-content-center">
                                          <button  class="btn btn-secondary" name="compound" id="continue" type="submit">Compound</button>
                                          
                                        </div>

                                    
                                </div>
                            </div>
                          </form>
                        </div>
          </div>
          
          
          
      
                </div>

            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->

        <script type="text/javascript">
          $(document).ready(function(){

              $("#form").submit(function(e){


                 var plan = $("#plan").find(":selected").val();
              var amount = $("#amount").val();
              const myArr = plan.split("-");
              var min = myArr[1];

              if(parseInt(amount) < parseInt(min)){
               //alert(min);
               // $("form").
                alert("minimum deposit is for this plan $"+ min);
                 return false;
              }
               
                

            });


          });




 
        </script>

        
<?php
require 'footer.php';

?>