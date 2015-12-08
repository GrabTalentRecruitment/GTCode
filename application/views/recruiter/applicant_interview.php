<?php $applnIntervew_actionurl = https_url($this->lang->lang().'/recruiter/applicant_interview_action'); ?>
<script type="text/javascript" src="/js/recruiter/applicant_tracking/recruiter_applicantIntvw.js" defer="true"></script>
<script type="text/javascript" src="/js/bootstrap-datepicker.min.js" defer="true"></script>
<script src="/js/bootstrap/bootstrap-wysiwyg.js" defer="true"></script>
<script src="/js/bootstrap/jquery.hotkeys.js" defer="true"></script>
<script src="/js/bootstrap/google-code-prettify.js" defer="true"></script>
<link href="/css/bootstrap-datepicker3.min.css" rel="stylesheet"/>
<div class="vert-offset-top-5 visible-lg visible-md"></div>
<div class="vert-offset-top-10 visible-sm"></div>
<input type="hidden" id="applnInterviewAction" value="<?php echo $applnIntervew_actionurl; ?>" />
<div class="site-wrapper">
    <div class="site-wrapper-inner">
        <div class="container">            
            <form method="post" enctype="multipart/form-data" role="form" class="form-horizontal">
                <div class="row">                    
                    <h3><b><img src="/images/icons/profile.png" alt="<?=lang('applicantTrack.btnlabel2_1');?>" title="<?=lang('applicantTrack.btnlabel2_1');?>" height="50px" /> <?=lang('applicantTrack.btnlabel2_1');?></b></h3>
                </div>
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingOne">
                            <h4 class="panel-title">
                                <a role="button" data-toggle="collapse" data-parent="#accordion" aria-expanded="true" aria-controls="collapseOne"><strong><?=lang('applicantTrack.btnlabelheading2_1');?></strong></a>
                            </h4>
                        </div>
                        <?php
                            $tmpuserData = array('username' => $this->session->userdata('recruiter_login') );
                            $userData = $this->login_database->read_user_information($tmpuserData,'employer'); 
                            $candidId = $this->uri->segment(4);
                            $jobRefId = $this->uri->segment(5);
                            $jobDet = $this->login_database->read_job_information( $jobRefId );
                            $condition = "candidate_coderefs_id ='".$candidId."'";
                            $this->db->select('*')->from('candidate_signup')->where($condition);
                            $query = $this->db->get();
                            if ($query->num_rows() > 0) { $candidDet = $query->result_array(); } else { $candidDet = ''; }
                            //print_r($candidDet);                            
                        ?>
                        <input type="hidden" id="intvwRecruiterName" value="<?php echo $userData[0]['employer_contact_firstname']." ".$userData[0]['employer_contact_lastname']; ?>" />
                        <input type="hidden" id="intvwRecruiterEmail" value="<?php echo $userData[0]['employer_contact_email']; ?>" />
                        <input type="hidden" id="intvwJobRefId" value="<?php echo $jobRefId; ?>" />
                        <input type="hidden" id="intvwJobName" value="<?php echo $jobDet[0]['job_title']; ?>" />
                        <input type="hidden" id="intvwCandidateId" value="<?php echo $candidDet[0]['candidate_coderefs_id']; ?>" />
                        <input type="hidden" id="intvwCandidateName" value="<?php echo $candidDet[0]['candidate_lastname']." ".$candidDet[0]['candidate_firstname']; ?>" />
                        <div id="collapseOne" class="panel-collapse collapse-in" role="tabpanel" aria-labelledby="headingOne" aria-expanded="true">
                            <span id="modal-error-msg" style="color: red; text-align:center;"></span>
                            <div class="panel-body">
                                <div class="form-group">
                                    <label class="control-label col-lg-2 col-md-2" for="email">Job Name: </label>
                                    <div class="col-lg-6 col-md-6">
                                        <label class="control-label" for="jobtitle"><?php echo $jobDet[0]['job_title']; ?></label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-lg-2 col-md-2" for="email">Candidate Name: </label>
                                    <div class="col-lg-6 col-md-6">
                                        <label class="control-label" for="candidatetitle"><?php echo $candidDet[0]['candidate_lastname']." ".$candidDet[0]['candidate_firstname']; ?></label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-lg-2 col-md-2" for="email">Date: <font color="red" size="4px">*</font> </label>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="input-group date">
                                            <input type="text" class="form-control" id="intvwPrimaryDate" placeholder="Select date" />
                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-lg-2 col-md-2" for="time">Start Time: <font color="red" size="4px">*</font> </label>
                                    <div class="col-lg-2 col-md-2">
                                        <select id="intvwPrimaryStartTime" class="form-control">
                                            <?php
                                                for($i=0; $i<24; $i++) {
                                                    for($j=0; $j<=59; $j++) {
                                                        if($i < 10) {
                                                            if($j < 10) {
                                                                if($j % 5 == 0) {
                                                                    echo "<option value = 0".$i.":0".$j.">0".$i.":0".$j."</option>";
                                                                }                                                                    
                                                            } else {
                                                                if($j % 5 == 0) {
                                                                    echo "<option value = 0".$i.":".$j.">0".$i.":".$j."</option>";
                                                                }
                                                            }
                                                        } else {
                                                            if($j < 10) {
                                                                if($j % 5 == 0) {
                                                                    echo "<option value = ".$i.":0".$j.">".$i.":0".$j."</option>";
                                                                }    
                                                            } else {
                                                                if($j % 5 == 0) {
                                                                    echo "<option value = ".$i.":".$j.">".$i.":".$j."</option>";
                                                                }
                                                            }
                                                        }                                                        
                                                    }    
                                                }                                                
                                            ?>
                                        </select>
                                    </div>
                                    <label class="control-label col-lg-2 col-md-2" for="time">End Time: <font color="red" size="4px">*</font> </label>
                                    <div class="col-lg-2 col-md-2">
                                        <select id="intvwPrimaryEndTime" class="form-control">
                                            <?php
                                                for($i=0; $i<24; $i++) {
                                                    for($j=0; $j<=59; $j++) {
                                                        if($i < 10) {
                                                            if($j < 10) {
                                                                if($j % 5 == 0) {
                                                                    echo "<option value = 0".$i.":0".$j.">0".$i.":0".$j."</option>";
                                                                }                                                                    
                                                            } else {
                                                                if($j % 5 == 0) {
                                                                    echo "<option value = 0".$i.":".$j.">0".$i.":".$j."</option>";
                                                                }
                                                            }
                                                        } else {
                                                            if($j < 10) {
                                                                if($j % 5 == 0) {
                                                                    echo "<option value = ".$i.":0".$j.">".$i.":0".$j."</option>";
                                                                }    
                                                            } else {
                                                                if($j % 5 == 0) {
                                                                    echo "<option value = ".$i.":".$j.">".$i.":".$j."</option>";
                                                                }
                                                            }
                                                        }                                                       
                                                    }    
                                                }                                                
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-lg-2 col-md-2" for="timezone">Timezone: <font color="red" size="4px">*</font> </label>
                                    <div class="col-lg-6 col-md-6">
                                        <select id="intvwPrimarytimeZone" class="form-control">
                                            <option value="0" selected="true">-None-</option>
                                            <?php
                                                $timeZoneArr = $this->login_database->timezone_list(); 
                                                foreach($timeZoneArr as $timezoneVal) {
                                                    echo "<option value=".$timezoneVal['timezone_id'].">(".$timezoneVal['timezone_utc'].") ".$timezoneVal['timezone_city']."</option>"; 
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-lg-2 col-md-2" for="timezone">Location: <font color="red" size="4px">*</font> </label>
                                    <div class="col-lg-6 col-md-6">
                                        <textarea class="form-control" rows="5" id="intvwPrimaryLocation"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-lg-2 col-md-2" for="email">Person to Contact: <font color="red" size="4px">*</font> </label>
                                    <div class="col-lg-6 col-md-6">
                                        <input type="text" class="form-control" id="intvwPriminterviewer" placeholder="Person to Contact" />
                                    </div>
                                </div>
                            </div>
                            <div class="panel-footer" style="text-align: center;">
                                <button id="Intvwstage-updateBtn" class="btn btn-primary" type="button" data-parent="accordian" data-toggle="collapse" data-target="#collapseExample" aria-expanded="true" aria-controls="collapseOne"><?=lang('applicantTrack.btnIntvwlabel');?></button>
                                <button type="reset" class="btn btn-danger" title="<?=lang('recruiterlogin.companyprofresetBtn');?>"><?=lang('recruiterlogin.companyprofresetBtn');?></button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <!-- Email format to user - start -->
            <div class="collapse" id="collapseCandidateEmail">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <form method="post" id="candEmailFrm" enctype="multipart/form-data">
                            <div id="candidEmailcontent">
                                <div class="form-group">
                                    <label class="control-label col-lg-2 col-md-2" for="email">Email To: </label>
                                    <div class="col-lg-6 col-md-6"><?php echo $candidDet[0]['candidate_lastname']." ".$candidDet[0]['candidate_firstname']; ?>
                                    </div>
                                </div><br /><br />
                                <div class="form-group">
                                    <label class="control-label col-lg-2 col-md-2" for="email">Email Subject: <font color='red' size='4px'>*</font> </label>
                                    <div class="col-lg-6 col-md-6">
                                        <input type="text" id="candidEMailSubject" class="form-control" value="<?php echo "Interview schedule for the position of ".$jobDet[0]['job_title']."";?>" placeholder="Enter Email subject here" required />
                                    </div>
                                </div><br /><br /><br />
                                <div class="form-group">
                                    <label class="control-label col-lg-2 col-md-2" for="email">Email Body: <font color='red' size='4px'>*</font> </label>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="btn-toolbar" data-role="editor-toolbar" data-target="#editor">
                                            <div class="btn-group">
                                                <a class="btn" data-edit="bold" title="Bold (Ctrl/Cmd+B)"><i class="fa fa-bold"></i></a>
                                                <a class="btn" data-edit="italic" title="Italic (Ctrl/Cmd+I)"><i class="fa fa-italic"></i></a>
                                                <a class="btn" data-edit="strikethrough" title="Strikethrough"><i class="fa fa-strikethrough"></i></a>
                                                <a class="btn" data-edit="underline" title="Underline (Ctrl/Cmd+U)"><i class="fa fa-underline"></i></a>
                                            </div>
                                            <div class="btn-group">
                                                <a class="btn" data-edit="insertunorderedlist" title="Bullet list"><i class="fa fa-list-ul"></i></a>
                                                <a class="btn" data-edit="insertorderedlist" title="Number list"><i class="fa fa-list-ol"></i></a>
                                                <a class="btn" data-edit="outdent" title="Reduce indent (Shift+Tab)"><i class="fa fa-indent-left"></i></a>
                                                <a class="btn" data-edit="indent" title="Indent (Tab)"><i class="fa fa-indent-right"></i></a>
                                            </div>
                                        </div><br />
                                        <div id="editor" name="inputEmailBody"></div>
                                        <div id="inputintvwtmpl" name="inputintvwtmpl" style="display: none;">
                                            <?php
                                                $condition = "employer_contact_email ='".$this->session->userdata('recruiter_login')."'";
                                                $this->db->select('template_interview')->from('grabtalent_template')->where($condition);
                                                $query = $this->db->get();
                                                if ($query->num_rows() > 0) { $tmplintvw = $query->result_array(); } else { return false; } 
                                                if($tmplintvw) {
                                                    foreach($tmplintvw as $tmpl_intvw) { 
                                                        echo $tmpl_intvw['template_interview'];
                                                    }
                                                }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="panel-footer" style="text-align: center;">
                        <button type="button" class="btn btn-primary" id="btnSendEmail">Send Email</button>
                        <button type="button" class="btn btn-danger" id="btnResetEmail">Change Schedule</button>
                        
                    </div>
                </div>
            </div>
            <!-- Email format to user - start -->
        </div>
    </div>
    
</div>
<!-- Modal Dialog for downloading Resume - Start -->
<div class="modal fade bs-example-modal-xs" id="IntvwstageUpdateModal" tabindex="-1" role="dialog" aria-labelledby="IntvwstageUpdateModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">Message</div>
            <div class="modal-body"><h5 class="modal-title"></h5></div>
            <div class="modal-footer"><button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button></div>
        </div>
    </div>
</div>
<!-- Modal Dialog for downloading Resume - End -->