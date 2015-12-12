<?php $jobDeactivate_Url = $this->lang->lang().'/recruiter/job_deactivate'; ?>
<script type="text/javascript" src="/js/recruiter/applicant_tracking/recruiter_applicantTracking.js" defer="true"></script>
<div class="site-content" >
    <div class="container page-header">
        <div class="row">
            <div class="col-md-6 no-padding">
                <h1 class="page-title font-1"><?php echo lang('recruiterlogin.applnTrackhding'); ?></h1>
            </div>
            <div class="col-md-6 no-padding"></div>
        </div>
    </div>
    <div class="page-content container">
        <div class="row candidate-attribute">
            <div class="col-md-12 ">
                <input type="hidden" id="inputjobdeactUrl" value="<?php echo https_url($jobDeactivate_Url); ?>" />
                <?php
                    // To add Employer & their created job information to session.                        
                    $sess_array = array('username' => $this->session->userdata('recruiter_login'));                        
                    $condition = "job_created_by =" . "'" . $sess_array['username'] . "'";
                    $this->db->select('*')->from('jobs')->where($condition);
                    $query = $this->db->get();
                    if ($query->num_rows() > 0) { $jobs = $query->result_array(); } else { $jobs = 0; }
                ?>
                <table>
                    <?php if($jobs){ ?>
                            <tr>
                                <th><?=lang('recruiterlogin.applnTrackcol1');?></th>
                                <th><?=lang('recruiterlogin.applnTrackcol2');?></th>
                                <th><?=lang('recruiterlogin.applnTrackcol3');?></th>
                                <th><?=lang('recruiterlogin.applnTrackcol4');?></th>
                                <th><?=lang('recruiterlogin.applnTrackcol5');?></th>
                                <th><?=lang('recruiterlogin.applnTrackcol6');?></th>
                                <th class="textcenter"><?=lang('recruiterlogin.applnTrackcol7');?></th>
                                <th class="textcenter"><?=lang('recruiterlogin.applnTrackcol8');?></th>
                                <th class="textcenter"><?=lang('recruiterlogin.applnTrackcol9');?></th>
                                <th class="textcenter"><?=lang('recruiterlogin.applnTrackcol10');?></th>
                            </tr>
                        <?php foreach($jobs as $job) { ?>                            
                            <tr>
                                <td><?php echo "<a href='".https_url($this->lang->lang().'/recruiter/applicant_job_view/'.$job['job_number'])."' role='button'>".$job['job_number']."</a>"?></td>
                                <td><a href="<?php echo https_url($this->lang->lang().'/recruiter/job/'.$job['job_number']); ?>"><?php if( strlen(htmlspecialchars($job['job_title'])) > 20 ) { echo substr_replace(htmlspecialchars($job['job_title']), '...', 30);} else { echo htmlspecialchars($job['job_title']); }?></a></td>
                                <td><?php echo htmlspecialchars($job['job_primaryworklocation_country']); ?></td>
                                <td><?php echo htmlspecialchars($job['job_primaryworklocation_city']); ?></td>
                                <td><?php echo htmlspecialchars($job['job_hiringmgrcontactname']); ?></td>
                                <td><?php echo htmlspecialchars($job['job_hrcontactname']); ?></td>
                                <?php
                                    $total_count = $this->db->select('count(*) as cnt')->where_in('candidate_appln_job_id', $job['job_number'])->get('candidate_application')->result()[0]->cnt;
                                    if($total_count > 0) {
                                        echo "<td style='vertical-align: middle;'><center><font size='4px'><b>".$total_count."</b></font></center></td>";
                                    } else {
                                        echo "<td style='vertical-align: middle;'><center><font size='4px'><b>0</b></font></center></td>";
                                    }
                                ?>
                                <?php
                                    $job_status = $this->db->select('job_active')->where_in('job_number', $job['job_number'])->get('jobs')->result_array();
                                    echo "<td style='vertical-align: middle; text-align:center; width:130px;'>";
                                    if($job_status[0]['job_active'] == 'Yes') {
                                        echo "<span class='label label-success'>OPEN</span>";
                                    } else if($job_status[0]['job_active'] == 'No') {
                                        echo "<span class='label label-danger'>CLOSED / DRAFT</span>";
                                    }                                                
                                    echo "</td>";                                                
                                ?>
                                <td class="textcenter">
                                    <?php 
                                        $jobStatcomments = $this->login_database->read_jobs_history($job['job_number']); 
                                        echo $jobStatcomments[0]['job_status_comments']; 
                                    ?>
                                </td>
                                <td class="textcenter">
                                    <?php if($job_status[0]['job_active'] == 'Yes') { ?>
                                        <a id="jobstatusUpdate" data-toggle="modal" data-target="#JobstatusupdateModal" title="<?php echo $job['job_number']; ?>"><img src="/images/icons/icon_rejectStep.png" alt="Close Job" title="Close Job" width="35px" style="cursor: pointer;"/></a>
                                    <?php } ?>
                                </td>
                            </tr>
                        <?php } 
                        } else{ ?>
                            <tr>
                                <td colspan="10"><center><?=lang('recruiterlogin.applicantTrackinglbl');?></center></td>
                            </tr>
                        <?php } ?>
                </table>
            </div>
        </div> <!-- end row -->
    </div>
    <div class="clearfix"></div>
    <!-- Modal Dialog for closing Job - Start -->
	<div class="modal fade bs-example-modal-sm" id="JobstatusupdateModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	    <div class="modal-dialog">
	        <div class="modal-content">
	            <div class="modal-header">
	                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	                <h4 class="modal-title" id="myModalLabel"> Close Job </h4>
	            </div>
	            <div class="modal-body">
	                <center><span id="modal-error-msg" style="color: red;"></span></center>
	                <label for="jobstatusupd_comments">Status Comments:</label>
	                <input type="hidden" class="form-control" id="jobUpd-refCode" name="jobUpd-refCode" />
	                <textarea class="form-control" rows="5" id="jobstatusupd_comments"></textarea>
	            </div>
	            <div class="modal-footer">
	                <button type="button" class="btn btn-primary" data-dismiss="modal" aria-label="Save" id="jobstatusUpd_btnsave">Save</button>
	                <button type="button" class="btn" data-dismiss="modal" aria-label="Close" id="jobstatusUpd_btnclose">Close</button>
	            </div>
	        </div>
	    </div>
	</div>
	<!-- Modal Dialog for closing Job - End -->
</div> <!-- end site-content -->