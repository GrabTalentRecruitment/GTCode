<?php $tblName = $this->uri->segment(4); $menudelete_URL = $this->lang->lang().'/site_admin/dropdown_deltblItem'; ?>
<script src="/js/site_admin/siteAdmin_dropdownchange.js" type="text/javascript"></script>
<input type="hidden" id="menuDropdowndelURL" value="<?php echo https_url($menudelete_URL); ?>" />
<div class="site-content" >

	<div class="container page-header">
		<div class="row">
			<div class="col-md-6 no-padding">
				<h1 class="page-title font-1">Edit <?php echo $tblName; ?></h1>
			</div>
			<div class="col-md-6 no-padding">
				<div class="subpage-breadcrumbs">
					<a href="<?php echo https_url($this->lang->lang().'/site_admin/dashboard')?>"><?=lang('home.index')?></a>&nbsp;/&nbsp;<a href="<?php echo https_url($this->lang->lang().'/site_admin/dropdown_settings')?>"><?=lang('siteadminusers.settingslabel3');?></a>
				</div>
			</div>
		</div>
	</div>
	
	<div class="page-content container">
        
        <div class="row">
            <a href="<?php echo https_url($this->lang->lang().'/site_admin/dropdown_itemadd/'.$tblName)?>" class="btn btn-primary">Add New</a><br /><br />
            
            <table class="table table-striped">
				<thead>
					<tr>
                        <?php
                            $columnarr = [];
                            $query = $this->db->query('DESC '.$tblName);
                            if($query->num_rows() > 0) {
                                foreach ($query->result_array() as $candids) {
                                    echo "<th>".$candids['Field']."</th>";
                                    array_push($columnarr,$candids['Field']);
                                }
                            }
                        ?>
					</tr>
				</thead>
                <tbody>
                    <?php 
                    $rowhdr='';
                    $comma_separated = implode(",", $columnarr);                                    
                    $tblcolquery = $this->db->query('SELECT '.$comma_separated.' FROM '.$tblName);
                    foreach ($tblcolquery->result_array() as $tbcolVal) {
                        echo "<tr>";
                        foreach ($columnarr as $key=>$value) { 
                            echo "<td>".$tbcolVal[$value]."</td>";
                            $rowhdr = $value.",".$tbcolVal[$value];
                        }
                        echo "<td><button class='btn btn-warning btn-xs' data-whatever=".$rowhdr.",".$tblName." data-title='Edit' data-toggle='modal' data-target='#deldropdownItemModal'><span class='fa fa-eraser'></span></button></td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal Dialog for changing individual menu item - Start -->
<div class="modal fade" id="deldropdownItemModal" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="fa fa-remove" aria-hidden="true"></span></button>
				<h4 class="modal-title custom_align" id="Heading"><?php echo $tblName; ?> item delete confirmation</h4>
			</div>
			<div class="modal-body">
                <span id="modal-error-msg" style="text-align: center; color: red;"></span>
                <h4>Are you sure to delete this item?</h4>
                <input type="hidden" id="menudropDowntblItemid" value="" />
			</div>
			<div class="modal-footer ">
				<button type="button" id="btn_confirm" class="btn btn-primary btn-sm">Yes</button>
                <button type="button" class="btn btn-sm" data-dismiss="modal" aria-hidden="true">No</button>
			</div>
		</div>
		<!-- /.modal-content --> 
	</div>
	<!-- /.modal-dialog --> 
</div>
<!-- Modal Dialog for changing individual menu item - End -->