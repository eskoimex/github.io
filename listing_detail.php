<?php
include ("include/database.class.php");
include("include/session.class.php");
include_once ("include/gfunctions.php");
$filtered_directories = $gf->get_filtered_directories();
$more_directories = $gf->get_more_directories();
$listing_details = $gf->getListingDetails();
foreach($listing_details as $listing) {
//var_dump($listing['name']);
}
//var_dump($listing_details);
?>
<!DOCTYPE html>

<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">

    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&amp;subset=latin,latin-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">    
    <link href="assets/fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="assets/libraries/owl-carousel/owl.carousel.css" rel="stylesheet" type="text/css">
    <link href="assets/css/leaflet.css" rel="stylesheet" type="text/css">
    <link href="assets/css/leaflet.markercluster.css" rel="stylesheet" type="text/css">
    <link href="assets/css/leaflet.markercluster.default.css" rel="stylesheet" type="text/css">        
    <link href="assets/css/materialist.css" rel="stylesheet" type="text/css" id="css-primary">
	
    <title>TNCONNECT - Listing Detail</title>
</head>

<body class="">
<div class="page-wrapper">
		<?php include("include/header.php"); ?>

	
    <div class="main-wrapper">
	    <div class="main">
	        <div class="main-inner">
	        	

	            <div class="content">
	                <div class="content-title">
	<div class="container">
		<h1><?php echo $listing['name']; ?></h1>

		<ul class="breadcrumb">
			<li><a href="index.html">TNCONNECT</a> <i class="md-icon">keyboard_arrow_right</i></li>

			
				<li class="active"><?php echo $listing['name']; ?></li>
			
		</ul><!-- /.breadcrumb -->
	</div><!-- /.container -->
</div><!-- /.content-title -->


<div class="container">
	<div class="row">
		<div class="col-md-8 col-lg-9">
			<div class="push-top-bottom">
				<div class="listing-detail">
					<div class="gallery">
    <div class="gallery-item" style="background-image: url('assets/img/tmp/gallery/1.jpg');"> 
        <div class="gallery-item-description">
            </div><!-- /.gallery-item-description -->
    </div><!-- /.gallery-item -->            

    <div class="gallery-item" style="background-image: url('assets/img/tmp/gallery/2.jpg');">
        <div class="gallery-item-description">
        </div><!-- /.gallery-item-description -->
    </div><!-- /.gallery-item -->                

    <div class="gallery-item" style="background-image: url('assets/img/tmp/gallery/3.jpg');">
        <div class="gallery-item-description">
        </div><!-- /.gallery-item-description -->    
    </div><!-- /.gallery-item -->                 
</div><!-- /.gallery -->

			
<h2>Description</h2>

<p>
   <?php echo $listing['description']; ?>
</p>

					<h2>Social Connections</h2>

<ul class="social">
    <li class="facebook"><a href="<?php echo $listing['name']; ?>"><i class="fa fa-facebook"></i></a></li>
    <li class="twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
    <li class="instagram"><a href="#"><i class="fa fa-google-plus"></i></a></li>
   
</ul>				
 	
					

			 	</div><!-- /.listing-detail -->
			</div><!-- /.push-top-bottom -->
		</div><!-- /.col-sm-9 -->

		<div class="col-md-4 col-lg-3">
			<div class="sidebar">
				<div class="widget">
    <div class="overview">        
        <ul>
            <li><strong>State</strong><span><?php echo $listing['state']; ?></span></li>
            <li><strong>Location</strong><span><?php echo $listing['city']; ?></span></li>
            <li><strong>Category</strong><span><?php echo $listing['category']; ?></span></li>
            <li><strong>Hotline</strong><span><?php echo $listing['hotline']; ?></span></li>
            <li><strong>Phone</strong><span>+1-234-567-890</span></li>
            <li><strong>Website</strong><span><a href="#"><?php echo $listing['website']; ?></a></span></li>                    
        </ul>
    </div><!-- /.overview -->
</div><!-- /.widget -->
				
				<div class="widget">
	<h2 class="widgettitle">Contact Information</h2>

	<ul class="contact">
		<li><i class="md-icon">email</i> <a href="mailto:hi@example.com"><?php echo $listing['email']; ?></a></li>
		<li><i class="md-icon">link</i> <a href="#"><?php echo $listing['website']; ?></a></li>
		<li><i class="md-icon">phone</i> <?php echo $listing['phone_number1']; ?></li>
		<li><i class="md-icon">location_on</i> <?php echo $listing['address']; ?></li>
	</ul>
</div><!-- /.widget -->

			</div><!-- /.sidebar -->
		</div><!-- /.col-* -->
	</div><!-- /.row -->
</div><!-- /.container-->
	            </div><!-- /.content -->
	        </div><!-- /.main-inner -->
	    </div><!-- /.main -->
    </div><!-- /.main-wrapper -->

   <?php include("include/footer.php"); ?>

</div><!-- /.page-wrapper -->


<script type="text/javascript" src="assets/js/jquery.js"></script>
<script type="text/javascript" src="assets/js/tether.min.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="assets/js/leaflet.js"></script>
<script type="text/javascript" src="assets/js/leaflet.markercluster.js"></script>
<script type="text/javascript" src="assets/libraries/owl-carousel/owl.carousel.min.js"></script>
<script type="text/javascript" src="assets/js/materialist.js"></script>
</body>


</html>