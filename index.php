<?php
session_start();
$user_logged_in = isset($_SESSION['user_id']);
?>
<!doctype html>
<html lang="en">


<head>

<!-- Basic Page Needs
================================================== -->
<title>Freelancer For Female</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<!-- CSS
================================================== -->
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/colors/blue.css">

</head>
<body>

<!-- Wrapper -->
<div id="wrapper" class="wrapper-with-transparent-header">

<!-- Header Container
================================================== -->
<header id="header-container" class="fullwidth transparent-header">

	<!-- Header -->
	<div id="header">
		<div class="container">

			<!-- Left Side Content -->
			<div class="left-side">

				<!-- Logo -->
				<div id="logo">
					<a href="index.php"><img src="images/new_logo.png" data-sticky-logo="images/new_logo.png" data-transparent-logo="images/logo_trans.png" alt=""></a>
				</div>

				<!-- Main Navigation -->
				<nav id="navigation">
					<ul id="responsive">


				<li><a href="index.php" >Home</a></li>

						<li><a href="main_page_job.php?category=all&location=all" >Browse Job</a></li>

						<li><a href="main_page_gig.php?category=all&location=all">Browse Gig</a></li>

						<li><a href="post_job.php">Post Job</a></li>
			 		     <li><a href="create_gig.php">Create Gig</a></li>
			 		     <li><a href="dashboard.php">Dashboard</a></li>


					</ul>







				</nav>
				<div class="clearfix"></div>
				<!-- Main Navigation / End -->

			</div>
			<!-- Left Side Content / End -->


			<!-- Right Side Content / End -->
			<div class="right-side">

				<!--  User Notifications -->


				<nav id="navigation">
					<ul id="responsive">
						<?php if (!$user_logged_in): ?>
							<li><a href="login.php">Join</a></li>
						<?php else: ?>
							<li><a href="logout.php">Logout</a></li>
						<?php endif; ?>
					</ul>
				</nav>

				<!--  User Notifications / End -->

				<!-- User Menu -->

				<!-- User Menu / End -->

				<!-- Mobile Navigation Button -->
				<span class="mmenu-trigger">
					<button class="hamburger hamburger--collapse" type="button">
						<span class="hamburger-box">
							<span class="hamburger-inner"></span>
						</span>
					</button>
				</span>

			</div>
			<!-- Right Side Content / End -->

		</div>
	</div>
	<!-- Header / End -->

</header>

<div class="clearfix"></div>
<!-- Header Container / End -->



<!-- Intro Banner
================================================== -->
<div class="intro-banner dark-overlay" data-background-image="images/handi.jpg">

	<!-- Transparent Header Spacer -->
	<div class="transparent-header-spacer"></div>

	<div class="container">

		<!-- Intro Headline -->
		<div class="row">
			<div class="col-md-12">
				<div class="banner-headline">
					<h3>
						<strong>Hire freelancers for any homecraft ,any time.</strong>
						<br>
						<span>Huge community of Textile ,Craft and creative worker.</span>
					</h3>
				</div>
			</div>
		</div>

		<!-- Search Bar -->
		<div class="row">
			<div class="col-md-12">
				<div class="intro-banner-search-form margin-top-95">

					<!-- Search Field -->


					<!-- Search Field -->
					<!--<div class="intro-search-field">-->
					<!--	<label for ="intro-keywords" class="field-title ripple-effect">What you need done?</label>-->
					<!--	<input id="keyword" type="text" placeholder="e.g. Scrapbook">-->
					<!--</div>-->

					<!-- Search Field -->
					<div class="intro-search-field">
						<select class="selectpicker default" multiple data-selected-text-format="count" data-size="7" title="All Categories" id= "category">
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

					<!-- Button -->
					<div class="intro-search-button">
						<button class="button ripple-effect" onclick="search()">Search</button>
					</div>
				</div>
			</div>
		</div>

		<!-- Stats -->
		<div class="row">
			<div class="col-md-12">
				<ul class="intro-stats margin-top-45 hide-under-992px">
					<li>
						<strong class="counter">1,586</strong>
						<span>Jobs Posted</span>
					</li>
					<li>
						<strong class="counter">3,543</strong>
						<span>Tasks Posted</span>
					</li>
					<li>
						<strong class="counter">1,232</strong>
						<span>Freelancers</span>
					</li>
				</ul>
			</div>
		</div>

	</div>
</div>


<!-- Content
================================================== -->

