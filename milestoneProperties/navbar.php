<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php"><span class="glyphicon glyphicon-home"></span> Milestone Properties</a>
      
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
          <li class="divider-vertical" style="height: 35px;margin: 8px 9px;border-left: 1px solid darkgray;border-right: 1px solid darkgray;"></li>
          <li><a href="index.php" class="btn btn-lg" role="button"> Buy</a></li>
          <li class="divider-vertical" style="height: 35px;margin: 8px 9px;border-left: 1px solid darkgray;border-right: 1px solid darkgray;"></li>
        <li><a href="sell_home.php" class="btn btn-lg" role="button"> Sell</a></li>
      </ul>

      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"><span class="glyphicon glyphicon-user"></span> My Account <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="#">Log-in</a></li>
            <li class="divider"></li>
            <li><a href="#">Sign-up</a></li>
          </ul>
        </li>
      </ul>
      <form class="navbar-form navbar-right" role="search" action="listing.php" method="post">
        <div class="form-group">
          <input name="usersearch" type="text" class="form-control" placeholder="State, City, Zip Code...">
        </div>
          <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-map-marker"></span> Home Search</button>
      </form>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>