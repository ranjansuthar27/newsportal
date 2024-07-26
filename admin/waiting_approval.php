<?php

session_start();

include('includes/config.php');

error_reporting(0);

if (isset($_GET['cid'])) {
    $cid = $_GET['cid'];

    $query_approve = "UPDATE `comments` SET `is_active`='1' WHERE id='$cid'";
    $result_approve = mysqli_query($conn,$query_approve);


    if ($result_approve) {
        echo "<script>alert('Comment Approved')</script>";
    } else {
        $error = "Error";
    }
}



if ($_GET['action'] == 'del') {
    $rid = $_GET['rid'];
    $query_delete = "DELETE FROM `comments` WHERE id = '$rid'";
    $result_delete = mysqli_query($conn,$query_delete);
    if ($result_delete) {
        $success = "Comment Deleted";
    }else {
        $error = "Error";
    }
}


/*if (isset($_GET['resid'])) {
    $resid = $_GET['resid'];

    $query = "UPDATE `tblcategory` SET `Is_Active`='1' WHERE id='$resid'";
    $result = mysqli_query($conn,$query);

    if ($result) {
        $success = "Category Restore Successfully";
    } else {
        $error = "Error";
    }
}
*/


        if(strlen($_SESSION['login'])==0)
            { 
                header('location:index.php');
            }

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">
        <!-- App title -->
        <title>News Portal | Dashboard</title>
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
                                    <h4 class="page-title"> Manage Comments</h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="#">Admin</a>
                                        </li>
                                        <li>
                                            <a href="#">Comments</a>
                                        </li>
                                        <li class="active">
                                            Waiting_approval
                                        </li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
							</div>
						</div>
                        <!-- end row -->

                        <?php

                        if (isset($success)) {
                            
                        ?>
                        <div class="alert alert-info text-dark" style="width: 20%">
                            <?php echo $success;  ?>
                        </div>
                        <?php
                          }
                        ?>
                        <form method="POST">
                        <table class="table table-hover" style="margin-top:50px;">
                        <thead class="thead-dark bg-dark text-white" style="font-size: 20px;">
                        <tr>
                            <th>SL.NO</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Comment</th>
                            <th>Post Title</th>
                            <th>Posting Date</th>
                            <th>ACTION</th>
                        </tr>
                        </thead>
                        <tbody>
                    <?php
                        $query = "SELECT
                                        c.id,
                                        c.name,
                                        c.email,    
                                        c.comment,
                                        c.created_at,
                                        po.postTitle
                                    FROM
                                        comments AS c
                                    LEFT JOIN postdetails AS po
                                    ON
                                        po.id = c.news_id
                                    WHERE
                                        c.is_active = 0";        
                        $resultCat = mysqli_query($conn, $query);
                        $numberOfRow = mysqli_num_rows($resultCat);
                        if ($numberOfRow == 0) {
                            ?>
                            <tr>
                                <td colspan="7" style="color:red; text-align: center;">No Record Found</td>
                            </tr>
                            <?php
                        }
                        $slNo=1;
                      while ($response = mysqli_fetch_assoc($resultCat)) {
                    ?>

                    <tr class="bg-info text-dark">
                        <td class="text-white bg-dark "><?php echo $slNo++; ?></td>
                        <td><?php echo $response['name']; ?></td>
                        <td><?php echo $response['email']; ?></td>
                        <td><?php echo $response['comment']; ?></td>
                        <td><?php echo $response['postTitle']; ?></td>
                        <td><?php echo $response['created_at']; ?></td>
                        <td style="font-size: 20px;">
                            <a href="waiting_approval.php?cid=<?php echo $response['id']; ?>"><i class="fa fa-pencil-square-o" aria-hidden="true" role="button">Approved</i></a>&nbsp;&nbsp;&nbsp;
                            <a href="waiting_approval.php?rid=<?php echo $response['id']; ?>&&action=del"><i class="fa fa-trash" aria-hidden="true" role="button">Delete</i></a>
                        </td>
                    </tr>
                 </tbody>
            <?php
            }            
            ?>  
        </table>



                        </form>

                    </div> <!-- container -->
      
        <?php include('includes/footer.php');?>
            </div>
            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->


            <!-- Right Sidebar -->
            <div class="side-bar right-bar">
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
            </div>
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
