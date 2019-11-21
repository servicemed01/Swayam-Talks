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
		<title>Swayamtalk | Category</title>
		<!-- CSS FILE -->
<?php include("Css.php"); ?>
<!-- // CSS FILE -->
<!-- JS FILE -->
<?php include("Js.php"); ?>
<!-- //JS FILE -->
<script src="<?php echo base_url('assets/dashboard-js/Category.js'); ?>"></script>
<script src="<?php echo base_url('assets/dashboard-js/Location.js'); ?>"></script> 


	</head>
	<body class="no-skin">
	<!-- Loader -->
		<div id="loader">
		<div  class="loader"></div>
		</div>
		<!-- //Loader -->
<!-- sidebar -->
<?php include("sidebar.php"); ?>
<!-- //sidebar -->
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

							<!-- <li>
								<a href="#">Update</a>
							</li> -->
							<li class="active">Category / Location</li>
						</ul><!-- /.breadcrumb -->
					</div>
<!-- setting -->
<?php include "setting.php"; ?>
<!-- setting -->
		
<div class="row">
									<div class="col-sm-12">
										<div class="widget-box transparent" id="recent-box">
											<div class="widget-header">
												<div class="widget-toolbar no-border">
													<ul class="nav nav-tabs" id="recent-tab">
														<li class="active">
															<a data-toggle="tab" href="#category-tab">Category</a>
														</li>

														<li>
															<a data-toggle="tab" href="#location-tab">Location</a>
														</li>
													</ul>
												</div>
											</div>

											<div class="widget-body">
												<div class="widget-main padding-4">
													<div class="tab-content padding-8">
														<div id="category-tab" class="tab-pane active">
															<div class="page-header">
							<h1>
								 Category
								 <small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									Category
								</small>
							</h1>
						</div><!-- /.page-header -->
						<!--Category -->
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
	<div class="form-horizontal" >
		<div class="form-group">
			   <label class="col-sm-3 control-label no-padding-right" for="name">Category: </label>
				<div class="col-xs-12 col-sm-9">
				<?php echo form_input(['type' => 'text','name' => 'categoryName','id' => 'categoryName','class' => 'col-xs-12 col-sm-5','placeholder'=> ' Enter Category']); ?>
		</div>
	</div>
		<div class="clearfix form-actions">
		<div class="col-md-offset-3 col-md-9">
		<button class="btn btn-info" type="buton" id="SubmitCat">
		<i class="ace-icon fa fa-check bigger-110"></i>
		Submit
		</button>
		&nbsp; &nbsp; &nbsp;
		<button class="btn" type="cancle" name="reset" id="reset">
		<i class="ace-icon fa fa-undo bigger-110"></i>
		Reset
		</button>
		</div>
		</div>
 </div>
						<!-- //Category -->

<!-- Category List -->
								<div class="row">
									<div class="col-xs-12">
										<!-- <div class="clearfix">
											<div class="pull-right tableTools-container"></div>
										</div> -->
										<div class="table-header">
											Category List
										</div>

										<!-- div.table-responsive -->

										<!-- div.dataTables_borderWrap -->
										<div>
											<table id="dynamic-table" class="table table-striped table-bordered table-hover">
												<thead>
													<tr>
														<th class="center">Sr No.</th>
														<th class="center">Category Name</th>
														<th class="hidden"></th>
														<th class="hidden"></th>						
														<th class="hidden"></th>
														<th class="hidden"></th>
														<th></th>
													</tr>
												</thead>
												<tbody id="categoryData"></tbody>		
												</table>
											</div>
										</div><!-- /.modal-content -->
									</div><!-- /.modal-dialog -->

						<!-- // Category List -->
														</div><!-- /.#category-tab -->

														<div id="location-tab" class="tab-pane">
															

						<div class="page-header">
							<h1>
								 Location
								 <small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									Location
								</small>
							</h1>
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
		<div class="form-group">
			   <label class="col-sm-3 control-label no-padding-right" for="name">Location: </label>
				<div class="col-xs-12 col-sm-9">
				<?php echo form_input(['type' => 'text','name' => 'locationName','id' => 'locationName','class' => 'col-xs-12 col-sm-5','placeholder'=> ' Enter Location']); ?>
		</div>
	</div>
		<div class="clearfix form-actions">
		<div class="col-md-offset-3 col-md-9">
		<button class="btn btn-info" type="button" id="submitLocation">
		<i class="ace-icon fa fa-check bigger-110"></i>
		Submit
		</button>
		&nbsp; &nbsp; &nbsp;
		<button class="btn" type="cancle" name="reset" id="reset">
		<i class="ace-icon fa fa-undo bigger-110"></i>
		Reset
		</button>
		</div>
		</div>
	</div>
						<!-- //Location -->

<!-- Location List -->
								<div class="row">
									<div class="col-xs-12">
										<!-- <div class="clearfix">
											<div class="pull-right tableTools-container"></div>
										</div> -->
										<div class="table-header">
											Location List
										</div>

										<!-- div.table-responsive -->

										<!-- div.dataTables_borderWrap -->
										<div>
											<table id="dynamic-table" class="table table-striped table-bordered table-hover">
												<thead>
													<tr>
														<th class="center">Sr No.</th>
														<th class="center">Location Name</th>
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
								</div>
			</div><!-- /.main-content -->

						<!-- // Location List -->
														</div><!-- /.#location-tab -->
													</div>
												</div><!-- /.widget-main -->
											</div><!-- /.widget-body -->
										</div><!-- /.widget-box -->
									</div><!-- /.col -->
									</div><!-- /.col -->
								</div><!-- /.row -->
	</body>
</html>
