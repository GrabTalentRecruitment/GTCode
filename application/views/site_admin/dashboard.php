<?php $recruiterEmail = $this->session->userdata('recruiter_login');
$recInfo = $this->login_database->get_employer_information($recruiterEmail);
$jobs = $this->login_database->job_dashboard( $this->session->userdata('recruiter_login') ); ?>

<div class="site-content" >

	<div class="container page-header">
		<div class="row">
			<div class="col-md-6 no-padding">
				<h1 class="page-title font-1"><?php echo lang('siteadminhome.welcomeheader')." ".$recInfo[0]['employer_contact_firstname']." ".$recInfo[0]['employer_contact_lastname']; ?> </h1>
			</div>
			<div class="col-md-6 no-padding"></div>
		</div>
	</div>
    
    <div class="page-content container">
		<div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3 text-left">
                                <img src="/images/icons/candidates.png" alt="" height="65px" />
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge"><?php echo $this->db->count_all('candidate_signup'); ?></div>
                                <div><?= lang('siteadminhome.blurblabel1'); ?></div>
                            </div>
                        </div>
                    </div>
                    <a href="<?php echo https_url($this->lang->lang().'/site_admin/candidate_list')?>">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-green">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3 text-left">
                                <img src="/images/icons/employers.png" alt="" height="65px" />
                            </div>
                            <div class="col-xs-9 text-right">
                                <?php 
                                        $this->db->select('COUNT(DISTINCT(employer_name)) as EmpCnt');
                                        $this->db->from('employers');
                                        $query = $this->db->get();
                                        foreach ($query->result_array() as $row) {
                                            $result = $row['EmpCnt'];
                                        }
                                    ?>
                                <div class="huge"><?php echo $result;?></div>
                                <div><?= lang('siteadminhome.blurblabel2'); ?></div>
                            </div>
                        </div>
                    </div>
                    <a href="<?php echo https_url($this->lang->lang().'/site_admin/employer_list')?>">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-yellow">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3 text-left">
                                <img src="/images/icons/jobs.png" alt="" height="65px" />
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge"><?php echo $this->db->count_all('jobs'); ?></div>
                                <div><?= lang('siteadminhome.blurblabel3'); ?></div>
                            </div>
                        </div>
                    </div>
                    <a href="<?php echo https_url($this->lang->lang().'/site_admin/jobs_list')?>">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-red">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-12 text-right">
                                <div class="huge">0</div>
                                <div><?= lang('siteadminhome.blurblabel4'); ?></div>
                            </div>
                        </div>
                    </div>
                    <a href="#">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        
        <div class="row">

            <div class="col-lg-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-money fa-fw"></i><?= lang('siteadminhome.panel2'); ?></h3>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>Candidate Name.</th>
                                        <th>From Stage</th>
                                        <th>To Stage</th>
                                        <th>Changed on</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $query = $this->db->query('SELECT candidate_coderefs_id, candidate_appln_prevstage, candidate_appln_nextstage, candidate_appln_change_date FROM candidate_application_history ORDER BY candidate_appln_change_date DESC LIMIT 5');
                                        foreach ($query->result() as $row) {
                                            echo "<tr>";
                                            $candInfo = $this->login_database->read_candidate_information($row->candidate_coderefs_id);
                                            echo "<td>".$candInfo[0]['candidate_firstname']." ".$candInfo[0]['candidate_lastname']."</td>";
                                            echo "<td>".$row->candidate_appln_prevstage."</td>";
                                            echo "<td>".$row->candidate_appln_nextstage."</td>";
                                            echo "<td>".date("d-M-Y h:m:s",strtotime($row->candidate_appln_change_date))."</td>";
                                            echo "</tr>";
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div><br />