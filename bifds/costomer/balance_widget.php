<div class="element-balances">
                                            <div class="balance hidden-mobile">
                                                <div class="balance-title">Fixed Deposit</div>
                                                <div class="balance-value">
                                                    <span>
                                                    <?php echo $account_currency ?>
                                                     <?php echo number_format($fixed_deposit)  ?>
                                                         </span>
                                                </div>
                                                <div class="balance-link"><a class="btn btn-link btn-underlined"
                                                        href="statement"><span>View Statement</span><i
                                                            class="os-icon os-icon-arrow-right4"></i></a></div>
                                            </div>
                                            <div class="balance">
                                                <div class="balance-title">Available Balance</div>
                                                <div class="balance-value">
                                                <?php echo $account_currency ?> <?php echo number_format($balance);    ?></div>
                                                <div class="balance-link"><a class="btn btn-link btn-underlined"
                                                        href="statement"><span>Withdrawal Limit</span><i
                                                            class="os-icon os-icon-arrow-right4"></i></a></div>
                                            </div>
                                        </div>