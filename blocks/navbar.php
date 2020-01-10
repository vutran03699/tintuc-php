<nav class="navbar navbar-default" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav custom_nav">
            <?php while($rows = mysqli_fetch_row($rs_navbar)){ ?>
            <li class=""><a href="index.html"><?php echo($rows[0]);?></a></li>
            <?php }?>
          </ul>
        </div>
      </div>
    </nav>