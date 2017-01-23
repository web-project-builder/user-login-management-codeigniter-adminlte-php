<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Setting_model Class extends CI_Model
 */
class Setting_model extends CI_Model {       
	function __construct(){            
	    parent::__construct();
	    $this->load->database();
	} 
   
   
    /**
   	  * This function is used to get settings 
   	  */
	public function get_setting() {	
		return $this->db->get('setting')->result();
    }
 	
 	/**
   	  * This function is used add user type 
   	  */
	public function add_user_type() {
		$rolesName = isset($_REQUEST['rolesName'])?$_REQUEST['rolesName']:'';
		$this->db->where('user_type', $rolesName);
		$result = $this->db->get('permission')->row();
		if(!empty($result)) {
			return 'This User Type('.$result->user_type.') is alredy exist, In this Project Please enter Another name';
		} else {
			return $this->insertRow('permission', array('user_type' => $rolesName));
		}
	}

	/**
   	  * This function is used to insert data in table
   	  * @param : $table - table name in which you want to insert record
   	  * @param : $data - data array 
   	  */
	public function insertRow($table, $data){
	  	$this->db->insert($table, $data);
	  	return  $this->db->insert_id();
	}

  	/**
   	  * This function is used to update data in specific table
   	  * @param : $table - table name in which you want to update record
   	  * @param : $col - field name for where clause 
   	  * @param : $colVal - field value for where clause
   	  * @param : $data - data array 
   	  */
  	public function updateRow($table, $col, $colVal, $data) {
  		$this->db->where($col,$colVal);
		$this->db->update($table,$data);
		return true;
	}
	
}?>