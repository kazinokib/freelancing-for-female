<?php 
 @ob_start();
if(session_status()!=PHP_SESSION_ACTIVE) session_start();
  
  
 
  include ("connection.php");
  include("page_content/header.php");
  if($user_id == NULL || $user_id =="")
{
   header("location:login.php"); 
}  
 $sql_manage_gig_accepted  = "Select * from gig_apply where user_id = $user_id and gig_accepted = 1";
 $res_manage_gig_accepted  = mysqli_query($conn,$sql_manage_gig_accepted);


 // $sql_applied_gig  = "Select * from gig_apply where user_id = $user_id and gig_accepted = 0";
 // $res_applied_gig  = mysqli_query($conn,$sql_applied_gig);

 $sql_manage_gig  = "SELECT * from gig_apply where user_id = $user_id and gig_accepted = 0";
 $res_manage_gig  = mysqli_query($conn,$sql_manage_gig);


  $sql_manage_gig_accepted_client  = "Select * from gig_apply where employee_id = $user_id and gig_accepted = 1";
 $res_manage_gig_accepted_client  = mysqli_query($conn,$sql_manage_gig_accepted_client);
 
 
 $sql_post_gig = "SELECT * from gig where user_id = $user_id";
 $res_post_gig = mysqli_query($conn,$sql_post_gig);











  
?>
<div class="clearfix"></div>
<!-- Header Container / End -->


