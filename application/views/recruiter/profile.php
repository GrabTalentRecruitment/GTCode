<?php 
$homeurl = $this->lang->lang().'/recruiter';
$profileupdate_url = $this->lang->lang().'/recruiter/profile_update';
$changepasswordupdate_url = $this->lang->lang().'/recruiter/change_recruiter_password';
?>
<script type="text/javascript" src="/js/recruiter/recruiter_profile.js" defer="true"></script>
<style type="text/css">
input[type=number]::-webkit-inner-spin-button, input[type=number]::-webkit-outer-spin-button { -webkit-appearance: none; margin: 0; }
</style>
<div class="vert-offset-top-5 visible-lg visible-md"></div>
<div class="vert-offset-top-10 visible-sm"></div>
<input type="hidden" id="inputhomeurl" value="<?php echo https_url($homeurl); ?>" />
<input type="hidden" id="inputprofupdurl" value="<?php echo https_url($profileupdate_url); ?>" />
<input type="hidden" id="inputchgpasswordurl" value="<?php echo https_url($changepasswordupdate_url); ?>" />
<div class="site-wrapper">
    <div class="site-wrapper-inner">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <?php 
                        $condition = "employer_contact_email =" . "'" . $this->session->userdata('recruiter_login') . "'";
                        $this->db->select('*');
                        $this->db->from('employers');
                        $this->db->where($condition);
                        $query = $this->db->get();
                        if ($query->num_rows() > 0) {
                            $userData = $query->result_array();
                        } else {
                            $userData = '';
                        }
                     ?>
                </div>
            </div>
            <?php $Vidresume = $candidate_email = ''; ?>
            <form method="post" enctype="multipart/form-data" role="form" class="form-horizontal">
                <div class="row">                    
                    <h3><b><img src="/images/icons/profile.png" alt="<?=lang('recruiterlogin.companyprofile');?>" title="<?=lang('recruiterlogin.companyprofile');?>" height="50px" /> <?=lang('recruiterlogin.companyprofile');?></b></h3>
                </div>
                <div class="row" style="text-align: center;">
                    <div class="col-md-12 hidden-xs">
                        <button type="submit" class="btn btn-primary" id="profile-updateBtn"><?=lang('recruiterlogin.companyprofupdBtn');?></button>
                        <!--<button type="button" class="btn btn-info" data-toggle="modal" data-target="#chgpasswdModal" title="<?=lang('recruiterlogin.companyprofchgpwd');?>"><?=lang('recruiterlogin.companyprofchgpwd');?></button>-->
                        <input type="reset" class="btn btn-danger" value="<?=lang('recruiterlogin.companyprofresetBtn');?>" />
                    </div>
                    <div class="col-xs-12 visible-xs">
                        <button type="submit" class="btn btn-primary col-xs-12" id="profile-updateBtn"><?=lang('recruiterlogin.companyprofupdBtn');?></button><br /><br />
                        <!--<button type="button" class="btn btn-info col-xs-12" data-toggle="modal" data-target="#chgpasswdModal" title="<?=lang('recruiterlogin.companyprofchgpwd');?>"><?=lang('recruiterlogin.companyprofchgpwd');?></button><br /><br />-->
                        <input type="reset" class="btn btn-danger col-xs-12" value="<?=lang('recruiterlogin.companyprofresetBtn');?>" />
                    </div>                    
                </div><br />
                <!-- Personal Information section - start -->
                <!-- First Row - Start -->
                <div class="row">
                    <div class="col-md-8 col-lg-12">
                        <?php foreach($userData as $usrdt){ ?>
                            <input type="hidden" value="<?php echo $usrdt['employer_contact_email'];?>" name="profile-email" id="profile-email"/><br />
                            <!-- Profile Picture Row - Start -->
                            <?php if( empty($usrdt['employer_logo_url']) ) { ?>
                                <div class="row">
                                    <div class="form-group clearfix">
                                        <div class="col-md-4">
                                            <b>Recruiter Corporate Logo:</b>
                                        </div>
                                        <div class="col-md-2">
                                            <img alt="User Pic" src="/images/profile-pic.jpg" class="img-responsive col-lg-6 col-md-9" />
                                            <button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#profilepicupldModal">Upload Corporate Logo</button>
                                        </div>
                                    </div>
                                </div>
                            <?php } else { ?>
                                <div class="row">
                                    <div class="form-group clearfix">
                                        <div class="col-md-4">
                                            <b>Recruiter Corporate Logo:</b>
                                        </div>
                                        <div class="col-md-2">
                                            <img alt="User Pic" src="<?php echo '/images/recruiter/logo/'.$usrdt['employer_logo_url'];?>" class="img-responsive col-lg-6 col-md-9" />
                                            <button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#profilepicupldModal">Upload Corporate Logo</button>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <!-- Profile Picture Row - End -->
                            <div class="row">
                                <div class="form-group clearfix">
                                    <div class="col-md-4"><b><?=lang('recruiterlogin.companyName')?>:</b></div>
                                    <div class="col-md-6"><?php echo $usrdt['employer_name'];?></div>
                                </div>
                            </div><br />
                            <div class="row">
                                <div class="form-group clearfix">
                                    <div class="col-md-4"><b><?=lang('recruiterlogin.companyURL')?>:</b></div>
                                    <div class="col-md-6"><a href="<?php echo $usrdt['employer_web_address'];?>" target="_blank"><?php echo $usrdt['employer_web_address'];?></a></div>
                                </div>
                            </div><br />
                            <div class="row">
                                <div class="form-group clearfix">
                                    <div class="col-md-4"><b><?=lang('recruiterlogin.companyphone')?>:</b></div>
                                    <div class="col-md-6"><input type="number" min="0" id="inputPhonenumber" name="inputPhonenumber" value="<?php echo $usrdt['employer_phone'];?>" class="form-control" required maxlength="20"/></div>
                                </div>                                
                            </div><br />
                            <div class="row">
                                <div class="form-group clearfix">
                                    <div class="col-md-4"><b><?=lang('recruiterlogin.companyFax')?>:</b></div>
                                    <div class="col-md-6"><input type="number" min="0" id="inputFaxnumber" name="inputFaxnumber" value="<?php echo $usrdt['employer_fax'];?>" class="form-control" required maxlength="10"/></div>
                                </div>
                            </div><br />
                            <div class="row">
                                <div class="form-group clearfix">
                                    <div class="col-md-4"><b><?=lang('recruiterlogin.companyContactFname')?>:</b></div>
                                    <div class="col-md-6"><input type="text" min="0" id="inputEmpctntFirstName" name="inputEmpctntFirstName" value="<?php echo $usrdt['employer_contact_firstname'];?>" class="form-control" required maxlength="20"/></div>
                                </div>
                            </div><br />
                            <div class="row">
                                <div class="form-group clearfix">
                                    <div class="col-md-4"><b><?=lang('recruiterlogin.companyContactLname')?>:</b></div>
                                    <div class="col-md-6"><input type="text" min="0" id="inputEmpctntLastName" name="inputEmpctntLastName" value="<?php echo $usrdt['employer_contact_lastname'];?>" class="form-control" required maxlength="20"/></div>
                                </div>
                            </div><br />
                            <div class="row">
                                <div class="form-group clearfix">
                                    <div class="col-md-4"><b><?=lang('recruiterlogin.companyContactEmail')?>:</b></div>
                                    <div class="col-md-6"><input type="email" min="0" id="inputEmpContactEmail" name="inputEmpContactEmail" value="<?php echo $usrdt['employer_contact_email'];?>" class="form-control" required maxlength="100" disabled /></div>
                                </div>
                            </div><br />
                            <div class="row">
                                <div class="form-group clearfix">
                                    <div class="col-md-4"><b><?=lang('recruiterlogin.companyContactAddress')?>:</b></div>
                                    <div class="col-md-6"><input type="text" min="0" id="inputEmpContactAddress" name="inputEmpContactAddress" value="<?php echo $usrdt['employer_address'];?>" class="form-control" required maxlength="100"/></div>
                                </div>
                            </div><br />
                            <div class="row">
                                <div class="form-group clearfix">
                                    <div class="col-md-4"><b><?=lang('recruiterlogin.companyContactBriefDesc')?>:</b></div>
                                </div>                            
                            </div><br />
                            <div class="row">
                                <div class="form-group clearfix">
                                    <div class="col-md-12">
                                        <textarea class="form-control" rows="6" id="inputbriefDesc" name="inputbriefDesc"><?php echo $usrdt['employer_description'];?></textarea>
                                    </div>
                                </div>
                            </div>
                        <?php $candidate_email = $usrdt['employer_contact_email'];
                        } ?>
                    </div>
                </div><br />
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
                            <h4 class="modal-title" id="myModalLabel">Upload Corporate Logo Picture</h4>
                        </div>
                        <div class="modal-body">
                            <center><span id="modal-error-msg" style="color: red;"></span></center>
                            <?php
                                $uploadprofilpic_url = https_url($this->lang->lang().'/recruiter/recruiter_corporatelogpicupload');
                            ?>
                            <iframe src="<?php echo $uploadprofilpic_url; ?>" width="100%" height="110" frameborder="0" allowtransparency="true"></iframe>
                        </div><br /><br />
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->
            <!-- Profile Picture window -- End -->
            
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
<!-- Modal Dialog for Success & Failure Messages - End -->