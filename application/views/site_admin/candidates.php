<?php $candidateId = $this->uri->segment(4); 
$candidates = $this->login_database->read_candidate_information($candidateId);
$candRef = $candidates[0]['candidate_ref_id'];
?>
<div class="site-content" >

	<div class="container page-header">
		<div class="row">
			<div class="col-md-6 no-padding">
				<h1 class="page-title font-1"><?=lang('siteadminusers.employerListheading');?></h1>
			</div>
			<div class="col-md-6 no-padding">
                <div class="subpage-breadcrumbs">
					<a href="<?php echo https_url('/'.$this->lang->lang().'/site_admin/dashboard')?>">Home</a>&nbsp;/&nbsp;<a href="<?php echo https_url('/'.$this->lang->lang().'/site_admin/candidate_list')?>">Candidates</a>
				</div>
            </div>
		</div>
	</div>
    
    <div class="page-content container">
        <div class="row">
            <?php if($candidates) {
                foreach($candidates as $candidate) {
            ?>
                <div class="row">
                    <div class="col-md-1">
                        <!-- Profile Picture Row - Start -->
                        <?php
                            if( ! empty($candidate['candidate_profilepicurl']) ) {
                        ?>                                    
                            <img src="<?php echo '/images/candidate/photo/'.$candidate['candidate_profilepicurl']; ?>" width="70px" />
                        <?php } else { ?>
                            <img src="/images/icons/candidate.png" width="70px" />
                        <?php } ?>
                        <!-- Profile Picture Row - End -->
                        
                    </div>
                    <div class="col-md-11">                        
                        <h2><?php echo $candidate['candidate_lastname']." ".$candidate['candidate_firstname']; ?></h2>
                        <div class="row">
                            <div class="col-md-7">
                                <div class="row">
                                    <div class="col-md-3">
                                        <?php 
                                            echo "<strong>".lang('siteadminusers.recruiterphone')."</strong>";
                                        ?>
                                    </div>
                                    <div class="col-md-9">
                                        <?php echo $candidate['candidate_phonecountrycode']." ".$candidate['candidate_phonenumber']; ?>
                                    </div>
                                </div>
                                <br />
                                <div class="row">
                                    <div class="col-md-3">
                                        <?php 
                                            echo "<strong>Member since</strong>:";
                                        ?>
                                    </div>
                                    <div class="col-md-9">
                                        <?php echo date("d-M-Y", strtotime($candidate['created_date']) ); ?>
                                    </div>
                                </div>
                                <br />
                                <div class="row">
                                    <div class="col-md-3">
                                        <?php 
                                            echo "<strong>".lang('siteadminusers.recruiterdescription')."</strong>:";
                                        ?>
                                    </div>
                                    <div class="col-md-9">
                                        <?php echo $candidate['brief_description']; ?>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="col-md-5">
                                <table class="table table-bordered table-responsive">
                                    <thead>
                                        <tr><th colspan="3" style="text-align: center;">Skills</th></tr>
                                        <tr>
                                            
                                            <th><?=lang('candidatedash.skilltblheading1');?></th>
                                            <th><?=lang('candidatedash.skilltblheading2');?></th>
                                            <th><?=lang('candidatedash.skilltblheading3');?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $query = $this->db->select('*')->from('candidate_skills')->where('candidate_ref_id', $candRef );
                                            $query = $this->db->get();
                                            foreach ($query->result_array() as $row) {
                                                
                                                echo "<tr>";
                                                echo "<td>".$row['candidate_skill_name']."</td>";
                                                echo "<td>".$row['candidate_skill_level']."</td>";
                                                echo "<td>".$row['candidate_skill_rating']."</td>";
                                                echo "</tr>";    
                                            } 
                                        ?>
                                    </tbody>
                                </table>
                                <br />
                                <table class="table table-bordered table-responsive">
                                    <thead>
                                        <tr><th colspan="4" style="text-align: center;">Candidate References</th></tr>
                                        <tr>
                                            <th><?=lang('candidatedash.candidaterefheading1');?></th>
                                            <th><?=lang('candidatedash.candidaterefheading2');?></th>
                                            <th><?=lang('candidatedash.candidaterefheading3');?></th>
                                            <th><?=lang('candidatedash.candidaterefheading4');?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $query = $this->db->select('*')->from('candidate_references')->where('candidate_coderefs_id', $candidateId );
                                            $query = $this->db->get();
                                            foreach ($query->result_array() as $row) {
                                                
                                                echo "<tr>";
                                                echo "<td>".$row["candidate_ref_name"]."</td>";
                                                echo "<td>".$row["candidate_ref_company"]."</td>";
                                                echo "<td>".$row["candidate_ref_email"]."</td>";
                                                
                                                $candContact = $row["candidate_ref_contact"];
                                                $tmp = explode('-',$candContact);
                                                $ctryCode = $tmp[0];
                                                $ctntNum = $tmp[1];
                                                preg_match("/\(([^\)]*)\)/", $candContact, $tmp);
                                                
                                                echo "<td>".$tmp[0]." ".$ctntNum."</td>";
                                                echo "</tr>";
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        
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