<?php defined("BASEPATH") OR exit("No direct script access allowed");

class About extends CI_Controller {

  function __construct() {
    parent::__construct();
  }

  /**
     * This function is used to load page view
     * @return Void
     */
  public function index(){   
	$this->load->view("include/header");
    $this->load->view("index");
    $this->load->view("include/footer");
  }
}
?>