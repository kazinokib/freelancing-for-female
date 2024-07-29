<?php
@ob_start();
if(session_status() != PHP_SESSION_ACTIVE) session_start();

include("connection.php");
include("page_content/header.php");

if ($user_id == NULL || $user_id == "") {
    header("location:login.php");
    exit();
}

$gig_id = $_REQUEST['gig_id'];
$sql = "SELECT * FROM gig WHERE id = $gig_id";
$res = mysqli_query($conn, $sql);

if ($res && mysqli_num_rows($res) > 0) {
    $row = mysqli_fetch_array($res);
    $gig_given_id = $row['user_id'];
    $gig_title = $row['gig_title'];
    $base_price_min = $row['base_price_min'];
    $base_price_max = $row['base_price_max'];
    $gig_description = $row['gig_description'];
    $gig_duration = $row['gig_duration'];
    $gig_date = $row['gig_date'];
    $gig_file = $row['gig_file'];

    date_default_timezone_set('Asia/Dhaka');
    $date = date('d-m-Y');
    $currentdate = strtotime($date);
    $timefromdb = strtotime($gig_date);
    $daysleft = ($currentdate - $timefromdb) / (60 * 60 * 24);

    $remaining_day = $gig_duration - $daysleft;

    $sql2 = "SELECT * FROM user WHERE id = $gig_given_id";
    $res2 = mysqli_query($conn, $sql2);

    if ($res2 && mysqli_num_rows($res2) > 0) {
        $row2 = mysqli_fetch_array($res2);
        $name = $row2['name'];
    }

    $sql3 = "SELECT * FROM gig_apply WHERE employee_id = $user_id AND gig_id = $gig_id";
    $res3 = mysqli_query($conn, $sql3);
    $previously_bid = mysqli_num_rows($res3);

    $sql4 = "SELECT * FROM rating WHERE rating_to = $gig_given_id";
    $res4 = mysqli_query($conn, $sql4);
    $rating = 0;

    $rating_count = mysqli_num_rows($res4);
    if ($rating_count > 0) {
        while ($row4 = mysqli_fetch_array($res4)) {
            $rating += $row4["given_rating"];
        }
        $rating = $rating / $rating_count;
        $rating = round($rating, 1);
    }
}
?>


<div class="clearfix"></div>
<!-- Header Container / End -->



<!-- Titlebar
================================================== -->
<div class="single-page-header" data-background-image="images/handi.jpg">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="single-page-header-inner">
					<div class="left-side">
						<div class="header-image"><a href="#"><img src="<?php echo $gig_file ?>" alt=""></a></div>
						<div class="header-details">
							<h3><?php echo $gig_title ?></h3>
							<h5><?php echo $name ?></h5>
							<ul>

								<li><div class="star-rating" data-rating="<?php echo $rating ?>"></div></li>

							</ul>
						</div>
					</div>
					<div class="right-side">
						<div class="salary-box">
							<div class="salary-type">Base Price</div>
							<div class="salary-amount"><?php echo $base_price_min ?> CAD - <?php echo $base_price_max ?> CAD</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<!-- Page Content
