<?php 
$qr_single_post = "SELECT * FROM tin WHERE idTin = $idTin";
$rs_single_post = mysqli_query($con,$qr_single_post);
$rows = mysqli_fetch_array($rs_single_post);    
?>
<div class="content_bottom_left">
          <div class="single_page_area">
            <ol class="breadcrumb">
            </ol>
            <h2 class="post_titile"><?php echo($rows['TieuDe']);?></h2>
            <div class="single_page_content">
              <div class="post_commentbox"> <a href="#"><i class="fa fa-user"></i>Người đăng</a> <span><i class="fa fa-calendar"></i>6:49 AM</span> <a href="#"><i class="fa fa-tags"></i>Công nghệ</a> </div>
              <img class="img-center" src="../images/550x330x3.jpg" alt="">
              <?php echo($rows['Content']); ?>
              <button class="btn">#Thể loại</button>
              <button class="btn">#Thể loại</button>
              <button class="btn">#Thể loại</button>
              <button class="btn">#Thể loại</button>
            </div>
          </div>
        </div>