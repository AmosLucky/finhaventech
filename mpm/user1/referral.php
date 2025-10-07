<?php

require 'header.php';
?>


		
		


        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
			<div class="container-fluid">
				<!-- Add Project -->
				
               
                <!-- row -->
                <div class="row">


                	           <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Affiliate Datatable</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">


                                					<p>Copy your affiliate link or use your username as affiliate id</p>
										<div class="input-group mb-5">

                                            <input type="text" class="form-control"  value="https://<?php echo $domain  ?>/register?user=<?php echo $user   ?>"  id="myInput" readonly=''>
                                            <div class="input-group-append">
                                                <button class="btn btn-success" onclick="myFunction()">Copy</button>
                                            </div>
                                        </div>


                                        <table id="datatable2" class="table mg-b-0 tx-12" >
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
                   
					
					
					
					
					

               
              <!--  111111111111111111111111111111111111 -->
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->
        <script type="text/javascript">
        	    
function myFunction() {
  var copyText = document.getElementById("myInput");

  copyText.select();
  copyText.setSelectionRange(0, 99999)
  document.execCommand("copy");
  alert("successfully Copied : " + copyText.value);
}
</script>

        </script>

      <?php
require 'footer.php';

?>




























                             