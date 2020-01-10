<div class="col-lg-6 col-md-6 col-sm6">
          <div class="content_top_right">
            <ul class="featured_nav wow fadeInDown">
            <?php while($rows = mysqli_fetch_array($rs_headpic_phai)){  ?>
              <li><img src="./images/upload/tintuc/<?php echo($rows['urlHinh']);?>" alt="">
                <div class="title_caption"><a href="single.php?idTin=<?php echo($rows['idTin']);?>"><?php echo($rows['TieuDe']); ?></a></div>
              </li>
              <?php } ?>
            </ul>
            
          </div>
        </div>
        