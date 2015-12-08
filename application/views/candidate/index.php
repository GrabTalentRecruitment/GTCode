<?php 
$forgoturl = $this->lang->lang().'/candidate/forgotpassword'; 
$newuserurl = $this->lang->lang().'/candidate/register';
$candidateLogin = $this->lang->lang().'/candidate/candidate_login';
?>
<script src="/js/candidate/candidate_index.js"></script>
<div class="site-content">
	<div class="container recruiter-caption" style="height:65vh;">
		<div class="row">
			<p>&nbsp;</p><p>&nbsp;</p>
			<input type="hidden" id="inputCandLoginURL" value="<?php echo https_url($candidateLogin); ?>" />
			<div class="col-md-8 col-md-offset-2">
				<h2 class="font-1"><?=lang('candidatehome.heading');?></h3>
				<form method="post" accept-charset="utf-8" role="form" name="login-form" autocomplete="off">
				    <div class="row">
					<div class="col-md-4">
						<input type="email" name="inputemailaddress" id="inputemailaddress" placeholder="<?=lang('candidatehome.labelemail');?>" required autofocus />
					</div>
					<div class="col-md-4">
						<input type="password" id="inputpassword" name="inputpassword" placeholder="<?=lang('candidatehome.labelpasswd');?>" required />
					</div>
					<div class="col-md-4">
						<input type="submit" class="button" id="button-sign-in" value="<?=lang('candidatehome.signinuserlabeltxt');?>" />
					</div>
				    </div>	                            
	                        </form>
				<p class="textcenter font-1">
					<a href="<?php echo https_url($forgoturl); ?>" target="_parent"><?=lang('candidatehome.labelforgotpasswd');?></a><br /><br /><font color="white">Don't have an account?</font>&nbsp;<a href="<?php echo https_url($newuserurl);?>"><?=lang('candidatehome.newuserlabeltxt');?></a>
				</p>
			</div>
		</div>

		
		<!-- Modal Dialog for Success & Failure Messages - Start -->
		<div class="modal fade bs-example-modal-md" id="candIndexModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
	</div>
</div>