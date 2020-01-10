<div class="business_category_right wow fadeInDown">
              <ul class="small_catg">
              <?php while($rows = mysqli_fetch_array($rs_congnghe2)){
                ?>
                <li>
                  <div class="media wow fadeInDown"> <a class="media-left" href="single.php?idTin=<?php echo($rows['idTin']);?>"><img alt="hinhanh" src="./images/upload/tintuc/<?php echo($rows[4]);?>"></a>
                    <div class="media-body">
                      <h4 class="media-heading"><a href="single.php?idTin=<?php echo($rows['idTin']);?>"><?php echo($rows[1]);?></a></h4>
                      <div class="comments_box"> <span class="meta_date"><?php echo($rows[5]);?></span> <span class="meta_comment"><a href="single.php?idTin=<?php echo($rows['idTin']);?>">No Comments</a></span> </div>
                    </div>
                  </div>
                </li>
              <?php }?>
              </ul>
            </div>