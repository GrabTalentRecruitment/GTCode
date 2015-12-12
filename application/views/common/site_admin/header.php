<?php
$empinfo = $this->login_database->read_admin_information( $this->session->userdata('logged_in') );
foreach($empinfo as $empData) {
    $this->session->set_userdata('user_data', $empinfo); 
    $loginname = $empData['admin_firstname']." ".$empData['admin_lastname'];
}
?>

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
                            echo '<li class="active"><a href="'.https_url("/".$this->lang->lang()."/site_admin/dashboard").'">'.lang('recruiterlogin.home').'</a></li>';                                
                        } else {
                            echo '<li><a href="'.https_url("/".$this->lang->lang()."/site_admin/dashboard").'">'.lang('recruiterlogin.home').'</a></li>';
                        }
                        
                        if( $this->uri->segment(3) == 'users'){
                            echo '<li class="active"><a href="'.https_url("/".$this->lang->lang()."/site_admin/users").'">'.lang('siteadminusers.recruitercreate').'</a></li>';
                        } else {
                            echo '<li><a href="'.https_url("/".$this->lang->lang()."/site_admin/users").'">'.lang('siteadminusers.recruitercreate').'</a></li>';
                        }
                        
                        echo '<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">'.lang('siteadminusers.settingsbutton').'<span class="caret"></span></a>';
                        echo '<ul class="dropdown-menu">';
                        echo '<li><a href="'.https_url("/".$this->lang->lang()."/site_admin/menu_settings").'">'.lang('siteadminusers.settingslabel1').'</a></li>';
                        echo '<li><a href="'.https_url("/".$this->lang->lang()."/site_admin/dropdown_settings").'">'.lang('siteadminusers.settingslabel3').'</a></li>';
                        echo '<li><a href="'.https_url("/".$this->lang->lang()."/site_admin/site_errors").'">'.lang('siteadminusers.settingslabel2').'</a></li>';
                        
                        echo '</ul></li>';
                    ?>
                    <li><a href="<?php echo https_url('/'.$this->lang->lang().'/site_admin'); ?>"><?=lang('recruiterlogin.logout');?></a></li>
				</ul>
			</div>
		</div>
	</div>
	<a class="mobile-toggle">
		<i class="fa fa-bars fa-stack-1x"></i>
	</a>
</header>