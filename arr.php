<!doctype html>
<html>
<head>
  <title>Arrival Separation</title>
  <link href="stylesheets/arr-styles.css" type="text/css" rel="stylesheet">
  <link href="stylesheets/styles.css" type="text/css" rel="stylesheet">
</head>
<body>
  <h1>Arrival Separation</h1>
  <div class="main">
    <br>
    <div class="test-div">
      <h2>Inbound Wake Separation Calculator</h2>
      <br>
      <div class="arr-table">
            <p><b>What is the category of the first aircraft?</b></p>
              <form id="arr-first" action="arr.php" method="get">
                <select name="wake-cat-1">
                  <option>---------</option>
                  <option value="Light">Light</option>
                  <option value="Small">Small</option>
                  <option value="Lower Medium">Lower Medium</option>
                  <option value="Upper Medium">Upper Medium</option>
                  <option value="Heavy">Heavy</option>
                  <option value="A380">A380</option>
                </select>
                <p><b>Followed by</b></p>
                <select name="wake-cat-2">
                  <option>---------</option>
                  <option value="Light">Light</option>
                  <option value="Small">Small</option>
                  <option value="Lower Medium">Lower Medium</option>
                  <option value="Upper Medium">Upper Medium</option>
                  <option value="Heavy">Heavy</option>
                  <option value="A380">A380</option>
                </select>
                <br><br>
                <input type="submit" value="Calculate">
              </form>
      </div>
      <div class="output">
        <?php error_reporting(0); $FollowAC = $_GET["wake-cat-2"];?>
        <?php error_reporting(0); $FirstAC = $_GET["wake-cat-1"];?>
        <?php
        if ($FirstAC=="A380" and $FollowAC=="Heavy") {
          $sep="6";}
        elseif ($FirstAC=="A380" and $FollowAC=="Upper Medium") {
          $sep="7";}
        elseif ($FirstAC=="A380" and $FollowAC=="Lower Medium") {
          $sep="7";}
        elseif ($FirstAC=="A380" and $FollowAC=="Small") {
          $sep="7";}
        elseif ($FirstAC=="A380" and $FollowAC=="Light") {
          $sep="8";}
        elseif ($FirstAC=="Heavy" and $FollowAC=="Heavy") {
          $sep="4";}
        elseif ($FirstAC=="Heavy" and $FollowAC=="Upper Medium") {
          $sep="5";}
        elseif ($FirstAC=="Heavy" and $FollowAC=="Lower Medium") {
          $sep="5";}
        elseif ($FirstAC=="Heavy" and $FollowAC=="Small") {
          $sep="6";}
        elseif ($FirstAC=="Heavy" and $FollowAC=="Light") {
          $sep="7";}
        elseif ($FirstAC=="Upper Medium" and $FollowAC=="Upper Medium") {
          $sep="3";}
        elseif ($FirstAC=="Upper Medium" and $FollowAC=="Lower Medium") {
          $sep="4";}
        elseif ($FirstAC=="Upper Medium" and $FollowAC=="Small") {
          $sep="4";}
        elseif ($FirstAC=="Upper Medium" and $FollowAC=="Light") {
          $sep="6";}
        elseif ($FirstAC=="Lower Medium" and $FollowAC=="Small") {
          $sep="3";}
        elseif ($FirstAC=="Lower Medium" and $FollowAC=="Light") {
          $sep="5";}
        elseif ($FirstAC=="Small" and $FollowAC=="Small") {
          $sep="3";}
        elseif ($FirstAC=="Small" and $FollowAC=="Light") {
          $sep="4";}
        else {
          $sep="0";}
        ?>
        <p><?php
        if ($sep=="0"){
        echo "No wake turbulence separation is required";}
        else {
          echo 'For a <b>'.$FollowAC.'</b> aircraft following a <b>'.$FirstAC.'</b> aircraft, <b> <u>'.$sep.'</u></b> miles of wake turbulence separation are required.';}
        ?></p>
      </div>
    </div>
  </div>
  <div class="footer-main">
    <div class="footer-inner">
      <p><a href="index.php"><img src="images/home.png" height="50px"></a></p>
    </div>
    <div class="footer-middle">
      <p> © Josh Howker 2018</p>
    </div>
  </div>
</body>
</html>
