<?php defined("BASEPATH") OR exit("No direct script access allowed");

class Templates extends CI_Controller {
  	function __construct() {
	    parent::__construct();
	    //Check user login
	    is_login();
	    $this->load->model("Templates_model"); 
	}

	/**
	  * This function is used get html of template page 
	  */
  	public function index() {   
	    $data["view_data"]= $this->Templates_model->get_templates();
	    echo $this->load->view("index",$data, 1);
	    exit;
	}

  	/**
	  * This function is used to add and update templates 
	  */
	public function add_edit($id='') {	
		$data = $this->input->post();
		if($id = $this->input->post('id')) {
			unset($data['submit']);
			unset($data['fileOld']);
			unset($data['save']);
			unset($data['id']);
			$this->Templates_model->updateRow('templates', 'id', $id, $data);
			$this->session->set_flashdata('message', 'Your data updated Successfully..');
      		redirect('setting#templates-div'); 
		} else { 
			unset($data['submit']);
			unset($data['fileOld']);
			unset($data['save']);
			$insert_id = $this->Templates_model->insertRow('templates', $data);
			$this->session->set_flashdata('message', 'Your data inserted Successfully..');
			redirect('setting#templates-div');
		}
	}
	
	/**
	  * This function is used to Load add abd update view/html
	  */
	public function modal_form() {
		if($this->input->post('id')){
			$data['data']= $this->Templates_model->get_specific_template($this->input->post('id'));
            echo $this->load->view('add_update', $data, true);
        } else {
            echo $this->load->view('add_update', '', true);
        }
        exit;
	}

	/**
	  * This function is used to Load add abd update view/html
	  */
  	public function view_page($id='') { 
		$this->load->view('include/script');
		if(!empty($id)){
    		$data['data']= $this->Templates_model->get_specific_template($id);
    		$this->load->view('add_update', $data);  
		} else {
			$this->load->view('add_update'); 
		}
  	}

	/**
	  * This function is used to Load template datatable view and appear template list in table form 
	  */
    public function ajax_data(){
		$table 		= 'templates';
		$columns 	= array(
		array( 'db' => 'template_name', 'dt' => 0 ),
		array( 'db' => 'id', 'dt' => 1 )
		);
		$joinQuery 	= '';
		$primaryKey = 'id';
		$this->load->library('Ssp');
		$sql_details = array(
			'user' => $this->db->username,
			'pass' => $this->db->password,
			'db'   => $this->db->database,
			'host' => $this->db->hostname
		);

		$output_arr = SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns);
		foreach ($output_arr['data'] as $key => $value) 
		{
			$output_arr['data'][$key][count($output_arr['data'][$key])  - 1] = '<a style="cursor:pointer;" class="mClass view_template" title="View Template" data-src="'.$output_arr['data'][$key][count($output_arr['data'][$key])  - 1].'"><i class="fa fa-eye" ></i></a><a id="btnEditRow" class="templateModalButton mClass"  href="javascript:;" type="button" data-src="'.$output_arr['data'][$key][count($output_arr['data'][$key])  - 1].'" title="Edit"><i class="fa fa-pencil" data-id=""></i></a>';
		}
		echo json_encode($output_arr);
    }
	
	/**
	  * This function is used to preview template 
	  */
    public function preview(){
    	$template_row = $this->Templates_model->get_specific_template($this->input->post('template_id'));
    	echo $html = $template_row->html;
    	exit;
    }
}


?>