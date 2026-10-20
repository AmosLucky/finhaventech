<?php
session_start();

require '../conn.php';


$error = "";



// if(isset( $_SESSION['user'])){

//         echo " <script>
//         window.location.href='dashboard/index.php';
//         </script>";
//         }




        if(isset($_POST['login'])){

    $username = $_POST['email'];
    $password = $_POST['password'];

    $usernamev = mysqli_real_escape_string($con,$username);
    $passwordv = mysqli_real_escape_string($con,$password);

    $sql = "select * from members where email = '$usernamev'  && password = '$passwordv' || username = '$usernamev'  && password = '$passwordv' ";
    $result = mysqli_query($con,$sql) or die("cant select ".mysqli_error($con));
    $checkuser = mysqli_num_rows($result);
    if($checkuser == 1){
        while ($row = mysqli_fetch_array($result)) {
            $id = $row['id'];
            $isAdmin = $row['is_admin'];
             $is_suspended = $row['is_suspended'];
              $suspension_reason = $row['suspension_reason'];
               $is_deleted = $row['deleted'];

           if($is_deleted){
              $error = '<div class="alert alert-danger text-center">
              No User found with this username and password
              </div>';

           }else{
            /////////////////////////////NORMAL LOGIN//////////

              if($isAdmin == 2){

                $error = '<div class="alert alert-danger text-center">
                No User found with this username and password
                </div>';
      //           $_SESSION['admin_id'] = $row['id'];
      //        $_SESSION['admin2'] =$row['username'];
      //         $id = $_SESSION['admin_id'];
      //           $_SESSION['admin2'];
        


      //     //insert into transaction


      //  echo " <script>
      //   window.location.href='super';
      //   </script>";



    }else if($isAdmin == 1){
          $_SESSION['admin_id'] = $row['id'];
             $_SESSION['admin'] =$row['username'];
              $id = $_SESSION['admin_id'];
                $_SESSION['admin'];
        


          //insert into transaction


       echo " <script>
        window.location.href='home.php';
        </script>";
    }else{
             
        //      $_SESSION['id'] = $row['id'];
        //      $_SESSION['user'] =$row['username'];
        //     // $_SESSION['balance'] =  $row['balance'];
        //       $_SESSION['email'] =$row['email'];
        //      $_SESSION['phonenumber'] =  $row['phonenumber'];
        //     $_SESSION['balance'] = $row['balance'];
        //      $_SESSION['state'] =$row['state'];
        //       $_SESSION['gender'] =$row['gender'];
        //        $is_comounded = $row['isCompounded'];
            
        //       $_SESSION['referree'] =  $row['referree'];
        //        $_SESSION['firstname'] =  $row['firstname'];
        //         $_SESSION['password'] =  $row['password'];
        //      $_SESSION['is_admin'] =  $row['is_admin'];
        //       $_SESSION['isCompounded'] =  $row['isCompounded'];
        // echo " <script>
        // window.location.href='user/';
        // </script>";
        $error = '<div class="alert alert-danger text-center">
        No User found with this username and password
        </div>';

    }
           }
            
        }

        // $id = $_SESSION['id'];
        // $_SESSION['balance'];
        // $user = $_SESSION['user'];
        // $_SESSION['email'];
        // $_SESSION['phonenumber'];
        // $_SESSION['state'];
        
        //   $_SESSION['firstname'];
        //   $_SESSION['referree'] ;
        //   $isAdmin = $_SESSION['is_admin'];


          //insert into transaction
         


       



        

    }
    //user more than two
    else{

        $error = '<div class="alert alert-danger text-center">We cant find your account please check your username or password</div>';

    }


}


// if(isset($_POST['login'])){
//   $login_name = $_POST['username'];
//   $login_psw = $_POST['password'];
// }
// else if(isset($_POST['signup'])){
//   $fname = $_POST['fname'];
//   $lname = $_POST['lname'];
//   $email = $_POST['email'];
//   $uname = $_POST['uname'];
//   $pass = $_POST['psw'];
//   $phone = $_POST['phone'];
// }

if(isset($_GET['msg'])){
  $msg = $_GET['msg'];
  $error = '<div class="alert alert-primary text-center">
           Please login
            </div>';

}


?>

