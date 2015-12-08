<?php
$empinfo = $this->login_database->read_admin_information( $this->session->userdata('logged_in') );
foreach($empinfo as $empData) {
    $this->session->set_userdata('user_data', $empinfo); 
    $loginname = $empData['admin_firstname']." ".$empData['admin_lastname'];
}
?>
<!-- Navigation Top bar -->
<div class="navbar-wrapper">
    <div class="container">
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="<?php echo https_url("/".$this->lang->lang()."/site_admin/dashboard"); ?>"><img alt="Brand" src="/images/gt_logo.png" /></a>
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <!-- Top Menu Items -->
                <div id="navbar" class="navbar-collapse collapse">
                    <p class="navbar-text hidden-sm">Logged in as <?php echo $loginname; ?></p>
                    <ul class="nav navbar-nav navbar-right">
                        <?php
                            if( ($this->uri->segment(2) == 'dashboard') ) {
                                echo '<li class="active"><a href="'.https_url("/".$this->lang->lang()."/site_admin/dashboard").'"><span class="fa fa-home"></span>&nbsp;'.lang('recruiterlogin.home').'</a></li>';                                
                            } else {
                                echo '<li><a href="'.https_url("/".$this->lang->lang()."/site_admin/dashboard").'"><span class="fa fa-home"></span>&nbsp;'.lang('recruiterlogin.home').'</a></li>';
                            }
                            
                            if( $this->uri->segment(3) == 'users'){
                                echo '<li class="active"><a href="'.https_url("/".$this->lang->lang()."/site_admin/users").'"><span class="fa fa-building"></span>&nbsp;'.lang('siteadminusers.recruitercreate').'</a></li>';
                            } else {
                                echo '<li><a href="'.https_url("/".$this->lang->lang()."/site_admin/users").'"><span class="fa fa-building"></span>&nbsp;'.lang('siteadminusers.recruitercreate').'</a></li>';
                            }
                            
                            echo '<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="fa fa-cogs"></span>&nbsp;'.lang('siteadminusers.settingsbutton').'<span class="caret"></span></a>';
                            echo '<ul class="dropdown-menu">';
                            echo '<li><a href="'.https_url("/".$this->lang->lang()."/site_admin/menu_settings").'"><span class="fa fa-reorder"></span>&nbsp;'.lang('siteadminusers.settingslabel1').'</a></li>';
                            echo '<li><a href="'.https_url("/".$this->lang->lang()."/site_admin/dropdown_settings").'"><span class="fa fa-tasks"></span>&nbsp;'.lang('siteadminusers.settingslabel3').'</a></li>';
                            echo '<li><a href="'.https_url("/".$this->lang->lang()."/site_admin/site_errors").'"><span class="fa fa-compass"></span>&nbsp;'.lang('siteadminusers.settingslabel2').'</a></li>';
                            
                            echo '</ul></li>';
                        ?>
                        <li><a href="<?php echo https_url('/'.$this->lang->lang().'/site_admin'); ?>"><span class="fa fa-sign-out"></span>&nbsp;<?=lang('recruiterlogin.logout');?></a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</div>