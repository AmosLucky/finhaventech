<?php
session_start();
require '../conn.php';

header('Content-Type: text/plain'); // important for clean AJAX response

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Get values safely
    $username = mysqli_real_escape_string($con, $_POST['email'] ?? '');
    $password = mysqli_real_escape_string($con, $_POST['password'] ?? '');

    if (empty($username) || empty($password)) {
        echo "<div class='alert alert-danger text-center'>All fields are required</div>";
        exit;
    }

    // ✅ FIXED SQL LOGIC
    $sql = "SELECT * FROM members 
            WHERE (email='$username' OR username='$username') 
            AND password='$password'";

    $result = mysqli_query($con, $sql);

    if (!$result) {
        echo "<div class='alert alert-danger'>Database error</div>";
        exit;
    }

    if (mysqli_num_rows($result) == 1) {

        $row = mysqli_fetch_assoc($result);

        $isAdmin = $row['is_admin'];
        $is_suspended = $row['is_suspended'];
        $suspension_reason = $row['suspension_reason'];
        $is_deleted = $row['deleted'];

        // ❌ Deleted user
        if ($is_deleted) {
            echo "<div class='alert alert-danger text-center'>
                    No user found with this username and password
                  </div>";
            exit;
        }

        // ❌ Suspended user
        if ($is_suspended) {
            echo "<div class='alert alert-danger text-center'>
                    $suspension_reason
                  </div>";
            exit;
        }

        // ✅ ADMIN LOGIN
        if ($isAdmin) {

            $_SESSION['admin_id'] = $row['id'];
            $_SESSION['admin'] = $row['username'];

            echo "<div class='alert alert-success text-center'>Success</div>";
           echo " <script>
        window.location.href='./adminpanel/';
        </script>";
            exit;
        }

        // ✅ NORMAL USER LOGIN
        $_SESSION['id'] = $row['id'];
        $_SESSION['user'] = $row['username'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['phonenumber'] = $row['phonenumber'];
        $_SESSION['balance'] = $row['balance'];
        $_SESSION['state'] = $row['state'];
        $_SESSION['gender'] = $row['gender'];
        $_SESSION['referree'] = $row['referree'];
        $_SESSION['firstname'] = $row['firstname'];
        $_SESSION['is_admin'] = $row['is_admin'];
        $_SESSION['isCompounded'] = $row['isCompounded'];

        echo "<div class='alert alert-success text-center'>Success</div>";
           echo " <script>
        window.location.href='./user/';
        </script>";
        exit;

    } else {
        echo "<div class='alert alert-danger text-center'>
                Invalid username or password
              </div>";
        exit;
    }

} else {
    echo "Invalid request";
}