<?php $candidateId = $this->uri->segment(4); $candidates = $this->login_database->read_candidate_information($candidateId); ?>
<div class="visible-xs vert-offset-top-5"></div>
<div class="visible-sm vert-offset-top-8"></div>
<div class="visible-lg visible-md hidden-xs vert-offset-top-5"></div>
<div class="site-wrapper">
    <div class="site-wrapper-inner">
        <div class="container">
            <ol class="breadcrumb visible-lg-block">
                <li><a href="<?php echo https_url('/'.$this->lang->lang().'/siteadmin_dashboard')?>">Home</a></li>
                <li><a href="<?php echo https_url('/'.$this->lang->lang().'/site_admin/candidate_list')?>">Candidates</a></li>
            </ol>
            <?php if($candidates) {
                foreach($candidates as $candidate) {
            ?>
                <div class="row">
                    <div class="col-xs-12 col-md-12 col-lg-12">
                        <?php
                            if( ! empty($candidate['candidate_profilepicurl']) ) {
                        ?>                                    
                        <img src="<?php echo '/images/candidate/photo/'.$candidate['candidate_profilepicurl']; ?>" height="90px" class="img-circle" />
                        <?php } else { ?>
                        <img src="/images/icons/candidate.png" height="50px" class="img-circle" />
                        <?php } ?>
                        <h2><?php echo $candidate['candidate_lastname']." ".$candidate['candidate_firstname']; ?></h2>
                        <p>
                            <?php
                                echo "<strong style='line-height: 40px;'>".lang('siteadminusers.recruiterphone')."</strong>: ".$candidate['candidate_phonecountrycode']." ".$candidate['candidate_phonenumber']."<br/>";
                                echo "<strong style='line-height: 40px;'>Member since </strong>: ".date("d-M-Y", strtotime($candidate['created_date']) )."<br/>";
                                echo "<strong style='line-height: 40px;'>".lang('siteadminusers.recruiterdescription')."</strong>: <br />".$candidate['brief_description']."<br/>";
                            ?>
                            <table class="table table-bordered table-responsive">
                                <thead class="tablehead_bgColor">
                                    <tr>
                                        <th><?=lang('candidatedash.skilltblheading1');?></th>
                                        <th><?=lang('candidatedash.skilltblheading2');?></th>
                                        <th><?=lang('candidatedash.skilltblheading3');?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $skills = explode(";", $candidate['candidate_skills']);                                        
                                        foreach($skills as $val) {                                            
                                            $sklval = explode(",", $val);
                                            echo "<tr>";
                                            echo "<td>".$sklval[0]."</td>";
                                            echo "<td>".$sklval[1]."</td>";
                                            echo "<td>".$sklval[2]."</td>";
                                            echo "</tr>";    
                                        } 
                                    ?>
                                </tbody>
                            </table>
                        </p>
                    </div>
                </div>
            <?php } ?>
            <div class="row">
                <div class="col-md-12 col-md-offset-0">
                    <?php } else { ?>
                        <div class="col-xs-12">
                            <h3>No candidates available.</h3>
                        </div>
                    <?php } ?>                
                </div>
            </div>
        </div>
    </div>
</div>