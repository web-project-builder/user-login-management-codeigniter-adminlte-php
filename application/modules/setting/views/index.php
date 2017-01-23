<!-- page content -->
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper settingPage">
    <!-- Main content -->
    <section class="content">
      <?php if($this->session->flashdata("message")){?>
        <div class="alert alert-info alert-dismissible"  role="alert">      
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <?php echo $this->session->flashdata("message")?>
        </div>
      <?php } ?>
      <!-- Default box -->
      <div class="box box-success" >
        <div class="box-header with-border">
          <h3 class="box-title">Settings </h3>
        </div>
        <div class="box-body" style="background: rgb(249, 250, 252);">
          <div class="row">
            <div class="col-lg-12">
              <div class="tabbable tabs-left">
                <ul id="myTab4" class="nav nav-tabs col-md-3">
                  <li class="active">
                    <a href="#tab_General" data-toggle="tab">
                      <i class="fa fa-cogs"></i>&nbsp;&nbsp; 
                      <span>General</span>
                    </a>
                  </li>
                  <li>
                    <a href="#emailSetting" data-toggle="tab">
                      <i class="fa fa-envelope-o" aria-hidden="true"></i> &nbsp;&nbsp; 
                      <span>Email</span>
                    </a>
                  </li>
                  <li id="permis">
                    <a href="#permissionSetting" data-toggle="tab">
                      <i class="fa fa-indent" aria-hidden="true"></i> 
                      <span>Permission</span>
                    </a>
                  </li>
                  <li id="templates">
                    <a href="#templates-div" data-toggle="tab">
                      <i class="fa fa-puzzle-piece" aria-hidden="true"></i> 
                      <span>Templates</span>
                    </a>
                  </li>
                </ul>
                <div class="tab-content col-md-9">
                  <div class="tab-pane fade in" id="templates-div"></div>
                    <div class="tab-pane fade active in" id="tab_General">
                      <div class="row">
                        <div class="box-header my-header">
                          <h3 class="box-title">General</h3>
                        </div>
                      </div>
                      <form method="post" enctype="multipart/form-data" action="<?php echo base_url().'setting/edit_setting' ?>" data-parsley-validate class="form-horizontal form-label-left demo-form2">
                        <div class="row" >
                          <!-- left column -->
                          <div class="">
                            <!-- general form elements -->
                            <div class="box-body">
                              <div class="row">                                    
                                <div class="form-group">
                                  <label class="control-label col-sm-2 thfont" for="">Title of website:</label>
                                  <div class="col-sm-10">
                                    <input type="text" name="website" value="<?php echo isset($result['website'])?$result['website'] :'';?>" class="form-control" placeholder="Enter Website Title">
                                  </div>
                                </div>
                                <?php if(isset($result['UserModules']) && $result['UserModules']=='yes'){ ?>
                                <div class="form-group">
                                  <label class="control-label col-sm-2 thfont" for=""></label>
                                  <div class="col-sm-10">
                                    <label for="register_allowed " class="thfont">
                                      <input name="register_allowed" type="checkbox" id="register_allowed"  <?php if(isset($result['register_allowed'])&& $result['register_allowed']==1){echo'checked="checked"';}?> value="1" > Allow Signup.
                                    </label>
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label class="control-label col-sm-2 thfont" for="">User Type:</label>
                                  <div class="col-sm-5">
                                    <select name="user_type[]" class="form-control" multiple="multiple">
                                      <?php $permissiona =getAllDataByTable('permission');
										                    foreach($permissiona as $perkey=>$value){
                    										  $user_type = isset($value->user_type)?$value->user_type:''; 
                                          $old = json_decode($result['user_type']);
                                      ?>
                                      <option value="<?php echo $user_type;?>" <?php if(in_array(strtolower($user_type), array_map('strtolower', $old))){echo'selected';}?>><?php echo ucfirst($user_type);?></option>
                                        <?php }	?>
                                      </select>
                                    </div>
                                  </div>
                                  <?php }?>
                                </div>
                                <br>
                                <div class="row">     
                                  <div class="form-group col-md-2 col-sm-2  col-xs-2 ">
                                    <span for="exampleInputFile">Website Logo: </span>
                                  </div>
                                  <div class="form-group pic_size col-sm-4 col-xs-4 text-center" id="logo-holder">
                                    <img class="thumb-image logo setpropileam" src="<?php echo base_url('assets/images').'/'.(isset($result['logo']) && $result['logo'] != '' ?$result['logo']:"logo.png");?>"  alt="logoSite">
                                  </div>
                                  <div class="col-md-3 p-d-0 mrg-left-5">
                                    <div class="fileUpload btn btn-success wdt-bg">
                                      <span>Change Logo</span>
                                        <input type="file" class="upload" name="logo" id="logoSite" name="logo"  value="" accept="image/*">
                                        <input type="hidden" name="fileOldlogo" value="<?php echo isset($result['logo'])?$result['logo']: "";?>">
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="form-group col-md-2 col-sm-2  col-xs-2 dsize">
                                    <span for="exampleInputFile" class="thfont">Website Favicon: </span>
                                  </div>
                                  <div class=" form-group pic_size col-sm-4 col-xs-4 text-center" id="favicon-holder" >
                                    <img class="thumb-image favicon setpropileam" src="<?php echo base_url('assets/images').'/'.(isset($result['favicon']) && $result['favicon'] != ''?$result['favicon']:"favicon.ico");?>"  alt="favicon">
                                  </div>
                                    <div class="col-md-3 p-d-0 mrg-left-5">
                                      <div class="fileUpload btn btn-success wdt-bg">
                                        <span>Change Favicon</span>
                                        <input type="hidden" name="fileOldfavicon" value="<?php echo isset($result['favicon'])?$result['favicon']:"";?>">
                                        <input type="file" class="upload" name="favicon" id="favicon" value="" accept="image/*">
                                     </div>
                                    </div>
                                  </div>
                                  <br>
                                  <div class="row col-md-10" align="center">
                                    <div class="form-group sub-btn-wdt">
                                      <input type="submit" value="Save" class="btn btn-success wdt-bg">
                                    </div>          
                                  </div>
                                </div>                                                
                                <!-- /.box-body -->
                              </div>
                              <!-- /.box -->
                            </div>
                            <!--/.col (left) -->
                          </form> 
                        </div>
                        <div class="tab-pane fade" id="emailSetting">
                          <div class="row">
                            <div class="box-header my-header">
                              <h3 class="box-title">Email</h3>
                            </div>
                          </div>
                          <form method="post" enctype="multipart/form-data" action="<?php echo base_url().'setting/edit_setting' ?>" data-parsley-validate class="form-horizontal form-label-left demo-form2">
                            <div class="row">
                              <div class="">                
                                <div class="form-group m-t-20">
                                  <label class="control-label col-sm-2 box-title thfont" for="">Mail Setting</label>
                                  <div class="col-sm-10">
                                    <input type="radio" id="php_mailer" name="mail_setting" value="php_mailer" <?php if(isset($result['mail_setting']) && $result['mail_setting']=='php_mailer'){echo "checked";}?> >
                                    <label for="php_mailer" class="thfont"> SMTP </label>
                                    <input type="radio" id="simple_mail" name="mail_setting" value="simple_mail"  <?php if(isset($result['mail_setting']) && $result['mail_setting']=='simple_mail'){echo "checked";}?>>
                                    <label for="simple_mail" class="thfont"> Server Default </label>
                                  </div>
                                </div>
                                <div id="phpmailer" style="display:<?php if(isset($result['mail_setting']) && $result['mail_setting']=='php_mailer'){echo "block";}else{ echo 'none'; }?>;" >
                                  <div class="form-group">
                                    <label class="control-label col-sm-2 thfont" for="">Company Name:</label>
                                    <div class="col-sm-10">
                                      <input type="text" class="form-control" name="company_name" id="company_name" value="<?php echo isset($result['company_name'])?$result['company_name'] :'';?>" placeholder="Enter Company Name">
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label class="control-label col-sm-2 thfont" for="SMTP_EMAIL">SMTP EMAIL:</label>
                                    <div class="col-sm-10">
                                      <input type="email" class="form-control" name="SMTP_EMAIL" id="SMTP_EMAIL" value="<?php echo isset($result['SMTP_EMAIL'])?$result['SMTP_EMAIL'] :'';?>" placeholder="Enter SMTP EMAIL">
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label class="control-label col-sm-2 thfont" for="HOST">SMTP HOST:</label>
                                    <div class="col-sm-10">
                                      <input type="text" class="form-control" name="HOST" id="HOST" value="<?php echo isset($result['HOST'])?$result['HOST'] :'';?>" placeholder="Enter Smtp Host">
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label class="control-label col-sm-2 thfont" for="PORT">SMTP PORT:</label>
                                    <div class="col-sm-10">
                                      <input type="text" class="form-control" name="PORT" id="PORT" value="<?php echo isset($result['PORT'])?$result['PORT'] :'';?>" placeholder="Enter SMTP PORT">
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label class="control-label col-sm-2 thfont" for="SMTP_SECURE">SMTP SECURE:</label>
                                    <div class="col-sm-10">
                                      <input type="text" class="form-control" name="SMTP_SECURE" id="SMTP_SECURE" value="<?php echo isset($result['SMTP_SECURE'])?$result['SMTP_SECURE'] :'';?>" placeholder="Enter SMTP SECURE">
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label class="control-label col-sm-2 thfont" for="SMTP_PASSWORD">SMTP PASSWORD:</label>
                                    <div class="col-sm-10">
                                      <input type="text" style="display: none;">
                                      <input type="password" class="form-control col-md-7 col-xs-12 showpassword" name="SMTP_PASSWORD" id="test1" value="<?php echo isset($result['SMTP_PASSWORD'])?$result['SMTP_PASSWORD'] :'';?>" placeholder="Enter SMTP PASSWORD">
                                      <input id="test2" type="checkbox" />Show password
                                    </div>
                                  </div>
                                </div>
                                <div id="simplemail"  style="display:<?php if(isset($result['mail_setting']) && $result['mail_setting']=='simple_mail'){echo "block";}else{ echo 'none'; }?>;">
                                  <div class="form-group">
                                    <label class="control-label col-sm-2 thfont" for="">Company Name:</label>
                                    <div class="col-sm-10">
                                      <input type="text" class="form-control" name="company_name" id="company_name" value="<?php echo isset($result['company_name'])?$result['company_name'] :'';?>" placeholder="Enter Company Name">
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label class="control-label col-sm-2 thfont" for="EMAIL">Email:</label>
                                    <div class="col-sm-10">
                                      <input type="email" class="form-control" name="EMAIL" id="EMAIL" value="<?php echo isset($result['EMAIL'])?$result['EMAIL'] :'';?>" placeholder="Enter email id">
                                    </div>
                                  </div>
                                </div>
                                <div class="row col-md-10" align="center">
                                  <div class="form-group sub-btn-wdt">
                                    <input type="submit" value="Save" class="btn btn-success wdt-bg">
                                  </div>          
                                </div>
                              </div>
                            </div>
                          </form> 
                        </div>
                        <div class="tab-pane " id="permissionSetting">
                          <div class="row">
                            <div class="box-header my-header">
                              <h3 class="box-title">Permissions</h3>
                            </div>
                          </div>
                          <div class="panel-group" id="accordion">
                            <h5 class="over-title">
                              <div class="row form-horizontal">
                                <div class="col-md-3">
                                  <a class="btn btn-o btn-success" id="addmoreRoles" href="#"><i class="fa fa-plus"></i> Add User Type</a>
                                </div>
                                <div class="col-md-9">
                                  <div class="form-horizontal"  id="addmoreRolesShow">
                                    <form>
                                      <div class="form-group">
                                        <label for="roles" class="control-label col-md-2 thfont">User Type</label>
                                        <div class="col-md-5">
                                          <input type="text" name="roles"  id="roles"  class="form-control" placeholder="Enter User Roles" />
                                          <p id="showRolesMSG" style="color:red;"></p>
                                        </div>
                                        <button type="button" id="rolesAdd" class="btn  btn-success">Add</button>
                                      </div>
                                    </form>
                                  </div>
                                </div>
                              </div>
                            </h5>   
                          </div> 
                          <form class="form-horizontal" action="<?php echo base_url().'setting/permission' ?>" method="post">
                          <?php 
                          $permission = getAllDataByTable('permission');
                          $setPermission =array();
                          $own_create = '';$own_read = '';$own_update = '';$own_delete = '';
                          $all_create = '';$all_read = '';$all_update = '';$all_delete = '';
                          $i=0;
                          $permission = isset($permission)&&is_array($permission)&&!empty($permission)?$permission:array();
                          if(isset($permission[1])) {
                            foreach($permission as $perkey=>$value){
                              $id = isset($value->id)?$value->id:'';
                              $user_type = isset($value->user_type)?$value->user_type:'';
                              $data = isset($value->data)?json_decode($value->data):'';
                              if($user_type=='admin'){}else{
                          ?>
                                <div class="panel panel-default">
                                  <div class="panel-heading">
                                    <h4 class="panel-title">
                                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse_<?php echo $id;?>"><i class="fa fa-bars"></i> <?php echo  'Permissions for: '. ucfirst($user_type);?></a></h4>
                                  </div>
                                  <div id="collapse_<?php echo $id;?>" class="panel-collapse collapse <?php if($i==0){echo"in";}?>">
                                    <div class="panel-body">
                                      <table class="table table-bordered dt-responsive rolesPermissionTable">
                                        <thead>
                                          <tr class="showRolesPermission">
                                            <th scope="col">Modules</th>
                                            <th scope="col">Create</th>
                                            <th scope="col">Read</th>
                                            <th scope="col">Update</th>
                                            <th scope="col">Delete</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          <?php 
                                          if(isset($data) && !empty($data)){
                                            foreach($data as $perkey=>$valueR){
                                              $perkey = isset($perkey)?$perkey:'';
                                              $valueR = isset($valueR)?$valueR:'';
                                              if(isset($valueR)) {
                                                $setPermissionCheck = $valueR;
                                                $own_create = isset($setPermissionCheck->own_create)?$setPermissionCheck->own_create:'';
                                                $own_read = isset($setPermissionCheck->own_read)?$setPermissionCheck->own_read:'';
                                                $own_update = isset($setPermissionCheck->own_update)?$setPermissionCheck->own_update:'';
                                                $own_delete = isset($setPermissionCheck->own_delete)?$setPermissionCheck->own_delete:'';
                                                $all_create = isset($setPermissionCheck->all_create)?$setPermissionCheck->all_create:'';
                                                $all_read = isset($setPermissionCheck->all_read)?$setPermissionCheck->all_read:'';
                                                $all_update = isset($setPermissionCheck->all_update)?$setPermissionCheck->all_update:'';
                                                $all_delete = isset($setPermissionCheck->all_delete)?$setPermissionCheck->all_delete:'';
                                              } else {
                                                $setPermissionCheck =array();$own_create = '';$own_read = '';$own_update = '';$own_delete = '';
                                                $all_create = '';$all_read = '';$all_update = '';$all_delete = '';
                                              }
                                            ?>
                                              <tr>
                                                <th scope="col" colspan="5" class="showRolesPermission text-center"><?php echo $perkey;?>
                                                  <?php  
                                                        $perkey = str_replace(' ', '_SPACE_', $perkey); 
                                                        $user_type = str_replace(' ', '_SPACE_', $user_type); 
                                                  ?>
                                                  <input type="hidden" name="data[<?php echo $user_type;?>][<?php echo $perkey;?>]" value="<?php echo $perkey;?>" />
                                                </th>
                                              </tr>
                                              <tr>
                                                <th scope="row" class="thfont">Own Entries</th>
                                                <td><input type="checkbox" name="data[<?php echo $user_type;?>][<?php echo $perkey;?>][own_create]" value="1" <?php if($own_create==1){echo"checked";}?>/></td>
                                                <td><input type="checkbox" name="data[<?php echo $user_type;?>][<?php echo $perkey;?>][own_read]"  value="1" <?php if($own_read==1){echo"checked";}?>/></td>
                                                <td><input type="checkbox" name="data[<?php echo $user_type;?>][<?php echo $perkey;?>][own_update]"  value="1" <?php if($own_update==1){echo"checked";}?>/></td>
                                                <td><input type="checkbox" name="data[<?php echo $user_type;?>][<?php echo $perkey;?>][own_delete]" value="1" <?php if($own_delete==1){echo"checked";}?>/></td>
                                              </tr>
                                              <tr>
                                                <th scope="row" class="thfont">All Entries</th>
                                                <td>-</td>
                                                <td><input type="checkbox" name="data[<?php echo $user_type;?>][<?php echo $perkey;?>][all_read]"  value="1" <?php if($all_read==1){echo"checked";}?>/></td>
                                                <td><input type="checkbox" name="data[<?php echo $user_type;?>][<?php echo $perkey;?>][all_update]"  value="1" <?php if($all_update==1){echo"checked";}?> /></td>
                                                <td><input type="checkbox" name="data[<?php echo $user_type;?>][<?php echo $perkey;?>][all_delete]" value="1" <?php if($all_delete==1){echo"checked";}?>/></td>
                                              </tr>
                                      <?php } 
                                          } else {
                                            $blanckModule1 = getRowByTableColomId('permission','admin','user_type','data');
                                            if(isset($blanckModule1) && $blanckModule1 != '') {
                                              foreach(json_decode($blanckModule1) as $key1=>$value1) {	
                                      ?>
                                                <tr>
                                                  <th scope="col" colspan="5" class="showRolesPermission text-center"><?php echo $key1;?>
                                                    <?php  
                                                      $key1 = str_replace(' ', '_SPACE_', $key1); 
                                                      $user_type = str_replace(' ', '_SPACE_', $user_type); 
                                                    ?>
                                                    <input type="hidden" name="data[<?php echo $user_type;?>][<?php echo $key1;?>]" value="<?php echo $key1;?>" />
                                                  </th>
                                                </tr>
                                                <tr>
                                                  <th scope="row" class="thfont">Own Entries</th>
                                                  <td><input type="checkbox" name="data[<?php echo $user_type;?>][<?php echo $key1;?>][own_create]" value="1"/></td>
                                                  <td><input type="checkbox" name="data[<?php echo $user_type;?>][<?php echo $key1;?>][own_read]"  value="1"/></td>
                                                  <td><input type="checkbox" name="data[<?php echo $user_type;?>][<?php echo $key1;?>][own_update]"  value="1"/></td>
                                                  <td><input type="checkbox" name="data[<?php echo $user_type;?>][<?php echo $key1;?>][own_delete]" value="1"/></td>
                                                </tr>
                                                <tr>
                                                  <th scope="row" class="thfont">All Entries</th>
                                                  <td>-</td>
                                                  <td><input type="checkbox" name="data[<?php echo $user_type;?>][<?php echo $key1;?>][all_read]"  value="1"/></td>
                                                  <td><input type="checkbox" name="data[<?php echo $user_type;?>][<?php echo $key1;?>][all_update]"  value="1"/></td>
                                                  <td><input type="checkbox" name="data[<?php echo $user_type;?>][<?php echo $key1;?>][all_delete]" value="1"/></td>
                                                </tr>
                                          <?php
                                              } 
                                            }
                                          }
                                          ?>
                                        </tbody>
                                      </table>
                                    </div>
                                  </div>
                                </div>
                        <?php 
                                $i++;
                              }
                            }
                        ?>
                            <hr>
                            <input type="submit" name="save" value="Save Permission" class="btn btn-wide btn-success margin-top-20" />
                    <?php } ?>
                          </form> 
                        </div>
                        <!-- /.panel -->
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-body -->
        </section>
        <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->
