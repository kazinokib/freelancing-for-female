<?php
include('page_content/header.php');

$sender_id = $_REQUEST['sender_id'];
$reciever_id = $_REQUEST['receiver_id'];
$work_id = $_REQUEST['work_id'];

$sql_chat = "SELECT * from chat where sender_id=$sender_id and 	reciever_id = $reciever_id";
$res_chat = mysqli_query($conn,$sql_chat);
//file_put_contents("test.txt",$sender_id." ".$reciever_id." ".$work_id);
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



				<div class="messages-container margin-top-0">

					<div class="messages-container-inner">

						<!-- Messages -->

						<!-- Messages / End -->

						<!-- Message Content -->
						<div class="message-content">

							<div class="messages-headline">
								<h4>Sindy Forest</h4>
								<a href="#" class="message-action"><i class="icon-feather-trash-2"></i> Delete Conversation</a>
							</div>

							<!-- Message Content Inner -->
							<div class="message-content-inner">

									<!-- Time Sign -->
									<div class="message-time-sign">
										<span>28 June, 2019</span>
									</div>
                                    <?php while($row_chat = mysqli_fetch_array($res_chat))
                                             {

                                      ?>
									<div class="message-bubble me">
										<div class="message-bubble-inner">
											<div class="message-avatar"><img src="images/user-avatar-small-01.jpg" alt="" /></div>
											<div class="message-text"><p><?php echo $row_chat['sender_msg'] ?></p></div>
										</div>
										<div class="clearfix"></div>
									</div>

									<div class="message-bubble">
										<div class="message-bubble-inner">
											<div class="message-avatar"><img src="images/user-avatar-small-02.jpg" alt="" /></div>
											<div class="message-text"><p><?php  echo $row_chat['receiver_msg'] ?></p></div>
										</div>

									<?php } ?>
										<div class="clearfix"></div>
									</div>


									<!-- Time Sign -->






							</div>
							<!-- Message Content Inner / End -->

							<!-- Reply Area -->
							<div class="message-reply">
								<textarea cols="1" rows="1" placeholder="Your Message" data-autoresize></textarea>
								<button class="button ripple-effect">Send</button>
							</div>

						</div>
						<!-- Message Content -->

					</div>
			</div>
			<!-- Messages Container / End -->




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


<!-- Apply for a job popup
================================================== -->
<div id="small-dialog" class="zoom-anim-dialog mfp-hide dialog-with-tabs">

	<!--Tabs -->
	<div class="sign-in-form">

		<ul class="popup-tabs-nav">
			<li><a href="#tab">Add Note</a></li>
		</ul>

		<div class="popup-tabs-container">

			<!-- Tab -->
			<div class="popup-tab-content" id="tab">

				<!-- Welcome Text -->
				<div class="welcome-text">
					<h3>Do Not Forget 😎</h3>
				</div>

				<!-- Form -->
				<form method="post" id="add-note">

					<select class="selectpicker with-border default margin-bottom-20" data-size="7" title="Priority">
						<option>Low Priority</option>
						<option>Medium Priority</option>
						<option>High Priority</option>
					</select>

					<textarea name="textarea" cols="10" placeholder="Note" class="with-border"></textarea>

				</form>

				<!-- Button -->
				<button class="button full-width button-sliding-icon ripple-effect" type="submit" form="add-note">Add Note <i class="icon-material-outline-arrow-right-alt"></i></button>

			</div>

		</div>
	</div>
</div>
<!-- Apply for a job popup / End -->


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
