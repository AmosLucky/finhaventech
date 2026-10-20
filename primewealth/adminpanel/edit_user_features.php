<?php
include_once 'header.php';

/*
|--------------------------------------------------------------------------
| GET USER ID
|--------------------------------------------------------------------------
|
| Example:
| edit_user_features.php?i=34
|
*/

if (!isset($_GET['i']) || !is_numeric($_GET['i'])) {
    echo "<script>
        alert('Invalid user ID.');
        window.location.href='members.php?type=all';
    </script>";
    exit;
}

$user_id = (int) $_GET['i'];


/*
|--------------------------------------------------------------------------
| SAVE FORM
|--------------------------------------------------------------------------
*/

$success = '';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    /*
    |--------------------------------------------------------------------------
    | Keep the ID from the POST request, but validate it.
    |--------------------------------------------------------------------------
    */

    $posted_user_id = isset($_POST['user_id'])
        ? (int) $_POST['user_id']
        : 0;

    if ($posted_user_id <= 0) {

        $error = "Invalid user ID.";

    } else {

        $user_id = $posted_user_id;


        /*
        |--------------------------------------------------------------------------
        | CHECKBOXES
        |--------------------------------------------------------------------------
        */

        $is_margin_call = isset($_POST['is_margin_call']) ? 1 : 0;

        $is_restricted_withdrawal =
            isset($_POST['is_restricted_withdrawal']) ? 1 : 0;


        /*
        |--------------------------------------------------------------------------
        | AMOUNTS
        |--------------------------------------------------------------------------
        */

        $pending_assets = isset($_POST['pending_assets'])
            ? (float) $_POST['pending_assets']
            : 0;

        $added_promo = isset($_POST['added_promo'])
            ? (float) $_POST['added_promo']
            : 0;


        /*
        |--------------------------------------------------------------------------
        | Prevent negative amounts
        |--------------------------------------------------------------------------
        */

        if ($pending_assets < 0) {
            $pending_assets = 0;
        }

        if ($added_promo < 0) {
            $added_promo = 0;
        }


        /*
        |--------------------------------------------------------------------------
        | PROMO MESSAGE
        |--------------------------------------------------------------------------
        */

        $promo_message = isset($_POST['promo_message'])
            ? trim($_POST['promo_message'])
            : '';


        /*
        |--------------------------------------------------------------------------
        | UPDATE MEMBERS TABLE
        |--------------------------------------------------------------------------
        */

        $stmt = $con->prepare("
            UPDATE members
            SET
                is_margin_call = ?,
                is_restricted_withdrawal = ?,
                pending_assets = ?,
                added_promo = ?,
                promo_message = ?
            WHERE id = ?
            LIMIT 1
        ");

        if ($stmt) {

            $stmt->bind_param(
                "iiddsi",
                $is_margin_call,
                $is_restricted_withdrawal,
                $pending_assets,
                $added_promo,
                $promo_message,
                $user_id
            );

            if ($stmt->execute()) {

                $success = "User dashboard settings updated successfully.";

            } else {

                $error = "Unable to update the user settings.";

            }

            $stmt->close();

        } else {

            $error = "Database error. Please check the members table fields.";

        }
    }
}


/*
|--------------------------------------------------------------------------
| GET USER
|--------------------------------------------------------------------------
*/

