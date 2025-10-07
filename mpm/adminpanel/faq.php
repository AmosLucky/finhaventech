<?php

require "header.php";
$msg = "";
if(isset($_GET['d'])){
  $id = $_GET['d'];

  $sql = "DELETE FROM faq where id = '$id'";
$result = mysqli_query($con,$sql) or die("Cant delete ".mysqli_error($con));
   if($result){

            $msg =  '<div class="alert alert-success text-center">SUCCESSFULLY DELETED</div>';
         }else{
            $msg = '<div class="alert alert-danger text-center"> ERROR: USER CANT BE DELETED</div>';
         }

}


$question = "";
 $answer ="";
 $featured_image = "";
 $page_type = "";
 
  $contact = "";
  $id = "";
   $position = "";

  if(isset($_GET['e'])){
    $id = $_GET['e'];
     $sql = "SELECT * FROM faq where id = '$id'";
   $result = mysqli_query($con,$sql);
   while ($row = mysqli_fetch_array($result)) {
    //$author =  $row['author'];
    //$question = strip_tags($row['contact']);
    $question = $row['question'];
     $answer = $row['answer'];
    // $position = $row['position'];
     // code...
   }

  }
if(isset($_POST['post'])){

   $question = $_POST['question'];
     $answer = $_POST['answer'];

   ///$page_link = str_replace(" ","-",strtolower($title));

   if(strlen($question)>2){
    if(strlen($answer)>2){
     /// echo $contact;

      
   

   $post_date = date("Y M j");

   $sql = "INSERT INTO faq(question,answer)
                          values('$question','$answer')";
    $result = mysqli_query($con,$sql) or die("cant post".mysqli_error($con));
    if($result){
      $msg = "successful <br>";
    $msgt = "success";

    }else{
      $msg = "An error occoured";
    $msgt = "danger";

    }

   


  


}else{

    $msg = "Answer too short";
    $msgt = "danger";

}


        

   


    }else{
    $msg = "Question too short";
    $msgt = "danger";

   }

    
}


?>
                <!-- Start content -->
                <div class="content">
                    <div class="container-fluid">

                        <!-- Page-Title -->
                        
<div class="row">
<div class="alert alert-<?php echo $msgt ?>"><?php echo $msg ?></div>
                        </div>

                        <!-- Start Widget -->
                        <!--Widget-4 -->
                        <div id="usd" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none">
                                          
                                        </div>
                        
                        
                        <!-- CONFIRM DELETE MODAL-->
                        <div id="del_tra" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none">
                                            <!-- /.modal-dialog -->
                                        </div>
                        
                        <button style="display: none;" type="button" id="show_tra" data-toggle="modal" data-target="#usd"></button>
                        <button style="display: none;" type="button" id="show_del" data-toggle="modal" data-target="#del_tra"></button>
                        
                        <!-- End row-->
                                                
                                                
                        
                                                <div class="row">
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-header bg-primary">
                                        <h3 class="card-title text-white">Create New FAQ</h3>
                                    </div>
                                    <div class="card-body">
                                        <form method="post" action="">
                                            <div class="row">
                                            <div class="col-md-12">
                                            <div class="form-group">
                                                <label >Question</label>
                                                <input type="text" class="form-control" name="question" placeholder="Question">
                                            </div>
                                            </div>
                                            <div class="col-md-12">
                                            
                                            <div class="form-group">
                                                <label >Answer</label>
                                                <textarea type="number" class="form-control" rows="5" name="answer" placeholder="Write Answer"></textarea>
                                            </div>
                                            </div>
                                            </div>
                                            <div class="text-center">
                                            <button type="submit" name="post" class="btn btn-primary waves-effect waves-light">Create FAQ</button>
                                            </div>
                                        </form>
                                    </div><!-- card-body -->
                                </div> <!-- card -->
                            </div> <!-- end col -->
                        </div>
                        
                        <div class="row">
                            <!-- INBOX -->
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header bg-primary">
                                        <h3 class="card-title text-white">Frequently Asked Questions</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-12">
                                                <div class="table-responsive">
                                                <table id="datatable" class="table table-striped  table-bordered nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                    <thead>
                                                        <tr>
                                                            <th>SN</th>
                                                            <th>Question</th>
                                                            <th>Answer</th>
                                                            <th>View/Delete</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                    <?php  

$sql = "SELECT * FROM faq order by id desc";
 $sn = 1;
$result = mysqli_query($con,$sql) or die("cant select members ".mysqli_error($con));
while ($row = mysqli_fetch_array($result)) {
   // $author =  $row['author'];
//$body = strip_tags($row['body']);
$question = $row['question'];
$answer = $row['answer'];
// $featured_image = $row['featured_image'];
// $link = $row['title'];
 $id = $row['id'];



   # code...


?>
                                                        
                                                        <tr>
                                                            <td><?php echo $sn++; ?></td>
                                                            
                                                            <td><?php echo $question; ?></td>
                                                            <td><?php echo $answer; ?></td>
                                                                <td>
                                                                <button name="delete" type="submit" class="btn btn-danger"> Delete Faq</button>
                                                                </td>
                                                        </tr>

                                                        <?php } ?>
                                                          
                                                    </tbody>
                                                </table>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- end col -->

                            <!-- CHAT -->
                            <!-- end col-->


                            <!-- TODOs -->
                             <!-- end col -->
                        </div>
                                                
                        
                                                
                                            </div> <!-- container -->
                               
                </div> <!-- content -->

                <?php

require "footer.php";

?>