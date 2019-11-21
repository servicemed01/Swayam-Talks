<div id="navbar" class="navbar navbar-default ace-save-state navbar-fixed-top">
			<div class="navbar-container ace-save-state" id="navbar-container">
				<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
					<span class="sr-only">Toggle sidebar</span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>
				</button>

				<div class="navbar-header pull-left">
					<a href="" class="navbar-brand">
						<small>
							<img src="<?php echo base_url(); ?>/assets/images/logo.png" height="30px">
						</small>
					</a>
				</div>

				<div class="navbar-buttons navbar-header pull-right" role="navigation">
					<ul class="nav ace-nav">
						<li class="light-blue dropdown-modal">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
								
								<span class="user-info">
									<small>Welcome,</small>
								<p style="text-transform: capitalize;"><?php echo $this->session->userdata('name');
									?></p>
								</span>

								<i class="ace-icon fa fa-caret-down"></i>
							</a>

							<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
								<!-- <li>
									<a href="#">
										<i class="ace-icon fa fa-cog"></i>
										Settings
									</a>
								</li>
								<li class="divider"></li>
								<li>
									<a href="#">
										<i class="ace-icon fa fa-user"></i>
										Profile
									</a>
								</li> -->


								<li>
									<a href="<?php echo base_url();?>Dashboard/Admin/Logout">
										<i class="ace-icon fa fa-power-off"></i>
										Logout
									</a>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</div><!-- /.navbar-container -->
		</div>

		<div class="main-container ace-save-state" id="main-container">
			<script type="text/javascript">
				try{ace.settings.loadState('main-container')}catch(e){}
			</script>

			<div id="sidebar" class="sidebar responsive ace-save-state sidebar-fixed">
				<script type="text/javascript">
					try{ace.settings.loadState('sidebar')}catch(e){}
				</script>
				<ul class="nav nav-list">
					<li class="<?=(current_url()==base_url().'Dashboard/Admin/Home') ? 'active':''?>">
						<a href="<?php echo base_url();?>Dashboard/Admin/Home" >
							<i class="menu-icon fa fa-tachometer"></i>
							<span class="menu-text"> Dashboard </span>
						</a>

						<b class="arrow"></b>
					</li>
					<li class="<?=(current_url()==base_url().'Dashboard/Admin/Category') ? 'active':''?>">
						<a href="<?php echo base_url();?>Dashboard/Admin/Category ">
							<i class="menu-icon fa fa-tag"></i>
							<span class="menu-text">Category</span>
						</a>

						<b class="arrow"></b>
					</li>
					<li class="<?=(current_url()==base_url().'Dashboard/Admin/Location') ? 'active':''?>">
						<a href="<?php echo base_url();?>Dashboard/Admin/Location">
							<i class="menu-icon fa fa-map-marker"></i>
							<span class="menu-text">City</span>
						</a>

						<b class="arrow"></b>
					</li>
					<li class="<?=(current_url()==base_url().'Dashboard/Admin/ShowSponsor' || current_url()==base_url().'Dashboard/Admin/Sponsor') ? 'active':''?>">
								<a href="<?php echo base_url();?>Dashboard/Admin/ShowSponsor">
									<i class="menu-icon fa fa-inr"></i>
									<span class="menu-text">Sponsor</span>
								</a>

								<b class="arrow"></b>
						</li>
					<li class="<?=(current_url()==base_url().'Dashboard/Admin/ShowSpeakers' || current_url()==base_url().'Dashboard/Admin/Speakers') ? 'active':''?>">
						<a href="<?php echo base_url();?>Dashboard/Admin/ShowSpeakers">
							<i class="menu-icon fa fa-microphone"></i>
							<span class="menu-text">Speakers</span>
						</a>

						<b class="arrow"></b>
					</li>
					 <li class="<?=(current_url()==base_url().'Dashboard/Admin/ShowEvents' || current_url()==base_url().'Dashboard/Admin/Events') ? 'active':''?>">
								<a href="<?php echo base_url();?>Dashboard/Admin/ShowEvents">
									<i class="menu-icon fa fa-calendar"></i>
									<span class="menu-text">Events</span>
								</a>

								<b class="arrow"></b>
						</li>					
				    <li class="<?=(current_url()==base_url().'Dashboard/Admin/ShowVideos' || current_url()==base_url().'Dashboard/Admin/Videos') ? 'active':''?>">
								<a href="<?php echo base_url();?>Dashboard/Admin/ShowVideos">
									<i class="menu-icon fa fa-video-camera"></i>
									<span class="menu-text">Videos</span>
								</a>

								<b class="arrow"></b>
						</li>
						<li class="<?=(current_url()==base_url().'Dashboard/Admin/Banner') ? 'active':''?>">
								<a href="<?php echo base_url();?>Dashboard/Admin/Banner">
									<i class="menu-icon fa fa-camera-retro"></i>
									<span class="menu-text">Banners</span>
								</a>

								<b class="arrow"></b>
						</li>						
						<li class="<?=(current_url()==base_url().'Dashboard/Admin/ShowImpacts' || current_url()==base_url().'Dashboard/Admin/Impact') ? 'active':''?>">
								<a href="<?php echo base_url();?>Dashboard/Admin/ShowImpacts">
									<i class="menu-icon fa fa-comment"></i>
									<span class="menu-text">Impact</span>
								</a>

								<b class="arrow"></b>
						</li>
                        <li class="<?=(current_url()==base_url().'Dashboard/Admin/ShowGallery' || current_url()==base_url().'Dashboard/Admin/Gallery' ) ? 'active':''?>">
								<a href="<?php echo base_url();?>Dashboard/Admin/ShowGallery">
									<i class="menu-icon fa fa-photo"></i>
									<span class="menu-text">Gallery</span>
								</a>

								<b class="arrow"></b>
						</li>
						<li class="<?=(current_url()==base_url().'Dashboard/Admin/ShowBlogs' || current_url()==base_url().'Dashboard/Admin/Blog') ? 'active':''?>">
								<a href="<?php echo base_url();?>Dashboard/Admin/ShowBlogs">
									<i class="menu-icon fa fa-twitter"></i>
									<span class="menu-text">Blog</span>
								</a>

								<b class="arrow"></b>
						</li>
						<li class="<?=(current_url()==base_url().'Dashboard/Admin/Users') ? 'active':''?>">
								<a href="<?php echo base_url();?>Dashboard/Admin/Users">
									<i class="menu-icon fa fa-users"></i>
									<span class="menu-text">Users List</span>
								</a>

								<b class="arrow"></b>
						</li>	
						<!-- <li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-files-o"></i>
							<span class="menu-text">Others </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							
							<li class="<?php //(current_url()==base_url().'Dashboard/Admin/Feedback') ? 'active':''?>">
								<a href="<?php echo base_url();?>Dashboard/Admin/Feedback">
									<i class="menu-icon fa fa-comments-o"></i>
									<span class="menu-text">Feedback</span>
								</a>

								<b class="arrow"></b>
						</li>
						/ <li class="<? //=(current_url()==base_url().'Dashboard/Admin/ShowFaq' || current_url()==base_url().'Dashboard/Admin/Faq') ? 'active':''?>">
								<a href="<?php //echo base_url();?>Dashboard/Admin/ShowFaq">
									<i class="menu-icon fa fa-question-circle"></i>
									<span class="menu-text">FAQ</span>
								</a>

								<b class="arrow"></b>
						</li>/
						
						<li class="<?php //(current_url()==base_url().'Dashboard/Admin/Contact') ? 'active':''?>">
								<a href="<?php //echo base_url();?>Dashboard/Admin/Contact">
									<i class="menu-icon fa fa-user"></i>
									<span class="menu-text">Contact Us</span>
								</a>

								<b class="arrow"></b>
						</li>
						</ul>
					</li> -->
					<li class="<?=(current_url()==base_url().'Dashboard/Admin/Contact') ? 'active':''?>">
								<a href="<?php echo base_url();?>Dashboard/Admin/Contact">
									<i class="menu-icon fa fa-user"></i>
									<span class="menu-text">Contact Us</span>
								</a>

								<b class="arrow"></b>
						</li>
					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-user-plus"></i>
							<span class="menu-text">Join Us </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							
							<li class="<?=(current_url()==base_url().'Dashboard/Admin/SponsorsJoinus') ? 'active':''?>">
								<a href="<?php echo base_url();?>Dashboard/Admin/SponsorsJoinus">
									<i class="menu-icon fa fa-user-plus"></i>
									<span class="menu-text">Join Us Sponsors</span>
								</a>

								<b class="arrow"></b>
						    </li>
						    <li class="<?=(current_url()==base_url().'Dashboard/Admin/OrganizerJoinus') ? 'active':''?>">
								<a href="<?php echo base_url();?>Dashboard/Admin/OrganizerJoinus">
									<i class="menu-icon fa fa-user-plus"></i>
									<span class="menu-text">Join Us Organizer</span>
								</a>

								<b class="arrow"></b>
						    </li>
						    <li class="<?=(current_url()==base_url().'Dashboard/Admin/AudianceJoinus') ? 'active':''?>">
								<a href="<?php echo base_url();?>Dashboard/Admin/AudianceJoinus">
									<i class="menu-icon fa fa-user-plus"></i>
									<span class="menu-text">Join Us Audiance</span>
								</a>

								<b class="arrow"></b>
						    </li>
						    <li class="<?=(current_url()==base_url().'Dashboard/Admin/SpeakerJoinus') ? 'active':''?>">
								<a href="<?php echo base_url();?>Dashboard/Admin/SpeakerJoinus">
									<i class="menu-icon fa fa-user-plus"></i>
									<span class="menu-text">Join Us Speaker</span>
								</a>

								<b class="arrow"></b>
						    </li>
						</ul>
					</li>
				</ul><!-- /.nav-list-->
