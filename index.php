<?php
include ("include/database.class.php");
include("include/session.class.php");
include_once ("include/gfunctions.php");
//$filtered_directories = $gf->filterList($gf->get_filtered_directories(),0,10);
$filtered_directories = $gf->get_filtered_directories();
$more_directories = $gf->get_more_directories();
$listings = $gf->getListings();
$directories = $gf->getDirectories();

//var_dump($directories);

?>

<?php
global $con;
	$search_string = "";
	if (isset($_POST['search'])){
		  $search_string = trim($_POST['search']);
		if($search_string != ""){
	        //var_dump($search_string);  
	    } else {
           $gf->setMessage("Enter your search concern in the search field");
	    }
	}
?>


<!DOCTYPE html>
<html>


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">


<link rel="apple-touch-icon" sizes="57x57" href="assets/img/favicon/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="assets/img/favicon/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="assets/img/favicon/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="assets/img/favicon/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="assets/img/favicon/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="assets/img/favicon/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="assets/img/favicon/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="assets/img/favicon/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="assets/img/favicon/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="assets/img/favicon/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicon/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicon/favicon-16x16.png">
<link rel="manifest" href="assets/img/favicon/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="assets/img/favicon/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">



<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&amp;subset=latin,latin-ext" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">    
<link href="assets/fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href="assets/fonts/font-awesome/fonts/font-awesome.min.css" rel="stylesheet" type="text/css">

<link href="assets/libraries/owl-carousel/owl.carousel.css" rel="stylesheet" type="text/css">
<link href="assets/css/leaflet.css" rel="stylesheet" type="text/css">
<link href="assets/css/leaflet.markercluster.css" rel="stylesheet" type="text/css">
<link href="assets/css/leaflet.markercluster.default.css" rel="stylesheet" type="text/css">
<link href="assets/css/materialist.css" rel="stylesheet" type="text/css" id="css-primary">
    
    
    <title>TN Connect Business listing</title>
</head>

<body class="">
<div class="page-wrapper">
	
	<?php include("include/header.php"); ?>
    <div class="main-wrapper">
	    <div class="main">
	        <div class="main-inner">
	        	

	            <div class="content">
<!--                <div class="hero" style="background-image: url('assets/img/tmp/s1.jpg'); ">
--><div class="hero">
                    <!------------------------------------>
                    <div class="hero-carousel">

			<div class="hero-carousel-item">
				<div class="hero-image" style="background-image: url('assets/img/tmp/s1.jpg')"></div><!-- /.hero-image -->
				     <div class="hero-content">
					       <div class="container">
								<h1>Make Your Business known.</h1>
<p>
				There are still many potential clients who are yet to know about what you can offer, enlist your business in our online directory and spread your tentacles to reach your customers.
			</p>

			<a href="listings.php" class="btn btn-primary">View Lisitngs</a>
					      </div><!-- /.container -->
		            </div> <!-- /.hero-content -->               			
			</div><!-- /.hero-carousel-item -->
			
            
            <div class="hero-carousel-item">
				<div class="hero-image" style="background-image: url('assets/img/tmp/gallery/1.jpg')"></div><!-- /.hero-image -->
				     <div class="hero-content">
					       <div class="container">
								<h1>Enlist Your Business Now.</h1>
<p>Let the world know what you offer, hurry now, enlist your business and experience a boost in your business. 
			</p>

			<a href="listings.php" class="btn btn-primary">View Lisitngs</a>
					      </div><!-- /.container -->
		            </div> <!-- /.hero-content -->               			
			</div><!-- /.hero-carousel-item -->
			
            
            <div class="hero-carousel-item">
				<div class="hero-image" style="background-image: url('assets/img/tmp/gallery/2.jpg')"></div><!-- /.hero-image -->
				     <div class="hero-content">
					       <div class="container">
								<h1>Enlarge Your Tentacles.</h1>
