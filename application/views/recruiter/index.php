<?php
$forgotpasswd_url = $this->lang->lang().'/recruiter/forgotpassword'; 
$recruiter_verifyurl = $this->lang->lang().'/recruiter/recruiter_loginCheck'; 
?>
<script type="text/javascript" src="/js/recruiter/recruiter_index.js"></script>
<input type="hidden" id="recruiter_url" value="<?php echo https_url($recruiter_verifyurl); ?>" />
<div class="recruiter-wrapper">
    <div class="container">
		<div class="row">
            <div class="vert-offset-top-5 visible-xs"></div>
            <div class="vert-offset-top-6 hidden-xs hidden-md hidden-sm visible-lg"></div>
            <div class="vert-offset-top-5 visible-md hidden-xs hidden-lg visible-sm"></div> 
			<div class="col-xs-12 col-md-4 col-lg-4">
				<div class="panel panel-default">
					<div class="panel-body">
						<form role="form" action="#" method="POST">
							<h2><?=lang('recruiterhome.heading');?></h2>
							<div class="row">
								<div class="col-sm-12 col-md-12 col-lg-12">
                                    <form method="post" accept-charset="utf-8" role="form">
                                        <input type="hidden" id="curr_lang" name="curr_lang" value="<?php echo $this->lang->lang();?>" />
                                        <div class="form-group">
											<label for="emailaddress" class="sr-only">Email Address</label>
                                            <input type="text" class="form-control" name="inputemailaddress" id="inputemailaddress" placeholder="<?=lang('recruiterhome.labelemail');?>" required autofocus />
										</div>
										<div class="form-group">
                                            <label for="inputPassword" class="sr-only">Password</label>
                                            <input type="password" id="inputpassword" name="inputpassword" class="form-control" placeholder="<?=lang('recruiterhome.labelpasswd');?>" required>
										</div>
										<div class="form-group">
											<button class="btn btn-md btn-primary btn-block" type="submit" id="button-sign-in">Sign in</button>
										</div>                                            
                                    </form>
								</div>
							</div>
						</form>
					</div>
					<div class="panel-footer "><br />
                        <a href="<?php echo https_url($forgotpasswd_url); ?>" target="_parent"><?=lang('recruiterhome.labelforgotpasswd');?></a><br /><br />
					</div>
                </div>
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
<!-- Modal Dialog for Success & Failure Messages - End -->