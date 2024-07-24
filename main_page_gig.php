<?php
  @ob_start();
if(session_status()!=PHP_SESSION_ACTIVE) session_start();
  
  
 
  include ("connection.php");
  include("page_content/header.php");
  if($user_id == NULL || $user_id =="")
{
   header("location:login.php"); 
}  
  
  $location = $_REQUEST['location'];
  $category = $_REQUEST['category'];
    //file_put_contents("text.txt", $location." ".$category);
 

    if($location === "all" and $category === "all")
  {
  $sql = "SELECT * from gig where user_id <> $user_id";
  }
  else if ($location =="all" and $category !="all"){
         $sql = "SELECT * from gig where gig_category = '$category'and user_id <> $user_id ";
  }
  else if($location!="all" and $category == 'all')
  {
  	   $sql = "SELECT * from gig where city = '$location' and user_id <> $user_id";
  }
  else 
  {
  	 $sql = "SELECT * from gig where city = '$location' and job_category = '$category' and user_id <> $user_id";
  }

 $res = mysqli_query($conn,$sql);
  $num_rows = mysqli_num_rows($res);




?>


<div class="clearfix"></div>
<!-- Header Container / End -->

<!-- Page Content
================================================== -->
<div class="full-page-container">

	<div class="full-page-sidebar">
		<div class="full-page-sidebar-inner" data-simplebar>
			<div class="sidebar-container">
				
			 

				<div class="sidebar-widget">
					<h3>Location</h3>
					<div class="input-with-icon">
						<div id="autocomplete-container">
							<input  name= "location" id="autocomplete-input" class="city" type="text" placeholder="Location">
						</div>
						<i class="icon-material-outline-location-on"></i>
					</div>
				</div>

				
				<!-- Keywords -->
				<!-- div class="sidebar-widget">
					<h3>Keywords</h3>
					<div class="keywords-container">
						<div class="keyword-input-container">
							<input type="text" class="keyword-input" placeholder="e.g. job title"/>
							<button class="keyword-input-button ripple-effect"><i class="icon-material-outline-add"></i></button>
						</div>
						<div class="keywords-list"></div>
						<div class="clearfix"></div>
					</div>
				</div>
				 -->
				<!-- Category -->
				<div class="sidebar-widget">
					<h3>Category</h3>
					<select id="category"  class="selectpicker default"  data-selected-text-format="count" data-size="7" title="All Categories" >
						<option>Textile</option>
							<option>Home Food</option>
							<option>Antique Jewelery</option>
							<option>Papercraft</option>
							<option>Custom Portrait</option>
							<option>Scrapbook</option>
							<option>Cross Stitch</option>
							<option>Embroiderer</option>
							<option>Scented Candle</option>
					</select>
				</div>
				
				<!-- Job Types -->
				

				<!-- Salary -->
			
				<!-- Tags -->
				

			</div>
			<!-- Sidebar Container / End -->

			<!-- Search Button -->
			<div class="sidebar-search-button-container">
				<button onclick="filter()" type = "submit" class="button ripple-effect">Search</button>
			</div>
			 
			<!-- Search Button / End-->
             
		</div>
	</div>
	<!-- Full Page Sidebar / End -->
	
	<!-- Full Page Content -->
	<div class="full-page-content-container" data-simplebar>
		<div class="full-page-content-inner">

			

			<div class="listings-container grid-layout margin-top-35">
				    
				    <?php if($num_rows == 0)
				      {
                       ?>
                  <h1> No Search matches</h1>
                       <?php 
      
				       }
				       

				       else{ 
                            while($row = mysqli_fetch_array($res))
                            {

                            	$user_id = $row['user_id'];
                            	$gig_id = $row['id'];

                            	$sql2 ="SELECT * from user where id = $user_id";
                            	$res2 = mysqli_query($conn,$sql2);
                            	$row2 = mysqli_fetch_array($res2);
                            	$name = $row2['name']

				     ?>
				<!-- Job Listing -->
				<a href="gig_details.php?gig_id=<?php echo $gig_id ?>" class="job-listing">

					<!-- Job Listing Details -->
					<div class="job-listing-details">
						<!-- Logo -->
						<div class="job-listing-company-logo">
							<img src="<?php echo $row['gig_file'] ?>" alt="">
						</div>

						<!-- Details -->
						<div class="job-listing-description">
							<h4 class="job-listing-company"><?php echo $name ?> <span  data-tippy-placement="top"></span></h4>
							<h3 class="job-listing-title"><?php echo $row['gig_title'] ?></h3>
						</div>
					</div>

					<!-- Job Listing Footer -->
					<div class="job-listing-footer">
						<span class="bookmark-icon"></span>
						<ul>
							<li><i class="icon-material-outline-location-on"></i> <?php echo $row['city'] ?></li>
						
							<li><i class="icon-material-outline-account-balance-wallet"></i> <?php echo $row['base_price_min']?>-<?php echo $row['base_price_max'] ?></li>
						
						</ul>
					</div>
				</a>	
				<?php 
			}
                      }

				?>

			

				
				

			


			

				
				
				<!-- Job Listing -->
				

				<!-- Job Listing -->
				

			</div>

			<!-- Pagination -->
			<!-- <div class="clearfix"></div>
			<div class="pagination-container margin-top-20 margin-bottom-20">
				<nav class="pagination">
					<ul>
						<li class="pagination-arrow"><a href="#" class="ripple-effect"><i class="icon-material-outline-keyboard-arrow-left"></i></a></li>
						<li><a href="#" class="ripple-effect">1</a></li>
						<li><a href="#" class="ripple-effect current-page">2</a></li>
						<li><a href="#" class="ripple-effect">3</a></li>
						<li><a href="#" class="ripple-effect">4</a></li>
						<li class="pagination-arrow"><a href="#" class="ripple-effect"><i class="icon-material-outline-keyboard-arrow-right"></i></a></li>
					</ul>
				</nav>
			</div>
			<div class="clearfix"></div> -->
			<!-- Pagination / End -->

			<!-- Footer -->
			
			<!-- Footer / End -->

		</div>
	</div>
	<!-- Full Page Content / End -->

