<?php
@ob_start();
if(session_status()!=PHP_SESSION_ACTIVE) session_start();
  
  
 
  include ("connection.php");
  include("page_content/header.php");
  if($user_id == NULL || $user_id =="")
{
   header("location:login.php"); 
}  
 $sender_id = $user_id;
  
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
							<li class="active"><a href="see_notification.php"><i class="icon-material-outline-question-answer"></i> Notificaton <span class="nav-tag"><?php echo $total_notification ?></span></a></li>

							<li ><a href="manage_job.php"><i class="icon-material-outline-question-answer"></i> Manage Job </a></li>

							<li ><a href="manage_bid.php"><i class="icon-material-outline-question-answer"></i> Manage Bid </a></li>

							<li ><a href="manage_gig.php"><i class="icon-material-outline-question-answer"></i> Manage Gig </a></li>

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
								<?php while($row_bid = mysqli_fetch_array($res_bid) ){ 
									  $bid_id = $row_bid['bid_id'];
                                      $freelancer_id = $row_bid['user_id'];
                                      $job_id =$row_bid['job_id'];
                                      $bidding_price = $row_bid['bidding_price'];
                                      $work_duration = $row_bid['work_duration'];
                                      $sql = "SELECT * from user where id = $freelancer_id";
                                      $res = mysqli_query($conn,$sql);
                                      $row = mysqli_fetch_array($res);
                                      $name = $row['name'];
                                      $rating = $row['rating']; 
                                      $mobile_number = $row['mobile_number'];
                                      $msg = $row_bid['bidding_message'];
                                      $sql_job = "select * from job where id = $job_id";
                                      $res_job = mysqli_query($conn,$sql_job);
                                      $row_job = mysqli_fetch_array($res_job);

                                      $job_title = $row_job['job_title'];

                                      $receiver_id = $freelancer_id;
                                      $work_id = $job_id;



									?>
								<li>
									<!-- Overview -->
									<div class="freelancer-overview manage-candidates">
										<div class="freelancer-overview-inner">

											<!-- Avatar -->
											

											<!-- Name -->
											<div class="freelancer-name">
												<h4><strong><?php echo $job_title ?></strong></h4>
												<h4><a href="#" style="color:blue"><?php echo $name ?> </a> is bidding your job at <?php echo $bidding_price?>tk within <?php echo $work_duration ?> days </h4>

												<!-- Details -->
												
												<span class="freelancer-detail-item"><i class="icon-feather-phone"></i><?php echo $mobile_number?> </span>

												<!-- Rating -->
												<div class="freelancer-rating">
													<div class="star-rating" data-rating="<?php echo $rating ?>"></div>
												</div>

												<br>

												<p><?php echo $msg ?></p>

												<!-- Buttons -->
												<div class="buttons-to-right always-visible margin-top-25 margin-bottom-5">
													<a href="javascript:;" onclick="accept_bid(<?php echo $bid_id ?>,<?php echo $job_id ?>);"  class="button ripple-effect"><i class="icon-feather-file-text"></i> Accept</a>
													<a href="javascript:;" onclick="message(<?php echo $sender_id ?>,<?php echo $receiver_id?>,<?php echo $work_id ?>)" class="popup-with-zoom-anim button dark ripple-effect"><i class="icon-feather-mail"></i> Send Message</a>
													<a href="javascript:;" onclick="remove_bid(<?php echo $bid_id ?>)" class="button gray ripple-effect ico" title="Remove Bid" data-tippy-placement="top"><i class="icon-feather-trash-2"></i></a>
												</div>
											</div>
										</div>
									</div>
								</li>
								<?php  

                                 }

								?>

								<?php while($row_gig = mysqli_fetch_array($res_gig) ){ 

                                         $user_id = $row_gig['employee_id'];
                                         $gig_id = $row_gig['gig_id'];
                                         $gig_apply_id = $row_gig['id'];
                                         $proposed_rate = $row_gig['proposed_rate'];
                                         $proposed_duration = $row_gig['proposed_duration'];
                                      $sql = "SELECT * from user where id = $user_id";
                                      $res = mysqli_query($conn,$sql);
                                      $row = mysqli_fetch_array($res);
                                      $name = $row['name'];
                                      $rating = $row['rating']; 
                                      $mobile_number = $row['mobile_number'];
                                      $msg = $row_gig['message'];
                                      $sql_gig = "select * from gig where id = $gig_id";
                                        $res_gig = mysqli_query($conn,$sql_gig);
                                      $row_gig = mysqli_fetch_array($res_gig);

                                      $gig_title = $row_gig['gig_title'];
									?>
								<li>
									<!-- Overview -->
									<div class="freelancer-overview manage-candidates">
										<div class="freelancer-overview-inner">

											<!-- Avatar -->
											

											<!-- Name -->
											<div class="freelancer-name">

													<h4><strong><?php echo $gig_title ?></strong></h4>
												<h4><a href="#"  style="color:blue"><?php echo $name ?> </a> Interested your gig at <?php echo $proposed_rate ?>tk within <?php echo $proposed_duration?> days  </h4>



												<!-- Details -->
												
												<span class="freelancer-detail-item"><i class="icon-feather-phone"></i><?php echo $mobile_number?> </span>

												<!-- Rating -->
												<div class="freelancer-rating">
													<div class="star-rating" data-rating="<?php echo $rating ?>"></div>
												</div>
												<br>

												<p><?php echo $msg ?></p>

												<!-- Buttons -->
												<div class="buttons-to-right always-visible margin-top-25 margin-bottom-5">
													<a href="javascript:;" onclick='accept_gig(<?php echo $gig_apply_id ?>,<?php echo $gig_id ?>)' class="button ripple-effect"><i class="icon-feather-file-text"></i> Accept</a>
												
													<a href="javascript:;" onclick="remove_gig(<?php echo $gig_apply_id ?>)" class="button gray ripple-effect ico" title="Remove gig" data-tippy-placement="top"><i class="icon-feather-trash-2"></i></a>
												</div>
											</div>
										</div>
									</div>
								</li>
								<?php  
                                 }
								?>


								<?php while($row_bid_accept = mysqli_fetch_array($res_bid_accept) ){ 
                                         $bid_id = $row_bid_accept['bid_id'];
                                         $client_id = $row_bid_accept['job_given_id'];
                                         $job_id = $row_bid_accept['job_id'];
                                         $bidding_price = $row_bid_accept['bidding_price'];
                                      $sql = "SELECT * from user where id = $client_id";
                                      $res = mysqli_query($conn,$sql);
                                      $row = mysqli_fetch_array($res);
                                      $name = $row['name'];

                                      $sql_job = "select * from job where id = $job_id";
                                      $res_job = mysqli_query($conn,$sql_job);
                                      $row_job = mysqli_fetch_array($res_job);

                                      $job_title = $row_job['job_title'];

                                      // $rating = $row['rating']; 
                                      // $mobile_number = $row['mobile_number'];
                                      // $msg = $row_gig['message'];
                                      // $sql_gig = "select * from gig where id = $gig_id";
                                      //   $res_gig = mysqli_query($conn,$sql_gig);
                                      // $row_gig = mysqli_fetch_array($res_gig);

                                      // $gig_title = $row_gig['gig_title'];
									?>
								<li>
									<!-- Overview -->
									<div class="freelancer-overview manage-candidates">
										<div class="freelancer-overview-inner">

											<!-- Avatar -->
											

											<!-- Name -->
											<div class="freelancer-name">

													
												<h4><a href="#"  style="color:blue"><?php echo $name ?> </a> accepted your bid </h4>

												<h4><strong>Job title: </strong><?php echo $job_title ?> </h4>
												<h4><strong>Accepted Price: </strong><?php echo $bidding_price ?> </h4>




												<!-- Details -->
												
												

												<!-- Buttons -->

												<div class="buttons-to-right always-visible margin-top-25 margin-bottom-5">
													<a href="job_detail.php?job_id=<?php echo $job_id ?>"   class="button ripple-effect"><i class="icon-feather-file-text"></i> Job Details </a>
													<a href="javascript:;" onclick="remove_notification(<?php echo $bid_id ?>)" class="button gray ripple-effect ico" title="Remove gig" data-tippy-placement="top"><i class="icon-feather-trash-2"></i></a>
												
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
   function message(sender_id,receiver_id,work_id)
   {
   	 window.location.href = 'chat.php?sender_id='+sender_id+'& receiver_id='+receiver_id+'& work_id='+work_id;
   }

	function remove_notification(bid_id)
	{
		 var formData= new FormData();
    formData.append('bid_id',bid_id);
    formData.append('remove_notification',"remove_notification");


    $.ajax({
      processData: false,
      contentType: false,
      url:"backend/bid_gig_accept.php",
      type:"POST",
      data:formData,
      success:function(data,status){
         
        
  location.reload();
        

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
    formData.append("bid_id",bid_id);
    formData.append('job_id',job_id);

    //alert(job_id);




   
 
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

     function remove_gig(gig_apply_id)
     {
     	var formData= new FormData();
    formData.append('gig_apply_id',gig_apply_id);
    


   
 
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