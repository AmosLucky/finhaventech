<?php

//require './header.php';

/*
|--------------------------------------------------------------------------
| USER DASHBOARD FEATURES
|--------------------------------------------------------------------------
| header.php already provides:
|     $user_id
|
| This file only reads the user's feature settings.
|--------------------------------------------------------------------------
*/

if (!isset($user_id) || empty($user_id)) {
    return;
}



$stmt = $con->prepare("
    SELECT
        is_margin_call,
        is_restricted_withdrawal,
        pending_assets,
        added_promo,
        promo_message
    FROM members
    WHERE id = ?
    LIMIT 1
");



$stmt->bind_param("i", $user_id);
$stmt->execute();

$result = $stmt->get_result();
$features = $result->fetch_assoc();

$stmt->close();

if (!$features) {
    return;
}

$isMarginCall = (int)$features['is_margin_call'] === 1;
$isRestricted = (int)$features['is_restricted_withdrawal'] === 1;

$pendingAssets = (float)$features['pending_assets'];
$addedPromo    = (float)$features['added_promo'];

$promoMessage = trim((string)$features['promo_message']);

$hasPendingAssets = $pendingAssets > 0;
$hasAddedPromo    = $addedPromo > 0;
$hasPromoMessage  = $promoMessage !== '';

function dashboard_money($amount)
{
    return '$' . number_format((float)$amount, 2);
}
?>

<style>
/* =========================================================
   DASHBOARD FEATURE CONTAINER
========================================================= */

.dashboard-feature-area {
    width: 100%;
    margin: 15px 0;
    position: relative;
    z-index: 10;
}

/* =========================================================
   COMMON ALERT
========================================================= */

.df-alert {
    position: relative;
    overflow: hidden;
    display: flex;
    align-items: center;
    min-height: 58px;
    border-radius: 14px;
    margin-bottom: 12px;
    padding: 0;
    color: #fff;
    box-shadow: 0 8px 25px rgba(0,0,0,.12);
}

.df-icon {
    min-width: 58px;
    height: 58px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 25px;
    position: relative;
    z-index: 2;
}

.df-marquee {
    overflow: hidden;
    flex: 1;
    white-space: nowrap;
}

.df-marquee-inner {
    display: inline-block;
    padding-left: 100%;
    animation: df-scroll 13s linear infinite;
    font-weight: 600;
    font-size: 14px;
}

@keyframes df-scroll {
    0% {
        transform: translateX(0);
    }

    100% {
        transform: translateX(-100%);
    }
}

/* =========================================================
   MARGIN CALL
========================================================= */

.df-margin-call {
    background: linear-gradient(
        90deg,
        #b30000,
        #dc2626,
        #ef4444,
        #b30000
    );
    background-size: 300% 100%;
    animation: df-danger-bg 4s ease infinite;
}

@keyframes df-danger-bg {
    0% {
        background-position: 0 50%;
    }

    50% {
        background-position: 100% 50%;
    }

    100% {
        background-position: 0 50%;
    }
}

.df-margin-call .df-icon {
    background: rgba(0,0,0,.15);
    animation: df-pulse 1.2s infinite;
}

/* =========================================================
   PENDING ASSETS
========================================================= */

.df-pending {
    background: linear-gradient(
        90deg,
        #b77900,
        #f59e0b,
        #fbbf24,
        #b77900
    );
    background-size: 300% 100%;
    color: #fff;
    animation: df-pending-bg 5s ease infinite;
}

@keyframes df-pending-bg {
    0% {
        background-position: 0 50%;
    }

    50% {
        background-position: 100% 50%;
    }

    100% {
        background-position: 0 50%;
    }
}

.df-pending .df-icon {
    background: rgba(0,0,0,.12);
}

/* =========================================================
   WITHDRAWAL RESTRICTED
========================================================= */

.df-restricted {
    background: linear-gradient(
        90deg,
        #7f1d1d,
        #c2410c,
        #ea580c,
        #7f1d1d
    );
    background-size: 300% 100%;
    animation: df-restricted-bg 5s ease infinite;
}

@keyframes df-restricted-bg {
    0% {
        background-position: 0 50%;
    }

    50% {
        background-position: 100% 50%;
    }

    100% {
        background-position: 0 50%;
    }
}

/* =========================================================
   ADDED PROMO ALERT
========================================================= */

.df-promo-alert {
    background: linear-gradient(
        90deg,
        #6d28d9,
        #9333ea,
        #c026d3,
        #6d28d9
    );
    background-size: 300% 100%;
    animation: df-promo-bg 5s ease infinite;
}

@keyframes df-promo-bg {
    0% {
        background-position: 0 50%;
    }

    50% {
        background-position: 100% 50%;
    }

    100% {
        background-position: 0 50%;
    }
}

.df-promo-alert .df-icon {
    animation: df-pulse 1.5s infinite;
}

@keyframes df-pulse {
    0% {
        transform: scale(1);
    }

    50% {
        transform: scale(1.18);
    }

    100% {
        transform: scale(1);
    }
}

/* =========================================================
   MAIN PROMO WIDGET
========================================================= */

.df-promo-widget {
    position: relative;
    overflow: hidden;
    border-radius: 20px;
    padding: 25px;
    margin-bottom: 15px;
    color: #fff;

    background:
        radial-gradient(
            circle at top right,
            rgba(255,255,255,.25),
            transparent 30%
        ),
        linear-gradient(
            135deg,
            #111827,
            #312e81,
            #7e22ce,
            #be185d
        );

    box-shadow:
        0 15px 45px rgba(76, 29, 149, .30);

    animation: df-widget-in .7s ease both;
}

@keyframes df-widget-in {
    from {
        opacity: 0;
        transform: translateY(15px) scale(.98);
    }

    to {
        opacity: 1;
        transform: translateY(0) scale(1);
    }
}

.df-promo-widget::before {
    content: "";
    position: absolute;
    width: 180px;
    height: 180px;
    border-radius: 50%;
    right: -60px;
    top: -80px;
    background: rgba(255,255,255,.12);
}

.df-promo-widget::after {
    content: "";
    position: absolute;
    width: 100px;
    height: 100px;
    border-radius: 50%;
    left: -40px;
    bottom: -40px;
    background: rgba(255,255,255,.08);
}

.df-promo-content {
    position: relative;
    z-index: 2;
    padding-right: 30px;
}

.df-promo-icon {
    font-size: 38px;
    margin-bottom: 8px;
    animation: df-float 2.5s ease-in-out infinite;
}

@keyframes df-float {
    0%, 100% {
        transform: translateY(0);
    }

    50% {
        transform: translateY(-7px);
    }
}

.df-promo-title {
    font-size: 12px;
    text-transform: uppercase;
    letter-spacing: 2px;
    opacity: .8;
    font-weight: 700;
}

.df-promo-message {
    font-size: 21px;
    line-height: 1.4;
    font-weight: 700;
    margin-top: 6px;
}

.df-promo-close {
    position: absolute;
    right: 14px;
    top: 12px;
    z-index: 5;

    width: 34px;
    height: 34px;

    border: 0;
    border-radius: 50%;

    background: rgba(255,255,255,.15);
    color: #fff;

    cursor: pointer;
    font-size: 20px;

    transition: .25s ease;
}

.df-promo-close:hover {
    background: rgba(255,255,255,.30);
    transform: rotate(90deg);
}

/* =========================================================
   MOBILE
========================================================= */

@media (max-width: 576px) {

    .df-alert {
        min-height: 54px;
    }

    .df-icon {
        min-width: 52px;
        height: 54px;
        font-size: 21px;
    }

    .df-marquee-inner {
        font-size: 13px;
        animation-duration: 11s;
    }

    .df-promo-widget {
        padding: 21px;
        border-radius: 17px;
    }

    .df-promo-message {
        font-size: 18px;
    }
}
</style>


<div class="dashboard-feature-area">

    <?php if ($isMarginCall): ?>

        <div class="df-alert df-margin-call">

            <div class="df-icon">
                ⚠️
            </div>

            <div class="df-marquee">
                <div class="df-marquee-inner">
                    ⚠️ MARGIN CALL &nbsp;&nbsp;&nbsp;
                    Your account requires attention.
                    &nbsp;&nbsp;&nbsp;
                    Please contact support immediately.
                    &nbsp;&nbsp;&nbsp;
                    ⚠️ MARGIN CALL &nbsp;&nbsp;&nbsp;
                    Please contact support.
                </div>
            </div>

        </div>

    <?php endif; ?>


    <?php if ($hasPendingAssets): ?>

        <div class="df-alert df-pending">

            <div class="df-icon">
                ⏳
            </div>

            <div class="df-marquee">
                <div class="df-marquee-inner">

                    ⏳ PENDING ASSETS: You have pending assets of 
                    <?= htmlspecialchars(dashboard_money($pendingAssets)) ?>

                    &nbsp;&nbsp;&nbsp;

                    Please contact support for assistance.

                </div>
            </div>

        </div>

    <?php endif; ?>


    <?php if ($isRestricted): ?>

        <div class="df-alert df-restricted">

            <div class="df-icon">
                🚫
            </div>

            <div class="df-marquee">
                <div class="df-marquee-inner">

                    🚫 WITHDRAWAL RESTRICTED &nbsp;&nbsp;&nbsp;

                    Withdrawals are currently restricted on your account.

                    &nbsp;&nbsp;&nbsp;

                    Please contact support for assistance.

                </div>
            </div>

        </div>

    <?php endif; ?>


    <?php if ($hasAddedPromo): ?>

        <div class="df-alert df-promo-alert">

            <div class="df-icon">
                🎁
            </div>

            <div class="df-marquee">
                <div class="df-marquee-inner">

                    🎉 CONGRATULATIONS!

                    You have received
                    <?= htmlspecialchars(dashboard_money($addedPromo)) ?>

                    promotional credit.

                    &nbsp;&nbsp;&nbsp;

                    🎁 Your promotional reward:
                    <?= htmlspecialchars(dashboard_money($addedPromo)) ?>

                </div>
            </div>

        </div>

    <?php endif; ?>


    <?php if ($hasPromoMessage): ?>

        <?php
        /*
         * No promo_active column is required.
         *
         * localStorage remembers that this browser closed
         * the current promo.
         *
         * The promo_message itself acts as the admin-controlled
         * active/inactive switch.
         */

        $promoKey = 'dashboard_promo_' . md5(
            $user_id . '|' . $promoMessage
        );
        ?>

        <div
            class="df-promo-widget"
            id="dashboardPromoWidget"
            data-promo-key="<?= htmlspecialchars($promoKey) ?>"
        >

            <!-- <button
                type="button"
                class="df-promo-close"
                id="closeDashboardPromo"
                aria-label="Close promotion"
            >
                ×
            </button> -->

            <div class="df-promo-content">

                <div class="df-promo-icon">
                    🎁
                </div>

                <div class="df-promo-title">
                    Special Promotion
                </div>

                <div class="df-promo-message">
                    <?= nl2br(htmlspecialchars($promoMessage)) ?>
                </div>

            </div>

        </div>

    <?php endif; ?>

</div>


<script>
(function () {

    const widget = document.getElementById('dashboardPromoWidget');
    const closeButton = document.getElementById('closeDashboardPromo');

    if (!widget || !closeButton) {
        return;
    }

    const promoKey = widget.dataset.promoKey;

    /*
     * Hide the widget if this user already closed
     * this particular promo on this browser.
     */
    try {

        if (localStorage.getItem(promoKey) === 'closed') {
            widget.style.display = 'none';
        }

    } catch (error) {
        // localStorage may be disabled.
    }


    closeButton.addEventListener('click', function () {

        widget.style.transition =
            'opacity .35s ease, transform .35s ease';

        widget.style.opacity = '0';
        widget.style.transform = 'scale(.95)';

        setTimeout(function () {

            widget.style.display = 'none';

            try {
                localStorage.setItem(promoKey, 'closed');
            } catch (error) {
                // Ignore localStorage errors.
            }

        }, 350);

    });

})();
</script>