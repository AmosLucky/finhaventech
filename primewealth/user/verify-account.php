<?php

require "header.php";
?>
            <!-- Page content -->
            <div class="page-content">
                    <!-- Page title -->
    <div class="page-title">
        <div class="row justify-content-between align-items-center">
            <div class="mb-3 col-md-6 mb-md-0">
                
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
                    <div class="mb-5 row">
                        <div class="col-lg-8 offset-lg-2">
                            <?php if ($is_verified == 2) { ?>

<div class="p-3 text-center">
    <h2>KYC Verification</h2>
    <p>
        Your identity verification documents have been submitted successfully.
        Our compliance team is currently reviewing your application.
    </p>
</div>

<div class="p-2 text-center shadow-lg p-md-5">

    <i class="p-4 mb-3 fas fa-user-clock fa-4x bg-warning text-white rounded-pill"></i>

    <h3 class="mt-3">Pending Approval</h3>

    <p class="text-muted">
        Thank you for completing your KYC verification.
        Your documents are currently under review.
    </p>

    <div class="alert alert-warning">
        <strong>Status:</strong> Awaiting Verification
    </div>

    <p>
        Please allow our verification team some time to complete the review.
        You will be notified once your account has been approved.
    </p>

</div>


<?php } elseif ($is_verified == 3) { ?>

<div class="p-3 text-center">
    <h2>KYC Verification</h2>
    <p>
        Your identity verification has been completed successfully.
    </p>
</div>

<div class="p-2 text-center shadow-lg p-md-5">

    <i class="p-4 mb-3 fas fa-check-circle fa-4x bg-success text-white rounded-pill"></i>

    <h3 class="mt-3">KYC Verified</h3>

    <p class="text-muted">
        Your identity has been successfully verified.
        You now have full access to the investment system.
    </p>

    <div class="alert alert-success">
        <strong>Status:</strong> Verified
    </div>

</div>


<?php } else { ?>

<div class="p-3 text-center">
    <h2>KYC Verification</h2>
    <p>
        To comply with regulation, each participant will have to go through
        identity verification (KYC/AML) to prevent fraud causes.
    </p>
</div>

<div class="p-2 text-center shadow-lg p-md-5">

    <i class="p-4 mb-3 fas fa-copy fa-4x bg-light rounded-pill"></i>

    <p>
        You have not submitted your necessary documents to verify your identity.
        In order to enjoy our investment system, please verify your identity.
    </p>

    <a href="kyc-form.php" class="mt-2 btn btn-primary btn-sm">
        Click here to complete your KYC
    </a>

</div>

<?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
	</div>
    <?php 
    require "footer.php";
    ?>