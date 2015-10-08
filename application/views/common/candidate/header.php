<?php //print_r($this->session->all_userdata()); 
$tmpname = $this->session->userdata('user_data');
$loginname = $tmpname[0]['candidate_firstname']." ".$tmpname[0]['candidate_lastname'];
?>
<!-- Navigation Top bar -->
<div class="navbar-wrapper">
    <div class="container">
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <a class="navbar-brand" href="/"><img alt="Brand" src="/images/gt_logo.png" /></a>
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <p class="navbar-text visible-lg">Logged in as <?php echo $loginname; ?></p>
                    <ul class="nav navbar-nav navbar-right">
                        <?php
                            if( ($this->uri->segment(2) == 'candidate_dashboard') ) {
                                echo '<li class="active"><a href="'.https_url("/".$this->lang->lang()."/candidate_dashboard",true).'"><span class="fa fa-dashboard"></span>&nbsp;'.lang('candidatelogin.home').'</a></li>';                                
                            } else {
                                echo '<li><a href="'.https_url("/".$this->lang->lang()."/candidate_dashboard",true).'"><span class="fa fa-dashboard"></span>&nbsp;'.lang('candidatelogin.home').'</a></li>';                                
                            }
                            
                            if( $this->uri->segment(3) == 'jobs'){
                                echo '<li class="active"><a href="'.https_url("/".$this->lang->lang()."/candidate/jobs",true).'"><span class="fa fa-briefcase"></span>&nbsp;'.lang('candidatelogin.jobs').'</a></li>';
                            } else {
                                echo '<li><a href="'.https_url("/".$this->lang->lang()."/candidate/jobs",true).'"><span class="fa fa-briefcase"></span>&nbsp;'.lang('candidatelogin.jobs').'</a></li>';
                            }
                            
                            if( $this->uri->segment(3) == 'profile'){
                                echo '<li class="active"><a href="'.https_url("/".$this->lang->lang()."/candidate/profile",true).'"><span class="fa fa-user"></span>&nbsp;'.lang('candidatelogin.myprofile').'</a></li>';
                            } else {
                                echo '<li><a href="'.https_url("/".$this->lang->lang()."/candidate/profile",true).'"><span class="fa fa-user"></span>&nbsp;'.lang('candidatelogin.myprofile').'</a></li>';
                            }
                        ?>
                        <li><a href="<?php echo https_url('/'.$this->lang->lang().'/candidate',true)?>"><span class="fa fa-sign-out"></span>&nbsp;<?=lang('candidatelogin.logout');?></a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</div>