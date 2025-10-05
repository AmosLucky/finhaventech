 
  <?php 
  
  
  if($transaction_level == "2"){
     if($pin == $second_pin){

      $sql = "UPDATE transactions SET status = 'Completed' where user_id = '$user_id' && id = '$tid'";
      
                  $result = mysqli_query($con,$sql)or die("We cant complete this transaction ".mysqli_error($con));
                 
                  if($result){


                     $sql = "UPDATE users SET balance = balance - '$amount', 
     second_pin = '0' where id = '$user_id'";
      $result = mysqli_query($con,$sql)or die("We cant complete this transaction ".mysqli_error($con));

                 

                    if($result){

       $alertType ="alert-success";
        $msg = "Transaction successful!! <br> Generating receipt...";
         $t = "receipt?id=".$tid."_tyu8694kloghgh_";
        ?>
          <script>
setTimeout(myFunction, 2000);
function myFunction() {
   window.location.href="<?php echo $t ?>";
}
</script>

        <?php

      }
      }

    }else{
      $alertType ="alert-danger";
              $msg = $code_type." is incorrect";

    }

  }else{
    $alertType ="alert-danger";
            $msg = $code_type." is incorrect";

  }