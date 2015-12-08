<?php 
$changepasswd_url = $this->lang->lang().'/candidate/changetemppasswd';
$dashboard_url = $this->lang->lang().'/candidate_dashboard';
$candidateref_id = $this->session->userdata('user_data')[0]['candidate_ref_id'];
?>
<script type="text/javascript" src="/js/candidate/candidate_changepasswd.js"></script>
<input type="hidden" id="inputcandidatechgpwdUrl" value="<?php echo https_url($changepasswd_url); ?>" />
<input type="hidden" id="inputcandidatebackUrl" value="<?php echo https_url($dashboard_url); ?>" />
<div class="site-content" >

	<div class="container page-header">
		<div class="row">
			<div class="col-md-6 no-padding">
				<h1 class="page-title font-1">Change Password</h1>
			</div>
		</div>
	</div>
	
	<form method="post" accept-charset="utf-8" role="form" enctype="multipart-form/data">
		<input type="hidden" name="inputcandidateRefId" id="inputcandidateRefId" value="<?php echo $candidateref_id; ?>" />
		<div class="page-content container">
			
			<div class="row info-row">
				
		                <div class="row">
		                    <div class="form-group clearfix">
		                        <label class="col-md-3">New Password : </label>
		                        <div class="col-md-9">
		                            <input type="password" name="inputpassword" id="inputpassword" required />
		                        </div>
		                    </div>
		                </div>
                
		                <div class="row">
		                    <div class="form-group clearfix">
		                        <label class="col-md-3">Confirm New Password : </label>
		                        <div class="col-md-9">
		                            <input type="password" name="inputconfirmpassword" id="inputconfirmpassword" required />
		                        </div>
		                    </div>
		                </div>
                
				<div class="col-md-12 info-col text-center">
					<div>
						<button class="button" type="submit" id="button-submit-password">Save</button>
					</div>
				</div>
			</div>
		
		</div>
	</form>
	
	<div class="clearfix"></div>

</div> <!-- end site-content -->
<!-- Modal Dialog for Success & Failure Messages - Start -->
<div class="modal fade bs-example-modal-sm" id="getMsgModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"> Message </h4>
            </div>
            <div class="modal-body" id="getCode"></div>
        </div>
    </div>
</div>