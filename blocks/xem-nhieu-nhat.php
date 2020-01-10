<div class="single_bottom_rightbar">
<h2>Xem nhiều nhất</h2>
<ul class="small_catg popular_catg wow fadeInDown">
<?php 
  while ($rows = mysqli_fetch_array($rs_so_lan_xem))
  {
?>
              <li>
                <div class="media wow fadeInDown"> <a href="single.php?idTin=<?php echo($rows['idTin']);?>" class="media-left"><img alt="hinhanh" src= "./images/upload/tintuc/<?php echo($rows['urlHinh']);?>" /> </a>
                  <div class="media-body">
                    <h4 class="media-heading"><a href="single.php?idTin=<?php echo($rows['idTin']);?>"><?php echo($rows[1]); ?></a></h4>
                    <p><?php echo($rows[3]) ?></p>
                  </div>
                </div>
              </li>
  <?php } ?>
            </ul>
</div>
            