    

        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<meta name="description" content="overview &amp; stats" />
     <!-- Favicons -->
  <link href="<?php echo base_url(); ?>assets/images/favicon.png" rel="icon">
  <link href="<?php echo base_url(); ?>assets/img/apple-touch-icon.png" rel="apple-touch-icon">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<?php echo link_tag('assets/css/bootstrap.min.css'); ?>
		<!-- bootstrap & fontawesome -->
		<?php echo link_tag('assets/font-awesome/4.5.0/css/font-awesome.min.css');  ?>
		<!-- text fonts -->
		<?php echo link_tag('assets/css/fonts.googleapis.com.css');  ?>
		<!-- ace styles -->
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style">
		<?php echo link_tag('assets/css/select2.min.css');  ?>
    <?php echo link_tag('assets/css/style.css');  ?>
		<?php echo link_tag('assets/css/ace-skins.min.css');  ?>
		<?php echo link_tag('assets/css/ace-rtl.min.css'); ?>
		<?php echo link_tag('assets/css/bootstrap-datepicker3.css') ?>
    <?php echo link_tag('assets/css/bootstrap-multiselect.min.css') ?>
    <?php echo link_tag('assets/css/popuo-box.css') ?>
    <?php echo link_tag('assets/css/colorbox.css') ?>
    <?php echo link_tag('assets/css/JiSlider.css') ?>
    <?php //echo link_tag('assets/css/editor.css');  ?>
		<style>
			#loader{
				    z-index: 9999;
    position: absolute;
    top: 0;
    bottom: 0;
    right: 0;
    left: 0;
    background-color: #ffffffab;
    display: flex;
    justify-content: center;
    align-items: center;
			}
.loader {
  border: 16px solid #f3f3f3;
  border-radius: 50%;
  border-top: 16px solid #3498db;
  width: 120px;
  height: 120px;
      position: absolute;
    top: 250px;
  -webkit-animation: spin 2s linear infinite; /* Safari */
  animation: spin 2s linear infinite;
}

/* Safari */
@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
</style>
<style type="text/css">
  .vertical { 
            border-left: 1px dotted #E2E2E2;; 
            height: 50px; 
            position:absolute; 
            left: 45%; 
        } 
  .verticals { 
            border-left: 1px dotted #E2E2E2;; 
            height: 250px; 
            position:absolute; 
            left: 45%; 
        } 
  .line { 
            border-left: 1px dotted #E2E2E2;; 
            height: 32px; 
            position:absolute; 
            left: 26%; 
        } 
</style>