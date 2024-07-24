<!doctype html>
<html lang="en">

<!-- Mirrored from www.vasterad.com/themes/hireo/pages-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 09 Mar 2019 13:33:22 GMT -->
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

				<h2>Verification Code</h2>

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
					<h3>A verification code sent to your mobile. Please enter verification code below</h3>
					
				</div>
					
				<!-- Form -->
				
					<div class="input-with-icon-left">
						<i class="icon-material-baseline-mail-outline"></i>
						<input type="text" class="input-text with-border" name="mobile" id="otp" placeholder="Enter Verification Code" required/>
					</div>

					
					<button type="button" onclick = "resend_otp()" class="forgot-password">Resend Otp</a>
				
				
				<!-- Button -->
				<button class="button full-width button-sliding-icon ripple-effect margin-top-10" type="button" onclick="verify()">Enter <i class="icon-material-outline-arrow-right-alt"></i></button>
				
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
	
	
	function verify()
	{
	    var otp = $("#otp").val();
	    var formData = new FormData();
	    formData.append("otp",otp);
	    formData.append("verify","verify");
	     $.ajax({
      processData: false,
      contentType: false,
      url:"backend/data.php",
      type:"POST",
      data:formData,
      success:function(data,status){

         var msg=$.trim(data);
         if(msg=="not_ok")
         {
         	alert("Verification code not match");
         }  
         else{
         	 window.location.href = 'main_page_job.php?category=all&location=all';
         }      

      },

    });

	}
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

        location.reload();

      },

    });

	}
	
	function login()
	{
		var mobile = $("#mobile").val();
		var password = $("#password").val();
      var formData= new FormData();
    formData.append('mobile',mobile);
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
         	alert("Mobile number and password not match")
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