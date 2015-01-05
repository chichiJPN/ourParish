<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class p_functs extends CI_Controller {

 function __construct()
 {
   parent::__construct();
   $this->load->model('model_parishsite');
 }
 
 function search_massSched()
 {
	$this->load->library('form_validation');
	
	$this->form_validation->set_rules('parish', 'Parish', 'trim|required|xss_clean');
	$this->form_validation->set_rules('day', 'Day', 'trim|required|xss_clean');
	$this->form_validation->set_rules('time_start', 'Time_start', 'trim|required|xss_clean');
	$this->form_validation->set_rules('street', 'Street', 'trim|required|xss_clean');
	$this->form_validation->set_rules('barangay', 'Barangay', 'trim|required|xss_clean');
	$this->form_validation->set_rules('towncity', 'Towncity', 'trim|required|xss_clean');
	$this->form_validation->set_rules('mass-language', 'Mass-Language', 'trim|required|xss_clean');
	
	if($this->form_validation->run() == FALSE) {
		echo json_encode('validation run fail');
	} else {
		
		$data = array(
			'id_parish' => $this->input->post('parish'),
			'day' => $this->input->post('day'),
			'time_start' => $this->input->post('time_start'),
			'street' => $this->input->post('street'),
			'barangay' => $this->input->post('barangay'),
			'towncity' => $this->input->post('towncity'),
			'language' => $this->input->post('mass-language')
		);
		
		
		$searched = $this->model_parishsite->model_searchMass($data);
		echo json_encode($searched);
	}
 }
 
 function search_baptSched() {
	$this->load->library('form_validation');
	$this->form_validation->set_rules('parish_id', 'Parish_id', 'trim|required|xss_clean');
	
	if($this->form_validation->run() == FALSE) {
		echo json_encode('validation run fail');
	} else {
		
		$data = array(
			'id_parish' => $this->input->post('parish_id'),
		);
		
		
		$searched = $this->model_parishsite->model_searchBapt($data);
		echo json_encode($searched);
	}
 
 }
 
  function search_confeSched() {
	$this->load->library('form_validation');
	$this->form_validation->set_rules('parish_id', 'Parish_id', 'trim|required|xss_clean');
	
	if($this->form_validation->run() == FALSE) {
		echo json_encode('validation run fail');
	} else {
		
		$data = array(
			'id_parish' => $this->input->post('parish_id'),
		);
		
		
		$searched = $this->model_parishsite->model_searchConfe($data);
		echo json_encode($searched);
	}
 
 }
 
   function search_confiSched() {
	$this->load->library('form_validation');
	$this->form_validation->set_rules('parish_id', 'Parish_id', 'trim|required|xss_clean');
	
	if($this->form_validation->run() == FALSE) {
		echo json_encode('validation run fail');
	} else {
		
		$data = array(
			'id_parish' => $this->input->post('parish_id'),
		);
		
		
		$searched = $this->model_parishsite->model_searchConfi($data);
		echo json_encode($searched);
	} 
 }
 
  
 // for homepage calendars
 function getReading() {
	$this->load->library('form_validation');
	$this->form_validation->set_rules('date', 'Date', 'trim|required|xss_clean');
	
	if($this->form_validation->run() == FALSE) {
		echo json_encode('validation run fail');
	} else {		
		
		$this->load->helper('dir_helper');
		
		$language = '1';
		// $myFile = calc_directory($language, time());		
		// $fh = fopen($myFile, 'r');
		// $data = utf8_decode(fread($fh, filesize($myFile)));	
		// fclose($fh);		
		$data = 'afufu';
		echo $data;
		// echo $myFile;
	}

 }

}

?>