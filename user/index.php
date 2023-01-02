<?php 
        error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>Admin Panel</title>
        <meta content="Admin Dashboard" name="description" />
        <meta content="themesdesign" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <link rel="shortcut icon" href="../assets/img/logo.png">

        <!-- DataTables -->
        <link href="assets/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <!-- Responsive datatable examples -->
        <link href="assets/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" /> 

        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="assets/plugins/animate/animate.css" rel="stylesheet" type="text/css">
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css">
        <link href="assets/css/style.css" rel="stylesheet" type="text/css">
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css'>

    </head>


    <body class="fixed-left">
        <!-- Begin page -->
        <div id="wrapper">

            <?php include'header.php';?>
                    <!-- Top Bar End -->

                    <div class="page-content-wrapper">

                        <div class="container-fluid">

                        <div class="row">
                                <div class="col-sm-12">
                                    <div class="page-title-box">
                                    <h4 class="page-title">All Certificates</h4>
                                 
                                        
                                       <a href="generate"><button type="submit" class="btn btn-success waves-effect waves-light" style="position: absolute;top: 29px;right: 15px;">Generate Certificates</button></a>
                                    </div>
                                </div>
                        </div>
                       
                            <!-- end page title end breadcrumb -->
                           
            
                          
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <h3 class="mt-0 header-title">Certificates</h3>
                                            <p class="text-muted  font-14">Here , You can  download, delete or make new customised certificates.
                                            </p>
            
                                            <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%; text-align:center;">

                                                <thead >
                                                <tr>
                                                    <th>Sl.No</th>
                                                    <th>Unique No.</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Enrollment No.</th>
                                                    <th>Branch</th>
                                                    <th>Download</th>
                                                    <th>Delete</th>
                                                   

                                                    
                                                </tr>


                                                </thead>
                                                <?php 
                                                    // require('../admin/dBconn/database.php');
                                                    $database = new Database();
                                                    $db = $database->connect();

                                                    $sql = "SELECT * FROM certificates";
                                                    if($result = mysqli_query($db, $sql)){
                                                        if(mysqli_num_rows($result) > 0){
                                                                while($row = mysqli_fetch_array($result)){  
                                                                        echo "
                                                                        <tr>
                                                                            <td>".$row['id']."</td>
                                                                            <td>".$row['uniqueNo']."</td>
                                                                            <td>".$row['name']."</td>
                                                                            <td>".$row['email']."</td>
                                                                            <td>".$row['enrollment']."</td>
                                                                            <td>".$row['branch']."</td>
                                                                            <td><a href='./preview?id=".$row['id']."'> <button type='button' class='tabledit-download-button btn btn-sm btn-light' style='float: none; margin: 5px'><span class='ti-arrow-down'></span></button></a></td>
                                                                            <td><a href='./delete?id=".$row['id']."'  class='tabledit-delete-button btn btn-sm btn-light' style='float: none; margin: 5px;'><span class='ti-trash text-danger'></span></a></td>
                                                                        
                                                                        </tr>
                                                                            ";   
                                                                }
                                                            mysqli_free_result($result);
                                                        } else{
                                                            echo "<p class='lead'><em></em></p>";
                                                        }
                                                    } else{
                                                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                                
                                                    }
                                                ?>

                                               
                                               
                                                </tbody>
                                            </table>
                                                    


<!-- **********************************************       GET API           ********************************************** -->
                                              

                                            <!-- <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%; text-align:center;">
                                                <thead >
                                                <tr>
                                                    <th>Sl.No</th>
                                                    <th>Link is For</th>
                                                    <th>Original Link</th>
                                                </tr>
                                                </thead>
                                                <tbody id="linkPage">
                                                    <tr>
                                                        <td>1</td>
                                                        <td>Docs</td>
                                                        <td>https://docs.google.com/spreadsheets/</td>
                                                    </tr>
                                                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
                                                    <script>
                                                            let urllink = '../admin/dBconn/api.php?q=getLinks';

                                                            let linkPage=document.getElementById("linkPage");
                                                            // linkPage.innerHTML="";
                                                            let sno = 1;
                                                            $(document).ready(function() {
                                                                $.ajax({
                                                                    url: urllink,
                                                                    method: 'GET',
                                                                    dataType: 'JSON',
                                                                    success: function(data) {
                                                                        console.log("check data ywar",data);
                                                                        data.forEach(allEvent);                    
                                                                        function allEvent(event) {
                                                                            
                                                                            // console.log(event.linkID);
                                                                            // linkPage.innerHTML+=`${event.linkID}`;
                                                                            linkPage.innerHTML+=`<tr>
                                                                                                    <td>${sno}</td>
                                                                                                    <td>${event.linkIsFor}</td>
                                                                                                    <td>${event.originalLink}</td>  
                                                                                                </tr>`;
                                                                            sno++;
                                                                                        
                                                                        } 
                                                        
                                                        
                                                                    },error: function(xhr, status, error){
                                                                        console.log("No");
                                                                    },
                                                                });
                                                            });
                                                    </script>  
                                                </tbod>
                                            </table> -->

<!-- **********************************************       GET API Ends        ********************************************** -->




                                        </div>
                                    </div>
                                </div> <!-- end col -->
                            </div> <!-- end row -->

                        </div><!-- container -->

                    </div> <!-- Page content Wrapper -->

                </div> <!-- content -->

               <?php include'footer.php';?>
            </div>
            <!-- End Right content here -->

        </div>
        <!-- END wrapper -->


        <!-- jQuery  -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.bundle.min.js"></script>
        <script src="assets/js/modernizr.min.js"></script>
        <script src="assets/js/detect.js"></script>
        <script src="assets/js/fastclick.js"></script>
        <script src="assets/js/jquery.slimscroll.js"></script>
        <script src="assets/js/jquery.blockUI.js"></script>
        <script src="assets/js/waves.js"></script>
        <script src="assets/js/jquery.nicescroll.js"></script>
        <script src="assets/js/jquery.scrollTo.min.js"></script>

        <!-- Required datatable js -->
        <script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>
        <!-- Buttons examples -->
        <script src="assets/plugins/datatables/dataTables.buttons.min.js"></script>
        <script src="assets/plugins/datatables/buttons.bootstrap4.min.js"></script>
        <script src="assets/plugins/datatables/jszip.min.js"></script>
        <script src="assets/plugins/datatables/pdfmake.min.js"></script>
        <script src="assets/plugins/datatables/vfs_fonts.js"></script>
        <script src="assets/plugins/datatables/buttons.html5.min.js"></script>
        <script src="assets/plugins/datatables/buttons.print.min.js"></script>
        <script src="assets/plugins/datatables/buttons.colVis.min.js"></script>
        <!-- Responsive examples -->
        <script src="assets/plugins/datatables/dataTables.responsive.min.js"></script>
        <script src="assets/plugins/datatables/responsive.bootstrap4.min.js"></script>
  
        <!-- Datatable init js -->
        <script src="assets/pages/datatables.init.js"></script>  

        <!-- App js -->
        <script src="assets/js/app.js"></script>

    </body>
</html>