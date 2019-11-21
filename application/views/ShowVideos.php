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
							<li class="active">Videos List</li>
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
						</div><!-- /.page-header -->
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

<!-- Video List -->
								<div class="row">
									<div class="col-xs-12">
										<div class="modal-footer" style="background: #fff;border-top: 0px solid #e5e5e5;">			
												<!-- <select id="Vtype" class="col-md-10" style="float: left;    border: 1.5px solid #3f927f;max-width: 150px;" >
												<option value="Swayam Talks" selected>Swayam Talks</option>
												<option value="Swayam Stories">Swayam Stories</option>
											</select> -->

													<a href="<?php echo base_url();?>Dashboard/Admin/Videos" style="color: #fff;"><button class="btn btn-sm btn-success pull-right">
												<i class="ace-icon fa fa-search-plus bigger-130"></i> Add Videos</button></a>
												
											</div>
											

										<div class="table-header">
											Video List
										</div>

										<!-- div.table-responsive -->

										<!-- div.dataTables_borderWrap -->
										<div>
											<table id="dynamic-table" class="table table-striped table-bordered table-hover">
												<thead>
													<tr>
														<th class="center">Sr No.</th>
														<th class="center">Video Name</th>
														<th class="center">Video Photo</th>
														<th class="center">Video</th>						
														<th class="center">Video Description </th>
														<th class="center">Speaker Name</th>
														<th></th>
													</tr>
												</thead>
												<tbody id="videoData"></tbody>
												</table>
											</div>
											
										</div><!-- /.modal-content -->
									</div><!-- /.modal-dialog -->
						<!-- // Video List -->
    <!-- Footer -->
    <?php include("Footer.php"); ?>
    <!-- //Footer -->

</body>
</html>

