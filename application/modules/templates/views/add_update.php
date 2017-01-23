<form action="<?php echo base_url()."templates/add_edit"; ?>" method="post" role="form" id="form" enctype="multipart/form-data" style="padding: 0px 30px">
 <?php if(isset($data->id)){?><input type="hidden"  name="id" value="<?php echo isset($data->id) ?$data->id : "";?>"> <?php } ?>
 	<div class="box-body">
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
				<label for="template_name">Template name</label>
				<input type="text" placeholder=" Template name" class="form-control" id="template_name" name="template_name" required value="<?php echo isset($data->template_name)?$data->template_name:"";?>"  >
				</div>
			</div>
		</div>
		<div class="form-group template-vars">
			<label for="help-variables">Template Variables</label>
			<div class="help-variables-div">
				<p class="line">
					<span class="col-md-4">
						<code>{var_user_type}</code>
					</span>
					<span class="col-md-7">
						<strong>: User Type</strong>
					</span>
				</p>
				<p class="line">
					<span class="col-md-4">
						<code>{var_user_name}</code>
					</span>
					<span class="col-md-7">
						<strong>: User Name</strong>
					</span>
				</p>
				<p class="line">
					<span class="col-md-4">
						<code>{var_sender_name}</code>
					</span>
					<span class="col-md-7">
						<strong>: Sender Name</strong>
					</span>
				</p>
				<p class="line">
					<span class="col-md-4">
						<code>{var_website_name}</code>
					</span>
					<span class="col-md-7">
						<strong>: Website Name</strong>
					</span>
				</p>
				<p class="line">
					<span class="col-md-4">
						<code>{var_user_email}</code>
					</span>
					<span class="col-md-7">
						<strong>: User Email</strong>
					</span>
				</p>
				<p class="line">
					<span class="col-md-4">
						<code>{var_inviation_link}</code>
					</span>
					<span class="col-md-7">
						<strong>: Invitation link</strong>
					</span>
				</p>
			</div>
		</div>
		<div class="form-group">
			<label for="html">Html</label>
			<textarea class="form-control ckeditor" id="html" name="html" required><?php echo isset($data->html)?$data->html:"";?></textarea>
		</div>
	</div>
    <!-- /.box-body -->
    <div class="box-footer sub-btn-wdt">
    	<input type="submit" value="Save" name="save" class="btn btn-success wdt-bg">
    </div>
</form>
<script>
	var tt = $('textarea.ckeditor').ckeditor();
	CKEDITOR.config.allowedContent = true;
	$(document).ready(function() {
		$('#nameModal_Templates')
			.find('div.col-md-offset-4')
			.removeClass('col-md-offset-4')
			.removeClass('col-md-4')
			.addClass('modal-dialog')
			.addClass('modal-lg');
	});
</script>