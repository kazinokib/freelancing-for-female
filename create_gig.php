<?php
@ob_start();
if(session_status()!=PHP_SESSION_ACTIVE) session_start();



  include ("connection.php");
  include("page_content/header.php");
  if($user_id == NULL || $user_id =="")
{
   header("location:login.php");
}



?>
	<div class="clearfix"></div>
	<!-- Header Container / End -->


	<!-- Dashboard Container -->
	<div class="dashboard-container">

	<!-- Dashboard Sidebar
		================================================== -->

		<!-- Dashboard Sidebar / End -->


	<!-- Dashboard Content
		================================================== -->
		<div class="dashboard-content-container" data-simplebar>
			<div class="dashboard-content-inner" >

				<!-- Dashboard Headline -->
				<div class="dashboard-headline">
					<h3>Post a Gig</h3>

					<!-- Breadcrumbs -->

				</div>

				<!-- Row -->
				<div class="row">

					<!-- Dashboard Box -->
					<div class="col-xl-12">
						<div class="dashboard-box margin-top-0">

							<!-- Headline -->
							<div class="headline">
								<h3><i class="icon-feather-folder-plus"></i> Gig Post Form</h3>
							</div>

							<div class="content with-padding padding-bottom-10">
								<div class="row">

									<div class="col-xl-4">
										<div class="submit-field">
											<h5>Title</h5>
											<input id = "gig_title" type="text" class="with-border">
										</div>
									</div>



									<div class="col-xl-4">
										<div class="submit-field">
											<h5>Category</h5>
											<select  id = "gig_category" class="selectpicker with-border" data-size="7" title="Select Category">
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
									</div>

									<div class="col-xl-4">
										<div class="submit-field">
											<h5>Province</h5>
											<div class="input-with-icon">
												<div id="autocomplete-container">
													<select id="autocomplete-input" name="city" class="form-control city" required>
														<option value="">Select Province</option>
														<option value="ontario">Ontario</option>
														<option value="quebec">Quebec</option>
														<option value="nova_scotia">Nova Scotia</option>
														<option value="new_brunswick">New Brunswick</option>
														<option value="manitoba">Manitoba</option>
														<option value="british_columbia">British Columbia</option>
														<option value="prince_edward_island">Prince Edward Island</option>
														<option value="saskatchewan">Saskatchewan</option>
														<option value="alberta">Alberta</option>
														<option value="newfoundland_and_labrador">Newfoundland and Labrador</option>
													</select>
												</div>
												<i class="icon-material-outline-location-on"></i>
											</div>
										</div>
									</div>


									<div class="col-xl-4">
										<div class="submit-field">
											<h5>Base Price</h5>
											<div class="row">
												<div class="col-xl-6">
													<div class="input-with-icon">
														<input id = "base_price_min" class="with-border" type="text" placeholder="Min">
														<i class="currency">CAD</i>
													</div>
												</div>
												<div class="col-xl-6">
													<div class="input-with-icon">
														<input id = "base_price_max" class="with-border" type="text" placeholder="Max">
														<i class="currency">CAD</i>
													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="col-xl-4">
										<div class="submit-field">
											<h5>Minimum Duration</h5>
											<div class="row">
												<div class="col-xl-6">
													<div class="input-with-icon">
														<input id = "duration" class="with-border" type="text" placeholder="Minimum Duration">
														<i class="currency">Days</i>
													</div>
												</div>

											</div>
										</div>
									</div>

									<!-- <div class="col-xl-4">
										<div class="submit-field">
											<h5>Tags <span>(optional)</span>  <i class="help-icon" data-tippy-placement="right" title="Maximum of 10 tags"></i></h5>
											<div class="keywords-container">
												<div class="keyword-input-container">
													<input type="text" class="keyword-input with-border" placeholder="e.g. job title, responsibilites"/>
													<button class="keyword-input-button ripple-effect"><i class="icon-material-outline-add"></i></button>
												</div>
												<div class="keywords-list"> keywords go here </div>
												<div class="clearfix"></div>
											</div>

										</div>
									</div> -->

									<div class="col-xl-12">
										<div class="submit-field">
											<h5>Gig Description</h5>
											<textarea id = 'gig_description' cols="30" rows="5" class="with-border"></textarea>
											<div class="uploadButton margin-top-30">
												<input class="uploadButton-input" type="file" accept="image/*, application/pdf" id="upload" multiple/>
												<label class="uploadButton-button ripple-effect" for="upload">Upload Files</label>
												<span class="uploadButton-file-name">Images or documents that might be helpful in describing your job</span>
											</div>
										</div>
									</div>

								</div>
							</div>
						</div>
					</div>

					<div class="col-xl-12">
						<a href="#" onclick="gig_post()" class="button ripple-effect big margin-top-30"><i class="icon-feather-plus"></i> Create a gig</a>
					</div>

				</div>
				<!-- Row / End -->

				<!-- Footer -->
				<div class="dashboard-footer-spacer"></div>
				<div class="small-footer margin-top-15">

					<ul class="footer-social-links">
						<li>
							<a href="#" title="Facebook" data-tippy-placement="top">
								<i class="icon-brand-facebook-f"></i>
							</a>
						</li>
						<li>
							<a href="#" title="Twitter" data-tippy-placement="top">
								<i class="icon-brand-twitter"></i>
							</a>
						</li>
						<li>
							<a href="#" title="Google Plus" data-tippy-placement="top">
								<i class="icon-brand-google-plus-g"></i>
							</a>
						</li>
						<li>
							<a href="#" title="LinkedIn" data-tippy-placement="top">
								<i class="icon-brand-linkedin-in"></i>
							</a>
						</li>
					</ul>
					<div class="clearfix"></div>
				</div>
				<!-- Footer / End -->

			</div>
		</div>
		<!-- Dashboard Content / End -->

	</div>
	<!-- Dashboard Container / End -->

