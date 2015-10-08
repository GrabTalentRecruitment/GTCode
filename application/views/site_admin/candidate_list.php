<?php $candidates = $this->login_database->read_all_candidates(); ?>
<style type="text/css">.tablehead_bgColor { background-color: orange; }</style>
<div class="visible-xs vert-offset-top-5"></div>
<div class="visible-sm vert-offset-top-8"></div>
<div class="visible-lg visible-md hidden-xs vert-offset-top-5"></div>
<div class="site-wrapper">
    <div class="site-wrapper-inner">
        <div class="container-fluid">
            <?php if($candidates) {
                foreach($candidates as $candids) {
            ?>
                    <!-- To display in mobile & tablet mode - Start -->
                    <div class="col-xs-12 col-sm-12 visible-xs-block visible-sm-block hidden-md hidden-lg">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-6 text-left">
                                        <?php
                                            if( ! empty($candids['candidate_profilepicurl']) ) {
                                        ?>
                                        <img alt="User Pic" src="<?php echo '/images/candidate/photo/'.$candids['candidate_profilepicurl'];?>" class="img-circle" height="90px" />
                                        <?php } else { ?>
                                        <img src="/images/profile-pic.jpg" height="90px" class="img-circle" />
                                        <?php } ?>
                                    </div>
                                    <div class="col-xs-6 text-right">
                                        <div class="medium"><?php echo $candids['candidate_lastname']." ".$candids['candidate_firstname']; ?></div>
                                        <div>
                                            <?php 
                                                echo $candids['candidate_total_experience']."<br/>"; 
                                                echo $candids['candidate_email']."<br/>";
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a href="<?php echo https_url($this->lang->lang().'/candidates/'.$candids['candidate_coderefs_id']); ?>">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <!-- To display in mobile mode - End -->
                <?php } ?>
            <!-- To display in Large Desktop mode - Start -->
            <div class="visible-md-block visible-lg-block col-lg-12 col-md-12">
                <h2 class="sub-header"><img src="/images/icons/candidates.png" alt="Settings icon" height="50px"/> Candidate List</h2>
                <div class="panel panel-default">
                    <table class="table table-bordered table-hover">
                        <thead class="tablehead_bgColor">
                            <tr>
                                <th>Logo</th>
                                <th>Candidate Name</th>
                                <th>Candidate Gender</th>
                                <th>Candidate Web-site</th>
                                <th>Candidate Phone</th>
                                <th>Candidate Nationality</th>
                                <th>Member Since.</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($candidates as $candids) {?>
                                <tr>
                                    <td style="vertical-align: middle; text-align:center;">
                                        <?php
                                            if( ! empty($candids['candidate_profilepicurl']) ) {
                                        ?>                                    
                                        <img src="<?php echo '/images/candidate/photo/'.$candids['candidate_profilepicurl']; ?>" height="50px" class="img-circle" />
                                        <?php } else { ?>
                                        <img src="/images/icons/candidate.png" height="50px" class="img-circle" />
                                        <?php } ?>
                                    </td>
                                    <td style="vertical-align: middle;">
                                        <a href="<?php echo https_url($this->lang->lang().'/site_admin/candidates/'.$candids['candidate_coderefs_id']); ?>">
                                        <?php
                                            echo $candids['candidate_lastname']." ".$candids['candidate_firstname'];
                                        ?>
                                        </a>
                                    </td>
                                    <td style="vertical-align: middle;">
                                        <?php
                                            echo $candids['candidate_gender'];
                                        ?>
                                    </td>
                                    <td style="vertical-align: middle;">
                                        <a href="mailto:<?php echo $candids['candidate_email']; ?>" target="_blank">
                                        <?php
                                            echo $candids['candidate_email'];
                                        ?>
                                        </a>
                                    </td>
                                    <td style="vertical-align: middle;">
                                        <?php
                                            echo $candids['candidate_phonecountrycode']." ". $candids['candidate_phonenumber'];
                                        ?>
                                    </td>
                                    <td style="vertical-align: middle;">
                                        <?php
                                            echo $candids['candidate_nationality'];
                                        ?>
                                    </td>
                                    <td style="vertical-align: middle;">
                                        <?php
                                            echo date("d-M-Y h:m",strtotime($candids['created_date']));
                                        ?>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- To display in Large Desktop mode - End -->            
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