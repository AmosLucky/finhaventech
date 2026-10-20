<?php
require 'header.php';
?>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-9">

            <!-- Page Header -->
            <div class="text-center mb-5">
                <div class="mb-3">
                    <i class="bi bi-file-earmark-text-fill text-primary" style="font-size: 3rem;"></i>
                </div>

                <h1 class="fw-bold mb-2">Terms and Conditions</h1>

                <p class="text-muted mb-0">
                    Please read the following terms and conditions carefully before using
                    <?= htmlspecialchars($domain) ?>.
                </p>
            </div>

            <!-- Terms Card -->
            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-body p-4 p-md-5">

                    <div class="alert alert-primary border-0 rounded-3 mb-4">
                        <i class="bi bi-info-circle-fill me-2"></i>
                        By using <?= htmlspecialchars($domain) ?>, you acknowledge that
                        you have read, understood, and agreed to the following terms and conditions.
                    </div>

                    <!-- Term 1 -->
                    <div class="d-flex mb-4">
                        <div class="flex-shrink-0">
                            <span class="badge bg-primary rounded-circle p-3">1</span>
                        </div>

                        <div class="ms-3">
                            <h5 class="fw-bold">Deposit Limits</h5>
                            <p class="text-muted mb-0">
                                The minimum deposit amount is <strong>$30</strong>,
                                while the maximum deposit amount is
                                <strong>$1,000,000</strong>.
                            </p>
                        </div>
                    </div>

                    <!-- Term 2 -->
                    <div class="d-flex mb-4">
                        <div class="flex-shrink-0">
                            <span class="badge bg-primary rounded-circle p-3">2</span>
                        </div>

                        <div class="ms-3">
                            <h5 class="fw-bold">Minimum Withdrawal</h5>
                            <p class="text-muted mb-0">
                                The minimum amount that can be withdrawn from an account
                                is <strong>$10</strong>.
                            </p>
                        </div>
                    </div>

                    <!-- Term 3 -->
                    <div class="d-flex mb-4">
                        <div class="flex-shrink-0">
                            <span class="badge bg-primary rounded-circle p-3">3</span>
                        </div>

                        <div class="ms-3">
                            <h5 class="fw-bold">Trading Hours</h5>
                            <p class="text-muted mb-0">
                                Trading starts at <strong>9:00 PM New York time</strong>,
                                Monday through Friday.
                            </p>
                        </div>
                    </div>

                    <!-- Term 4 -->
                    <div class="d-flex mb-4">
                        <div class="flex-shrink-0">
                            <span class="badge bg-primary rounded-circle p-3">4</span>
                        </div>

                        <div class="ms-3">
                            <h5 class="fw-bold">Plan Migration Fees</h5>

                            <p class="text-muted mb-3">
                                Members may migrate between plans subject to the applicable
                                migration fees:
                            </p>

                            <div class="row g-3">
                                <div class="col-md-4">
                                    <div class="border rounded-3 p-3 text-center h-100">
                                        <h6 class="fw-bold">Starter Plan</h6>
                                        <span class="badge bg-success">
                                            $<?= $company_eth_address ?> Average Fee
                                        </span>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="border rounded-3 p-3 text-center h-100">
                                        <h6 class="fw-bold">Forex Plan</h6>
                                        <span class="badge bg-primary">$<?= $company_btc_address ?> Average Fee</span>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="border rounded-3 p-3 text-center h-100">
                                        <h6 class="fw-bold">Prime Trader</h6>
                                        <span class="badge bg-primary">$<?= $company_usdt_address ?> Average Fee</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Term 5 -->
                    <div class="d-flex mb-4">
                        <div class="flex-shrink-0">
                            <span class="badge bg-primary rounded-circle p-3">5</span>
                        </div>

                        <div class="ms-3">
                            <h5 class="fw-bold">Withdrawal Fees</h5>
                            <p class="text-muted mb-0">
                                Applicable withdrawal fees are determined based on the
                                amount being withdrawn.
                            </p>
                        </div>
                    </div>

                    <!-- Term 6 -->
                    <div class="d-flex mb-4">
                        <div class="flex-shrink-0">
                            <span class="badge bg-primary rounded-circle p-3">6</span>
                        </div>

                        <div class="ms-3">
                            <h5 class="fw-bold">Referral System</h5>
                            <p class="text-muted mb-0">
                                Each member is adviced to actively develop their referral
                                network. Referral activity may affect the trading lot size
                                available to the member, depending on the applicable
                                trading margin.
                            </p>
                        </div>
                    </div>

                    <!-- Term 7 -->
                    <div class="d-flex mb-4">
                        <div class="flex-shrink-0">
                            <span class="badge bg-primary rounded-circle p-3">7</span>
                        </div>

                        <div class="ms-3">
                            <h5 class="fw-bold">Referral Bonus</h5>
                            <p class="text-muted mb-0">
                                Members receive a <strong>10% bonus</strong> based on the
                                first deposited capital of each qualifying referral.
                            </p>
                        </div>
                    </div>

                    <!-- Term 8 -->
                    <div class="d-flex mb-4">
                        <div class="flex-shrink-0">
                            <span class="badge bg-primary rounded-circle p-3">8</span>
                        </div>

                        <div class="ms-3">
                            <h5 class="fw-bold">One Account Per Individual</h5>
                            <p class="text-muted mb-0">
                                Each individual is expected to maintain only one account.
                                Multiple accounts may result in account restrictions or
                                other actions in accordance with our policies.
                            </p>
                        </div>
                    </div>

                    <!-- Agreement -->
                    <hr class="my-4">

                    <div class="alert alert-warning border-0 rounded-3 mb-0">
                        <div class="d-flex">
                            <i class="bi bi-exclamation-triangle-fill me-3 fs-4"></i>

                            <div>
                                <h6 class="fw-bold">Important Notice</h6>
                                <p class="mb-0">
                                    By continuing to use
                                    <?= htmlspecialchars($domain) ?>, you confirm that
                                    you have read and agree to comply with these terms
                                    and conditions.
                                </p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <!-- Footer Text -->
            <div class="text-center mt-4">
                <p class="text-muted small mb-0">
                    © <?= date('Y') ?> <?= htmlspecialchars($domain) ?>.
                    All rights reserved.
                </p>
            </div>

        </div>
    </div>
</div>

<?php
require 'footer.php';
?>