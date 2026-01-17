<?php

require "header.php";

?>

 <!-- Start Main Content Area -->
    <div class="mt-5">

        
    <div class="row">
        <div class="col-xl-8 mx-auto">
            <div class="card border-top border-0 border-4 border-primary">
                <div class="card-body p-5">
                    <div class="card-title d-flex align-items-center">
                        <div><i class="bx bxs-user me-1 font-22 text-primary"></i>
                        </div>
                        <h5 class="mb-0 text-primary">New Deposit</h5>
                    </div>
                    <hr>
                    <form class="row g-3" method="post" action="deposit_details.php">
                        <input type="hidden" name="_token" value="oYND1vn6NxPhDZflSW8Dl92Bx2GtPLabOO526ItW">                                                <div class="form-group col-md-12">
                            <label for="inputAddress2">Amount ($)</label>
                            <input type="number" class="form-control" id="inputAddress2"
                                   placeholder="Enter Amount to Deposit" name="amount">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="inputAddress2">Select Asset</label>
                            <select type="number" class="form-control" id="inputAddress2"
                                    name="channel">
                                    <option value="0">Bitcoin</option>
                                     <option value="1">Ethereum</option>
                                      <option value="2">Usdt</option>
                                       <option value="3">XRP</option>
                                     <?php

                                //           $sql = "SELECT * from payment_methods ";
                                //   $sn = 1;
                                //  $result = mysqli_query($con,$sql) or die("cant select members ".mysqli_error($con));
                                //  while ($row = mysqli_fetch_array($result)) {

                                //     $name = $row['name'];
                                //     $address = $row['address'];
                                //     $date = $row['reg_date'];
                                //     $qr_code =  $row['qr_code'];
                                //      $ref_balance  = $row['referral_balance'];
                                //      $id = $row['id'];

                                            ?>

                                          <?php // } ?>
                                
                            </select>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Deposit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



    </div>

   <?php

   require "footer.php";
   ?>