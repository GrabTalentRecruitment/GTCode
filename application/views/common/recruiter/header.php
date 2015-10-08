<!-- Navigation Top bar -->
<div class="navbar-wrapper">
    <div class="container">
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container-fluid">
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
                    <p class="navbar-text hidden-sm">Logged in as <?php echo $loggedin_User; ?></p>
                    <ul class="nav navbar-nav navbar-right">
                        <?php
                            if( ($this->uri->segment(2) == 'dashboard') ) {
                                echo '<li class="active"><a href="'.https_url("/".$this->lang->lang()."/recruiter/dashboard").'"><span class="fa fa-home"></span>&nbsp;'.lang('recruiterlogin.home').'</a></li>';                                
                            } else {
                                echo '<li><a href="'.https_url("/".$this->lang->lang()."/recruiter/dashboard").'"><span class="fa fa-home"></span>&nbsp;'.lang('recruiterlogin.home').'</a></li>';                                
                            }
                            
                            echo '<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="fa fa-suitcase"></span>&nbsp;'.lang('recruiterhome.joblinksbutton').'<span class="caret"></span></a>';
                                echo '<ul class="dropdown-menu">';
                                if( $this->uri->segment(3) == 'job_create'){
                                    echo '<li class="active"><a href="'.https_url("/".$this->lang->lang()."/recruiter/job_create").'"><span class="fa fa-suitcase"></span>&nbsp;'.lang('recruiterlogin.createjob').'</a></li>';
                                } else {
                                    echo '<li><a href="'.https_url("/".$this->lang->lang()."/recruiter/job_create").'"><span class="fa fa-suitcase"></span>&nbsp;'.lang('recruiterlogin.createjob').'</a></li>';
                                };
                                
                                if( $this->uri->segment(3) == 'applicant_tracking'){
                                    echo '<li class="active"><a href="'.https_url("/".$this->lang->lang()."/recruiter/applicant_tracking").'"><span class="fa fa-tasks"></span>&nbsp;'.lang('recruiterlogin.applicantTracking').'</a></li>';
                                } else {
                                    echo '<li><a href="'.https_url("/".$this->lang->lang()."/recruiter/applicant_tracking").'"><span class="fa fa-tasks"></span>&nbsp;'.lang('recruiterlogin.applicantTracking').'</a></li>';
                                }
                                
                                echo '</ul>';
                            echo '</li>';
                            
                            echo '<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="fa fa-envelope"></span>&nbsp;Templates<span class="caret"></span></a>';
                                echo '<ul class="dropdown-menu">';
                                if( $this->uri->segment(3) == 'interviewemail_template'){
                                    echo '<li class="active"><a href="'.https_url("/".$this->lang->lang()."/recruiter/interviewemail_template").'"><span class="fa fa-envelope"></span>&nbsp;Interview Email Template</a></li>';
                                } else {
                                    echo '<li><a href="'.https_url("/".$this->lang->lang()."/recruiter/interviewemail_template").'"><span class="fa fa-envelope"></span>&nbsp;Interview Email Template</a></li>';
                                };
                                
                                if( $this->uri->segment(3) == 'offeremail_template'){
                                    echo '<li class="active"><a href="'.https_url("/".$this->lang->lang()."/recruiter/offeremail_template").'"><span class="fa fa-envelope"></span>&nbsp;Offer Email Template</a></li>';
                                } else {
                                    echo '<li><a href="'.https_url("/".$this->lang->lang()."/recruiter/offeremail_template").'"><span class="fa fa-envelope"></span>&nbsp;Offer Email Template</a></li>';
                                }
                                
                                echo '</ul>';
                            echo '</li>';                           
                            
                            if( $this->uri->segment(3) == 'profile'){
                                echo '<li class="active"><a href="'.https_url("/".$this->lang->lang()."/recruiter/profile").'"><span class="fa fa-building"></span>&nbsp;'.lang('recruiterlogin.companyprofile').'</a></li>';
                            } else {
                                echo '<li><a href="'.https_url("/".$this->lang->lang()."/recruiter/profile").'"><span class="fa fa-building"></span>&nbsp;'.lang('recruiterlogin.companyprofile').'</a></li>';
                            }
                                                      
                        ?>
                        <!--<li><a tabindex="0" id="supportTkt" data-placement="bottom" role="button" data-toggle="popover" data-trigger="focus" title="Information Popup" data-content="This link will open Support Tickets page which will be available in the next phase."><?=lang('recruiterlogin.supportticket');?></a></li>-->
                        <li><a href="<?php echo https_url('/'.$this->lang->lang().'/recruiter'); ?>"><span class="fa fa-sign-out"></span>&nbsp;<?=lang('recruiterlogin.logout');?></a></li>
                    </ul>
                </div>
            </div>
            <span class="navbar-text visible-sm">Logged in as <?php echo $loggedin_User; ?></span>
        </nav>
    </div>
</div>
<script>
$(function(){
    $('a[id^="supportTkt"]').on('click',function(event){
        $(this).popover('toggle');
        event.preventDefault(); 
        event.stopPropagation();       
    });
});
</script>