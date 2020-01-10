<?php
// require "admin/core/dbConfig.php";
 require "./lib/dbCon.php";
?>
<!DOCTYPE html>
<html>
<head>
<title>Tech-news&trade; IT news everyday</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="assets/css/animate.css">
<link rel="stylesheet" type="text/css" href="assets/css/slick.css">
<link rel="stylesheet" type="text/css" href="assets/css/theme.css">
<link rel="stylesheet" type="text/css" href="assets/css/style.css">
<!--[if lt IE 9]>
<script src="assets/js/html5shiv.min.js"></script>
<script src="assets/js/respond.min.js"></script>
<![endif]-->
</head>
<body>
<!-- <div id="preloader">
  <div id="status">&nbsp;</div>
</div> -->
<a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
<div class="container">
  <header id="header">
    <div class="row">
      <div class="col-lg-12 col-md-12">
        <div class="header_top">
          <div class="header_top_left">
            <ul class="top_nav">
              <li style="border-right: 2px solid gray ;"><a href="index.html">Đăng nhập</a>
            </li>
              <li><a href="pages/page.html">Đăng kí</a></li>
            </ul>
          </div>
          <div class="header_top_right">
            <form action="#" class="search_form">
              <input type="text" placeholder="Tìm kiếm ...">
              <input type="submit" value="">
            </form>
          </div>
        </div>
        <div class="header_bottom">
          <div class="header_bottom_left"><a class="logo" href="index.html">
            <img src="./images/logo.png" class="img-fluid" alt="logo">
          </div>
           <!-- Banner-header ------------------------------------------------------------------------------>
           <div class="header_bottom_right"><a href="#"><span class="align-middle" ><img src="./images/upload/quangcao/<?php echo($banner[0]);?> " alt=""></span></a></div>
          <!-- Banner-header ------------------------------------------------------------------------------>
        </div>
      </div>
    </div>
  </header>
  <div id="navarea">
    <!-- Navbar ------------------------------------------------------------------------------------------>
    <?php require "./blocks/navbar.php"; ?>
    <!-- Navbar ------------------------------------------------------------------------------------------>
  </div>
  <section id="mainContent">
    <div class="content_top">
      <div class="row">
        <div class="col-lg-6 col-md-6 col-sm6">
          <div class="latest_slider">
            <div class="slick_slider">
              <div class="single_iteam"><img src="images/550x330x1.jpg" alt="">
                <h2><a class="slider_tittle" href="pages/single.html">Fusce eu nulla semper porttitor felis sit amet</a></h2>
              </div>
              <div class="single_iteam"><img src="images/550x330x2.jpg" alt="">
                <h2><a class="slider_tittle" href="pages/single.html">Fusce eu nulla semper porttitor felis sit amet</a></h2>
              </div>
              <div class="single_iteam"><img src="images/550x330x3.jpg" alt="">
                <h2><a class="slider_tittle" href="pages/single.html">Fusce eu nulla semper porttitor felis sit amet</a></h2>
              </div>
              <div class="single_iteam"><img src="images/550x330x4.jpg" alt="">
                <h2><a class="slider_tittle" href="pages/single.html">Fusce eu nulla semper porttitor felis sit amet</a></h2>
              </div>
            </div>
          </div>
        </div>
        <!-- headpic-phai ---------------------------------------------------------------------------------->
        <?php require "./blocks/headpic-phai.php"; ?>
        <!-- headpic-phai ---------------------------------------------------------------------------------->
      </div>
    </div>
    <div class="content_middle">
      <div class="col-lg-3 col-md-3 col-sm-3">
        <div class="content_middle_leftbar">
          <div class="single_category wow fadeInDown">
            <h2> <span class="bold_line"><span></span></span> <span class="solid_line"></span> <a href="#" class="title_text">banner_left</a> </h2>
          <a href="#"><span class="align-middle" ><img src="./images/upload/quangcao/<?php echo $banner?> " alt=""></span></a>
          </div>
        </div>
      </div>
      <div class="col-lg-6 col-md-6 col-sm-6">
        <!-- slide-o-giua ----------------------------------------------------------------------------------->
        <!-- <?php require "./blocks/slide-o-giua.php"; ?> -->
        <!-- slide-o-giua ----------------------------------------------------------------------------------->
      </div>
      <div class="col-lg-3 col-md-3 col-sm-3">
        <div class="content_middle_rightbar">
          <div class="single_category wow fadeInDown">
            <h2> <span class="bold_line"><span></span></span> <span class="solid_line"></span> <a href="#" class="title_text">banner_right</a> </h2>
            <a href="#"><span class="align-middle pull-right" ><img src="./images/upload/quangcao/<?php echo $banner?> " alt=""></span></a>
          </div>
        </div>
      </div>
    </div>
    <div class="content_bottom">
      <div class="col-lg-8 col-md-8">
        <div class="content_bottom_left">
          <div class="single_category wow fadeInDown">
            <h2> <span class="bold_line"><span></span></span> <span class="solid_line"></span> <a class="title_text" href="#">Công nghệ</a> </h2>
            <!-- congnghe-trai ---------------------------------------------------------------------------------- -->
            <?php require "./blocks/congnghe-trai.php" ;?>
            <!-- congnghe-trai ---------------------------------------------------------------------------------- -->
            <!-- congnghe-phai ---------------------------------------------------------------------------------- -->
            <?php require "./blocks/congnghe-phai.php"; ?>
            <!-- congnghe-phai ---------------------------------------------------------------------------------- -->
          </div>
          <div class="games_fashion_area">
            <div class="games_category">
              <div class="single_category">
                <h2> <span class="bold_line"><span></span></span> <span class="solid_line"></span> <a class="title_text" href="#">Lập trình</a> </h2>
               <!-- lap-trinh ------------------------------------------------------------------------------------------->
               <?php require "./blocks/lap-trinh.php";?>
               <!-- lap-trinh ------------------------------------------------------------------------------------------->
              </div>
            </div>
            <div class="fashion_category">
              <div class="single_category">
                <div class="single_category wow fadeInDown">
                  <h2> <span class="bold_line"><span></span></span> <span class="solid_line"></span> <a class="title_text" href="#">Đời sống</a> </h2>
                  <!-- doi-song ----------------------------------------------------------------------------------------->
                  <?php require "./blocks/doi-song.php";?>
                  <!-- doi-song ----------------------------------------------------------------------------------------->
                </div>
              </div>
            </div>
          </div>
          <div class="technology_catrarea">
            <div class="single_category">
              <h2> <span class="bold_line"><span></span></span> <span class="solid_line"></span> <a class="title_text" href="#">Tools & Trick</a> </h2>
             <!-- tool-trick-trai ---------------------------------------------------------------------------------------------------------->
             <?php require "./blocks/tool-trick-trai.php"; ?>
              <!-- tool-trick-trai ---------------------------------------------------------------------------------------------------------->
              <!-- tool-trick-phai ---------------------------------------------------------------------------------------------------------->
              <?php require "./blocks/tool-trick-phai.php"; ?>
              <!-- tool-trick-phai ---------------------------------------------------------------------------------------------------------->
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-4">
        <div class="content_bottom_right">
          <!----------------- Single_bottom_rightbar ---->
          <?php  require "./blocks/single_bottom_rightbar.php"; ?>
          <!----------------- Single_bottom_rightbar ---->
      </div>
          
            <!-- Xem-nhieu-nhat ------------------------------------------------------------------------------------------------->
            <?php require_once "./blocks/xem-nhieu-nhat.php"; ?>
            <!-- Xem-nhieu-nhat ------------------------------------------------------------------------------------------------->
           
          <div class="single_bottom_rightbar">
            <h2>Thể loại</h2>
            <div class="blog_archive wow fadeInDown">
              <form action="#">
                <select>
                  <option value="">Công nghệ</option>
                  <option value="">Đời sống</option>
                  <option value="">Lập trình</option>
                  <option value="">Tools & Tricks</option>
                </select>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<footer id="footer">
  <div class="footer_top">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-4">
          <div class="single_footer_top wow fadeInLeft">
            <h2>Tech-news Team</h2>
            <ul class="flicker_nav">
              <li><a href="#"><img width="100%" src="./images/logo.png" alt=""></a></li>
              
            </ul>
          </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4">
          <div class="single_footer_top wow fadeInDown">
            <h2>Thể loại</h2>
            <ul class="labels_nav">
              <li><a href="#">Công nghệ</a></li>
              <li><a href="#">Lập trình</a></li>
              <li><a href="#">Đời sống</a></li>
              <li><a href="#">Tools & Tricks</a></li>
            </ul>
          </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4">
          <div class="single_footer_top wow fadeInRight">
            <h2>Liên hệ</h2>
            <p>Interdum et malesuada fames ac ante ipsum primis in faucibus. Sed nec laoreet orci, eget ullamcorper quam. Phasellus lorem neque, </p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="footer_bottom">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
          <div class="footer_bottom_left">
            <p>Copyright &copy; 2045 <a href="index.html">magExpress</a></p>
          </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
          <div class="footer_bottom_right">
            <p>Developed BY Wpfreeware</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>
<script src="assets/js/jquery.min.js"></script> 
<script src="assets/js/bootstrap.min.js"></script> 
<script src="assets/js/wow.min.js"></script> 
<script src="assets/js/slick.min.js"></script> 
<script src="assets/js/custom.js"></script>
</body>
</html>
