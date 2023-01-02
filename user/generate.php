<?php 
        include(__DIR__.'/../siteName.php');

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
        <style>
            input:focus {
                outline: none;
            } 
            .swal-overlay {
                background-color: #0e1d34;
            }
            .swal-button {
                padding: 7px 19px;
                border-radius: 2px;
                background-color: #4962B3;
                font-size: 12px;
                border: 1px solid #3e549a;
                text-shadow: 0px -1px 0px rgba(0, 0, 0, 0.3);
            }


        </style>
    </head>
        <!-- jQuery CDN -->
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <?php
        if(isset($_POST['submit'])){
            require('../admin/dBconn/database.php');
            $database = new Database();
            $db = $database->connect();
        
            $uno = $_GET['uno'];
            $linkIsFor = $_POST['linkIsFor'];
            $originalLink = $_POST['originalLink'];
            $shortenLink = $_POST['shortenLink'];
            $shortenLink = explode(" ",$shortenLink);
            $shortenLink = join("_",$shortenLink);
            // $shortenLink = "".$siteName."".$short;
            if (filter_var($originalLink, FILTER_VALIDATE_URL)) {


                $query = "SELECT * from links WHERE shortenLink='".$shortenLink."'";
                $result = mysqli_query($db,$query);
                $count_rows = mysqli_num_rows($result);
                if($count_rows>0){
                    echo "  <script>
                                $(document).ready(function(){
                                    swal('Custom Name Not Available !!','','error');
                                });
                            </script>";
                }else{

                    $query = "SELECT * FROM links WHERE uniqueNo='".$uno."' AND originalLink='".$originalLink."'";
                    $result = mysqli_query($db,$query);
                    $row = mysqli_fetch_array($result);
                    $count_rows = mysqli_num_rows($result);
                // echo "<br><br><br><br><br><br>adegsrdhgfjhgdgrearwethjyfgytrtwyjygj.".$query;

                    if($count_rows>0){
                        echo "<script>window.location.replace('./alreadyOriginal.php?username=".$_GET['username']."&uno=".$_GET['uno']."&linkID=".$row['linkID']."')</script>";
                    }else{
                        $sql = "INSERT INTO `links` (`uniqueNo`,`linkIsFor`, `originalLink`, `shortenLink`) VALUES ('$uno','$linkIsFor', '$originalLink', '$shortenLink')";
                        $result = mysqli_query($db,$sql);
                        if($result){
                            echo "  <script>
                                        $(document).ready(function(){
                                            swal('Successfully Created !!','','success').then(function() {
                                                window.location = './index.php?username=".$_GET['username']."&uno=".$_GET['uno']."';
                                            });
                                        });
                                    </script>";
                        }else{
                                echo "  <script>
                                            $(document).ready(function(){
                                                swal('Try Again !!','','error');
                                            });
                                        </script>";
                        }
                    }

                }



            





            }else{
                echo "  <script>
                            $(document).ready(function(){
                                swal('Please Enter Valid URL !!','','info');
                            });
                        </script>";
            }

            
    
            // echo "<br><br><br><br><br><br><br>eqfwgretgfnerwqedgnretrqthdgjrwteqwrhdgtehryw".$result;
            
          
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
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                                <i class="mdi mdi-information-outline font-32"></i><strong>Certify</strong> 
                                            </div> -->
            
                                            <!-- <h3 class="mt-0 header-title"></h3> -->
                                            <!-- <p class="text-muted font-14"></p> -->
            
                                            <form  method="POST"  >
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label style="font-weight:200"></label>
                                                        <br>
                                                        <input type="file"  class="" id="" name="" required />
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

                <script>

                    function join(){
                        let value = $('#shortenLink').val();
                        let new_text = value.split(' ').join('_');
                        let shortlink = "<?php echo $siteName ?>"+new_text;
                        $('#modal').html(shortlink);
                        console.log(new_text);

                    }
                </script>

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