<!--
Author: Kshitija Swami
-->
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
if(!$this->session->has_userdata('adminId'))
{	
	$Login=base_url()."Dashboard/Admin";
    header("location: $Login");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Swayamtalk | Speakers</title>
		<!-- CSS FILE -->
<?php include("Css.php"); ?>
<!-- // CSS FILE -->
<!-- JS FILE -->
<?php include("Js.php"); ?>
<!-- //JS FILE -->
<script src="<?php echo base_url('assets/dashboard-js/Speaker.js'); ?>"></script> 
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
								<a href="<?php echo base_url();?>Dashboard/Admin/ShowSpeakers">Speaker List</a>
							</li>
							<li class="active">Speakers</li>
						</ul><!-- /.breadcrumb -->
					</div>
<!-- setting -->
<?php include("setting.php"); ?>
<!-- setting -->


						<div class="page-header">
							<h1>
								 Speakers
								 <small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									Speakers
								</small>								
							</h1>
							<!-- Note -->
						<div class="note"><b>Note:</b><span class="error"> * </span> Fields are Mandatory.  </div>
						</div><!-- /.page-header -->
						<!--Speakers -->
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
			   <label class="col-sm-3 no-padding-right" for="name">Speaker Name: <span class="error"> * </span> </label>
				<div class="col-xs-12 col-sm-9">
				<?php echo form_input(['type' => 'text','name' => 'name','id' => 'name','class' => 'validation col-xs-12 col-sm-5 col-md-10 sepcialChar','placeholder'=> ' Enter Speaker Name','required'=>'true']); ?>
		</div>
	</div>
	<div class="vertical"></div>
		<div class="form-group col-md-6">
		<label class=" col-xs-12 col-sm-3 no-padding-right" for="contact">Speaker Name (मराठी): <span class="error"> * </span> </label>
		<div class="col-xs-12 col-sm-9">
		<?php echo form_input(['type' => 'text','name' => 'name_M','id' => 'name_M','class' => 'validation col-xs-12 col-sm-5 col-md-10 sepcialChar','placeholder'=> ' स्पीकर चे नाव','required'=>'true']); ?>
		</div>
	</div>
</div>
<div class="space-4"></div>
	<div class="col-md-12">
		<div class="form-group col-md-6">
		<label class=" col-xs-12 col-sm-3 no-padding-right" for="address">About Speaker: <span class="error"> * </span> </label>
		<div class="col-xs-12 col-sm-9">
		<?php echo form_textarea(['name'=>'about','id'=>'about','placeholder'=>'Enter About Speaker','class'=>'validation col-xs-12 col-sm-5 col-md-10 sepcialChar','required'=>'true']); ?>
		</div>
	</div>
		<div class="verticals"></div>
		<div class="form-group col-md-6">
		<label class=" col-xs-12 col-sm-3 no-padding-right" for="about">About Speaker (मराठी): <span class="error"> * </span> </label>
		<div class="col-xs-12 col-sm-9"> 
		<?php echo form_textarea(['name'=>'about_M','id'=>'about_M','placeholder'=>'स्पीकर ची माहिती','class'=>'validation col-xs-12 col-sm-5 col-md-10 sepcialChar','required'=>'true']); ?>
		</div>
	</div>
  </div>
	<div class="space-4"></div>
	<div class="col-md-12">
		<div class="form-group col-md-6">												
		<label class=" col-xs-12 col-sm-3 no-padding-right" for="email">Email Address:</label>
		<div class="col-xs-12 col-sm-9">
		<?php echo form_input(['type' => 'email','name' => 'email','class' => 'col-xs-12 col-sm-5 col-md-10','placeholder'=> ' Enter Email Address','id' => 'email']); ?>
		</div>
		</div>
	<div class="vertical"></div>
		<div class="form-group col-md-6">
		<label class=" col-xs-12 col-sm-3 no-padding-right" for="contact">Contact No: <span class="error"> * </span> </label>
		<div class="col-xs-12 col-sm-9">
		<?php echo form_input(['type' => 'number','name' => 'mobile','class' => 'validation col-xs-12 col-sm-5 col-md-10','placeholder'=> ' Enter Contact Number','id' => 'mobile','required'=>'true']); ?>
		</div>
	</div>
</div>
	<div class="space-4"></div>
	<div class="col-md-12">
		<div class="form-group col-md-6">
			   <label class="col-sm-3 no-padding-right" for="dob"> Date of Birth: <span class="error"> * </span>  </label>
				<div class="col-xs-12 col-sm-9">
				<?php echo form_input(['type' => 'date','name' => 'dob','class' => 'validation col-xs-12 col-sm-5 col-md-10','placeholder'=> ' Enter Full Date of Birth','id' => 'dob','required'=>'true']); ?>
				</div>	
		</div>
	<div class="vertical"></div>
		<div class="form-group col-md-6">
			   <label class="col-sm-3 no-padding-right" for="dob"> Website: </label>
				<div class="col-xs-12 col-sm-9">
				<?php echo form_input(['type' => 'text','name' => 'website','class' => 'col-xs-12 col-sm-5 col-md-10','placeholder'=> ' Enter your Website','id' => 'website']); ?>
				</div>	
		</div>
	</div>
		<div class="space-4"></div>
		<div class="col-md-12">
		<div class="form-group col-md-6">
			   <label class="col-sm-3 no-padding-right" for="dob"> Referance : <span class="error"> * </span>  </label>
				<div class="col-xs-12 col-sm-9 downdrop">
				<select id="referance1" class="validation">
						<option>Select Referance</option>
						<option value="By Any Person">By Any Person</option>
						<option value="By Any Media">By Any Media</option>
						<option value="By Internet / Social Platform">By Internet / Social Platform</option>
						<option value="Other">Other</option>
				</select>
				</div>	
		</div>
		<div class="vertical"></div>
		<div class="form-group col-md-6">
			   <label class="col-sm-3 no-padding-right" for="dob"> Other: </label>
				<div class="col-xs-12 col-sm-9">
				<?php echo form_input(['type' => 'text','name' => 'referance2','class' => 'col-xs-12 col-sm-5 col-md-10','placeholder'=> ' Enter your Referance Name','id' => 'referance2']); ?> 
				</div>	
		</div>
	</div>
  <div class="space-4"></div>
  <div class="col-md-12">
		<div class="form-group col-md-6">
			   <label class="col-sm-3 no-padding-right" for="dob"> Awards: </label>
				<div class="col-xs-12 col-sm-9">
				<?php echo form_input(['type' => 'text','name' => 'awards','class' => 'col-xs-12 col-sm-5 col-md-10 sepcialChar','placeholder'=> ' Enter your Awards','id' => 'awards']); ?>
				</div>	
		</div>
	<div class="vertical"></div>
		<div class="form-group col-md-6">
		<label class=" col-xs-12 col-sm-3 no-padding-right" for="profile">Profile Image (960px X 390px) Max. 2 MB:  <span class="error"> * </span> </label>
		<div class="col-xs-12 col-sm-9">
		<div class="clearfix">
		<?php echo form_upload(['name'=>'profile','id'=>'profile','class'=>' input-xlarge col-xs-12 col-sm-5 col-md-10']); ?>
		<!-- <div class="note"><b>Note:</b> Image is compulsory. </div> -->
		</div>
		</div>
	</div>
		<div class="clearfix form-actions col-md-12">
		<div class="col-md-6">
		<button class="btn btn-info" type="button" id="submitSpeaker">
		<i class="ace-icon fa fa-check bigger-110"></i>
		Submit
		</button>
		</div>
		<div class="col-md-6">
		<button class="btn btn-info" type="button" id="updateSpeaker" >
		<i class="ace-icon fa fa-edit bigger-110"></i>
		Update
		</button>
		</div>
		</div>
		
	</div>
						<!-- //Speakers -->
	<!-- Footer -->
    <?php //include("Footer.php"); ?>
    <!-- //Footer -->
	</body>
</html>
