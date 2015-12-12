<?php $url = $this->lang->lang()."/site_admin/forgotpassword"; ?>
<script type="text/javascript" src="/js/site_admin/siteAdmin_index.js" defer></script>
<div class="site-content">
	<div class="container recruiter-caption" style="height:65vh;">
		<div class="row">
			<p>&nbsp;</p><p>&nbsp;</p>
            <div class="col-md-8 col-md-offset-2">
                <h2><?=lang('siteadminhome.heading');?></h2>
                <form method="post" accept-charset="utf-8" role="form" autocomplete="off">
                    <input type="hidden" id="curr_lang" name="curr_lang" value="<?php echo $this->lang->lang();?>" />
                    <div class="row">
						<div class="col-md-5">
                            <input type="text" name="emailaddress" id="emailaddress" placeholder="<?=lang('recruiterhome.labelemail');?>" required autofocus />
                        </div>
                        <div class="col-md-5">
                            <input type="password" id="password" name="password" placeholder="<?=lang('recruiterhome.labelpasswd');?>" required />
                        </div>
                        <div class="col-md-2">
                            <button class="button" type="submit" id="button-sign-in">Sign in</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Modal Dialog for Success & Failure Messages - Start -->
<div class="modal fade bs-example-modal-sm" id="getMsgModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"> Message </h4>
            </div>
            <div class="modal-body" id="getCode"></div>
        </div>
    </div>
</div>