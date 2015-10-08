<style type="text/css">.tablehead_bgColor { background-color: orange; }</style>
<div class="vert-offset-top-5 visible-lg visible-md visible-xs"></div>
<div class="vert-offset-top-10 visible-sm"></div>
<div class="site-wrapper">
    <div class="site-wrapper-inner">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 col-sm-offset-0 col-md-12 col-md-offset-0 main">
                    <?php
                        // To add Employer & their created job information to session.
                        //print_r($this->session->all_userdata());
                        $query = $this->db->query("SELECT * FROM jobs WHERE job_active='Yes'");
                        if ($query->num_rows() > 0) { $jobs = $query->result_array(); } else { $jobs = 0; }
                    ?>
                
                    <!-- Applicant Tracking Table - Start -->
                    <!-- For larger Desktops -- start -->
                    <div class="table-responsive visible-md-block visible-lg-block">
                        <h2 class="sub-header"><img src="/images/icons/jobs.png" alt="Employers / Client List" height="50px"/> All Active Jobs</h2>
                        <div class="panel panel-default">
                            <table class="table table-bordered">
                                <thead class="tablehead_bgColor">
                                    <tr>
                                        <th><?=lang('recruiterlogin.applnTrackcol1');?></th>
                                        <th><?=lang('recruiterlogin.applnTrackcol2');?></th>
                                        <th><?=lang('recruiterlogin.applnTrackcol3');?></th>
                                        <th><?=lang('recruiterlogin.applnTrackcol4');?></th>
                                        <th><?=lang('recruiterlogin.applnTrackcol5');?></th>
                                        <th><?=lang('recruiterlogin.applnTrackcol6');?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if($jobs){ ?>
                                        <?php foreach($jobs as $job) { ?>                                
                                        <tr>
                                            <td style="vertical-align: middle;"><?php echo "<a href='./job/".$job['job_number']."' role='button'>".$job['job_number']."</a>"?></td>
                                            <td class="job-title" style="vertical-align: middle;"><?php echo htmlspecialchars($job['job_title']); ?></td>
                                            <td style="vertical-align: middle;"><?php echo htmlspecialchars($job['job_primaryworklocation_country'])?></td>
                                            <td style="vertical-align: middle;"><?php echo htmlspecialchars($job['job_primaryworklocation_city'])?></td>
                                            <td style="vertical-align: middle;"><?php echo htmlspecialchars($job['job_hrcontactname']); ?></td>
                                            <td style="vertical-align: middle;">
                                                <?php  
                                                    $tmpemployerArr = $this->login_database->get_employer_information($job['job_created_by']);  
                                                    foreach($tmpemployerArr as $empName){
                                                        echo $empName['employer_contact_firstname']." ".$empName['employer_contact_lastname'];
                                                    }
                                                ?>
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
</div>