<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Admin Login | Admin Control</title>
        <!--<meta name="viewport" content="width=1024">-->
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta content="admin panel" name="description" />
        <meta name="theme-color" content="#0173d4">
        <meta content="" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <link rel="shortcut icon" href="">
        
        <!-- DataTables -->
        <link href="plugins/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
        <link href="plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="plugins/datatables/fixedHeader.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css"/>
        <link href="plugins/datatables/scroller.bootstrap4.min.css" rel="stylesheet" type="text/css" />

        <!-- Custom Files -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/style.css" rel="stylesheet" type="text/css" />
        
        <!-- Plugins css -->
        <link href="plugins/modal-effect/css/component.css" rel="stylesheet">

        <script src="assets/js/modernizr.min.js"></script>
        <script src="assets/js/default.js"></script>
    </head>    <body class="fixed-left">
        
        <!-- Begin page -->
        <div id="wrapper">
            
            <div class="m-t-40">
                <!-- Start content -->
                <div class="m-t-40">
                    <div class="container">

                        <!-- Page-Title -->
                        

                        <div class="row m-t-40">
                            <div class="col-md-4"></div>
                            <div class="col-md-4 m-t-40">
                                <div class="card">
                                    <div class="card-header bg-primary"><h3 class="text-white card-title">Login to Admin</h3></div>
                                    <?php echo $error ?>
                                    <div class="card-body text-center">
                                        <div class="row">
                        </div>

                                        <form method="post" action="">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="email" placeholder="Username">
                                            </div>
                                            <div class="form-group">
                                                <input type="password" class="form-control" name="password" placeholder="Password">
                                            </div>
                                            <input type="hidden" name="code" value="R9iWZJyaMs0bb8309239953b782fec18706fe60b4a56a74f08aaecaf101cd2ef29ebc7e5f6762721Tynv">
                                            <button type="submit" name="login" class="btn btn-primary waves-effect waves-light">Login</button>
                                            
                                        </form>
                                    </div><!-- card-body -->
                                </div>
                            </div>
                             <div class="col-md-4"></div>
                        </div>  <!-- End Row -->


                        <!-- End Row -->



                        <!-- End Row -->


                         <!-- End Row -->


                        <!-- End Row -->


                    </div> <!-- container-fluid -->
                               
                </div> <!-- content -->

                

            </div>
            
            </div>
        <!-- END wrapper -->

        <script>
            var resizefunc = [];
        </script>

        <!-- jQuery  -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.bundle.min.js"></script>
        <script src="assets/js/detect.js"></script>
        <script src="assets/js/fastclick.js"></script>
        <script src="assets/js/jquery.slimscroll.js"></script>
        <script src="assets/js/jquery.blockUI.js"></script>
        <script src="assets/js/waves.js"></script>
        <script src="assets/js/wow.min.js"></script>
        <script src="assets/js/jquery.nicescroll.js"></script>
        <script src="assets/js/jquery.scrollTo.min.js"></script>

        <!-- Datatables-->
        <!-- Required datatable js-->
        <script src="plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="plugins/datatables/dataTables.bootstrap4.min.js"></script>
        <!-- Buttons examples -->
        <script src="plugins/datatables/dataTables.buttons.min.js"></script>
        <script src="plugins/datatables/buttons.bootstrap4.min.js"></script>
        
        <script src="plugins/datatables/jszip.min.js"></script>
        <script src="plugins/datatables/pdfmake.min.js"></script>
        <script src="plugins/datatables/vfs_fonts.js"></script>
        <script src="plugins/datatables/buttons.html5.min.js"></script>
        <script src="plugins/datatables/buttons.print.min.js"></script>
        <script src="plugins/datatables/dataTables.fixedHeader.min.js"></script>
        <script src="plugins/datatables/dataTables.keyTable.min.js"></script>
        <script src="plugins/datatables/dataTables.scroller.min.js"></script>

        <!-- Responsive examples -->
        <script src="plugins/datatables/dataTables.responsive.min.js"></script>
        <script src="plugins/datatables/responsive.bootstrap4.min.js"></script>

        <!-- Datatable init js -->
        <script src="assets/pages/datatables.init.js"></script>

        <script src="assets/js/jquery.app.js"></script>
        
        <script>
            
            function hide_element(x) {
        document.querySelector(x).style.display='none';
}

function show_element(x) {
        document.querySelector(x).style.display='block';
}

function triggerClick(x){
 document.querySelector(x).click();
}

function show_settings_modal(y,val,x,b) {
        show_element('#loader');
	$.ajax({
	type: "POST",
	url: 'includes/ajax.php',
        data: {setting_id: y, item: val},
	success: function(data){
		$(x).html(data);
                hide_element('#loader');
                triggerClick(b);
	}
	});
}

      function show_trans_modal(y,val,x,b) {
        show_element('#loader');
	$.ajax({
	type: "POST",
	url: 'includes/ajax.php',
        data: {user: y, trans_id: val},
	success: function(data){
		$(x).html(data);
                hide_element('#loader');
                triggerClick(b);
	}
	});
}

      function show_wallet_modal(val,x,b) {
        show_element('#loader');
	$.ajax({
	type: "POST",
	url: 'includes/ajax.php',
        data: {wallet_id: val},
	success: function(data){
		$(x).html(data);
                hide_element('#loader');
                triggerClick(b);
	}
	});
}

function show_del_modal(y,val,x,b,p) {
        show_element('#loader');
	$.ajax({
	type: "POST",
	url: 'includes/ajax.php',
        data: {user: y, del_id: val, para: p},
	success: function(data){
		$(x).html(data);
                hide_element('#loader');
                triggerClick(b);
	}
	});
}

function show_del_settings(y,val,x,b) {
        show_element('#loader');
	$.ajax({
	type: "POST",
	url: 'includes/ajax.php',
        data: {setting_del: y, del_set_id: val},
	success: function(data){
		$(x).html(data);
                hide_element('#loader');
                triggerClick(b);
	}
	});
}
    </script>

        <script>
            $(document).ready(function() {
                $('#datatable').dataTable();
                $('#datatable2').dataTable();
                $('#datatable3').dataTable();
                $('#datatable-keytable').DataTable( { keys: true } );
                $('#datatable-responsive').DataTable();
                $('#datatable-scroller').DataTable( { ajax: "plugins/datatables/json/scroller-demo.json", deferRender: true, scrollY: 380, scrollCollapse: true, scroller: true } );
                var table = $('#datatable-fixed-header').DataTable( { fixedHeader: true } );
            } );
            TableManageButtons.init();
        </script>
    
    </body>
</html>