<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper clearfix">
<!-- Main content -->
  <div class="col-md-12 form f-label">
  <?php if($this->session->flashdata("messagePr")){?>
    <div class="alert alert-info">      
      <?php echo $this->session->flashdata("messagePr")?>
    </div>
  <?php } ?>
    <!-- Profile Image -->
    <div class="box box-success pad-profile">
     	<div class="box-header with-border">
        <h3 class="box-title">My Account <small></small></h3>
      </div>
      <form method="post" enctype="multipart/form-data" action="<?php echo base_url().'user/add_edit' ?>" class="form-label-left">
        <div class="box-body box-profile">
          <div class="col-md-3">
            <div class="pic_size" id="image-holder"> 
            <?php  
              if(file_exists('assets/images/'.$user_data[0]->profile_pic) && isset($user_data[0]->profile_pic)){
              $profile_pic = $user_data[0]->profile_pic;
              }else{
              $profile_pic = 'user.png';}?>
              <center> <img class="thumb-image setpropileam" src="<?php echo base_url();?>/assets/images/<?php echo isset($profile_pic)?$profile_pic:'user.png';?>" alt="User profile picture"></center>
            </div>
            <br>
            <div class="fileUpload btn btn-success wdt-bg">
                <span>Change Picture</span>
                <input id="fileUpload" class="upload" name="profile_pic" type="file" accept="image/*" /><br />
                <input type="hidden" name="fileOld" value="<?php echo isset($user_data[0]->profile_pic)?$user_data[0]->profile_pic:'';?>" />
            </div>
          </div>
          <div class="col-md-8">
            <h3>Personal Information:</h3>
            

					<div class="form-group has-feedback">
		              <label for="exampleInputstatus">Status:</label>
		              <select name="status" id="status" class="form-control">
		        			<option value="active" <?php echo (isset($user_data[0]->status) && $user_data[0]->status == 'active' ?'selected="selected"':'');?> >Active</option>
		        			
		        			<option value="deleted" <?php echo (isset($user_data[0]->status) && $user_data[0]->status == 'deleted' ?'selected="selected"':'');?> >Deleted</option>
		        			
		              </select>
		            </div>

					

					<div class="form-group has-feedback clear-both">
		              <label for="exampleInputname">Name:</label>
		              <input type="text" id="name" name="name" value="<?php echo (isset($user_data[0]->name)?$user_data[0]->name:'');?>" required="required" class="form-control" placeholder="Name">
		              <span class="glyphicon glyphicon-user form-control-feedback"></span>
		            </div>

					

					<div class="form-group has-feedback clear-both">
		              <label for="exampleInputemail">Email:</label>
		              <input type="text" id="email" name="email" value="<?php echo (isset($user_data[0]->email)?$user_data[0]->email:'');?>" required="required" class="form-control" placeholder="Email">
		              <span class="glyphicon glyphicon-user form-control-feedback"></span>
		            </div>

					
              <br>
            <h3>Change Password:</h3>
            <div class="form-group has-feedback">
              <label for="exampleInputEmail1">Current Password:</label>
              <input id="pass11" class="form-control" pattern=".{6,}" type="password" placeholder="********" name="currentpassword" title="6-14 characters">
              <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>                       
            <div class="form-group has-feedback">
              <label for="exampleInputEmail1">New Password:</label>
              <input type="password" class="form-control" placeholder="New Password" name="password">
              <span class="glyphicon glyphicon-pencil form-control-feedback"></span>
            </div>                       
            <div class="form-group has-feedback">
              <label for="exampleInputEmail1">Confirm New Password:</label>
              <input type="password" class="form-control" placeholder="Confirm New Password" name="confirmPassword">
              <span class="glyphicon glyphicon-pencil form-control-feedback"></span>
            </div>  
            <br>
            <div class="form-group has-feedback sub-btn-wdt" >
              <input type="hidden" name="users_id" value="<?php echo isset($user_data[0]->users_id)?$user_data[0]->users_id:''; ?>">
              <input type="hidden" name="user_type" value="<?php echo isset($user_data[0]->user_type)?$user_data[0]->user_type:''; ?>">
              <button name="submit1" type="button" id="profileSubmit" class="btn btn-success btn-md wdt-bg">Save</button>  
              <!-- <div class=" pull-right">
              </div> -->
            </div>
          </div>
         <!-- /.box-body -->
        </div>
      </form>                     
      <!-- /.box -->
    </div>
    <!-- /.content -->
  </div>
</div>
<!-- /.content-wrapper -->