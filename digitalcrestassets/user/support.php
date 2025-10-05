<?php
include "header.php";
$msg2 = "";


if(isset($_POST['send'])){

 
 $msg = $_POST['message'];
 
         
         
$to = $company_email; // enter the users email here
$subject = 'Message from dashboard';
$from =  $company_email; /// enter the email of you host example admin@netbaba.com
 
// To send HTML mail, the Content-type header must be set
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
 
// Create email headers
$headers .= 'From: '.$from."\r\n".
    'Reply-To: '.$from."\r\n" .
    'X-Mailer: PHP/' . phpversion();
 
// Compose a simple HTML email message
$message = '<html><body>';
//$mail->AddEmbeddedImage('img/2u_cs_mini.jpg', 'logo_2u');
$message .= '

<h3 style="color:#f40;">
Greate Minds Admin
</h3>';

$message .= "
<p>
Hi admin a user sent a message<br>


Email: $email <br>
Message : $msg <br>
</p>
";
$message .= '</body></html>';
$sent = mail($to, $subject, $message, $headers);
if($sent){
    $msg2 = "<div class='alert alert-success'>
    Message sent !
    </div>";
}else{
     $msg2 = "<div class='alert alert-danger'>
    Message not sent !
    </div>";

}
 
}

?>
		
		


        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
			<div class="container-fluid">
				<!-- Add Project -->
				
                <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <div><?php echo $msg2; ?></div>
                            <h4>Support</h4>
                           
                        </div>
                    </div>
                 
                </div>
                <!-- row -->


                  <!--  /////////////////////2/////////////////////////// -->

          <div class="row ">
            <div class="col-lg-6">
              
                  <!-- Basic Card Example -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Send a message </h6>
                </div>
                <div class="card-body">
                  <form method="POST"> 

                  <div class="form ">
                    <textarea class="form-control" style="height: 150px" placeholder="Write a message..."
                     name="message"></textarea>

                    
                  </div>
                  <div class="form row justify-content-center mt-3">
                      <button class="btn btn-primary" type="submit" name="send"> Send  </button>
                      
                    </div>
                    </form>
                  
                  




                </div>
              </div>

                  
              
              
            </div>



             <div class="col-lg-6">
              
                  <!-- Basic Card Example -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Address </h6>
                </div>
                <div class="card-body">

                 

                
                   <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                 
                  <tbody>
                    

                     <tr>
                      <th>
                        <div class="contact-icon mr-15">
                               <i class="fa fa-map-marker" aria-hidden="true"></i>
                            </div>
                       </th>
                      <td>
                      <?php echo $company_address  ?>
                        
                      </td>
                      
                     
                    </tr>
                     <tr>
                      <th>
                        <div class="contact-icon mr-15">
                               <i class="fa fa-whatsapp" aria-hidden="true"></i>
                            </div>
                       </th>
                      <td>
                   <?php echo $company_phone  ?>
                        
                      </td>
                      
                     
                    </tr>

                     

                    <tr>
                      <th>
                        <div class="contact-icon mr-15">
                                <i class="fa fa-envelope-o"></i>
                            </div>
                       </th>
                      <td>
                      <p><?php echo $company_email  ?></p>
                        
                      </td>
                      
                     
                    </tr>




                   

                  

                      </tbody>
                </table>
              </div>
                  
                  




                </div>
              </div>

                  
              
              
            </div>
            
          </div>
<!-- ////////////////////////////////////
 -->

                <!--- end of row --->
            
        </div>
    
</div>
        <!--**********************************
            Content body end
        ***********************************-->

      <?php
require 'footer.php';

?>