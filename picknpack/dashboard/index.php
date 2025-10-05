<?php
require "header.php";

?>



            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4  ">
                        <center>
                            <h1>Data Management Hub Sample Design</h1>
                        </center>

                    
                         <center>
                                Welcome! Select an action below to effortlessly manage your data, including recording new entries, uploading existing files, or downloading comprehensive reports.
                        </center>
                        <br>
                        <br>
                    
                        
                        <div class="row justify-content-center text-light">
                            <div class=" col-md-4  mb-2 ">
                                <div class=" container card bg-primary h-100 p-4 btn btn primary text-light" type="button" data-toggle="modal" data-target="#myModal" >
                                    <center >
                                        <div  class="circle-bg" style="background:#7eb6ff">
                                            <i class="fas fa-download  text-light icon-hight"  ></i>
                                        </div>
                                        <br>
                                        <h3>Download Template</h3>
                                        <small>
                                            Export Reports, Cases and QRIFF data for analysis
                                        </small>
                                    </center>
                                   
                                </div>
                            </div>


                            <div class=" col-md-4 mb-2  ">
                                <div class=" container card bg-warning h-100 p-4 btn btn primary text-light" onclick="document.getElementById('hiddenFileInput').click()" >
                                    <center >
                                        <div  class="circle-bg" style="background:#ffdb6d">
                                            <i class="fas fa-upload  text-light icon-hight"  ></i>
                                        </div>
                                        <br>
                                        <h3>Upload Data</h3>
                                        <small>
                                            Import new or updated data file effortlessly
                                        </small>
                                    </center>
                                   
                                </div>
                            </div>


                            <div class=" col-md-4  mb-2 ">
                                <div class=" container card bg-success h-100 p-4 btn btn primary text-light" type="button" data-toggle="modal" data-target="#myModal2" >
                                    <center >
                                        <div  class="circle-bg" style="background:#7ed6a2">
                                            <i class="fas fa-circle  text-light icon-hight"  ></i>
                                        </div>
                                        <br>
                                        <h3>Record Data</h3>
                                        <small>
                                            Direct enter new case , QRIFF or inventory information
                                        </small>
                                    </center>
                                   
                                </div>
                            </div>
                           

                            
                           
                            
                            
                        </div>
                        
                        
                    </div>
                </main>


                <!-- Open file modal -->


<input type="file" id="hiddenFileInput" style="display: none;" />




 <!-- The Modal -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Select Quarter</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
         <select name="" id="" class="form-control">
            <option value="">Q1 25</option>
            <option value="">Q2 25</option>
         </select>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
           <button type="button" class="btn btn-secondary" data-dismiss="modal">Download</button>
        </div>
        
      </div>
    </div>
  </div>





  
 <!-- The Modal -->
  <div class="modal fade" id="myModal2">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Select Data to Record</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
         <select name="" id="" class="form-control">
            <option value="">Q1 25</option>
            <option value="">Q2 25</option>
         </select>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
           <button type="button" class="btn btn-secondary" data-dismiss="modal">Record</button>
        </div>
        
      </div>
    </div>
  </div>
  
  
                

<?php
require "footer.php";

?>