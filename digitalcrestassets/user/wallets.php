<?php
include "header.php";
$error = "";



$username = $_SESSION['user'];
$user_id = $_SESSION['id'];

if(isset($_POST['add_wallet'])){
    $address = $_POST['address'];
    $wallet_type =  $_POST['wallet_type'];
    if(strlen( $address) > 5){
        if(strlen($wallet_type)>2){

            $sql = "Insert into wallets (user_id,wallet,type) values('$user_id','$address','$wallet_type')";
            $result = mysqli_query($con,$sql) or die("can not insert ".mysqli_error($con));
            if($result){
                 $error = '<div class="alert alert-success text-center">
     Wallet succefully saved (this wallet will be an option when you will request for withdraw)

     </div>';

            }


        }else{
             $error = '<div class="alert alert-danger text-center">
			 
     Invalid type

     </div>';
        }

    }else{
        $error = '<div class="alert alert-danger text-center">
     Invalid wallet address

     </div>';
    }

}

if(isset($_POST['delete'])){
  $id = $_POST['id'];
  $sqli = "DELETE from wallets where id = '$id'";
  $result = mysqli_query($con,$sqli);
  if($result){

    $error = '<div class="alert alert-success text-center">
     successfully deleted

     </div>';

  }else{
    $error = '<div class="alert alert-danger text-center">
     An error occoured

     </div>';
  }
}



?>
			<!-- container -->
			<div class="container-fluid">

				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="left-content">
						<div class="d-flex">
							<i class="mdi mdi-home text-muted hover-cursor"></i>
                                                        <a href="index"><p class="text-muted mb-0 hover-cursor">&nbsp;/&nbsp;Dashboard&nbsp;/&nbsp;</p></a>
							<p class="text-primary mb-0 hover-cursor">Wallet</p>
						</div>
					</div>
					<div class="d-flex align-items-end flex-wrap my-auto right-content breadcrumb-right">
					<a href="withdraw" class="btn btn-success mt-2 mt-xl-0">
        <!-- <i class="mdi mdi-download "></i> -->
        Withdraw
      </a>
      <a href="deposit" class="btn btn-primary mt-2 mt-xl-0">Make Deposit</a>
                         <a href="" class="btn btn-warning mt-2 mt-xl-0" data-target="#modaladd" data-toggle="modal">Add Wallet</a>
					</div>
				</div>
				<!-- /breadcrumb -->
				<?php echo $error ?>

			<div class="col-xl-12">
						<div class="card">
							<div class="card-header pb-0">
								<div class="d-flex justify-content-between">
									<h4 class="card-title mg-b-0">Wallet</h4>
									<i class="mdi mdi-dots-horizontal text-gray"></i>
								</div>
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table class="table text-md-nowrap" id="example2">
										<thead>
											<tr>
												<th class="wd-15p border-bottom-0">S/N</th>
												<th class="wd-15p border-bottom-0">Type/Address</th>
												<th class="wd-20p border-bottom-0">Delete</th>
											</tr>
										</thead>
										<tbody>
						<?php

$sql = "SELECT * from wallets where user_id = '$user_id' order by id desc ";
$sn = 0;
$result = mysqli_query($con,$sql) or die("cant select members ".mysqli_error($con));
while ($row = mysqli_fetch_array($result)) {
$type = $row['type'];
$address = $row['wallet'];
// $date = $row['reg_date'];
// $qr_code =  $row['qr_code'];
// $ref_balance  = $row['referral_balance'];
$id = $row['id'];
$tid = $row['id'];
$sn++;

  ?>
  <tr>
    <td><?php echo $sn; ?></td>
    <td><?php echo $type.": ".$address; ?></td>

                                              <td>
                                                                                                
                                            <a href="" class="btn btn-danger style="width:40px; hight: 15px" mt-2 mt-xl-0" data-target="#modaldelete<?php echo $tid ?>" data-toggle="modal">Delete</a>
                                        </td>
											</tr>
                                                                                      <!-- Small modal -->
		<div class="modal" id="modaldelete<?php echo $tid ?>">
			<div class="modal-dialog modal-sm" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h6 class="modal-title">DELETE WALLET</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
					</div>
                                      
					<div class="modal-body">
						<div class="col-lg-12 col-md-6">
												<!-- <h5 class="mb-2 fs-0">Description</h5> -->
                                    <p class="text-word-break fs--1">Are you sure you want to delete this address?
										<br> <?php echo $type.": ".$address; ?></p>
											</div>
                                            
					</div>
					<div class="modal-footer justify-content-center">
                                            <form action="" method="post">
											<input type="hidden" name="id" value="<?php echo $id ?>">
                                 
                                              
						<button class="btn ripple btn-danger" name="delete" type="submit">Delete</button>
						<button class="btn ripple btn-secondary" data-dismiss="modal" type="button">Close</button>
					</div>
                                          </form>
				</div>
			</div>
		</div>
		<!-- End Small Modal -->  


		<?php  } ?>
																					</tbody>
									</table>
								</div>
							</div><!-- bd -->
						</div><!-- bd -->
					</div>
			</div>
			<!-- /conatiner -->
		</div>
		<!-- /main-content -->
