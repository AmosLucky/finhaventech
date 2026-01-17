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
                        <h5 class="mb-0 text-primary">Membership ID</h5>
                    </div>
                    <hr>
                    <form class="row g-3" method="post" action="https://prefinet.com/account/membership/new"
                          enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="CnmOxFIDJ8BpcVvXOZ15PJbp83DkMfmzh1V0OIRo">                                                <div class="form-group col-md-12">
                            <label for="inputAddress2">Name</label>
                            <input type="text" class="form-control form-control-lg" id="inputAddress2"
                                   placeholder="Name" name="name">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="inputAddress2">Phone</label>
                            <input type="text" class="form-control form-control-lg" id="inputAddress2"
                                   placeholder="Name" name="phone">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="inputAddress2">Passport-sized Photograph</label>
                            <input type="file" class="form-control form-control-lg" id="inputAddress2" name="selfie">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="inputAddress2">Country</label>
                            <input type="text" class="form-control form-control-lg" id="inputAddress2"
                                   placeholder="Name" name="country">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="inputAddress2">State/Region</label>
                            <input type="text" class="form-control form-control-lg" id="inputAddress2"
                                   placeholder="Name" name="state">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="inputAddress2">Address</label>
                            <textarea type="text" class="form-control form-control-lg" id="inputAddress2"
                                      placeholder="Address" name="address"></textarea>
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
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Photograph</th>
                        <th> Country</th>
                        <th> State/Region</th>
                        <th> Address</th>
                        <th>Date Initiated</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                                        </tbody>
                    <tfoot>
                    <tr>
                        <th>Name</th>
                        <th> Country</th>
                        <th> State/Region</th>
                        <th> Address</th>
                        <th>Date Initiated</th>
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