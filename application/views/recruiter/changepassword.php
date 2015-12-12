<?php 
$back_url = $this->lang->lang().'/recruiter/dashboard'; 
$changepasswd_url = $this->lang->lang().'/recruiter/changetemppasswd';
$dashboard_url = $this->lang->lang().'/recruiter/dashboard';
$recruiteremail = $this->session->userdata('recruiter_login'); 
?>
<script type="text/javascript" src="/js/recruiter/recruiter_changepasswd.js"></script>
<input type="hidden" id="inputrecruiterchgpwdUrl" value="<?php echo https_url($changepasswd_url); ?>" />
<input type="hidden" id="inputrecruiterbackUrl" value="<?php echo https_url($dashboard_url); ?>" />

<form method="post" accept-charset="utf-8" role="form" enctype="multipart-form/data">

    <input type="hidden" class="form-control" name="inputemailaddress" id="inputemailaddress" value="<?php echo $recruiteremail; ?>" />
    
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
                <button type="submit" class="button" id="button-submit-password">Save</button>
            </div>
        </div>
    </div>

    <div class="page-content container">
        <div class="row">
            <div class="col-md-3">
                <label for="">New Password<span style="color: red;">*</span></label>
            </div>
            <div class="col-md-9">
                <input type="password" name="inputpassword" id="inputpassword" placeholder="New Password" required />
            </div>
        </div><br />
    
        <div class="row">
            <div class="col-md-3">
                <label for="">Confirm new Password<span style="color: red;">*</span></label>
            </div>
            <div class="col-md-9">
                <input type="password" name="inputconfirmpassword" id="inputconfirmpassword" placeholder="Confirm New Password" required />
            </div>
        </div>

    </div>

</form>