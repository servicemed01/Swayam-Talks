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
		<title>Swayamtalk | Gallery</title>
		<!-- CSS FILE -->
<?php include("Css.php"); ?>
<!-- // CSS FILE -->
<!-- JS FILE -->
<?php include("Js.php"); ?>
<!-- //JS FILE -->
<script src="<?php  echo base_url('assets/dashboard-js/SwayamGallery.js'); ?>"></script> 
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
								<a href="<?php echo base_url();?>Dashboard/Admin/ShowGallery">Gallery List</a>
							</li>
							<li class="active">Gallery</li>
						</ul><!-- /.breadcrumb -->
					</div>
<!-- setting -->
<?php include("setting.php"); ?>
<!-- setting -->


						<div class="page-header">
							<h1>
								 Gallery
								 <small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									Gallery
								</small>
							</h1>
							<!-- Note -->
						<div class="note"><b>Note:</b><span class="error"> * </span> Fields are Mandatory.  </div>
						</div><!-- /.page-header -->
						<!--Gallery -->
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
			   <label class="col-sm-3 control-label no-padding-right" for="Gallery Title"></label>
				<div class="col-xs-12 col-sm-9">
				<?php echo form_input(['type' => 'hidden','name' => 'galleryTitle','class' => 'col-xs-12 col-sm-5 sepcialChar','placeholder'=> ' Enter Gallery Title','id'=>'galleryTitle','value'=>'Swayam Gallery']); ?>
		</div>
	</div>
	<div class="space-4"></div>
		<div class="form-group">
			   <label class="col-sm-3 control-label no-padding-right" for="Gallery Type"> Gallery Type:<span class="error"> * </span>  </label>
				<div class="col-xs-12 col-sm-9">
				<select id="galleryType" class="validation">
						<option>Select Gallery Type</option>
						<!--<option value="Past Events">Past Events</option>-->
						<option value="Swayam Moment">Swayam Moment</option>
						<option value="Swayam Behind Scence">Swayam Behind Scence</option>
						<!--<option value="Swayam Social">Swayam Social</option>-->
						<option value="Press">Press</option>
				</select>
				</div>	
		</div>
		<div class="form-group">
			   <label class="col-sm-3 control-label no-padding-right" for="Gallery Images">Gallery Images (Max. 2 MB):<span class="error"> * </span>  </label>
				<div class="col-xs-12 col-sm-9"><br>
				<div class="col-md-8"><input name="galleryImage[]" id="galleryImage" type="file">
					<br>
					<?php echo form_input(['type' => 'text','name' => 'galleryImageName[]','class' => 'col-xs-12 col-sm-5 sepcialChar','placeholder'=> 'Enter Image Title','id'=>'galleryImageName']); ?>
				</div>
                <div class="col-md-4"><a href="javascript:void(0);" class="add">Add More</a></div>
                        <div class="contents"></div>
                        <div class="height10"></div>
		</div>
	</div>
		<div class="clearfix form-actions">
		<div class="col-md-offset-3 col-md-9">
		<button class="btn btn-info" type="buton" id="SubmitGallery">
		<i class="ace-icon fa fa-check bigger-110"></i>
		Submit
		</button>
		</div>
		</div>
 </div>
						<!-- //Gallery -->
	  <!-- Footer -->
    <?php //include("Footer.php"); ?>
    <!-- //Footer -->		


	</body>
</html>
