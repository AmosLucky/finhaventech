<?php

require "header.php";

?>
    <!-- Start Main Content Area -->
    <div class="mt-5">

        
    <div class="row">
        <div class="col-xl-7 mx-auto">
            
            <hr/>
            <div class="card border-top border-0 border-4 border-primary"
            >
                <div class="card-body p-5">
                    <div class="card-title d-flex align-items-center">
                        <div><i class="bx bxs-user me-1 font-22 text-primary"></i>
                        </div>
                        <h5 class="mb-0 text-primary">Loan Lists</h5>
                    </div>
                    <hr>
                    <form class="row g-3" method="post" action="https://prefinet.com/account/loans/new">
                        <input type="hidden" name="_token" value="CnmOxFIDJ8BpcVvXOZ15PJbp83DkMfmzh1V0OIRo">                                                <div class="form-group col-md-12">
                            <label for="inputAddress2">Amount</label>
                            <input type="number" class="form-control form-control-lg" id="inputAddress2"
                                      placeholder="amount" step="0.01" name="amount">
                        </div>

                        <div class="form-group col-md-12">
                            <label for="inputAddress2">Loan Type</label>
                            <select type="number" class="form-control form-control-lg" id="inputAddress2"
                                    name="loanType">
                                <option value="">Choose Loan Type</option>
                                <option >Short Term</option>
                                <option>Mid-Term</option>
                                <option>Long Term</option>
                            </select>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Apply</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4 mt-5" >
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">List</h6>
        </div>
        <div class="card-body">
                        <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Reference</th>
                        <th>Amount</th>
                        <th>Loan Type</th>
                        <th>Date Requested</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                                        </tbody>
                    <tfoot>
                    <tr>
                        <th>Reference</th>
                        <th>Amount</th>
                        <th>Loan Type</th>
                        <th>Date Requested</th>
                        <th>Status</th>
                    </tr>
                    </tfoot>
                </table>
                
            </div>
        </div>
    </div>


    </div>

   <?php

   require "footer.php";

   ?>