</div>


</div>
<!-- Wrapper / End -->

<!-- Scripts


================================================== -->
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/jquery-migrate-3.0.0.min.js"></script>
<script src="js/mmenu.min.js"></script>
<script src="js/tippy.all.min.js"></script>
<script src="js/simplebar.min.js"></script>
<script src="js/bootstrap-slider.min.js"></script>
<script src="js/bootstrap-select.min.js"></script>
<script src="js/snackbar.js"></script>
<script src="js/clipboard.min.js"></script>
<script src="js/counterup.min.js"></script>
<script src="js/magnific-popup.min.js"></script>
<script src="js/slick.min.js"></script>
<script src="js/custom.js"></script>

<script type="text/javascript">


	
	function filter()
	{
	
	var city = $(".city").val();
	var category = $("#category").val();
      if(!city)
      {
      	city='all';
      }
      if(!category)
      {
      	category='all';
      }
	 window.location.href = 'main_page_gig.php?category='+category+'& location='+city;

	}
</script>


<!-- Snackbar // documentation: https://www.polonel.com/snackbar/ -->
<script>
// Snackbar for user status switcher
$('#snackbar-user-status label').click(function() { 
	Snackbar.show({
		text: 'Your status has been changed!',
		pos: 'bottom-center',
		showAction: false,
		actionText: "Dismiss",
		duration: 3000,
		textColor: '#fff',
		backgroundColor: '#383838'
	}); 
}); 
</script>

<script type="text/javascript">
	
  function fetch_data()
  {
          
  }
</script>

<!-- Google Autocomplete -->
<script>
	function initAutocomplete() {
		 var options = {
		  types: ['(cities)'],
		  // componentRestrictions: {country: "us"}
		 };

		 var input = document.getElementById('autocomplete-input');
		 var autocomplete = new google.maps.places.Autocomplete(input, options);
	}
</script>

<!-- Google API & Maps -->
<!-- Geting an API Key: https://developers.google.com/maps/documentation/javascript/get-api-key -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDSS-rKNxWRCRc61pkmZw1D48CASDbBqmw&amp;libraries=places&amp;callback=initAutocomplete"></script>

</body>

<!-- Mirrored from www.vasterad.com/themes/hireo/jobs-grid-layout-full-page.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 09 Mar 2019 13:32:32 GMT -->
</html>