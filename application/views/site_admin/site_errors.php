<div class="visible-xs vert-offset-top-5"></div>
<div class="visible-sm vert-offset-top-8"></div>
<div class="visible-lg visible-md hidden-xs vert-offset-top-5"></div>
<div class="site-wrapper">
    <div class="site-wrapper-inner">
        <div class="container-fluid">
            <h2><img src="/images/icons/settings.png" alt="Settings icon"/><?=lang('siteadminusers.siteerrorhdng');?></h2>
            <!-- To display in mobile & tablet mode - Start -->
            <div class="row">
                <div class="col-xs-12 col-xs-offset-0 visible-xs-block visible-sm-block">
                    <div class="col-xs-12" style="text-align: center;">
                        <img src="/images/error_404/404.png" alt="Error Page" height="100px" />
                        <h3>We're Sorry.</h3>
                        <h5>Please use laptop to change the menu items. Thank you!!</h5>
                    </div>
                </div>
            </div>
            <!-- To display in mobile mode - End -->
            <!-- To display in Large Desktop mode - Start -->
            <div class="visible-md-block visible-lg-block col-lg-12 col-md-12">
            <h5><?=lang('siteadminusers.siteerrortxt');?></h5>
            <?php 
                echo "<div style='padding:20px 0 0 40px;'>";
                foreach( directory_map('./application/logs') as $dirVals) {
                    echo "<a href=".https_url($this->lang->lang().'/site_admin/file_download/'.$dirVals)." target='_blank'><span class='fa fa-file' style='font-size:20px; line-height:30px;'> ".$dirVals."</span></a><br />";
                }
                echo "</div>";
            ?>
            </div>
            <!-- To display in Large Desktop mode - End -->
        </div>
    </div>
</div>