<!--
Author: Kshitija Swami
-->
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Swayamtalk | Blog</title>
		<!-- CSS FILE -->
<?php include("Css.php"); ?>
<!-- // CSS FILE -->
<!-- JS FILE -->
<?php include("Js.php"); ?>
<script src="https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>
<!-- //JS FILE -->
<script src="<?php echo base_url('assets/dashboard-js/Blogs.js'); ?>"></script>
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
								<a href="<?php echo base_url();?>Dashboard/Admin/ShowBlogs">Blogs List</a>
							</li>
							<li class="active">Blog</li>
						</ul><!-- /.breadcrumb -->
					</div>
<!-- setting -->
<?php include("setting.php"); ?>
<!-- setting -->


						<div class="page-header">
							<h1>
								 Blog
								 <small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									Blog
								</small>
							</h1>
								<!-- Note -->
						<div class="note"><b>Note:</b><span class="error"> * </span> Fields are Mandatory.  </div>
						</div><!-- /.page-header -->
						<!--Blog -->
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
			   <label class="col-sm-3  no-padding-right" for="name">Blog Name: <span class="error"> * </span></label>
				<div class="col-xs-12 col-sm-9">
				<?php echo form_input(['type' => 'text','name' => 'blogTitle','class' => 'validation col-xs-12 col-sm-5 col-md-10 sepcialChar','placeholder'=> ' Enter Blog Name/Title','id' => 'blogTitle']); ?>
		</div>
	</div>
	<div class="vertical"></div>
		<div hidden class="form-group col-md-6">
			   <label class="col-sm-3  no-padding-right" for="name">Blog Name (मराठी):<span class="error"> * </span>   </label>
				<div class="col-xs-12 col-sm-9">
				<?php echo form_input(['type' => 'text','name' => 'blogTitle_M','class' => 'validation col-xs-12 col-sm-5 col-md-10 sepcialChar','placeholder'=> 'विडियो चे नाव','id' => 'blogTitle_M']); ?>
		</div>
	</div>
</div>
<div class="space-4"></div>
		<div class="form-group ">
		<label class=" col-xs-12 col-sm-3 no-padding-right" for="about">Blog Description:<span class="error"> * </span></label>
		<div class="col-xs-12 col-sm-9">
		<?php echo form_textarea(['name'=>'blogDescription','id'=>'blogDescription','placeholder'=>'Enter Blog ','class'=>'validation col-xs-12 col-sm-5 col-md-10 sepcialChar']); ?>	
		</div>
	</div>
		<div hidden class="form-group ">
		<label class=" col-xs-12 col-sm-3 no-padding-right" for="about">Blog Description (मराठी):<span class="error"> * </span>  </label>
		<div class="col-xs-12 col-sm-9">
		<?php  echo form_textarea(['name'=>'content','id'=>'blogDescription_M','placeholder'=>'इथे ब्लॉग लिहा ','class'=>'validation col-xs-12 col-sm-5 col-md-10 sepcialChar ']); ?>

		<!-- <div class="wysiwyg-editor" id="blogDescription_M"></div> -->

		</div>
	</div>
	<div class="space-4"></div>
	<div class="col-md-12">		
		<div class="form-group col-md-6">
		<label class=" col-xs-12 col-sm-3 no-padding-right" for="profile">Photo (Max. 2 MB [960px X 390px]): </label>
		<div class="col-xs-12 col-sm-9">
		<div class="clearfix">
		<?php echo form_upload(['name'=>'image','id'=>'image','class'=>'input-xlarge col-xs-12 col-sm-5']); ?>
		</div>
		</div>
	</div>
</div>
<div class="space-4"></div>
	<div class="col-md-12">
		<div class="form-group col-md-6">
			   <label class="col-sm-3  no-padding-right" for="name">Video URL: </label>
				<div class="col-xs-12 col-sm-9">
				<?php echo form_input(['type' => 'url','name' => 'blogVideoUrl','class' => 'col-xs-12 col-sm-5 col-md-10','placeholder'=> ' Enter Video Url','id' => 'blogVideoUrl']); ?>
		</div>
	</div>
	<div class="vertical"></div>
		 <div class="form-group col-md-6">
			   <label class="col-sm-3  no-padding-right" for="name">Video (Max. 10 MB) : </label>
				<div class="col-xs-12 col-sm-9">
				<?php echo form_upload(['name' => 'blogVideo','class' => 'col-xs-12 col-sm-5 col-md-10 ','id' => 'blogVideo']); ?>
		</div>
	</div> 
</div>
	
		<div class="clearfix form-actions col-md-12">
		<div class="col-md-6">
		<button class="btn btn-info" type="button" id="submitBlog">
		<i class="ace-icon fa fa-check bigger-110"></i>
		Submit
		</button>
		</div>
		<div class="col-md-6">
		<button class="btn btn-info" type="button" id="updateBlog" >
		<i class="ace-icon fa fa-edit bigger-110"></i>
		Update
		</button>
		</div>
		</div>
	</div>
	
					<!-- //Blog -->
	<!-- Footer -->
    <?php //include("Footer.php"); ?>
    <!-- //Footer -->
	<script>
						CKEDITOR.replace( 'blogDescription' );
					
						
                </script>
	</body>
</html>