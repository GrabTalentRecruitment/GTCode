<?php 
$profUrl = $this->lang->lang()."/candidate/profile"; 
$profUpdurl = $this->lang->lang()."/candidate/profile_update"; 
$candresumeDownloadurl = $this->lang->lang()."/candidate/candidate_resumedownload/";
$candchgepwdurl = $this->lang->lang()."/candidate/change_candidate_password";
$candchgeemailurl = $this->lang->lang()."/candidate/change_candidate_email";
$userData = $this->session->userdata('user_data'); $Vidresume = ''; $candidate_email = '';
$resume_url = "https://grab-talent.net/public/candidate/".$userData[0]['resume_url'];
$candidate_email = $userData[0]['candidate_email'];
?>
<script type="text/javascript" src="/js/candidate/candidate_profile.js" defer="true"></script>
<style type="text/css">
input[type=number]::-webkit-inner-spin-button, input[type=number]::-webkit-outer-spin-button { -webkit-appearance: none; margin: 0; }
</style>

<!-- Modal Window sections - start -->

<!-- Profile Picture window -- Start -->
<div class="container" id="profilepicupldModal" style="display:none; margin-top:5px;">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" id="div1_close">&times;</button>
            <h4 class="modal-title" id="myModalLabel">Upload Corporate Logo Picture</h4>
        </div>
        <div class="modal-body">
            <center><span id="modal-error-msg" style="color: red;"></span></center>
            <?php
                $uploadprofilpic_url = https_url($this->lang->lang().'/candidate/candidate_profilepicupload');
            ?>
            <iframe src="<?php echo $uploadprofilpic_url; ?>" width="100%" height="130" frameborder="0" allowtransparency="true"></iframe>
        </div>
    </div>
</div>
<!-- Profile Picture window -- End -->

<!-- Upload Resume window -- Start -->
<div class="container" id="resumeuploadModal" style="display:none; margin-top:5px;">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" id="div2_close">&times;</button>
            <h4 class="modal-title" id="myModalLabel">Upload Resume</h4>
        </div>
        <div class="modal-body">
            <center><span id="modal-error-msg" style="color: red;"></span></center>
            <?php
                $uploadresume_url = https_url($this->lang->lang()."/candidate/candidate_resumeupload");
            ?>
            <iframe src="<?php echo $uploadresume_url; ?>" width="100%" height="110" frameborder="0" allowtransparency="true"></iframe>
        </div>
    </div>
</div>
<!-- /.modal -->
<!-- Upload Resume window -- End -->

<!-- Change Email Address window -- Start -->
<div class="container" id="changeEmailModal" style="display:none; margin-top:5px;">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">Change Email Address</h4>
        </div>
        <div class="modal-body">
            <div id="chgEmailmodal-error-msg"></div>
            <form method="post" accept-charset="utf-8" enctype="multipart/form-data" role="form" id="candidate_chgemail-form">
                <input type="hidden" name="candidate-profile-email" id="candidate-profile-email" value="<?php echo $candidate_email;?>" />
                <div class="form-group">
                    <label for="newEmailAddress" class="control-label">New Email Address:</label>
                    <input type="email" class="form-control" id="newEmailAddress" name="newEmailAddress"/>
                </div>
                <p>*Please note, an email will be sent to the new email address for confirmation.</p>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="button" data-dismiss="modal" id="div3_close">Close</button>
            <button type="button" class="button" id="chgemail-btn-save">Save</button>
        </div>
    </div>
</div>
<!-- /.modal -->
<!-- Change Email Address window -- End -->

<!-- Modal Window sections - end -->

