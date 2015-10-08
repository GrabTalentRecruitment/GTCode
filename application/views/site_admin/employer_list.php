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
                <h2 class="sub-header"><img src="/images/icons/employers.png" alt="Employers / Client List" height="50px"/> Employers / Client List</h2>
                <div class="panel panel-default">
                    <table class="table table-bordered table-hover">
                        <thead class="tablehead_bgColor">
                            <tr>
                                <th>Logo</th>
                                <th>Employer Name</th>
                                <th>Employer Web-site</th>
                                <th>Employer Phone</th>
                                <th>Employer Fax</th>
                                <th>Employer Country</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($employers as $employ) { ?>
                                <tr>
                                    <td style="vertical-align: middle; text-align:center;"><img src="/images/icons/employers.png" height="50px" /></td>
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
                            <h3>This employer does not exist (or) you typed the wrong URL.</h3>
                        </div>
                    <?php } ?>                
                </div>
            </div>
        </div>
    </div>
</div>