</div>
<!-- Wrapper / End -->


<!-- Scripts


	================================================== -->

	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

  <script type="text/javascript">

  	function gig_post()
  	{
    var gig_title = $("#gig_title").val();
	var city = $(".city").val();
	var base_price_min = $("#base_price_min").val();
	var base_price_max = $("#base_price_max").val();
	var gig_category = $("#gig_category").val();
	var gig_description = $("#gig_description").val();
	var duration = $("#duration").val();



     var formData= new FormData();
    formData.append('gig_title',gig_title);
    formData.append("city",city);
    formData.append("base_price_min",base_price_min);
    formData.append("base_price_max",base_price_max);
    formData.append("gig_category",gig_category);
    formData.append("gig_description",gig_description);
        formData.append("duration",duration);
       formData.append("user_id",<?php echo $user_id ?>);
    formData.append("gig_post","gig_post");
       formData.append('file',$('#upload')[0].files[0]);

    $.ajax({
      processData: false,
      contentType: false,
      url:"backend/register.php",
      type:"POST",
      data:formData,
      success:function(data,status){


         swal({
  title: "Your gig is successfully created",

  icon: "success",


})
.then((isConfrim) => {
  if (isConfrim) {
      window.location.href = 'main_page_gig.php?category=all&location=all';
  }
});


      },

    });
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

<!-- Chart.js // documentation: http://www.chartjs.org/docs/latest/ -->
<script src="js/chart.min.js"></script>
<script>
	Chart.defaults.global.defaultFontFamily = "Nunito";
	Chart.defaults.global.defaultFontColor = '#888';
	Chart.defaults.global.defaultFontSize = '14';

	var ctx = document.getElementById('chart').getContext('2d');

	var chart = new Chart(ctx, {
		type: 'line',

		// The data for our dataset
		data: {
			labels: ["January", "February", "March", "April", "May", "June"],
			// Information about the dataset
			datasets: [{
				label: "Views",
				backgroundColor: 'rgba(42,65,232,0.08)',
				borderColor: '#2a41e8',
				borderWidth: "3",
				data: [196,132,215,362,210,252],
				pointRadius: 5,
				pointHoverRadius:5,
				pointHitRadius: 10,
				pointBackgroundColor: "#fff",
				pointHoverBackgroundColor: "#fff",
				pointBorderWidth: "2",
			}]
		},

		// Configuration options
		options: {

			layout: {
				padding: 10,
			},

			legend: { display: false },
			title:  { display: false },

			scales: {
				yAxes: [{
					scaleLabel: {
						display: false
					},
					gridLines: {
						borderDash: [6, 10],
						color: "#d8d8d8",
						lineWidth: 1,
					},
				}],
				xAxes: [{
					scaleLabel: { display: false },
					gridLines:  { display: false },
				}],
			},

			tooltips: {
				backgroundColor: '#333',
				titleFontSize: 13,
				titleFontColor: '#fff',
				bodyFontColor: '#fff',
				bodyFontSize: 13,
				displayColors: false,
				xPadding: 10,
				yPadding: 10,
				intersect: false
			}
		},


	});

</script>


<!-- Google Autocomplete -->
<script>

</script>

<!-- Google API & Maps -->
<!-- Geting an API Key: https://developers.google.com/maps/documentation/javascript/get-api-key -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDSS-rKNxWRCRc61pkmZw1D48CASDbBqmw&amp;libraries=places&amp;callback=initAutocomplete"></script>


</body>

</html>
