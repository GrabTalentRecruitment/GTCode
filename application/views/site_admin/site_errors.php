<div class="site-content" >

	<div class="container page-header">
		<div class="row">
			<div class="col-md-6 no-padding">
				<h1 class="page-title font-1"><?=lang('siteadminusers.siteerrorhdng');?></h1>
			</div>
			<div class="col-md-6 no-padding"></div>
		</div>
	</div>
	
	<div class="page-content container">
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