<!-- Dashboard Container -->
<div class="dashboard-container">

	<!-- Dashboard Sidebar
	================================================== -->
	<div class="dashboard-sidebar">
		<div class="dashboard-sidebar-inner" data-simplebar>
			<div class="dashboard-nav-container">

				<!-- Responsive Navigation Trigger -->
				<a href="#" class="dashboard-responsive-nav-trigger">
					<span class="hamburger hamburger--collapse" >
						<span class="hamburger-box">
							<span class="hamburger-inner"></span>
						</span>
					</span>
					<span class="trigger-title">Dashboard Navigation</span>
				</a>
				
				<!-- Navigation -->
				<div class="dashboard-nav">
					<div class="dashboard-nav-inner">

						<ul data-submenu-title="Start">
							<li><a href="dashboard.php"><i class="icon-material-outline-dashboard"></i> Dashboard</a></li>
							<!--<li ><a href="dashboard-messages.html"><i class="icon-material-outline-question-answer"></i> Messages <span class="nav-tag">2</span></a></li>-->
							<li ><a href="see_notification.php"><i class="icon-material-outline-question-answer"></i> Notificaton <span class="nav-tag"><?php echo $total_notification ?></span></a></li>

							<li ><a href="manage_job.php"><i class="icon-material-outline-question-answer"></i> Manage Job </a></li>

							<li><a href="manage_bid.php"><i class="icon-material-outline-question-answer"></i> Manage Bid </a></li>

							<li class="active" ><a href="manage_gig.php"><i class="icon-material-outline-question-answer"></i> Manage Gig </a></li>

							<!--<li><a href="dashboard-bookmarks.html"><i class="icon-material-outline-star-border"></i> Bookmarks</a></li>-->
							<!--<li><a href="dashboard-reviews.html"><i class="icon-material-outline-rate-review"></i> Reviews</a></li>-->
						</ul>
						
						<!--<ul data-submenu-title="Organize and Manage">-->
						<!--	<li><a href="#"><i class="icon-material-outline-business-center"></i> Jobs</a>-->
						<!--		<ul>-->
						<!--			<li><a href="dashboard-manage-jobs.html">Manage Jobs <span class="nav-tag">3</span></a></li>-->
						<!--			<li><a href="dashboard-manage-candidates.html">Manage Candidates</a></li>-->
						<!--			<li><a href="dashboard-post-a-job.html">Post a Job</a></li>-->
						<!--		</ul>	-->
						<!--	</li>-->
						<!--	<li><a href="#"><i class="icon-material-outline-assignment"></i> Tasks</a>-->
						<!--		<ul>-->
						<!--			<li><a href="dashboard-manage-tasks.html">Manage Tasks <span class="nav-tag">2</span></a></li>-->
						<!--			<li><a href="dashboard-manage-bidders.html">Manage Bidders</a></li>-->
						<!--			<li><a href="dashboard-my-active-bids.html">My Active Bids <span class="nav-tag">4</span></a></li>-->
						<!--			<li><a href="dashboard-post-a-task.html">Post a Task</a></li>-->
						<!--		</ul>	-->
						<!--	</li>-->
						<!--</ul>-->

						<ul data-submenu-title="Account">
							<!--<li><a href="dashboard-settings.html"><i class="icon-material-outline-settings"></i> Settings</a></li>-->
								<li ><a href="update_profile.php"><i class="icon-material-outline-settings"></i> Update Profile</a></li>
							<li><a href="logout.php"><i class="icon-material-outline-power-settings-new"></i> Logout</a></li>
						</ul>
						
					</div>
				</div>
				<!-- Navigation / End -->

			</div>
		</div>
	</div>
	<!-- Dashboard Sidebar / End -->


	<!-- Dashboard Content
	================================================== -->
	<div class="dashboard-content-container" data-simplebar>
			<div class="dashboard-content-inner" >
			
			<!-- Dashboard Headline -->
			
			<!-- Row -->
			<div class="row">

				<!-- Dashboard Box -->
				<div class="col-xl-12">
					<div class="dashboard-box margin-top-0">

						<!-- Headline -->
						
						<div class="content">
							<ul class="dashboard-box-list">
								<?php while($row_manage_gig_accepted = mysqli_fetch_array($res_manage_gig_accepted) ){ 
									  // $bid_id = $row_manage_bid_accepted['bid_id'];
                                     $gig_id = $row_manage_gig_accepted['gig_id'];
                                     $client_id = $row_manage_gig_accepted['employee_id'];
                                     $freelancer_id = $row_manage_gig_accepted['user_id'];
                                     $proposed_price = $row_manage_gig_accepted['proposed_rate'];

                                      $sql = "SELECT * from gig where id = $gig_id";
                                      $res = mysqli_query($conn,$sql);
                                      $row = mysqli_fetch_array($res);
                                      $gig_title = $row['gig_title'];

                                      $sql = "SELECT * from user where id = $client_id";
                                      $res = mysqli_query($conn,$sql);
                                      $row = mysqli_fetch_array($res);
                                      $name = $row['name'];
                                      $mobile_number = $row['mobile_number'];
                                    



									?>
								<li>
									<!-- Overview -->
									<div class="freelancer-overview manage-candidates">
										<div class="freelancer-overview-inner">
											<input type = "hidden" id = "client_id" value="<?php echo $client_id ?>">
                                           <input type = "hidden" id = "freelancer_id" value="<?php echo $freelancer_id ?>">
                                           <input type = "hidden" id = "gig_id" value="<?php echo $gig_id ?>">

											<!-- Avatar -->
											

											<!-- Name -->
											<div class="freelancer-name">
												<h4 style="color:#6EBA10"><strong>Your accepted gig</strong></h4>
												<h4>Gig Title: <strong><?php echo $gig_title ?></strong></h4>
												<h4>Client name : <a href="#" style="color:blue"><?php echo $name ?> </a></h4>
												<h4>Proposed Price : <a href="#" style="color:blue"><?php echo $proposed_price ?> </a>tk</h4>  

											
												
												<span class="freelancer-detail-item"><i class="icon-feather-phone"></i><?php echo $mobile_number?> </span>

											
												

												
												<div class="buttons-to-right always-visible margin-top-25 margin-bottom-5">
													<a href="gig_details.php?gig_id=<?php echo $gig_id?>"  class="button ripple-effect"><i class="icon-feather-file-text"></i> Gig Details </a>
													<a href="#small-dialog-2" class="popup-with-zoom-anim button dark ripple-effect"><i class="icon-feather-mail"></i> Job done</a>
													
												</div>
											</div>
										</div>
									</div>
								</li>
								<?php  
                                 }
								?>


								<?php while($row_manage_gig_accepted_client = mysqli_fetch_array($res_manage_gig_accepted_client) ){ 
									  // $bid_id = $row_manage_bid_accepted['bid_id'];
                                     $gig_id = $row_manage_gig_accepted_client['gig_id'];
                                     $freelancer_id = $row_manage_gig_accepted_client['user_id'];
                                     $client_id = $row_manage_gig_accepted_client['employee_id'];
                                     $proposed_price = $row_manage_gig_accepted['proposed_rate'];

                                      $sql = "SELECT * from gig where id = $gig_id";
                                      $res = mysqli_query($conn,$sql);
                                      $row = mysqli_fetch_array($res);
                                      $gig_title = $row['gig_title'];

                                      $sql = "SELECT * from user where id = $freelancer_id";
                                      $res = mysqli_query($conn,$sql);
                                      $row = mysqli_fetch_array($res);
                                      $name = $row['name'];
                                      $mobile_number = $row['mobile_number'];
                                    



									?>
								<li>
									<!-- Overview -->
									<div class="freelancer-overview manage-candidates">
										<div class="freelancer-overview-inner">
											<input type = "hidden" id = "client_id" value="<?php echo $client_id ?>">
                                           <input type = "hidden" id = "freelancer_id" value="<?php echo $freelancer_id ?>">
                                           <input type = "hidden" id = "gig_id" value="<?php echo $gig_id ?>">

											<!-- Avatar -->
											

											<!-- Name -->
											<div class="freelancer-name">
												<h4 style="color:#6EBA10" ><strong>Your requested gig</strong></h4>
												<h4>Gig Title: <strong><?php echo $gig_title ?></strong></h4>
												<h4>Freelancer name : <a href="#" style="color:blue"><?php echo $name ?> </a></h4>
												<h4>Proposed Price : <a href="#" style="color:blue"><?php echo $proposed_price ?> </a>tk</h4>  

											
												
												<span class="freelancer-detail-item"><i class="icon-feather-phone"></i><?php echo $mobile_number?> </span>

											
												

												
												<div class="buttons-to-right always-visible margin-top-25 margin-bottom-5">
													<a href="gig_details.php?gig_id=<?php echo $gig_id?>"  class="button ripple-effect"><i class="icon-feather-file-text"></i> Gig Details </a>
													<a href="#small-dialog-3" class="popup-with-zoom-anim button dark ripple-effect"><i class="icon-feather-mail"></i> Job done</a>
													
												</div>
											</div>
										</div>
									</div>
								</li>
								<?php  
                                 }
								?>


                                   
                                






								
								
								

							
								
								
									<?php while($row_post_gig = mysqli_fetch_array($res_post_gig) ){ 

                                      $gig_title = $row_post_gig['gig_title'];
                                      $gig_id = $row_post_gig['id'];

                                     
                                 

                                     

                                    
									?>
								<li>
									<!-- Overview -->
									<div class="freelancer-overview manage-candidates">
										<div class="freelancer-overview-inner">

											<!-- Avatar -->
											

											<!-- Name -->
											<div class="freelancer-name">
												<h4><strong>Your posted gig</strong></h4>
												<h4>Gig Title: <strong><?php echo $gig_title ?></strong></h4>
												

											
												
												

											
												

												
												<div class="buttons-to-right always-visible margin-top-25 margin-bottom-5">
													<a href="gig_details.php?gig_id=<?php echo $gig_id?>"   class="button ripple-effect"><i class="icon-feather-file-text"></i> Gig Details </a>

                                                 <a  href="edit_gig.php?gig_id=<?php echo $gig_id ?>"  class="button ripple-effect"> Edit</a>
													<a href="javascript:;" onclick="remove_gig(<?php echo $gig_id ?>)" class="button gray ripple-effect ico" title="Remove Gig" data-tippy-placement="top"><i class="icon-feather-trash-2"></i></a>
													
													
												</div>
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
				</div>

			</div>
			<!-- Row / End -->

			<!-- Footer -->
			<div class="dashboard-footer-spacer"></div>
			
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
<div id="small-dialog-2" class="zoom-anim-dialog mfp-hide dialog-with-tabs">

	<!--Tabs -->
	<div class="sign-in-form">

		<ul class="popup-tabs-nav">
		</ul>

		<div class="popup-tabs-container">

			<!-- Tab -->
			<div class="popup-tab-content" id="tab2">
				
				<!-- Welcome Text -->
				<div class="welcome-text">
					<h3>Leave a Review</h3>
					
				</div>
					
				<!-- Form -->
				

					
					
					<div class="feedback-yes-no">
						<strong>Your Rating</strong>
						<div class="leave-rating">
							<input type="radio" name="rating" id="rating-radio-1" value="5" required>
							<label for="rating-radio-1" class="icon-material-outline-star"></label>
							<input type="radio" name="rating" id="rating-radio-2" value="4"  required>
							<label for="rating-radio-2" class="icon-material-outline-star"></label>
							<input type="radio" name="rating" id="rating-radio-3" value="3"  required>
							<label for="rating-radio-3" class="icon-material-outline-star"></label>
							<input type="radio" name="rating" id="rating-radio-4" value="2"  required>
							<label for="rating-radio-4" class="icon-material-outline-star"></label>
							<input type="radio" name="rating" id="rating-radio-5" value="1"  required>
							<label for="rating-radio-5" class="icon-material-outline-star"></label>
						</div><div class="clearfix"></div>
					</div>

					<textarea class="with-border" placeholder="Comment" name="message2" id="comment" cols="7" required></textarea>

				
				
				<!-- Button -->
				<button onclick="review_client()" class="button full-width button-sliding-icon ripple-effect" type="button" form="leave-review-form">Leave a Review <i class="icon-material-outline-arrow-right-alt"></i></button>

			</div>

		</div>
	</div>
</div>


<div id="small-dialog-3" class="zoom-anim-dialog mfp-hide dialog-with-tabs">

	<!--Tabs -->
	<div class="sign-in-form">

		<ul class="popup-tabs-nav">
		</ul>

		<div class="popup-tabs-container">

			<!-- Tab -->
			<div class="popup-tab-content" id="tab2">
				
				<!-- Welcome Text -->
				<div class="welcome-text">
					<h3>Leave a Review</h3>
					
				</div>
					
				<!-- Form -->
				

					
					
					<div class="feedback-yes-no">
						<strong>Your Rating</strong>
						<div class="leave-rating">
							<input type="radio" name="rating" id="rating-radio-1" value="5" required>
							<label for="rating-radio-1" class="icon-material-outline-star"></label>
							<input type="radio" name="rating" id="rating-radio-2" value="4"  required>
							<label for="rating-radio-2" class="icon-material-outline-star"></label>
							<input type="radio" name="rating" id="rating-radio-3" value="3"  required>
							<label for="rating-radio-3" class="icon-material-outline-star"></label>
							<input type="radio" name="rating" id="rating-radio-4" value="2"  required>
							<label for="rating-radio-4" class="icon-material-outline-star"></label>
							<input type="radio" name="rating" id="rating-radio-5" value="1"  required>
							<label for="rating-radio-5" class="icon-material-outline-star"></label>
						</div><div class="clearfix"></div>
					</div>

					<textarea class="with-border" placeholder="Comment" name="message2" id="comment" cols="7" required></textarea>

				
				
				<!-- Button -->
				<button onclick="review_freelancer()" class="button full-width button-sliding-icon ripple-effect" type="button" form="leave-review-form">Leave a Review <i class="icon-material-outline-arrow-right-alt"></i></button>

			</div>

		</div>
	</div>
</div>


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
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


<script type="text/javascript">

	 function review_client()
	 {  
	 	var client_id = $("#client_id").val();
	 	var rating = $("input[name='rating']:checked").val();
	 		var freelancer_id = $("#freelancer_id").val();
	 			var gig_id = $("#gig_id").val();

	 	var comment = $("#comment").val();
	 	 var formData= new FormData();
         formData.append('rating',rating);
          formData.append('comment',comment);
          formData.append('client_id',client_id);
           formData.append('freelancer_id',freelancer_id);
           formData.append('gig_id',gig_id);
          formData.append("review_client","review_client");
          $.ajax({
      processData: false,
      contentType: false,
      url:"backend/rating_from_gig.php",
      type:"POST",
      data:formData,
      success:function(data,status){
         
         swal({
  title: "You accept this gig offer",
 
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


	  function review_freelancer()
	 {  
	 	var client_id = $("#client_id").val();
	 	var rating = $("input[name='rating']:checked").val();
	 		var freelancer_id = $("#freelancer_id").val();
	 			var gig_id = $("#gig_id").val();

	 	var comment = $("#comment").val();
	 	 var formData= new FormData();
         formData.append('rating',rating);
          formData.append('comment',comment);
          formData.append('client_id',client_id);
           formData.append('freelancer_id',freelancer_id);
           formData.append('gig_id',gig_id);
          formData.append("review_freelancer","review_freelancer");
          $.ajax({
      processData: false,
      contentType: false,
      url:"backend/rating_from_gig.php",
      type:"POST",
      data:formData,
      success:function(data,status){
         
         swal({
  title: "You accept this gig offer",
 
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



	
     function accept_gig(gig_apply_id,gig_id)
     {
       var formData= new FormData();
    formData.append('gig_apply_id',gig_apply_id);
    formData.append('gig_id',gig_id);


   
 
    formData.append("accept_gig","accept_gig");
      
     
    $.ajax({
      processData: false,
      contentType: false,
      url:"backend/bid_gig_accept.php",
      type:"POST",
      data:formData,
      success:function(data,status){
         
         swal({
  title: "You accept this gig offer",
 
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

     function accept_bid(bid_id,job_id)
     {
         
     var formData= new FormData();
    formData.append('bid_id',bid_id);
    formData.append('job_id',job_id);


   
 
    formData.append("accept_bid","accept_bid");
      
     
    $.ajax({
      processData: false,
      contentType: false,
      url:"backend/bid_gig_accept.php",
      type:"POST",
      data:formData,
      success:function(data,status){
         
         swal({
  title: "You accept this bid",
 
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

     function remove_gig(gig_id)
     {
     	var formData= new FormData();
    formData.append('gig_id',gig_id);
    


   
 
    formData.append("remove_gig","remove_gig");
      
     
    $.ajax({
      processData: false,
      contentType: false,
      url:"backend/bid_gig_accept.php",
      type:"POST",
      data:formData,
      success:function(data,status){
         
         swal({
  title: "You removed this gig",
 
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

     function remove_bid(bid_id)
     {
     	 var formData= new FormData();
    formData.append('bid_id',bid_id);
    


   
 
    formData.append("remove_bid","remove_bid");
      
     
    $.ajax({
      processData: false,
      contentType: false,
      url:"backend/bid_gig_accept.php",
      type:"POST",
      data:formData,
      success:function(data,status){
         
         swal({
  title: "You removed this bid",
 
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
</script>


</body>

<!-- Mirrored from www.vasterad.com/themes/hireo/dashboard-messages.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 09 Mar 2019 13:32:59 GMT -->
</html>