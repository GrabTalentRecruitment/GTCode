<script type="text/javascript" src="/js/site_admin/siteAdmin_profile.js" defer></script>
<div class="site-wrapper vert-offset-top-6">
    <div class="site-wrapper-inner">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <?php
                        $userData = $this->session->userdata('admin_data');
                    ?>
                </div>
            </div>
            <?php
                $Vidresume = '';
                $candidate_email = ''; 
            ?>
            <form method="post" enctype="multipart/form-data" role="form" class="form-horizontal">
                <div class="row">
                    <center>
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary" id="profile-updateBtn"><?=lang('candidateprofile.companyprofupdBtn');?></button>
                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#chgpasswdModal" title="<?=lang('candidateprofile.companyprofchgpwd');?>"><?=lang('candidateprofile.companyprofchgpwd');?></button>
                            <input type="reset" class="btn btn-danger" value="<?=lang('candidateprofile.companyprofresetBtn');?>" />
                        </div>
                    </center>                    
                </div><br />
                <!-- Personal Information section - start -->
                <!-- First Row - Start -->
                <div class="row">
                    <div class="col-md-8">
                        <?php foreach($userData as $usrdt){ ?>
                            <input type="hidden" value="<?php echo $usrdt['admin_email'];?>" name="profile-email" id="profile-email"/><br />
                            <div class="row">
                                <div class="col-md-4"><b><?=lang('candidateprofile.firstName')?>:</b></div>
                                <div class="col-md-6"><input type="text" min="0" id="inputCandFirstname" name="inputCandFirstname" value="<?php echo $usrdt['admin_firstname']; ?>" class="form-control" required maxlength="20"/></div>
                            </div><br />
                            <div class="row">
                                <div class="col-md-4"><b><?=lang('candidateprofile.lastName')?>:</b></div>
                                <div class="col-md-6"><input type="text" min="0" id="inputCandLastname" name="inputCandLastname" value="<?php echo $usrdt['admin_lastname']; ?>" class="form-control" required maxlength="20"/></div>
                            </div><br />
                            <div class="row">
                                <div class="col-md-4"><b><?=lang('candidateprofile.phonenumber')?>:</b></div>
                                <div class="col-md-6"><input type="number" min="0" id="inputPhonenumber" name="inputPhonenumber" value="<?php echo $usrdt['admin_phone'];?>" class="form-control" required maxlength="20"/></div>
                            </div><br />
                            <div class="row">
                                <div class="col-md-4"><b><?=lang('candidateprofile.email')?>:</b></div>
                                <div class="col-md-6"><?php echo $usrdt['admin_email'];?></div>
                            </div>
                        <?php 
                            $candidate_email = $usrdt['admin_email'];
                        } ?>
                    </div>
                </div><br />
                <!-- First Row - End -->
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
            <!-- Change Email Address window -- Start -->
            <!--<div class="modal fade" id="changeEmailModal" tabindex="-1" role="dialog" aria-labelledby="chgemailModal" aria-hidden="true">
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
                </div>
            </div>-->
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