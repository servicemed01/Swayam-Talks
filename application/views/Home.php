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
		<title>Swayamtalk | Home</title>
		<!-- CSS FILE -->
<?php include("Css.php"); ?>
<!-- // CSS FILE -->
<!-- JS FILE -->
<?php include("Js.php"); ?>
<script src="<?php echo base_url();?>/assets/dashboard-js/Home.js"></script>
<!-- //JS FILE -->

	</head>

	<body class="no-skin">
<!-- Sidebar -->
<?php include("Sidebar.php"); ?>
<!-- //Sidebar -->		

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
								<a href="#">Home</a>
							</li>
							<li class="active">Dashboard</li>
						</ul><!-- /.breadcrumb -->
					</div>
<!-- setting -->
<?php include ("setting.php"); ?>
<!-- setting -->


						<div class="page-header">
							<h1>
								Dashboard
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									Statastics
								</small>
							</h1>
						</div><!-- /.page-header -->
							<!--  Dashboard -->
							      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3 id="viewers">Counting...</h3>
              <p>Total Video Views</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="<?php echo base_url().'Dashboard/Admin/ShowVideos' ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3 id="videos">Counting...</h3>
              <p>Total Videos</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="<?php echo base_url().'Dashboard/Admin/ShowVideos' ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3 id="users">Counting...</h3>
              <p>Total Users</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="<?php echo base_url().'Dashboard/Admin/Users' ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3 id="newusers">Counting...</h3>
              <p>New Users</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="<?php echo base_url().'Dashboard/Admin/Users' ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
	<div class="hr hr32 hr-dotted"></div>
						<div class="row">
							<div class="col-xs-12" style="padding:0px;">
								<!-- PAGE CONTENT BEGINS -->
								<div style="/*border: 1px solid blue;*/ width: 500px; height: 500px;" class="col-md-2 col-sm-4 col-xs-12">
									<div class="widget-box">
											<div class="widget-header widget-header-flat widget-header-small">
												<h5 class="widget-title">
													<i class="ace-icon fa fa-signal"></i>
													Most Visited Category
												</h5>
											</div>

											<div class="widget-body">
												<div class="widget-main">
													<div id="catchart"></div>
												</div><!-- /.widget-main -->
											</div><!-- /.widget-body -->
										</div><!-- /.widget-box -->
										<!-- Join Us -->
                                       <div class="widget-box transparent col-md-12 col-sm-4 col-xs-12 ">
											<div class="widget-header widget-header-flat">
												<h4 class="widget-title lighter">
													<i class="ace-icon fa fa-user-plus"></i>
													Join Us
												</h4>

												<div class="widget-toolbar">
													<a href="#" data-action="collapse">
														<i class="ace-icon fa fa-chevron-up"></i>
													</a>
												</div>
											</div>

											<div class="widget-body">
												<div class="widget-main padding-4">
													<div class="col-md-6 col-sm-4 col-xs-12 infobox-containers">
										<div class="infobox infobox-purple infobox-smalls infobox-dark">
											<div class="infobox-icon">
												<h3 class="datatitle" id="countsponsor">0</h3>
											</div>

											<div class="infobox-datas">
												<div style="font-size: 14px">Join Us</div>
												<div style="font-size:25px;">Sponsor</div>
											</div>
										</div>

										<div class="infobox infobox-blue infobox-smalls infobox-dark">
											<div class="infobox-icon">
												<h3 class="datatitle" id="countOrganizer">0</h3>
											</div>

											<div class="infobox-datas">
												<div style="font-size: 14px">Join US</div>
												<div style="font-size:25px;">Organizer</div>
											</div>
										</div>
								</div>
								<div class="vspace-12-sm"></div>
								<div class="col-md-6 col-sm-4 col-xs-12 infobox-containers">

										<div class="infobox infobox-red infobox-smalls infobox-dark">
											<div class="infobox-icon">
												<h3 class="datatitle" id="countAudiance">0</h3>
											</div>

											<div class="infobox-datas">
												<div style="font-size: 14px">Join Us</div>
												<div style="font-size:25px;">Audiance</div>
											</div>
										</div>
										<div class="infobox infobox-green infobox-smalls infobox-dark">
											<div class="infobox-icon">
												<h3 class="datatitle" id="countSpeaker">0</h3>
											</div>

											<div class="infobox-datas">
												<div style="font-size: 14px">Join Us</div>
												<div style="font-size:25px;">Speaker</div>
											</div>
										</div>
									</div>
												</div><!-- /.widget-main -->
											</div><!-- /.widget-body -->
										</div><!-- /.widget-box -->							
									<!-- //Join Us -->										
								</div>

							<div style="/*border: 5px solid #3f927f;*/width: 550px; height: 450px;" class="col-md-2 col-sm-4 col-xs-12">
									<div  id="tabledata" style="width: 100%; height: 100%;">
										<div class="widget-box transparent">
											<div class="widget-header widget-header-flat">
												<h4 class="widget-title lighter">
													<i class="ace-icon fa fa-star orange"></i>
													Popular Videos
												</h4>

												<div class="widget-toolbar">
													<a href="#" data-action="collapse">
														<i class="ace-icon fa fa-chevron-up"></i>
													</a>
												</div>
											</div>

											<div class="widget-body">
												<div class="widget-main no-padding">
													<table class="table table-bordered table-striped">
														<thead class="thin-border-bottom">
															<tr>
																<th>
																	<i class="ace-icon fa fa-caret-right blue"></i>Sr No.
																</th>

																<th>
																	<i class="ace-icon fa fa-caret-right blue"></i>Video Name
																</th>

																<th class="hidden-480">
																	<i class="ace-icon fa fa-caret-right blue"></i>Views
																</th>
															</tr>
														</thead>

														<tbody id="video-views"></tbody>
													</table>
												</div><!-- /.widget-main -->
											</div><!-- /.widget-body -->
										</div><!-- /.widget-box -->								
									</div>
								</div>
								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
						<!--  // dashboard -->
						
							
			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>
		<!-- basic scripts -->
	<!-- Footer -->
    <?php //include("Footer.php"); ?>
    <!-- //Footer -->	
	</body>
</html>

