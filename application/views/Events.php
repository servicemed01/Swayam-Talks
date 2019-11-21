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
		<title>Swayamtalk | Events</title>
		<!-- CSS FILE -->
<?php include("Css.php"); ?>
<!-- // CSS FILE -->
<!-- JS FILE -->
<?php include("Js.php"); ?>
<!-- //JS FILE -->
<script src="<?php echo base_url('assets/dashboard-js/Events.js'); ?>"></script> 
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
							<a href="<?php echo base_url();?>Dashboard/Admin/ShowEvents">Events List</a>
							</li>
							<li class="active" >Events</li>
						</ul><!-- /.breadcrumb -->
					</div>
<!-- setting -->
<?php include("setting.php"); ?>
<!-- setting -->


						<div class="page-header">
							<h1>
								 Events
								 <small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									Events
								</small>
							</h1>
							<!-- Note -->
						<div class="note"><b>Note:</b><span class="error"> * </span> Fields are Mandatory.  </div>
						</div><!-- /.page-header -->
						<!--Events -->
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
			   <label class="col-sm-3  no-padding-right" for="dob"> City: <span class="error"> * </span>  </label>
				<div class="col-xs-12 col-sm-9 ">
				<select id="locationId" class=" col-md-10 downdrop ">
			<option>Select City</option>
		</select>
		</div>
	</div>
		<div class="vertical"></div>
		<div class="form-group col-md-6">
			   <label class="col-sm-3  no-padding-right" for="dob"> Speakers: <span class="error"> * </span>  </label>
				<div class="col-xs-12 col-sm-9">
				<select id="speakerId" class="speakerId col-md-10 downdrop  " multiple="">
						<option>Select Speaker</option>
				</select>
				</div>	
		</div>
	</div>
	<div class="space-4"></div>
		<div class="col-md-12">
		<div class="form-group col-md-6">
			   <label class="col-sm-3  no-padding-right" for="dob"> Sponsor: <span class="error"> * </span>  </label>
				<div class="col-xs-12 col-sm-9">
				<select id="sponserId" class="sponserId col-md-10 downdrop ">
						<option>Select Sponsor</option>
				</select>
				</div>	
		</div>
		<div class="vertical"></div>
		<div class="form-group col-md-6">
		<label class=" col-xs-12 col-sm-3 no-padding-right" for="profile">Event Date: <span class="error"> * </span> </label>
		<div class="col-xs-12 col-sm-9">
		<?php echo form_input(['type' => 'date','name' => 'eventDate','class' => 'validation col-xs-12 col-sm-5 col-md-10','placeholder'=> ' Enter Event Date','id'=>'eventDate']); ?>
		</div>
	</div>
	</div>
		<div class="space-4"></div>
	<div class="col-md-12">
		<div class="form-group col-md-6">
			   <label class="col-sm-3  no-padding-right" for="name">Event Name: <span class="error"> * </span> </label>
				<div class="col-xs-12 col-sm-9">
				<?php echo form_input(['type' => 'text','name' => 'eventTitle','class' => 'validation col-xs-12 col-sm-5 col-md-10 sepcialChar','placeholder'=> ' Enter Event Name','id'=>'eventTitle']); ?>
		</div>
	</div>
	<div class="vertical"></div>
		<div class="form-group col-md-6">
			   <label class="col-sm-3  no-padding-right" for="name">Event Name (मराठी): <span class="error"> * </span> </label>
				<div class="col-xs-12 col-sm-9">
				<?php echo form_input(['type' => 'text','name' => 'eventTitle_M','class' => 'validation col-xs-12 col-sm-5 col-md-10 sepcialChar','placeholder'=> 'कार्यक्रमाचे नाव','id'=>'eventTitle_M']); ?>
		        </div>
	    </div>
	</div>
	<div class="space-4"></div>
	<div class="col-md-12">
		<div class="form-group col-md-6">
		<label class=" col-xs-12 col-sm-3 no-padding-right" for="about">Event Description: <span class="error"> * </span> </label>
		<div class="col-xs-12 col-sm-9">
		<?php echo form_textarea(['name'=>'eventDescription','id'=>'eventDescription','placeholder'=>'Enter Event Description','class'=>'validation col-xs-12 col-sm-5 col-md-10 sepcialChar']); ?>
		</div>
	</div>
	    <div class="verticals"></div>
		<div class="form-group col-md-6">
		<label class=" col-xs-12 col-sm-3 no-padding-right" for="about">Event Description (मराठी): <span class="error"> * </span> </label>
		    <div class="col-xs-12 col-sm-9">
		<?php echo form_textarea(['name'=>'eventDescription_M','id'=>'eventDescription_M','placeholder'=>'कार्यक्रमाची माहिती','class'=>'validation col-xs-12 col-sm-5 col-md-10 sepcialChar']); ?>
		    </div>
	    </div>
	</div>
	<div class="space-4"></div>
	<div class="col-md-12">
		<div class="form-group col-md-6">
		<label class=" col-xs-12 col-sm-3 no-padding-right" for="profile">Event Image (960px X 390px) Max. 2 MB: <span class="error"> * </span> </label>
		<div class="col-xs-12 col-sm-9">
		<div class="clearfix">
		<?php echo form_upload(['name'=>'eventImage','id'=>'eventImage','class'=>' input-xlarge col-xs-12 col-sm-5']); ?>
		</div>
		</div>
	</div>
	<div class="verticals"></div>
		<div class="form-group col-md-6">
		<label class=" col-xs-12 col-sm-3 no-padding-right" for="about">Event Address: <span class="error"> * </span> </label>
		    <div class="col-xs-12 col-sm-9">
		<?php echo form_textarea(['name'=>'eventAddress','id'=>'eventAddress','placeholder'=>'Event Address','class'=>'validation col-xs-12 col-sm-5 col-md-10 sepcialChar']); ?>
		<!-- <div class="note"><b>Note:</b> Image is compulsory. </div> -->
		    </div>
	    </div>
	</div>
	<div class="space-4"></div>
	<div class="form-group">
			   <label class="col-sm-3  no-padding-right" for="name">Event Ticket Booking Url: <span class="error"> * </span>  </label>
				<div class="col-xs-12 col-sm-9">
				<?php echo form_input(['type' => 'text','name' => 'eventTicket','class' => 'validation col-xs-12 col-sm-5 col-md-10 sepcialChar','placeholder'=> 'Enter Event Ticket Booking Url','id'=>'eventTicket']); ?>
		        </div>
	    </div>
		<div class="clearfix form-actions col-md-12">
		<div class="col-md-6">
		<button class="btn btn-info" type="button" id="submitEvents">
		<i class="ace-icon fa fa-check bigger-110"></i>
		Submit
		</button>
		</div>
		<div class="col-md-6">
		<button class="btn btn-info" type="button" id="updateEvents" >
		<i class="ace-icon fa fa-edit bigger-110"></i>
		Update
		</button>
		</div>
		</div>
		
	</div>
						<!-- //Events -->
	<!-- Footer -->
    <?php //include("Footer.php"); ?>
    <!-- //Footer -->		

	</body>
</html>
 