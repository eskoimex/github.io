<?php
include ("include/database.class.php");
include("include/session.class.php");
include_once ("include/gfunctions.php");
$filtered_directories = $gf->get_filtered_directories();
$more_directories = $gf->get_more_directories();

?>
<?php

//$gf->paginationControl();
if (empty($_GET["pg"])) {
		$current_page = 1;
	} else {
		$current_page = $_GET["pg"];
	}
	$current_page = intval($current_page);

	$total_listings = $gf->countListings();

	if(isset($_GET['search'])){
	  $total_listings = $gf->countListingSearch();
	} 

	$listings_per_page = 3;
	$total_pages = ceil($total_listings / $listings_per_page);

	if ($current_page > $total_pages) {
		header("Location: ./?pg=" . $total_pages);
	}

	if ($current_page < 1) {
		header("Location: ./");
	}

	$start = (($current_page - 1) * $listings_per_page) + 1;
	$end = $current_page * $listings_per_page;
	if ($end > $total_listings) {
		$end = $total_listings;
	}
	/////////////////////////////////////////////////////////
	/////////////////////////////////////////////////////////
	/////////////////////////////////////////////////////////


	////////////////////////////////////////////////////////
	///////////////////////////////////////////////////////
	//////////////////////////////////////////////////////

	$search_listings = $gf->getSearchListings($start,$end);
	$listings = $gf->get_listings_subset($start,$end);

	$recent_listings = $gf->get_listings_recent();

    //var_dump($gf->getSearchHtml());
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

<?php
global $con;
	$search_string = "";
	if (isset($_GET['search'])){
		  $search_string = trim($_GET['search']);
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

    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&amp;subset=latin,latin-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">    
    <link href="assets/fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="assets/libraries/owl-carousel/owl.carousel.css" rel="stylesheet" type="text/css">
    <link href="assets/css/leaflet.css" rel="stylesheet" type="text/css">
    <link href="assets/css/leaflet.markercluster.css" rel="stylesheet" type="text/css">
    <link href="assets/css/leaflet.markercluster.default.css" rel="stylesheet" type="text/css">        
    <link href="assets/css/materialist.css" rel="stylesheet" type="text/css" id="css-primary">
	
    <title>TNCONNECT- Listings</title>
</head>

<body class="">
<div class="page-wrapper">
		<?php include("include/header.php"); ?>	
    <div class="main-wrapper">
	    <div class="main">
	        <div class="main-inner">
	        		        
					<div class="content-title">
	<div class="container">
		<h1>Listings</h1>

		<ul class="breadcrumb">
			<li><a href="index.html">TNCONNECT</a> <i class="md-icon">keyboard_arrow_right</i></li>

			
				<li class="active">Listings</li>
			
		</ul><!-- /.breadcrumb -->
	</div><!-- /.container -->
</div><!-- /.content-title -->
				

				<div class="container">
					<div class="row">
						<div class="col-md-8 col-lg-9">
				            <div class="content">
				                <div class="push-top-bottom">
				<form method="get" action="listings.php" >

	<div class="filter filter-white">
		<div class="row">
	<!-- <div class="col-md-3">
		<div class="form-group">
			<select class="form-control">
				<option>Select Category</option>
				<option></option>
			</select>
		</div>
	</div> -->

	<div class="col-md-9">
		<div class="form-group">
			<input 
			type="text" 
			class="form-control" 
			id="slocation" 
			name="search" 
			value="<?php 
			if(isset($_POST['search'])){
				echo htmlspecialchars($_POST['search']);
			}else{
			  echo htmlspecialchars($search_string);
			}
			?>" 
			placeholder="Search listings...">
		</div><!-- /.form-group -->
	</div><!-- /.col-* -->


	<div class="col-md-2">
		<div class="form-group-btn form-group-btn-placeholder-gap">
			<input type="submit" name="submit" value="filter" class="btn btn-primary btn-block">
		</div><!-- /.form-group -->		
	</div><!-- /.col-* -->			
</div><!-- /.row --> 
	</div><!-- /.filter -->
</form>
<?php include("include/partial-list-navigation.html.php");  ?>

	<div class="row">
		<?php $gf->displayMessage();?>
		
        <?php 
        if (!(isset($_POST['search']) || isset($_GET['search']))){
        	include("include/partial-listings-list-view.html.php"); 
        } else{
        	include("include/get_search_listings.php");
        	 $gf->postSearchListings($start,$end);

        }
     ?>
	</div><!-- /.row -->
<?php include("include/partial-list-navigation.html.php");  ?>


</div><!-- /.push-top-bottom -->
  </div><!-- /.content -->
</div><!-- /.col-* -->

<div class="col-md-4 col-lg-3">
    <div class="sidebar">
    	<div class="widget">
          <h2 class="widgettitle">Recent Listings</h2>
				         <?php
			
				include("include/recent_listings.php");
			
		?> 
	         </div><!-- /.widget -->
	   </div><!-- /.sidebar -->
</div><!-- /.col-* -->
		            

		            </div><!-- /.row -->
	            </div><!-- /.container -->
	        </div><!-- /.main-inner -->
	    </div><!-- /.main -->
    </div><!-- /.main-wrapper -->

    <div class="footer-wrapper">
	<div class="footer">
		

		<?php include("include/footer.php"); ?>
	</div><!-- /.footer -->
</div><!-- /.footer-wrapper -->
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