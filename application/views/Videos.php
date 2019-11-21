<!--
Author: Kshitija Swami
-->
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Swayamtalk | Video</title>
		<!-- CSS FILE -->
<?php include("Css.php"); ?>
<!-- // CSS FILE -->
<!-- JS FILE -->
<?php include("Js.php"); ?>
<!-- //JS FILE -->
<script src="<?php echo base_url('assets/dashboard-js/Videos.js'); ?>"></script> 
	</head>
	<body class="no-skin">
		<!-- Loader -->
		<div id="loader">
		<div  class="loader"></div>
		</div>
		<!-- //Loader -->
<!-- Sidebar -->
<?php include("Sidebar.php"); ?>
<!-- //Sidebar -->
<!-- form -->
<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
					<i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
				</div>
		</div>
			<div class="main-content">
				<div class="main-content-inner">
					<div class="breadcrumbs ace-save-state" id="breadcrumbs">
						<ul class="breadcrumb">
							<li>
								<i class="ace-icon fa fa-home home-icon"></i>
								<a href="<?php echo base_url();?>Dashboard/Admin/Home">Home</a>
							</li>
							<li>
								<a href="<?php echo base_url();?>Dashboard/Admin/ShowVideos">Videos List</a>
							</li>
							<li class="active">Video</li>
						</ul><!-- /.breadcrumb -->
					</div>
<!-- setting -->
<?php include("setting.php"); ?>
<!-- setting -->


						<div class="page-header">
							<h1>
								 Video
								 <small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									Video
								</small>
							</h1>
							<!-- Note -->
						<div class="note"><b>Note:</b><span class="error"> * </span> Fields are Mandatory.  </div>
						</div><!-- /.page-header -->
						<!--Video -->
						 <!--  Alert Message   -->
	                          <div id="alert">
										<div id="alertbox" class="alert alert-danger">
											<button type="button" class="close" data-dismiss="alert">
												<i class="ace-icon fa fa-times"></i>
											</button>
											<strong id="alertType"></strong>
											<span id="alertMsg"></span>
											<br />
										</div>
						         </div>
						         <!--  //Alert Message   -->
						<!-- PAGE CONTENT BEGINS -->
	<div class="form-horizontal">
		<div class="col-md-12">
		<div class="form-group col-md-6">
		<label class=" col-xs-12 col-sm-3 no-padding-right" for="about">Category Name:<span class="error"> * </span>  </label>
		<div class="col-xs-12 col-sm-9">
		<select id="categoryId" class="col-md-10 downdrop">
			<option>Select Category</option>
		</select>
		</div>
	</div>
	<div class="vertical"></div>
		<div class="form-group col-md-6">
		<label class=" col-xs-12 col-sm-3 no-padding-right" for="about">City Name: <span class="error"> * </span>  </label>
		<div class="col-xs-12 col-sm-9">
		<select id="locationId" class="col-md-10 downdrop">
			<option>Select City</option>
		</select>
		</div>
	</div>
</div>
<div class="space-4"></div>
<div class="col-md-12">	
		<div class="form-group col-md-6">
		<label class=" col-xs-12 col-sm-3 no-padding-right" for="about">Speaker Name: <span class="error"> * </span>  </label>
		<div class="col-xs-12 col-sm-9">
		<select id="speakerId" class="col-md-10 downdrop">
			<option>Select Speaker</option>
		</select>
		</div>
	</div>
	<div class="vertical"></div>
		<div class="form-group col-md-6">
		<label class=" col-xs-12 col-sm-3 no-padding-right" for="about">Video Type: <span class="error"> * </span>  </label>
		<div class="col-xs-12 col-sm-9">
		<select id="videoType" class="col-md-10">
			<option>Select Video Type</option>
			<option value="Swayam Talks">Swayam Talks</option>
			<option value="Swayam Stories">Swayam Stories</option>
		</select>
		</div>
	</div>
</div>
<div class="space-4"></div>
<div id="eventDiv" style="display: none;">
<div class="col-md-12">	
  <div class="form-group col-md-6" >
		<label class=" col-xs-12 col-sm-3 no-padding-right" for="about">Event Name: <span class="error"> * </span>  </label>
		<div class="col-xs-12 col-sm-9">
		<select id="eventId" class=" col-md-10 downdrop">
			<option>Select Event</option>
		</select>
		</div>
	</div>
	<div class="verticals"></div>
		<div class="form-group col-md-6">
		<label class=" col-xs-12 col-sm-3 no-padding-right" for="about">Is this Video Interview: <span class="error"> * </span>  </label>
		<div class=" col-xs-12 col-sm-9">
			<input type="radio" name="videoInterview" class="videoInterview" value="true"> Yes
			<input type="radio" name="videoInterview" class="videoInterview" value="false" checked> No
	</div>
	</div>
