<script type="text/javascript" src="/js/candidate/candidate_jobs.js" defer="true"></script>
<div class="site-wrapper vert-offset-top-6">
    <div class="site-wrapper-inner">
        <input type="hidden" id="candJobapplyURL" value="<?php echo https_url($this->lang->lang().'/candidate/registercandidate_application');?>" />
        <input type="hidden" id="candcodeRefId" value="<?php echo $this->session->userdata('user_data')[0]['candidate_coderefs_id'] ?>" />
        <input type="hidden" id="appliedLbl" value="<?=lang('candidateJobs.btnlbl2');?>" />
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-sm-offset-0 col-md-12 col-md-offset-0 main">
                    <h2 class="sub-header"><img src="/images/icons/jobs.png" height="50px" alt="<?=lang('candidateJobs.heading')?>" title="<?=lang('candidateJobs.heading')?>"/> <?=lang('candidateJobs.heading');?></h2>
                    <?php 
                        //print_r($this->session->all_userdata());
                        $cand_Skill = '';
                        $candsklsArr = array();
                        if( !empty( $this->session->userdata('user_data')[0]['candidate_skills'] ) ) {
                            if(strpos($this->session->userdata('user_data')[0]['candidate_skills'],';') !== false) {
                                $candskills = explode(";", $this->session->userdata('user_data')[0]['candidate_skills']);
                                foreach($candskills as $skll){
                                    $candskls = explode(",", $skll);
                                    array_push($candsklsArr, $candskls[0]);
                                    $comma_separated = implode("%' OR '%", $candsklsArr);
                                }
                                $jobs = $this->login_database->candidate_job_dashboard('\'%'.$comma_separated.'%\'');
                            } else {
                                $candskills = explode(",", $this->session->userdata('user_data')[0]['candidate_skills']);
                                $jobs = $this->login_database->candidate_job_dashboard('\'%'.$candskills[0].'%\'');
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
                    <!-- To show only on mobile - start -->
                    <div class="visible-xs-block">
                        <?php $i=1; if($jobs){ ?>
                            <div class="list-group">
                                <?php foreach($jobs as $job) { ?>                                
                                    <a href="<?php echo https_url($this->lang->lang().'/candidate/job/'.$job['job_number']);?>" class="list-group-item">
                                        <h4 class="list-group-item-heading"><?php echo htmlspecialchars($job['job_title'])?></h4>
                                        <p class="list-group-item-text"><?php echo htmlspecialchars($job['job_primaryworklocation_city'].', '.$job['job_primaryworklocation_country'])?></td></p>
                                        <p class="list-group-item-text"><?php echo "SGD ".$job['job_minmonth_salary']." - ".$job['job_maxmonth_salary']; ?></p>
                                        <p class="list-group-item-text"><?php echo $job['job_industry'] ?></p><br />
                                        <?php
                                            if($resume != null || $resume != "" || !empty($resume)) {
                                                $candStatus = $this->login_database->get_candidate_applnSts($this->session->userdata('logged_in'), $job['job_number']);
                                                if ($candStatus == 0) {
                                                    echo "<button type='button' id='jobApplybtn-".$i."' class='btn btn-primary'>".lang('candidateJobs.btnlbl1')."</button>";
                                                } else {
                                                    echo "<button type='button' class='btn btn-success' disabled='disabled' style='vertical-align:top;'>".lang('candidateJobs.btnlbl2')."</button>";
                                                }
                                            } else {
                                                echo "<center><font color='red'><b>".lang('candidateJobs.uploadresumelbl')."</b></font></center>";
                                            }                                            
                                        ?>
                                    </a>
                                <?php } $i++; ?>
                            </div>
                        <?php } else{ ?>
                            <div class="panel panel-default">
                                <div class="panel-body"><?=lang('candidateJobs.homenojobslbl');?></div>
                            </div>
                        <?php } ?>
                    </div>
                    <!-- To show only on mobile - end -->
                    
                    <!-- To show only on Tablet - start -->
                    <div class="visible-sm-block">
                        <div class="panel panel-default">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th><?=lang('candidateJobs.hometablecol1');?></th>
                                        <th><?=lang('candidateJobs.hometablecol2');?></th>
                                        <th><?=lang('candidateJobs.hometablecol3');?></th>
                                        <th><?=lang('candidateJobs.hometablecol4');?></th>
                                        <th><?=lang('candidateJobs.hometablecol5');?></th>
                                        <th><?=lang('candidateJobs.hometablecol6');?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i=1; if($jobs){ ?>
                                        <?php foreach($jobs as $job) { ?>
                                            <tr>
                                                <td><?php echo $job['job_number']; ?></td>
                                                <input type="hidden" value="<?php echo $job['job_number']; ?>" name="inputJobnumber-<?php echo $i; ?>" id="inputJobnumber-<?php echo $i; ?>"/>
                                                <td class="job-title"><a href="<?php echo https_url($this->lang->lang().'/candidate/job/'.$job['job_number']);?>"><?php echo htmlspecialchars($job['job_title']); ?></a></td>
                                                <td class="job-salary"><?php echo "SGD ".$job['job_minmonth_salary']." - ".$job['job_maxmonth_salary']; ?></td>
                                                <td><?php echo htmlspecialchars($job['job_primaryworklocation_city'].', '.$job['job_primaryworklocation_country']); ?></td>
                                                <td><?php echo $job['job_industry']; ?></td>
                                                <td>
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
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- To show only on Tablet - end -->
                    
                    <!-- For larger Desktops -- start -->
                    <div class="table-responsive visible-md-block visible-lg-block">
                        <div class="panel panel-default">
                            <table class="table table-bordered">
                                <thead class="tablehead_bgColor">
                                    <tr>
                                        <th><?=lang('candidateJobs.hometablecol1');?></th>
                                        <th><?=lang('candidateJobs.hometablecol2');?></th>
                                        <th><?=lang('candidateJobs.hometablecol3');?></th>
                                        <th><?=lang('candidateJobs.hometablecol4');?></th>
                                        <th><?=lang('candidateJobs.hometablecol5');?></th>
                                        <th style="text-align: center;"><?=lang('candidateJobs.hometablecol6');?></th>
                                    </tr>
                                </thead>
                                <tbody>
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
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- For larger Desktops -- end ->
                </div>
            </div>            
        </div> <!-- /container -->
    </div>
</div>