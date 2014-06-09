<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ck_Ourparish extends CI_Controller {

	public function index()
	{
		$this->showpage();
	}

	public function showpage()
	{
		$id='1';
		$pagename='HOME';
		$this->load->model("ck_db");
		$data['page'] = $this->ck_db->getPage($id);
		$data['description'] = $this->ck_db->getDescription($id,$pagename);
		$this->load->view("ck/create_page",$data);
	}

	public function addPage()
	{
		$this->load->model("ck_db");
		$this->load->library('form_validation');
		$this->form_validation->set_rules('pagename', 'Pagename', 'trim|required|xss_clean');
		if($this->form_validation->run() == FALSE) {
			echo json_encode('Validation run fail');
		} else {
			$data = array(
			   'page_name' => $this->input->post('pagename') ,
			   'id_parish' => '1',
			   'description' => NULL
			);
			
			if($this->ck_db->pageAdd($data)) {

			} else {
				echo json_encode('add Page fail');
			}
		}
	}

	public function selectPage()
	{
		$this->load->model("ck_db");
		$this->load->library('form_validation');
		$this->form_validation->set_rules('page', 'Page', 'trim|required|xss_clean');

		if($this->form_validation->run() == FALSE) {
			echo json_encode('Validation run fail');
		} else {
			$page = $this->input->post('page');
			$data = $this->ck_db->getDescription('1',$page);
			echo json_encode($data);
		}	
	}

	public function updateDescription()
	{
		$this->load->model("ck_db");
		$this->load->library('form_validation');
		$this->form_validation->set_rules('page', 'Page', 'trim|required|xss_clean');

		if($this->form_validation->run() == FALSE) {
			echo json_encode('Validation run fail');
		} else {
			$page = $this->input->post('page');
			$data = $this->ck_db->getDescription('1',$page);
			echo json_encode($data);
		}	
	}
}
