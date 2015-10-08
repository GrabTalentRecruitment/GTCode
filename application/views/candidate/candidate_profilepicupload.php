<script src="/js/jquery-1.11.2.js"></script>
<script src="/js/bootstrap/bootstrap.min.js"></script>
<link href="/css/bootstrap.min.css" rel="stylesheet"/>
<?php
$user_data = $this->session->userdata('user_data');
$cand_email = $user_data[0]['candidate_email'];
$profilepicupd_url = $this->lang->lang().'/candidate/candidate_profilepicupdate';
?>
<form action="<?php echo https_url($profilepicupd_url); ?>" method="post" accept-charset="utf-8" enctype="multipart/form-data" role="form" id="candidate_chgpassword-form">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <input type="hidden" name="candidate-profile-email" id="candidate-profile-email" value="<?php echo $cand_email;?>" />
                <div class="col-md-12">
                    <input type="file" name="fileToUpload" id="fileToUpload"/>
                    <span>Allowed File extensions (*.jpg, *.jpeg, *.png), Max File size: 1MB</span>
                    <span>Recommended file dimensions 120 x 120 pixels (width x height)</span>
                </div><br />
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary" id="password-btn-save">Save</button>
                </div>
            </div>  
        </div>
    </div>
</form>