<div class="modal fade" id="nameModal_Templates"  role="dialog"><!-- Modal Crud Start-->
	<div class="col-md-offset-4 col-md-4">
		<div class="box box-primary popup" >
			<div class="box-header with-border formsize">
				<h3 class="box-title">Templates</h3>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
			</div>
			<div class="modal-body" style="padding: 0px 0px 0px 0px;"></div>
		</div>
	</div>
</div><!--End Modal Crud -->
<!-- start: PAGE CONTENT -->
<?php if($this->session->flashdata("message")){?>
  <div class="alert alert-info">      
    <?php echo $this->session->flashdata("message")?>
  </div>
<?php } ?>
<div class="row">
  <div class="box-header my-header">
    <h3 class="box-title">Templates</h3>
  </div>

  <div class="box-body">						
    <table id="example_Templates" class="cell-border example_Templates table table-striped table1 table-bordered table-hover dataTable">
      <thead>
        <tr>
          <th>Template name</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
      </tbody> 
    </table>
  </div>
  <!-- /.box-body -->
</div>
<!-- /.row -->
<!-- Modal -->
<div id="previewModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Template Preview</h4>
      </div>
      <div class="modal-body"></div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
jQuery(document).ready(function($) { 
	var url = "<?php echo base_url();?>";
    $("#example_Templates").DataTable({ 
        "processing": true,
        "serverSide": true,
		"language": {"search": "_INPUT_", "searchPlaceholder": "Search"}, 
		"iDisplayLength": 10,
		"aLengthMenu": [[10, 25, 50, 100,500,-1], [10, 25, 50,100,500,"All"]],
        "ajax": url+"templates/ajax_data"
    });


} );

function setId(id) {
	var url =  "<?php echo site_url();?>";
	$("#cnfrm_delete").find("a.yes-btn").attr("href",url+"/templates/delete_data/"+id);
}
</script>
