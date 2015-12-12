<?php $recruiterEmail = $this->session->userdata('recruiter_login');
$recInfo = $this->login_database->get_employer_information($recruiterEmail);
$jobs = $this->login_database->job_dashboard( $this->session->userdata('recruiter_login') ); ?>
<div class="site-content" >

	<div class="container page-header">
		<div class="row">
			<div class="col-md-6 no-padding">
				<h1 class="page-title font-1"><?php echo lang('recruiterlogin.Welcometxt')." ".$recInfo[0]['employer_contact_firstname']." ".$recInfo[0]['employer_contact_lastname']; ?> </h1>
			</div>
			<div class="col-md-6 no-padding"></div>
		</div>
	</div>
	
	<div class="page-content container">
		<div class="row">
			<div class="col-md-6">
				<table class="upcoming-interview">
					<tr>
						<th>Upcoming Interviews</th>
					</tr>
					<tr>
						<td>
							<div class="list-group">
                                <?php
                                    $candIntvwDet = array();
                                    $condition = "system_created_by = '".$recruiterEmail."'";
                                    $this->db->select('*')->from('candidate_interview')->where($condition)->order_by('candidate_Pri_IntvwDateTime','asc')->limit(5);
                                    $query = $this->db->get();
                                    foreach( $query->result_array() as  $intervDet) {
                                        $tmpjobName = $this->login_database->read_job_information( $intervDet['candidate_IntvwJobId'] );
                                        // Split Interview Date & Time
                                        $candinterviewDate = explode(" ", $intervDet['candidate_Pri_IntvwDateTime']);
                                        $candName = $this->login_database->read_candidate_information($intervDet['candidate_IntvwCandidId']);
                                        foreach( $candName as  $candidDet) {
                                            echo "<span class='list-group-item'>";
                                            echo "<i class='fa fa-fw fa-calendar'></i> Interview with <b>".$candidDet['candidate_firstname']." ".$candidDet['candidate_lastname']."</b> for<br />&nbsp;&nbsp;&nbsp;&nbsp; \"".$tmpjobName[0]['job_title']."\"";
                                            echo "<span class='badge'>".$this->login_database->time_elapsed_string( date("d-m-Y h:m:s", strtotime($candinterviewDate[0])), false )."</span>";
                                            
                                            echo "</span>";
                                        }
                                    }                                    
                                ?>
                            </div>
                            <div style="text-align: right;">
                                <input type="button" value="View My Calendar" onclick="window.location.href='<?php echo https_url($this->lang->lang().'/recruiter/calendar'); ?>'" />
                            </div>
						</td>
					</tr>
				</table>
			</div>
			
			<div class="col-md-6">
				<table class="job-posting-listing">
    				<?php if($jobs){ ?>
                        <tr>
                            <th><?=lang('recruiterlogin.hometablecol2');?></th>
                            <th><?=lang('recruiterlogin.hometablecol4');?></th>
                            <th>Action</th>
                        </tr>
    					<?php foreach($jobs as $job) { ?>
                        <tr>
                            <td class="job-title"><a href="<?php echo https_url($this->lang->lang().'/recruiter/job/'.$job['job_number']); ?>"><?php if( strlen(htmlspecialchars($job['job_title'])) > 50 ) { echo substr_replace(htmlspecialchars($job['job_title']), '...', 40);} else { echo htmlspecialchars($job['job_title']); }?></a></td>
                            <td><?php echo htmlspecialchars($job['job_primaryworklocation_city'].', '.$job['job_primaryworklocation_country'])?></td>
                            <td>
                                <?php if($job['job_posted'] == 'off'){ ?>
                                    <span class="label label-danger">DRAFT</span>
                                <?php } ?>
                            </td>
                        </tr>
    				<?php } 
    				}  else { ?>
                        <tr>
                            <td colspan="6"><center><?=lang('recruiterlogin.homenojobslbl');?></center></td>
                        </tr>
    				<?php } ?>
                </table>
			</div>
		</div>
	
	</div>
	
	<div class="clearfix"></div>

</div> <!-- end site-content -->