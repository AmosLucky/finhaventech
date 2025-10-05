<?php 
session_start();

include '../conn.php';
if(!isset($_SESSION['user'])){
   echo " <script>
        window.location.href='../login';
        </script>";

}

// Function to get the client IP address
function get_client_ip() {
    $ipaddress = '';
    if (isset($_SERVER['HTTP_CLIENT_IP']))
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_X_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    else if(isset($_SERVER['REMOTE_ADDR']))
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}

$account_number1 = "";




$user_id = $_SESSION['id'];

        $id = $_SESSION['id'];
       $balance =  "";//$_SESSION['balance'];
        $user = $_SESSION['user'];
        $email = $_SESSION['email'];
        $_SESSION['phone'];
        //$_SESSION['state'];
        
          $_SESSION['firstname'];
        //  $_SESSION['referree'] ;

$fullname = "";

$sql = "SELECT * FROM users WHERE id =  '$user_id'";
    $result = mysqli_query($con,$sql) or die("Cant get balance ".mysqli_error($con));
    

    while ($row = mysqli_fetch_array($result)) {
      $account_number =  $row['account_number'];
      $account_type =  $row['account_type'];
      $account_number1 = $row['account_type'];
      $balance = $row['balance'];
     $account_currency = $row['account_currency'];
      //$bitcoin_address = $row['bitcoin_wallet'];
      //$_SESSION['balance'] = $row['balance'];
             $othername =  $row['other_name'];
             $surname =  $row['surname'];
      $fixed_deposit = $row['fixed_deposit'];
        $savings = $row['savings_interest'];
         $dob = $row['dob'];
         $country = $row['country'];
         $marital_status = $row['marital_status'];
         $address = $row['address'];
         $occupation = $row['occupation'];
      $first_pin = $row['first_pin'];
      $second_pin = $row['second_pin'];
      // $running_invest  = $row['running_invest'];
      // $pendding_invest = $row['pendding_investment'];
      // $pending_days = $row['pendding_days'];
      // $num_of_days = $row['num_of_days'];
      // $pending_profit = $row['pendding_profit'];
      // $profit = $row['profit'];
       $profile_picture = $row['profile_picture'];

      $firstname = $row['first_name'];
      //$lastname = $row['last_name'];
      $email = $row['email'];
      $phone = $row['phone'];
      $active = $row['active'];
      $gender = $row['gender'];

      $fullname = $firstname." ".$surname." ".$othername;


      # code...
    }

    // if($balance = " "){
    //  $balance = 0.0;
    // }
    // if($running_invest = " "){
    //  $running_invest = 0.0;
    // }

    // $pendding_balance = 0;

    // $sql = "Select * from transactions where user_id = '$user_id' && status = 'pendding'";
    // $result = mysqli_query($con,$sql) or die("Cant get balance ".mysqli_error($con));
    // while ($row = mysqli_fetch_array($result)) {
    //    $pendding_balance += floatval($row['amount']);
    // }

    // $sql = "Select * from transactions where user_id = '$user_id' && status = 'successful' && transaction_type = 'withdrawal'";

    // $result = mysqli_query($con,$sql) or die("Cant get balance ".mysqli_error($con));
    // while ($row = mysqli_fetch_array($result)) {
    //    $total_withdrawn += floatval($row['amount']);
    // }
    
    





?>



<!DOCTYPE html>
<html>

<head>
    <title>Personal | <?php echo $company_name ?></title>
    <meta charset="utf-8">
    <meta content="ie=edge" http-equiv="x-ua-compatible">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <link href="images/favicon.png" rel="shortcut icon">
    <link href="images/favicon.png" rel="apple-touch-icon">
    <link href="//fast.fonts.net/cssapi/487b73f1-c2d1-43db-8526-db577e4c822b.css" rel="stylesheet" type="text/css">
    <link href="bower_components/select2/dist/css/select2.min.css" rel="stylesheet">
    <link href="bower_components/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <link href="bower_components/dropzone/dist/dropzone.css" rel="stylesheet">
    <link href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="bower_components/fullcalendar/dist/fullcalendar.min.css" rel="stylesheet">
    <link href="bower_components/perfect-scrollbar/css/perfect-scrollbar.min.css" rel="stylesheet">
    <link href="bower_components/slick-carousel/slick/slick.css" rel="stylesheet">
    <link href="css/main.css?version=4.4.1" rel="stylesheet">
    <link rel="stylesheet" href="style.css" />
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {
        $("#search").keyup(function() {
            $.ajax({
                url: 'data',
                type: 'post',
                data: {
                    search: $(this).val()
                },
                success: function(result) {
                    $("#result").html(result);
                }
            });
        });
    });
    </script>
