<?php 

require "header.php";

?>

<div class="content-w">

                <div class="content-i">
                    <div class="content-box">
                        <div class="element-wrapper">
                            <h6 class="element-header">Account Statement</h6>
                            <div class="element-box">
                                <h5 class="form-header">Recent Account Statement</h5>
                                                                <div class="table-responsive">
                                    <table id="dataTable1" width="100%" class="table table-striped table-lightfont"
                                        data-order='[[ 7, "desc" ]]'>
                                        <thead>
                                            <tr>
                                                <th>S/N</th>
                                                <th>Name</th>
                                                <th>Tnx Type</th>
                                                <th>Amount Transfered</th>
                                                <!-- <th>Previous Balance</th>
                                                <th>Current Balance</th> -->
                                                <th>Status</th>
                                                <th>Date</th>
                                                <th>more</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>S/N</th>
                                                <th>Name</th>
                                                <th>Tnx Type</th>
                                                <th>Amount Transfered</th>
                                                <!-- <th>Previous Balance</th>
                                                <th>Current Balance</th> -->
                                                <th>Status</th>
                                                <th>Date</th>
                                                <th>more</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>

                                        <?php
      


      $sql = "select * from  transactions where user_id = '$user_id'  order by id desc LIMIT 10"; 
      $result = mysqli_query($con,$sql)  or die("Error getting transactions ".mysqli_error($con));
      $sn = 0;

      while ($row = mysqli_fetch_array($result)) {

        $sn++;

        # code...
        $date = $row['transaction_date'];
        $amount = $row['amount'];
        $transaction_type = $row['transaction_type'];
         $account_type = $row['account_sign'];
        $name = $row['name'];
        $description = $row['description'];
        $status =  $row['status'];
        $tid = $row['id'];
        $sign = "";
        if($account_type == "Lira(TRY)"){
          $sign = "$";

        }else if($account_type == "Dollar(US)"){
          $sign = "$";

        }else if($account_type == "Pounds"){
          $sign = "E";

        }else if($account_type == "Euro)"){
          $sign = "EU";

        }
        $alert_type = "";

        if($transaction_type == "Debit" || $transaction_type == "debit"){
          $alert_type = "btn-danger btn-sm";

        }else  if($transaction_type == "Credit"){
          $alert_type = "btn-success btn-sm";

        }

        $btn ="";

        //  if($status == "pending"){
        //   $btn = "<a href='transaction_auth?t= $tid._tyu8694kloghgh_'>
        //          <p >
        //             Continue 
                     
        //          </p>
        //      </a>";

        // }
      
      

      ?>

                <tr>
            <td><?php  echo $sn ?> </td>
            <td><?php  echo $name ?></td>
            <td><span class=" btn <?php echo $alert_type ?>"><?php  echo $transaction_type ?></td>
            <td><?php echo $account_currency ?> <?php  echo number_format($amount) ?></td>
            
            <td><div class="text-success"><span class="btn btn-sm btn-<?php if(strtolower($status) == "pending"){
          echo "warning";
        }else{echo "success";} ?>"><?php  echo $status ?></span></div></td>
            <td><?php  echo $date ?></td>
            <td>
              <?php 
              if($status == "Completed"){
              ?>

              <a target="_blank"
                    href="receipt.php?id=<?php echo $tid ?>"><i
                        class="fa fa-print"> print</i></a>

              <?php }else{ 
                $t = "t_otp?t=".$tid."_tyu8694kloghgh_";
                ?>

                 <a target="_blank"
                    href="<?php echo $t ?>"><i
                        class="fa fa-arrow"> Continue Transaction</i></a>

              <?php  } ?>

                      </td>
        </tr>

                                            <?php } ?>
                                                                                       
                                                                                        
                                                                                    </tbody>
                                    </table>
                                </div>
                                                            </div>
                        </div>

                        <br>

                        <br>
                        <p></p>
                        <br>

                        <!--<div class="floated-chat-btn"><i class="os-icon os-icon-mail-07"></i><span>Chat</span></div>
  <div class="floated-chat-w">
    <div class="floated-chat-i">
      <div class="chat-close"><i class="os-icon os-icon-close"></i></div>
      <div class="chat-head">
        <div class="user-w with-status status-red">
          <div class="user-avatar-w">
            <div class="user-avatar"><img alt="" src="img/avatar1.jpeg"></div>
          </div>
          <div class="user-name">
            <h6 class="user-title">MIKE</h6>
            <div class="user-role">Customer Service</div>
          </div>
        </div>
      </div>
      <div class="chat-messages">
        <div class="message">
          <div class="message-content">Hi Jerry, how can I help you?</div>
        </div>
        <div class="date-break">19th May 10:55 33am</div>
        <div class="message">
          <div class="message-content">We are currently offline, please drop your message and we will reply you shortly</div>
        </div>
      </div>
      <div class="chat-controls">
        <input class="message-input" placeholder="Type your message here..." type="text">
        <div class="chat-extra"></div>
      </div>
    </div>
  </div>-->
     </div>
                </div>
            </div>
        </div>
        <?php
        
        require "footer.php";
        
        ?>