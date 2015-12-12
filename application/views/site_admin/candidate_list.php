<?php $candidates = $this->login_database->read_all_candidates(); ?>
<div class="site-content" >

	<div class="container page-header">
		<div class="row">
			<div class="col-md-6 no-padding">
				<h1 class="page-title font-1"><?=lang('siteadminusers.candidateListheading');?></h1>
			</div>
			<div class="col-md-6 no-padding"></div>
		</div>
	</div>
    
    <div class="page-content container">
        <div class="row">
            <table class="table table-bordered table-hover">
                <thead class="tablehead_bgColor">
                    <tr>
                        <th><?=lang('siteadminusers.candidateListtblehdng1');?></th>
                        <th><?=lang('siteadminusers.candidateListtblehdng2');?></th>
                        <th><?=lang('siteadminusers.candidateListtblehdng3');?></th>
                        <th><?=lang('siteadminusers.candidateListtblehdng4');?></th>
                        <th><?=lang('siteadminusers.candidateListtblehdng5');?></th>
                        <th><?=lang('siteadminusers.candidateListtblehdng6');?></th>
                        <th><?=lang('siteadminusers.candidateListtblehdng7');?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(count($candidates) > 0) { ?>
                    
                        <?php foreach($candidates as $candids) { ?>
                            <tr>
                                <td style="vertical-align: middle; text-align:center;">
                                    <?php
                                        if( ! empty($candids['candidate_profilepicurl']) ) {
                                    ?>                                    
                                    <img src="<?php echo '/images/candidate/photo/'.$candids['candidate_profilepicurl']; ?>" width="50px" class="img-circle" />
                                    <?php } else { ?>
                                    <img src="/images/icons/candidate.png" width="50px" class="img-circle" />
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
                    
                    <?php } else { ?>
                        <tr>
                            <td><h3><?=lang('siteadminusers.candidateListerrorlbl');?></h3></td>  
                        </tr>
                    <?php } ?>  

                </tbody>
            </table>
        </div>
    </div>
    
</div>
