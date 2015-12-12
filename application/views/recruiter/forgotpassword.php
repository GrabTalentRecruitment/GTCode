<?php $forgotpasswd_url = $this->lang->lang().'/recruiter/sendforgotpwd'; ?>
<script type="text/javascript" src="/js/recruiter/recruiter_forgotpasswd.js" defer="true"></script>
<div class="visible-xs visible-sm vert-offset-top-3"></div>
<div class="visible-lg visible-md vert-offset-top-1"></div>
<input type="hidden" id="recruiterforgotpwd_url" value="<?php echo https_url($forgotpasswd_url); ?>" />

<form method="post" accept-charset="utf-8" role="form">
    <!-- Alert message - start -->
        <div class="page-content container" id="modal-window" style="display:none; background-color:white; margin-top:5px; border-radius:10px; height:15px;">
            <div class="modal-dialog modal-md">
                <div class="modal-header">
                    <h4 class="modal-title" id="displayMsg"></h4>
                </div>
            </div>
        </div>
    <!-- Alert message - end -->
    
    <div class="container page-header">
        <div class="row">
            <div class="col-md-6 no-padding">
                <h1 class="page-title font-1"><?=lang('recruiterhome.labelforgotpasswd');?></h1>
            </div>
            <div class="col-md-6 no-padding" style="text-align:right;">
                <button class="button" type="submit" id="button-submit-password"><?=lang('recruiterhome.forgotpasswordbtnlbl');?></button>
            </div>
        </div>
    </div>
    
    <div class="page-content container">
        <div class="row">
            <div class="col-md-12">
                <p><?=lang('recruiterhome.labelforgotpwdtxt');?></p>
                <input type="text" name="inputemailaddress" id="inputemailaddress" placeholder="<?=lang('recruiterhome.labelemail');?>" required autofocus />
            </div>
        </div>
    </div>
    
</form>