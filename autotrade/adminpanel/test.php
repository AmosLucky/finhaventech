<?php 
include '../conn.php';


function shareAffiliate($ref_username,$con,$amount){
    $affiliate_chain = array();
  for($i = 0; $i < 4; $i++){
  
    $sql_1 = "SELECT id,referred_by from members where username = '$ref_username'";
    $res_1 = mysqli_query($con,$sql_1) or die(mysqli_error($con));
  
    if(mysqli_num_rows($res_1) == 1){
       
      $row = mysqli_fetch_assoc($res_1);
      $new_ref_id  = $row['id'];
      $ref_username  = $row['referred_by'];
       
      array_push($affiliate_chain,$new_ref_id);
  
      
  
    }else{
        
        
      break;
    }
  
   
  
  
  
  }

  //print_r($affiliate_chain);
  //echo (1);
  $percentage_range =  array(5,3,2,1);

  for($i = 0; $i < count($affiliate_chain); $i++){
    $id = $affiliate_chain[$i];
    $share = $amount * ($percentage_range[$i]/100);
    $user_id = $id;
    //echo $share." ";
    $invest_date = date(" D d M h:m");
     $status = "approved";

    $sql_2 = "UPDATE members set balance = balance + $share where id = '$id'";
    $res_2 = mysqli_query($con,$sql_2) or die(mysqli_error($con));

    $sql_3 = "insert into transactions (user_id, user_name, amount,wallet_type,status,invest_date,transaction_type,description)
          value(
          '$user_id',
          '',
          '$share',
          'USDT',
          '$status',
          '$invest_date',
          'Bonus',
          ''
  
  
        )";


    $result = mysqli_query($con,$sql_3) or die("Can not submit ".mysqli_error($con));

  }
  
  
  
  
  }

  shareAffiliate("lucky3",$con,100);


?>