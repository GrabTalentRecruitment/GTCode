<div class="visible-xs vert-offset-top-5"></div>
<div class="visible-sm vert-offset-top-8"></div>
<div class="visible-lg visible-md hidden-xs vert-offset-top-5"></div>
<div class="site-wrapper">
    <div class="site-wrapper-inner">
        <div class="container-fluid">
            <h2><img src="/images/icons/settings.png" alt="Drop-down items icon"/><?=lang('recruiterlogin.emailtemplate');?></h2>
            <!-- To display in Large Desktop mode - Start -->
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-3">
                    <div class="panel panel-default">
                        <div class="panel-heading"><strong><?=lang('recruiterlogin.emailtemplate_1');?></strong></div>
                        <div class="panel-body"><?=lang('recruiterlogin.emailtemplate_1subtxt');?></div>
                        <div class="panel-footer text-right">
                            <a href="<?php echo https_url("/".$this->lang->lang()."/recruiter/interviewemail_template"); ?>" class="btn btn-primary btn-sm" id="btnJobCategory"><?=lang('siteadminusers.dropdownpnlbtnlbl');?></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-3">
                    <div class="panel panel-default">
                        <div class="panel-heading"><strong><?=lang('recruiterlogin.emailtemplate_2');?></strong></div>
                        <div class="panel-body"><?=lang('recruiterlogin.emailtemplate_2subtxt');?></div>
                        <div class="panel-footer text-right">
                            <a href="<?php echo https_url("/".$this->lang->lang()."/recruiter/offeremail_template"); ?>" class="btn btn-primary btn-sm" id="btnJobFunction"><?=lang('siteadminusers.dropdownpnlbtnlbl');?></a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- To display in Large Desktop mode - End -->
        </div>
    </div>
</div>