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
		<title>Swayamtalk | Banner</title>	
		<!-- CSS FILE -->
<?php include("Css.php"); ?>
<!-- // CSS FILE -->
<!-- JS FILE -->
<?php include("Js.php"); ?>
<!-- //JS FILE -->
<script src="<?php echo base_url('assets/dashboard-js/Banner.js'); ?>"></script> 	
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
							<li class="active">Banner</li>
						</ul><!-- /.breadcrumb -->
					</div>
<!-- setting -->
<?php include("setting.php"); ?>
<!-- setting -->


						<div class="page-header">
							<h1>
								 Banner
								 <small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									Banner
								</small>
							</h1>
							<!-- Note -->
						<div class="note"><b>Note:</b><span class="error"> * </span> Fields are Mandatory.  </div>
						</div><!-- /.page-header -->
						<!--Banner -->
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
			   <label class="col-sm-3 control-label no-padding-right" for="Banner Type"> Banner Type: <span class="error"> * </span> </label>
				<div class="col-xs-12 col-sm-9">
				<select id="bannerType" class="validation">
						<option>Select Banner Type</option>
						<option value="Talks">Talks</option>
						<option value="Stories">Stories</option>
				</select>
				</div>	
		</div>
		<div class="space-4"></div>
		<div class="form-group">
			   <label class="col-sm-3 control-label no-padding-right" for="Banner Type"> Video: <span class="error"> * </span> </label>
				<div class="col-xs-12 col-sm-9">
				<select id="videoId" class="validation">
			<option>Select Video</option>
		</select>
				</div>	
		</div>
		<div class="space-4"></div>
		<div class="form-group">
			   <label class="col-sm-3 control-label no-padding-right" for="name">Banner Photo: (Max. 5 MB) <span class="error"> * </span> </label>
				<div class="col-xs-12 col-sm-9">
				<?php echo form_upload(['name'=>'bannerPhoto','id'=>'bannerPhoto','class'=>' input-xlarge col-xs-12 col-sm-5']); ?>
				<!-- <div class="note"><b>Note:</b> Image is compulsory. </div> -->
		</div>
	</div>
		<div class="clearfix form-actions">
		<div class="col-md-offset-3 col-md-9">
		<button class="btn btn-info" type="button" id="submitBanner">
		<i class="ace-icon fa fa-check bigger-110"></i>
		Submit
		</button>
		</div>
		</div>
	</div>
						<!-- //Banner -->

						<!-- Banner List -->
								<div class="row">
									<div class="col-xs-12">
										<!-- <div class="clearfix">
											<div class="pull-right tableTools-container"></div>
										</div> -->
										<div class="table-header">
											Banner List
										</div>

										<!-- div.table-responsive -->

										<!-- div.dataTables_borderWrap -->
										<div>
											<table id="dynamic-table" class="table table-striped table-bordered table-hover">
												<thead>
													<tr>
														<th class="center">Sr No.</th>
														<th class="center">Banner Type</th>
														<th class="center">Banner</th>													
														<td class="hidden"></td>						
														<td class="hidden"></td>
														<td class="hidden"></td>
														<th></th>
													</tr>
												</thead>
												<tbody id="bannerData">	
												</tbody>		
												</table>
											</div>
										</div><!-- /.modal-content -->
									</div><!-- /.modal-dialog -->
						<!-- // Banner List -->
	<!-- Footer -->
    <?php include("Footer.php"); ?>
    <!-- //Footer -->
		
	</body>
</html>