</div>
</div>
<div class="space-4"></div>
	<div class="col-md-12">
		<div class="form-group col-md-6">
			   <label class="col-sm-3  no-padding-right" for="dob"> Video Url: <span class="error"> * </span>   </label>
				<div class="col-xs-12 col-sm-9">
				<?php echo form_input(['type' => 'url','name' => 'videoPath','class' => 'validation col-xs-12 col-sm-5 col-md-10','placeholder'=> ' Enter your Video Url','id' => 'videoPath']); ?>
				</div>	
		</div>
		<div class="vertical"></div>
		<div class="form-group col-md-6">
			   <label class="col-sm-3  no-padding-right" for="dob"> Keywords: </label>
				<div class="col-xs-12 col-sm-9">
				<?php echo form_input(['type' => 'text','name' => 'keywords','class' => 'col-xs-12 col-sm-5 col-md-10 sepcialChar','placeholder'=> ' Enter your Keywords','id' => 'keywords','value'=>'Swayamtalks']); ?>
				</div>	
		</div>
	</div>
	<div class="space-4"></div>
	<div class="col-md-12">
		<div class="form-group col-md-6">
			   <label class="col-sm-3  no-padding-right" for="name">Video Name: <span class="error"> * </span>   </label>
				<div class="col-xs-12 col-sm-9">
				<?php echo form_input(['type' => 'text','name' => 'videoName','class' => 'validation col-xs-12 col-sm-5 col-md-10 sepcialChar','placeholder'=> ' Enter Video Name/Title','id' => 'videoName']); ?>
		</div>
	</div>
	<div class="vertical"></div>
		<div class="form-group col-md-6">
			   <label class="col-sm-3  no-padding-right" for="name">Video Name (मराठी): <span class="error"> * </span>   </label>
				<div class="col-xs-12 col-sm-9">
				<?php echo form_input(['type' => 'text','name' => 'videoName_M','class' => 'validation col-xs-12 col-sm-5 col-md-10 sepcialChar','placeholder'=> 'व्हिडिओ चे नाव','id' => 'videoName_M']); ?>
		</div>
	</div>
</div>
	<div class="space-4"></div>
	<div class="col-md-12">
		<div class="form-group col-md-6">
		<label class=" col-xs-12 col-sm-3 no-padding-right" for="about">Video Description: <span class="error"> * </span>  </label>
		<div class="col-xs-12 col-sm-9">
		<?php echo form_textarea(['name'=>'videoDescription','id'=>'videoDescription','placeholder'=>'Enter Video Description','class'=>'validation col-xs-12 col-sm-5 col-md-10 sepcialChar']); ?>
		</div>
	</div>
	<div class="verticals"></div>
		<div class="form-group col-md-6">
		<label class=" col-xs-12 col-sm-3 no-padding-right" for="about">Video Description (मराठी): <span class="error"> * </span>  </label>
		<div class="col-xs-12 col-sm-9">
		<?php echo form_textarea(['name'=>'videoDescription_M','id'=>'videoDescription_M','placeholder'=>'व्हिडिओ ची माहिती ','class'=>'validation col-xs-12 col-sm-5 col-md-10 sepcialChar']); ?>
		</div>
	</div>
</div>
	<div class="space-4"></div>
		<div class="form-group">
		<label class=" col-xs-12 col-sm-3 no-padding-right" for="profile">Photo (960px X 390px) Max. 2 MB:  <span class="error"> * </span>  </label>
		<div class="col-xs-12 col-sm-9">
		<?php echo form_upload(['name'=>'photo','id'=>'photo','class'=>' input-xlarge col-xs-12 col-sm-5']); ?>
		<!-- <div class="note"><b>Note:</b> Image is compulsory. </div> -->
		</div>	
</div>
		<div class="clearfix form-actions col-md-12">
		<div class="col-md-6">
		<button class="btn btn-info" type="button" id="submitVideo">
		<i class="ace-icon fa fa-check bigger-110"></i>
		Submit
		</button>
		</div>
		<div class="col-md-6">
		<button class="btn btn-info" type="button" id="updateVideo" >
		<i class="ace-icon fa fa-edit bigger-110"></i>
		Update
		</button>
		</div>
		</div>
	</div>
						<!-- //Video -->

	<!-- Footer -->
    <?php //include("Footer.php"); ?>
    <!-- //Footer -->
	</body>
</html>