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
            <!-- Page content -->
            <div class="page-content">
                <!-- Page title -->
                <div class="page-title">
                    <div class="row justify-content-between align-items-center">
                        <div class="mb-3 col-md-6 mb-md-0">
                            <h5 class="mb-0 text-white h3 font-weight-400">24/7 Customer Support</h5>
                        </div>
                    </div>
                </div>
                <div>
                </div>
                <div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="mb-5 row p-md-3">
                                    <div class="col-12 p-md-2">
                                        <div class="p-3 text-center col-12">
                                            <h1><?= $company_name ?> Support</h1>
                                            <div class="">
                                                <h4 class="h5">For inquiries, suggestions or complains. Mail us</h4>
                                                <h1 class="mt-3 text-primary h4"> <a
                                                        href="mailto:<?= $company_email ?>"><?= $company_email ?></a>
                                                </h1>
                                            </div>
                                        </div>
                                        <div class="pb-5 col-md-8 offset-md-2">
                                            <form method="post" action="">
                                            <div><?php echo $msg2; ?></div>
                                                
                                                <div class="form-group">
                                                    <h5 for="" class="">Message<span class=" text-danger">*</span></h5>
                                                    <textarea class="form-control" style="height: 150px" placeholder="Write a message..."
                                                    name="message"></textarea>
                                                </div>
                                                
                                                <div class="">
                                                    <input type="submit" class="py-2 btn btn-primary btn-block"
                                                        value="Send" name="send">
                                                </div>
                                            </form>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
           
            <!-- Footer -->
            <?php
     require "footer.php";
?>
