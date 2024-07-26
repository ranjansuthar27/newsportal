<?php
 session_start();
//Database Configuration File
include('includes/config.php');

//error_reporting(0);
if (isset($_SESSION['login'])) {

        header("Location: dashboard.php");
    }

if(isset($_POST['submit']))
  {

    $uname=$_POST['username'];
    $password=$_POST['password'];

    $query = "SELECT username,email,password FROM tbladmin WHERE (username='$uname' AND password='$password') || 
                (email='$uname' AND password='$password')"; 

    $result = mysqli_query($conn,$query);

    $num = mysqli_num_rows($result);
    /*echo "<pre>";
    print_r($num);
  die;*/
    
    if ($num>0) {
       /* $getDetails = mysqli_fetch_assoc($result);*/
        $_SESSION['login'] = $_POST['username'];
        /*$_SESSION['admin_name'] = $getDetails['name'];*/
        header("location: dashboard.php");

    } else {
        echo "<script>
                alert('Wrong Input');
             </script>";
    }

}
 
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="News Portal.">
        <meta name="author" content="PHPGurukul">


        <!-- App title -->
        <title>News Portal | Admin Panel</title>

        <!-- App css -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/core.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/components.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/menu.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />

        <script src="assets/js/modernizr.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .container{
            margin: 70px;
            width:800px;
            height:600px;
            background-image: linear-gradient(lightpink,lightblue);
            position: fixed;
        }
        .login{
            height: 680px;
            width: 480px;
            margin-left: 130px;
            margin-top: 70px;
        }
        .form{
            padding: 10px 100px 70px 100px;
            background-image: repeating-linear-gradient(146deg, #d58cad, lightblue 320px);
        }
        .input-type1{
            padding: 20px;
        }
        .input-type2{
            margin-left: 11px;
            margin-top: -10px;
        }
        .input-type3{
            margin: 30px 35px;
        }
        .textbox1{
            padding: 10px;
        }
        .textbox2{
            padding: 10px;
        }
        .text{
            margin-left:35px;
            width: 13px;
            height: 5px;
        }
        .btn{
            background-color: skyblue;
           /* margin: -11px 107px;*/
            padding: 13px;
            width: 108px;
        }
        .btn:hover{
            background-color: black;
            color: white;
            border: 2px 2px solid black;
            cursor: pointer;
        }
        .icon{
            margin: 10px -23px;
        }
    </style>

    </head>


    <body class="bg-transparent">

        <!-- HOME -->
        <section>
            <div class="container-alt">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="container">
                            <div class="login">
                                <form class="form" method="post">
                <center><h1>Log In</h1></center>    
                    <p>log in here using your username/email and password </p>
                
                    
                <div class="input-type1">
                    <span><i class="fa fa-user" aria-hidden="true"></i></span>
                    <input class="textbox1" type="text" placeholder="@UserName" name="username" required>
                </div>
                
                <div class="input-type2">
                    <span><i class="fa fa-key fa-fw" aria-hidden="true"></i></span>
                    <input class="textbox1" type="password" name="password" placeholder="Password"><i class="fa fa-eye icon" aria-hidden="true"></i>
                </div>
                    
                <div class="input-type3">
                    <center><input type="submit"  class="btn textbox3 btn-black" name="submit" value="Login"></center>
                </div>
                
                

    
     
    </form>
    </div>
    </div>

                        <!-- end wrapper -->

                    </div>
                </div>
            </div>
          </section>
          <!-- END HOME -->

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

        <!-- App js -->
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>

    </body>
</html>