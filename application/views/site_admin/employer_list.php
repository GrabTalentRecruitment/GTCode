<?php $employers = $this->login_database->read_all_employers(); ?>
<div class="site-content" >

	<div class="container page-header">
		<div class="row">
			<div class="col-md-6 no-padding">
				<h1 class="page-title font-1"><?=lang('siteadminusers.employerListheading');?></h1>
			</div>
			<div class="col-md-6 no-padding"></div>
		</div>
	</div>
    
    <div class="page-content container">
        <div class="row">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th><?=lang('siteadminusers.employertblhdng1');?></th>
                        <th><?=lang('siteadminusers.employertblhdng2');?></th>
                        <th><?=lang('siteadminusers.employertblhdng3');?></th>
                        <th><?=lang('siteadminusers.employertblhdng4');?></th>
                        <th><?=lang('siteadminusers.employertblhdng5');?></th>
                        <th><?=lang('siteadminusers.employertblhdng6');?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(count($employers) > 0 ) { ?>
                    
                        <?php foreach($employers as $employ) { ?>
                        
                            <tr>
                                <td style="vertical-align: middle; text-align:center; width:20px;">
                                <!-- Profile Picture Row - Start -->
                                <?php if( empty($employ['employer_logo_url']) ) { ?>
                                    <img alt="Avatar" src="/images/icons/employers.png" width="50px" />
                                <?php } else { ?>
                                    <img alt="Avatar" src="<?php echo '/images/recruiter/logo/'.$employ['employer_logo_url'];?>" width="50px" />
                                <?php } ?>
                                <!-- Profile Picture Row - End -->
                                </td>
                                <td style="vertical-align: middle;">
                                    <a href="<?php echo https_url($this->lang->lang().'/site_admin/employers/'.$employ['employer_code']); ?>">
                                    <?php
                                        echo $employ['employer_name'];
                                    ?>
                                    </a>
                                </td>
                                <td style="vertical-align: middle;">
                                    <a href="<?php echo $employ['employer_web_address']; ?>" target="_blank">
                                    <?php
                                        echo $employ['employer_web_address'];
                                    ?>
                                    </a>
                                </td>
                                <td style="vertical-align: middle;">
                                    <?php
                                        echo $employ['employer_phone'];
                                    ?>
                                </td>
                                <td style="vertical-align: middle;">
                                    <?php
                                        echo $employ['employer_fax'];
                                    ?>
                                </td>
                                <td style="vertical-align: middle;">
                                    <?php
                                        echo $employ['employer_country'];
                                    ?>
                                </td>
                            </tr>
                            
                        <?php } ?>
                        
                    <?php } else { ?>
                        <tr>
                            <td>
                                <h3><?=lang('siteadminusers.employerListerrorlbl');?></h3>
                            </td>         
                        </tr>
                    <?php } ?> 
                </tbody>
            </table>
            
        </div>
        
    </div>
    
</div>