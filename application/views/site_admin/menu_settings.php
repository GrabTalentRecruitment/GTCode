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
<div class="site-content" >

	<div class="container page-header">
		<div class="row">
			<div class="col-md-6 no-padding">
				<h1 class="page-title font-1"><?=lang('siteadminusers.settingshdng');?></h1>
			</div>
			<div class="col-md-6 no-padding"></div>
		</div>
	</div>
	
	<div class="page-content container">
        <?php            
        $query = $this->db->query('SELECT lang_id, lang_english, lang_chinese, lang_french FROM grabtalent_language');
        if($query->num_rows() > 0) {
        ?>
        <input type="hidden" id="menuSettingspostURL" value="<?php echo $menusettings_url; ?>" />
        <input type="hidden" id="menuSettingsupdateURL" value="<?php echo $menusettingsUpd_url; ?>" />
		<div class="panel panel-primary filterable">
			<div class="table-responsive">
				<table class="table table-striped">
					<thead>
						<tr class="filters">
							<th><input type="text" placeholder="Menu" disabled /></th>
							<th><input type="text" placeholder="English" disabled /></th>
							<th><input type="text" placeholder="Chinese" disabled /></th>
							<th><input type="text" placeholder="French" disabled /></th>
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
        <?php } ?>
        
    </div>
    
</div><br />
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
				<div class="form-group"><input type="text" id="menuSetting_English" placeholder="English" /></div>
				<div class="form-group"><input type="text" id="menuSetting_Chinese" placeholder="Chinese"/></div>
				<div class="form-group"><input type="text" id="menuSetting_French" placeholder="French"/></div>
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