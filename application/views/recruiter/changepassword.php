<?php 
$back_url = $this->lang->lang().'/recruiter/dashboard'; 
$changepasswd_url = $this->lang->lang().'/recruiter/changetemppasswd';
$dashboard_url = $this->lang->lang().'/recruiter/dashboard';
$recruiteremail = $this->session->userdata('recruiter_login'); 
?>
<script type="text/javascript" src="/js/recruiter/recruiter_changepasswd.js"></script>
<div class="visible-xs visible-sm vert-offset-top-3"></div>
<div class="visible-lg visible-md vert-offset-top-1"></div>
<input type="hidden" id="inputrecruiterchgpwdUrl" value="<?php echo https_url($changepasswd_url); ?>" />
<input type="hidden" id="inputrecruiterbackUrl" value="<?php echo https_url($dashboard_url); ?>" />
<div class="site-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3 vert-offset-top-6">
                <div class="panel panel-default">
		   <div class="panel-body">
                        <h3><b>Change Password</b></h3><br />
                        <form method="post" accept-charset="utf-8" role="form" enctype="multipart-form/data">
                            <input type="hidden" class="form-control" name="inputemailaddress" id="inputemailaddress" value="<?php echo $recruiteremail; ?>" />
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="password" class="form-control" name="inputpassword" id="inputpassword" placeholder="New Password" required />
                                </div>
                            </div><br />
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="password" class="form-control" name="inputconfirmpassword" id="inputconfirmpassword" placeholder="Confirm New Password" required />
                                </div>
                            </div><br />
                            <div class="row">
                                <div class="col-md-12">
                                    <button class="btn btn-lg btn-primary btn-block" type="submit" id="button-submit-password">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>  
    </div>
</div>
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