<!-- Popular Job Categories -->
<div class="section margin-top-65 margin-bottom-30">
	<div class="container">
		<div class="row">

			<!-- Section Headline -->
			<div class="col-xl-12">
				<div class="section-headline centered margin-top-0 margin-bottom-45">
					<h3>Popular Categories</h3>
				</div>
			</div>

			<div class="col-xl-3 col-md-6">
				<!-- Photo Box -->
				<!--<a href="main_page_job.php?location=all&category=textile" class="photo-box small" data-background-image="images/textile.jpg">-->
				<!--	<div class="photo-box-content">-->
				<!--		<h3>Textile</h3>-->
				<!--		<span>612</span>-->
				<!--	</div>-->
				<!--</a>-->

				<a href="main_page_job.php?location=all&category=textile" class="photo-box small" data-background-image="images/textile.jpg">
					<div class="photo-box-content">
						<h3>Textile</h3>
						<span>612</span>
					</div>
				</a>

			</div>

			<div class="col-xl-3 col-md-6">
				<!-- Photo Box -->
				<a href="main_page_job.php?location=all&category=home made food" class="photo-box small" data-background-image="images/food.jpeg">
					<div class="photo-box-content">
						<h3>Home Made Food</h3>
						<span>113</span>
					</div>
				</a>
			</div>

			<div class="col-xl-3 col-md-6">
				<!-- Photo Box -->
				<a href="main_page_job.php?location=all&category=antique jewellary" class="photo-box small" data-background-image="images/jewellary.jpg">
					<div class="photo-box-content">
						<h3>Antique Jewelery</h3>
						<span>186</span>
					</div>
				</a>
			</div>

			<div class="col-xl-3 col-md-6">
				<!-- Photo Box -->
				<a href="main_page_job.php?location=all&category=paper craft" class="photo-box small" data-background-image="images/paper_craft.jpg">
					<div class="photo-box-content">
						<h3>Papercraft</h3>
						<span>298</span>
					</div>
				</a>
			</div>

			<div class="col-xl-3 col-md-6">
				<!-- Photo Box -->
				<a href="main_page_job.php?location=all&category=custom potrait" class="photo-box small" data-background-image="images/potrait.jpg">
					<div class="photo-box-content">
						<h3>Custom Portrait</h3>
						<span>549</span>
					</div>
				</a>
			</div>

			<div class="col-xl-3 col-md-6">
				<!-- Photo Box -->
				<a href="main_page_job.php?location=all&category=scrapbook" class="photo-box small" data-background-image="images/scrapbook.jpg">
					<div class="photo-box-content">
						<h3>Scrapbook</h3>
						<span>873</span>
					</div>
				</a>
			</div>

			<div class="col-xl-3 col-md-6">
				<!-- Photo Box -->
				<a href="main_page_job.php?location=all&category=embroider" class="photo-box small" data-background-image="images/embroider.jpg">
					<div class="photo-box-content">
						<h3>Embroiderer</h3>
						<span>125</span>
					</div>
				</a>
			</div>

			<div class="col-xl-3 col-md-6">
				<!-- Photo Box -->
				<a href="main_page_job.php?location=all&category=scented candle" class="photo-box small" data-background-image="images/candle.jpg">
					<div class="photo-box-content">
						<h3>Scented Candle</h3>
						<span>445</span>
					</div>
				</a>
			</div>

		</div>
	</div>
</div>
<!-- Features Cities / End -->



