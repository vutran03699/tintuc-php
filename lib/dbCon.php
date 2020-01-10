<?php
// mysql_connect("localhost","root","");
// mysql_select_db("khoaphamtraining ");
// mysql_query("SET NAMES 'utf-8'"); 
// Create connection
$con=mysqli_connect("localhost","root","","tintuc") or die(mysqli_connect_error($con)); 
// if (!$con->set_charset("utf8")) {
//     printf("Error loading character set utf8: %s\n", $con->error);
// } else {
//     printf("Current character set: %s\n", $con->character_set_name());
    
// }
$con->set_charset("utf8");

// $con = mysqli_connect("localhost", "root","","tintuc");
    $qr = "SELECT MoTa FROM `binhchon` WHERE idBC = 1";
    $var = mysqli_query($con,$qr);
    $var = mysqli_fetch_row($var);
    $var = $var[0];
//  banner
    $qr_banner = "SELECT urlHinh FROM `quangcao` WHERE idQC = 25 ";
    $banner = mysqli_query($con,$qr_banner);
    $banner = mysqli_fetch_row($banner);
    $banner = $banner[0];
//single_bottom_rightbar
    $qr_single_bottom_rightbar = "SELECT * FROM tin order BY idTin DESC LIMIT 0,4";
    $result = mysqli_query($con,$qr_single_bottom_rightbar);
//xem-nhieu-nhat
    $qr_xem_nhieu_nhat = "SELECT * FROM tin order BY SoLanXem DESC LIMIT 0,4";
    $rs_so_lan_xem = mysqli_query($con,$qr_xem_nhieu_nhat);
//congnghe-trai
    $qr_congnghe = "SELECT * FROM `tin` where idTL =2 
    ORDER BY SoLanXem  DESC LIMIT 0,1";
    $rs_congnghe = mysqli_query($con,$qr_congnghe);
//congnghe-phai
    $qr_congnghe2 = "SELECT * FROM `tin` where idTL = 2  
    ORDER BY SoLanXem  DESC LIMIT 2,3";
    $rs_congnghe2 = mysqli_query($con,$qr_congnghe2);
//tool-tricks trai
    $qr_tooltrick = "SELECT * FROM `tin` WHERE idTL = 3 
    ORDER BY SoLanXem DESC LIMIT 0,1";
    $rs_tooltrick = mysqli_query($con,$qr_tooltrick);
//tool-tricks phai
    $qr_tooltrick2 = "SELECT * FROM `tin` WHERE idTL = 3 
    ORDER BY SoLanXem DESC LIMIT 2,3";
    $rs_tooltrick2 = mysqli_query($con,$qr_tooltrick2);
//slide-o-giua
    $qr_slide_mid = "SELECT * FROM `tin` WHERE TinNoiBat = 1 ORDER BY SoLanXem DESC LIMIT 0,3"; //Tieude,urlhinh,tomtat 1-4-3
    $rs_slide_mid = mysqli_query($con,$qr_slide_mid);
//lap-trinh
    $qr_laptrinh = "SELECT * FROM `tin` WHERE idLT = 5 GROUP BY SoLanXem DESC LIMIT 0,3"; //Tieude,urlhinh,tomtat
    $rs_laptrinh = mysqli_query($con,$qr_laptrinh);
//doi-song
    $qr_doisong = "SELECT * FROM `tin` WHERE idLT = 7 GROUP BY SoLanXem DESC LIMIT 0,3";//Tieude,urlhinh,tomtat
    $rs_doisong = mysqli_query($con,$qr_doisong);
//headpic-phai
    $qr_headpic_phai = "SELECT * FROM `tin` WHERE idLT = 10 GROUP BY SoLanXem DESC LIMIT 0,4";//Tieude,urlhinh
    $rs_headpic_phai = mysqli_query($con,$qr_headpic_phai);
//mav-bar
    $qr_navbar = "SELECT TenTL FROM `theloai`";
    $rs_navbar = mysqli_query($con,$qr_navbar);
//single_post

?>