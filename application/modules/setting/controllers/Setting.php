<?php defined("BASEPATH") OR exit("No direct script access allowed");

class Setting extends CI_Controller {

  	function __construct() {
	    parent::__construct();
	    //Checking user is login or not 
	    is_login();
	    $this->load->model("Setting_model");    
  	}

  /**
   	* Load Setting view page
   	*/
	public function index() {   
		$result =array();
	    $this->load->view('include/header');
		$data['result'] = $this->Setting_model->get_setting();
		$result = []; 
		foreach ($data['result'] as $key => $value) {
			$result[$value->keys] = $value->value;	
		}
		if(setting_all('UserModules')=='yes') {
			if(isset($this->session->get_userdata()['user_details'][0]->user_type) && $this->session->get_userdata()['user_details'][0]->user_type=='admin') {
				$data['result'] = $result;
				$this->load->view('index',$data); 
			}
		}	else {
			$data['result'] = $result;
			$this->load->view('index',$data); 
		}
	    $this->load->view('include/footer');
	}

  /**
   	* This function is used to update setting
   	*/
	 function edit_setting() {	
		$data =array();
		$data = $this->input->post();
		if(isset($data['user_type']) && is_array($data['user_type']) && !empty($data['user_type'])) {
			$data['user_type'] = json_encode($data['user_type']);
		}
		$data['logo']='logo.png';
		$data['favicon']='favicon.png';
		if(!empty($_FILES['logo']['name'])){
			$newname=$this->uploadFile('logo');
			$data['logo']=$newname;
		} else { 
			$newname = $this->input->post('fileOldlogo');
			$data['logo']=$newname;
		}
		if(!empty($_FILES['favicon']['name'])){	
			$newname=$this->uploadFile('favicon'); 
			$data['favicon']=$newname;
		} else {
			$newname = $this->input->post('fileOldfavicon');
			$data['favicon']=$newname;
		}
		if(!isset($data['register_allowed'])) {
			$data['register_allowed'] = 0;
		}
		foreach($data as $key=>$value)
		{
			$this->Setting_model->updateRow('setting', 'keys', $key, array('value'=>$value));
		}
		$this->session->set_flashdata('message', 'Your data updated Successfully..');
		if($this->input->post('mail_setting')){
			redirect( base_url().'setting#emailSetting', 'refresh');
		} else {
			redirect( base_url().'setting', 'refresh');
		}
	}

	/**
	  * This function is used to Upload file
	  * @param $fielName : This is input name from form
	  * @return fileName by which file is uploaded on server
	  */
	public function uploadFile($fielName) {
		$filename=$_FILES[$fielName]['name'];
		$tmpname=$_FILES[$fielName]['tmp_name']; 
		$exp=explode('.', $filename);
		$ext=end($exp);
		$newname=  $exp[0].'_'.time().".".$ext; 
		$config['upload_path'] = 'assets/images/';
		$config['upload_url'] =  base_url().'assets/images/';
		$config['allowed_types'] = "gif|jpg|jpeg|png|ico";
		$config['max_size'] = '2000000'; 
		$config['file_name'] = $newname;
		$this->load->library('upload', $config);
		move_uploaded_file($tmpname,"assets/images/".$newname);
		return $newname;
	}
	

  	/**
	  * This function is used to add new user type
	  * @return: true if update successfuly
	  */
	public function add_user_type() {
		echo $this->Setting_model->add_user_type();
		exit;
	}

	/**
	  * This function is used to update user permissions
	  * @return: true if update successfuly
	  */

	public function permission() {	
		$data =array();
		$dataa = $this->input->post('data');
		foreach($dataa as $key=>$value)
		{
			$key = str_replace('_SPACE_', ' ', $key);
			$arr = array();
			foreach ($value as $vkey => $vvalue) {
				$vkey = str_replace('_SPACE_', ' ', $vkey);
				$arr[$vkey] = $vvalue;
			}
			$this->Setting_model->updateRow('permission', 'user_type', $key, array('data'=>json_encode($arr)));
		}
		$this->session->set_flashdata('message', 'Your data updated Successfully..');
		redirect( base_url().'setting#permissionSetting', 'refresh');
	}
}
?>