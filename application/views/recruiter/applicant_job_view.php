<?php 
$applnTrack_stepChange = https_url($this->lang->lang().'/recruiter/applicant_tracking_stepChange'); 
$applnIntervew_url = https_url($this->lang->lang().'/recruiter/applicant_interview'); 
$resumeDownload_url = https_url($this->lang->lang().'/recruiter/candidate_resumedownload/');
$applnOffer_url = https_url($this->lang->lang().'/recruiter/applicant_offer');
?>
<input type="hidden" id="applnStepChg_url" value="<?php echo $applnTrack_stepChange; ?>" />
<input type="hidden" id="applnInterview" value="<?php echo $applnIntervew_url; ?>" />
<input type="hidden" id="resumedownloadURL" value="<?php echo $resumeDownload_url; ?>" />
<input type="hidden" id="JobId" value="<?php echo $this->uri->segment(4); ?>" />
<input type="hidden" id="applnOfferURL" value="<?php echo $applnOffer_url; ?>" />
<script type="text/javascript" src="/js/recruiter/applicant_tracking/recruiter_applicantJobView.js" defer="true"></script>
<div class="visible-xs vert-offset-top-5"></div>
<div class="visible-sm vert-offset-top-8"></div>
<div class="visible-lg visible-md hidden-xs vert-offset-top-5"></div>
<div class="site-wrapper">
    <div class="site-wrapper-inner">
        <div class="container-fluid">
            <div class="col-sm-12 col-sm-offset-0 col-md-12 col-md-offset-0 main">
                <?php
                    $condition = "candidate_appln_job_id ='".$this->uri->segment(4)."'";
                    $this->db->select('*');
                    $this->db->from('candidate_application');
                    $this->db->where($condition);
                    $query = $this->db->get();
                    if ($query->num_rows() > 0) {
                        $candJobs = $query->result_array();
                    } else {
                        $candJobs = '';
                    }                    
                ?>
                <!-- For larger Desktops -- start -->
                <div class="table-responsive visible-md-block visible-lg-block">
                    <ol class="breadcrumb">
                        <li><a href="<?php echo https_url($this->lang->lang().'/recruiter/applicant_tracking'); ?>"><?php echo lang('recruiterlogin.applnTrackhding'); ?></a></li>
                        <li class="active"><?php echo $this->uri->segment(4); ?></li>
                    </ol>
                    <h2 class="sub-header"><?php echo "Job Id: ".$this->uri->segment(4); ?></h2>
                    <div class="panel panel-default">
                        <table class="table table-bordered">
                            <thead class="tablehead_bgColor">
                                <tr>
                                    <th><?=lang('recruiterlogin.applnViewcol1');?></th>
                                    <th><?=lang('recruiterlogin.applnViewcol2');?></th>
                                    <th><?=lang('recruiterlogin.applnViewcol3');?></th>
                                    <th><?=lang('recruiterlogin.applnViewcol4');?></th>
                                    <th><?=lang('recruiterlogin.applnViewcol5');?></th>
                                    <th><?=lang('recruiterlogin.applnViewcol6');?>&nbsp;&nbsp;&nbsp;<button class="btn btn-xs btn-danger" data-toggle="modal" data-target="#HelpModal" style="float: right;">Help&nbsp;<i class="fa fa-question"></i></button></th>
                                    <th><?=lang('recruiterlogin.applnViewcol8');?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if($candJobs){ ?>
                                    <?php foreach($candJobs as $cand) { 
                                        $candData = array('username' => $cand['candidate_email'] );
                                        $result = $this->login_database->read_user_information($candData,'candidate');
                                        $jobs = $this->login_database->read_job_information($this->uri->segment(4));
                                        $candStage = $cand ['candidate_appln_stage'];                                        
                                    ?>                                
                                    <tr>
                                        <td style="vertical-align: middle;"><?php echo "<a href='".https_url($this->lang->lang()."/recruiter/applicant_view/".$cand['candidate_coderefs_id'])."' role='button'>".$result[0]['candidate_lastname']." ".$result[0]['candidate_firstname']."</a>"?></td>
                                        <td class="job-title" style="vertical-align: middle;"><?php echo htmlspecialchars($jobs[0]['job_title']); ?></td>
                                        <td style="vertical-align: middle;"><?php echo htmlspecialchars($jobs[0]['job_primaryworklocation_country'])?></td>
                                        <td style="vertical-align: middle;"><?php echo htmlspecialchars($jobs[0]['job_primaryworklocation_city'])?></td>
                                        <td style="vertical-align: middle; text-align: center;">
                                        <a href='<?php echo $resumeDownload_url.$result[0]['resume_url']; ?>'><img src="/images/icons/icon_resume.jpg" title="<?=lang('candidateprofile.viewResumeBtn')?>" height="40px" style="cursor: pointer;"/></a>
                                        </td>
                                        <td style="vertical-align: middle; text-align: center;">
                                            <?php
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
                                        <td style="vertical-align: middle; text-align:center;">
                                            <a title="<?php echo $candStage; ?>" data-toggle="modal" data-whatever="<?php echo $result[0]['candidate_lastname']." ".$result[0]['candidate_firstname']; ?>" id="<?php echo $cand['candidate_coderefs_id']; ?>" data-target="#candStepModal" style="cursor:pointer;"><img src="/images/icons/icon_nextStep.png" alt="Proceed to Next Step" title="Proceed to Next Step" height="35px" style="cursor: pointer;"/></a>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                <?php } else{ ?>
                                    <tr>
                                        <td colspan="10"><center><?=lang('recruiterlogin.applnJobTrackhding');?></center></td>
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
<div class="modal fade bs-example-modal-sm" id="ResumedownloadModal" tabindex="-1" role="dialog" aria-labelledby="myResumedownloadModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"> Downloading... <iframe id="resumedownloadframe" height="1px" width="1px"></iframe> </h4>
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
                        <button type="button" class="btn btn-info col-lg-12" data-toggle="modal" id="placementBtn" title="Placement"><b><?=lang('applicantTrack.btnlabel6');?></b></button><br /><br />
                        <button type="button" class="btn btn-info col-lg-12" title="<?php echo $candStage; ?>" name="<?php echo $cand['candidate_coderefs_id']?>" id="Reject_btn"><b>Reject Candidate</b></button><br />
                    </div>                   
                    <input type="hidden" class="form-control" id="candStepUpd-refCode" name="candStepUpd-refCode" />
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Skill Modal Window -- End -->
<!-- Modal Dialog to explain the bars - Start -->
<div class="modal fade bs-example-modal-sm" id="HelpModal" tabindex="-1" role="dialog" aria-labelledby="myHelpModal" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-body">
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-6 control-label">Application</label>
                    <div class="col-sm-6">
                        <div class="progress"><div class="progress-bar progress-bar-info progress-bar-striped" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div></div>
                    </div>
                </div><br />
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-6 control-label">Shortlist</label>
                    <div class="col-sm-6">
                        <div class="progress"><div class="progress-bar progress-bar-warning progress-bar-striped" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div></div>
                    </div>
                </div><br />
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-6 control-label">Interview, Offer, Placed</label>
                    <div class="col-sm-6">
                        <div class="progress"><div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div></div>
                    </div>
                </div><br />
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-6 control-label">Rejected</label>
                    <div class="col-sm-6">
                        <div class="progress"><div class="progress-bar progress-bar-danger progress-bar-striped" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div></div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <p>Please click outside of this window to close.</p>
            </div>
        </div>
    </div>
</div>
<!-- Modal Dialog to explain the bars - End -->