<script src="/js/jquery-1.11.2.js" defer="true"></script>
<script src="/js/bootstrap/bootstrap.min.js" defer="true"></script>
<link href="/css/bootstrap.min.css" rel="stylesheet"/>
<?php
$user_data = $this->session->userdata('user_data');
$cand_email = $user_data[0]['candidate_email'];
$cand_applyjobNum = $this->uri->segment(4);
$offerletter_url = $this->lang->lang().'/recruiter/candidate_offerletter';
?>
<form action="<?php echo https_url($offerletter_url); ?>" method="post" accept-charset="utf-8" enctype="multipart/form-data" role="form" id="candidate_offerupload-form">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <input type="hidden" name="candidate-profile-email" id="candidate-profile-email" value="<?php echo $candidate_email;?>" />
                <input type="hidden" name="candidate-job-number" id="candidate-job-number" value="<?php echo $cand_applyjobNum;?>" />
                <div class="col-md-12">
                    <input type="file" name="fileToUpload" id="fileToUpload"/>
                    <span>Max File size: 5MB</span>
                </div><br />
                <input value="" id="tmpVal" placeholder="iframe src value" />
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary" id="password-btn-save">Upload</button>
                </div>
            </div>  
        </div>
    </div>
</form>