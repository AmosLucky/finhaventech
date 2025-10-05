<?php
session_start();


include '../conn.php';

$error = "";


$account_number = $_POST['id'];


       if(strlen($account_number) > 1){

    //$password = $_POST['password'];

    $account_numberv = mysqli_real_escape_string($con,$account_number);
    //$passwordv = mysqli_real_escape_string($con,$password);

    $sql = "SELECT * from users where account_number = '$account_numberv'  ";
    $result = mysqli_query($con,$sql) or die("cant select ".mysqli_error($con));
    $checkuser = mysqli_num_rows($result);
    if($checkuser == 1){
        while ($row = mysqli_fetch_array($result)) {
            $admin = $row['is_admin'];
            $is_active = $row['active'];
            // if(!$is_active){

            //     echo "block";

            //      //$error = '<div class="alert alert-danger text-center">There is an issue with your account please contact support</div>';


            // }else 
            
            if($admin){
                $_SESSION['admin'] = $row['id'];
                 echo " <script>
        window.location.href='admin';
        </script>";
            


            }else{

            $_SESSION['id'] = $row['id'];
             $_SESSION['firstname'] =$row['first_name'];
             $_SESSION['other_names'] =  $row['other_name'];
             $_SESSION['surname'] =  $row['surname'];
              $_SESSION['email'] =$row['email'];
             $_SESSION['phone'] =  $row['phone'];
            $_SESSION['balance'] = $row['balance'];
             $_SESSION['alert'] = 0;//$row['state'];
              $_SESSION['gender'] =$row['gender'];
            
              $_SESSION['account_type'] =  $row['account_type'];
               $_SESSION['dob'] =  $row['dob'];
                $_SESSION['currency'] =  $row['account_currency'];
                $_SESSION['user'] = $_SESSION['email'];
                 $profile_picture = $row['profile_picture'];

                  $id = $_SESSION['id'];
        $_SESSION['balance'];
        $email = $_SESSION['email'];
        $_SESSION['email'];
       // $_SESSION['phonenumber'];
       // $_SESSION['state'];
        
          $_SESSION['firstname'];
         // $_SESSION['referree'] ;


          //insert into transaction
         


                //    echo " <script>
                //     window.location.href='account/index';
                //     </script>";
                //         }
                echo "succesdash";

            
            
        }

    }

       


        

    }
    
    else{

       // $error = '<div class="alert alert-danger text-center">We cant find your account please check your account number or password</div>';
       echo "invakidACC";

    }


}else{

    echo "emptyId";


}




?>