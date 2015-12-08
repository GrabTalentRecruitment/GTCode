<script type="text/javascript" src="/js/candidate/candidate_jobs.js" defer="true"></script>
<div class="site-content" >
	<input type="hidden" id="candJobapplyURL" value="<?php echo https_url($this->lang->lang().'/candidate/registercandidate_application');?>" />
        <input type="hidden" id="candcodeRefId" value="<?php echo $this->session->userdata('user_data')[0]['candidate_coderefs_id'] ?>" />
        <input type="hidden" id="appliedLbl" value="<?=lang('candidateJobs.btnlbl2');?>" />
	<div class="container page-header">
		<div class="row">
			<div class="col-md-6 no-padding">
				<h1 class="page-title font-1"><?=lang('candidateJobs.heading');?></h1>
			</div>
			<div class="col-md-6 no-padding">
				
			</div>
		</div>
	</div>
	
	<div class="page-content container">
		
		<div class="row candidate-attribute">
			<div class="col-md-12 ">
				<?php 
	                        //print_r($this->session->all_userdata());
	                        $cand_Skill = '';
	                        $candsklsArr = $jobsArr = $jobs = array();
	                        
	                        $candRefId = $this->session->userdata('user_data')[0]['candidate_coderefs_id'];
	                        
	                        // Get candidate skills from DB
	                        $candSkillscondition = "candidate_coderefs_id ='".$candRefId."'";
	                        $this->db->select('candidate_skills')->from('candidate_signup')->where($candSkillscondition);
	                        $candSklsquery = $this->db->get();
	                        $candSkllsArr = $candSklsquery->result_array();
	                        foreach ($candSkllsArr as $key=>$candSkills) {
	                        	$cand_Skill = $candSkills['candidate_skills'];
	                        }
	                        
	                        // To fetch job & its mandatory skills into an array.
	                        $jobmandsklsArr = array();
	                        $onlypostedjob = "job_posted ='on'";
	                        $this->db->select('job_mandatory_skills, job_number')->from('jobs')->where($onlypostedjob);
	                        $query = $this->db->get();
	                        foreach($query->result_array() as $jobArr){
	                            $jobskillsplit = explode(",", strtolower($jobArr['job_mandatory_skills']));
	                            $jobmandsklsArr[$jobArr['job_number']] = $jobskillsplit;
	                        }
	                        
	                        if( !empty( $cand_Skill ) ) {
	                            if(strpos($cand_Skill,';') !== false) {
	                                $candskillsArr = explode(";", $cand_Skill);
	                                foreach($candskillsArr as $skll){
	                                    $candskls = explode(",", $skll);                                   
	                                    array_push($candsklsArr, $candskls[0]);
	                                }
	                                foreach($candsklsArr as $candidskill){
	
	                                    $candidskill = strtolower($candidskill);
	                                    foreach($jobmandsklsArr as $key=>$value){
	                                        
	                                        $findValue = array_search( $candidskill, $value);
	                                        if(strlen($findValue) > 0 ) {
	                                            array_push($jobsArr,$key);
	                                        }
	                                    }
	                                }    
	                                $jobNumuniqueArr = array_unique($jobsArr);
	                                foreach($jobNumuniqueArr as $jobNumber){
	                                    $jobsData = $this->login_database->read_job_information($jobNumber);
	                                    foreach($jobsData as $jobsfieldData) {
	                                        array_push($jobs, $jobsfieldData);
	                                    }
	                                }
	                            } else {
	                                $jobs = '';
	                            }
	                        } else {
	                            $jobs = '';
	                        }
	                        //var_dump($this->db->last_query());
	                        $sess_array = $this->session->userdata('user_data');
	                        $resume = '';                        
	                        foreach($sess_array as $usrDt){
	                            $resume = $usrDt['resume_url'];
	                        }
	                    ?>
				<table>
					<tr>
                        <th><?=lang('candidateJobs.hometablecol1');?></th>
                        <th><?=lang('candidateJobs.hometablecol2');?></th>
                        <th><?=lang('candidateJobs.hometablecol3');?></th>
                        <th><?=lang('candidateJobs.hometablecol4');?></th>
                        <th><?=lang('candidateJobs.hometablecol5');?></th>
                        <th class="textcenter"><?=lang('candidateJobs.hometablecol6');?></th>
                    </tr>
                    <?php $i=1; if($jobs){ ?>
                        <?php foreach($jobs as $job) { ?>
                        <tr>
                            <td><?php echo $job['job_number']; ?></td>
                            <input type="hidden" value="<?php echo $job['job_number']; ?>" name="inputJobnumber-<?php echo $i; ?>" id="inputJobnumber-<?php echo $i; ?>"/>
                            <td class="job-title"><a href="<?php echo https_url($this->lang->lang().'/candidate/job/'.$job['job_number']);?>"><?php echo htmlspecialchars($job['job_title']); ?></a></td>
                            <td class="job-salary"><?php echo "SGD ".$job['job_minmonth_salary']." - ".$job['job_maxmonth_salary']; ?></td>
                            <td><?php echo htmlspecialchars($job['job_primaryworklocation_city'].', '.$job['job_primaryworklocation_country']); ?></td>
                            <td><?php echo $job['job_industry']; ?></td>
                            <td style="text-align: center;">
                            <?php
                                if($resume != null || $resume != "" || !empty($resume)) {                                                
                                    $candStatus = $this->login_database->get_candidate_applnSts($this->session->userdata('logged_in'), $job['job_number']);
                                    if ($candStatus == 0) {
                                        echo "<button type='button' id='jobApplybtn-".$i."' class='btn btn-primary'>".lang('candidateJobs.btnlbl1')."</button>";
                                    } else {
                                        echo "<button type='button' class='btn btn-success' disabled='disabled'>".lang('candidateJobs.btnlbl2')."</button>";
                                    }
                                } else {
                                    echo "<font color='red'><b>".lang('candidateJobs.uploadresumelbl')."</b></font>";
                                }                                                    
                            ?>
                            </td>
                        </tr>
                        <?php $i++; } ?>
                        <?php } else { ?>
                            <tr>
                                <td colspan="7"><center><?=lang('candidateJobs.homenojobslbl');?></center></td>
                            </tr>
                        <?php } ?>
					
				</table>
			</div>
		</div> <!-- end row -->
	</div>
	
	<div class="clearfix"></div>
	
</div> <!-- end site-content -->