================================================== -->
<div class="container">
	<div class="row">

		<!-- Content -->
		<div class="col-xl-8 col-lg-8 content-right-offset">

			<!-- Description -->
			<div class="single-page-section">
				<h3 class="margin-bottom-25">Project Description</h3>
				<p><?php echo $gig_description ?></p>


			</div>

			<!-- Atachments -->
			<div class="single-page-section">
				<h3>Attachments</h3>
				<div class="col-md-4 col-sm-6">
											<article class="destination-box style-1">

												<div class="destination-box-image">
													<figure>
														<a data-fancybox="gallery" href="<?php echo $gig_file ?>">
															<img src="<?php echo $gig_file ?>" class="img-responsive listing-box-img" alt="" />
															<div class="list-overlay"></div>
														</a>


													</figure>
												</div>




											</article>
										</div>

			</div>

			<!-- Skills -->

			<div class="clearfix"></div>

			<!-- Freelancers Bidding -->


			<div class="boxed-list margin-bottom-60">
				<div class="boxed-list-headline">
					<h3><i class="icon-material-outline-group"></i> Review  </h3>
				</div>
				<ul class="boxed-list-ul">
				    <?php
				         while($row4 = mysqli_fetch_array($res4))
				         {
				             $rating_from = $row4['rating_from'];
				             $sql_user = "select * from user where id = $rating_from";
				             $res_user = mysqli_query($conn,$sql_user);
				             $row_user = mysqli_fetch_array($res_user);
				             $name = $row_user['name'];
				           //  file_put_contents("test2.txt",$row4['given_rating']." ".$row4['given_review']);

				    ?>
					<li>
						<div class="bid">
							<div class="bids-content">

								<div class="freelancer-name">
									<h4><a href="#"><?php echo $name ?> </a></h4>

									<p><?php echo $row4["given_review"] ?></p>
								</div>
							</div>

							<div class="bids-bid">
								<div class="bid-rate">
								<div class="star-rating" data-rating='<?php echo $row4["given_rating"] ?>'></div>

								</div>
							</div>
						</div>
					</li>

					<?php

				         }
					?>



				</ul>
			</div>


		</div>


		<!-- Sidebar -->
		<div class="col-xl-4 col-lg-4">
			<div class="sidebar-container">

				<div class="countdown green margin-bottom-35">Min <?php echo $gig_duration ?> days need</div>

				<div class="sidebar-widget">
					<div class="bidding-widget">
						<div class="bidding-headline"><h3>Confirm this gig!</h3></div>
						<div class="bidding-inner">

							<!-- Headline -->
							<span class="bidding-detail">Set your <strong>minimal rate</strong></span>

							<!-- Price Slider -->
							<div class="bidding-value">CAD<span id="biddingVal"></span></div>
							<input class="bidding-slider" id ="rate" type="text" value="" data-slider-handle="custom" data-slider-currency="$" data-slider-min='<?php echo $base_price_min ?>' data-slider-max='<?php echo $base_price_max ?>' data-slider-value="auto" data-slider-step="50" data-slider-tooltip="hide" />

							<!-- Headline -->
							<span class="bidding-detail margin-top-30">Set your <strong>wanted delivery time</strong></span>

							<!-- Fields -->
							<div class="bidding-fields">
								<div class="bidding-field">
									<!-- Quantity Buttons -->
									<div class="qtyButtons">
										<div class="qtyDec"></div>
										<input id="duration" type="text" name="qtyInput" value="1">
										<div class="qtyInc"></div>
									</div>
								</div>
								<div class="bidding-field">
									<select class="selectpicker default">
										<option selected>Days</option>

									</select>
								</div>
							</div>

							<!-- Button -->
							<br>
							<br>
							<?php if($previously_bid == 0)
                               {
							 ?>
							<a href="#small-dialog" class="apply-now-button popup-with-zoom-anim margin-bottom-50">Confirm <i class="icon-material-outline-arrow-right-alt"></i></a>
							<?php
                            }

                            else{

							?>
							<button type="button" disabled  class="btn btn-danger"> You already apply for this gig</button>
                          <?php

                            }
                          ?>
						</div>

					</div>
				</div>

				<!-- Sidebar Widget -->
				<div class="sidebar-widget">
					<h3>Bookmark</h3>

					<!-- Bookmark Button -->
					<button class="bookmark-button margin-bottom-25">
						<span class="bookmark-icon"></span>
						<span class="bookmark-text">Bookmark</span>
						<span class="bookmarked-text">Bookmarked</span>
					</button>

					<!-- Copy URL -->
					<div class="copy-url">
						<input id="copy-url" type="text" value="" class="with-border">
						<button class="copy-url-button ripple-effect" data-clipboard-target="#copy-url" title="Copy to Clipboard" data-tippy-placement="top"><i class="icon-material-outline-file-copy"></i></button>
					</div>

					<!-- Share Buttons -->
					<div class="share-buttons margin-top-25">
						<div class="share-buttons-trigger"><i class="icon-feather-share-2"></i></div>
						<div class="share-buttons-content">
							<span>Interesting? <strong>Share It!</strong></span>
							<ul class="share-buttons-icons">
								<li><a href="#" data-button-color="#3b5998" title="Share on Facebook" data-tippy-placement="top"><i class="icon-brand-facebook-f"></i></a></li>
								<li><a href="#" data-button-color="#1da1f2" title="Share on Twitter" data-tippy-placement="top"><i class="icon-brand-twitter"></i></a></li>
								<li><a href="#" data-button-color="#dd4b39" title="Share on Google Plus" data-tippy-placement="top"><i class="icon-brand-google-plus-g"></i></a></li>
								<li><a href="#" data-button-color="#0077b5" title="Share on LinkedIn" data-tippy-placement="top"><i class="icon-brand-linkedin-in"></i></a></li>
							</ul>
						</div>
					</div>
				</div>

			</div>
		</div>

	</div>
