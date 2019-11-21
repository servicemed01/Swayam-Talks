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
		<title>Swayamtalk | FAQ</title>
		<!-- CSS FILE -->
<?php include("Css.php"); ?>
<!-- // CSS FILE -->
<!-- JS FILE -->
<?php include("Js.php"); ?>
<!-- //JS FILE -->
<script src="<?php echo base_url('assets/dashboard-js/Faq.js'); ?>"></script> 
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
							<li><a href="<?php echo base_url();?>Dashboard/Admin/ShowFaq">FAQ List</a></li>
							<li class="active">FAQ</li>
						</ul><!-- /.breadcrumb -->
					</div>
<!-- setting -->
<?php include("setting.php"); ?>
<!-- setting -->


						<div class="page-header">
							<h1>
								 FAQ
								 <small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									FAQ
								</small>
							</h1>
						</div><!-- /.page-header -->
						<!--FAQ -->
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
		<div class="form-group">
		<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="about">FAQ Question:</label>
		<div class="col-xs-12 col-sm-9">
		<div class="clearfix">
		<?php echo form_textarea(['name'=>'question','id'=>'question','placeholder'=>'Enter FAQ Question','class'=>'input-xlarge col-xs-12 col-sm-5']); ?>
		</div>
		</div>
	</div>
	<div class="space-4"></div>
	<div class="form-group">
		<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="about">FAQ Answer:</label>
		<div class="col-xs-12 col-sm-9">
		<div class="clearfix">
		<?php echo form_textarea(['name'=>'answer','id'=>'answer','placeholder'=>'Enter FAQ Answer','class'=>'input-xlarge col-xs-12 col-sm-5']); ?>
		</div>
		</div>
	</div>
		<div class="clearfix form-actions">
		<div class="col-md-offset-3 col-md-9">
		<button class="btn btn-info" type="button" id="submitFaq">
		<i class="ace-icon fa fa-check bigger-110"></i>
		Submit
		</button>
		</div>
		</div>
	</div>
						<!-- //FAQ -->
     <!-- Footer -->
    <?php include("Footer.php"); ?>
    <!-- //Footer -->		

	</body>
</html>
