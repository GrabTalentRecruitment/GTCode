<script type="text/javascript" src="/js/jquery.jplayer.min.js"></script>
<link href="/css/jplayer/jplayer.blue.monday.min.css" rel="stylesheet" type="text/css" />
<link href="/css/percircle.css" rel="stylesheet" />
<div class="site-wrapper vert-offset-top-5">
    <?php 
        $sess_data = $this->session->userdata('user_data'); $video_url = '';
        $candRefcount = $this->login_database->get_candidateRef_cnt( $sess_data[0]['candidate_ref_id'] );
        $candAcadDetcount = $this->login_database->get_academicDet_cnt( $sess_data[0]['candidate_ref_id'], $sess_data[0]['candidate_email'] );
        $candWorkExpcount = $this->login_database->get_workExp_cnt( $sess_data[0]['candidate_ref_id'], $sess_data[0]['candidate_email'] );
        $profilePercent = $this->login_database->candidate_profilepercent( strlen( $sess_data[0]['candidate_skills']), $candRefcount[0]['cnt'], $candAcadDetcount[0]['cnt'], $candWorkExpcount[0]['cnt'] );
    ?>
    <div class="site-wrapper-inner">
        <div class="container">
            <!-- Personal Information section - start -->
            <div class="vert-offset-top-1 visible-xs visible-sm"></div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" >
                    <div class="panel panel-danger">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-3 col-lg-offset-0 col-xs-offset-3 col-sm-offset-3 col-md-9 col-md-offset-3">
                                    <?php
                                        if( ! empty($sess_data[0]['candidate_profilepicurl']) ) {
                                    ?>
                                    <img alt="User Pic" src="<?php echo '/images/candidate/photo/'.$sess_data[0]['candidate_profilepicurl'];?>" class="img-circle img-responsive" />
                                    <?php } else { ?>
                                    <img alt="User Pic" src="/images/profile-pic.jpg" height="90px" class="img-circle img-responsive" />
                                    <?php } ?>
                                </div>
                                <?php foreach($sess_data as $usrdt){ ?>
                                <div class="col-md-12 col-lg-9">
                                    <div class="col-lg-6 col-lg-offset-0 col-xs-offset-2 col-sm-offset-2 col-md-8 col-md-offset-2 pull-left" style="padding-left: 7px;">
                                        <h3><?php echo $usrdt['candidate_firstname']." ".$usrdt['candidate_lastname'];?></h3>
                                    </div>
                                    <div class="col-lg-3 visible-lg pull-right">
                                        <div id="lightcircle" class="c100 p<?php echo $profilePercent; ?> orange small">                                            
                                            <span><?php echo $profilePercent."%"; ?></span>
                                            <div class="slice"><div class="bar"></div><div class="fill"></div></div>
                                        </div>
                                    </div>
                                    <table class="table table-user-information">
                                        <tbody>                                            
                                                <input type="hidden" value="<?php echo $usrdt['candidate_email'];?>" name="skill-email" id="skill-email"/>
                                                <tr>
                                                    <td><b><?=lang('candidatesignup.phonenumber')?>:</b></td>
                                                    <td><?php echo $usrdt['candidate_phonecountrycode']. " ". $usrdt['candidate_phonenumber'];?></td>
                                                </tr>
                                                <tr>
                                                    <td><b><?=lang('candidatesignup.email')?>:</b></td>
                                                    <td><?php echo $usrdt['candidate_email'];?></td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Gender</strong></td>
                                                    <td><?php echo $usrdt['candidate_gender'];?></td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Created on:</strong></td>
                                                    <td><?php echo date('d-M-Y', strtotime($usrdt['created_date']) );?></td>
                                                </tr>
                                                <tr>
                                                    <td><b>Total Experience:</b></td>
                                                    <td><p style="word-wrap: normal;"><?php echo $usrdt['candidate_total_experience'];?></p></td>
                                                </tr>
                                                <?php $video_url = $usrdt['video_resume_url']; ?>
                                                <input type="hidden" id="inputVideoResume" value="<?php echo $video_url?>" />                                                
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>        
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 pull-right" >
                    <div class="panel panel-danger col-xs-12 col-sm-12 col-lg-12 col-md-12">
                        <div class="panel-body">
                            <?php if( $video_url != "" || !empty($video_url) ) { ?>
                                <div id="jp_container_1" class="jp-video" role="application" aria-label="media player">
                                	<div class="jp-type-single">
                                		<div id="jquery_jplayer_1" class="jp-jplayer"></div>
                                		<div class="jp-gui">
                                			<div class="jp-video-play">
                                				<button class="jp-video-play-icon" role="button" tabindex="0">play</button>
                                			</div>
                                			<div class="jp-interface">
                                				<div class="jp-progress">
                                					<div class="jp-seek-bar">
                                						<div class="jp-play-bar"></div>
                                					</div>
                                				</div>
                                				<div class="jp-current-time" role="timer" aria-label="time">&nbsp;</div>
                                				<div class="jp-duration" role="timer" aria-label="duration">&nbsp;</div>
                                				<div class="jp-controls-holder">
                                					<div class="jp-controls">
                                						<button class="jp-play" role="button" tabindex="0">play</button>
                                						<button class="jp-stop" role="button" tabindex="0">stop</button>
                                					</div>
                                					<div class="jp-volume-controls">
                                						<button class="jp-mute" role="button" tabindex="0">mute</button>
                                						<button class="jp-volume-max" role="button" tabindex="0">max volume</button>
                                						<div class="jp-volume-bar">
                                							<div class="jp-volume-bar-value"></div>
                                						</div>
                                					</div>
                                					<div class="jp-toggles">
                                						<button class="jp-repeat" role="button" tabindex="0">repeat</button>
                                						<button class="jp-full-screen" role="button" tabindex="0">full screen</button>
                                					</div>
                                				</div>
                                			</div>
                                		</div>
                                		<div class="jp-no-solution">
                                			<span>Update Required</span>
                                			To play the media you will need to either update your browser to a recent version or update your <a href="http://get.adobe.com/flashplayer/" target="_blank">Flash plugin</a>.
                                		</div>
                                	</div>
                                </div>
                            <?php } else { ?>
                                <img src="/images/no-video-pic.jpg" class="col-xs-12 col-sm-12 col-md-12 col-lg-12" />
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Personal Information section - end -->
            
            <!-- Skills Section - Start -->
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-6">
                    <h4><img src="/images/icons/skills.png" height="30px" alt="<?=lang('candidatedash.skills')?>" title="<?=lang('candidatedash.skills')?>"/><?=lang('candidatedash.skills')?>:<button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#skillModal" title="Add more Skills"><span class='fa fa-plus'></span></button></h4>
                    <?php
                        $query = $this->db->select('candidate_skills')->where_in('candidate_email', $this->session->userdata('logged_in') )->get('candidate_signup');
                        foreach ($query->result_array() as $row) {
                            if( $row['candidate_skills'] != null || $row['candidate_skills'] != "") {
                                $skills = explode(";", $row['candidate_skills']);                                        
                                foreach($skills as $val) {                                            
                                    $sklval = explode(",", $val);
                    ?>
                        <div class="panel panel-primary visible-xs-block">
                            <div class="panel-heading">
                            <?php
                                echo "<div class='row'>";
                                echo "<div class='col-xs-8'>" . $sklval[0] . " (" . $sklval[1] . ")</div>";
                                echo "<div class='col-xs-4'>";
                                echo "<button type='button' class='btn btn-md btn-danger' data-toggle='modal' id='skill-btn-delete' value='".$val."'>Delete</button>";
                                echo "</div>";                                
                                echo "</div>";
                            ?>
                            </div>
                            <div class="panel-body">
                                <div class="progress">
                                    <?php
                                        $progressbar_arr = array('0' => '0', '20' => '1', '40' => '2', '60' => '3', '80' => '4', '100' => '5');
                                        $progressPercent = array_search($sklval[2],$progressbar_arr);
                                    ?>
                                    <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="3" aria-valuemin="0" aria-valuemax="5"
                                    <?php 
                                        echo "style='width:".$progressPercent."%';>";
                                        echo "<strong><font size='3%'>".$sklval[2]."</font></strong>";
                                    ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                            }
                        }
                    }
                    ?>
                    <div class="panel panel-default">
                        <table class="table table-bordered table-responsive hidden-xs">
                            <thead class="tablehead_bgColor">
                                <tr>
                                    <th><?=lang('candidatedash.skilltblheading1');?></th>
                                    <th><?=lang('candidatedash.skilltblheading2');?></th>
                                    <th><?=lang('candidatedash.skilltblheading3');?></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $query = $this->db->select('candidate_skills')->where_in('candidate_email', $this->session->userdata('logged_in') )->get('candidate_signup');
                                    foreach ($query->result_array() as $row) {
                                        if( $row['candidate_skills'] != null || $row['candidate_skills'] != "") {
                                            $skills = explode(";", $row['candidate_skills']);                                        
                                            foreach($skills as $val) {                                            
                                                $sklval = explode(",", $val);
                                                echo "<tr>";
                                                echo "<td>".$sklval[0]."</td>";
                                                echo "<td>".$sklval[1]."</td>";
                                                echo "<td>".$sklval[2]."</td>";
                                                echo "<td><button type='button' class='btn btn-xs btn-danger' data-toggle='modal' id='skill-btn-delete' value='".$val."'><span class='fa fa-trash'></span></button></td>";
                                                echo "</tr>";    
                                            }    
                                        }
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- Skills Section - End -->
                
                <!-- Candidate References section - Start -->
                <div class="col-xs-12 col-sm-12 col-md-6">
                    <h4><img src="/images/icons/references.png" height="30px" alt="<?=lang('candidatedash.candidatereference')?>" title="<?=lang('candidatedash.candidatereference')?>"/><?=lang('candidatedash.candidatereference');?>:<button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#candRefModal" title="Add Candidate References"><span class='fa fa-plus'></span></button></h4>
                    <?php
                        $candRefId = $this->session->userdata('user_data')[0];
                        $query = $this->db->select('*')->where_in('candidate_ref_id', $candRefId )->get('candidate_references');
                        foreach ($query->result_array() as $row) {
                    ?>
                    <div class="panel panel-primary visible-xs-block">
                        <div class="panel-heading">
                        <?php
                            echo "<div class='row'>";
                            echo "<div class='col-xs-6'>" . $row["candidate_ref_name"] . ")</div>";
                            echo "<div class='col-xs-6'>";
                            echo "<button type='button' class='btn btn-md btn-success col-xs-12' data-toggle='modal' data-target='#candRefModal' id='candRef-btn-fetch' value='".$row["candidate_coderefs_id"]."' data-whatever='".$row["candidate_coderefs_id"]."'><span class='fa fa-pencil'></span></button>&nbsp;&nbsp;<button type='button' class='btn btn-md btn-danger col-xs-12' data-toggle='modal' id='candRef-btn-delete' value='".$row["candidate_coderefs_id"]."'><span class='fa fa-trash'></span></button>";
                            echo "</div>";                                
                            echo "</div>";
                        ?>
                        </div>
                        <div class="panel-body">
                            <table class="table borderless">
                                <tbody>
                                    <tr>
                                        <td class="col-xs-6"><strong><?=lang('candidatedash.candidaterefheading1')?></strong></td>
                                        <td><?php echo $row["candidate_ref_name"];?></td>
                                    </tr>
                                    <tr>
                                        <td><strong><?=lang('candidatedash.candidaterefheading2')?></strong></td>
                                        <td><?php echo $row["candidate_ref_company"];?></td>
                                    </tr>
                                    <tr>
                                        <td><strong><?=lang('candidatedash.candidaterefheading3')?></strong></td>
                                        <td><?php echo $row["candidate_ref_email"];?></td>
                                    </tr>
                                    <tr>
                                        <td><strong><?=lang('candidatedash.candidaterefheading4')?></strong></td>
                                        <td>
                                        <?php
                                            $candContact = $row["candidate_ref_contact"];
                                            $tmp = explode($candContact,'-');
                                            $ctryCode = $tmp[0];
                                            $ctntNum = $tmp[1];
                                            echo $tmp[1];
                                        ?>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <?php } ?>
                    <div class="panel panel-default">
                        <table class="table table-bordered table-responsive hidden-xs">
                            <thead class="tablehead_bgColor">
                                <tr>
                                    <th><?=lang('candidatedash.candidaterefheading1');?></th>
                                    <th><?=lang('candidatedash.candidaterefheading2');?></th>
                                    <th><?=lang('candidatedash.candidaterefheading3');?></th>
                                    <th><?=lang('candidatedash.candidaterefheading4');?></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $candRefId = $this->session->userdata('user_data')[0];
                                    $query = $this->db->select('*')->where_in('candidate_ref_id', $candRefId )->get('candidate_references');
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
                                        echo "<td style='width:10%;'>
                                        <button type='button' class='btn btn-xs btn-success col-sm-12 col-md-12 col-lg-12' data-toggle='modal' data-target='#candRefModal' id='candRef-btn-fetch' value='".$row["candidate_coderefs_id"]."' data-whatever='".$row["candidate_coderefs_id"]."' style='margin-right:5px; margin-bottom:5px;'><span class='fa fa-pencil'></span></button>
                                        <button type='button' class='btn btn-xs btn-danger col-sm-12 col-md-12 col-lg-12' data-toggle='modal' id='candRef-btn-delete' value='".$row["candidate_coderefs_id"]."'><span class='fa fa-trash'></span></button></td>";
                                        echo "</tr>";
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Candidate References section - End -->
            <!-- Second Row - End -->
            
            <!-- Third Row - Start -->
            <!-- Candidate Academic Details section - Start -->
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <h4><img src="/images/icons/academic.png" height="30px" alt="<?=lang('candidatedash.academicdetails')?>" title="<?=lang('candidatedash.academicdetails')?>"/><?=lang('candidatedash.academicdetails')?>:<button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#eduLvlModal" title="Add Academic Details"><span class='fa fa-plus'></span></button></h4>                                    
                    <?php
                        $query = $this->db->select('*')->where_in('candidate_email', $this->session->userdata('logged_in') )->get('candidate_education');
                        foreach ($query->result_array() as $row) {
                    ?>
                    <div class="panel panel-primary visible-xs-block">
                        <div class="panel-body">
                            <table class="table borderless">
                                <tbody>
                                    <tr>
                                        <td class="col-xs-6"><strong><?=lang('candidatesignup.educationcolumn1')?></strong></td>
                                        <td><?php echo $row["candidate_univ_name"];?></td>
                                    </tr>
                                    <tr>
                                        <td><strong><?=lang('candidatesignup.educationcolumn2')?></strong></td>
                                        <td><?php echo $row["candidate_degree"];?></td>
                                    </tr>
                                    <tr>
                                        <td><strong><?=lang('candidatesignup.educationcolumn3')?></strong></td>
                                        <td><?php echo $row["candidate_field_of_study"];?></td>
                                    </tr>
                                    <tr>
                                        <td><strong><?=lang('candidatesignup.educationcolumn4')?></strong></td>
                                        <td><?php echo date("d-M-Y",strtotime($row["candidate_edu_startDt"])); ?></td>
                                    </tr>
                                    <tr>
                                        <td><strong><?=lang('candidatesignup.educationcolumn5')?></strong></td>
                                        <td><?php echo date("d-M-Y",strtotime($row["candidate_edu_endDt"])); ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <?php } ?>
                    <div class="panel panel-default">
                        <table class="table table-bordered table-responsive hidden-xs">
                            <thead class="tablehead_bgColor">
                                <tr>
                                    <th><?=lang('candidatesignup.educationcolumn1')?></th>
                                    <th><?=lang('candidatesignup.educationcolumn2')?></th>
                                    <th><?=lang('candidatesignup.educationcolumn3')?></th>
                                    <th><?=lang('candidatesignup.educationcolumn4')?></th>
                                    <th><?=lang('candidatesignup.educationcolumn5')?></th>
                                    <th style="width: 10%;"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $query = $this->db->select('*')->where_in('candidate_email', $this->session->userdata('logged_in') )->get('candidate_education');
                                    foreach ($query->result_array() as $row) {
                                        echo "<tr>";
                                        echo "<td>".$row["candidate_univ_name"]."</td>";
                                        echo "<td>".$row["candidate_degree"]."</td>";
                                        echo "<td>".$row["candidate_field_of_study"]."</td>";
                                        echo "<td>".date("d-M-Y",strtotime($row["candidate_edu_startDt"]))."</td>";
                                        echo "<td>".date("d-M-Y",strtotime($row["candidate_edu_endDt"]))."</td>";
                                        echo "<td><button type='button' class='btn btn-xs btn-success col-sm-12 col-md-12 col-lg-5' data-toggle='modal' data-target='#eduLvlUpdModal' id='AcadEdu-btn-fetch' value='".$row["candidate_coderefs_id"]."' style='margin-right:5px; margin-bottom:5px;'><span class='fa fa-pencil'></span></button>
                                        <button type='button' class='btn btn-xs btn-danger col-sm-12 col-md-12 col-lg-6' data-toggle='modal' id='AcadEdu-btn-delete' value='".$row["candidate_coderefs_id"]."'><span class='fa fa-trash'></span></button></td>";
                                        echo "</tr>";
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Candidate Academic Details section - Start -->
            <!-- Third Row - End -->
            <!-- Fourth Row - Start -->
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <h4><img src="/images/icons/work-exp.png" height="30px" alt="<?=lang('candidatedash.workexp')?>" title="<?=lang('candidatedash.workexp')?>"/><?=lang('candidatedash.workexp')?>:<button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#workExpModal" title="Add Work Experience"><span class='fa fa-plus'></span></button></h4>
                    <?php
                        $query = $this->db->select('*')->where_in('candidate_email', $this->session->userdata('logged_in') )->get('candidate_employment');
                        foreach ($query->result_array() as $row) {
                    ?>
                    <div class="panel panel-primary visible-xs-block">
                        <div class="panel-heading"><?php 
                            echo "<div class='row'>";
                            echo "<div class='col-xs-6'>".$row["candidate_emp_name"]."</div>";
                            echo "<div class='col-xs-6 pull-right'><button type='button' class='btn btn-md btn-success' data-toggle='modal' data-target='#WorkExpUpdModal' id='workExp-btn-fetch' value='".$row["candidate_coderefs_id"]."'><span class='fa fa-pencil'></span></button>&nbsp;&nbsp;<button type='button' class='btn btn-md btn-danger' data-toggle='modal' id='workExp-btn-delete' value='".$row["candidate_coderefs_id"]."'><span class='fa fa-trash'></span></button></div>";
                            echo "</div>"
                            ?></div>
                        <div class="panel-body">
                            <table class="table borderless">
                                <tbody>
                                    <tr>
                                        <td><strong><?=lang('candidatedash.workexptblheading2')?></strong></td>
                                        <td><?php echo $row["candidate_curr_designation"];?></td>
                                    </tr>
                                    <tr>
                                        <td><strong><?=lang('candidatedash.workexptblheading3')?></strong></td>
                                        <td><?php echo $row["candidate_salary"];?></td>
                                    </tr>
                                    <tr>
                                        <td><strong><?=lang('candidatedash.workexptblheading4')?></strong></td>
                                        <td><?php echo $row["candidate_emp_location"];?></td>
                                    </tr>
                                    <tr>
                                        <td><strong><?=lang('candidatedash.workexptblheading5')?></strong></td>
                                        <td><?php echo date("d-M-Y",strtotime($row["candidate_emp_startDt"])); ?></td>
                                    </tr>
                                    <tr>
                                        <td><strong><?=lang('candidatedash.workexptblheading6')?></strong></td>
                                        <td><?php echo date("d-M-Y",strtotime($row["candidate_emp_endDt"])); ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <?php } ?>
                    <div class="panel panel-default">
                        <table class="table table-bordered table-responsive hidden-xs">
                            <thead class="tablehead_bgColor">
                                <tr>
                                    <th><?=lang('candidatedash.workexptblheading1');?></th>
                                    <th><?=lang('candidatedash.workexptblheading2');?></th>
                                    <th><?=lang('candidatedash.workexptblheading3');?></th>
                                    <th><?=lang('candidatedash.workexptblheading4');?></th>
                                    <th><?=lang('candidatedash.workexptblheading5');?></th>
                                    <th><?=lang('candidatedash.workexptblheading6');?></th>
                                    <th style="width: 10%;"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $query = $this->db->select('*')->where_in('candidate_email', $this->session->userdata('logged_in') )->get('candidate_employment');
                                    foreach ($query->result_array() as $row) {
                                        echo "<tr>";
                                        echo "<td>".$row["candidate_emp_name"]."</td>";
                                        echo "<td>".$row["candidate_curr_designation"]."</td>";
                                        echo "<td>".$row["candidate_salary"]."</td>";
                                        echo "<td>".$row["candidate_emp_location"]."</td>";
                                        echo "<td>".date("d-M-Y",strtotime($row["candidate_emp_startDt"]))."</td>";
                                        echo "<td>".date("d-M-Y",strtotime($row["candidate_emp_endDt"]))."</td>";
                                        echo "<td>
                                        <button type='button' class='btn btn-xs btn-success col-sm-12 col-md-12 col-lg-5' data-toggle='modal' data-target='#WorkExpUpdModal' id='workExp-btn-fetch' value='".$row["candidate_coderefs_id"]."' style='margin-right:5px; margin-bottom:5px;'><span class='fa fa-pencil'></span></button>
                                        <button type='button' class='btn btn-xs btn-danger col-sm-12 col-md-12 col-lg-6' data-toggle='modal' id='workExp-btn-delete' value='".$row["candidate_coderefs_id"]."'><span class='fa fa-trash'></span></button></td>";
                                        echo "</tr>";
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Fourth Row - End -->
            <!-- Fifth Row - Start -->
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 hidden-xs">
                    <h4><img src="/images/icons/applications.png" height="30px" alt="<?=lang('candidatedash.mypastapplication')?>" title="<?=lang('candidatedash.mypastapplication')?>"/><?=lang('candidatedash.mypastapplication')?>:</h4>
                    <div class="panel panel-default">
                        <table class="table table-bordered table-responsive">
                            <thead class="tablehead_bgColor">
                                <tr>
                                    <th><?=lang('candidatedash.mypastapplnheading1');?></th>
                                    <th><?=lang('candidatedash.mypastapplnheading4');?></th>
                                    <th><?=lang('candidatedash.mypastapplnheading2');?></th>
                                    <th><?=lang('candidatedash.mypastapplnheading3');?></th>                                
                                    <th><?=lang('candidatedash.mypastapplnheading5');?></th>
                                    <th><?=lang('candidatedash.mypastapplnheading6');?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $query = $this->db->select('*')->where_in('candidate_email', $this->session->userdata('logged_in') )->get('candidate_application');
                                    foreach ($query->result_array() as $row) {
                                        $jobDetails = $this->login_database->read_job_information($row['candidate_appln_job_id']);
                                        echo "<tr>";
                                        echo "<td><a href='".https_url($this->lang->lang()."/candidate/job/".$row['candidate_appln_job_id'])."'>".$jobDetails[0]['job_title']."</a></td>";
                                        $client_name = $this->login_database->read_client_information($jobDetails[0]['job_created_by']);
                                        echo "<td>".$client_name[0]['employer_name']."</td>";
                                        echo "<td>".date("d-M-Y h:m:s",strtotime($row['cand_appln_created_date']))."</td>";
                                        echo "<td>".date("d-M-Y",strtotime($jobDetails[0]['job_postdate']))."</td>";
                                        echo "<td>".$row['candidate_appln_stage']."</td>";
                                        if( strtotime($row['cand_appln_last_modified_date']) != "") {
                                            echo "<td>".date("d-M-Y h:m:s",strtotime($row['cand_appln_last_modified_date']))."</td>";    
                                        } else {
                                            echo "<td>-</td>";
                                        }                                    
                                        echo "</tr>";
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Fifth Row - End -->
            
            <!-- Skill Modal Window -- Start -->
            <div class="modal fade" id="skillModal" tabindex="-1" role="dialog" aria-labelledby="skillModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="skillModalLabel"><?=lang('candidatedash.skilltblheadingpopup');?></h4>
                        </div>
                        <div class="modal-body">
                            <center><span id="modal-error-msg" style="color: red;"></span></center>
                            <form method="post" accept-charset="utf-8" enctype="multipart/form-data" role="form" id="example-form">
                                <div class="form-group">
                                    <label for="recipient-name" class="control-label"><?=lang('candidatedash.skilltblheading1');?>:</label>
                                    <input type="text" class="form-control" id="skill-name" name="skill-name"/>
                                </div>
                                <div class="form-group">
                                    <label for="message-text" class="control-label"><?=lang('candidatedash.skilltblheading2');?>:</label>
                                    <select id="skill-level" name="skill-level" class="form-control">
                                        <option value="0">--None--</option>
                                        <option value="Basic">Basic</option>
                                        <option value="Intermediate">Intermediate</option>
                                        <option value="Advanced">Advanced</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="message-text" class="control-label"><?=lang('candidatedash.skilltblheading3');?>:</label>
                                    <select id="skill-rating" name="skill-rating" class="form-control">
                                        <option value="0">--None--</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" id="skill-btn-save">Save</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Skill Modal Window -- End -->
            
            <!-- Candidate References Modal Window -- Start -->
            <div class="modal fade" id="candRefModal" tabindex="-1" role="dialog" aria-labelledby="skillModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="candRefModalLabel"><?=lang('candidatedash.candidatereferencepopup');?></h4>
                        </div>
                        <div class="modal-body">
                            <center><span id="candRef-modal-error-msg" style="color: red;"></span></center>
                            <form method="post" accept-charset="utf-8" enctype="multipart/form-data" role="form" id="example-form">
                                <div class="form-group">
                                    <label for="candref-name" class="control-label"><?=lang('candidatedash.candidaterefheading1');?>:</label>
                                    <input type="text" class="form-control" id="candref-name" name="candref-name">
                                </div>
                                <div class="form-group">
                                    <label for="candref-company" class="control-label"><?=lang('candidatedash.candidaterefheading2');?>:</label>
                                    <input type="text" class="form-control" id="candref-company" name="candref-company">
                                </div>
                                <div class="form-group">
                                    <label for="candref-email" class="control-label"><?=lang('candidatedash.candidaterefheading3');?>:</label>
                                    <input type="email" class="form-control" id="candref-email" name="candref-email">
                                </div>
                                <div class="form-group">
                                    <label for="candref-contactnumber" class="control-label"><?=lang('candidatedash.candidaterefheading4');?>:</label>
                                    <select id="candref-NumberCode" name="candref-NumberCode" class="form-control">
                                        <option value="0">--Please Select--</option>
                                        <?php                                
                                            $visa_status_list = $this->db->query('SELECT * FROM candidate_country order by country_name')->result_array();
                                            foreach($visa_status_list as $v) {
                                                echo '<option name="'.$v['country_currency_code'].'" value="'.$v['country_code'].' (+'.$v['country_phone_code'].')">'.$v['country_name'].' (+'.$v['country_phone_code'].')</option>';
                                            }                                    
                                        ?>
                                    </select><br />
                                    <input type="text" class="form-control" id="candref-contactnumber" name="candref-contactnumber">
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" id="cand-ref-btn-save">Save</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Candidate References Modal Window -- End -->
            
            <!-- Candidate References Update Modal Window -- Start -->
            <div class="modal fade" id="candRefUpdModal" tabindex="-1" role="dialog" aria-labelledby="candRefUpdModalModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="candRefUpdModalLabel"><?=lang('candidatedash.candidatereferencepopup');?></h4>
                        </div>
                        <div class="modal-body">
                            <center><span id="candRefUpd-modal-error-msg" style="color: red;"></span></center>
                            <form method="post" accept-charset="utf-8" enctype="multipart/form-data" role="form" id="example-form">
                                <div class="form-group">
                                    <label for="candref-name" class="control-label"><?=lang('candidatedash.candidaterefheading1');?>:</label>
                                    <input type="text" class="form-control" id="candrefUpd-name" name="candrefUpd-name">
                                </div>
                                <div class="form-group">
                                    <label for="candref-company" class="control-label"><?=lang('candidatedash.candidaterefheading2');?>:</label>
                                    <input type="text" class="form-control" id="candrefUpd-company" name="candrefUpd-company">
                                </div>
                                <div class="form-group">
                                    <label for="candref-email" class="control-label"><?=lang('candidatedash.candidaterefheading3');?>:</label>
                                    <input type="email" class="form-control" id="candrefUpd-email" name="candrefUpd-email">
                                </div>
                                <div class="form-group">
                                    <label for="candref-contactnumber" class="control-label"><?=lang('candidatedash.candidaterefheading4');?>:</label>
                                    <select id="candrefUpd-NumberCode" name="candrefUpd-NumberCode" class="required form-control">
                                        <option value="0">--Please Select--</option>
                                        <?php                                
                                            $visa_status_list = $this->db->query('SELECT * FROM candidate_country order by country_name')->result_array();
                                            foreach($visa_status_list as $v) {
                                                echo '<option name="'.$v['country_currency_code'].'" value="'.$v['country_code'].' (+'.$v['country_phone_code'].')">'.$v['country_name'].' (+'.$v['country_phone_code'].')</option>';
                                            }                                    
                                        ?>
                                    </select><br />
                                    <input type="text" class="form-control" id="candrefUpd-contactnumber" name="candrefUpd-contactnumber">
                                    <input type="hidden" class="form-control" id="candrefUpd-refCode" name="candrefUpd-refCode" />
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" id="candref-btn-update">Update</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Candidate References Update Modal Window -- End -->
            
            <!-- Work Experience Modal Window -- Start -->
            <div class="modal fade" id="workExpModal" tabindex="-1" role="dialog" aria-labelledby="workExpModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="workExpModalLabel"><?=lang('candidatedash.workexptblheadingpopup');?></h4>
                        </div>
                        <div class="modal-body">
                            <center><span id="workExp-modal-error-msg" style="color: red;"></span></center>
                            <form method="post" accept-charset="utf-8" enctype="multipart/form-data" role="form" id="example-form">
                                <div class="form-group">
                                    <label for="employer-name" class="control-label"><?=lang('candidatedash.workexptblheading1');?>:</label>
                                    <input type="text" class="form-control" id="employer-name" name="employer-name"/>
                                </div>
                                <div class="form-group">
                                    <label for="employer-designation" class="control-label"><?=lang('candidatedash.workexptblheading2');?>:</label>
                                    <input type="text" class="form-control" id="employer-designation" name="employer-designation"/>
                                </div>
                                <div class="form-group">
                                    <label for="designation" class="control-label"><?=lang('candidatedash.workexptblheading3');?>:</label>
                                    <input type="text" class="form-control" id="employer-salary" name="employer-salary"/>
                                </div>
                                <div class="form-group">
                                    <label for="employer-country" class="control-label"><?=lang('candidatedash.workexptblheading4');?>:</label>
                                    <select id="employer-country" name="employer-country" class="form-control">
                                        <option value="0">--None--</option>
                                        <?php
                                            $nationality_status_list = $this->db->query('SELECT * FROM candidate_country order by country_name')->result_array();
                                            foreach($nationality_status_list as $v) {
                                                echo '<option value="'.$v['country_name'].'">'.$v['country_name'].'</option>';
                                            }                                    
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="message-text" class="control-label"><?=lang('candidatedash.workexptblheading5');?>:</label>
                                    <div class="form-group">                                    
                                        <div class="col-sm-4">
                                            <select id="employer-startDate" name="employer-startDate" class="form-control">
                                                <option value="0"><?=lang('candidatesignup.addeducationpopupDtlbl1');?></option>
                                                <?php
                                                    for($dt=1; $dt <= 31; $dt++) {
                                                        echo '<option value="'.$dt.'">'.$dt.'</option>';
                                                    }                                    
                                                ?>
                                            </select>
                                        </div>                                    
                                        <div class="col-sm-4">
                                            <select id="employer-startMonth" name="employer-startMonth" class="form-control">
                                                <option value="0"><?=lang('candidatesignup.addeducationpopupDtlbl2');?></option>
                                                <?php
                                                    $i = 1;
                                                    $month_list = array('Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec');
                                                    foreach($month_list as $mth) {
                                                        echo '<option value="'.$i.'">'.$mth.'</option>';
                                                        $i++;
                                                    }                                    
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-sm-4">
                                            <select id="employer-startYear" name="employer-startYear" class="form-control">
                                                <option value="0"><?=lang('candidatesignup.addeducationpopupDtlbl3');?></option>
                                                <?php                                            
                                                    for($i = 1910; $i <= 2015; $i++) {
                                                        echo '<option value="'.$i.'">'.$i.'</option>';
                                                    }                                    
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div><br /><br />
                                <?php 
                                    $condition = "candidate_curr_job ='true' AND candidate_email='".$usrdt['candidate_email']."'";
                                    $this->db->select('*');
                                    $this->db->from('candidate_employment');
                                    $this->db->where($condition);
                                    $query = $this->db->get();
                                    if( $query->num_rows() <= 0) {
                                ?>
                                <div class="form-group">                                    
                                    <label for="employer-currJob" class="control-label"><?=lang('candidatedash.workexpCurrentjob');?>:</label>
                                    <input type="checkbox" name="employer-currJob" id="employer-currJob" />
                                </div>
                                <?php        
                                    }
                                ?>
                                <div class="form-group">
                                    <label for="message-text" class="control-label"><?=lang('candidatedash.workexptblheading6');?>:</label>
                                    <div class="form-group">                                    
                                        <div class="col-sm-4">
                                            <select id="employer-endDate" name="employer-endDate" class="form-control">
                                                <option value="0"><?=lang('candidatesignup.addeducationpopupDtlbl1');?></option>
                                                <?php
                                                    for($dt=1; $dt <= 31; $dt++) {
                                                        echo '<option value="'.$dt.'">'.$dt.'</option>';
                                                    }                                    
                                                ?>
                                            </select>
                                        </div>                                    
                                        <div class="col-sm-4">
                                            <select id="employer-endMonth" name="employer-endMonth" class="form-control">
                                                <option value="0"><?=lang('candidatesignup.addeducationpopupDtlbl2');?></option>
                                                <?php
                                                    $i = 1;
                                                    $month_list = array('Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec');
                                                    foreach($month_list as $mth) {
                                                        echo '<option value="'.$i.'">'.$mth.'</option>';
                                                        $i++;
                                                    }                                    
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-sm-4">
                                            <select id="employer-endYear" name="employer-endYear" class="form-control">
                                                <option value="0"><?=lang('candidatesignup.addeducationpopupDtlbl3');?></option>
                                                <?php                                            
                                                    for($i = 1910; $i <= 2015; $i++) {
                                                        echo '<option value="'.$i.'">'.$i.'</option>';
                                                    }                                    
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div><br />
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" id="workExp-btn-save">Save</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Work Experience Modal Window -- End -->
            
            <!-- Work Experience Update Modal Window -- Start -->
            <div class="modal fade" id="workExpUpdModal" tabindex="-1" role="dialog" aria-labelledby="workExpUpdModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="workExpUpdModalLabel"><?=lang('candidatedash.workexptblheadingpopup');?></h4>
                        </div>
                        <div class="modal-body">
                            <center><span id="workExpUpd-modal-error-msg" style="color: red;"></span></center>
                            <form method="post" accept-charset="utf-8" enctype="multipart/form-data" role="form" id="example-form">
                                <div class="form-group">
                                    <label for="employerUpd-name" class="control-label"><?=lang('candidatedash.workexptblheading1');?>:</label>
                                    <input type="text" class="form-control" id="employerUpd-name" name="employerUpd-name"/>
                                </div>
                                <div class="form-group">
                                    <label for="employerUpd-designation" class="control-label"><?=lang('candidatedash.workexptblheading2');?>:</label>
                                    <input type="text" class="form-control" id="employerUpd-designation" name="employerUpd-designation"/>
                                </div>
                                <div class="form-group">
                                    <label for="employerUpd-salary" class="control-label"><?=lang('candidatedash.workexptblheading3');?>:</label>
                                    <input type="text" class="form-control" id="employerUpd-salary" name="employerUpd-salary"/>
                                </div>
                                <div class="form-group">
                                    <label for="employerUpd-country" class="control-label"><?=lang('candidatedash.workexptblheading4');?>:</label>
                                    <select id="employerUpd-country" name="employerUpd-country" class="form-control">
                                        <option value="0">--None--</option>
                                        <?php
                                            $employerUpd_status_list = $this->db->query('SELECT * FROM candidate_country')->result_array();
                                            foreach($employerUpd_status_list as $empCtry) {
                                                echo '<option value="'.$empCtry['country_name'].'">'.$empCtry['country_name'].'</option>';
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="message-text" class="control-label"><?=lang('candidatedash.workexptblheading5');?>:</label>
                                    <div class="form-group">                                    
                                        <div class="col-sm-4">
                                            <select id="employerUpd-startDate" name="employerUpd-startDate" class="form-control">
                                                <option value="0"><?=lang('candidatesignup.addeducationpopupDtlbl1');?></option>
                                                <?php
                                                    for($dt=1; $dt <= 31; $dt++) {
                                                        if($dt < 10) {
                                                            echo '<option value="0'.$dt.'">0'.$dt.'</option>';    
                                                        } else {
                                                            echo '<option value="'.$dt.'">'.$dt.'</option>';
                                                        }
                                                    }                                    
                                                ?>
                                            </select>
                                        </div>                                    
                                        <div class="col-sm-4">
                                            <select id="employerUpd-startMonth" name="employerUpd-startMonth" class="form-control">
                                                <option value="0"><?=lang('candidatesignup.addeducationpopupDtlbl2');?></option>
                                                <?php
                                                    $month_list = array('01' => 'Jan','02' => 'Feb','03' => 'Mar','04' => 'Apr','05' => 'May','06' => 'Jun','07' => 'Jul','08' => 'Aug','09' => 'Sep','10' => 'Oct','11' => 'Nov','12' => 'Dec');
                                                    foreach($month_list as $key => $mth) {
                                                        echo '<option value="'.$key.'">'.$mth.'</option>';
                                                    }                                    
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-sm-4">
                                            <select id="employerUpd-startYear" name="employerUpd-startYear" class="form-control">
                                                <option value="0"><?=lang('candidatesignup.addeducationpopupDtlbl3');?></option>
                                                <?php                                            
                                                    for($i = 1910; $i <= 2015; $i++) {
                                                        echo '<option value="'.$i.'">'.$i.'</option>';
                                                    }                                    
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div><br /><br />
                                <div class="form-group">
                                    <label for="employerUpd-currJob" class="control-label"><?=lang('candidatedash.workexpCurrentjob');?>:</label>
                                    <input type="checkbox" name="employerUpd-currJob" id="employerUpd-currJob" />
                                </div>
                                <div class="form-group">
                                    <label for="message-text" class="control-label"><?=lang('candidatedash.workexptblheading6');?>:</label>
                                    <div class="form-group">                                    
                                        <div class="col-sm-4">
                                            <select id="employerUpd-endDate" name="employerUpd-endDate" class="form-control">
                                                <option value="0"><?=lang('candidatesignup.addeducationpopupDtlbl1');?></option>
                                                <?php
                                                    for($dt=1; $dt <= 31; $dt++) {
                                                        if($dt < 10) {
                                                            echo '<option value="0'.$dt.'">0'.$dt.'</option>';    
                                                        } else {
                                                            echo '<option value="'.$dt.'">'.$dt.'</option>';
                                                        }
                                                    }                                    
                                                ?>
                                            </select>
                                        </div>                                    
                                        <div class="col-sm-4">
                                            <select id="employerUpd-endMonth" name="employerUpd-endMonth" class="form-control">
                                                <option value="0"><?=lang('candidatesignup.addeducationpopupDtlbl2');?></option>
                                                <?php
                                                    $month_list = array('01' => 'Jan','02' => 'Feb','03' => 'Mar','04' => 'Apr','05' => 'May','06' => 'Jun','07' => 'Jul','08' => 'Aug','09' => 'Sep','10' => 'Oct','11' => 'Nov','12' => 'Dec');
                                                    foreach($month_list as $key => $mth) {
                                                        echo '<option value="'.$key.'">'.$mth.'</option>';
                                                    }                                     
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-sm-4">
                                            <select id="employerUpd-endYear" name="employerUpd-endYear" class="form-control">
                                                <option value="0"><?=lang('candidatesignup.addeducationpopupDtlbl3');?></option>
                                                <?php                                            
                                                    for($i = 1910; $i <= 2015; $i++) {
                                                        echo '<option value="'.$i.'">'.$i.'</option>';
                                                    }                                    
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div><br />
                                <input type="hidden" class="form-control" id="employerUpd-refCode" name="employerUpd-refCode" />
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" id="workExp-btn-update">Update</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Work Experience Update Modal Window -- End -->
            
            <!-- Education Level Modal Window -- Start -->
            <div class="modal fade" id="eduLvlModal" tabindex="-1" role="dialog" aria-labelledby="eduLvlModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="eduLvlModalLabel"><?=lang('candidatesignup.addeducationpopuplbl');?></h4>
                        </div>
                        <div class="modal-body">
                            <center><span id="eduLvl-modal-error-msg" style="color: red;"></span></center>
                            <form method="post" accept-charset="utf-8" enctype="multipart/form-data" role="form" id="example-form">
                                <div class="form-group">
                                    <label for="educLvl-School" class="control-label"><?=lang('candidatesignup.educationcolumn1');?>:</label>
                                    <input type="text" class="form-control" id="educLvl-School" name="educLvl-School" required/>
                                </div>
                                <div class="form-group">
                                    <label for="educLvl-Degree" class="control-label"><?=lang('candidatesignup.educationcolumn2');?>:</label>
                                    <select id="educLvl-Degree" name="educLvl-Degree" class="required form-control">
                                        <option value="0">None</option>
                                        <?php echo view_education_level(); ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="message-text" class="control-label"><?=lang('candidatesignup.educationcolumn3');?>:</label>
                                    <input type="text" class="form-control" id="educLvl-FieldofStudy" name="educLvl-FieldofStudy" required/>
                                </div>
                                <label for="message-text" class="control-label"><?=lang('candidatesignup.educationcolumn4');?>:</label>
                                <div class="form-group">                                    
                                    <div class="col-sm-4">
                                        <select id="educLvl-startDate" name="educLvl-startDate" class="form-control">
                                            <option value="0"><?=lang('candidatesignup.addeducationpopupDtlbl1');?></option>
                                            <?php
                                                for($dt=1; $dt <= 31; $dt++) {
                                                    if($dt < 10) {
                                                        echo '<option value="0'.$dt.'">0'.$dt.'</option>';    
                                                    } else {
                                                        echo '<option value="'.$dt.'">'.$dt.'</option>';
                                                    }
                                                }                                    
                                            ?>
                                        </select>
                                    </div>                                    
                                    <div class="col-sm-4">
                                        <select id="educLvl-startMonth" name="educLvl-startMonth" class="form-control">
                                            <option value="0"><?=lang('candidatesignup.addeducationpopupDtlbl2');?></option>
                                            <?php
                                                $month_list = array('01' => 'Jan','02' => 'Feb','03' => 'Mar','04' => 'Apr','05' => 'May','06' => 'Jun','07' => 'Jul','08' => 'Aug','09' => 'Sep','10' => 'Oct','11' => 'Nov','12' => 'Dec');
                                                foreach($month_list as $key => $mth) {
                                                    echo '<option value="'.$key.'">'.$mth.'</option>';
                                                }                                     
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-sm-4">
                                        <select id="educLvl-startYear" name="educLvl-startYear" class="form-control">
                                            <option value="0"><?=lang('candidatesignup.addeducationpopupDtlbl3');?></option>
                                            <?php                                            
                                                for($i = 1910; $i <= 2015; $i++) {
                                                    echo '<option value="'.$i.'">'.$i.'</option>';
                                                }                                    
                                            ?>
                                        </select>
                                    </div>
                                </div><br /><br />
                                <label for="message-text" class="control-label"><?=lang('candidatesignup.educationcolumn5');?>:</label>
                                <div class="form-group">                                    
                                    <div class="col-sm-4">
                                        <select id="educLvl-endDate" name="educLvl-endDate" class="form-control">
                                            <option value="0"><?=lang('candidatesignup.addeducationpopupDtlbl1');?></option>
                                            <?php
                                                for($dt=1; $dt <= 31; $dt++) {
                                                    if($dt < 10) {
                                                        echo '<option value="0'.$dt.'">0'.$dt.'</option>';    
                                                    } else {
                                                        echo '<option value="'.$dt.'">'.$dt.'</option>';
                                                    }
                                                }                                   
                                            ?>
                                        </select>                                        
                                    </div>                                    
                                    <div class="col-sm-4">
                                        <select id="educLvl-endMonth" name="educLvl-endMonth" class="form-control">
                                            <option value="0"><?=lang('candidatesignup.addeducationpopupDtlbl2');?></option>
                                            <?php
                                                $month_list = array('01' => 'Jan','02' => 'Feb','03' => 'Mar','04' => 'Apr','05' => 'May','06' => 'Jun','07' => 'Jul','08' => 'Aug','09' => 'Sep','10' => 'Oct','11' => 'Nov','12' => 'Dec');
                                                foreach($month_list as $key => $mth) {
                                                    echo '<option value="'.$key.'">'.$mth.'</option>';
                                                }                                     
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-sm-4">
                                        <select id="educLvl-endYear" name="educLvl-endYear" class="form-control">
                                            <option value="0"><?=lang('candidatesignup.addeducationpopupDtlbl3');?></option>
                                            <?php                                            
                                                for($i = 1910; $i <= 2015; $i++) {
                                                    echo '<option value="'.$i.'">'.$i.'</option>';
                                                }                                    
                                            ?>
                                        </select>
                                    </div>
                                </div><br /><br />
                                <input type="hidden" class="form-control" id="educLvl-refCode" name="educLvl-refCode" />
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" id="eduLvl-btn-add">Save</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Education Level Update Modal Window -- End -->
            
            <!-- Education Level Modal Window -- Start -->
            <div class="modal fade" id="eduLvlUpdModal" tabindex="-1" role="dialog" aria-labelledby="eduLvlUpdModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="eduLvlUpdModalLabel"><?=lang('candidatesignup.addeducationpopuplbl');?></h4>
                        </div>
                        <div class="modal-body">
                            <center><span id="educLvlUpd-modal-error-msg" style="color: red;"></span></center>
                            <form method="post" accept-charset="utf-8" enctype="multipart/form-data" role="form" id="example-form">
                                <div class="form-group">
                                    <label for="educLvlUpd-School" class="control-label"><?=lang('candidatesignup.educationcolumn1');?>:</label>
                                    <input type="text" class="form-control" id="educLvlUpd-School" name="educLvlUpd-School" required/>
                                </div>
                                <div class="form-group">
                                    <label for="educLvlUpd-Degree" class="control-label"><?=lang('candidatesignup.educationcolumn2');?>:</label>
                                    <select id="educLvlUpd-Degree" name="educLvlUpd-Degree" class="required form-control">
                                        <option value="0">None</option>
                                        <?php                                
                                            $Highdegree_list = array(
                                                "Doctorate" => "Doctorate", "Master" => "Master", "Degree" => "Degree",
                                                "Diploma" => "Diploma", "Professional Certification" => "Professional Certification",
                                                "Higher Nitec" => "Higher Nitec", "Nitec" => "Nitec", "A-Level" => "A-Level",
                                                "O-Level" => "O-Level", "N-Level" => "N-Level", "Primary" => "Primary", "N/A" => "N/A"
                                            );
                                            foreach($Highdegree_list as $k => $v) {
                                                echo '<option value="'.$k.'">'.$v.'</option>';
                                            }                                    
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="message-text" class="control-label"><?=lang('candidatesignup.educationcolumn3');?>:</label>
                                    <input type="text" class="form-control" id="educLvlUpd-FieldofStudy" name="educLvlUpd-FieldofStudy" required/>
                                </div>
                                <label for="message-text" class="control-label"><?=lang('candidatesignup.educationcolumn4');?>:</label>
                                <div class="form-group">                                    
                                    <div class="col-sm-4">
                                        <select id="educLvlUpd-startDate" name="educLvlUpd-startDate" class="form-control">
                                            <option value="0"><?=lang('candidatesignup.addeducationpopupDtlbl1');?></option>
                                            <?php
                                                for($dt=1; $dt <= 31; $dt++) {
                                                    if($dt < 10) {
                                                        echo '<option value="0'.$dt.'">0'.$dt.'</option>';    
                                                    } else {
                                                        echo '<option value="'.$dt.'">'.$dt.'</option>';
                                                    }
                                                }                                    
                                            ?>
                                        </select>
                                    </div>                                    
                                    <div class="col-sm-4">
                                        <select id="educLvlUpd-startMonth" name="educLvlUpd-startMonth" class="form-control">
                                            <option value="0"><?=lang('candidatesignup.addeducationpopupDtlbl2');?></option>
                                            <?php
                                                $month_list = array('01' => 'Jan','02' => 'Feb','03' => 'Mar','04' => 'Apr','05' => 'May','06' => 'Jun','07' => 'Jul','08' => 'Aug','09' => 'Sep','10' => 'Oct','11' => 'Nov','12' => 'Dec');
                                                foreach($month_list as $key => $mth) {
                                                    echo '<option value="'.$key.'">'.$mth.'</option>';
                                                }                                     
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-sm-4">
                                        <select id="educLvlUpd-startYear" name="educLvlUpd-startYear" class="form-control">
                                            <option value="0"><?=lang('candidatesignup.addeducationpopupDtlbl3');?></option>
                                            <?php                                            
                                                for($i = 1910; $i <= 2015; $i++) {
                                                    echo '<option value="'.$i.'">'.$i.'</option>';
                                                }                                    
                                            ?>
                                        </select>
                                    </div>
                                </div><br /><br />
                                <label for="message-text" class="control-label"><?=lang('candidatesignup.educationcolumn5');?>:</label>
                                <div class="form-group">                                    
                                    <div class="col-sm-4">
                                        <select id="educLvlUpd-endDate" name="educLvlUpd-endDate" class="form-control">
                                            <option value="0"><?=lang('candidatesignup.addeducationpopupDtlbl1');?></option>
                                            <?php
                                                for($dt=1; $dt <= 31; $dt++) {
                                                    if($dt < 10) {
                                                        echo '<option value="0'.$dt.'">0'.$dt.'</option>';    
                                                    } else {
                                                        echo '<option value="'.$dt.'">'.$dt.'</option>';
                                                    }
                                                }                                   
                                            ?>
                                        </select>                                        
                                    </div>                                    
                                    <div class="col-sm-4">
                                        <select id="educLvlUpd-endMonth" name="educLvlUpd-endMonth" class="form-control">
                                            <option value="0"><?=lang('candidatesignup.addeducationpopupDtlbl2');?></option>
                                            <?php
                                                $month_list = array('01' => 'Jan','02' => 'Feb','03' => 'Mar','04' => 'Apr','05' => 'May','06' => 'Jun','07' => 'Jul','08' => 'Aug','09' => 'Sep','10' => 'Oct','11' => 'Nov','12' => 'Dec');
                                                foreach($month_list as $key => $mth) {
                                                    echo '<option value="'.$key.'">'.$mth.'</option>';
                                                }                                     
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-sm-4">
                                        <select id="educLvlUpd-endYear" name="educLvlUpd-endYear" class="form-control">
                                            <option value="0"><?=lang('candidatesignup.addeducationpopupDtlbl3');?></option>
                                            <?php                                            
                                                for($i = 1910; $i <= 2015; $i++) {
                                                    echo '<option value="'.$i.'">'.$i.'</option>';
                                                }                                    
                                            ?>
                                        </select>
                                    </div>
                                </div><br /><br />
                                <input type="hidden" class="form-control" id="educLvlUpd-refCode" name="educLvlUpd-refCode" />
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" id="eduLvlUpd-btn-update">Update</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Education Level Update Modal Window -- End -->
            
        </div>
    </div>
</div>
<input type="hidden" value="<?php echo https_url($this->lang->lang().'/candidate_dashboard/add_skill');?>" id="inputCandAddSkillURL" />
<input type="hidden" value="<?php echo https_url($this->lang->lang().'/candidate_dashboard/remove_skill');?>" id="inputCandDelSkillURL" />
<input type="hidden" value="<?php echo https_url($this->lang->lang().'/candidate_dashboard/add_candidate_ref');?>" id="inputCandaddRefURL" />
<input type="hidden" value="<?php echo https_url($this->lang->lang().'/candidate_dashboard/fetch_candidate_ref');?>" id="inputCandfetchRefURL" />
<input type="hidden" value="<?php echo https_url($this->lang->lang().'/candidate_dashboard/edit_candidate_ref');?>" id="inputCandeditRefURL" />
<input type="hidden" value="<?php echo https_url($this->lang->lang().'/candidate_dashboard/delete_candidate_ref');?>" id="inputCanddelRefURL" />
<input type="hidden" value="<?php echo https_url($this->lang->lang().'/candidate_dashboard/add_academic_details');?>" id="inputCandAcaddetURL" />
<input type="hidden" value="<?php echo https_url($this->lang->lang().'/candidate_dashboard/fetch_academic_details');?>" id="inputCandfetchacaddetURL" />
<input type="hidden" value="<?php echo https_url($this->lang->lang().'/candidate_dashboard/edit_academic_details');?>" id="inputCandeditacaddetURL" />
<input type="hidden" value="<?php echo https_url($this->lang->lang().'/candidate_dashboard/delete_academic_details');?>" id="inputCanddelacaddetURL" />
<input type="hidden" value="<?php echo https_url($this->lang->lang().'/candidate_dashboard/add_Workexp');?>" id="inputCandaddWorkexURL" />
<input type="hidden" value="<?php echo https_url($this->lang->lang().'/candidate_dashboard/fetch_work_exp');?>" id="inputCandfetchWorkexURL" />
<input type="hidden" value="<?php echo https_url($this->lang->lang().'/candidate_dashboard/edit_work_exp');?>" id="inputCandeditWorkexURL" />
<input type="hidden" value="<?php echo https_url($this->lang->lang().'/candidate_dashboard/delete_Workexp');?>" id="inputCanddelWorkexURL" />
<script type="text/javascript">
 $(function(){$("button#skill-btn-save").click(function(e){var a=$("input[name^='skill-email']").val(),d=$("input[name^='skill-name']").val(),t=$("#skill-level option:selected").val(),n=$("#skill-rating option:selected").val();0==d.length&&$("input[name^='skill-name']").addClass("error"),$("input[name^='skill-name']").bind("keyup keydown change",function(){0==$(this).val().length?$(this).addClass("error"):$(this).removeClass("error")}),0==t&&$("#skill-level").addClass("error"),$("#skill-level").bind("change",function(){0==$(this).val()?$(this).addClass("error"):$(this).removeClass("error")}),0==n&&$("#skill-rating").addClass("error"),$("#skill-rating").bind("keyup keydown change",function(){0==$(this).val().length?$(this).addClass("error"):$(this).removeClass("error")});var r=$(".modal-body").find("input.error, select.error").length;return 0!=r?!1:($(this).html('<img src="/images/loading.gif" height="20" width="20" />'),$.ajax({type:"POST",url:$("#inputCandAddSkillURL").val(),data:{skillemail:a,skillname:d,skilllevel:t,skillrating:n},crossDomain:!0}).done(function(){$("#skillModal").modal("hide"),window.location.reload()}).fail(function(){alert("Something went wrong, Please try again!.")}),void e.preventDefault())}),$("#skillModal").on("hidden.bs.modal",function(){$(".modal-body").find("input, select").removeClass("error")}),$("button#skill-btn-delete").click(function(e){$(this).prop("disabled","true").html('<img src="/images/loading.gif" height="20" width="20" />');var a=$("input[name^='skill-email']").val(),d=$(this).val();$.ajax({type:"POST",url:$("#inputCandDelSkillURL").val(),data:{skillemail:a,skilldelvalue:d},crossDomain:!0}).done(function(e){"success"==e&&window.location.reload(!0)}).fail(function(){alert("Something went wrong, Please try again!.")}),e.preventDefault()}),$("button#cand-ref-btn-save").click(function(e){var a=$("input[name^='skill-email']").val(),d=$("input[name^='candref-name']").val(),t=$("input[name^='candref-company']").val(),n=$("input[name^='candref-email']").val(),r=$("#candref-NumberCode option:selected").val(),o=$("input[name^='candref-contactnumber']").val(),l=r+"-"+o;0==d.length&&$("input[name^='candref-name']").addClass("error"),$("input[name^='candref-name']").bind("keyup keydown change",function(){0==$(this).val().length?$(this).addClass("error"):$(this).removeClass("error")}),0==t.length&&$("input[name^='candref-company']").addClass("error"),$("input[name^='candref-company']").bind("keyup keydown change",function(){0==$(this).val().length?$(this).addClass("error"):$(this).removeClass("error")}),0==n.length&&$("input[name^='candref-email']").addClass("error"),$("input[name^='candref-email']").bind("keyup keydown change",function(){0==$(this).val().length?$(this).addClass("error"):$(this).removeClass("error")}),0==r&&$("#candref-NumberCode").addClass("error"),$("#candref-NumberCode").bind("change",function(){0==$(this).val()?$(this).addClass("error"):$(this).removeClass("error")}),0==o.length&&$("input[name^='candref-contactnumber']").addClass("error"),$("input[name^='candref-contactnumber']").bind("keyup keydown change",function(){0==$(this).val().length?$(this).addClass("error"):$(this).removeClass("error")});var i=$(".modal-body").find("input.error, select.error").length;return 0!=i?!1:($(this).html('<img src="/images/loading.gif" height="20" width="20" />'),$.ajax({type:"POST",url:$("#inputCandaddRefURL").val(),data:{"candRef-Name":d,"candRef-Company":t,"candRef-Email":n,"candRef-Contact":l,candidateemail:a},crossDomain:!0}).done(function(e){"success"==e&&($("#candRefModal").modal("hide"),window.location.reload(!0))}).fail(function(){alert("Something went wrong, Please try again!.")}),void e.preventDefault())}),$("#candRefModal").on("hidden.bs.modal",function(){$(".modal-body").find("input, select").removeClass("error")}),$("button#candRef-btn-fetch").click(function(e){$(this).prop("disabled","true").html('<img src="/images/loading.gif" height="20" width="20" />');var a=$(this).val();$.ajax({type:"POST",url:$("#inputCandfetchRefURL").val(),data:{candidatecodrefsId:a},dataType:"json",crossDomain:!0}).done(function(e){if(null!=e){var d=e.candidate_ref_contact.split("-");$("#candRefUpdModal").modal("show"),$("#candRefUpdModal").on("shown.bs.modal",function(t){var n=($(t.relatedTarget),$(this));n.find('.modal-body input[name="candrefUpd-name"]').val(e.candidate_ref_name),n.find('.modal-body input[name="candrefUpd-company"]').val(e.candidate_ref_company),n.find('.modal-body input[name="candrefUpd-email"]').val(e.candidate_ref_email),n.find(".modal-body #candrefUpd-NumberCode option").filter(function(){return this.text==d[0]}).prop("selected",!0),n.find('.modal-body input[name="candrefUpd-contactnumber"]').val(d[1]),n.find('.modal-body input[name="candrefUpd-refCode"]').val(a)}),$("#candRefUpdModal").on("hidden.bs.modal",function(){$("button#candRef-btn-fetch").removeAttr("disabled").html("Edit")})}}).fail(function(){alert("Something went wrong, Please try again!.")}),e.preventDefault()}),$("button#candref-btn-update").click(function(e){var a=$("input[name^='skill-email']").val(),d=$("input[name^='candrefUpd-name']").val(),t=$("input[name^='candrefUpd-company']").val(),n=$("input[name^='candrefUpd-email']").val(),r=$("#candrefUpd-NumberCode option:selected").text(),o=$("input[name^='candrefUpd-contactnumber']").val(),l=r+"-"+o,i=$("input[name^='candrefUpd-refCode']").val();0==d.length&&$("input[name^='candrefUpd-name']").addClass("error"),$("input[name^='candrefUpd-name']").bind("keyup keydown change",function(){0==$(this).val().length?$(this).addClass("error"):$(this).removeClass("error")}),0==t.length&&$("input[name^='candrefUpd-company']").addClass("error"),$("input[name^='candrefUpd-company']").bind("keyup keydown change",function(){0==$(this).val().length?$(this).addClass("error"):$(this).removeClass("error")}),0==n.length&&$("input[name^='candrefUpd-email']").addClass("error"),$("input[name^='candrefUpd-email']").bind("keyup keydown change",function(){0==$(this).val().length?$(this).addClass("error"):$(this).removeClass("error")}),0==r&&$("#candrefUpd-NumberCode").addClass("error"),$("#candrefUpd-NumberCode").bind("change",function(){0==$(this).val()?$(this).addClass("error"):$(this).removeClass("error")}),0==o.length&&$("input[name^='candrefUpd-contactnumber']").addClass("error"),$("input[name^='candrefUpd-contactnumber']").bind("keyup keydown change",function(){0==$(this).val().length?$(this).addClass("error"):$(this).removeClass("error")});var s=$(".modal-body").find("input.error, select.error").length;return 0!=s?!1:($(this).prop("disabled","true").html('<img src="/images/loading.gif" height="20" width="20" />'),$.ajax({type:"POST",url:$("#inputCandeditRefURL").val(),data:{"candRef-Name":d,"candRef-Company":t,"candRef-Email":n,"candRef-Contact":l,candidateemail:a,candidateRefCode:i},crossDomain:!0}).done(function(e){"success"==e&&($("#candRefUpdModal").modal("hide"),window.location.reload(!0))}).fail(function(){alert("Something went wrong, Please try again!.")}),void e.preventDefault())}),$("#candRefUpdModal").on("hidden.bs.modal",function(){$(".modal-body").find("input, select").removeClass("error")}),$("button#candRef-btn-delete").click(function(e){$(this).prop("disabled","true").html('<img src="/images/loading.gif" height="20" width="20" />');var a=$(this).val();$.ajax({type:"POST",url:$("#inputCanddelRefURL").val(),data:{candidate_coderefs_id:a},crossDomain:!0}).done(function(e){"success"==e&&window.location.reload(!0)}).fail(function(){alert("Something went wrong, Please try again!.")}),e.preventDefault()}),$("button#eduLvl-btn-add").click(function(){var e=$("input[name^='educLvl-School']").val(),a=$("#educLvl-Degree").find("option:selected").val(),d=$("input[name^='educLvl-FieldofStudy']").val(),t=$("#educLvl-startDate").find("option:selected").val(),n=$("#educLvl-startMonth").find("option:selected").val(),r=$("#educLvl-startYear").find("option:selected").val(),o=$("#educLvl-endDate").find("option:selected").val(),l=$("#educLvl-endMonth").find("option:selected").val(),i=$("#educLvl-endYear").find("option:selected").val(),s=r+"-"+n+"-"+t,c=i+"-"+l+"-"+o,p=$("input[name^='skill-email']").val();0==e.length&&$("input[name^='educLvl-School']").addClass("error"),$("input[name^='educLvl-School']").bind("keyup keydown change",function(){0==$(this).val().length?$(this).addClass("error"):$(this).removeClass("error")}),0==a&&$("#educLvl-Degree").addClass("error"),$("#educLvl-Degree").bind("change",function(){0==$(this).val()?$(this).addClass("error"):$(this).removeClass("error")}),0==d.length&&$("input[name^='educLvl-FieldofStudy']").addClass("error"),$("input[name^='educLvl-FieldofStudy']").bind("keyup keydown change",function(){0==$(this).val().length?$(this).addClass("error"):$(this).removeClass("error")}),0==t&&$("#educLvl-startDate").addClass("error"),$("#educLvl-startDate").bind("change",function(){0==$(this).val()?$(this).addClass("error"):$(this).removeClass("error")}),0==n&&$("#educLvl-startMonth").addClass("error"),$("#educLvl-startMonth").bind("change",function(){0==$(this).val()?$(this).addClass("error"):$(this).removeClass("error")}),0==r&&$("#educLvl-startYear").addClass("error"),$("#educLvl-startYear").bind("change",function(){0==$(this).val()?$(this).addClass("error"):$(this).removeClass("error")}),0==o&&$("#educLvl-endDate").addClass("error"),$("#educLvl-endDate").bind("change",function(){0==$(this).val()?$(this).addClass("error"):$(this).removeClass("error")}),0==l&&$("#educLvl-endMonth").addClass("error"),$("#educLvl-endMonth").bind("change",function(){0==$(this).val()?$(this).addClass("error"):$(this).removeClass("error")}),0==i&&$("#educLvl-endYear").addClass("error"),$("#educLvl-endYear").bind("change",function(){0==$(this).val()?$(this).addClass("error"):$(this).removeClass("error")}),$("#eduLvl-modal-error-msg").text(r>i&&0!=i?"Education End Year cannot be less than Start Year":"");var m=$(".modal-body").find("input.error, select.error").length,u=$("#eduLvl-modal-error-msg").text().length;return 0!=m||0!=u?!1:($(this).prop("disabled","true").html('<img src="/images/loading.gif" height="20" width="20" />'),void $.ajax({type:"POST",url:$("#inputCandAcaddetURL").val(),data:{CandUnivname:e,CandDegree:a,CandFieldofStdy:d,CandAcadStartDt:s,CandAcadEndDt:c,candidateemail:p},crossDomain:!0}).done(function(e){"success"==e&&($("#eduLvlModal").modal("hide"),window.location.reload(!0))}).fail(function(){alert("Something went wrong, Please try again!.")}))}),$("#eduLvlModal").on("hidden.bs.modal",function(){$(".modal-body").find("input, select").removeClass("error"),$("#eduLvl-modal-error-msg").text("")}),$("button#AcadEdu-btn-fetch").click(function(e){$(this).prop("disabled","true").html('<img src="/images/loading.gif" height="20" width="20" />');var a=$(this).val();$.ajax({type:"POST",url:$("#inputCandfetchacaddetURL").val(),data:{candidatecodrefsId:a},dataType:"json",crossDomain:!0}).done(function(e){null!=e&&($("#eduLvlUpdModal").modal("show"),$("#eduLvlUpdModal").on("shown.bs.modal",function(d){var t=($(d.relatedTarget),$(this));t.find('.modal-body input[name="educLvlUpd-School"]').val(e.candidate_univ_name),t.find(".modal-body #educLvlUpd-Degree option").filter(function(){return this.text==e.candidate_degree}).prop("selected",!0),t.find('.modal-body input[name="educLvlUpd-FieldofStudy"]').val(e.candidate_field_of_study);var n=e.candidate_edu_startDt.split("-");t.find(".modal-body #educLvlUpd-startDate option").filter(function(){return this.text==n[2]}).prop("selected",!0),t.find(".modal-body #educLvlUpd-startMonth option").filter(function(){return this.value==n[1]}).prop("selected",!0),t.find(".modal-body #educLvlUpd-startYear option").filter(function(){return this.text==n[0]}).prop("selected",!0);var r=e.candidate_edu_endDt.split("-");t.find(".modal-body #educLvlUpd-endDate option").filter(function(){return this.text==r[2]}).prop("selected",!0),t.find(".modal-body #educLvlUpd-endMonth option").filter(function(){return this.value==r[1]}).prop("selected",!0),t.find(".modal-body #educLvlUpd-endYear option").filter(function(){return this.text==r[0]}).prop("selected",!0),t.find('.modal-body input[name="educLvlUpd-refCode"]').val(a)}),$("#eduLvlUpdModal").on("hidden.bs.modal",function(){$("button#AcadEdu-btn-fetch").removeAttr("disabled").html("Edit")}))}).fail(function(){alert("Something went wrong, Please try again!.")}),e.preventDefault()}),$("button#eduLvlUpd-btn-update").click(function(e){var a=($("input[name^='skill-email']").val(),$("input[name^='educLvlUpd-School']").val()),d=$("#educLvlUpd-Degree").find("option:selected").val(),t=$("input[name^='educLvlUpd-FieldofStudy']").val(),n=$("#educLvlUpd-startDate").find("option:selected").val(),r=$("#educLvlUpd-startMonth").find("option:selected").val(),o=$("#educLvlUpd-startYear").find("option:selected").val(),l=$("#educLvlUpd-endDate").find("option:selected").val(),i=$("#educLvlUpd-endMonth").find("option:selected").val(),s=$("#educLvlUpd-endYear").find("option:selected").val(),c=o+"-"+r+"-"+n,p=s+"-"+i+"-"+l,m=$("input[name^='educLvlUpd-refCode']").val();0==a.length&&$("input[name^='educLvlUpd-School']").addClass("error"),$("input[name^='educLvlUpd-School']").bind("keyup keydown change",function(){0==$(this).val().length?$(this).addClass("error"):$(this).removeClass("error")}),0==d&&$("#educLvlUpd-Degree").addClass("error"),$("#educLvlUpd-Degree").bind("change",function(){0==$(this).val()?$(this).addClass("error"):$(this).removeClass("error")}),0==t.length&&$("input[name^='educLvlUpd-FieldofStudy']").addClass("error"),$("input[name^='educLvlUpd-FieldofStudy']").bind("keyup keydown change",function(){0==$(this).val().length?$(this).addClass("error"):$(this).removeClass("error")}),0==n&&$("#educLvlUpd-startDate").addClass("error"),$("#educLvlUpd-startDate").bind("change",function(){0==$(this).val()?$(this).addClass("error"):$(this).removeClass("error")}),0==r&&$("#educLvlUpd-startMonth").addClass("error"),$("#educLvlUpd-startMonth").bind("change",function(){0==$(this).val()?$(this).addClass("error"):$(this).removeClass("error")}),0==o&&$("#educLvlUpd-startYear").addClass("error"),$("#educLvlUpd-startYear").bind("change",function(){0==$(this).val()?$(this).addClass("error"):$(this).removeClass("error")}),0==l&&$("#educLvlUpd-endDate").addClass("error"),$("#educLvlUpd-endDate").bind("change",function(){0==$(this).val()?$(this).addClass("error"):$(this).removeClass("error")}),0==i&&$("#educLvlUpd-endMonth").addClass("error"),$("#educLvlUpd-endMonth").bind("change",function(){0==$(this).val()?$(this).addClass("error"):$(this).removeClass("error")}),0==s&&$("#educLvlUpd-endYear").addClass("error"),$("#educLvlUpd-endYear").bind("change",function(){0==$(this).val()?$(this).addClass("error"):$(this).removeClass("error")}),$("#educLvlUpd-modal-error-msg").text(o>s&&0!=s?"Education End Year cannot be less than Start Year":"");var u=$(".modal-body").find("input.error, select.error").length,h=$("#educLvlUpd-modal-error-msg").text().length;return 0!=u||0!=h?!1:($(this).prop("disabled","true").html('<img src="/images/loading.gif" height="20" width="20" />'),$.ajax({type:"POST",url:$("#inputCandeditacaddetURL").val(),data:{CandUnivname:a,CandDegree:d,CandFieldofStdy:t,CandAcadStartDt:c,CandAcadEndDt:p,candidateRefCode:m},crossDomain:!0}).done(function(e){"success"==e&&($("#eduLvlUpdModal").modal("hide"),window.location.reload(!0))}).fail(function(){alert("Something went wrong, Please try again!.")}),void e.preventDefault())}),$("#eduLvlUpdModal").on("hidden.bs.modal",function(){$(".modal-body").find("input, select").removeClass("error"),$("#educLvlUpd-modal-error-msg").text("")}),$("button#AcadEdu-btn-delete").click(function(e){$(this).prop("disabled","true").html('<img src="/images/loading.gif" height="20" width="20" />');var a=$(this).val();$.ajax({type:"POST",url:$("#inputCanddelacaddetURL").val(),data:{candidatecodrefsId:a},crossDomain:!0}).done(function(e){"success"==e&&window.location.reload(!0)}).fail(function(){alert("Something went wrong, Please try again!.")}),e.preventDefault()}),$("#employer-currJob").on("change",function(){0==$(this).is(":checked")?($("#employer-endDate").removeAttr("disabled"),$("#employer-endMonth").removeAttr("disabled"),$("#employer-endYear").removeAttr("disabled")):($("#employer-endDate").attr("disabled","disabled"),$("#employer-endMonth").attr("disabled","disabled"),$("#employer-endYear").attr("disabled","disabled"))}),$("button#workExp-btn-save").click(function(e){var a=$("input[name^='skill-email']").val(),d=$("input[name^='employer-name']").val();0==d.length&&$("input[name^='employer-name']").addClass("error"),$("input[name^='employer-name']").bind("keyup keydown change",function(){0==$(this).val().length?$(this).addClass("error"):$(this).removeClass("error")});var t=$("input[name^='employer-designation']").val();0==t.length&&$("input[name^='employer-designation']").addClass("error"),$("input[name^='employer-designation']").bind("keyup keydown change",function(){0==$(this).val().length?$(this).addClass("error"):$(this).removeClass("error")});var n=$("input[name^='employer-salary']").val();0==n.length&&$("input[name^='employer-salary']").addClass("error"),$("input[name^='employer-salary']").bind("keyup keydown change",function(){0==$(this).val().length?$(this).addClass("error"):$(this).removeClass("error")});var r=$("#employer-country").find("option:selected").val();0==r&&$("#employer-country").addClass("error"),$("#employer-country").bind("change",function(){0==$(this).val()?$(this).addClass("error"):$(this).removeClass("error")});var o=$("#employer-startDate").find("option:selected").val();0==o&&$("#employer-startDate").addClass("error"),$("#employer-startDate").bind("change",function(){0==$(this).val()?$(this).addClass("error"):$(this).removeClass("error")});var l=$("#employer-startMonth").find("option:selected").val();0==l&&$("#employer-startMonth").addClass("error"),$("#employer-startMonth").bind("change",function(){0==$(this).val()?$(this).addClass("error"):$(this).removeClass("error")});var i=$("#employer-startYear").find("option:selected").val();0==i&&$("#employer-startYear").addClass("error"),$("#employer-startYear").bind("change",function(){0==$(this).val()?$(this).addClass("error"):$(this).removeClass("error")});var s=$("#employer-currJob").prop("checked");if(1==s)var c=new Date,p=c.getDate(),m=c.getMonth()+1,u=c.getFullYear();else{var p=$("#employer-endDate").find("option:selected").val();0==p&&$("#employer-endDate").addClass("error"),$("#employer-endDate").bind("change",function(){0==$(this).val()?$(this).addClass("error"):$(this).removeClass("error")});var m=$("#employer-endMonth").find("option:selected").val();0==m&&$("#employer-endMonth").addClass("error"),$("#employer-endMonth").bind("change",function(){0==$(this).val()?$(this).addClass("error"):$(this).removeClass("error")});var u=$("#employer-endYear").find("option:selected").val();0==u&&$("#employer-endYear").addClass("error"),$("#employer-endYear").bind("change",function(){0==$(this).val()?$(this).addClass("error"):$(this).removeClass("error")})}var h=i+"-"+l+"-"+o,v=u+"-"+m+"-"+p;$("#workExp-modal-error-msg").text(i>u&&0!=u?"End Year cannot be less than Start Year":"");var f=$(".modal-body").find("input.error, select.error").length,y=$("#workExp-modal-error-msg").text().length;return 0!=f||0!=y?!1:($(this).prop("disabled","true").html('<img src="/images/loading.gif" height="20" width="20" />'),$.ajax({type:"POST",url:$("#inputCandaddWorkexURL").val(),data:{candidateemail:a,employername:d,employerdesig:t,employersal:n,employerctry:r,employerStartDt:h,employerEndDt:v,Candemp_currJob:s},crossDomain:!0}).done(function(e){"success"==e&&($("#workExpModal").modal("hide"),window.location.reload(!0))}).fail(function(){alert("Something went wrong, Please try again!.")}),void e.preventDefault())}),$("#workExpModal").on("hidden.bs.modal",function(){$(".modal-body").find("input, select").removeClass("error"),$("#workExp-modal-error-msg").text("")}),$("#employerUpd-currJob").on("change",function(){0==$(this).is(":checked")?($("#employerUpd-endDate").removeAttr("disabled"),$("#employerUpd-endMonth").removeAttr("disabled"),$("#employerUpd-endYear").removeAttr("disabled")):($("#employerUpd-endDate").attr("disabled","disabled"),$("#employerUpd-endMonth").attr("disabled","disabled"),$("#employerUpd-endYear").attr("disabled","disabled"))}),$("button#workExp-btn-fetch").click(function(e){$(this).prop("disabled","true").html('<img src="/images/loading.gif" height="20" width="20" />');var a=$(this).val();$.ajax({type:"POST",url:$("#inputCandfetchWorkexURL").val(),data:{candidatecodrefsId:a},dataType:"json",crossDomain:!0}).done(function(e){if(null!=e){var d=e.candidate_curr_job;$("#workExpUpdModal").modal("show"),$("#workExpUpdModal").on("shown.bs.modal",function(t){var n=($(t.relatedTarget),$(this));n.find('.modal-body input[name="employerUpd-name"]').val(e.candidate_emp_name),n.find('.modal-body input[name="employerUpd-designation"]').val(e.candidate_curr_designation),n.find(".modal-body #employerUpd-country option").filter(function(){return this.value==e.candidate_emp_location}).prop("selected",!0),n.find('.modal-body input[name="employerUpd-salary"]').val(e.candidate_salary);var r=e.candidate_emp_startDt.split("-");if(n.find(".modal-body #employerUpd-startDate option").filter(function(){return this.text==r[2]}).prop("selected",!0),n.find(".modal-body #employerUpd-startMonth option").filter(function(){return this.value==r[1]}).prop("selected",!0),n.find(".modal-body #employerUpd-startYear option").filter(function(){return this.text==r[0]}).prop("selected",!0),"true"==d){$("#employerUpd-currJob").prop("checked",!0);var o=e.candidate_emp_endDt.split("-");n.find(".modal-body #employerUpd-endDate").prop("disabled",!0),n.find(".modal-body #employerUpd-endDate option").filter(function(){return this.text==o[2]}).prop("selected",!0),n.find(".modal-body #employerUpd-endMonth").prop("disabled",!0),n.find(".modal-body #employerUpd-endMonth option").filter(function(){return this.value==o[1]}).prop("selected",!0),n.find(".modal-body #employerUpd-endYear").prop("disabled",!0),n.find(".modal-body #employerUpd-endYear option").filter(function(){return this.text==o[0]}).prop("selected",!0)}else{$("#employerUpd-currJob").prop("checked",!1);var o=e.candidate_emp_endDt.split("-");n.find(".modal-body #employerUpd-endDate").prop("disabled",!1),n.find(".modal-body #employerUpd-endDate option").filter(function(){return this.text==o[2]}).prop("selected",!0),n.find(".modal-body #employerUpd-endMonth").prop("disabled",!1),n.find(".modal-body #employerUpd-endMonth option").filter(function(){return this.value==o[1]}).prop("selected",!0),n.find(".modal-body #employerUpd-endYear").prop("disabled",!1),n.find(".modal-body #employerUpd-endYear option").filter(function(){return this.text==o[0]}).prop("selected",!0)}n.find('.modal-body input[name="employerUpd-refCode"]').val(a)}),$("#workExpUpdModal").on("hidden.bs.modal",function(){$("button#workExp-btn-fetch").removeAttr("disabled").html("Edit")})}}).fail(function(){alert("Something went wrong, Please try again!.")}),e.preventDefault()}),$("button#workExp-btn-update").click(function(e){var a=$("input[name^='skill-email']").val(),d=$("input[name^='employerUpd-name']").val(),t=$("input[name^='employerUpd-designation']").val(),n=$("input[name^='employerUpd-salary']").val(),r=$("#employerUpd-country").find("option:selected").val(),o=$("#employerUpd-startDate").find("option:selected").val(),l=$("#employerUpd-startMonth").find("option:selected").val(),i=$("#employerUpd-startYear").find("option:selected").val(),s=$("#employerUpd-endDate").find("option:selected").val(),c=$("#employerUpd-endMonth").find("option:selected").val(),p=$("#employerUpd-endYear").find("option:selected").val(),m=i+"-"+l+"-"+o,s=p+"-"+c+"-"+s,u=$("input[name^='employerUpd-refCode']").val();0==d.length&&$("input[name^='employerUpd-name']").addClass("error"),$("input[name^='employerUpd-name']").bind("keyup keydown change",function(){0==$(this).val().length?$(this).addClass("error"):$(this).removeClass("error")}),0==t.length&&$("input[name^='employerUpd-designation']").addClass("error"),$("input[name^='employerUpd-designation']").bind("keyup keydown change",function(){0==$(this).val().length?$(this).addClass("error"):$(this).removeClass("error")}),0==n.length&&$("input[name^='employerUpd-salary']").addClass("error"),$("input[name^='employerUpd-salary']").bind("keyup keydown change",function(){0==$(this).val().length?$(this).addClass("error"):$(this).removeClass("error")}),0==r&&$("#employerUpd-country").addClass("error"),$("#employerUpd-country").bind("change",function(){0==$(this).val()?$(this).addClass("error"):$(this).removeClass("error")}),0==o&&$("#employerUpd-startDate").addClass("error"),$("#employerUpd-startDate").bind("change",function(){0==$(this).val()?$(this).addClass("error"):$(this).removeClass("error")}),0==l&&$("#employerUpd-startMonth").addClass("error"),$("#employerUpd-startMonth").bind("change",function(){0==$(this).val()?$(this).addClass("error"):$(this).removeClass("error")}),0==i&&$("#employerUpd-startYear").addClass("error"),$("#employerUpd-startYear").bind("change",function(){0==$(this).val()?$(this).addClass("error"):$(this).removeClass("error")}),0==s&&$("#employerUpd-endDate").addClass("error"),$("#employerUpd-endDate").bind("change",function(){0==$(this).val()?$(this).addClass("error"):$(this).removeClass("error")}),0==c&&$("#employerUpd-endMonth").addClass("error"),$("#employerUpd-endMonth").bind("change",function(){0==$(this).val()?$(this).addClass("error"):$(this).removeClass("error")}),0==p&&$("#employerUpd-endYear").addClass("error"),$("#employerUpd-endYear").bind("change",function(){0==$(this).val()?$(this).addClass("error"):$(this).removeClass("error")}),$("#workExpUpd-modal-error-msg").text(i>p&&0!=p?"End Year cannot be less than Start Year":"");var h=$(".modal-body").find("input.error, select.error").length,v=$("#workExpUpd-modal-error-msg").text().length;return 0!=h||0!=v?!1:($(this).prop("disabled","true").html('<img src="/images/loading.gif" height="20" width="20" />'),$.ajax({type:"POST",url:$("#inputCandeditWorkexURL").val(),data:{candidateemail:a,employername:d,employerdesig:t,employersal:n,employerctry:r,employerStartDt:m,employerEndDt:s,candidateRefCode:u,Candemp_currJob:$("#employerUpd-currJob").is(":checked")},crossDomain:!0}).done(function(e){"success"==e&&($("#workExpUpdModal").modal("hide"),window.location.reload(!0))}).fail(function(){alert("Something went wrong, Please try again!.")}),void e.preventDefault())}),$("#workExpUpdModal").on("hidden.bs.modal",function(){$(".modal-body").find("input, select").removeClass("error"),$("#workExpUpd-modal-error-msg").text("")}),$("button#workExp-btn-delete").click(function(e){$(this).prop("disabled","true").html('<img src="/images/loading.gif" height="20" width="20" />');var a=$("#skill-email").val(),d=$(this).val();$.ajax({type:"POST",url:$("#inputCanddelWorkexURL").val(),data:{candidateemail:a,candidatecodrefsId:d},crossDomain:!0}).done(function(e){"success"==e&&window.location.reload(!0)}).fail(function(){alert("Something went wrong, Please try again!.")}),e.preventDefault()});var e=3.6;$("div[id$='circle']").each(function(){for(var a=$(this).attr("class").split(/\s+/),d=0;d<a.length;d++)if(a[d].match("^p")){var t=a[d].substring(1,a[d].length),n=e*t;$(".c100.p"+t+" .bar").css({"-webkit-transform":"rotate("+n+"deg)","-moz-transform":"rotate("+n+"deg)","-ms-transform":"rotate("+n+"deg)","-o-transform":"rotate("+n+"deg)",transform:"rotate("+n+"deg)"})}}),$("#jquery_jplayer_1").jPlayer({ready:function(){$(this).jPlayer("setMedia",{m4v:$("#inputVideoResume").val()})},swfPath:"../../dist/jplayer",supplied:"webmv, ogv, m4v",size:{width:"100%",height:"280px",cssCalss:"col-xs-12 col-sm-12 col-lg-12 col-md-12"},useStateClassSkin:!1,autoBlur:!1,smoothPlayBar:!1,keyEnabled:!1,remainingDuration:!1,toggleDuration:!1})});
</script>