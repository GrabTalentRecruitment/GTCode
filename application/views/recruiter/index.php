<?php
$forgotpasswd_url = $this->lang->lang().'/recruiter/forgotpassword'; 
$recruiter_verifyurl = $this->lang->lang().'/recruiter/recruiter_loginCheck'; 
?>
<script type="text/javascript" src="/js/recruiter/recruiter_index.js"></script>
<input type="hidden" id="recruiter_url" value="<?php echo https_url($recruiter_verifyurl); ?>" />
<div class="site-content">
	<div class="container recruiter-caption" style="height:65vh;">
		<div class="row">
			<p>&nbsp;</p><p>&nbsp;</p>
			<div class="col-md-8 col-md-offset-2">
				<h2 class="font-1"><?=lang('recruiterhome.heading');?></h3>
				<form method="post" accept-charset="utf-8" role="form" autocomplete="off">
					<input type="hidden" id="curr_lang" name="curr_lang" value="<?php echo $this->lang->lang();?>" />
					<div class="row">
						<div class="col-md-4">
							<input type="text" name="inputemailaddress" id="inputemailaddress" placeholder="<?=lang('recruiterhome.labelemail');?>" required autofocus />
						</div>
						<div class="col-md-4">
							<input type="password" id="inputpassword" name="inputpassword" placeholder="<?=lang('recruiterhome.labelpasswd');?>" required>
						</div>
						<div class="col-md-4">
							<input type="submit" id="button-sign-in" class="button" value="Sign-in" />
						</div>
					</div>
				</form>
				<p class="textcenter"><a href="<?php echo https_url($forgotpasswd_url); ?>" target="_parent"><?=lang('recruiterhome.labelforgotpasswd');?></a></p>
			</div>
		</div>

		<div class="modal fade bs-example-modal-sm" id="getMsgModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		    <div class="modal-dialog modal-md">
		        <div class="modal-content">
		            <div class="modal-header">
		                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		                <h4 id="myModalLabel" style="clear:none !important; margin:0 !important;"> Message </h4>
		            </div>
		            <div class="modal-body" id="getCode"></div>
		        </div>
		    </div>
		</div>
	</div>
</div>