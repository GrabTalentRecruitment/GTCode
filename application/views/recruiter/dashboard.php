<?php $jobs = $this->login_database->job_dashboard( $this->session->userdata('logged_in') ); ?>
<div class="vert-offset-top-5 visible-lg visible-md"></div>
<div class="vert-offset-top-8 visible-sm"></div>
<div class="vert-offset-top-4 visible-xs"></div>
<div class="site-wrapper">
    <div class="site-wrapper-inner">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 col-sm-offset-0 col-md-12 col-md-offset-0 main">                    
                    <h2 class="sub-header"><?php echo lang('recruiterlogin.Welcometxt'); ?></h2>
                    <?php if($jobs){ ?>
                    <?php foreach($jobs as $job) { ?>
                        <!-- To show only on mobile - start -->
                        <div class="visible-xs-block">                                                                
                            <div class="list-group">                                
                                <a href="<?php echo https_url($this->lang->lang().'/recruiter/job/'.$job['job_number']); ?>" class="list-group-item">
                                    <h4 class="list-group-item-heading"><?php echo htmlspecialchars($job['job_title'])?></h4>
                                    <span class="badge"><?php $total_count = $this->login_database->get_candidate_cnt($job['job_number']); echo "<font size=3px>".$total_count[0]['cnt']."</font>"; ?></span>
                                    <p class="list-group-item-text"><?php echo htmlspecialchars($job['job_primaryworklocation_city'].', '.$job['job_primaryworklocation_country'])?></td></p>
                                    <p class="list-group-item-text"><?php echo $job['job_minsalary_currency']." ".$job['job_minmonth_salary']." - ".$job['job_maxsalary_currency']." ".$job['job_maxmonth_salary']; ?></p>
                                    <p class="list-group-item-text"><?php echo $job['job_industry'] ?></p>                                    
                                </a>                                
                            </div>                                    
                        </div>
                        <!-- To show only on mobile - end -->
                        
                        <!-- To show only on Tablet - start -->
                        <div class="visible-sm-block">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <a href="<?php echo https_url($this->lang->lang().'/recruiter/job/'.$job['job_number']); ?>"><strong style="color: white;"><?=lang('recruiterlogin.hometablecol1');?>: <?php echo $job['job_number']?></strong></a>
                                </div>
                                <div class="panel-body">
                                    <p><strong><?=lang('recruiterlogin.hometablecol2');?></strong>: <?php if( strlen(htmlspecialchars($job['job_title'])) > 20 ) { echo substr_replace(htmlspecialchars($job['job_title']), '...', 40);} else { echo htmlspecialchars($job['job_title']); }?></p>
                                    <p><strong><?=lang('recruiterlogin.hometablecol3');?></strong>: <?php echo $job['job_minsalary_currency']." ".$job['job_minmonth_salary']." - ".$job['job_maxsalary_currency']." ".$job['job_maxmonth_salary']; ?></p>
                                    <p><strong><?=lang('recruiterlogin.hometablecol4');?></strong>: <?php echo htmlspecialchars($job['job_primaryworklocation_city'].', '.$job['job_primaryworklocation_country'])?></p>
                                    <p><strong><?=lang('recruiterlogin.hometablecol5');?></strong>: <?php echo $job['job_industry'] ?></p>
                                    <p><strong><?=lang('recruiterlogin.hometablecol6');?></strong>: <?php $total_count = $this->login_database->get_candidate_cnt($job['job_number']); echo "<font size=3px>".$total_count[0]['cnt']."</font>"; ?></p>
                                </div>
                                <?php if($job['job_posted'] == 'off'){ ?>
                                    <div class="panel-footer text-right">
                                        <a class="btn btn-danger btn-sm" href="<?php echo https_url($this->lang->lang().'/recruiter/job_edit/'.$job['job_number']); ?>">Edit &amp; Publish</a>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                        <!-- To show only on Tablet - end -->
                        <?php } // end of for loop ?>
                        <!-- For larger Desktops -- start -->
                        <div class="table-responsive visible-md-block visible-lg-block">
                            <div class="panel panel-default">
                                <table class="table table-striped">
                                    <thead class="tablehead_bgColor">
                                        <tr>
                                            <th><?=lang('recruiterlogin.hometablecol1');?></th>
                                            <th><?=lang('recruiterlogin.hometablecol2');?></th>
                                            <th><?=lang('recruiterlogin.hometablecol3');?></th>
                                            <th><?=lang('recruiterlogin.hometablecol4');?></th>
                                            <th><?=lang('recruiterlogin.hometablecol5');?></th>
                                            <th><?=lang('recruiterlogin.hometablecol6');?></th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($jobs as $job) { ?>
                                            <tr>
                                                <td><?php echo $job['job_number']?></td>
                                                <td class="job-title"><a href="<?php echo https_url($this->lang->lang().'/recruiter/job/'.$job['job_number']); ?>"><?php if( strlen(htmlspecialchars($job['job_title'])) > 20 ) { echo substr_replace(htmlspecialchars($job['job_title']), '...', 40);} else { echo htmlspecialchars($job['job_title']); }?></a></td>
                                                <td><?php echo $job['job_minsalary_currency']." ".$job['job_minmonth_salary']." - ".$job['job_maxsalary_currency']." ".$job['job_maxmonth_salary']; ?></td>
                                                <td><?php echo htmlspecialchars($job['job_primaryworklocation_city'].', '.$job['job_primaryworklocation_country'])?></td>
                                                <td><?php echo $job['job_industry'] ?></td>
                                                <td style="text-align: center;"><?php $total_count = $this->login_database->get_candidate_cnt($job['job_number']); echo "<font size=3px>".$total_count[0]['cnt']."</font>"; ?></td>
                                                <td>
                                                <?php if($job['job_posted'] == 'off'){ ?>
                                                    <a class="btn btn-danger btn-xs" href="<?php echo https_url($this->lang->lang().'/recruiter/job_edit/'.$job['job_number']); ?>">Edit &amp; Publish</a>
                                                <?php } ?>                                                
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- For larger Desktops -- end ->                        
                    <?php }  else { ?>
                        <tr>
                            <td colspan="6"><center><?=lang('recruiterlogin.homenojobslbl');?></center></td>
                        </tr>
                    <?php } ?>
                </div>
            </div>            
        </div> <!-- /container -->
    </div>
</div>