</head>

<body class="menu-position-side menu-side-left full-screen">

    <div class="all-wrapper solid-bg-all">
        <!--------------------
START - Top Bar
-------------------->
        <div class="top-bar color-scheme-bright">
    <div class="logo-w menu-size">
        <a class="logo" href="index">
            <img src="../assets/img/blue-ridge-bank-and-trust-co.svg">
            <div class="logo-label"></div>
        </a>
    </div>
    <div class="fancy-selector-w">
        <div class="fancy-selector-current">
            <div class="fs-img"><img alt="" src="img/card1.png"></div>
            <div class="fs-main-info">
                <div class="fs-name">Standard Account</div>
                <div class="fs-sub"><span>Total
                        Balance:</span><strong><?php echo $account_currency ?> <?php  echo number_format($balance); ?></strong>
                </div>
            </div>
        </div>
    </div>
    <!--------------------
START - Top Menu Controls
-------------------->
    <div class="top-menu-controls">

        <div>
            <div class="">
                <div id="google_translate_element"></div>
            </div>
        </div>
        

        <div class="element-search autosuggest-search-activator">
            <input placeholder="Start typing to search..." type="text">
        </div>


        <div class="logged-user-w">
            <div class="logged-user-i">
            <a href="index">
                

                 <div class="avatar-w"> 
                    
                    <img alt="" src="../uploads/<?php echo $profile_picture  ?>"> 
                </div>     
                    <div class="logged-user-menu color-style-bright">
                    
                    <div class="logged-user-avatar-info">
                        <div class="avatar-w"> <img alt="" src="../uploads/<?php echo $profile_picture  ?>"> </div>                        <div class="logged-user-info-w">
                            <div class="logged-user-name">&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;<?php echo $surname ?> </div>
                            <div class="logged-user-role">&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;
                                &nbsp;&nbsp;<?php  echo ($account_number); ?></div>
                        </div>
                    </div>
                    </a>
                    <div class="bg-icon"><i class="os-icon os-icon-wallet-loaded"></i></div>
                    <ul>
                        <li><a href="transfer"><i class="os-icon os-icon-coins-4"></i><span>Transfer Fund</span></a>
                        </li>
                        <li><a href="profile"><i class="os-icon os-icon-user-male-circle2"></i><span>Profile
                                    Details</span></a></li>
                        <li><a href="statement"><i class="os-icon os-icon-file-text"></i><span>Account
                                    Statement</span></a></li>
                        <li><a href="change-password"><i class="os-icon os-icon-others-43"></i><span>Change
                                    Password</span></a></li>
                        <li><a href="logout"><i class="os-icon os-icon-signs-11"></i><span>Logout</span></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<!---------------------------------
Search Bar
----------------------------------->

<div class="search-with-suggestions-w">
    <div class="search-with-suggestions-modal">
        <div class="element-search">
            <input class="search-suggest-input" placeholder="Start typing to search..." type="text">
            <div class="close-search-suggestions"><i class="os-icon os-icon-x"></i></div>
        </div>
    </div>
