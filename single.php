<?php
// require "admin/core/dbConfig.php";
 require "./lib/dbCon.php";
 if( isset($_GET['idTin'])){
    $idTin = $_GET['idTin'];
}
else {$idTin = 1;}
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
           <div class="header_bottom_right"><a href="#"><span class="align-middle" ><img src="./images/upload/quangcao/<?php echo $banner?> " alt=""></span></a></div>
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
    <div class="content_bottom">
      <div class="col-lg-8 col-md-8">
        <!-- post.php ------------------------------------------------------------------------------------->
        <?php require "./blocks2/post.php"; ?>
        <!-- post.php ------------------------------------------------------------------------------------->
        <div class="post_pagination">
          <div class="prev"> <a class="angle_left" href="#"><i class="fa fa-angle-double-left"></i></a>
            <div class="pagincontent"> <span>Bài Sau</span> <a href="#">Aliquam quam orci in molestie a tempor nec</a> </div>
          </div>
          <div class="next">
            <div class="pagincontent"> <span>Bài Kế</span> <a href="#">Aliquam quam orci in molestie a tempor nec</a> </div>
            <a class="angle_right" href="#"><i class="fa fa-angle-double-right"></i></a> </div>
        </div>
        <div class="share_post"> <a class="facebook" href="#"><i class="fa fa-facebook"></i>Facebook</a> <a class="twitter" href="#"><i class="fa fa-twitter"></i>Twitter</a> <a class="googleplus" href="#"><i class="fa fa-google-plus"></i>Google+</a> <a class="linkedin" href="#"><i class="fa fa-linkedin"></i>LinkedIn</a> <a class="stumbleupon" href="#"><i class="fa fa-stumbleupon"></i>StumbleUpon</a> <a class="pinterest" href="#"><i class="fa fa-pinterest"></i>Pinterest</a> </div>
        <!-- co the ban quan tam --------------------------------------------------------------------------------------------------->
        <?php require "./blocks2/co-the-ban-quan-tam.php"; ?>
        <!-- co the ban quan tam --------------------------------------------------------------------------------------------------->
      </div>
      <div class="col-lg-4 col-md-4">
      <div class="content_bottom_right">
            <!----------------- Single_bottom_rightbar ---->
            <?php  require "./blocks/single_bottom_rightbar.php"; ?>
            <!----------------- Single_bottom_rightbar ---->
          
            <!-- Xem-nhieu-nhat ------------------------------------------------------------------------------------------------->
            <?php require_once "./blocks/xem-nhieu-nhat.php"; ?>
            <!-- Xem-nhieu-nhat ------------------------------------------------------------------------------------------------->
           
          </div>
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
              <li><a href="#"><img width="100%" src="/images/logo.png" alt=""></a></li>
              
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
<script src="../assets/js/jquery.min.js"></script> 
<script src="../assets/js/bootstrap.min.js"></script> 
<script src="../assets/js/wow.min.js"></script> 
<script src="../assets/js/slick.min.js"></script> 
<script src="../assets/js/custom.js"></script>
</body>
</html>