</div>


<!-- Spacer -->
<div class="margin-top-15"></div>
<!-- Spacer / End-->

<!-- Footer
================================================== -->
<?php include("page_content/footer.php") ?>
<!-- Footer / End -->

</div>
<!-- Wrapper / End -->


<!-- Sign In Popup
================================================== -->
<div id="small-dialog" class="zoom-anim-dialog mfp-hide dialog-with-tabs">

	<!--Tabs -->
	<div class="sign-in-form">

		<ul class="popup-tabs-nav">
			<li><a href="#tab">Make a Bid</a></li>
		</ul>

		<div class="popup-tabs-container">

			<!-- Tab -->
			<div class="popup-tab-content" id="tab">

				<!-- Welcome Text -->
				<div class="welcome-text">
					<h3>Discuss your project</h3>
				</div>

				<!-- Form -->




					<textarea name="textarea" id="bid_message" cols="10" placeholder="Message" class="with-border"></textarea>




				<!-- Button -->
				<button onclick="apply_gig()" class="button margin-top-35 full-width button-sliding-icon ripple-effect" type="button">Confirm <i class="icon-material-outline-arrow-right-alt"></i></button>

			</div>
			<!-- Login -->


		</div>
	</div>
</div>
<!-- Sign In Popup / End -->


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
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


<script type="text/javascript">
	function apply_gig()
	{
		var bid_rate = $("#rate").val();
		var bid_duration = $("#duration").val();
        var bid_message = $("#bid_message").val();
        var formData= new FormData();
    formData.append('proposed_rate',bid_rate);
    formData.append("proposed_duration",bid_duration);
    formData.append("bid_message",bid_message);
    formData.append("user_id",<?php echo $user_id ?>);
    formData.append("gig_given_id",<?php echo $gig_given_id ?>);
   formData.append("gig_id",<?php echo $gig_id ?>);

    formData.append("apply_gig","apply_gig");


    $.ajax({
      processData: false,
      contentType: false,
      url:"backend/job_details.php",
      type:"POST",
      data:formData,
      success:function(data,status){

         swal({
  title: "Your request has been successfully placed",

  icon: "success",


})
.then((isConfrim) => {
  if (isConfrim) {
     location.reload();
  }
});


      },

    });



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

// Snackbar for "place a bid" button
$('#snackbar-place-bid').click(function() {
	Snackbar.show({
		text: 'Your bid has been placed!',
	});
});


// Snackbar for copy to clipboard button
$('.copy-url-button').click(function() {
	Snackbar.show({
		text: 'Copied to clipboard!',
	});
});
</script>

</body>


</html>
