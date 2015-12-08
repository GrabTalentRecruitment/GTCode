<?php 
$profUrl = $this->lang->lang()."/candidate/profile"; 
$profUpdurl = $this->lang->lang()."/candidate/profile_update"; 
$candresumeDownloadurl = $this->lang->lang()."/candidate/candidate_resumedownload/";
$candchgepwdurl = $this->lang->lang()."/candidate/change_candidate_password";
$candchgeemailurl = $this->lang->lang()."/candidate/change_candidate_email";
$userData = $this->session->userdata('user_data'); $Vidresume = ''; $candidate_email = '';
?>
<script type="text/javascript" src="/js/candidate/candidate_profile.js" defer="true"></script>
<style type="text/css">
input[type=number]::-webkit-inner-spin-button, input[type=number]::-webkit-outer-spin-button { -webkit-appearance: none; margin: 0; }
</style>

<form method="post" enctype="multipart/form-data" role="form" class="form-horizontal">
	<input type="hidden" value="<?php echo https_url($profUrl); ?>" name="inputprofUrl" id="inputprofUrl"/>
        <input type="hidden" value="<?php echo https_url($profUpdurl); ?>" name="inputprofupdUrl" id="inputprofupdUrl"/>
        <input type="hidden" value="<?php echo https_url($candresumeDownloadurl); ?>" name="inputcandresumedownldUrl" id="inputcandresumedownldUrl"/>
        <input type="hidden" value="<?php echo https_url($candchgepwdurl); ?>" name="inputchgpwdUrl" id="inputchgpwdUrl"/>
        <input type="hidden" value="<?php echo https_url($candchgeemailurl); ?>" name="inputchgemailUrl" id="inputchgemailUrl"/>
        
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
			<div class="row">
				<div class="col-md-12 ">
					
	                    		<div class="alert alert-success" role="alert" style="display: none;"></div>
	                    		<div class="alert alert-danger" role="alert" style="display: none;"></div>
				</div>
				
			</div>
		</div>
		
		<div class="page-content container">
			
	                <?php foreach($userData as $usrdt){ 
				$candidate_email = $usrdt['candidate_email'];
				$resume = $usrdt['resume_url'];
	                ?>
				<div class="row profile-row">
					<div class="col-md-12 ">
					<?php if( empty($usrdt['candidate_profilepicurl']) ) { ?>
						<h3>Profile Picture</h3>
						<div class="profile-image alignleft"><img src="/images/myprofile.jpg" width="140" height="140" /></div>
						<p>&nbsp;</p>
						<h3 class="no-clear">Upload your photo ...</h3>
						<p><span style="color: #737373;">Image should be at least 120px  x 120px</span></p>
						<p><button type="button" class="button" data-toggle="modal" data-target="#profilepicupldModal">Upload Profile Picture</button></p>
					<?php } else { ?>
						<h3>Profile Picture</h3>
						<div class="profile-image alignleft">
							<img alt="Avatar" width="140" height="140" src="<?php echo '/images/candidate/photo/'.$usrdt['candidate_profilepicurl'];?>" />
						</div>
						<p>&nbsp;</p>
						<h3 class="no-clear">Upload your photo ...</h3>
						<p><span style="color: #737373;">Image should be at least 120px  x 120px</span></p>
						<p><button type="button" class="button" data-toggle="modal" data-target="#profilepicupldModal">Upload Profile Picture</button></p>
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
						<?php echo $usrdt['candidate_email'];?>&nbsp;<button type="button" class="btn btn-xs btn-default" data-toggle="modal" data-target="#changeEmailModal"><strong>Change</strong></button>
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
							<button type="button" class="button" id="resumeDownlod" data-toggle="modal" data-target="#ResumedownloadModal"><?=lang('candidateprofile.viewResumeBtn')?></button>
	                                    		<button type="button" class="button" data-toggle="modal" data-target="#resumeuploadModal"><?=lang('candidateprofile.ResumeUploadBtn')?></button>
						</div>
					</div>
				</div>
			<?php 
			} ?>
		
		</div>
		
		<div class="clearfix"></div>
	
	</div> <!-- end site-content -->

</form>
<!-- Change password window -- Start -->
<div class="modal fade" id="chgpasswdModal" tabindex="-1" role="dialog" aria-labelledby="chgpasswdModalLabel" aria-hidden="true">
	<div class="modal-dialog">
	    <div class="modal-content">
	        <div class="modal-header">
	            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	            <h4 class="modal-title" id="chgpasswdModalLabel"><?=lang('candidateprofile.companyprofchgpwd');?></h4>                                             
	        </div>
	        <div class="modal-body">
	            <center><span id="modal-error-msg" style="color: red;"></span></center>
	            <form method="post" accept-charset="utf-8" enctype="multipart/form-data" role="form" id="candidate_chgpassword-form">
	                <input type="hidden" name="candidate-profile-email" id="candidate-profile-email" value="<?php echo $candidate_email;?>" />
	                <div class="form-group">
	                    <label for="recipient-name" class="control-label"><?=lang('candidateprofile.companyprofchgpwdlbl1');?>:</label>
	                    <input type="password" class="form-control" id="newPassword" name="newPassword"/>
	                </div>
	                <div class="form-group">
	                    <label for="recipient-name" class="control-label"><?=lang('candidateprofile.companyprofchgpwdlbl2');?>:</label>
	                    <input type="password" class="form-control" id="confirmnewPassword" name="confirmnewPassword"/>
	                </div>
	            </form>
	        </div>
	        <div class="modal-footer">
	            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	            <button type="button" class="btn btn-primary" id="password-btn-save">Save</button>
	        </div>
	    </div>
	</div>
</div>
<!-- Change password window -- End -->

<!-- Profile Picture window -- Start -->
<div class="modal fade" id="profilepicupldModal" tabindex="-1" role="dialog" aria-labelledby="myprofilepicupldModal" aria-hidden="true">
	<div class="modal-dialog">
	    <div class="modal-content">
	        <div class="modal-header">
	            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	            <h4 class="modal-title" id="myModalLabel">Upload Profile Picture</h4>
	        </div>
	        <div class="modal-body">
	            <center><span id="modal-error-msg" style="color: red;"></span></center>
	            <?php
	                $uploadprofilpic_url = https_url($this->lang->lang().'/candidate/candidate_profilepicupload');
	            ?>
	            <iframe src="<?php echo $uploadprofilpic_url; ?>" width="100%" height="130" frameborder="0" allowtransparency="true"></iframe>
	        </div><br /><br />
	    </div>
	    <!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<!-- Profile Picture window -- End -->

<!-- Upload Resume window -- Start -->
<div class="modal fade" id="resumeuploadModal" tabindex="-1" role="dialog" aria-labelledby="myresumeuploadModal" aria-hidden="true">
	<div class="modal-dialog">
	    <div class="modal-content">
	        <div class="modal-header">
	            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
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
	    <!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<!-- Upload Resume window -- End -->

<!-- Change Email Address window -- Start -->
<div class="modal fade" id="changeEmailModal" tabindex="-1" role="dialog" aria-labelledby="chgemailModal" aria-hidden="true">
	<div class="modal-dialog">
	    <div class="modal-content">
	        <div class="modal-header">
	            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
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
	            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	            <button type="button" class="btn btn-primary" id="chgemail-btn-save">Save</button>
	        </div>
	    </div>
	    <!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<!-- Change Email Address window -- End -->

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
<!-- Modal Dialog for downloading Resume - Start -->
<div class="modal fade bs-example-modal-sm" id="ResumedownloadModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"> Downloading... <iframe id="resumedownloadframe" height="1px" width="1px"></iframe> </h4>
            </div>
        </div>
    </div>
</div>

<!--
<div class="vert-offset-top-5 visible-lg visible-md"></div>
<div class="vert-offset-top-10 visible-sm"></div>
<div class="site-wrapper">
    <div class="site-wrapper-inner">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <?php $userData = $this->session->userdata('user_data'); $Vidresume = ''; $candidate_email = ''; ?>
                    <div class="alert alert-success" role="alert" style="display: none;"></div>
                    <div class="alert alert-danger" role="alert" style="display: none;"></div>
                </div>
            </div>
            <form method="post" enctype="multipart/form-data" role="form" class="form-horizontal">
                <input type="hidden" value="<?php echo https_url($profUrl); ?>" name="inputprofUrl" id="inputprofUrl"/>
                <input type="hidden" value="<?php echo https_url($profUpdurl); ?>" name="inputprofupdUrl" id="inputprofupdUrl"/>
                <input type="hidden" value="<?php echo https_url($candresumeDownloadurl); ?>" name="inputcandresumedownldUrl" id="inputcandresumedownldUrl"/>
                <input type="hidden" value="<?php echo https_url($candchgepwdurl); ?>" name="inputchgpwdUrl" id="inputchgpwdUrl"/>
                <input type="hidden" value="<?php echo https_url($candchgeemailurl); ?>" name="inputchgemailUrl" id="inputchgemailUrl"/>
                <div class="row">                    
                    <h3><b><img src="/images/icons/profile.png" alt="<?=lang('candidatelogin.myprofile');?>" title="<?=lang('candidatelogin.myprofile');?>" height="50px" /> <?=lang('candidatelogin.myprofile');?></b></h3>
                </div>
                <div class="row" style="text-align: center;">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary" id="profile-updateBtn"><?=lang('candidateprofile.companyprofupdBtn');?></button>
                        <!--<button type="button" class="btn btn-info" data-toggle="modal" data-target="#chgpasswdModal" title="<?=lang('candidateprofile.companyprofchgpwd');?>"><?=lang('candidateprofile.companyprofchgpwd');?></button>-->
                        <a href="<?php echo https_url($this->lang->lang()."/candidate/changepassword"); ?>" class="btn btn-info" title="<?=lang('candidateprofile.companyprofchgpwd');?>"><?=lang('candidateprofile.companyprofchgpwd');?></a>
                        <input type="reset" class="btn btn-danger" value="<?=lang('candidateprofile.companyprofresetBtn');?>" />
                    </div>                   
                </div><br />
                <!-- Personal Information section - start -->
                <!-- First Row - Start -->
                <div class="row">
                    <div class="col-md-12 col-lg-12">
                        <?php foreach($userData as $usrdt){ ?>
                            <input type="hidden" value="<?php echo $usrdt['candidate_email'];?>" name="profile-email" id="profile-email"/><br />
                            <!-- Profile Picture Row - Start -->
                            <?php if( empty($usrdt['candidate_profilepicurl']) ) { ?>
                                <div class="row">
                                    <div class="form-group clearfix">
                                        <div class="col-md-4">
                                            <b>Profile Picture:</b>
                                        </div>
                                        <div class="col-md-2">
                                            <img alt="User Pic" src="/images/profile-pic.jpg" class="img-circle img-responsive col-lg-6 col-md-9" />
                                            <button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#profilepicupldModal">Upload Profile Picture</button>
                                        </div>
                                    </div>
                                </div>
                            <?php } else { ?>
                                <div class="row">
                                    <div class="form-group clearfix">
                                        <div class="col-md-4">
                                            <b>Profile Picture:</b>
                                        </div>
                                        <div class="col-md-2">
                                            <img alt="User Pic" src="<?php echo '/images/candidate/photo/'.$usrdt['candidate_profilepicurl'];?>" class="img-circle img-responsive col-lg-6 col-md-9" />
                                            <button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#profilepicupldModal">Upload Profile Picture</button>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <!-- Profile Picture Row - End -->
                            <br />
                            <!--<div class="row">
                                <div class="col-md-4"><b>Video Resume URL:</b></div>
                                <div class="col-md-6"><input type="text" min="0" id="inputCandVidResume" name="inputCandVidResume" value="<?php echo $usrdt['video_resume_url']; ?>" class="form-control" required maxlength="255"/></div>
                            </div><br />-->
                            <div class="row">
                                <div class="form-group clearfix">
                                    <div class="col-md-4"><b><?=lang('candidateprofile.firstName')?>:</b></div>
                                    <div class="col-md-6"><input type="text" min="0" id="inputCandFirstname" name="inputCandFirstname" value="<?php echo $usrdt['candidate_firstname']; ?>" class="form-control" required maxlength="20"/></div>
                                </div>
                            </div><br />
                            <div class="row">
                                <div class="form-group clearfix">
                                    <div class="col-md-4"><b><?=lang('candidateprofile.lastName')?>:</b></div>
                                    <div class="col-md-6"><input type="text" min="0" id="inputCandLastname" name="inputCandLastname" value="<?php echo $usrdt['candidate_lastname']; ?>" class="form-control" required maxlength="20"/></div>
                                </div>
                            </div><br />
                            <div class="row">
                                <div class="form-group clearfix">
                                    <div class="col-md-4"><b><?=lang('candidatesignup.gender');?>:</b></div>
                                    <div class="col-md-6">
                                        <div class="input-group">
                                            <input type="radio" name="inputCandGender" id="inlineRadio1" value="Male"
                                            <?php
                                             if( $usrdt['candidate_gender'] == 'Male' && !empty( $usrdt['candidate_gender'] ) ){ echo "checked"; }
                                            ?>
                                            /> <?=lang('candidatesignup.genderoptn1');?>&nbsp;&nbsp;&nbsp;
                                            <input type="radio" name="inputCandGender" id="inlineRadio2" value="Female" 
                                            <?php
                                             if( $usrdt['candidate_gender'] != 'Male' && !empty( $usrdt['candidate_gender'] ) ){ echo "checked"; }
                                            ?>
                                            /> <?=lang('candidatesignup.genderoptn2');?>
                                        </div>
                                    </div>
                                </div>
                            </div><br />
                            <div class="row">
                                <div class="form-group clearfix">
                                    <div class="col-md-4"><b><?=lang('candidatesignup.totyearsexperience');?>:</b></div>
                                    <div class="col-md-6"><input type="number" min="0" id="inputTotExperience" name="inputTotExperience" value="<?php echo $usrdt['candidate_total_experience'];?>" class="form-control" required maxlength="2"/></div>
                                </div>
                            </div><br />
                            <div class="row">
                                <div class="form-group clearfix">
                                    <div class="col-md-4"><b><?=lang('candidateprofile.phonenumber')?>:</b></div>
                                    <div class="col-sm-2 col-xs-4 col-md-2">
                                        <select id="id_phone_country_code" name="id_phone_country_code" class="required form-control col-lg-3">
                                            <option value="0">Please Select</option>
                                            <?php
                                                $candidateCurrCode = $usrdt['candidate_phonecountrycode'];
                                                $visa_status_list = $this->login_database->set_candCountry();
                                                foreach($visa_status_list as $v) {
                                                    if($candidateCurrCode != null || $candidateCurrCode != "") {
                                                        echo '<option name="'.$v['country_code'].'" value="'.$v['country_code'].' (+'.$v['country_phone_code'].')"';
                                                        if($v['country_code'].' (+'.$v['country_phone_code'].')' == $candidateCurrCode) {
                                                            echo "selected";
                                                        }
                                                        echo '>'.$v['country_code'].' (+'.$v['country_phone_code'].')</option>';
                                                    } else {
                                                        echo '<option name="'.$v['country_code'].' (+'.$v['country_phone_code'].') value="'.$v['country_code'].' (+'.$v['country_phone_code'].')">'.$v['country_name'].'</option>';
                                                    }                                                    
                                                }                                    
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-sm-7 col-xs-8 col-md-3">
                                        <input type="number" min="0" id="inputPhonenumber" name="inputPhonenumber" value="<?php echo $usrdt['candidate_phonenumber'];?>" class="form-control" required maxlength="20"/>
                                    </div>
                                </div>
                            </div><br />
                            <div class="row">
                                <div class="form-group clearfix">
                                    <div class="col-md-4"><b><?=lang('candidateprofile.email')?>:</b></div>
                                    <div class="col-md-6"><?php echo $usrdt['candidate_email'];?>&nbsp;<button type="button" class="btn btn-xs btn-default" data-toggle="modal" data-target="#changeEmailModal"><strong>Change</strong></button></div>
                                </div>
                            </div><br />                      
                            <div class="row">
                                <div class="form-group clearfix">
                                    <div class="col-md-4"><b><?=lang('candidateprofile.briefdescription')?>:</b></div>
                                </div>
                            </div><br />
                            <div class="row">
                                <div class="form-group clearfix">
                                    <div class="col-md-12 col-lg-12">
                                        <textarea class="form-control" rows="6" id="inputbriefDesc" name="inputbriefDesc"><?php echo $usrdt['brief_description'];?></textarea>
                                    </div>
                                </div>
                            </div>
                        <?php 
                            $candidate_email = $usrdt['candidate_email'];
                            $resume = $usrdt['resume_url'];
                            $Vidresume = $usrdt['video_resume_url'];
                        } ?>
                    </div>
                </div><br />
                <!-- First Row - End -->
                
                <!-- Resume Row - Start -->
                <?php if( empty($resume) ) { ?>
                    <div class="row">
                        <div class="form-group clearfix">
                            <div class="col-md-12 col-lg-12">
                                <div class="col-md-2">
                                    <b><?=lang('candidateprofile.resumeUpd')?>:</b>
                                </div>
                                <div class="col-md-6">
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#resumeuploadModal"><?=lang('candidateprofile.ResumeUploadBtn')?></button>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } else { ?>
                    <div class="row">
                        <div class="form-group clearfix">
                            <div class="col-md-12 col-lg-12">
                                <div class="col-md-2">
                                    <b><?=lang('candidateprofile.resumeUpd')?>:</b>
                                </div>
                                <div class="col-md-6">                        
                                    <a class="btn btn-primary" id="resumeDownlod" data-toggle="modal" data-target="#ResumedownloadModal" title="<?php echo $resume; ?>"><?=lang('candidateprofile.viewResumeBtn')?></a>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#resumeuploadModal"><?=lang('candidateprofile.ResumeUploadBtn')?></button>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <!-- Resume Row - End -->
                <!-- Personal Information section - end -->
            </form>
            <!-- Change password window -- Start -->
            <div class="modal fade" id="chgpasswdModal" tabindex="-1" role="dialog" aria-labelledby="chgpasswdModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="chgpasswdModalLabel"><?=lang('candidateprofile.companyprofchgpwd');?></h4>                                             
                        </div>
                        <div class="modal-body">
                            <center><span id="modal-error-msg" style="color: red;"></span></center>
                            <form method="post" accept-charset="utf-8" enctype="multipart/form-data" role="form" id="candidate_chgpassword-form">
                                <input type="hidden" name="candidate-profile-email" id="candidate-profile-email" value="<?php echo $candidate_email;?>" />
                                <div class="form-group">
                                    <label for="recipient-name" class="control-label"><?=lang('candidateprofile.companyprofchgpwdlbl1');?>:</label>
                                    <input type="password" class="form-control" id="newPassword" name="newPassword"/>
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="control-label"><?=lang('candidateprofile.companyprofchgpwdlbl2');?>:</label>
                                    <input type="password" class="form-control" id="confirmnewPassword" name="confirmnewPassword"/>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" id="password-btn-save">Save</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Change password window -- End -->
            
            <!-- Profile Picture window -- Start -->
            <div class="modal fade" id="profilepicupldModal" tabindex="-1" role="dialog" aria-labelledby="myprofilepicupldModal" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title" id="myModalLabel">Upload Profile Picture</h4>
                        </div>
                        <div class="modal-body">
                            <center><span id="modal-error-msg" style="color: red;"></span></center>
                            <?php
                                $uploadprofilpic_url = https_url($this->lang->lang().'/candidate/candidate_profilepicupload');
                            ?>
                            <iframe src="<?php echo $uploadprofilpic_url; ?>" width="100%" height="130" frameborder="0" allowtransparency="true"></iframe>
                        </div><br /><br />
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->
            <!-- Profile Picture window -- End -->
            
            <!-- Upload Resume window -- Start -->
            <div class="modal fade" id="resumeuploadModal" tabindex="-1" role="dialog" aria-labelledby="myresumeuploadModal" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
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
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->
            <!-- Upload Resume window -- End -->
            <!-- Change Email Address window -- Start -->
            <div class="modal fade" id="changeEmailModal" tabindex="-1" role="dialog" aria-labelledby="chgemailModal" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
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
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" id="chgemail-btn-save">Save</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->
            <!-- Change Email Address window -- End -->
        </div>
    </div>
</div>
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
<!-- Modal Dialog for downloading Resume - Start -->
<div class="modal fade bs-example-modal-sm" id="ResumedownloadModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"> Downloading... <iframe id="resumedownloadframe" height="1px" width="1px"></iframe> </h4>
            </div>
        </div>
    </div>
</div>
-->