<!-- Features Jobs -->
<!-- <div class="section gray margin-top-45 padding-top-65 padding-bottom-75">
	<div class="container">
		<div class="row">
			<div class="col-xl-12">

				 Section Headline
				<div class="section-headline margin-top-0 margin-bottom-35">
					<h3>Recent Tasks</h3>
					<a href="tasks-list-layout-1.html" class="headline-link">Browse All Tasks</a>
				</div>

				 Jobs Container
				<div class="tasks-list-container compact-list margin-top-35">

					 Task
					<a href="single-task-page.html" class="task-listing">

						 Job Listing Details
						<div class="task-listing-details">

							<Details
							<div class="task-listing-description">
								<h3 class="task-listing-title">Food Delviery Mobile App</h3>
								<ul class="task-icons">
									<li><i class="icon-material-outline-location-on"></i> San Francisco</li>
									<li><i class="icon-material-outline-access-time"></i> 2 minutes ago</li>
								</ul>
								<div class="task-tags margin-top-15">
									<span>iOS</span>
									<span>Android</span>
									<span>mobile apps</span>
									<span>design</span>
								</div>
							</div>

						</div>

						<div class="task-listing-bid">
							<div class="task-listing-bid-inner">
								<div class="task-offers">
									<strong>$1,000 - $2,500</strong>
									<span>Fixed Price</span>
								</div>
								<span class="button button-sliding-icon ripple-effect">Bid Now <i class="icon-material-outline-arrow-right-alt"></i></span>
							</div>
						</div>
					</a>

					 Task
					<a href="single-task-page.html" class="task-listing">

						 Job Listing Details
						<div class="task-listing-details">

							 Details
							<div class="task-listing-description">
								<h3 class="task-listing-title">2000 Words English to German</h3>
								<ul class="task-icons">
									<li><i class="icon-material-outline-location-off"></i> Online Job</li>
									<li><i class="icon-material-outline-access-time"></i> 5 minutes ago</li>
								</ul>
								<div class="task-tags margin-top-15">
									<span>copywriting</span>
									<span>translating</span>
									<span>editing</span>
								</div>
							</div>

						</div>

						<div class="task-listing-bid">
							<div class="task-listing-bid-inner">
								<div class="task-offers">
									<strong>$75</strong>
									<span>Fixed Price</span>
								</div>
								<span class="button button-sliding-icon ripple-effect">Bid Now <i class="icon-material-outline-arrow-right-alt"></i></span>
							</div>
						</div>
					</a>

					Task
					<a href="single-task-page.html" class="task-listing">

						 Job Listing Details
						<div class="task-listing-details">

							Details
							<div class="task-listing-description">
								<h3 class="task-listing-title">Fix Python Selenium Code</h3>
								<ul class="task-icons">
									<li><i class="icon-material-outline-location-off"></i> Online Job</li>
									<li><i class="icon-material-outline-access-time"></i> 30 minutes ago</li>
								</ul>
								<div class="task-tags margin-top-15">
									<span>Python</span>
									<span>Flask</span>
									<span>API Development</span>
								</div>
							</div>

						</div>

						<div class="task-listing-bid">
							<div class="task-listing-bid-inner">
								<div class="task-offers">
									<strong>$100 - $150</strong>
									<span>Hourly Rate</span>
								</div>
								<span class="button button-sliding-icon ripple-effect">Bid Now <i class="icon-material-outline-arrow-right-alt"></i></span>
							</div>
						</div>
					</a>

					Task
					<a href="single-task-page.html" class="task-listing">

						Job Listing Details
						<div class="task-listing-details">

							 Details
							<div class="task-listing-description">
								<h3 class="task-listing-title">WordPress Theme Installation</h3>
								<ul class="task-icons">
									<li><i class="icon-material-outline-location-off"></i> Online Job</li>
									<li><i class="icon-material-outline-access-time"></i> 1 hour ago</li>
								</ul>
								<div class="task-tags margin-top-15">
									<span>WordPress</span>
									<span>Theme Installation</span>
								</div>
							</div>

						</div>

						<div class="task-listing-bid">
							<div class="task-listing-bid-inner">
								<div class="task-offers">
									<strong>$100</strong>
									<span>Fixed Price</span>
								</div>
								<span class="button button-sliding-icon ripple-effect">Bid Now <i class="icon-material-outline-arrow-right-alt"></i></span>
							</div>
						</div>
					</a>

					 Task
					<a href="single-task-page.html" class="task-listing">

						Job Listing Details
						<div class="task-listing-details">

							Details
							<div class="task-listing-description">
								<h3 class="task-listing-title">PHP Core Website Fixes</h3>
								<ul class="task-icons">
									<li><i class="icon-material-outline-location-off"></i> Online Job</li>
									<li><i class="icon-material-outline-access-time"></i> 1 hour ago</li>
								</ul>
								<div class="task-tags margin-top-15">
									<span>PHP</span>
									<span>MySQL Administration</span>
									<span>API Development</span>
								</div>
							</div>

						</div>

						<div class="task-listing-bid">
							<div class="task-listing-bid-inner">
								<div class="task-offers">
									<strong>$50 - $80</strong>
									<span>Hourly Rate</span>
								</div>
								<span class="button button-sliding-icon ripple-effect">Bid Now <i class="icon-material-outline-arrow-right-alt"></i></span>
							</div>
						</div>
					</a>


				</div>
				 Jobs Container / End

			</div>
		</div>
	</div>
</div> -->
<!-- Featured Jobs / End -->

