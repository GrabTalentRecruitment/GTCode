<div class="visible-xs vert-offset-top-5"></div>
<div class="visible-sm vert-offset-top-8"></div>
<div class="visible-lg visible-md hidden-xs vert-offset-top-5"></div>
<div class="site-wrapper">
    <div class="site-wrapper-inner">
        <div class="container">
            <?php
                $condition = "candidate_appln_job_id ='".$this->uri->segment(4)."'";
                $this->db->select('*');
                $this->db->from('candidate_application');
                $this->db->where($condition);
                $query = $this->db->get();
                if ($query->num_rows() > 0) {
                    $candJobs = $query->result_array();
                } else {
                    return false;
                } 
                 
                if($candJobs) {
                    foreach($candJobs as $cndJob) {
                        $candData = array('username' => $cndJob['candidate_email'] );
                        $result = $this->login_database->read_user_information($candData,'candidate');
            ?>
            <div class="col-lg-4 col-md-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-4 text-left">
                                <img src="/images/profile-pic.jpg" height="50px" width="50px" />
                            </div>
                            <div class="col-xs-8 text-right">
                                <div>
                                    <?php 
                                        foreach($result as $cndDet) {
                                            echo "<font size='4px'>".$cndDet['candidate_firstname']." ".$cndDet['candidate_lastname']."</font><br />";
                                            echo $cndDet['candidate_phonecountrycode']." ".$cndDet['candidate_phonenumber']."<br />";
                                        }
                                    ?>
                                </div>
                                <div>
                                    <?php
                                        echo $cndJob['candidate_appln_stage'];
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="<?php echo base_url().$this->lang->lang()."/recruiter/candidate/".$cndJob['candidate_coderefs_id']; ?>">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <?php } ?>
            <div class="row">
                <div class="col-md-12 col-md-offset-0">
                    <?php } else { ?>
                        <div class="col-xs-12">
                            <h3>This employer does not exist (or) you typed the wrong URL.</h3>
                        </div>
                    <?php } ?>                
                </div>
            </div>
        </div>
    </div>
</div>