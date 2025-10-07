<?php
require "header.php";
?>


            <!-- Page content -->
            <div class="page-content">
                    <!-- Page title -->
    <div class="page-title">
        <div class="row justify-content-between align-items-center">
            <div class="mb-3 col-md-6 mb-md-0">
                <h5 class="mb-0 text-white h3 font-weight-400">Refer users to <?= $company_name ?> community</h5>
            </div>
        </div>
    </div>
    <div>
    </div>
    <div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="p-4 row">
                        <div class="col-md-8 offset-md-2 text-center">
                            <strong>You can refer users by sharing your referral link:</strong><br>
                            <div class="mb-3 input-group">
                                <input type="text" class="form-control readonly" value="https://<?php echo $domain  ?>/signup?user=<?php echo $user   ?>"
                                    id="reflink" readonly>
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" onclick="myFunction()" type="button"
                                        id="button-addon2">
                                        <i class="fas fa-copy"></i>
                                    </button>
                                </div>
                            </div>
<small class="input-group-append" id="copied"></small>
                            <strong>or your Referral ID</strong><br>
                            <h4 class="text-success"> <?= $user ?></h4>
                            <!-- <h5 class="title1 text-center">
                                You were referred by
                            </h5>
                            <i class="fa fa-user fa-2x d-block"></i>
                            <small>null</small> -->
                        </div>
                        <div class="mt-4 col-md-12">
                            <h6 class="text-left title1">Your Referrals.</h6>
                            <div class="table-responsive">
                                <table class="table UserTable table-hover ">
                                <thead>
                <tr>
                    <th class="wd-15p">SN</th>
                  <th class="wd-15p">Referral</th>
                  <th class="wd-20p">Bonus</th>
                  <th class="wd-20p">Date</th>
                </tr>
              </thead>
              <tbody>
              <?php
      


      $sql = "SELECT * from  members where referred_by = '$user' order by id desc"; 
      $result = mysqli_query($con,$sql)  or die("Error getting transactions ".mysqli_error($con));
      
      $sn = 0;
      while ($row = mysqli_fetch_array($result)) {

        $sn++;

        # code...
        $user = $row['username'];
        $amount = 0;
        //$state = $row['state'];
        
        $ref_id = $row['id'];
        $date = $row['date'];

        $my_sql = "SELECT amount, invest_date from transactions where user_id = '$ref_id' and transaction_type = 'Deposit' and status = 'approved' LIMIT 1";
        $res1 = mysqli_query($con,$my_sql);
       
        if(mysqli_num_rows($res1)>0){
          $r = mysqli_fetch_assoc($res1);
          $amount = $r['amount']/10;
          $date = $r['invest_date'];
         
          
        }
        
        
       
        


       
      

      ?>

      <tr>
      <td><?php  echo $sn ?></td>
        <td><?php  echo $user ?></td>
        <td>$<?php  echo $amount ?></td>
        <td><?php  echo $date ?></td>
        
      </tr>
      

      <?php
      }


      ?>


                                
            </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
     <script>
        const ref = document.getElementById("reflink");
        const copied = document.getElementById('copied');

        function myFunction() {
            ref.select();
            document.execCommand("copy")
            copied.innerText = "Copied!"

            setTimeout(()=>{
                copied.innerText = ""
            }, 2000)
        }
    </script>
           
            <!-- Footer -->
            <?php
     require "footer.php";
?>
