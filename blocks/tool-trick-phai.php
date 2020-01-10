<div class="business_category_right">
                <ul class="small_catg wow fadeInDown">
                <?php while($rows = mysqli_fetch_array($rs_tooltrick2))
                  { ?>
                  <li>
                    <div class="media wow fadeInDown"> <a class="media-left" href="single.php?idTin=<?php echo($rows['idTin']);?>"><img src="./images/upload/tintuc/<?php echo($rows[4]); ?>" alt="hinhanh"></a>
                      <div class="media-body">
                        <h4 class="media-heading"><a href="single.php?idTin=<?php echo($rows['idTin']);?>"><?php echo($rows[1]); ?></a></h4>
                        <div class="comments_box"> <span class="meta_date">14/12/2045</span> <span class="meta_comment"><a href="single.php?idTin=<?php echo($rows['idTin']);?>">No Comments</a></span> </div>
                      </div>
                    </div>
                  </li>
<?php }?>
                </ul>
              </div>