<p>Let the world know what you offer, hurry now,  enlist your business and experience a boost in your business. 
			</p>

			<a href="listings.php" class="btn btn-primary">View Lisitngs</a>
					      </div><!-- /.container -->
		            </div> <!-- /.hero-content -->               			
			</div><!-- /.hero-carousel-item -->
			
	              </div><!-- /.hero-carousel -->
                    
           

	<div class="hero-form ">
	<div class="container">
		<form method="post" action="listings.php">
			<div class="input-group first col-sm-12 col-md-4">
				<div class="input-group-addon">
					<i class="md-icon">my_location</i>
				</div><!-- /.input-group-addon -->

				<input type="text" class="form-control" placeholder="Type your location">
			</div><!-- /.input-group  -->

			<div class="input-group col-sm-12 col-md-6">
				<div class="input-group-addon">
					<i class="md-icon">search</i>
				</div><!-- /.input-group-addon -->
          <input type="text" class="form-control" id="slocation" name="search" value="<?php echo htmlspecialchars($search_string); ?>" placeholder="Search listings...">
				
			</div><!-- /.input-group  -->				

			<div class="form-group last col-sm-12 col-md-2">
			<input type="submit" name="submit" value="search" class="btn btn-primary btn-block">
			</div><!-- /.col-* -->
		</form> 

		
	</div><!-- /.container -->
</div><!-- /.hero-form -->	

	<div class="hero-layer"></div>
</div><!-- /.hero -->
<div class="container">
	<div class="page-title">
		<h2>TN ONLINE BUSINESS DIRECTORY</h2>

		<p>
			Taking your business to the next level of awareness.
		</p>
	</div><!-- /.page-title -->

	<div class="row">
		<div class="col-sm-12 col-xl-10">
			<div class="cards-wrapper">
				<div class="row">
					 
					 <?php 
             include("include/listings.php");
             ?>
        
				</div><!-- /.row -->
			</div><!-- /.card-wrapper -->
		</div><!-- /.col-* -->

		<div class="col-sm-2 hidden-lg-down">
			<div class="your-space">
				<p>
					Do you want to be here?
				</p>

				<a href="#" class="btn btn-primary btn-block"><tel>08129415090</tel></a>

<!-- 				<a href="#" class="btn btn-secondary btn-block">Contact</a>
 -->			</div><!-- /.your-space -->
		</div><!-- /.col-* -->		
	</div><!-- /.row -->
</div><!-- /.container -->



<div class="container">
	<div class="page-title">
		<h2>Directory Categories</h2>
	
	</div><!-- /.page-title -->
     
	<div class="cards-wrapper">
		<div class="row">

            <?php 
             include("include/directories.php");
             ?>

		</div><!-- /.row -->
	</div><!-- /.cards-wrapper -->
</div><!-- /.container -->

<div class="counter">
	<div class="container">
		<div class="row">
			<div class="col-sm-12 col-md-3">
<!-- 				<h2>Directory Statistics</h2>
 -->			</div>
            <!-- <div class="triangle-right">
							
						</div>--><!-- /.col-* -->

			<div class="col-sm-12 col-md-9">
				<div class="row">
					<div class="col-sm-3">
						<i class="md-icon">layers</i> 
						<h3><?php echo $gf->countDirectory(); ?></h3>
						<p>Diretories Added</p>
					</div><!-- /.col-* -->

					<div class="col-sm-3">
						<i class="md-icon">location_city</i> 
						<h3><?php echo $gf->countListings(); ?></h3>
						<p>Listings Added</p>
					</div><!-- /.col-* -->					

					<div class="col-sm-3">
						<i class="md-icon">people</i> 
						<h3><?php echo $gf->countUsers(); ?></h3>
						<p>Registered Users</p>
					</div><!-- /.col-* -->		

				</div><!-- /.row -->
			</div><!-- /.col-* -->
		</div><!-- /.row -->
	</div><!-- /.container -->
</div><!-- /.container -->




<div class="cta">
	<div class="container">
		<h2>Join our listing community</h2>

		<p> 
			Take a bold step, leverage on this great opportunity and boost your business.
		</p>

		<a href="listings.php" class="btn btn-primary">More Information</a>
	</div><!-- /.container -->
</div><!-- /.cta -->

	            </div><!-- /.content -->
	        </div><!-- /.main-inner -->
	    </div><!-- /.main -->
    </div><!-- /.main-wrapper -->

  

	
<?php include("include/footer.php"); ?>


<script type="text/javascript" src="assets/js/jquery.js"></script>

<script type="text/javascript" src="assets/js/tether.min.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="assets/js/leaflet.js"></script>
<script type="text/javascript" src="assets/js/leaflet.markercluster.js"></script>
<script type="text/javascript" src="assets/libraries/owl-carousel/owl.carousel.min.js"></script>
<script type="text/javascript" src="assets/js/materialist.js"></script>


</body>

</html>