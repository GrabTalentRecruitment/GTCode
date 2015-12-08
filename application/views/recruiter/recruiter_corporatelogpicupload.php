<script src="/js/jquery-1.11.2.js"></script>
<script src="/js/bootstrap/bootstrap.min.js"></script>
<link href="/css/bootstrap.min.css" rel="stylesheet"/>
<?php
$recruiter_email = $this->session->userdata('logged_in');
$profilepicupd_url = $this->lang->lang().'/recruiter/recruiter_corporatelogpicupdate';
?>
<form action="<?php echo https_url($profilepicupd_url); ?>" method="post" accept-charset="utf-8" enctype="multipart/form-data" role="form">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <input type="hidden" name="employer-profile-email" id="employer-profile-email" value="<?php echo $recruiter_email;?>" />
                <div class="col-md-8">
                    <input type="file" name="fileToUpload" id="fileToUpload"/>
                    <span>Allowed File extensions (*.jpg, *.jpeg, *.png), Max File size: 1MB</span>
                </div><br />
                <div class="col-md-8">
                    <button type="submit" class="btn btn-primary" id="password-btn-save">Upload</button>
                </div>
            </div>  
        </div>
    </div>
</form>