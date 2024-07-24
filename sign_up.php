<!doctype html>
<html lang="en">

<head>
<!-- Basic Page Needs -->
<title>Freelancing For Female</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<!-- CSS -->
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/colors/blue.css">
<style>
/* Spinner Styles */
.spinner {
    display: none;
    width: 50px;
    height: 50px;
    border: 5px solid #f3f3f3;
    border-top: 5px solid #3498db;
    border-radius: 50%;
    animation: spin 1s linear infinite;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}
</style>
</head>
<body>

<!-- Wrapper -->
<div id="wrapper">

<!-- Header Container -->
<header id="header-container" class="fullwidth">

	<!-- Header -->
	<div id="header">
		<div class="container">

			<!-- Left Side Content -->
			<div class="left-side">

				<!-- Logo -->
				<div id="logo">
					<a href="index.php"><img src="images/logo.jpeg" alt=""></a>
				</div>

				<!-- Main Navigation -->
				<nav id="navigation">
					<ul id="responsive"></ul>
				</nav>
				<div class="clearfix"></div>
				<!-- Main Navigation / End -->

			</div>
			<!-- Left Side Content / End -->

			<!-- Right Side Content / End -->
			<div class="right-side"></div>
			<!-- Right Side Content / End -->

		</div>
	</div>
	<!-- Header / End -->

</header>
<div class="clearfix"></div>
<!-- Header Container / End -->

<!-- Titlebar -->
<div id="titlebar" class="gradient">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h2>Register</h2>
			</div>
		</div>
	</div>
</div>

<!-- Page Content -->
<div class="container">
	<div class="row">
		<div class="col-xl-5 offset-xl-3">
			<div class="login-register-page">
				<!-- Welcome Text -->
				<div class="welcome-text">
					<h3 style="font-size: 26px;">Let's create your account!</h3>
					<span>Already have an account? <a href="login.php">Log In!</a></span>
				</div>

				<!-- Form -->
				<form method="post" id="register-account-form">
					<div class="input-with-icon-left">
						<i class="icon-material-outline-person-pin"></i>
						<input type="text" class="input-text with-border" name="name" id="name" placeholder="Full Name" required/>
					</div>

					<div class="input-with-icon-left">
						<i class="icon-material-outline-email"></i>
						<input type="email" class="input-text with-border" name="email" id="email" placeholder="Email Address" required/>
					</div>

					<div class="input-with-icon-left">
						<select id="city" name="city" class="form-control" required>
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

					<div class="input-with-icon-left">
						<i class="icon-line-awesome-phone-square"></i>
						<input type="text" class="input-text with-border" name="mobile_number" id="mobile_number" placeholder="Mobile Number" ng-pattern="/^(?:\+88|01)?\d{11}\r?$/" required/>
					</div>

					<div class="input-with-icon-left" title="Should be at least 8 characters long" data-tippy-placement="bottom">
						<i class="icon-material-outline-lock"></i>
						<input type="password" class="input-text with-border" name="password" id="password" placeholder="Password" required/>
					</div>

					<div class="input-with-icon-left">
						<i class="icon-material-outline-lock"></i>
						<input type="password" class="input-text with-border" name="r_password" id="r_password" placeholder="Repeat Password" required/>
					</div>
				</form>

				<!-- Button -->
				<button class="button full-width button-sliding-icon ripple-effect margin-top-10" type="button" onclick="register()">Register <i class="icon-material-outline-arrow-right-alt"></i></button>

				<!-- Spinner -->
				<div class="spinner" id="loadingSpinner"></div>
			</div>
		</div>
	</div>
</div>

<!-- Spacer -->
<div class="margin-top-70"></div>
<!-- Spacer / End-->

<!-- Footer -->

<!-- Footer / End -->

</div>
<!-- Wrapper / End -->

<!-- Scripts -->
<script type="text/javascript">
	function register() {
		var phoneno = /^(?:\+?88)?01[15-9]\d{8}$/;

		var name = $("#name").val();
		var email = $("#email").val();
		var city = $("#city").val();
		var mobile_number = $("#mobile_number").val();
		var password = $("#password").val();
		var r_password = $("#r_password").val();

		if(name == null || name == "") {
			alert("Name is required");
		} else if(email == null || email == "") {
			alert("Email is required");
		} else if(city == null || city == "") {
			alert("City is required");
		} else if(mobile_number == null || mobile_number == "") {
			alert("Mobile number is required");
		} else if(password == null || password == "") {
			alert("Password is required");
		} else if (r_password == null || r_password == "") {
			alert("Repeat password field is required");
		} else if(password != r_password) {
			alert("Password and Repeat Password do not match");
		} else {
			var formData = new FormData();
			formData.append('name', name);
			formData.append('email', email);
			formData.append("city", city);
			formData.append("mobile_number", mobile_number);
			formData.append("password", password);
			formData.append("r_password", r_password);
			formData.append("registration", "registration");

			// Show the spinner
			document.getElementById("loadingSpinner").style.display = "block";

			$.ajax({
				processData: false,
				contentType: false,
				url: "backend/register.php",
				type: "POST",
				data: formData,
				success: function(data, status) {
					alert("Registration Success. OTP sent to your email.");
					window.location.href = 'otp_interface.php';
				},
				error: function(xhr, status, error) {
					alert("An error occurred: " + xhr.responseText);
				},
				complete: function() {
					// Hide the spinner
					document.getElementById("loadingSpinner").style.display = "none";
				}
			});
		}
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
<script type="text/javascript" src="js/custom.js"></script>

<!-- Snackbar // documentation: https://www.polonel.com/snackbar/ -->
<script>
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

</body>
</html>
