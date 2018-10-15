<?php
 
require_once('function.php');
connectdb();
session_start();

if (is_user()) {
	redirect("$baseurl/dashboard");
}
$ttl = mysql_fetch_array(mysql_query("SELECT sitename, txt1, txt2 FROM general_setting WHERE id='1'"));
?>


<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">

<title> <?php echo $ttl[0]; ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Bootstrap -->
<link href="indx/css/bootstrap.min.css" rel="stylesheet">
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Comfortaa:400,300,700' rel='stylesheet' type='text/css'>
<link href="indx/css/style.css" rel="stylesheet">




  <link rel="shortcut icon" href="images/fav.png" type="image/png">

<!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
</head>
<body>
<header class="main__header">
  <div class="container">
    <nav class="navbar navbar-default"> 
      
      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          <li class="active"><a href="index.php">Home</a></li>
          <li><a href="contact">contact us</a></li>
          <li></li>
          <li></li>
          <li></li>
          <li></li>
          <li></li>
          <li><a href="signin">Login</a></li>
          <li><a href="signup">Register</a></li>
        </ul>
      </div>
      <!-- /.navbar-collapse --> 
      
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
         <h1 class="navbar-brand"><img src="indx/lets-bid.png" alt="Lets Bid"></h1>

      </div>
    </nav>
  </div>
</header>
<section class="slider">
  <div id="myCarousel" class="carousel slide carousel-fade" data-ride="carousel"> 
    <!-- Indicators --> 

    <div class="carousel-inner">



<?php
$i = 0;
$ddaa = mysql_query("SELECT id, img, btxt, stxt FROM slider_home ORDER BY id");
while ($data = mysql_fetch_array($ddaa)){
if ($i==0) {
$cls = "active";
}else{
$cls = "";
}
?>



      <div class="item <?php echo $cls; ?>"> <img data-src="<?php echo "indx/images/slider//$data[1]"; ?>" alt="First slide" src="<?php echo "indx/images/slider//$data[1]"; ?>">
        <div class="container">
          <div class="carousel-caption">
            <h1><?php echo $data[2]; ?></h1>
            <p><?php echo $data[3]; ?></p>
            <p><a class="btn btn-success" href="signin" role="button">Login</a><a class="btn btn-info" href="signup" role="button">Register</a></p>
          </div>
        </div>
      </div>
<?php 
$i++;
}
?>


      
    </div>


    <a class="left carousel-control" href="#myCarousel" data-slide="prev"><span class="glyphicon carousel-control-left"></span></a> <a class="right carousel-control" href="#myCarousel" data-slide="next"><span class="glyphicon carousel-control-right"></span></a> </div>
</section>
<!--end of sldier section-->
<section class="main__middle__container green_bg">
  <div class="container">
    <div class="row">
      <h2 class="text-center"><?php echo $ttl[1]; ?></h2>
      <p class="text-center"><?php echo $ttl[2]; ?></p>
      
    </div>
  </div>
</section>
<section class="main__middle__container">
  <div class="container">



    <div class="row text-center three-blocks">

<?php 

for ($i=1; $i <4 ; $i++) { 
$old = mysql_fetch_array(mysql_query("SELECT h, sh, dt FROM home_txt WHERE id='".$i."'"));
?>
      <div class="col-md-4"> <img src="indx/icons/<?php echo "$i"; ?>.png" alt="image" class="img-rounded img-responsive">
        <h3><?php echo $old[0]; ?></h3>
        <p><?php echo $old[1]; ?></p>
        <img src="indx/images/<?php echo "$i"; ?>.jpg" alt="image" class="img-rounded img-responsive">
        <p><?php echo $old[2]; ?></p>
        <p><a class="btn btn-lg btn-silver" href="signin" role="button">Play Now</a></p>
      </div>
<?php 
}
?>


    </div>


  </div>
</section>


<footer>
  <div class="container">
    
    <p class="text-center">&copy; Copyright <?php echo $ttl[0]; ?>. All Rights Reserved.</p>
  </div>
</footer>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
<script type="text/javascript" src="indx/js/jquery.min.js"></script> 
<!-- Include all compiled plugins (below), or include individual files as needed --> 
<script src="indx/js/bootstrap.min.js"></script> 
<script type="text/javascript">

$('.carousel').carousel({
  interval: 3500, // in milliseconds
  pause: 'none' // set to 'true' to pause slider on mouse hover
})
</script>
</body>

</html>

