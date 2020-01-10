<?php 
   $con=mysqli_connect("localhost","root","","tintuc") or die(mysqli_connect_error($con)); 

   // $con = mysqli_connect("localhost", "root","","tintuc");
       $qr = "SELECT urlHinh FROM `quangcao` WHERE idQC = 1 ";
       $banner = mysqli_query($con,$qr);
       $banner = mysqli_fetch_row($banner);
   
?>
<div class="header_bottom_right"><a href="#"><span class="align-middle" ><img src="./images/upload/quangcao/<?php echo ($banner[0]);?>" alt=""></span></a></div>
