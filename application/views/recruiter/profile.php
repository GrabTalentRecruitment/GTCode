<?php 
$homeurl = $this->lang->lang().'/recruiter';
$profileupdate_url = $this->lang->lang().'/recruiter/profile_update';
$changepasswordupdate_url = $this->lang->lang().'/recruiter/change_recruiter_password';
?>
<script type="text/javascript" src="/js/recruiter/recruiter_profile.js" defer="true"></script>
<style type="text/css">
input[type=number]::-webkit-inner-spin-button, input[type=number]::-webkit-outer-spin-button { -webkit-appearance: none; margin: 0; }
</style>
<input type="hidden" id="inputhomeurl" value="<?php echo https_url($homeurl); ?>" />
<input type="hidden" id="inputprofupdurl" value="<?php echo https_url($profileupdate_url); ?>" />
<input type="hidden" id="inputchgpasswordurl" value="<?php echo https_url($changepasswordupdate_url); ?>" />

<!-- Profile Picture window -- Start -->
<div class="page-content container" id="profilepicupldModal" style="display:none; background-color:white; margin-top:5px; border-radius:10px;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="button" id="div_close" style="float: right; font-size:15px;">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Upload Corporate Logo Picture</h4>
            </div>
            <div class="modal-body">
                <center><span id="modal-error-msg" style="color: red;"></span></center>
                <?php
                    $uploadprofilpic_url = https_url($this->lang->lang().'/recruiter/recruiter_corporatelogpicupload');
                ?>
                <iframe src="<?php echo $uploadprofilpic_url; ?>" width="100%" height="110" frameborder="0" allowtransparency="true"></iframe>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
</div>
<!-- Profile Picture window -- End -->

<div class="site-content" >
    <?php 
        $condition = "employer_contact_email =" . "'" . $this->session->userdata('recruiter_login') . "'";
        $this->db->select('*')->from('employers')->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $userData = $query->result_array();
        } else {
            $userData = '';
        }
        $Vidresume = $candidate_email = ''; 
    ?>
    <form method="post" enctype="multipart/form-data" role="form" class="form-horizontal">
        <?php foreach($userData as $usrdt){ ?>
            <input type="hidden" value="<?php echo $usrdt['employer_contact_email'];?>" name="profile-email" id="profile-email"/><br />
            
            <div class="container page-header">
                <div class="row">
                    <div class="col-md-6 no-padding">
                        <h1 class="page-title font-1"><?=lang('recruiterlogin.companyprofile');?></h1>
                    </div>
                    <div class="col-md-6 no-padding">
                        <div class="page-submenu">
                            <button type="submit" class="button" id="profile-updateBtn"><?=lang('recruiterlogin.companyprofupdBtn');?></button>
                            <input type="reset" class="button" value="<?=lang('recruiterlogin.companyprofresetBtn');?>" />
                        </div>
                    </div>
                </div>
            </div>

            <div class="page-content container">
            
                <div class="row info-row">
                    <div class="col-md-6 info-col">
                        <!-- Profile Picture Row - Start -->
                        <?php if( empty($usrdt['employer_logo_url']) ) { ?>
                            <div>
                                <label for="">Recruiter Corporate Logo:</label>
                                <img alt="User Pic" style="height: 100px;" src="/images/profile-pic.jpg" class="img-responsive" />
                                <button type="button" class="button" id="profileUpdbtn">Upload Corporate Logo</button>
                            </div>
                        <?php } else { ?>
                            <div>
                                <label for="">Recruiter Corporate Logo:</label>
                                <img alt="User Pic" style="height: 100px;" src="<?php echo '/images/recruiter/logo/'.$usrdt['employer_logo_url'];?>" class="img-responsive" />
                                <button type="button" class="button" id="profileUpdbtn">Upload Corporate Logo</button>
                            </div>
                        <?php } ?>
                        <!-- Profile Picture Row - End -->
                        <div>
                            <label for=""><?=lang('recruiterlogin.companyName')?>: </label><br />                            
                            <input type="text" min="0" id="inputEmpName" name="inputEmpName" value="<?php echo $usrdt['employer_name'];?>" disabled />
                        </div>
                        <div>
                            <label for=""><?=lang('recruiterlogin.companyURL')?>: </label><br />
                            <a href="<?php echo $usrdt['employer_web_address'];?>" target="_blank"><?php echo $usrdt['employer_web_address'];?></a>
                        </div>
                        <div>
                            <label for=""><?=lang('recruiterlogin.companyphone')?>: </label><br />
                            <input type="number" min="0" id="inputPhonenumber" name="inputPhonenumber" value="<?php echo $usrdt['employer_phone'];?>" required maxlength="20"/>
                        </div>
                        <div>
                            <label for=""><?=lang('recruiterlogin.companyFax')?>: </label><br />
                            <input type="number" min="0" id="inputFaxnumber" name="inputFaxnumber" value="<?php echo $usrdt['employer_fax'];?>" maxlength="10"/>
                        </div>
                    </div>
                    <div class="col-md-6 info-col">
                        <div>
                            <label for=""><?=lang('recruiterlogin.companyContactFname')?>: </label><br />
                            <input type="text" min="0" id="inputEmpctntFirstName" name="inputEmpctntFirstName" value="<?php echo $usrdt['employer_contact_firstname'];?>" required maxlength="20"/>
                        </div>
                        <div>
                            <label for=""><?=lang('recruiterlogin.companyContactLname')?>: </label><br />
                            <input type="text" min="0" id="inputEmpctntLastName" name="inputEmpctntLastName" value="<?php echo $usrdt['employer_contact_lastname'];?>" required maxlength="20"/>
                        </div>
                        <div>
                            <label for=""><?=lang('recruiterlogin.companyContactEmail')?>: </label><br />
                            <input type="email" min="0" id="inputEmpContactEmail" name="inputEmpContactEmail" value="<?php echo $usrdt['employer_contact_email'];?>" required maxlength="100" disabled />
                        </div>
                        <div>
                            <label for=""><?=lang('recruiterlogin.companyContactAddress')?>: </label><br />
                            <input type="text" min="0" id="inputEmpContactAddress" name="inputEmpContactAddress" value="<?php echo $usrdt['employer_address'];?>" required maxlength="100"/>
                        </div>
                    </div>
                
                </div>
                <div class="row info-row">
                    <div class="col-md-12 info-col">
                        <div>
                            <label for=""><?=lang('recruiterlogin.companyContactBriefDesc')?>: </label><br />
                            <textarea rows="6" id="inputbriefDesc" name="inputbriefDesc"><?php echo $usrdt['employer_description'];?></textarea>
                        </div>
                    </div>
                </div>
            
                <p>&nbsp;</p>
                <p>&nbsp;</p>
            </div>
            
            <div class="clearfix"></div><br /><br />
            <?php $candidate_email = $usrdt['employer_contact_email']; } ?>
            
    </form>
    
</div> <!-- end site-content -->

