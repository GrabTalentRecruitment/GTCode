<?php 
$applnTrack_stepChange = https_url($this->lang->lang().'/recruiter/applicant_tracking_stepChange'); 
$applnIntervew_url = https_url($this->lang->lang().'/recruiter/applicant_interview');
$applnOffer_url = https_url($this->lang->lang().'/recruiter/applicant_offer');
?>
<input type="hidden" id="applnStepChg_url" value="<?php echo $applnTrack_stepChange; ?>" />
<input type="hidden" id="applnInterview" value="<?php echo $applnIntervew_url; ?>" />
<input type="hidden" id="applnOfferURL" value="<?php echo $applnOffer_url; ?>" />
<script type="text/javascript" src="/js/recruiter/applicant_tracking/recruiter_applicantView.js" defer></script>
<div class="visible-xs vert-offset-top-5"></div>
<div class="visible-sm vert-offset-top-8"></div>
<div class="visible-lg visible-md hidden-xs vert-offset-top-5"></div>
<div class="site-wrapper">
    <div class="site-wrapper-inner">
        <div class="container-fluid">
            <div class="col-sm-12 col-sm-offset-0 col-md-12 col-md-offset-0 main">
                <?php                    
                    $sess_array = array( 'username' => $this->session->userdata('logged_in') );
                    $hiringcomp_code = $this->login_database->read_user_information($sess_array, 'employer');
                    $candcoderefId = $this->uri->segment(4);
                    $candjobs = array();
                    $condition = "candidate_coderefs_id =" . "'" . $this->uri->segment(4) . "'";
                    $condition1 = "employer_code =" . "'" . $hiringcomp_code[0]['employer_code'] . "'";
                    $this->db->select('candidate_appln_job_id, candidate_email');
                    $this->db->from('candidate_application');
                    $this->db->join('jobs', 'candidate_application.candidate_appln_job_id = jobs.job_number');
                    $this->db->join('employers','jobs.job_created_by = employers.employer_contact_email');
                    $this->db->where($condition);
                    $this->db->where($condition1);
                    $query = $this->db->get();
                    if ($query->num_rows() > 0) {                        
                        foreach($query->result_array() as $candid) {
                            array_push($candjobs,$candid['candidate_appln_job_id']);
                            $candEmail = $candid['candidate_email'];
                            $candinfo = $this->login_database->applnTracking_candName($candEmail);
                        }
                        $candName = $candinfo[0]['candidate_lastname']." ".$candinfo[0]['candidate_firstname'];
                    } else { 
                        $candjobs = '';
                    }
                ?>
                <!-- For larger Desktops -- start -->
                <div class="table-responsive visible-md-block visible-lg-block">
                    <ol class="breadcrumb">
                        <li><a href="<?php echo https_url($this->lang->lang().'/recruiter/applicant_tracking'); ?>"><?php echo lang('recruiterlogin.applnTrackhding'); ?></a></li>
                        <li class="active"><?php echo $candName; ?></li>
                    </ol>
                    <h2 class="sub-header"><?php echo "Applicant Name: ".$candName; ?></h2>
                    <div class="panel panel-default">
                        <table class="table table-bordered">
                            <thead class="tablehead_bgColor">
                                <tr>
                                    <th><?=lang('recruiterlogin.applnViewcol2');?></th>
                                    <th><?=lang('recruiterlogin.applnViewcol3');?></th>
                                    <th><?=lang('recruiterlogin.applnViewcol4');?></th>
                                    <th><?=lang('recruiterlogin.applnTrackcol5');?></th>
                                    <th><?=lang('recruiterlogin.applnTrackcol6');?></th>
                                    <th><?=lang('recruiterlogin.applnViewcol6');?></th>
                                    <th><?=lang('recruiterlogin.applnViewcol8');?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if($candjobs){ ?>
                                    <?php foreach($candjobs as $job) { 
                                        $jobs = $this->login_database->read_job_information($job);
                                    ?>                                
                                    <tr>
                                        <td class="job-title" style="vertical-align: middle;"><?php echo htmlspecialchars($jobs[0]['job_title']); ?></td>
                                        <td style="vertical-align: middle;"><?php echo htmlspecialchars($jobs[0]['job_primaryworklocation_country'])?></td>
                                        <td style="vertical-align: middle;"><?php echo htmlspecialchars($jobs[0]['job_primaryworklocation_city'])?></td>
                                        <td style="vertical-align: middle;">
                                            <?php 
                                                $hiring_mgr = $this->db->select('employer_contact_firstname, employer_contact_lastname')->where('employer_contact_email', $jobs[0]['job_created_by'])->get('employers')->result_array();
                                                echo $hiring_mgr[0]['employer_contact_firstname']." ".$hiring_mgr[0]['employer_contact_lastname'];
                                            ?>
                                        </td>
                                        <td style="vertical-align: middle;"><?php echo htmlspecialchars($jobs[0]['job_hrcontactname']); ?></td>
                                        <td style="vertical-align: middle; text-align: center;">
                                            <?php
                                                $candidStage = $this->login_database->applnStage_candName($candcoderefId, $jobs[0]['job_number']);
                                                foreach($candidStage as $stage) {
                                                    $candStage = $stage['candidate_appln_stage'];
                                                }
                                                if($candStage == 'Application') {
                                            ?>
                                                <div class="progress"><div class="progress-bar progress-bar-info progress-bar-striped" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div></div>
                                            <?php
                                                } else if($candStage == 'Shortlist') {
                                            ?>
                                                <div class="progress"><div class="progress-bar progress-bar-warning progress-bar-striped" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div></div>
                                            <?php
                                                } else if($candStage == 'Interview') {
                                            ?>
                                                <div class="progress"><div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div></div>
                                            <?php
                                                } else if($candStage == 'Offer' ||  $candStage == 'Placed') {
                                            ?>
                                                <div class="progress"><div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div></div>
                                            <?php
                                                } else if($candStage == 'Rejected') {
                                            ?>
                                                <div class="progress"><div class="progress-bar progress-bar-danger progress-bar-striped" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div></div>
                                            <?php
                                                }
                                            ?>
                                        </td>
                                        <td style="vertical-align: middle;">
                                            <ol style="list-style: none; list-style-type: none;">                                                                                                                                                                               
                                                <li style="display: inline; padding-right: 20px;"><a title="<?php echo $candStage."/". $jobs[0]['job_number']; ?>" data-toggle="modal" data-whatever="<?php echo $candinfo[0]['candidate_lastname']." ".$candinfo[0]['candidate_firstname']; ?>" id="<?php echo $candcoderefId; ?>" data-target="#candStepModal"><img src="/images/icons/icon_nextStep.png" alt="Proceed to Next Step" title="Proceed to Next Step" height="50px" style="cursor: pointer;"/></a></li>
                                                <li style="display: inline;"><button type="button" class="btn" title="<?php echo $candStage."/". $jobs[0]['job_number']; ?>" name="<?php echo $candcoderefId; ?>" id="Reject_btn" style="background-color: transparent; padding:0px;"><img src="/images/icons/icon_rejectStep.png" alt="Reject Step" title="Reject Step" height="50px" style="cursor: pointer;"/></button></li>
                                            </ol>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                <?php } else{ ?>
                                    <tr>
                                        <td colspan="10"><center><?=lang('recruiterlogin.homenojobslbl');?></center></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- For larger Desktops -- end ->
                <!-- Applicant Tracking Table - End -->
            </div>
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
<!-- Modal Dialog for downloading Resume - End -->
<!-- Candidate Step Change Modal Window -- Start -->
<div class="modal fade" id="candStepModal" tabindex="-1" role="dialog" aria-labelledby="candStepModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="candStepModalLabel"><?=lang('applicantTrack.stepHeaderpopup');?></h4>
            </div>
            <div class="modal-body">
                <center><span id="modal-error-msg" style="color: red;"></span></center>
                <h5><?=lang('applicantTrack.stepHeaderpopupsubHead');?></h5>
                <form method="post" accept-charset="utf-8" enctype="multipart/form-data" role="form" id="example-form">
                    <div class="form-group">
                        <button type="button" class="btn btn-info col-lg-12" data-toggle="modal" id="shortlistBtn" title="Shortlist"><b><?=lang('applicantTrack.btnlabel1');?></b></button><br /><br />
                        <button type="button" class="btn btn-info col-lg-12" data-toggle="modal" id="InterviewBtn" title="Interview"><b><?=lang('applicantTrack.btnlabel2');?></b></button><br /><br />
                        <button type="button" class="btn btn-info col-lg-12" data-toggle="modal" id="OfferEmailBtn" title="Offer-Email"><b><?=lang('applicantTrack.btnlabel4');?></b></button><br /><br />
                        <button type="button" class="btn btn-info col-lg-12" data-toggle="modal" id="placementBtn" title="Placement"><b><?=lang('applicantTrack.btnlabel6');?></b></button><br />
                    </div>                   
                    <input type="hidden" class="form-control" id="candStepUpd-refCode" name="candStepUpd-refCode" />
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Skill Modal Window -- End -->