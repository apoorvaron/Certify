<?php
    use Shuchkin\SimpleXLSX;
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>Generate Certificates </title>
        <meta content="Admin Dashboard" name="description" />
        <meta content="themesdesign" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <link href="../assets/img/logo.png" rel="icon" />

        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="assets/plugins/animate/animate.css" rel="stylesheet" type="text/css">
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css">
        <link href="assets/css/style.css" rel="stylesheet" type="text/css">
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    </head>
        <!-- jQuery CDN -->
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <?php
        require('../database.php');
        $database = new Database();
        $db = $database->connect();

        if(isset($_FILES['excel']['name'])){

            // require('../blogAdmin/database.php');

            $sql = "SELECT * FROM certificates ORDER BY id DESC LIMIT 1";
            $result = mysqli_query($db, $sql);

            if(mysqli_num_rows($result) > 0){
                $row = mysqli_fetch_array($result);
                $u = $row['uniqueNo'];
                $id = substr($u, -4);
                // echo $id;
                ord($id);
                
            }
            else{
                $id = 1;
            }
            include "xlsx.php";
            $noOfRows = 0;

            if($db){
                $excel = SimpleXLSX::parse($_FILES['excel']['tmp_name']);
                // print_r($excel->rows());
                $i=0;
                $query="";
                $unique = "000";


                foreach ($excel->rows() as $key => $row) {
                    // print_r($row);
                    $q="";
                    if($i>0){
                        $id = $id+1;
                        $unique=  "'".$unique.$id. "',";
                        //echo $unique;
                    }   
                    // $confirmation = false;

                    // echo ($confirmation);

                    foreach ($row as $key => $cell) {
                        //$unique = strtolower(substr(str_shuffle($str_result),0, 10));$sql = "SELECT * FROM certificate ORDER BY id DESC LIMIT 1";
                        

                        
                        // echo $unique;
                        if($i>0){
                            $q.="'".$cell. "',";
                        }
                    }
                
            
                    if($i>0){
                        $query="INSERT INTO certificates (uniqueNO, name,branch,enrollment) values (".$unique.rtrim($q,",").");";
                        $array = explode(',', $q);
                        // echo $q;
                        $email = $array [1];



                        
                        $unique = "000";
                        // echo $query;
                    }
                    
                    if($i>0){
                        if(mysqli_query($db,$query)){
                                // echo "true";
                                // echo $i;
                                $noOfRows = $i;
                        }
                    }
                    $i++;
                }
            }

            // echo $noOfRows;
            echo "  <script>
                        window.location.replace('./bulkDown.php?noOfRows=". $noOfRows ."')    
                    </script>";
        }
?>


    <body class="fixed-left">
        <!-- Begin page -->
        <div id="wrapper">

            <?php include'header.php'; ?>
                    <!-- Top Bar End -->

                    <div class="page-content-wrapper">

                        <div class="container-fluid">

     
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="page-title-box">
                                        <h4 class="page-title">Generate Certificates</h4>
                                       <!-- <a href="./index"><button type="" class="btn btn-success waves-effect waves-light" style="position: absolute;top: 29px;right: 15px;">All Certificates</button></a> -->
                                       <a href="./sample.xlsx"  style="position: absolute;top: 29px;right: 15px;" download class="btn btn-success waves-effect waves-light">Download Sample File</a>
                                    </div>
                                </div>
                            </div>

                            <!-- end page title end breadcrumb -->
                            <div class="row">
                                <div class="col-md-12 col-xl-12">
                                    <div class="card m-b-30">
                                        <div class="card-body">

                                        <h3 class="mt-0 header-title">Upload Excel (.xlsx)</h3>
                                            <!-- <p class="text-muted  font-14">
                                            </p> -->


                                            <!-- <div class="alert alert-success alert-dismissible fade show d-flex align-items-center" role="alert">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">??</span>
                                                </button>
                                                <i class="mdi mdi-information-outline font-32"></i><strong>Certify</strong> 
                                            </div> -->
            
                                            <!-- <h3 class="mt-0 header-title"></h3> -->
                                            <!-- <p class="text-muted font-14"></p> -->
            
                                        <form method = "POST" enctype="multipart/form-data">

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label style="font-weight:200"></label>
                                                        <br>
                                                        <input type = "file" name = "excel" required />
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                             
                                            <div class="row">
                                                <div class="col-md-6 text-center">
                                                    <div class="form-group mb-0">
                                                        <div >
                                                            <!-- <a href="/images/myw3schoolsimage.jpg" download class="btn btn-success waves-effect waves-light">

                                                                    Download Sample File
                                                            </a> -->
                                                            <!-- </button> -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>

                                            <div class="row">
                                                <div class="col-md-6 ">
                                                    <div class="form-group mb-0">
                                                        <div >
                                                            <button type="submit" name="submit" id="submit" class="btn btn-success waves-effect waves-light">
                                                                Generate
                                                            </button>
                                                         
                                                 
                                                            <button  type="reset" class="btn btn-danger waves-effect m-l-5">
                                                                Cancel
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            </form>
            
                                        </div>
                                    </div>
                                </div> <!-- end col -->
            
                            </div> <!-- end row -->


                        </div><!-- container -->

                    </div> <!-- Page content Wrapper -->

                </div> <!-- content -->




          <!-- *************************** Get preview modal ends   *****************************  -->


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

        <!-- Parsley js -->
        <script src="assets/plugins/parsleyjs/parsley.min.js"></script>
        <script src="assets/pages/form-validation.init.js"></script>

        <!-- App js -->
        <script src="assets/js/app.js"></script>

    </body>
</html>