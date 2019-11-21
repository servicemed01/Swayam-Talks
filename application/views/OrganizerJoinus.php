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
		<title>Swayamtalk | Join Us as Organizer</title>
		<!-- CSS FILE -->
<?php include("Css.php"); ?>
<!-- // CSS FILE -->
<!-- JS FILE -->
<?php include("Js.php"); ?>
<!-- //JS FILE -->
<script src="<?php echo base_url('assets/dashboard-js/Joinus.js'); ?>"></script> 
	</head>

	<body class="no-skin">
		<!-- Loader -->
		<div id="loader">
		<div  class="loader"></div>
		</div>
		<!-- //Loader -->
<!-- Sidebar -->
<?php include('Sidebar.php'); ?>
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
							<li class="active">Organizer</li>
						</ul><!-- /.breadcrumb -->
					</div>
<!-- setting -->
<?php include('setting.php'); ?>
<!-- setting -->


						<div class="page-header">
							<h1>
								 Join Us
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									Organizer
								</small>
							</h1>
						</div><!-- /.page-header -->
						<!-- Organizer -->
								<div class="row">
									<div class="col-xs-12">
										
										<div class="table-header">
											Organizer List
										</div>

										<!-- div.table-responsive -->

										<!-- div.dataTables_borderWrap -->
										<div>
											<table id="dynamic-table" class="table table-striped table-bordered table-hover">
												<thead>
													<tr>
														<th class="center">Sr No.</th>
														<th class="center">Name</th>
														<th class="center">Email Id</th>
														<th class="center">Mobile</th>
														<th class="center">Organization Name</th>
														<th class="center">Address</th>
														<th class="hidden"></th>
													</tr>
												</thead>
												<tbody id="OrganizerJoinus"></tbody>
												
												</table>
											</div>
										</div><!-- /.modal-content -->
									</div><!-- /.modal-dialog -->
						<!-- //Organizer -->
		  <!-- Footer -->
    <?php include("Footer.php"); ?>
    <!-- //Footer -->		

	</body>
</html>
