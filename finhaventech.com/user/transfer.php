<?php

require "header.php";

?>
    <!-- Start Main Content Area -->
    <div class="mt-5">

            
    <div class="today-card-area pt-24">
        <div class="container-fluid">
                        <div class="row justify-content-center">
                <div class="col-lg-3 col-sm-6">
                    <div class="single-today-card d-flex align-items-center">
                        <div class="flex-grow-1">
                            <span class="today">Account Balance</span>
                            <h6>$<?= number_format($balance,2) ?></h6>
                        </div>

                        <div class="flex-shrink-0 align-self-center">
                            <img src="https://prefinet.com/dashboard/user/images/icon/discount.png" alt="Images">
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-8 mx-auto">
            <div class="card border-top border-0 border-4 border-primary">
                <div class="card-body p-5">
                    <div class="card-title d-flex align-items-center">
                        <div><i class="bx bxs-user me-1 font-22 text-primary"></i>
                        </div>
                        <h5 class="mb-0 text-primary">Transfer Funds</h5>
                    </div>
                    <hr>
                    <form class="row g-3" method="post"  action="https://prefinet.com/account/transfer/new">
                        <input type="hidden" name="_token" value="oYND1vn6NxPhDZflSW8Dl92Bx2GtPLabOO526ItW">                        <div class="form-group col-md-12">
                            <label for="inputAddress2">Recipient username</label>
                            <input type="text" class="form-control" id="inputAddress2"
                                   placeholder="Enter Recipient username" name="username">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="inputAddress2">Amount ($)</label>
                            <input type="number" class="form-control" id="inputAddress2"
                                   placeholder="Enter Amount to Deposit" name="amount">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="inputAddress2">Account Password</label>
                            <input type="password" class="form-control" id="inputAddress2"
                                   placeholder="Enter Amount to Deposit" name="password">
                        </div>
                        <div class="form-group col-md-12">
                            <p>Transfer Charges: 2%</p>
                        </div>
                                                <div class="text-center text-danger">
                            <p>Transfer is disabled. Please contact support for more information.</p>
                        </div>
                                            </form>
                </div>
            </div>
        </div>
    </div>


    <div class="container-fluid mt-5">
        <div class="ui-kit-cards grid mb-24">
            <h3>Basic Table</h3>

            <div class="latest-transaction-area">
                <div class="table-responsive h-auto" data-simplebar>
                    <table class="table align-middle mb-0">
                        <thead>
                        <tr>
                            <th scope="col">RECIPIENT USERNAME</th>
                            <th scope="col">SENDER USERNAME</th>
                            <th scope="col">AMOUNT</th>
                            <th scope="col">SENT AT</th>
                            <th scope="col">STATUS</th>
                        </tr>
                        </thead>
                        <tbody>
                                                </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    </div>

   <?php

   require "footer.php";

   ?>