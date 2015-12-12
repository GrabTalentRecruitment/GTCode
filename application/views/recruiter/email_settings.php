<div class="container page-header">
    <div class="row">
        <div class="col-md-6 no-padding">
            <h1 class="page-title font-1"><?=lang('recruiterlogin.emailtemplate');?></h1>
        </div>
        <div class="col-md-6 no-padding"></div>
    </div>
</div>

<div class="page-content container">
    
    <div class="row">
        <div class="col-md-6">
            <table class="upcoming-interview">
                <tr>
                    <th><?=lang('recruiterlogin.emailtemplate_1');?></th>
                </tr>
                <tr>
                    <td>
                        <p><?=lang('recruiterlogin.emailtemplate_1subtxt');?></p>
                        <p>&nbsp;</p>
                        <div class="textright">
                            <button class="button" onclick="window.location='<?php echo https_url("/".$this->lang->lang()."/recruiter/interviewemail_template"); ?>'"  id="btnJobCategory"><?=lang('siteadminusers.dropdownpnlbtnlbl');?></button>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
    
        <div class="col-md-6">
            <table class="upcoming-interview">
                <tr>
                    <th><?=lang('recruiterlogin.emailtemplate_2');?></th>
                </tr>
                <tr>
                    <td>
                        <p><?=lang('recruiterlogin.emailtemplate_2subtxt');?></p>
                        <p>&nbsp;</p>
                        <div class="textright">
                            <button class="button" onclick="window.location='<?php echo https_url("/".$this->lang->lang()."/recruiter/offeremail_template"); ?>'"  id="btnJobCategory"><?=lang('siteadminusers.dropdownpnlbtnlbl');?></button>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
    </div>

</div>