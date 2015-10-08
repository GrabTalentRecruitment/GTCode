<div class="visible-xs vert-offset-top-5"></div>
<div class="visible-sm vert-offset-top-8"></div>
<div class="visible-lg visible-md hidden-xs vert-offset-top-5"></div>
<div class="site-wrapper">
    <?php
        $candRefId = explode("-",$this->uri->segment(4));
        $condition = "candidate_ref_id ='".$candRefId[0]."'";
        $this->db->select('*');
        $this->db->from('candidate_signup');
        $this->db->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $sess_data = $query->result_array();
        } else {
            return false;
        }  
    ?>
    <div class="site-wrapper-inner">
        <div class="container">
            <ol class="breadcrumb visible-lg-block">
                <li><a href="<?php echo https_url($this->lang->lang().'/recruiter_dashboard'); ?>">Dashboard</a></li>                       
            </ol>
            <?php  
            $video_url = '';
            ?>            
            <!-- Personal Information section -->
            <!-- First Row - Start -->
            <div class="row">
                <div class="col-md-6">
                    <?php foreach($sess_data as $usrdt){ ?>
                        <input type="hidden" value="<?php echo $usrdt['candidate_email'];?>" name="skill-email" id="skill-email"/><br />
                        <div class="row">
                            <div class="col-md-4"><b><?=lang('candidatesignup.name')?>:</b></div>
                            <div class="col-md-6"><?php echo $usrdt['candidate_firstname']." ".$usrdt['candidate_lastname'];?></div>
                        </div><br />
                        <div class="row">
                            <div class="col-md-4"><b><?=lang('candidatesignup.phonenumber')?>:</b></div>
                            <div class="col-md-6"><?php echo $usrdt['candidate_phonecountrycode']. " - ". $usrdt['candidate_phonenumber'];?></div>
                        </div><br />
                        <div class="row">
                            <div class="col-md-4"><b><?=lang('candidatesignup.email')?>:</b></div>
                            <div class="col-md-6"><?php echo $usrdt['candidate_email'];?></div>
                        </div><br />
                        <div class="row">
                            <div class="col-md-4"><b>Nationality:</b></div>
                            <div class="col-md-6"><?php echo $usrdt['candidate_nationality'];?></div>
                        </div><br />
                        <div class="row">
                            <div class="col-md-4"><b>Total Years of Experience:</b></div>
                            <div class="col-md-6"><?php echo $usrdt['candidate_total_experience'];?></div>
                        </div><br />
                        <div class="row">
                            <div class="col-md-4"><b>Expected Salary:</b></div>
                            <div class="col-md-6"><?php echo $usrdt['candidate_exp_annualsalcode']." ".$usrdt['candidate_exp_annualsalary'];?></div>
                        </div><br />
                        <div class="row">
                            <div class="col-md-4"><b><?=lang('candidatesignup.briefdescription')?>:</b></div>                            
                        </div><br />
                        <div class="row">
                            <div class="col-md-12"><p style="word-wrap: normal;"><?php echo $usrdt['brief_description'];?></p></div>
                        </div>
                        <?php $video_url = $usrdt['video_resume_url']; $candRefCode = $usrdt['candidate_ref_id']; $candEmail = $usrdt['candidate_email']; ?>
                    <?php } ?>
                </div>
                <div class="col-md-6">
                    <?php if( $video_url != "" || !empty($video_url) ) { ?>
                        <video width="520" height="350" controls class="col-xs-12 col-sm-12 col-md-12">
                            <source src="" type="video/mp4" />
                            Your browser does not support the video tag.
                        </video>        
                    <?php } else { ?>
                        <img src="/images/no-video-pic.jpg" style="border: 1px solid black;" class="col-xs-12 col-sm-12 col-md-12" />
                    <?php } ?>
                </div>
            </div>
            <!-- First Row - End -->
            
            <!-- Second Row - End -->
            <div class="row">
                <!-- Skills Section - Start -->
                <div class="col-xs-12 col-sm-12 col-md-6">
                    <h4><?=lang('candidatedash.skills')?>:</h4>
                    <?php
                        $query = $this->db->select('candidate_skills')->where('candidate_email', $candEmail )->get('candidate_signup');
                        foreach ($query->result_array() as $row) {
                            if( $row['candidate_skills'] != null || $row['candidate_skills'] != "") {
                                $skills = explode(";", $row['candidate_skills']);                                        
                                foreach($skills as $val) {                                            
                                    $sklval = explode(",", $val);
                    ?>
                        <div class="panel panel-warning visible-xs-block">
                            <div class="panel-heading">
                            <?php
                                echo "<div class='row'>";
                                echo "<div class='col-xs-8'>" . $sklval[0] . " (" . $sklval[1] . ")</div>";
                                echo "<div class='col-xs-4'></div>";                                
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
                    <table class="table table-bordered table-responsive hidden-xs">
                        <thead>
                            <tr class="danger">
                                <th><?=lang('candidatedash.skilltblheading1');?></th>
                                <th><?=lang('candidatedash.skilltblheading2');?></th>
                                <th><?=lang('candidatedash.skilltblheading3');?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $query = $this->db->select('candidate_skills')->where('candidate_email', $candEmail )->get('candidate_signup');
                                foreach ($query->result_array() as $row) {
                                    if( $row['candidate_skills'] != null || $row['candidate_skills'] != "") {
                                        $skills = explode(";", $row['candidate_skills']);                                        
                                        foreach($skills as $val) {                                            
                                            $sklval = explode(",", $val);
                                            echo "<tr>";
                                            echo "<td>".$sklval[0]."</td>";
                                            echo "<td>".$sklval[1]."</td>";
                                            echo "<td>".$sklval[2]."</td>";
                                            echo "</tr>";    
                                        }    
                                    }
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
                <!-- Skills Section - End -->
                
                <!-- Candidate References section - Start -->
                <div class="col-xs-12 col-sm-12 col-md-6">
                    <h4><?=lang('candidatedash.candidatereference');?>:</h4>
                    <?php
                        $query = $this->db->select('*')->where_in('candidate_ref_id', $candRefCode )->get('candidate_references');
                        foreach ($query->result_array() as $row) {
                    ?>
                    <div class="panel panel-danger visible-xs-block">
                        <div class="panel-heading">
                        <?php
                            echo "<div class='row'>";
                            echo "<div class='col-xs-6'>" . $row["candidate_ref_name"] . ")</div>";
                            echo "<div class='col-xs-6'></div>";                                
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
                    <table class="table table-bordered table-responsive hidden-xs">
                        <thead>
                            <tr class="danger">
                                <th><?=lang('candidatedash.candidaterefheading1');?></th>
                                <th><?=lang('candidatedash.candidaterefheading2');?></th>
                                <th><?=lang('candidatedash.candidaterefheading3');?></th>
                                <th><?=lang('candidatedash.candidaterefheading4');?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $query = $this->db->select('*')->where_in('candidate_ref_id', $candRefCode )->get('candidate_references');
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
            <!-- Candidate References section - End -->
            <!-- Second Row - End -->
            
            <!-- Third Row - Start -->
            <!-- Candidate Academic Details section - Start -->
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <h4><?=lang('candidatedash.academicdetails')?>:</h4>                                    
                    <?php
                        $query = $this->db->select('*')->where_in('candidate_email', $candEmail )->get('candidate_education');
                        foreach ($query->result_array() as $row) {
                    ?>
                    <div class="panel panel-danger visible-xs-block">
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
                    <table class="table table-bordered table-responsive hidden-xs">
                        <thead>
                            <tr class="danger">
                                <th><?=lang('candidatesignup.educationcolumn1')?></th>
                                <th><?=lang('candidatesignup.educationcolumn2')?></th>
                                <th><?=lang('candidatesignup.educationcolumn3')?></th>
                                <th><?=lang('candidatesignup.educationcolumn4')?></th>
                                <th><?=lang('candidatesignup.educationcolumn5')?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $query = $this->db->select('*')->where_in('candidate_email', $candEmail )->get('candidate_education');
                                foreach ($query->result_array() as $row) {
                                    echo "<tr>";
                                    echo "<td>".$row["candidate_univ_name"]."</td>";
                                    echo "<td>".$row["candidate_degree"]."</td>";
                                    echo "<td>".$row["candidate_field_of_study"]."</td>";
                                    echo "<td>".date("d-M-Y",strtotime($row["candidate_edu_startDt"]))."</td>";
                                    echo "<td>".date("d-M-Y",strtotime($row["candidate_edu_endDt"]))."</td>";
                                    echo "</tr>";
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- Candidate Academic Details section - Start -->
            <!-- Third Row - End -->
            
            <!-- Fourth Row - Start -->
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <h4><?=lang('candidatedash.workexp')?>:</h4>
                    <?php
                        $query = $this->db->select('*')->where_in('candidate_email', $candEmail )->get('candidate_employment');
                        foreach ($query->result_array() as $row) {
                    ?>
                    <div class="panel panel-danger visible-xs-block">
                        <div class="panel-heading"><?php 
                            echo "<div class='row'>";
                            echo "<div class='col-xs-6'>".$row["candidate_emp_name"]."</div>";
                            echo "<div class='col-xs-6 pull-right'></div>";
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
                    <table class="table table-bordered table-responsive hidden-xs">
                        <thead>
                            <tr class="danger">
                                <th><?=lang('candidatedash.workexptblheading1');?></th>
                                <th><?=lang('candidatedash.workexptblheading2');?></th>
                                <th><?=lang('candidatedash.workexptblheading3');?></th>
                                <th><?=lang('candidatedash.workexptblheading4');?></th>
                                <th><?=lang('candidatedash.workexptblheading5');?></th>
                                <th><?=lang('candidatedash.workexptblheading6');?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $query = $this->db->select('*')->where_in('candidate_email', $candEmail )->get('candidate_employment');
                                foreach ($query->result_array() as $row) {
                                    echo "<tr>";
                                    echo "<td>".$row["candidate_emp_name"]."</td>";
                                    echo "<td>".$row["candidate_curr_designation"]."</td>";
                                    echo "<td>".$row["candidate_salary"]."</td>";
                                    echo "<td>".$row["candidate_emp_location"]."</td>";
                                    echo "<td>".date("d-M-Y",strtotime($row["candidate_emp_startDt"]))."</td>";
                                    echo "<td>".date("d-M-Y",strtotime($row["candidate_emp_endDt"]))."</td>";
                                    echo "</tr>";
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- Fourth Row - End -->
        </div>
    </div>
</div>