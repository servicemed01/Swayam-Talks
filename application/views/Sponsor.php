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
		<title>Swayamtalk | Sponsor</title>
		<!-- CSS FILE -->
<?php include("Css.php"); ?>
<!-- // CSS FILE -->
<!-- JS FILE -->
<?php include("Js.php"); ?>
<!-- //JS FILE -->
<script src="<?php echo base_url('assets/dashboard-js/Sponser.js'); ?>"></script> 
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
								<a href="Home">Home</a>
							</li>

							<li>
								<a href="<?php echo base_url();?>Dashboard/Admin/ShowSponsor">Sponsor List</a>
							</li>
							<li class="active">Sponsor</li>
						</ul><!-- /.breadcrumb -->
					</div>
<!-- setting -->
<?php include("setting.php"); ?>
<!-- setting -->


						<div class="page-header">
							<h1>
								 Sponsor
								 <small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									Sponsor
								</small>
							</h1>
							<!-- Note -->
						<div class="note"><b>Note:</b><span class="error"> * </span> Fields are Mandatory.  </div>
						</div><!-- /.page-header -->
						<!--Sponsor -->
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
			   <label class="col-sm-3 control-label no-padding-right" for="name">Sponsor Name: <span class="error"> * </span>  </label>
				<div class="col-xs-12 col-sm-9">
				<?php echo form_input(['type' => 'text','name' => 'sponserName','class' => 'validation col-xs-12 col-sm-5 sepcialChar','placeholder'=> ' Enter Sponser Name','id'=>'sponserName']); ?>
		</div>
	</div>
	<div class="space-4"></div>
		<div class="form-group">
		<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="profile">Image (Max. 2 MB): <span class="error"> * </span>  </label>
		<div class="col-xs-12 col-sm-9">
		<div class="clearfix">
		<?php echo form_upload(['name'=>'sponserImage','id'=>'sponserImage','class'=>' input-xlarge col-xs-12 col-sm-5']); ?>
		<!-- <div class="note"><b>Note:</b> Image is compulsory. </div> -->
		</div>
		</div>
	</div>
		<div class="space-4"></div>
		<div class="form-group">
		<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="about">City Name: <span class="error"> * </span>  </label>
		<div class="col-xs-12 col-sm-9 downdrop">
		<div class="clearfix">
		<select id="locationId" class="validation">
			<option>Select City</option>
		</select>
		</div>
		</div>
	</div>
		<div class="clearfix form-actions col-md-12">
		<div class="col-md-6">
		<button class="btn btn-info" type="button" id="submitSponser">
		<i class="ace-icon fa fa-check bigger-110"></i>
		Submit
		</button>
		</div>
		<div class="col-md-6">
		<button class="btn btn-info" type="button" id="updateSponser" >
		<i class="ace-icon fa fa-edit bigger-110"></i>
		Update
		</button>
		</div>
		</div>
	</div>
						<!-- //Sponsor -->
	  <!-- Footer -->
    <?php //include("Footer.php"); ?>
    <!-- //Footer -->		

	</body>
</html>