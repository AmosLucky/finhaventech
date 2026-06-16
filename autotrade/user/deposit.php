<?php
require "header.php";
?>
<!-- Page content -->
<div class="page-content">
    <!-- Page title -->
    <div class="page-title">
        <div class="row justify-content-between align-items-center">
            <div class="mb-3 col-md-6 mb-md-0">
                <h5 class="mb-0 text-white h3 font-weight-400">Fund your account balance</h5>
            </div>
        </div>
    </div>
    <div>
    </div>
    <div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <form  method="post"  action="payment.php">
                                <div class="row">
                                    <div class="mb-4 col-md-12">
                                        <h5 class="card-title ">Enter Amount</h5>
                                        <input class="form-control " placeholder="Enter Amount" min="5" type="number"
                                            name="amount" required>
                                    </div>
                                    
                                    <div class="mt-2 mb-1 col-md-12">
                                        <h5 class="card-title ">Choose Payment Method from the list below</h5>
                                        
                                    </div>
                                    <div class="mb-2 col-md-6">
                                            <a style="cursor: pointer;" data-method="Account Funding" id="17" class="text-decoration-none" onclick="checkpamethd(this.id)">
                                                <div class="rounded shadow ">
                                                    <div class="card-body d-flex justify-content-between align-items-center">
                                                        <span class="">
                                                                                                                        Account Funding
                                                        </span>
                                                        <span>
                                                            <input type="checkbox" id="17customCheck1"  required>
                                                        </span>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    <!-- <div class="mb-2 col-md-6 d-none" >
                                        <div style="cursor: pointer;" data-method="USDT ERC20" id="26"
                                            class="text-decoration-none" onclick="checkpamethd(this.id)">
                                            <div class="rounded border">
                                                <div
                                                    class="card-body d-flex justify-content-between align-items-center">
                                                    <span class="">
                                                        USDT ERC20
                                                    </span>
                                                    <span>
                                                        <input type="radio" id="26customCheck1" readonly>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-2 col-md-6 d-none">
                                        <a style="cursor: pointer;" data-method="USDT TRC20" id="25"
                                            class="text-decoration-none" onclick="checkpamethd(this.id)">
                                            <div class="rounded border">
                                                <div
                                                    class="card-body d-flex justify-content-between align-items-center">
                                                    <span class="">
                                                        USDT TRC20
                                                    </span>
                                                    <span>
                                                        <input type="radio" id="25customCheck1" readonly>
                                                    </span>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="mb-2 col-md-6 d-none">
                                        <a style="cursor: pointer;" data-method="Ethereum" id="2"
                                            class="text-decoration-none" onclick="checkpamethd(this.id)">
                                            <div class="rounded border">
                                                <div
                                                    class="card-body d-flex justify-content-between align-items-center">
                                                    <span class="">
                                                        <img src="https://lulo.com" alt="" class=""
                                                            style="width: 25px;">
                                                        Ethereum
                                                    </span>
                                                    <span>
                                                        <input type="radio" id="2customCheck1" readonly>
                                                    </span>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="mb-2 col-md-6 d-none">
                                        <a style="cursor: pointer;" data-method="Bitcoin" id="1"
                                            class="text-decoration-none" onclick="checkpamethd(this.id)">
                                            <div class="rounded border">
                                                <div
                                                    class="card-body d-flex justify-content-between align-items-center">
                                                    <span class="">
                                                        <img src="https://www.google.com/imgres?imgurl=https%3A%2F%2Fstatic.vecteezy.com%2Fsystem%2Fresources%2Fpreviews%2F008%2F505%2F801%2Foriginal%2Fbitcoin-logo-color-illustration-png.png&amp;tbnid=RVCntzSonbFK_M&amp;vet=1&amp;imgrefurl=https%3A%2F%2Fwww.vecteezy.com%2Fpng%2F8505801-bitcoin-logo-color-png-illustration&amp;docid=SBn-JEK2rq9bJM&amp;w=1920&amp;h=1920&amp;hl=en&amp;source=sh%2Fx%2Fim%2Fm5%2F3"
                                                            alt="" class="" style="width: 25px;">
                                                        Bitcoin
                                                    </span>
                                                    <span>
                                                        <input type="radio" id="1customCheck1" readonly>
                                                    </span>
                                                </div>
                                            </div>
                                        </a>
                                    </div> -->
                                    <div class="mb-2 col-md-12 d-none">
                                    <select class="default-select form-control" name="channel" >
                                            <?php

                                          $sql = "SELECT * from payment_methods ";
                                  $sn = 1;
                                 $result = mysqli_query($con,$sql) or die("cant select members ".mysqli_error($con));
                                 while ($row = mysqli_fetch_array($result)) {
                                    $name = $row['name'];
                                    $address = $row['address'];
                                    $date = $row['reg_date'];
                                    $qr_code =  $row['qr_code'];
                                    // $ref_balance  = $row['referral_balance'];
                                     $id = $row['id'];

                                            ?>
                                            <option value="<?php echo $id ?>"><?php echo $name ?></option>

                                          <?php  } ?>
                                          </select>

                                    </div>
                                    
                                    
                                    <div class="mt-5 mb-1 col-md-12" style="margin-top: 20px!important;">
                                        <input type="submit" class="px-5 btn btn-primary btn-lg"
                                            value="Procced to Payment">
                                    </div>
                                    
                                </div>
                            </form>
                        </div>
                        <div class="mt-4 col-md-4">
                            <!-- Seller -->
                            <div class="card">

                                <div class="card-body">
                                    <div class="pb-4">
                                        <div class="row align-items-center">
                                            <div class="col-6">
                                                <h6 class="mb-0">Total Deposit</h6>
                                                <span class="text-sm text-muted">-</span>
                                            </div>
                                            <div class="col-6">
                                                <h6 class="mb-1">
                                                    <b>$<?= number_format($total_deposit) ?>
                                                    </b>
                                                </h6>
                                                <span class="text-sm text-muted">Amount</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="actions d-flex justify-content-between">
                                        <a href="accounthistory.php" class="action-item">
                                            <span class="btn-inner--icon">View deposit history</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <?php
     require "footer.php";
?>