$stmt = $con->prepare("
    SELECT
        id,
        username,
        email,
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

$user = $result->fetch_assoc();

$stmt->close();


/*
|--------------------------------------------------------------------------
| USER NOT FOUND
|--------------------------------------------------------------------------
*/

if (!$user) {

    echo "<script>
        alert('User not found.');
        window.location.href='members.php?type=all';
    </script>";

    exit;
}


/*
|--------------------------------------------------------------------------
| INCLUDE YOUR EXISTING ADMIN HEADER
|--------------------------------------------------------------------------
|
| Your header.php already contains the navbar/sidebar.
|--------------------------------------------------------------------------
*/



?>


<style>

/*
|--------------------------------------------------------------------------
| USER FEATURE EDIT PAGE
|--------------------------------------------------------------------------
*/

.feature-page {
    padding: 25px 20px 40px;
}

.feature-card {
    background: #ffffff;
    border-radius: 15px;
    border: 1px solid #eeeeee;
    box-shadow: 0 8px 30px rgba(0, 0, 0, .06);
    overflow: hidden;
}

.feature-card-header {
    padding: 22px 25px;
    background: linear-gradient(
        135deg,
        #0173d4,
        #0056a6
    );
    color: #fff;
}

.feature-card-header h4 {
    margin: 0;
    font-weight: 600;
}

.feature-card-header p {
    margin: 6px 0 0;
    opacity: .85;
}

.feature-card-body {
    padding: 25px;
}


/*
|--------------------------------------------------------------------------
| USER INFO
|--------------------------------------------------------------------------
*/

.user-info-box {
    display: flex;
    align-items: center;
    padding: 18px;
    margin-bottom: 25px;
    border-radius: 12px;
    background: #f7f9fc;
    border: 1px solid #edf0f5;
}

.user-avatar {
    width: 55px;
    height: 55px;
    border-radius: 50%;
    background: #0173d4;
    color: #fff;

    display: flex;
    align-items: center;
    justify-content: center;

    font-size: 22px;
    font-weight: 600;

    margin-right: 15px;
}

.user-info-box h5 {
    margin: 0 0 4px;
    font-weight: 600;
}

.user-info-box p {
    margin: 0;
    color: #7a8492;
}


/*
|--------------------------------------------------------------------------
| FEATURE ROW
|--------------------------------------------------------------------------
*/

.feature-row {
    display: flex;
    align-items: center;
    justify-content: space-between;

    padding: 18px 0;

    border-bottom: 1px solid #edf0f5;
}

.feature-row:last-child {
    border-bottom: none;
}

.feature-title {
    display: flex;
    align-items: center;
}

.feature-icon {
    width: 45px;
    height: 45px;

    border-radius: 12px;

    display: flex;
    align-items: center;
    justify-content: center;

    margin-right: 13px;

    font-size: 19px;
}

.feature-title h6 {
    margin: 0 0 3px;
    font-weight: 600;
}

.feature-title small {
    color: #8993a0;
}


/*
|--------------------------------------------------------------------------
| ICON COLORS
|--------------------------------------------------------------------------
*/

.icon-danger {
    background: #fff0f0;
    color: #dc2626;
}

.icon-warning {
    background: #fff8e6;
    color: #d97706;
}

.icon-purple {
    background: #f5edff;
    color: #7c3aed;
}

.icon-blue {
    background: #eaf4ff;
    color: #0173d4;
}


/*
|--------------------------------------------------------------------------
| BOOTSTRAP SWITCH
|--------------------------------------------------------------------------
*/

.custom-control-input:checked ~ .custom-control-label::before {
    background-color: #0173d4;
    border-color: #0173d4;
}

.custom-control-label {
    cursor: pointer;
}


/*
|--------------------------------------------------------------------------
| AMOUNT INPUT
|--------------------------------------------------------------------------
*/

.amount-group {
    max-width: 260px;
}

.amount-group .input-group-text {
    background: #f7f9fc;
    border-color: #dfe4ea;
    font-weight: 600;
}


/*
|--------------------------------------------------------------------------
| PROMO MESSAGE
|--------------------------------------------------------------------------
*/

.promo-message-box {
    margin-top: 20px;
    padding: 20px;

    border-radius: 13px;

    background: #faf8ff;
    border: 1px solid #e8ddff;
}

.promo-message-box label {
    font-weight: 600;
    color: #5b21b6;
}

.promo-message-box textarea {
    min-height: 120px;
    resize: vertical;
    border-radius: 10px;
}


/*
|--------------------------------------------------------------------------
| SAVE BUTTON
|--------------------------------------------------------------------------
*/

.save-button {
    margin-top: 25px;

    border: none;
    border-radius: 10px;

    padding: 12px 25px;

    background: linear-gradient(
        135deg,
        #0173d4,
        #0056a6
    );

    color: #fff;

    font-weight: 600;

    box-shadow: 0 6px 18px rgba(1, 115, 212, .25);

    transition: .25s ease;
}

.save-button:hover {
    transform: translateY(-2px);
    box-shadow: 0 9px 23px rgba(1, 115, 212, .35);
    color: #fff;
}


/*
|--------------------------------------------------------------------------
| STATUS PREVIEW
|--------------------------------------------------------------------------
*/

.preview-box {
    margin-top: 30px;
    padding: 20px;

    border-radius: 12px;

    background: #f8fafc;
    border: 1px solid #e8edf3;
}

.preview-box h6 {
    font-weight: 600;
    margin-bottom: 15px;
}

.preview-status {
    display: inline-flex;
    align-items: center;

    padding: 7px 12px;

    border-radius: 30px;

    font-size: 12px;
    font-weight: 600;

    margin: 3px;
}

.status-on {
    background: #dcfce7;
    color: #166534;
}

.status-off {
    background: #f1f5f9;
    color: #64748b;
}


/*
|--------------------------------------------------------------------------
| MOBILE
|--------------------------------------------------------------------------
*/

@media (max-width: 767px) {

    .feature-page {
        padding: 15px 10px 30px;
    }

    .feature-card-body {
        padding: 18px;
    }

    .feature-row {
        align-items: flex-start;
    }

    .feature-title {
        max-width: 65%;
    }

    .amount-group {
        max-width: 140px;
    }

}

</style>


<div class="content-page">

    <div class="content">

        <div class="feature-page">

            <div class="row">

                <div class="col-lg-9 col-md-12">

                    <div class="feature-card">

                        <!-- HEADER -->

                        <div class="feature-card-header">

                            <h4>
                                <i class="fa fa-sliders"></i>
                                User Dashboard Features
                            </h4>

                            <p>
                                Manage alerts, pending assets and promotional messages.
                            </p>

                        </div>


                        <div class="feature-card-body">


                            <!-- SUCCESS -->

                            <?php if ($success): ?>

                                <div class="alert alert-success">
                                    <i class="fa fa-check-circle"></i>

                                    <?= htmlspecialchars($success) ?>

                                </div>

                            <?php endif; ?>


                            <!-- ERROR -->

                            <?php if ($error): ?>

                                <div class="alert alert-danger">
                                    <i class="fa fa-exclamation-circle"></i>

                                    <?= htmlspecialchars($error) ?>

                                </div>

                            <?php endif; ?>


                            <!-- USER INFO -->

                            <div class="user-info-box">

                                <div class="user-avatar">

                                    <?= strtoupper(
                                        substr(
                                            $user['username'] ?? 'U',
                                            0,
                                            1
                                        )
                                    ) ?>

                                </div>

                                <div>

                                    <h5>
                                        <?= htmlspecialchars(
                                            $user['username'] ?? 'User'
                                        ) ?>
                                    </h5>

                                    <p>
                                        <?= htmlspecialchars(
                                            $user['email'] ?? ''
                                        ) ?>

                                        &nbsp; • &nbsp;

                                        User ID:
                                        <?= (int)$user['id'] ?>

                                    </p>

                                </div>

                            </div>


                            <!-- FORM -->

                            <form method="POST" action="">

                                <input
                                    type="hidden"
                                    name="user_id"
                                    value="<?= (int)$user['id'] ?>"
                                >


                                <!-- MARGIN CALL -->

                                <div class="feature-row">

                                    <div class="feature-title">

                                        <div class="feature-icon icon-danger">

                                            <i class="fa fa-exclamation-triangle"></i>

                                        </div>

                                        <div>

                                            <h6>
                                                Margin Call
                                            </h6>

                                            <small>
                                                Show the red margin-call alert
                                                on the user's dashboard.
                                            </small>

                                        </div>

                                    </div>


                                    <div>

                                        <div class="custom-control custom-switch">

                                            <input
                                                type="checkbox"
                                                class="custom-control-input"
                                                id="marginCall"
                                                name="is_margin_call"
                                                value="1"

                                                <?= (
                                                    (int)$user['is_margin_call'] === 1
                                                )
                                                    ? 'checked'
                                                    : ''
                                                ?>
                                            >

                                            <label
                                                class="custom-control-label"
                                                for="marginCall"
                                            ></label>

                                        </div>

                                    </div>

                                </div>


                                <!-- WITHDRAWAL RESTRICTION -->

                                <div class="feature-row">

                                    <div class="feature-title">

                                        <div class="feature-icon icon-danger">

                                            <i class="fa fa-ban"></i>

                                        </div>

                                        <div>

                                            <h6>
                                                Withdrawal Restricted
                                            </h6>

                                            <small>
                                                Show the withdrawal restriction
                                                notice.
                                            </small>

                                        </div>

                                    </div>


                                    <div>

                                        <div class="custom-control custom-switch">

                                            <input
                                                type="checkbox"
                                                class="custom-control-input"
                                                id="withdrawalRestriction"
                                                name="is_restricted_withdrawal"
                                                value="1"

                                                <?= (
                                                    (int)$user['is_restricted_withdrawal'] === 1
                                                )
                                                    ? 'checked'
                                                    : ''
                                                ?>
                                            >

                                            <label
                                                class="custom-control-label"
                                                for="withdrawalRestriction"
                                            ></label>

                                        </div>

                                    </div>

                                </div>


                                <!-- PENDING ASSETS -->

                                <div class="feature-row">

                                    <div class="feature-title">

                                        <div class="feature-icon icon-warning">

                                            <i class="fa fa-clock-o"></i>

                                        </div>

                                        <div>

                                            <h6>
                                                Pending Assets
                                            </h6>

                                            <small>
                                                Amount above zero displays
                                                the pending-assets alert.
                                            </small>

                                        </div>

                                    </div>


                                    <div class="amount-group">

                                        <div class="input-group">

                                            <div class="input-group-prepend">

                                                <span class="input-group-text">
                                                    $
                                                </span>

                                            </div>

                                            <input
                                                type="number"
                                                name="pending_assets"
                                                class="form-control"
                                                step="0.01"
                                                min="0"
                                                value="<?= htmlspecialchars(
                                                    $user['pending_assets']
                                                ) ?>"
                                            >

                                        </div>

                                    </div>

                                </div>


                                <!-- ADDED PROMO -->

                                <div class="feature-row">

                                    <div class="feature-title">

                                        <div class="feature-icon icon-purple">

                                            <i class="fa fa-gift"></i>

                                        </div>

                                        <div>

                                            <h6>
                                                Added Promo
                                            </h6>

                                            <small>
                                                Amount above zero displays
                                                the promotional reward.
                                            </small>

                                        </div>

                                    </div>


                                    <div class="amount-group">

                                        <div class="input-group">

                                            <div class="input-group-prepend">

                                                <span class="input-group-text">
                                                    $
                                                </span>

                                            </div>

                                            <input
                                                type="number"
                                                name="added_promo"
                                                class="form-control"
                                                step="0.01"
                                                min="0"
                                                value="<?= htmlspecialchars(
                                                    $user['added_promo']
                                                ) ?>"
                                            >

                                        </div>

                                    </div>

                                </div>


                                <!-- PROMO MESSAGE -->

                                <div class="promo-message-box">

                                    <label for="promoMessage">

                                        <i class="fa fa-bullhorn"></i>

                                        Promotional Message

                                    </label>

                                    <small class="form-text text-muted mb-2">

                                        Leave this empty to hide the promotional
                                        widget from this user.

                                    </small>


                                    <textarea
                                        name="promo_message"
                                        id="promoMessage"
                                        class="form-control"
                                        placeholder="Example: Enjoy $1,000 when you invest in our Forex Plan!"
                                    ><?= htmlspecialchars(
                                        $user['promo_message'] ?? ''
                                    ) ?></textarea>

                                </div>


                                <!-- SAVE -->

                                <button
                                    type="submit"
                                    class="save-button"
                                >

                                    <i class="fa fa-save"></i>

                                    Save Dashboard Settings

                                </button>

                            </form>


                            <!-- CURRENT STATUS -->

                            <div class="preview-box">

                                <h6>
                                    <i class="fa fa-eye"></i>
                                    Current Status
                                </h6>


                                <?php if ((int)$user['is_margin_call'] === 1): ?>

                                    <span class="preview-status status-on">
                                        <i class="fa fa-check"></i>
                                        Margin Call ON
                                    </span>

                                <?php else: ?>

                                    <span class="preview-status status-off">
                                        <i class="fa fa-times"></i>
                                        Margin Call OFF
                                    </span>

                                <?php endif; ?>


                                <?php if (
                                    (int)$user['is_restricted_withdrawal'] === 1
                                ): ?>

                                    <span class="preview-status status-on">
                                        <i class="fa fa-check"></i>
                                        Withdrawal Restricted
                                    </span>

                                <?php else: ?>

                                    <span class="preview-status status-off">
                                        <i class="fa fa-times"></i>
                                        Withdrawal Open
                                    </span>

                                <?php endif; ?>


                                <?php if (
                                    (float)$user['pending_assets'] > 0
                                ): ?>

                                    <span class="preview-status status-on">

                                        <i class="fa fa-clock-o"></i>

                                        Pending:
                                        $<?= number_format(
                                            (float)$user['pending_assets'],
                                            2
                                        ) ?>

                                    </span>

                                <?php else: ?>

                                    <span class="preview-status status-off">
                                        <i class="fa fa-times"></i>
                                        No Pending Assets
                                    </span>

                                <?php endif; ?>


                                <?php if (
                                    (float)$user['added_promo'] > 0
                                ): ?>

                                    <span class="preview-status status-on">

                                        <i class="fa fa-gift"></i>

                                        Promo:
                                        $<?= number_format(
                                            (float)$user['added_promo'],
                                            2
                                        ) ?>

                                    </span>

                                <?php else: ?>

                                    <span class="preview-status status-off">
                                        <i class="fa fa-times"></i>
                                        No Added Promo
                                    </span>

                                <?php endif; ?>


                                <?php if (
                                    trim(
                                        (string)$user['promo_message']
                                    ) !== ''
                                ): ?>

                                    <span class="preview-status status-on">

                                        <i class="fa fa-bullhorn"></i>

                                        Promo Message ON

                                    </span>

                                <?php else: ?>

                                    <span class="preview-status status-off">

                                        <i class="fa fa-times"></i>

                                        Promo Message OFF

                                    </span>

                                <?php endif; ?>

                            </div>

                        </div>

                    </div>

                </div>


                <!-- RIGHT INFORMATION CARD -->

                <div class="col-lg-3 col-md-12 mt-3 mt-lg-0">

                    <div class="card">

                        <div class="card-body">

                            <h5 class="card-title">
                                <i class="fa fa-info-circle"></i>
                                How it works
                            </h5>

                            <hr>

                            <p class="text-muted">
                                These settings control what appears on
                                the selected user's dashboard.
                            </p>

                            <p class="text-muted">
                                <strong>Margin Call</strong><br>
                                Turn the switch ON to show the red
                                scrolling alert.
                            </p>

                            <p class="text-muted">
                                <strong>Pending Assets</strong><br>
                                Any amount greater than $0 will display
                                the pending-assets message.
                            </p>

                            <p class="text-muted">
                                <strong>Added Promo</strong><br>
                                Any amount greater than $0 will display
                                the promotional reward.
                            </p>

                            <p class="text-muted">
                                <strong>Promo Message</strong><br>
                                Enter a message to display the large
                                promotional widget.
                            </p>

                            <p class="text-muted mb-0">
                                Set an amount to <strong>0</strong> or
                                remove the promo message to turn those
                                features off.
                            </p>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>


<?php

/*
|--------------------------------------------------------------------------
| YOUR EXISTING FOOTER
|--------------------------------------------------------------------------
*/

include 'footer.php';

?>