<!-- Icon Boxes -->
<div class="section padding-top-65 padding-bottom-65">
	<div class="container">
		<div class="row">

			<div class="col-xl-12">
				<!-- Section Headline -->
				<div class="section-headline centered margin-top-0 margin-bottom-5">
					<h3>How It Works?</h3>
				</div>
			</div>

			<div class="col-xl-4 col-md-4">
				<!-- Icon Box -->
				<div class="icon-box with-line">
					<!-- Icon -->
					<div class="icon-box-circle">
						<div class="icon-box-circle-inner">
							<i class="icon-line-awesome-lock"></i>
							<div class="icon-box-check"><i class="icon-material-outline-check"></i></div>
						</div>
					</div>
					<h3>Create an Account</h3>
					<p>Create your account with simple registration process</p>
				</div>
			</div>

			<div class="col-xl-4 col-md-4">
				<!-- Icon Box -->
				<div class="icon-box with-line">
					<!-- Icon -->
					<div class="icon-box-circle">
						<div class="icon-box-circle-inner">
							<i class="icon-line-awesome-legal"></i>
							<div class="icon-box-check"><i class="icon-material-outline-check"></i></div>
						</div>
					</div>
					<h3>Post a Gig</h3>
					<p>Create your advertisement with your necesary information </p>
				</div>
			</div>

			<div class="col-xl-4 col-md-4">
				<!-- Icon Box -->
				<div class="icon-box">
					<!-- Icon -->
					<div class="icon-box-circle">
						<div class="icon-box-circle-inner">
							<i class=" icon-line-awesome-trophy"></i>
							<div class="icon-box-check"><i class="icon-material-outline-check"></i></div>
						</div>
					</div>
					<h3>Get Hired</h3>
					<p>Bid job post and get hired</p>
				</div>
			</div>

		</div>
	</div>
</div>
<!-- Icon Boxes / End -->


<!-- Testimonials -->
<!-- <div class="section gray padding-top-65 padding-bottom-55">

	<div class="container">
		<div class="row">
			<div class="col-xl-12">
				 Section Headline
				<div class="section-headline centered margin-top-0 margin-bottom-5">
					<h3>Testimonials</h3>
				</div>
			</div>
		</div>
	</div>

	 Categories Carousel
	<div class="fullwidth-carousel-container margin-top-20">
		<div class="testimonial-carousel testimonials">

			Item
			<div class="fw-carousel-review">
				<div class="testimonial-box">
					<div class="testimonial-avatar">
						<img src="images/user-avatar-small-02.jpg" alt="">
					</div>
					<div class="testimonial-author">
						<h4>Sindy Forest</h4>
						 <span>Freelancer</span>
					</div>
					<div class="testimonial">Efficiently unleash cross-media information without cross-media value. Quickly maximize timely deliverables for real-time schemas. Dramatically maintain clicks-and-mortar solutions without functional solutions.</div>
				</div>
			</div>

			 Item
			<div class="fw-carousel-review">
				<div class="testimonial-box">
					<div class="testimonial-avatar">
						<img src="images/user-avatar-small-01.jpg" alt="">
					</div>
					<div class="testimonial-author">
						<h4>Tom Smith</h4>
						 <span>Freelancer</span>
					</div>
					<div class="testimonial">Completely synergize resource taxing relationships via premier niche markets. Professionally cultivate one-to-one customer service with robust ideas. Dynamically innovate resource-leveling customer service for state of the art.</div>
				</div>
			</div>

			 Item
			<div class="fw-carousel-review">
				<div class="testimonial-box">
					<div class="testimonial-avatar">
						<img src="images/user-avatar-placeholder.png" alt="">
					</div>
					<div class="testimonial-author">
						<h4>Sebastiano Piccio</h4>
						 <span>Employer</span>
					</div>
					<div class="testimonial">Completely synergize resource taxing relationships via premier niche markets. Professionally cultivate one-to-one customer service with robust ideas. Dynamically innovate resource-leveling customer service for state of the art.</div>
				</div>
			</div>

			 Item
			<div class="fw-carousel-review">
				<div class="testimonial-box">
					<div class="testimonial-avatar">
						<img src="images/user-avatar-small-03.jpg" alt="">
					</div>
					<div class="testimonial-author">
						<h4>David Peterson</h4>
						 <span>Freelancer</span>
					</div>
					<div class="testimonial">Collaboratively administrate turnkey channels whereas virtual e-tailers. Objectively seize scalable metrics whereas proactive e-services. Seamlessly empower fully researched growth strategies and interoperable sources.</div>
				</div>
			</div>

			 Item
			<div class="fw-carousel-review">
				<div class="testimonial-box">
					<div class="testimonial-avatar">
						<img src="images/user-avatar-placeholder.png" alt="">
					</div>
					<div class="testimonial-author">
						<h4>Marcin Kowalski</h4>
						 <span>Freelancer</span>
					</div>
					<div class="testimonial">Efficiently unleash cross-media information without cross-media value. Quickly maximize timely deliverables for real-time schemas. Dramatically maintain clicks-and-mortar solutions without functional solutions.</div>
				</div>
			</div>

		</div>
	</div>
	Categories Carousel / End

