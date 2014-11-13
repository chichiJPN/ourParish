<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include "sessionController.php";

class ck_Ourparish extends sessionController {


	function __construct()
	{
	  parent::__construct();
	  parent::sessionCheck();
	  $this->load->model("ck_db");
	}
	 
	public function index()
	{
		
		$this->showpage();
	}
	
	function newsPage() {
		
		$this->load->helper('url');
		$id_parish = $this->session->userdata['user_data']['id_parish'];
		
		$data['name_parish'] = $this->ck_db->model_getParishName($id_parish);
		$data['id_parish'] = $id_parish;
		$data['keyword'] = $this->ck_db->model_getKeyword($id_parish);		
		$this->load->view("ck/news_page",$data);
		
	}
	
	public function showpage()
	{

		$this->load->helper('url');
		$id_parish = $this->session->userdata['user_data']['id_parish'];
		
		$data['page'] = $this->ck_db->getPage($id_parish);
		$data['name_parish'] = $this->ck_db->model_getParishName($id_parish);
		$data['id_parish'] = $id_parish;
		$data['keyword'] = $this->ck_db->model_getKeyword($id_parish);		
		$this->load->view("ck/create_page",$data);
	}

	function showHeader()
	{
		$id = $this->session->userdata['user_data']['id_parish'];		
		$data = $this->ck_db->getPage($id);
		echo json_encode($data);
	}
	
	function updateUrl() {
		$this->load->library('form_validation');
		$this->form_validation->set_rules('page', 'Page', 'trim|required|xss_clean');
		$this->form_validation->set_rules('keyword', 'Keyword', 'trim|required|xss_clean');
		
		if($this->form_validation->run() == FALSE) {
			echo json_encode('Validation run fail');
		} else {
			$keyword = $this->input->post('keyword');
			$page = $this->input->post('page');
			$id_parish = $this->session->userdata['user_data']['id_parish'];
			$data = array(
			   'url' => base_url().'index.php/parish/index/'.$keyword.'/'.$page
			);
			
			if($this->ck_db->model_updateUrl($data, $id_parish)) {
				echo json_encode('success');
			} else {
				echo json_encode('update fail');
			}
		}
	
	}
	
	function addPage()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('pagename', 'Pagename', 'trim|required|xss_clean');
		if($this->form_validation->run() == FALSE) {
			echo json_encode('Validation run fail');
		} else {
			$data = array(
			   'page_name' => $this->input->post('pagename') ,
			   'id_parish' => $this->session->userdata['user_data']['id_parish'],
			   'description' => NULL
			);
			
			if($this->ck_db->pageAdd($data)) {
				echo json_encode('success');
			} else {
				echo json_encode('add Page fail');
			}
		}
	}

	function selectPage()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('page', 'Page', 'trim|required|xss_clean');
		if($this->form_validation->run() == FALSE) {
			echo json_encode('Validation run fail');
		} else {
			$page = $this->input->post('page');		    
			$data = $this->ck_db->getDescription($this->session->userdata['user_data']['id_parish'],$page);
			echo json_encode($data);
		}	
	}

	function deletePage() {
		$this->load->library('form_validation');
		$this->form_validation->set_rules('page', 'Page', 'trim|required|xss_clean');
	
		if($this->form_validation->run() == FALSE) {
			echo json_encode('Validation run fail');
		} else {
			$data = array(
			   'page_name' => $this->input->post('page')
			);
			
			$id_parish = $this->input->post('id_parish');
			if($this->ck_db->model_deletePage($data, $this->session->userdata['user_data']['id_parish'])) {
				echo json_encode('delete success');		
			} else {
				echo json_encode('delete fail');
			}
		}
	}

	function updatePage()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('pagename', 'Pagename', 'trim|required|xss_clean');
		$this->form_validation->set_rules('id_page', 'Id_Page', 'trim|required|xss_clean');
			
	
		if($this->form_validation->run() == FALSE) {
			echo json_encode('Validation run fail');
		} else {
			$page = array(
			   'page_name' => $this->input->post('pagename') 			   
			);
			$id = $this->input->post('id_page');
			$data = $this->ck_db->model_updatePage($id,$this->session->userdata['user_data']['id_parish'],$page);
			echo json_encode($data);
		}		
	}

	function renamePage()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('page', 'Page', 'trim|required|xss_clean');
	
		if($this->form_validation->run() == FALSE) {
			echo json_encode('Validation run fail');
		} else {
			$page = $this->input->post('page'); 			   
			$data = $this->ck_db->model_selectIdPage($this->session->userdata['user_data']['id_parish'],$page);
			echo json_encode($data);
		}		
	}
	
	function updateDescription()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('datavalue', 'Datavalue', 'trim|required');
		$this->form_validation->set_rules('activepage', 'Activepage', 'trim|required|xss_clean');
		
		if($this->form_validation->run() == FALSE) {
			echo json_encode('validation run fail');
		} else {
			$description = $this->input->post('datavalue');
			$dd = array(
               'description' => $description,
            );
			$id_parish = $this->session->userdata['user_data']['id_parish'];

			$page = $this->input->post('activepage');
			if($this->ck_db->model_updateDescription($page,$dd, $id_parish)) {
				echo json_encode('update success');
			}
		}
	}
	
	function updateNews()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('datavalue', 'Datavalue', 'trim|required');
		$this->form_validation->set_rules('title', 'Title', 'trim|required|xss_clean');
		$this->form_validation->set_rules('date', 'Date', 'trim|required|xss_clean');
		
		if($this->form_validation->run() == FALSE) {
			echo json_encode('validation run fail');
		} else {
			$data = array(
               'content' => $this->input->post('datavalue'),
               'title' => $this->input->post('title')
            );
			
			$id_parish = $this->session->userdata['user_data']['id_parish'];
			$date = $this->input->post('date');

			if ($this->ck_db->model_updateNews($date, $id_parish, $data)) {
				echo json_encode('Update Successful!');
			} else {
				echo json_encode('An error has occurred while updating. Please try again.');
			}
		}
	}
}
