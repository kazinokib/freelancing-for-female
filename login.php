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
<div id="wrapper">

<!-- Header Container
================================================== -->
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
					<ul id="responsive">







					</ul>
				</nav>
				<div class="clearfix"></div>
				<!-- Main Navigation / End -->

			</div>
			<!-- Left Side Content / End -->


			<!-- Right Side Content / End -->
			<div class="right-side">



			</div>
			<!-- Right Side Content / End -->

		</div>
	</div>
	<!-- Header / End -->

</header>
<div class="clearfix"></div>
<!-- Header Container / End -->

<!-- Titlebar
================================================== -->
<div id="titlebar" class="gradient">
	<div class="container">
		<div class="row">
			<div class="col-md-12">

				<h2>Log In</h2>

				<!-- Breadcrumbs -->


			</div>
		</div>
	</div>
</div>


<!-- Page Content
================================================== -->
<div class="container">
	<div class="row">
		<div class="col-xl-5 offset-xl-3">


			<div class="login-register-page">
				<!-- Welcome Text -->
				<div class="welcome-text">
					<h3>We're glad to see you again!</h3>
					<span>Don't have an account? <a href="sign_up.php">Sign Up!</a></span>

					<p style = "color:red;" id = "verify_alert">Please verify your mobile number from <button style = "color:blue" class="btn btn-default" type="button" onclick = resend_otp()  >here </button> </p>
				</div>

				<!-- Form -->

					<div class="input-with-icon-left">
						<i class="icon-material-baseline-mail-outline"></i>
						<input type="text" class="input-text with-border" name="email" id="email" placeholder="Email" required/>
					</div>

					<div class="input-with-icon-left">
						<i class="icon-material-outline-lock"></i>
						<input type="password" class="input-text with-border" name="password" id="password" placeholder="Password" required/>
					</div>
					<!--<a href="#" class="forgot-password">Forgot Password?</a>-->


				<!-- Button -->
				<button class="button full-width button-sliding-icon ripple-effect margin-top-10" type="button" onclick="login()">Log In <i class="icon-material-outline-arrow-right-alt"></i></button>

				<!-- Social Login -->
				<!-- <div class="social-login-separator"><span>or</span></div>
				<div class="social-login-buttons">
					<button class="facebook-login ripple-effect"><i class="icon-brand-facebook-f"></i> Log In via Facebook</button>
					<button class="google-login ripple-effect"><i class="icon-brand-google-plus-g"></i> Log In via Google+</button>
				</div> -->
			</div>

		</div>
	</div>
</div>


<!-- Spacer -->
<div class="margin-top-70"></div>
<!-- Spacer / End-->

<!-- Footer
================================================== -->

<!-- Footer / End -->

</div>
<!-- Wrapper / End -->

<!-- Scripts
================================================== -->
<script type="text/javascript">

function resend_otp()
	{
	    var formData = new FormData();
	    formData.append("resend_otp","resend_otp");
	    $.ajax({
      processData: false,
      contentType: false,
      url:"backend/data.php",
      type:"POST",
      data:formData,
      success:function(data,status){

         window.location.href = 'otp_interface.php';

      },

    });

	}

	function login()
	{
		var email = $("#email").val();
		var password = $("#password").val();
      var formData= new FormData();
    formData.append('email',email);
    formData.append("password",password);



    formData.append("login","login");


    $.ajax({
      processData: false,
      contentType: false,
      url:"backend/login.php",
      type:"POST",
      data:formData,
      success:function(data,status){

         var msg=$.trim(data);
         if(msg=="not_ok")
         {
         	alert("Email and password not match")
         }
         else if(msg == "otp")
         {
            $("#verify_alert").show();
         }
         else{
         	 window.location.href = 'main_page_job.php?category=all&location=all';
         }

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

$(function () {
  $("#verify_alert").hide();

})




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

</body>


</html>
