<script src="/js/jquery-1.11.2.js"></script>
<script src="/js/bootstrap/bootstrap.min.js"></script>
<link href="/css/bootstrap.min.css" rel="stylesheet"/>
<link href="/css/style.css" rel="stylesheet"/>
<link href="/css/responsive.css" rel="stylesheet"/>
<?php
$recruiter_email = $this->session->userdata('recruiter_login');
$profilepicupd_url = $this->lang->lang().'/recruiter/recruiter_corporatelogpicupdate';
?>
<form action="<?php echo https_url($profilepicupd_url); ?>" method="post" accept-charset="utf-8" enctype="multipart/form-data" role="form">
    <input type="hidden" name="employer-profile-email" id="employer-profile-email" value="<?php echo $recruiter_email;?>" />
    <input type="file" name="fileToUpload" id="fileToUpload"/>
    <span>Allowed File extensions (*.jpg, *.jpeg, *.png), Max File size: 1MB</span><br /><br />
    <button type="submit" class="button" id="password-btn-save">Upload</button>
</form>