<div class="business_category_left">
                <ul class="fashion_catgnav wow fadeInDown">
                  <?php while($rows = mysqli_fetch_array($rs_tooltrick))
                  { ?>
                  <li>
                    <div class="catgimg2_container"> <a href="single.php?idTin=<?php echo($rows['idTin']);?>"><img alt="hinhanh" src="./images/upload/tintuc/<?php echo($rows[4]);?>"></a> </div>
                    <h2 class="catg_titile"><a href="single.php?idTin=<?php echo($rows['idTin']);?>"><?php echo($rows[1]);?></a></h2>
                    <div class="comments_box"> <span class="meta_date">14/12/2045</span> <span class="meta_comment"><a href="#">No Comments</a></span> <span class="meta_more"><a  href="#">Read More...</a></span> </div>
                    <p><?php echo($rows[3]);?></p>
                  </li>
                  <?php } ?>
                </ul>
              </div>