</div>        <!--------------------
END - Top Bar
-------------------->

        <div class="layout-w">
            <div class="menu-mobile menu-activated-on-click color-scheme-dark">
    <div class="mm-logo-buttons-w"><a class="mm-logo" href="index"><img
                src="../assets/img/blue-ridge-bank-and-trust-co.svg"><span></span></a>
        <div class="mm-buttons">
            <div class="content-panel-open">
                <div class="os-icon os-icon-grid-circles"></div>
            </div>
            <div class="mobile-menu-trigger">
                <div class="os-icon os-icon-hamburger-menu-1"></div>
            </div>
        </div>
    </div>
    <div class="menu-and-user">
       
        <div class="logged-user-w">
            
            <div class="avatar-"> 
                <!--<img alt=""-->
                <!--    src="../uploads/<?php echo $profile_picture  ?>">    -->
                    </div>
            <div class="logged-user-info-w">
                <div class="logged-user-name"><?php echo $surname;  ?>  </div>
                <div class="logged-user-role"><?php echo $account_number;  ?></div>
            </div>
        </div>
        <!--------------------
    START - Mobile Menu List
    -------------------->
        <ul class="main-menu">
            <li class=""><a href="send">
                    <div class="icon-w">
                        <div class="os-icon os-icon-coins-4"></div>
                    </div>
                    <span>Transfer Fund</span>
                </a>
            </li>
            <li class=""><a href="statement">
                    <div class="icon-w">
                        <div class="os-icon os-icon-file-text"></div>
                    </div>
                    <span>Account Statement</span>
                </a>
            </li>

            <li class=""><a href="profile">
                    <div class="icon-w">
                        <div class="os-icon os-icon-user-male-circle2"></div>
                    </div>
                    <span>Settings</span>
                </a>
            </li>
            <li class=""><a href="change-password">
                    <div class="icon-w">
                        <div class="os-icon os-icon-others-43"></div>
                    </div>
                    <span>Change Password</span>
                </a>
            </li>

            <li class=""><a href="logout">
                    <div class="icon-w">
                        <div class="os-icon os-icon-signs-11"></div>
                    </div>
                    <span>Logout</span>
                </a>
            </li>
        </ul>

    </div>
</div>

<!--------------------
Desktop Menu
--------------------->

<div
    class="menu-w color-scheme-light color-style-transparent menu-position-side menu-side-left menu-layout-compact sub-menu-style-over sub-menu-color-bright selected-menu-color-light menu-activated-on-hover menu-has-selected-link">
    <div class="logged-user-w avatar-inline">
        <div class="logged-user-i">
            <div class="avatar-w" > 
           <a>
           <img alt=""
                    src="../uploads/<?php echo $profile_picture  ?>"
                    style="height: 100px; width: 100px;">  
           </a> 
                          </div>
            <div class="logged-user-info-w">
                <div class="logged-user-name"><?php echo $fullname;  ?> </div>
                <div class="logged-user-role"><?php echo $account_number;  ?></div>
            </div>
        </div>
    </div>

    <ul class="main-menu">
        <li class=" has-sub-menu"><a href="index">
                <div class="icon-w">
                    <div class="os-icon os-icon-layout"></div>
                </div>
                <span>Dashboard</span>
            </a>
        </li>

        <li class=" has-sub-menu">
            <a href="send">
                <div class="icon-w">
                    <div class="os-icon os-icon-coins-4"></div>
                </div>
                <span>Transfer Fund</span>
            </a>
        </li>

        <li class=" has-sub-menu"><a href="statement">
                <div class="icon-w">
                    <div class="os-icon os-icon-file-text"></div>
                </div>
                <span>Account Statement</span>
            </a>
        </li>

        <li class=" has-sub-menu"><a href="profile">
                <div class="icon-w">
                    <div class="os-icon os-icon-user-male-circle2"></div>
                </div>
                <span>Settings</span>
            </a>
        </li>
        <li class="has-sub-menu"><a href="change-password">
                <div class="icon-w">
                    <div class="os-icon os-icon-others-43"></div>
                </div>
                <span>Change Password</span>
            </a>
        </li>
        <li class=" has-sub-menu"><a href="logout">
                <div class="icon-w">
                    <div class="os-icon os-icon-signs-11"></div>
                </div>
                <span>Logout</span>
            </a>
        </li>
    </ul>
    <!-- <center> <img src="../uploads/<?php echo $profile_picture  ?>" width="220" /></center> -->
</div>
<!--------------------
END - Main Menu
-------------------->            <!--------------------
END - Mobile Menu
-------------------->



                       
        
        