<script>
$("#logoSite").on('change', function () {
  if (typeof (FileReader) != "undefined") {
    var image_holder = $("#logo-holder");
    image_holder.empty();
    var reader = new FileReader();
    reader.onload = function (e) {
      $("<img />", { "src": e.target.result,"class": "thumb-image logo setpropileam" }).appendTo(image_holder);
    }
    image_holder.show();
    reader.readAsDataURL($(this)[0].files[0]); } else { alert("This browser does not support FileReader."); }
});
$("#favicon").on('change', function () {
  if (typeof (FileReader) != "undefined") {
    var image_holder = $("#favicon-holder");
    image_holder.empty();
    var reader = new FileReader();
    reader.onload = function (e) {
      $("<img />", { "src": e.target.result, "class": "thumb-image setpropileam" }).appendTo(image_holder);
    }
    image_holder.show();
    reader.readAsDataURL($(this)[0].files[0]);} else { alert("This browser does not support FileReader.");  }
});
</script>
<script type="text/javascript">
$('document').ready(function(){
	$('input[type="radio"]').click(function(){
       if($(this).attr('id') == 'simple_mail') {$('#simplemail').show();$('#phpmailer').hide();}else{$('#phpmailer').show();$('#simplemail').hide();}
   });
	if('simple_mail'=='<?php echo isset($result['mail_setting'])? $result['mail_setting']:'';?>'){$('#phpmailer').hide();}else{$('#simplemail').hide();}
});
(function ($) {
    $.toggleShowPassword = function (options) {
        var settings = $.extend({ field: "#password", control: "#toggle_show_password",}, options);
        var control = $(settings.control);
        var field = $(settings.field);
        control.bind('click',function(){if(control.is(':checked')){ field.attr('type', 'text');}else{ field.attr('type', 'password');} })
    };
}(jQuery));
$.toggleShowPassword({  field: '#test1', control: '#test2'}); 
</script>
<script>   
$(document).ready(function() {
	$('#addmoreRolesShow').hide();
    $('#addmoreRoles').on('click', function(){
       $('#addmoreRolesShow').slideToggle();
    });
	$('#rolesAdd').on('click',function(event){
	var roles =	$('#roles').val();
	var url_page = '<?php echo base_url().'setting/add_user_type'; ?>';
	event.preventDefault();
    $.ajax({
        type: "POST",
        url: url_page,
        data:{ action: 'ADDACTION',rolesName:roles},
        success: function (data) { 
			if(data=='This User Type('+ roles +') is alredy exist, In this Project Please enter Another name'){$("#showRolesMSG").html(data);}
			else{
        $('#addmoreRolesShow').hide();
        location.reload();
        //window.location.href="<?php //echo base_url().'setting#permissionSetting'; ?>";
        /*setTimeout(function(){ 
          alert('fdfdf');$('#permis').addClass('active');
        },1000);*/
        }
      }
    });
	});

  $('#templates').on('click', function() {
    $('#templates-div').html('');
    $.ajax({  
      url: '<?php echo base_url().'templates'; ?>',
      method:'post',
      data:{
        showTemplate: 'showTemplate'
      }
    }).done(function(data) {
      console.log(data);
      $('#templates-div').html(data);
    });
  });
  // Javascript to enable link to tab
  var url = document.location.toString();
  if (url.match('#')) {
      var tag = url.split('#')[1];
      if(tag == 'templates-div'){
        $('#templates').click();
      }
      $('.nav-tabs a[href="#' + tag + '"]').tab('show');
  } 

  // Change hash for page-reload
  $('.nav-tabs a').on('shown.bs.tab', function (e) {
      window.location.hash = e.target.hash;
  });
})
</script>
  <!-- /page content -->