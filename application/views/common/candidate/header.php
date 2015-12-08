<?php //print_r($this->session->all_userdata()); 
$tmpname = $this->session->userdata('user_data');
$loginname = $tmpname[0]['candidate_firstname']." ".$tmpname[0]['candidate_lastname'];
$email = $tmpname[0]['candidate_email'];
?>
<!-- Navigation Top bar -->
<header class="site-header">
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<a href="index.php" rel="home" class="site-logo"><img src="/images/logo.png" width="250" height="83" /></a>
			</div>
			<div class="col-md-8">
				<ul class="site-menu alignright">
					<?php
		                            if( ($this->uri->segment(2) == 'candidate_dashboard') ) {
		                                echo '<li class="current-menu-item"><a href="'.https_url("/".$this->lang->lang()."/candidate_dashboard",true).'">'.strtoupper( lang('candidatelogin.home') ).'</a></li>';                                
		                            } else {
		                                echo '<li><a href="'.https_url("/".$this->lang->lang()."/candidate_dashboard",true).'">'.strtoupper( lang('candidatelogin.home') ).'</a></li>';                                
		                            }
		                            
		                            if( $this->uri->segment(3) == 'jobs'){
		                                echo '<li class="current-menu-item"><a href="'.https_url("/".$this->lang->lang()."/candidate/jobs",true).'">'.strtoupper( lang('candidatelogin.jobs') ).'</a></li>';
		                            } else {
		                                echo '<li><a href="'.https_url("/".$this->lang->lang()."/candidate/jobs",true).'">'.strtoupper( lang('candidatelogin.jobs') ).'</a></li>';
		                            }
		                            
		                            if( $this->uri->segment(3) == 'profile'){
		                                echo '<li class="current-menu-item"><a href="'.https_url("/".$this->lang->lang()."/candidate/profile",true).'">'.strtoupper( lang('candidatelogin.myprofile') ).'</a></li>';
		                            } else {
		                                echo '<li><a href="'.https_url("/".$this->lang->lang()."/candidate/profile",true).'">'.strtoupper( lang('candidatelogin.myprofile') ).'</a></li>';
		                            }
		                        ?>
                        		<li><a href="<?php echo https_url('/'.$this->lang->lang().'/candidate',true)?>"><?=strtoupper( lang('candidatelogin.logout') );?></a></li>
				</ul>
			</div>
		</div>
	</div>
	<a class="mobile-toggle">
		<i class="fa fa-bars fa-stack-1x"></i>
	</a>
</header>