<form method="post" enctype="multipart/form-data" role="form" class="form-horizontal">
    <input type="hidden" value="<?php echo https_url($profUrl); ?>" name="inputprofUrl" id="inputprofUrl"/>
    <input type="hidden" value="<?php echo https_url($profUpdurl); ?>" name="inputprofupdUrl" id="inputprofupdUrl"/>
    <input type="hidden" value="<?php echo https_url($candresumeDownloadurl); ?>" name="inputcandresumedownldUrl" id="inputcandresumedownldUrl"/>
    <input type="hidden" value="<?php echo https_url($candchgepwdurl); ?>" name="inputchgpwdUrl" id="inputchgpwdUrl"/>
    <input type="hidden" value="<?php echo https_url($candchgeemailurl); ?>" name="inputchgemailUrl" id="inputchgemailUrl"/>
    <input type="hidden" name="profile-email" id="profile-email" value="<?php echo $candidate_email;?>" />
	<div class="site-content" >
	
        <div class="container page-header">
            <div class="row">
                <div class="col-md-6 no-padding">
                    <h1 class="page-title font-1"><?=lang('candidatelogin.myprofile');?></h1>
                </div>
                <div class="col-md-6 no-padding">
                    <div class="page-submenu">
                        <button type="submit" class="button" id="profile-updateBtn"><?=lang('candidateprofile.companyprofupdBtn');?></button>
                        <a href="<?php echo https_url($this->lang->lang()."/candidate/changepassword"); ?>" class="button" title="<?=lang('candidateprofile.companyprofchgpwd');?>"><?=lang('candidateprofile.companyprofchgpwd');?></a>
                        <input type="reset" class="button" value="<?=lang('candidateprofile.companyprofresetBtn');?>" />
                    </div>
                </div>
            </div>
        </div>
		
		<div class="page-content container">
			
            <?php 
            foreach($userData as $usrdt){ 
                $candidate_email = $usrdt['candidate_email'];
                $resume = $usrdt['resume_url'];
            ?>
                <div class="row profile-row">
                    <div class="col-md-12 ">
                        <?php if( empty($usrdt['candidate_profilepicurl']) ) { ?>
                            <h3>Profile Picture</h3>
                            <div class="profile-image alignleft">
                                <img src="/images/myprofile.jpg" width="140" height="140" />
                            </div>
                            <h3 class="no-clear">Upload your photo ...</h3>
                            <p><span style="color: #737373;">Image should be at least 120px  x 120px</span></p>
                            <button type="button" class="button" id="profileUpdbtn">Upload Profile Picture</button>
                        <?php } else { ?>
                            <h3>Profile Picture</h3>
                            <div class="profile-image alignleft">
                                <img alt="Avatar" width="140" height="140" src="<?php echo '/images/candidate/photo/'.$usrdt['candidate_profilepicurl'];?>" />
                            </div>
                            <h3 class="no-clear">Upload your photo ...</h3>
                            <p><span style="color: #737373;">Image should be at least 120px  x 120px</span></p>
                            <button type="button" class="button" id="profileUpdbtn">Upload Profile Picture</button>
                        <?php } ?>
                    </div>
                </div>
				<div class="row info-row">
					
					<div class="col-md-6">
						<label for=""><?=lang('candidateprofile.phonenumber')?>:</label><br />
						<input type="number" min="0" id="inputPhonenumber" name="inputPhonenumber" value="<?php echo $usrdt['candidate_phonenumber'];?>" required maxlength="20"/>
					</div>
					<div class="col-md-6">
						<label for=""><?=lang('candidateprofile.firstName')?>:</label><br />
						<input type="text" min="0" id="inputCandFirstname" name="inputCandFirstname" value="<?php echo $usrdt['candidate_firstname']; ?>" required maxlength="20" />
					</div>
					
					<div class="col-md-6" style="padding-top:15px;">
						<label for=""><?=lang('candidatesignup.totyearsexperience');?>:</label><br />
						<input type="number" min="0" id="inputTotExperience" name="inputTotExperience" value="<?php echo $usrdt['candidate_total_experience'];?>" required maxlength="2" />
					</div>
					
					<div class="col-md-6" style="padding-top:15px;">
						<label for=""><?=lang('candidateprofile.lastName')?>:</label><br />
						<input type="text" min="0" id="inputCandLastname" name="inputCandLastname" value="<?php echo $usrdt['candidate_lastname']; ?>" required maxlength="20" />
					</div>
					
					<div class="col-md-6" style="padding-top:15px;">
						<label for=""><?=lang('candidateprofile.email')?>:</label><br />
						<?php echo $usrdt['candidate_email'];?>&nbsp;<button type="button" class="btn btn-xs btn-default" id="changeEmail"><strong>Change</strong></button>
					</div>
							
					<div class="col-md-6" style="padding-top:15px;">
						<label for=""><?=lang('candidatesignup.gender');?>:</label><br />
						<input type="radio" name="inputCandGender" id="inlineRadio1" value="Male"
						<?php
						if( $usrdt['candidate_gender'] == 'Male' && !empty( $usrdt['candidate_gender'] ) ){ echo "checked"; }
						?>
						/> <?=lang('candidatesignup.genderoptn1');?>&nbsp;&nbsp;&nbsp;
						<input type="radio" name="inputCandGender" id="inlineRadio2" value="Female" 
						<?php
						if( $usrdt['candidate_gender'] != 'Male' && !empty( $usrdt['candidate_gender'] ) ){ echo "checked"; }
						?>
						/> <?=lang('candidatesignup.genderoptn2');?><br />
					</div>
					
					<div class="col-md-12" style="padding-top:15px;">
						<div>
							<label for=""><?=lang('candidateprofile.briefdescription')?>:</label><br />
							<textarea rows="8" id="inputbriefDesc" name="inputbriefDesc"><?php echo $usrdt['brief_description'];?></textarea>
						</div>
					</div>
					<div class="col-md-12"" style="padding-top:15px;">
						<div>
							<label for=""><?=lang('candidateprofile.resumeUpd')?>:</label><br />
							<button type="button" class="button" id="resumeDownlod" onclick="window.location='<?php echo $resume_url; ?>'"><?=lang('candidateprofile.viewResumeBtn')?></button>
                            <button type="button" class="button" id="resumeupload"><?=lang('candidateprofile.ResumeUploadBtn')?></button>
						</div>
					</div>
				</div>
			<?php 
			} ?>
		
		</div>
		
		<div class="clearfix"></div><br /><br />
	
	</div> <!-- end site-content -->

</form>
<!-- Modal Dialog for Success & Failure Messages - Start -->
<div class="modal fade bs-example-modal-sm" id="getMsgModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"> Message </h4>
            </div>
            <div class="modal-body" id="getCode"></div>
        </div>
    </div>
</div>