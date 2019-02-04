<!doctype html>
<html>
<head>
  <title>Departure Separation</title>
  <link href="stylesheets/dep-styles.css" type="text/css" rel="stylesheet">
  <link href="stylesheets/styles.css" type="text/css" rel="stylesheet">
</head>
<body>
  <h1>Departure Separation</h1>
  <div class="main">
    <br>
    <div class="test-div">
      <h2>Outbound Wake Separation Calculator</h2>
      <br>
      <div class="dep-table">
            <p><b>What is the category of aircraft departing first?</b></p>
              <form id="dep" action="dep.php" method="get">
                <select name="first-ac">
                  <option></option>
                  <option value="Light">Light</option>
                  <option value="Small">Small</option>
                  <option value="Medium">Upper or Lower Medium</option>
                  <option value="Heavy">Heavy</option>
                  <option value="A380">A380</option>
                </select>
                <p><b>What is the category of the following aircraft?</b></p>
                <select name="follow-ac">
                  <option></option>
                  <option value="Light">Light</option>
                  <option value="Small">Small</option>
                  <option value="Medium">Upper or Lower Medium</option>
                  <option value="Heavy">Heavy</option>
                  <option value="A380">A380</option>
                </select>
                <p><b>Is it departing from the same point or an intermediate point?</b></p>
                <select name="point">
                  <option></option>
                  <option value="same">Same point</option>
                  <option value="an intermediate">Intermediate</option>
                </select>
                <br><br><br>
                <input type="submit" value="Calculate">
              </form>
        </div>
        <div class="output">
          <?php error_reporting(0); $FirstAC = $_GET["first-ac"];?>
          <?php error_reporting(0); $FollowAC = $_GET["follow-ac"];?>
          <?php error_reporting(0); $depPoint = $_GET["point"] ?>
          <?php
          //Same point A380 leading
          if ($FirstAC=="A380" and $FollowAC=="Heavy" and $depPoint=="same"){
            $sep="2 Minutes";}
          elseif ($FirstAC=="A380" and $FollowAC=="Medium" and $depPoint=="same"){
            $sep="3 Minutes";}
          elseif ($FirstAC=="A380" and $FollowAC=="Small" and $depPoint=="same"){
            $sep="3 Minutes";}
          elseif ($FirstAC=="A380" and $FollowAC=="Light" and $depPoint=="same"){
            $sep="3 Minutes";}
          //Same point Heavy leading
          elseif ($FirstAC=="Heavy" and $FollowAC=="Heavy" and $depPoint=="same"){
            $sep="4 nm or time equivalent";}
          elseif ($FirstAC=="Heavy" and $FollowAC=="Medium" and $depPoint=="same"){
            $sep="2 Minutes";}
          elseif ($FirstAC=="Heavy" and $FollowAC=="Small" and $depPoint=="same"){
            $sep="2 Minutes";}
          elseif ($FirstAC=="Heavy" and $FollowAC=="Light" and $depPoint=="same"){
            $sep="2 Minutes";}
          //Same point Medium leading
          elseif ($FirstAC=="Medium" and $FollowAC=="Light" and $depPoint=="same"){
            $sep="2 Minutes";}
          //Same point Small leading
          elseif ($FirstAC=="Small" and $FollowAC=="Small" and $depPoint=="same"){
            $sep="2 Minutes";}
          //<--------------------------Intersection departure----------------------->
          if ($FirstAC=="A380" and $FollowAC=="Heavy" and $depPoint=="an intermediate"){
            $sep="3 Minutes";}
          elseif ($FirstAC=="A380" and $FollowAC=="Medium" and $depPoint=="an intermediate"){
            $sep="4 Minutes";}
          elseif ($FirstAC=="A380" and $FollowAC=="Small" and $depPoint=="an intermediate"){
            $sep="4 Minutes";}
          elseif ($FirstAC=="A380" and $FollowAC=="Light" and $depPoint=="an intermediate"){
            $sep="4 Minutes";}
          //Intermediate point Heavy leading
          elseif ($FirstAC=="Heavy" and $FollowAC=="Heavy" and $depPoint=="an intermediate"){
            $sep="4 nm or time equivalent";}
          elseif ($FirstAC=="Heavy" and $FollowAC=="Medium" and $depPoint=="an intermediate"){
            $sep="3 Minutes";}
          elseif ($FirstAC=="Heavy" and $FollowAC=="Small" and $depPoint=="an intermediate"){
            $sep="3 Minutes";}
          elseif ($FirstAC=="Heavy" and $FollowAC=="Light" and $depPoint=="an intermediate"){
            $sep="3 Minutes";}
          //Intermediate point Medium leading
          elseif ($FirstAC=="Medium" and $FollowAC=="Light" and $depPoint=="an intermediate"){
            $sep="3 Minutes";}
          //Intermediate point Small leading
          elseif ($FirstAC=="Small" and $FollowAC=="Small" and $depPoint=="an intermediate"){
            $sep="3 Minutes";}
            else{
              $sep="0";
            }
            ?>
          <p><?php if ($sep=="0"){
            echo "No wake turbulence seperation is reqired, apply route seperation only";}
            else{
              echo "For a <b>".$FollowAC."</b> aircraft departing after a <b>".$FirstAC."</b> aircraft, <b>".$sep."</b> of wake turbulence separation are required.";
            }
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
