<div class="similar_post">
          <h2>Có thể bạn quan tâm <i style="color: #A4D0D7;" class="fa fa-thumbs-o-up"></i></h2>
          <ul class="small_catg similar_nav wow fadeInDown animated">
          <?php while ($rows = mysqli_fetch_array($rs_slide_mid)){ ?>
            <li>
              <div class="media wow fadeInDown animated" style="visibility: visible; animation-name: fadeInDown;"> <a class="media-left related-img" href="single.php?idTin=<?php echo($rows['idTin']);?>"><img src="./images/upload/tintuc/<?php echo($rows[4]);?>" alt=""></a>
                <div class="media-body">
                  <h4 class="media-heading"><a href="single.php?idTin=<?php echo($rows['idTin']);?>"><?php echo($rows[1]);?></a></h4>
                  <p><?php echo($rows[3]);?></p>
                </div>
              </div>
            </li>
          <?php } ?>
          </ul>
        </div>