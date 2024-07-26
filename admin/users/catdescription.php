<?php
session_start();
include('../includes/config.php');


if (isset($_GET['catid'])) {
    $catid = $_GET['catid'];

    $queryCatDetails = "SELECT 
            tc.id,
            po.id,
            po.postTitle,
            po.postdetails,
            tc.CategoryName,
            tc.Description,
            tsc.subcat_name,
            tsc.subcat_des,
            po.created_At,
            po.images
          FROM
          postdetails AS po 
          LEFT JOIN tblcategory AS tc
          ON
          tc.id = po.postCategory
          LEFT JOIN tblsubcategory AS tsc
          ON
          tsc.id = po.postSubcategory WHERE  po.is_active=0 AND tc.id = $catid
          GROUP BY
          po.id
          ORDER BY 
          po.created_At
          DESC
          ";

          $resultCatDetails = mysqli_query($conn,$queryCatDetails);
}

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
    <h1 id="logo">GUJARAT NEWS</h1>
    <ul id="nav">
      <li class="current"><a href="index.html">Homepage</a></li>
      <li><a href="subpage.html">Categories</a></li>
      <li><a href="#">Discussion</a></li>
      <li><a href="#">Authors</a></li>
      <li><a href="#">Blogs</a></li>
      <li><a href="#">Contact</a></li>
    </ul>
  </div>
  <div id="section" class="box">
    <div id="content">
      
        <?php

          while ($responseGet = mysqli_fetch_assoc($resultCatDetails)) {
            ?>
          <ul class="articles box">
              <li>
              <h2 ><a href="#"><?php echo $responseGet['CategoryName'];  ?></a></h2>
              <br>
              <div class="article-info box">
                <p class="f-right"><a href="#" class="comment">Comments (15)</a></p>
                <p><b>Category</b> <?php echo $responseGet['CategoryName']; ?>  |  <b> SubCategoryName </b> <?php echo $responseGet['subcat_name']; ?> <b> Posted On </b> <?php echo $responseGet['created_At']; ?></p>
                
               <!--  <p class="f-left">Posted On <?php echo $responseGet['created_At'];  ?></p> -->
              </div>
              <p><b><?php echo $responseGet['postTitle']; ?></b></p>
              <p>
               <!--  <img src="tmp/article-03.jpg" alt="" class="f-left" /> -->
                <img class="f-left" src="../images/<?php  echo $responseGet['images']; ?>" width="200" height="200">
              <?php echo  $responseGet['postdetails']; ?>
              </p>
              <!-- <p class="more"><a href="news-details.php">Read more &raquo;</a></p> -->
              <p class="more"><a href="news-details.php?news_id=<?php echo $responseGet['id']; ?>">Read more &raquo;</a></p>
            </li>
        </ul>
<br>
<br>
        <?php
          
          }

        ?>
        
     <br>
     <br>
     <!--  <div class="pagination box">
        <p class="f-right"> <a href="#" class="current">1</a> <a href="#">2</a> <a href="#">3</a> <a href="#">4</a> <a href="#">5</a> <a href="#">6</a> <a href="#">7</a> <a href="#">Next &raquo;</a> </p>
        <p class="f-left">Page 1 of 13</p>
      </div> -->


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
  </div>
</div>
<div id="footer">
  <div class="main box">
    <p class="f-right t-right">Design by <a href="http://www.templatesdock.com/">Ranjan</a></p>
    <p class="f-left">Copyright &copy;&nbsp;2010</p>
  </div>
</div>
<script type="text/javascript">Cufon.now();</script>
<!-- END PAGE SOURCE -->
</body>
</html>
