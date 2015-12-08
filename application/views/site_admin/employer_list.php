<?php $employers = $this->login_database->read_all_employers();?>
<style type="text/css">.tablehead_bgColor { background-color: orange; }</style>
<div class="visible-xs vert-offset-top-5"></div>
<div class="visible-sm vert-offset-top-8"></div>
<div class="visible-lg visible-md hidden-xs vert-offset-top-5"></div>
<div class="site-wrapper">
    <div class="site-wrapper-inner">
        <div class="container-fluid">
            <?php if($employers) {
                foreach($employers as $employ) {
            ?>
                <!-- To display in mobile mode - Start -->
                <div class="col-xs-12 col-sm-6 visible-xs-block visible-sm-block hidden-md hidden-lg">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-4 text-left">
                                    <img src="/images/profile-pic.jpg" height="90px" />
                                </div>
                                <div class="col-xs-8 text-right">
                                    <div class="medium"><?php echo $employ['employer_name']; ?></div>
                                    <div>
                                        <?php 
                                            echo $employ['employer_country']."<br/>"; 
                                            echo $employ['employer_web_address']."<br/>";
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="<?php echo https_url($this->lang->lang().'/site_admin/employers/'.$employ['employer_code']); ?>">
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
                <h2 class="sub-header"><img src="/images/icons/employers.png" alt="Employers / Client List" height="50px"/><?=lang('siteadminusers.employerListheading');?></h2>
                <div class="panel panel-default">
                    <table class="table table-bordered table-hover">
                        <thead class="tablehead_bgColor">
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
                            <?php foreach($employers as $employ) { ?>
                                <tr>
                                    <td style="vertical-align: middle; text-align:center; width:20px;">
                                    <!-- Profile Picture Row - Start -->
                                    <?php if( empty($employ['employer_logo_url']) ) { ?>
                                        <img alt="Avatar" src="/images/icons/employers.png" height="50px" />
                                    <?php } else { ?>
                                        <img alt="Avatar" src="<?php echo '/images/recruiter/logo/'.$employ['employer_logo_url'];?>" height="50px" />
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
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- To display in Large Desktop mode - End -->            
            <div class="row">
                <div class="col-md-12 col-md-offset-0">
                    <?php } else { ?>
                        <div class="col-xs-12">
                            <h3><?=lang('siteadminusers.employerListerrorlbl');?></h3>
                        </div>
                    <?php } ?>                
                </div>
            </div>
        </div>
    </div>
</div>