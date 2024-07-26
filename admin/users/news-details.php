<?php
session_start();
include('../includes/config.php');

/*print_r($_SESSION);
die;*/

 /* comment insert query*/
if (!isset($_SESSION['cmt_token'])) {
    $_SESSION['cmt_token'] = bin2hex(random_bytes(32));
}

    if (isset($_POST['submit'])) {
        echo $token = $_POST['token'];
         $news_id = $_GET['news_id'];
         $name = $_POST['name'];
         $email = $_POST['email'];
         $comment = $_POST['comment'];
        

         if ($token != $_SESSION['cmt_token'] ) {
           
         } else {

            $query_cmt = "INSERT INTO `comments`(`id`, `name`, `email`, `comment`, `news_id`,`is_active`) VALUES ('','$name','$email','$comment','$news_id','0')";

              $result_cmt = mysqli_query($conn,$query_cmt);

              if ($result_cmt == true) {
                   unset($_SESSION['cmt_token']);
                    echo "<script>alert('Comment Added')</script>";
              } else {
                echo "<script>alert('Error')</script>";
              }

         }
    }
 

         

          $query = "SELECT 
            po.id,
            po.postTitle,
            tc.CategoryName,
            tsc.subcat_name,
            po.created_At,
            po.postDetails,
            po.images
          FROM
          postdetails AS po 
          LEFT JOIN tblcategory AS tc
          ON
          tc.id = po.postCategory
          LEFT JOIN tblsubcategory AS tsc
          ON
          tsc.id = po.postSubcategory WHERE po.id  = ".$_GET['news_id'] ;

          $result = mysqli_query($conn,$query);
          $response = mysqli_fetch_assoc($result);
   

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>GUJARAT NEWS</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<link rel="stylesheet" media="screen,projection" type="text/css" href="css/main.css" />
<link rel="stylesheet" media="screen,projection" type="text/css" href="css/skin.css" />
<script type="text/javascript" src="javascript/cufon-yui.js"></script>
<script type="text/javascript" src="javascript/font.font.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script type="text/javascript">
Cufon.replace('h1, h2, h3, h4, h5, h6', {
    hover: true
});
</script>
</head>
<body>
<!-- START PAGE SOURCE -->
<div class="main">
    <div id="header" class="box">
      <h5 id="logo">GUJARAT NEWS</h5>
        <ul id="nav">
          <!-- <li class="current"><a href="index.html">Homepage</a></li> -->
          <li><a href="subpage.html">Categories</a></li>
          <li><a href="#">Discussion</a></li>
          <li><a href="#">Authors</a></li>
          <li><a href="#">Blogs</a></li>
          <li><a href="#">Contact</a></li>
        </ul>
    </div>


      <div id="aside">
      <!-- search box -->
      <form method="POST" action="search.php">
        <input type="text" name="search">
        <button type="submit" name="submit">search</button>
      </form>
      <!-- CATEGORY -->
      <h3>CATEGORY</h3>
      <ul class="menu">
        <?php

          $quertCategory = "SELECT * FROM tblcategory";
          $resultCategory = mysqli_query($conn,$quertCategory);
          while ($responsecat = mysqli_fetch_assoc($resultCategory)) {
          ?>
            <li>
              <a href="catdescription.php?catid=<?php echo $responsecat['id']; ?>">
                <?php echo $responsecat['CategoryName']; ?>
              </a>
            </li>
        <?php
          }         
        ?>
       
      </ul>
    <!-- SUB CATEGORY -->
      <h3 class="nomb">LATEST NEWS</h3>
      <ul class="sponsors">
        <?php

          $queryNews = "SELECT * FROM postdetails ORDER BY created_At DESC LIMIT 5";
          $resultNews = mysqli_query($conn,$queryNews);

          while ($responseNews = mysqli_fetch_assoc($resultNews)) {
            ?>

            <li>
              <a href="latestnew.php?lnid=<?php echo $responseNews['id'] ?>">
                <?php echo $responseNews['postTitle']; ?>
              </a>
            </li>

          <?php
            }
          ?>
        
      </ul>
    </div>
      <div id="section" class="box">
          <div id="content">
            <ul class="articles box">
                <li>
                  <h3 class="text-primary">POST DETAILS</h3>
                 <!--  <h2><a href="#"><?php echo $response['postTitle']; ?></a></h2> -->
                  <div class="article-info box">
                    <!-- <p class="f-right"><a href="#" class="comment">Comments (15)</a></p> -->
                    <p><b>Category</b> <?php echo $response['CategoryName']; ?>  |  <b> SubCategoryName </b> <?php echo $response['subcat_name']; ?> <b> Posted On </b> <?php echo $response['created_At']; ?></p>
                  </div>
                  <p><b><?php echo $response['postTitle']; ?></b></p>
              
                  <p><img class="f-left" src="../images/<?php  echo $response['images']; ?>" width="200" height="200">
                    <?php
                      echo $response['postDetails'];
                    ?>
                  </p>
             <!--      <p class="more"><a href="news-details.php">Read more &raquo;</a></p> -->
                </li>
            </ul>       
        </div>
      </div>



<!-- comment section -->
      <div id="section" class="box animated flipInX" >
        <div id="content" class="border border-secondary">

          <form  method="POST" class="p-5">
                <div class="form-group">
                  <h6 class="text-primary">ADD COMMENTS</h6>
                </div>
            
                <div class="form-group">
                  <label for="uname">Name</label>
                  <input type="text" class="form-control" name="name" placeholder="EnterName" required="">
                  <input type="hidden" name="token" value="<?php echo  ($_SESSION['cmt_token']);?>">
                </div>
                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" class="form-control" name="email" placeholder="EnterEmail" required="">
                </div>
                <div class="form-group">
                  <label for="comment">Comment</label>
                  <textarea class="form-control" name="comment" placeholder="EnterComment" required=""></textarea>
                </div>
                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
          </form>
        </div>
      </div>
    

      <!-- comment show query -->

      <div id="section" class="box">
        <div id="content" class="border border-secondary">

          <?php
              if (isset($_GET['news_id'])) {
                 $getid = $_GET['news_id'];

                $querycmt = "SELECT * FROM comments WHERE  news_id = $getid AND is_active = 1";
              
                $resultcmt = mysqli_query($conn,$querycmt);
                       
                while ($responsecmt = mysqli_fetch_array($resultcmt)) {
                 ?>

                 <div class="media mb-4 pt-2 pl-5">
                   <img class="d-flex mr-3 rounded-circle" src="../images/ranjan.jpeg" width="50px" height="50px;">
                   <div class="media-body">
                     <h5 class="mt-0"><?php  echo $responsecmt['name']; ?><br></h5>
                     <h6>
                        <span>Commented_At  <?php echo $responsecmt['created_at']; ?></span>
                     </h6>
                     <h6><?php  echo $responsecmt['comment'];  ?></h6>
                   </div>
                 </div>

                  <?php
                    }
                    }
                  ?>  
        </div>
      </div>




</div>

<!-- footer -->
<div id="footer">
  <div class="main box">
    <p class="f-right t-right">Design by <a href="http://www.templatesdock.com/">TemplatesDock</a></p>
    <p class="f-left">Copyright &copy;&nbsp;2010 <a href="#">SimpleMagazine</a></p>
  </div>
</div>
<script type="text/javascript">Cufon.now();</script>
<!-- END PAGE SOURCE -->
</body>
</html>
