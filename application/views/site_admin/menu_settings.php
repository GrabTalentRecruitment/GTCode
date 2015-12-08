<?php 
$menusettings_url = https_url($this->lang->lang().'/site_admin/get_menusettings');
$menusettingsUpd_url = https_url($this->lang->lang().'/site_admin/menusettings_update');
?>
<script src="/js/site_admin/siteAdmin_menuupdate.js" type="text/javascript"></script>
<style type="text/css">
	.floatThead-floatContainer { left: inherit !important; }
    .padTop { margin-top: 50px; }
	.table td:last-child { text-align:center; }
	.filters { background-color: orange; }
	.filterable .panel-heading .pull-right { margin-top: -20px; }
	.filterable .filters input[disabled] { text-align: left; background-color: transparent; border: none; cursor: auto; box-shadow: none; padding: 0; height: auto; }
	.filterable .filters input[disabled]::-webkit-input-placeholder { color: #333; }
	.filterable .filters input[disabled]::-moz-placeholder { color: #333; }
	.filterable .filters input[disabled]:-ms-input-placeholder { color: #333; }
</style>
<div class="visible-xs vert-offset-top-5"></div>
<div class="visible-sm vert-offset-top-8"></div>
<div class="visible-lg visible-md hidden-xs vert-offset-top-5"></div>
<div class="site-wrapper">
    <div class="site-wrapper-inner">
        <div class="container-fluid">
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
            <?php            
            $query = $this->db->query('SELECT lang_id, lang_english, lang_chinese, lang_french FROM grabtalent_language');
            if($query->num_rows() > 0) {
            ?>
            <!-- To display in Large Desktop mode - Start -->
            <div class="container visible-md-block visible-lg-block">
            	<div class="row">
                    <input type="hidden" id="menuSettingspostURL" value="<?php echo $menusettings_url; ?>" />
                    <input type="hidden" id="menuSettingsupdateURL" value="<?php echo $menusettingsUpd_url; ?>" />
                    <h2><img src="/images/icons/settings.png" alt="Settings icon"/><?=lang('siteadminusers.settingshdng');?></h2>
            		<div class="panel panel-primary filterable">
        				<div class="table-responsive">
        					<table id="mytable" class="table table-striped">
        						<thead>
        							<tr class="filters">
        								<th><input type="text" class="form-control" placeholder="Menu" disabled /></th>
        								<th><input type="text" class="form-control" placeholder="English" disabled /></th>
        								<th><input type="text" class="form-control" placeholder="Chinese" disabled /></th>
        								<th><input type="text" class="form-control" placeholder="French" disabled /></th>
        								<th><button class="btn btn-primary btn-xs btn-filter">Filter</button><br /><button class="btn btn-primary btn-xs btn-reset">Reset</button></th>
        							</tr>
        						</thead>
                                <tbody>
                                    <?php 
                                        foreach ($query->result() as $candids) { 
                                    ?>
                                    <tr title="<?php echo $candids->lang_id; ?>">
                                        <td style="vertical-align: middle;" class="col-lg-1"><?php echo $candids->lang_id; ?></td>
                                        <td style="vertical-align: left;" class="col-lg-4"><?php echo $candids->lang_english; ?></td>
                                        <td style="vertical-align: left;" class="col-lg-4"><?php echo $candids->lang_chinese; ?></td>
                                        <td style="vertical-align: left;" class="col-lg-4"><?php echo $candids->lang_french; ?></td>
                                        <td style="vertical-align: left;" class="col-lg-2">
                                            <button class="btn btn-warning btn-xs" data-whatever="<?php echo $candids->lang_id; ?>" data-title="Edit" data-toggle="modal" data-target="#editmenuItemModal"><span class="fa fa-pencil"></span></button>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div> 
                <!-- To display in Large Desktop mode - End -->
                <div class="row">
                    <div class="col-md-12 col-md-offset-0 hidden-xs hidden-sm">
                        <?php } else { ?>
                            <div class="col-xs-12 hidden-xs hidden-sm">
                                <h3>This employer does not exist (or) you typed the wrong URL.</h3>
                            </div>
                        <?php } ?>                
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal Dialog for changing individual menu item - Start -->
<div class="modal fade" id="editmenuItemModal" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="fa fa-remove" aria-hidden="true"></span></button>
				<h4 class="modal-title custom_align" id="Heading">Edit Your Detail</h4>
			</div>
			<div class="modal-body">
                <center><span id="modal-error-msg" style="color: red;"></span></center>
				<div class="form-group"><input class="form-control" type="text" id="menuSetting_English" placeholder="English" /></div>
				<div class="form-group"><input class="form-control" type="text" id="menuSetting_Chinese" placeholder="Chinese"/></div>
				<div class="form-group"><input class="form-control" type="text" id="menuSetting_French" placeholder="French"/></div>
                <input type="hidden" id="menuSettingslangid" value="" />
			</div>
			<div class="modal-footer ">
				<button type="button" id="btn_update" class="btn btn-warning btn-lg" style="width: 100%;"><span class="fa fa-ok"></span> Update</button>
			</div>
		</div>
		<!-- /.modal-content --> 
	</div>
	<!-- /.modal-dialog --> 
</div>
<!-- Modal Dialog for changing individual menu item - End -->