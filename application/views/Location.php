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
		<title>Swayamtalk | City</title>
		<!-- CSS FILE -->
<?php include("Css.php"); ?>
<!-- // CSS FILE -->
<!-- JS FILE -->
<?php include("Js.php"); ?>
<!-- //JS FILE -->
<script src="<?php echo base_url('assets/dashboard-js/Location.js'); ?>"></script> 
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
							<li class="active">City</li>
						</ul><!-- /.breadcrumb -->
					</div>
<!-- setting -->
<?php include("setting.php"); ?>
<!-- setting -->


						<div class="page-header">
							<h1>
								 City
								 <small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									City
								</small>
							</h1>
							<!-- Note -->
						<div class="note"><b>Note:</b><span class="error"> * </span> Fields are Mandatory.  </div>
						</div><!-- /.page-header -->
						<!--Location -->
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
			   <label class="col-sm-3 control-label no-padding-right" for="name">City Name: <span class="error"> * </span>  </label>
				<div class="col-xs-12 col-sm-9">
				<?php echo form_input(['type' => 'text','name' => 'locationName','id' => 'locationName','class' => 'validation col-xs-12 col-sm-5 col-md-10 sepcialChar','placeholder'=> ' Enter City Name']); ?>
		</div>
	</div>
	<div class="vertical"></div>
	<div class="form-group col-md-6">
			   <label class="col-sm-3 control-label no-padding-right" for="name">City Name (मराठी): <span class="error"> * </span>  </label>
				<div class="col-xs-12 col-sm-9">
				<?php echo form_input(['type' => 'text','name' => 'locationName_M','id' => 'locationName_M','class' => ' validation col-xs-12 col-sm-5 col-md-10 sepcialChar','placeholder'=> ' Enter City Name']); ?>
		</div>
	</div>
</div>
		<div class="clearfix form-actions col-md-12">
		<div class="col-md-6">
		<button class="btn btn-info" type="button" id="submitLocation">
		<i class="ace-icon fa fa-check bigger-110"></i>
		Submit
		</button>
		</div>
		<div class="col-md-6">
		<button class="btn btn-info" type="button" id="updateLocation" >
		<i class="ace-icon fa fa-edit bigger-110"></i>
		Update
		</button>
		</div>
		</div>
	</div>
						<!-- //City -->

<!-- City List -->
								<div class="row">
									<div class="col-xs-12">
										<!-- <div class="clearfix">
											<div class="pull-right tableTools-container"></div>
										</div> -->
										<div class="table-header">
											City List
										</div>

										<!-- div.table-responsive -->

										<!-- div.dataTables_borderWrap -->
										<div>
											<table id="dynamic-table" class="table table-striped table-bordered table-hover">
												<thead>
													<tr>
														<th class="center">Sr No.</th>
														<th class="center">City Name</th>
														<th class="hidden"></th>
														<th class="hidden"></th>						
														<th class="hidden"></th>
														<th class="hidden"></th>
														<th></th>
													</tr>
												</thead>
												<tbody id="locationData"></tbody>
												</table>
											</div>
										</div><!-- /.modal-content -->
									</div><!-- /.modal-dialog -->

						<!-- // Location List -->
		  <!-- Footer -->
    <?php include("Footer.php"); ?>
    <!-- //Footer -->		

	</body>
</html>
