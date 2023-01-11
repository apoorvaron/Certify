<?php 
        include(__DIR__.'/../siteName.php');

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>Generate Certificate</title>
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
        if(isset($_POST['submit'])){
            require('../database.php');
            $database = new Database();
            $db = $database->connect();


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
            $unique = "000";
            $id = $id+1;
            $unique=  "".$unique.$id. "";



        
            $name = $_POST['name'];
            $enrollment = $_POST['enrollment'];
            $branch = $_POST['branch'];
 
            $sql = "INSERT INTO `certificates` (`uniqueNO`,`name`, `branch`, `enrollment`) VALUES ('$unique','$name', '$branch', '$enrollment')";
            // echo  "<br><br><br><br><br><br><br><br><br><br><br>sadfhgj,etasrydjfhghfetarsrydfkguyftuyrsdtufykgulytudrysdtufigjlhlgyftudfiyghkjl..........".$sql;
            $result = mysqli_query($db,$sql);
            session_start(); 
            if($result){


                $noOfRows = 1;

                // $_SESSION['alertmsz']="Successfully Created !!";
                // $_SESSION['desc']="";
                // $_SESSION['redirection']="./bulkDown.php?noOfRows=". $noOfRows ."";
                // $_SESSION['error']="success";
                // echo "<script>window.location.replace('./alert.php');</script>";

                echo "  <script>
                            window.location.replace('./bulkDown.php?noOfRows=". $noOfRows ."')    
                        </script>";
            }else{
                  
                                  
                    $_SESSION['alertmsz']="Try Again !!";
                    $_SESSION['desc']="";
                    $_SESSION['redirection']="./";
                    $_SESSION['error']="error";
                    
                    echo "<script>window.location.replace('./alert.php');</script>";
            }
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
                                        <h4 class="page-title">Single Certificate</h4>
                                       <!-- <a href="./index.php"><button type="" class="btn btn-success waves-effect waves-light" style="position: absolute;top: 29px;right: 15px;">Shorten Links</button></a> -->
                                    </div>
                                </div>
                            </div>

                            <!-- end page title end breadcrumb -->
                            <div class="row">
                                <div class="col-md-12 col-xl-12">
                                    <div class="card m-b-30">
                                        <div class="card-body">
                                            <!-- <div class="alert alert-success alert-dismissible fade show d-flex align-items-center" role="alert">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                                <i class="mdi mdi-information-outline font-32"></i><strong>Shorty</strong> 
                                            </div> -->
<!--              -->
                                            <!-- <h3 class="mt-0 header-title">Generate Single Certificate</h3> -->
                                            <!-- <p class="text-muted font-14"></p> -->
            
                                            <form  method="POST"  >
                      
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label> <b> Name </b></label>
                                                            <input type="text"  class="form-control" id="name" name="name" required placeholder="Ex: Apoorv Aron" maxlength="13"/>
                                                        </div>
                                                    </div>
                                                </div>
                                    
                                    

                                    
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label> <b> Branch </b></label>
                                                            <input type="text"  class="form-control" id="branch" name="branch" required placeholder="Ex: B.Tech IT" maxlength="12"/>
                                                        </div>
                                                    </div>
                                                </div>
                                    
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label> <b> Enrollment No. </b></label>
                                                            
                                                            <input type="text"  class="form-control" id="enrollment" name="enrollment" required placeholder="Ex: 01316401520" maxlength="14"/> 
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- <div class="row"> -->
                                                    <!-- <div class=" form-control col-md-12"> 
                                                        <span class="form-group">
                                                            <label><b></b></label>
                                                            <span><input type="text" onkeypress="return blockSpecialChar(event)"   placeholder="Custom Name" style="border:0px;padding-left:0px;;max-width: 50%;"   required id="shortenLink" name="shortenLink"/></span>
                                                        </span>
                                                            
                                                    </div> -->
                                                <!-- </div> -->



                                                
                                                <br>
                                            <!-- <br> -->
                                                <!-- <div class="row">
                                                    <div class="col-md-6 text-center">
                                                        <div class="form-group mb-0">
                                                            <div >
                                                                <button type="button" name="generateRandom" id="generateRandom" class="btn btn-success waves-effect waves-light">
                                                                    Random No.
                                                                </button>
                                                            
                                                                <button  class='btn btn-primary new' type='button' hidden id="previewBtn"  data-toggle='modal' data-target='#myModal' onclick = join()>Preview</button>
                                                            
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br> -->

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




          <!-- *************************** Get preview modal   *****************************  -->

                <div class='modal fade' id='myModal' role='dialog'>
                    <div class='modal-dialog'>
                        <div class=modal-content modal-background'>
                            <div class='modal-header modal-head'>
                                <button type='button' class='close' data-dismiss='modal'>&times;</button>
                                <h4 class='modal-title'>Your Shortlink!!</h4>
                            </div>
                            <div class='modal-body' id = 'modal'>
                            
                            </div>
                            <div class='modal-footer'>
                                <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
                            </div>
                        </div>
                    </div>
                </div>

               

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