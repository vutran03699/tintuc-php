<?php $rows = mysqli_fetch_row($rs_slide_mid); ?>
<div class="content_middle_middle">
          
          <div class="slick_slider2 slick-initialized slick-slider">
            <div class="slick-list draggable" tabindex="0"><div class="slick-track" style="opacity: 1; width: 1605px;"><div class="single_featured_slide slick-slide" index="0" style="width: 535px; position: relative; left: 0px; top: 0px; z-index: 800; opacity: 0;"> <a href="pages/single.html"><img src="./images/upload/tintuc/<?php echo($rows[1]);?>" alt=""></a>
              <h2><a href="pages/single.html">Praesent vitae quam vitae arcu posuer 1</a></h2>
              <p>Nunc tincidunt, elit non cursus euismod, lacus augue ornare metus, egestas imperdiet nulla nisl quis mauris. Suspendisse a pharetra urna. Morbi dui lectus, pharetra nec elementum eget, vulput...</p>
            </div><div class="single_featured_slide slick-slide" index="1" style="width: 535px; position: relative; left: -535px; top: 0px; z-index: 900; opacity: 0; transition: opacity 500ms linear 0s;"> <a href="pages/single.html"><img src="images/567x330x2.jpg" alt=""></a>
              <h2><a href="#">Praesent vitae quam vitae arcu posuer 2</a></h2>
              <p>Nunc tincidunt, elit non cursus euismod, lacus augue ornare metus, egestas imperdiet nulla nisl quis mauris. Suspendisse a pharetra urna. Morbi dui lectus, pharetra nec elementum eget, vulput...</p>
            </div><div class="single_featured_slide slick-slide slick-active" index="2" style="width: 535px; position: relative; left: -1070px; top: 0px; z-index: 1000; opacity: 1; transition: opacity 500ms linear 0s;"> <a href="pages/single.html"><img src="images/567x330x3.jpg" alt=""></a>
              <h2><a href="#">Praesent vitae quam vitae arcu posuer 3</a></h2>
              <p>Nunc tincidunt, elit non cursus euismod, lacus augue ornare metus, egestas imperdiet nulla nisl quis mauris. Suspendisse a pharetra urna. Morbi dui lectus, pharetra nec elementum eget, vulput...</p>
            </div></div></div>
            
            
          <button type="button" data-role="none" class="slick-prev" style="display: block;">Previous</button><button type="button" data-role="none" class="slick-next" style="display: block;">Next</button><ul class="slick-dots" style="display: block;"><li class=""><button type="button" data-role="none">1</button></li><li class=""><button type="button" data-role="none">2</button></li><li class="slick-active"><button type="button" data-role="none">3</button></li></ul></div>
        </div>