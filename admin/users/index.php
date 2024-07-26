<?php
session_start();
include('../includes/config.php');


 $query = "SELECT
            tblcategory.id AS catid,
            postdetails.id,
            postdetails.postTitle,
            postdetails.postDetails,
            postdetails.images,
            postdetails.created_At,
            postdetails.updated_At,
            tblcategory.CategoryName,
            tblsubcategory.subcat_name,
            COUNT(comments.id) AS totalcomments
            
          FROM
            postdetails 
          LEFT JOIN
            tblcategory ON postdetails.postCategory = tblcategory.id
          LEFT JOIN
            tblsubcategory ON postdetails.postSubcategory = tblsubcategory.id
          LEFT JOIN
            comments ON postdetails.id = comments.news_id
          WHERE
            postdetails.is_active = 0 
            GROUP BY postdetails.id
            ORDER BY postdetails.created_at DESC
          ";

          $result = mysqli_query($conn,$query);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>GUJARAT NEWS</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
<link rel="stylesheet" media="screen,projection" type="text/css" href="css/main.css" />
<link rel="stylesheet" media="screen,projection" type="text/css" href="css/skin.css" />
<script type="text/javascript" src="javascript/cufon-yui.js"></script>
<script type="text/javascript" src="javascript/font.font.js"></script>
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
    <h1 id="logo" >GUJARAT NEWS</h1>
    <ul id="nav">
     <!--  <li class="current"><a href="index.html">Homepage</a></li> -->
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
        while ($response = mysqli_fetch_assoc($result)) {
      ?>
        <ul class="articles box">
          <li>
            <h2 class="heartBeat"><a href="#"><?php echo $response['postTitle']; ?></a></h2>
            <div class="article-info box">
              <p class="f-right"><a href="#" class="comment">Comments (<?php echo $response['totalcomments']?>)</a></p>
              <p class="f-left"><?php echo date("F d, Y", strtotime($response['created_At'])); ?> | Posted by <a href="#">admin</a> | <b>Category</b> <a href="catdescription.php?catid=<?php echo $response['catid']; ?>"><?php echo $response['CategoryName']; ?></a></p>
            </div>
            <!-- <p><b><?php echo $response['CategoryName']; ?></b></p> -->
         <!--    <p>This is a free web template by TemplatesDock. This work is distributed under the Creative Commons Attribution 3.0 License, which means that you are free to adapt, copy, distribute and transmit the work. You must attribute the work in the manner specified by the author or licensor (don´t remove our backlink from footer).</p> -->
            <p><img class="f-left" src="../images/<?php  echo $response['images']; ?>" width="200" height="200">
              <?php
                echo $response['postDetails'];
              ?>
            </p>
            <p class="more"><a href="news-details.php?news_id=<?php echo $response['id']; ?>">Read more &raquo;</a></p>
          </li>
      </ul>
<br><br>
       <?php
        }

      ?>
      <!-- pagination -->
      <div class="pagination box">
        <p class="f-right"> <a href="#" class="current">1</a> <a href="#">2</a> <a href="#">3</a> <a href="#">4</a> <a href="#">5</a> <a href="#">6</a> <a href="#">7</a> <a href="#">Next &raquo;</a> </p>
        <p class="f-left">Page 1 of 13</p>
      </div>
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
    <p class="f-right t-right">Design by <a href="http://www.templatesdock.com/">TemplatesDock</a></p>
    <p class="f-left">Copyright &copy;&nbsp;2010 <a href="#">SimpleMagazine</a></p>
  </div>
</div>
<script type="text/javascript">Cufon.now();</script>
<!-- END PAGE SOURCE -->
</body>
</html>
