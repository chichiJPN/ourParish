<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class generaladmin extends CI_Controller {

 function __construct()
 {
   parent::__construct();
   $this->load->model('user','',TRUE);
 }
 
 //adds parish
 function addParish() {
	$this->load->library('form_validation');
	$this->form_validation->set_rules('chname', 'church_name', 'trim|required|xss_clean');

	if($this->form_validation->run() == FALSE) {
		echo json_encode('Validation run fail');
	} else {
		$data = array(
		   'parish' => $this->input->post('chname') ,
		   'street' => NULL ,
		   'barangay' => NULL,
		   'towncity' => NULL,
		);
		
		if($this->user->model_addParish($data)) {
			echo json_encode('insert success');		
		} else {
			echo json_encode('insert fail');
		}
	}
 }
 
 //deletes admin of specified parish
 function deleteAdmin() {
	$this->load->library('form_validation');
	$this->form_validation->set_rules('admin_id', 'Admin_id', 'trim|required|xss_clean');

	if($this->form_validation->run() == FALSE) {
		echo json_encode('Validation run fail');
	} else {
		$data = array(
		   'id_user' => $this->input->post('admin_id')
		);
		
		if($this->user->model_deleteAdmin($data)) {
			echo json_encode('delete success');		
		} else {
			echo json_encode('delete fail');
		}
	}
 }
 
 //add admin to specified parish
 function addAdmin() {
	$this->load->helper(array('form', 'url'));
 	$this->load->library('form_validation');
	$this->form_validation->set_rules('id_parish', 'Id_parish', 'trim|required|xss_clean');
	$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean|callback_username_check');
	$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');

	if($this->form_validation->run() == FALSE) {
		echo json_encode('Username exists or Validation run fail');
	} else {
		$data = array(
		   'username' => $this->input->post('username') ,
		   'password' => $this->input->post('password') ,
		   'role' => '2' ,
		   'id_parish' => $this->input->post('id_parish')
		);
		
		if($this->user->model_addAdmin($data)) {
			echo json_encode('add Admin success');		
		} else {
			echo json_encode('add Admin fail');
		}
	}
 }
 
 function username_check($username) {
	if($this->user->model_userExisting($username)) {
		return false;
	}
	
	return true;
 }

 //deletes all data related to parish
 function deleteParish() {
	$this->load->library('form_validation');
	$this->form_validation->set_rules('id_parish', 'Id_parish', 'trim|required|xss_clean');

	if($this->form_validation->run() == FALSE) {
		echo json_encode('Validation run fail');
	} else {
		$parish_id = $this->input->post('id_parish');
		if($this->user->model_deleteParish($parish_id)) {
			echo json_encode('delete Parish Success');
		} else {
			echo json_encode('delete Parish Fail');		
		}
	}
 }
 
 
 function addReadings() {
 
 }
 
 function getAdmin() {
   	$this->load->library('form_validation');
	$this->form_validation->set_rules('parish_id', 'Parish_id', 'trim|required|xss_clean');

	if($this->form_validation->run() == FALSE) {
		echo json_encode('Validation run fail');
	} else {
		$parish_id = $this->input->post('parish_id');
		$data = $this->user->model_getAdmin($parish_id, 'user');
		echo json_encode($data);
	}
 }
 
}
?>
