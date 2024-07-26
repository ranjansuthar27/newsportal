<?php
session_start();
include('includes/config.php');

    if (isset($_POST['submit'])) {
         $catId = $_POST['Category'];
         $subCatName = $_POST['SubCategoryName'];
         $subCatDescription = $_POST['SubCateDescription'];

         

         $query = "INSERT INTO `tblsubcategory`(`id`, `cat_id`, `subcat_name`, `subcat_des`, `is_active`) VALUES ('',
                    '$catId','$subCatName','$subCatDescription','1')";
         
        $result = mysqli_query($conn,$query);
        /*echo "<pre>";
        print_r($result);
        die;  */  

        if ($result) {
            $success = "Sub Category Added";
        } else {
            $success = "Error";
        }
  }

  error_reporting(0);
    if(strlen($_SESSION['login'])==0)
      { 
    header('location:index.php');
    }
    else{
        
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">
        <!-- App title -->
        <title>News Portal |Addcategory</title>
		<link rel="stylesheet" href="../plugins/morris/morris.css">

        <!-- App css -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/core.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/components.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/menu.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="../plugins/switchery/switchery.min.css">
        <script src="assets/js/modernizr.min.js"></script>

    </head>


    <body class="fixed-left">

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Top Bar Start -->
            <div class="topbar">

                <!-- LOGO -->
                <div class="topbar-left">
                    <a href="dashboard.php" class="logo"><span>NP<span>Admin</span></span><i class="mdi mdi-layers"></i></a>
                    <!-- Image logo -->
                    <!--<a href="index.html" class="logo">-->
                        <!--<span>-->
                            <!--<img src="assets/images/logo.png" alt="" height="30">-->
                        <!--</span>-->
                        <!--<i>-->
                            <!--<img src="assets/images/logo_sm.png" alt="" height="28">-->
                        <!--</i>-->
                    <!--</a>-->
                </div>

                <!-- Button mobile view to collapse sidebar menu -->
            <?php include('includes/topheader.php');?>
            </div>
            <!-- Top Bar End -->


            <!-- ========== Left Sidebar Start ========== -->
    <?php include('includes/leftsidebar.php');?>
            <!-- Left Sidebar End -->



            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">
                        <div class="row">
							<div class="col-xs-12">
								<div class="page-title-box">
                                    <h4 class="page-title">Add Sub Category</h4>
                                    <ol class="breadcrumb p-0 m-0">
                                       <li>
                                            <a href="#">Admin</a>
                                        </li>
                                        <li>
                                            <a href="#">Sub Category</a>
                                        </li>
                                        <li class="active">
                                            Add Sub Category
                                        </li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
							</div>
						</div>
                        <!-- end row -->
                        <!-- start col -->
                        <?php

                        if (isset($success)) {
                            
                        ?>
                        <div class="alert alert-info text-dark" style="width: 20%">
                            <?php echo $success;  ?>
                        </div>
                        <?php
                          }
                        ?>
                     
                        <form method="POST"  style="width:35%;">
                            <div class="row">

                                    <div class="col-lg-12 col-md-6 col-sm-6">
                                        <label style="font-size: 20px; color: blue;">CategoryName</label>
                                        <div class="card-box widget-box-one" style="background-color: #5599e3;">
                                            <select style="width: 247px;height:45px;" name="Category">
                                                <option>Select Category</option>
                                                <?php
                                                $queryCat = "SELECT * FROM tblcategory";
                                                $resultCat = mysqli_query($conn,$queryCat);

                                                while ($response = mysqli_fetch_assoc($resultCat)) {
                                                    ?>
                                                    <option value="<?php echo $response['id']; ?>"><?php echo $response['CategoryName']; ?></option>

                                                <?php
                                                    } 
                                                 ?>
                                            </select>
                                           <!-- <input style="width: 247px;height: 56px;" type="text" name="CategoryName" placeholder="CategoryName" required=""> -->
                                        </div>
                                    </div>
                              
                                    <div class="col-lg-12 col-md-6 col-sm-6">
                                         <label style="font-size: 20px; color: blue;">Sub CategoryName</label>
                                        <div class="card-box widget-box-one" style="background-color: #5599e3;">
                                           <input style="width: 247px;height: 56px;" type="text" name="SubCategoryName" placeholder="SubCategoryName" required="">
                                        </div>
                                    </div>
                                <!-- end col -->
                            
                             
                                    <div class="col-lg-12 col-md-6 col-sm-6">
                                         <label style="font-size: 20px; color: blue;">Sub Category Description</label>
                                        <div class="card-box widget-box-one" style="background-color: #5599e3;">
                                           <textarea type="text" rows="4" cols="50" name="SubCateDescription" placeholder="SubCategoryDescription" required=""></textarea> 
                                        </div>
                                    </div>
                                <!-- end col -->
                            </div>
                               <input type="submit" class="btn btn-primary" name="submit" value="SUBMIT">
                        </form>
                    </div>
                        <!-- end row -->
                </div> <!-- container -->

            </div> <!-- content -->
<?php include('includes/footer.php');?>

            </div>


            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->


            <!-- Right Sidebar -->
            <!-- <div class="side-bar right-bar">
                <a href="javascript:void(0);" class="right-bar-toggle">
                    <i class="mdi mdi-close-circle-outline"></i>
                </a>
                <h4 class="">Settings</h4>
                <div class="setting-list nicescroll">
                    <div class="row m-t-20">
                        <div class="col-xs-8">
                            <h5 class="m-0">Notifications</h5>
                            <p class="text-muted m-b-0"><small>Do you need them?</small></p>
                        </div>
                        <div class="col-xs-4 text-right">
                            <input type="checkbox" checked data-plugin="switchery" data-color="#7fc1fc" data-size="small"/>
                        </div>
                    </div>

                    <div class="row m-t-20">
                        <div class="col-xs-8">
                            <h5 class="m-0">API Access</h5>
                            <p class="m-b-0 text-muted"><small>Enable/Disable access</small></p>
                        </div>
                        <div class="col-xs-4 text-right">
                            <input type="checkbox" checked data-plugin="switchery" data-color="#7fc1fc" data-size="small"/>
                        </div>
                    </div>

                    <div class="row m-t-20">
                        <div class="col-xs-8">
                            <h5 class="m-0">Auto Updates</h5>
                            <p class="m-b-0 text-muted"><small>Keep up to date</small></p>
                        </div>
                        <div class="col-xs-4 text-right">
                            <input type="checkbox" checked data-plugin="switchery" data-color="#7fc1fc" data-size="small"/>
                        </div>
                    </div>

                    <div class="row m-t-20">
                        <div class="col-xs-8">
                            <h5 class="m-0">Online Status</h5>
                            <p class="m-b-0 text-muted"><small>Show your status to all</small></p>
                        </div>
                        <div class="col-xs-4 text-right">
                            <input type="checkbox" checked data-plugin="switchery" data-color="#7fc1fc" data-size="small"/>
                        </div>
                    </div>
                </div>
            </div> -->
            <!-- /Right-bar -->

        </div>
        <!-- END wrapper -->



        <script>
            var resizefunc = [];
        </script>

        <!-- jQuery  -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/detect.js"></script>
        <script src="assets/js/fastclick.js"></script>
        <script src="assets/js/jquery.blockUI.js"></script>
        <script src="assets/js/waves.js"></script>
        <script src="assets/js/jquery.slimscroll.js"></script>
        <script src="assets/js/jquery.scrollTo.min.js"></script>
        <script src="../plugins/switchery/switchery.min.js"></script>

        <!-- Counter js  -->
        <script src="../plugins/waypoints/jquery.waypoints.min.js"></script>
        <script src="../plugins/counterup/jquery.counterup.min.js"></script>

        <!--Morris Chart-->
		<script src="../plugins/morris/morris.min.js"></script>
		<script src="../plugins/raphael/raphael-min.js"></script>

        <!-- Dashboard init -->
        <script src="assets/pages/jquery.dashboard.js"></script>

        <!-- App js -->
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>

    </body>
</html>
<?php } ?>