<!-- Small modal -->
		<div class="modal" id="modaladd">
			<div class="modal-dialog modal-sm" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h6 class="modal-title">ADD WALLET</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
					</div>
                                      <form action="" method="post">
					<div class="modal-body">
					<div class="form-group">
                      <label class="form-control-label">Choose Wallet Type <span class="tx-danger">*</span></label>
                <select name="wallet_type" class="form-control select2">
                    <option label="Choose Wallet Type"></option>
                    <option value="Bitcoin">Bitcoin</option>
                    <option value="Ethereum">Ethereum</option>
                    <option value="Binance">Binance coin</option>
                    <option value="Litecoin">Litecoin</option>
                    <option value="Tehter">Tether USD</option>
                  </select>
                    </div><!-- form-group -->
                    <input type="hidden" value="778" name="id">
                    <div class="form-group mg-b-20">
                        <label class="form-control-label">Enter Your Wallet Address <span class="tx-danger">*</span></label>
                      <input type="text" placeholder="Wallet Address" name="address" class="form-control" >
                    </div><!-- form-group -->
	
					</div>
					<div class="modal-footer justify-content-center">
                                            
                                              
						<button class="btn ripple btn-success" name="add_wallet" type="submit">ADD</button>
						<button class="btn ripple btn-secondary" data-dismiss="modal" type="button">Close</button>
					</div>
                                          </form>
				</div>
			</div>
		</div>
		<!-- End Small Modal -->
		
		
		
		
		
		<!-- Right-sidebar-->
		<div class="sidebar sidebar-right sidebar-animate">
			<div class="p-3">
				<a href="#" class="text-right float-right" data-toggle="sidebar-right" data-target=".sidebar-right"><i class="fe fe-x"></i></a>
			</div>
			<div class="tab-menu-heading border-0 card-header">
				<div class="card-title mb-0">Menu</div>
				<div class="card-options ml-auto">
					<a href="#" class="sidebar-remove"><i class="fe fe-x"></i></a>
				</div>
			</div>
			<div class="tabs-menu ">
				<!-- Tabs -->
				<ul class="nav panel-tabs">
					<li class=""><a href="#tab" class="active show" data-toggle="tab">Profile</a></li>
				</ul>
			</div>
			<div class="panel-body tabs-menu-body side-tab-body p-0 border-0 ">
				<div class="tab-content">
					<div class="tab-pane active" id="tab">
						<div class="card-body p-0">
							<div class="header-user text-center mt-4">
								<span class="avatar avatar-xxl brround mx-auto"><img src="../images/usericon.png" alt="Profile-img" class="avatar avatar-xxl brround"></span>
								<div class=" text-center font-weight-semibold user mt-3 h6 mb-0">test</div>
								
								
							</div>
							<a class="dropdown-item  border-top" href="profile.php">
								<i class="dropdown-icon fe fe-edit mr-2"></i> Edit Profile
							</a>
                                                        
							<a class="dropdown-item  border-top" href="mailto:support@deloxfunds.org">
								<i class="dropdown-icon fe fe-help-circle mr-2"></i> Need Help?
							</a>
							
							<div class="card-body border-top border-bottom">
								<div class="row">
									
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>		<!-- Right-sidebar-closed -->


		        
<?php
require 'footer.php';

?>