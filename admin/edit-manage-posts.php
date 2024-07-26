<?php
session_start();
include('includes/config.php');

 if (isset($_GET['resid'])) {

    $resid = $_GET['resid'];
    echo $query = "SELECT
                                                    pd.id,
                                                    pd.postTitle,                                                    
                                                    tc.categoryName,
                                                    tsc.subcat_name,
                                                    pd.postDetails
                                                FROM
                                                    `postdetails` AS pd
                                                LEFT JOIN tblcategory AS tc
                                                ON
                                                    tc.id = pd.postCategory
                                                LEFT JOIN tblsubcategory AS tsc
                                                ON
                                                    tsc.id = pd.postSubcategory 
                                                    WHERE pd.postCategory= '$resid'";

   
    $result=mysqli_query($conn,$query);
    /*echo "<pre>";
    print_r($result);
    die;*/

    $total=mysqli_fetch_assoc($result);
    // echo "<pre>";
    // print_r($total);
    // die;
}


    if (isset($_POST['submit'])) {
          $postTitle = $_POST['posttitle'];
          $postCategory = $_POST['postCategory'];
          $subCatName = $_POST['SubCategoryName'];
          $postDetails = $_POST['postDetails'];
          $file = $_FILES['postImage']['tmp_name'];
          $fileName = $_FILES['postImage']['name'];
         move_uploaded_file($file,"images/".$fileName);
         

        $query = "INSERT INTO `postdetails`(`id`, `postTitle`, `postCategory`, `postSubcategory`, `postDetails`, `images`,`is_active`) VALUES ('','$postTitle','$postCategory','$subCatName','$postDetails','$fileName','1')";
         
        $result = mysqli_query($conn,$query);
        /*echo "<pre>";
        print_r($result);
        die;
*/
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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
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
                                    <h4 class="page-title">Add Posts</h4>
                                    <ol class="breadcrumb p-0 m-0">
                                       <li>
                                            <a href="#">Admin</a>
                                        </li>
                                        <li>
                                            <a href="#">Posts</a>
                                        </li>
                                        <li class="active">
                                            Add Posts
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
                     
                        <form method="POST" style="width:35%;" enctype="multipart/form-data">
                            <div class="row">

                                <div class="col-lg-12 col-md-6 col-sm-6">
                                         <label style="font-size: 20px; color: blue;">Post Title</label>
                                        <div class="card-box widget-box-one" style="background-color: #5599e3;">
                                           <input style="width: 247px;height: 56px;" type="text" name="posttitle" placeholder="Post Title" required=""  value="<?php echo $total['postTitle']; ?>">
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-6 col-sm-6">
                                        <label style="font-size: 20px; color: blue;">Category</label>
                                        <div class="card-box widget-box-one" style="background-color: #5599e3;">
                                            <select style="width: 247px;height:45px;" name="postCategory" id="category">
                                                <option value="">Select Category</option>
                                                <?php
                                                $queryCat = "SELECT * FROM tblcategory ";
                                                $resultCat = mysqli_query($conn,$queryCat);

                                                while ($response = mysqli_fetch_assoc($resultCat)) {
                                                    ?>
                                                    <option value="<?php echo $response['id']; ?>"><?php echo $response['CategoryName']; ?></option>

                                                <?php
                                                    } 
                                                 ?>
                                            </select>
                                        </div>
                                    </div>

                                   <div class="col-lg-12 col-md-6 col-sm-6">
                                        <label style="font-size: 20px; color: blue;">Sab Category </label>
                                        <div class="card-box widget-box-one" style="background-color: #5599e3;">
                                            <select style="width: 247px;height:45px;" name="SubCategoryName" id="subCatName">
                                                <option value="">Select SubCategory</option>
                                            </select>
                                           <!-- <input style="width: 247px;height: 56px;" type="text" name="CategoryName" placeholder="CategoryName" required=""> -->
                                        </div>
                                    </div>                                 
                             
                            

                                      <div class="col-lg-12 col-md-6 col-sm-6">
                                         <label style="font-size: 20px; color: blue;">Post Description</label>
                                        <div class="card-box widget-box-one" style="background-color: #5599e3;">
                                           <textarea type="text" rows="4" cols="50" name="postDetails" placeholder="postDetails" required=""></textarea> 
                                        </div>
                                    </div>


                                    <div class="col-lg-12 col-md-6 col-sm-6">
                                         <label style="font-size: 20px; color: blue;">Add Image</label>
                                        <div class="card-box widget-box-one" style="background-color: #5599e3;">
                                          <input type="file" name="postImage">
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


         
        </div>
        <!-- END wrapper -->



        <script type="text/javascript">
            $(document).ready(function(){
                $(document).on("change","#category",function(){
                   /* alert($(this).val());*/
                    var catId = $(this).val();
                        $.ajax({
                            type: "POST",
                            url : "getmanagecat.php",
                            data : {catId : catId},
                            success: function(data){    
                                $("#subCatName").html(data);
                            }
                        });
                });
            });
        </script>

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