<?php 
$changepasswd_url = $this->lang->lang().'/candidate/changetemppasswd';
$dashboard_url = $this->lang->lang().'/candidate_dashboard';
$candidateref_id = $this->session->userdata('user_data')[0]['candidate_ref_id'];
?>
<script type="text/javascript" src="/js/candidate/candidate_changepasswd.js"></script>
<input type="hidden" id="inputcandidatechgpwdUrl" value="<?php echo https_url($changepasswd_url); ?>" />
<input type="hidden" id="inputcandidatebackUrl" value="<?php echo https_url($dashboard_url); ?>" />

<form method="post" accept-charset="utf-8" role="form" enctype="multipart-form/data">

    <input type="hidden" name="inputcandidateRefId" id="inputcandidateRefId" value="<?php echo $candidateref_id; ?>" />
    
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
                <h1 class="page-title font-1">Change Password</h1>
            </div>
            <div class="col-md-6 no-padding" style="text-align:right;">
                <button class="button" type="submit" id="button-submit-password">Save</button>
            </div>
        </div>
    </div>
    
    <div class="page-content container">
        
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
        
    </div>
    <div class="clearfix"></div>
    
</form>
<!-- end site-content -->