</div> -->
<!-- Testimonials / End -->


<!-- Counters -->


<div class="section padding-top-70 padding-bottom-75">
	<div class="container">
		<div class="row">

			<div class="col-xl-12">
				<div class="counters-container">

					<!-- Counter -->
					<div class="single-counter">
						<i class="icon-line-awesome-suitcase"></i>
						<div class="counter-inner">
							<h3><span class="counter">1,586</span></h3>
							<span class="counter-title">Jobs Posted</span>
						</div>
					</div>

					<!-- Counter -->
					<div class="single-counter">
						<i class="icon-line-awesome-legal"></i>
						<div class="counter-inner">
							<h3><span class="counter">3,543</span></h3>
							<span class="counter-title">Tasks Posted</span>
						</div>
					</div>

					<!-- Counter -->
					<div class="single-counter">
						<i class="icon-line-awesome-user"></i>
						<div class="counter-inner">
							<h3><span class="counter">2,413</span></h3>
							<span class="counter-title">Active Members</span>
						</div>
					</div>

					<!-- Counter -->
					<div class="single-counter">
						<i class="icon-line-awesome-trophy"></i>
						<div class="counter-inner">
							<h3><span class="counter">99</span>%</h3>
							<span class="counter-title">Satisfaction Rate</span>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>
</div>
<!-- Counters / End -->


<!-- Footer
================================================== -->
<div id="footer">

	<!-- Footer Top Section -->
	<div class="footer-top-section">
		<div class="container">
			<div class="row">
				<div class="col-xl-12">

					<!-- Footer Rows Container -->
					<div class="footer-rows-container">

						<!-- Left Side -->
						<div class="footer-rows-left">
							<div class="footer-row">
								<div class="footer-row-inner footer-logo">
									<img src="images/logo_trans.png" alt="">
								</div>
							</div>
						</div>

						<!-- Right Side -->
						<div class="footer-rows-right">

							<!-- Social Icons -->
							<div class="footer-row">
								<div class="footer-row-inner">
									<ul class="footer-social-links">
										<li>
											<a href="#" title="Facebook" data-tippy-placement="bottom" data-tippy-theme="light">
												<i class="icon-brand-facebook-f"></i>
											</a>
										</li>
										<li>
											<a href="#" title="Twitter" data-tippy-placement="bottom" data-tippy-theme="light">
												<i class="icon-brand-twitter"></i>
											</a>
										</li>
										<li>
											<a href="#" title="Google Plus" data-tippy-placement="bottom" data-tippy-theme="light">
												<i class="icon-brand-google-plus-g"></i>
											</a>
										</li>
										<li>
											<a href="#" title="LinkedIn" data-tippy-placement="bottom" data-tippy-theme="light">
												<i class="icon-brand-linkedin-in"></i>
											</a>
										</li>
									</ul>
									<div class="clearfix"></div>
								</div>
							</div>

							<!-- Language Switcher -->
							<div class="footer-row">
								<div class="footer-row-inner">
									<select class="selectpicker language-switcher" data-selected-text-format="count" data-size="5">
										<option selected>English</option>
										<option>Français</option>
										<option>Español</option>
										<option>Deutsch</option>
									</select>
								</div>
							</div>
						</div>

					</div>
					<!-- Footer Rows Container / End -->
				</div>
			</div>
		</div>
	</div>
	<!-- Footer Top Section / End -->

	<!-- Footer Middle Section -->

	<!-- Footer Middle Section / End -->

	<!-- Footer Copyrights -->

	<!-- Footer Copyrights / End -->

</div>
<!-- Footer / End -->

</div>
<!-- Wrapper / End -->


<!-- Scripts
================================================== -->
<script>
    function search()
    {
        var category = $("#category").val();

        if(!category)
        {
            category='all';
        }
         window.location.href = 'main_page_job.php?category='+category+'& location=all';

    }
</script>
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

	// Autocomplete adjustment for homepage
	if ($('.intro-banner-search-form')[0]) {
	    setTimeout(function(){
	        $(".pac-container").prependTo(".intro-search-field.with-autocomplete");
	    }, 300);
	}

</script>

<!-- Google API -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDSS-rKNxWRCRc61pkmZw1D48CASDbBqmw&amp;libraries=places&amp;callback=initAutocomplete"></script>

</body>


</html>
