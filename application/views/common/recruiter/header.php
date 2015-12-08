<header class="site-header">
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<a href="<?php echo https_url($this->lang->lang().'/recruiter'); ?>" rel="home" class="site-logo"><img src="/images/logo.png" width="250" height="83" /></a>
			</div>
			<div class="col-md-8">
				<ul class="site-menu alignright">
                    <?php
                            if( ($this->uri->segment(2) == 'dashboard') ) {
                                echo '<li class="active"><a href="'.https_url("/".$this->lang->lang()."/recruiter/dashboard").'">'.lang('recruiterlogin.calendartxt').'</a></li>';                                
                            } else {
                                echo '<li><a href="'.https_url("/".$this->lang->lang()."/recruiter/dashboard").'">'.lang('recruiterlogin.calendartxt').'</a></li>';                                
                            }
                            
                            echo '<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">'.lang('recruiterhome.joblinksbutton').'<span class="caret"></span></a>';
                                echo '<ul class="dropdown-menu">';
                                if( $this->uri->segment(3) == 'job_create'){
                                    echo '<li class="current-menu-item"><a href="'.https_url("/".$this->lang->lang()."/recruiter/job_create").'">'.lang('recruiterlogin.createjob').'</a></li>';
                                } else {
                                    echo '<li><a href="'.https_url("/".$this->lang->lang()."/recruiter/job_create").'">'.lang('recruiterlogin.createjob').'</a></li>';
                                };
                                
                                if( $this->uri->segment(3) == 'applicant_tracking'){
                                    echo '<li class="current-menu-item"><a href="'.https_url("/".$this->lang->lang()."/recruiter/applicant_tracking").'">'.lang('recruiterlogin.applicantTracking').'</a></li>';
                                } else {
                                    echo '<li><a href="'.https_url("/".$this->lang->lang()."/recruiter/applicant_tracking").'">'.lang('recruiterlogin.applicantTracking').'</a></li>';
                                }
                                
                                echo '</ul>';
                            echo '</li>';                           
                            
                            if( $this->uri->segment(3) == 'profile'){
                                echo '<li class="current-menu-item"><a href="'.https_url("/".$this->lang->lang()."/recruiter/profile").'">'.lang('recruiterlogin.companyprofile').'</a></li>';
                            } else {
                                echo '<li><a href="'.https_url("/".$this->lang->lang()."/recruiter/profile").'">'.lang('recruiterlogin.companyprofile').'</a></li>';
                            }
                            
                            echo '<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">'.lang('recruiterlogin.settings').'<span class="caret"></span></a>';
                                echo '<ul class="dropdown-menu">';
                                if( $this->uri->segment(3) == 'email_settings'){
                                    echo '<li class="current-menu-item"><a href="'.https_url("/".$this->lang->lang()."/recruiter/email_settings").'">'.lang('recruiterlogin.emailtemplate').'</a></li>';
                                } else {
                                    echo '<li><a href="'.https_url("/".$this->lang->lang()."/recruiter/email_settings").'">'.lang('recruiterlogin.emailtemplate').'</a></li>';
                                };
                                if( $this->uri->segment(3) == 'changepassword'){
                                    echo '<li class="current-menu-item"><a href="'.https_url("/".$this->lang->lang()."/recruiter/changepassword").'">Change Password</a></li>';
                                } else {
                                    echo '<li><a href="'.https_url("/".$this->lang->lang()."/recruiter/changepassword").'">Change Password</a></li>';
                                };
                                
                                echo '</ul>';
                            echo '</li>';
                                                      
                        ?>
                        <li><a href="<?php echo https_url('/'.$this->lang->lang().'/recruiter'); ?>"><?=lang('recruiterlogin.logout');?></a></li>
				</ul>
			</div>
		</div>
	</div>
	<a class="mobile-toggle">
		<i class="fa fa-bars fa-stack-1x"></i>
	</a>
</header>