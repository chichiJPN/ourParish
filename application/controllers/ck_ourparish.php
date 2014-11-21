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
		$id_parish = $this->session->userdata['user_data']['id_parish'];		
		$data['name_parish'] = $this->ck_db->model_getParishName($id_parish);
		$data['keyword'] = $this->ck_db->model_getKeyword($id_parish);		
		$this->load->view("ck/news_page",$data);
	}
	

	public function showpage() {
		$this->load->helper('url');
		$id_parish = $this->session->userdata['user_data']['id_parish'];
		
		$data['page'] = $this->ck_db->getPage($id_parish);
		$data['name_parish'] = $this->ck_db->model_getParishName($id_parish);
		$data['keyword'] = $this->ck_db->model_getKeyword($id_parish);		
		$this->load->view("ck/create_page",$data);
	}

	function showHeader()
	{
		$id_parish = $this->session->userdata['user_data']['id_parish'];		
		$data = $this->ck_db->getPage($id_parish);
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
	
	function updateDescription() {
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
	
	function updateNews() {
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
	
	function loadDirectories() {
		$this->load->helper('directory');
		$id_parish = $this->session->userdata['user_data']['id_parish'];		
		$keyword = $this->ck_db->model_getKeyword($id_parish);		
		$data['directory'] = directory_map('././html_attrib/parishStyles/images/parish_images/'.$keyword[0]->keyword, 1);
		echo json_encode($data);
	}
	
	function addDirectory() {
		$this->load->library('form_validation');
		$this->form_validation->set_rules('folderName', 'FolderName', 'trim|required|xss_clean');
		
		if($this->form_validation->run() == FALSE) {
			echo json_encode('validation run fail');
		} else {
			
			$array = [' ','/','\\',':','*','?','"','?','<','>'];
			$folderName = str_replace($array,"_",$this->input->post('folderName'));			
			$data = $this->ck_db->model_getKeyword($this->session->userdata['user_data']['id_parish']);

			$path = "././html_attrib/parishStyles/images/parish_images/".$data[0]->keyword.'/'.$folderName.'/';

			if(!is_dir($path) && mkdir( $path, 0777, true )) {
				echo json_encode('success');
			} else {
				echo json_encode('fail');
			}
		}
	}
	
	function renameDirectory() {
		$this->load->library('form_validation');
		$this->form_validation->set_rules('oldFolderName', 'OldFolderName', 'trim|required|xss_clean');
		$this->form_validation->set_rules('newFolderName', 'NewFolderName', 'trim|required|xss_clean');
		
		if($this->form_validation->run() == FALSE) {
			echo json_encode('Invalid Data');
		} else {
			$oldFolderName = $this->input->post('oldFolderName');
			$newFolderName = $this->input->post('newFolderName');
			$keyword = $this->ck_db->model_getKeyword($this->session->userdata['user_data']['id_parish']);
			$path = "././html_attrib/parishStyles/images/parish_images/".$keyword[0]->keyword.'/';
			
			$data['boolean'] = true;
			
			if(is_dir($path.$newFolderName)) {
				$data['message'] = $newFolderName.' already exists';			
				$data['boolean'] = false;
			} else if(!is_dir($path.$oldFolderName)) {
				$data['message'] = 'Folder name "'.$oldFolderName.'" does not exist';
				$data['boolean'] = false;
			}
			
			if($data['boolean'] === true && rename($path.$oldFolderName, $path.$newFolderName)) {
				$data['message'] = 'Folder rename successful';
				$data['boolean'] = true;				
			}
			$data['path'] = $path;
			echo json_encode($data);
			
		}	
	}
	
	function removeDirectory() {
		$this->load->library('form_validation');
		$this->form_validation->set_rules('folderName', 'FolderName', 'trim|required|xss_clean');
		
		if($this->form_validation->run() == FALSE) {
			echo json_encode('validation run fail');
		} else {
			
			$folderName = $this->input->post('folderName');			
			$data = $this->ck_db->model_getKeyword($this->session->userdata['user_data']['id_parish']);
			$path = "././html_attrib/parishStyles/images/parish_images/".$data[0]->keyword.'/'.$folderName.'/';

			if(is_dir($path) && $this->deleteFiles($path)) {					
			
				echo json_encode('success');
			} else {
				echo json_encode('folder not found');
			}
		}	
	}
	
	function deleteFiles($path) {
		if (is_dir($path) === true)
		{
			$files = array_diff(scandir($path), array('.', '..'));

			foreach ($files as $file)
			{
				$this->deleteFiles(realpath($path) . '/' . $file);
			}

			return rmdir($path);
		}

		else if (is_file($path) === true)
		{
			return unlink($path);
		}

		return false;
	}
	
	function imageDirectoryPage() {
		$id_parish = $this->session->userdata['user_data']['id_parish'];		
		$data['name_parish'] = $this->ck_db->model_getParishName($id_parish);
		$data['keyword'] = $this->ck_db->model_getKeyword($id_parish);		
		$this->load->view("ck/imageDirectory_page",$data);
	}
	
	function imagesPage() {
		$this->load->helper('directory');
		$this->load->helper('form');
	    $directoryName = $this->uri->segment(3);

		$forbidden = '/\:*?"<>|';
		// check for / \ : * ? " < > |
		
		$id_parish = $this->session->userdata['user_data']['id_parish'];		
		$keyword = $this->ck_db->model_getKeyword($id_parish);
		$path = "././html_attrib/parishStyles/images/parish_images/".$keyword[0]->keyword.'/'.$directoryName.'/';
		
		if(is_dir($path))
		{
			$data['keyword'] = $keyword;		
			$data['name_parish'] = $this->ck_db->model_getParishName($id_parish);
			$data['list'] = directory_map($path, 1);
			$data['directoryName'] = $directoryName;
			//return a list of all images in directory
			//loads view with data to 'images_page.php'
			// $this->load->view("ck/images_page",$data);
			$this->load->view("ck/images_page", $data);
			
		}
		else
		{
			echo 'page not found';
			//load view with a 'directory not found message'
		}
		
	}
	
	function deleteImage() {
		$this->load->library('form_validation');
		$this->form_validation->set_rules('imageURL', 'ImageURL', 'trim|required|xss_clean');
		
		if($this->form_validation->run() == FALSE) {
			echo json_encode('Inputs are invalid');
		} else {
		
			$path = str_replace(base_url(), "", $this->input->post('imageURL'));
			
			// echo json_encode('./'.$path);
			
			if(unlink('./'.$path)) {
				echo json_encode('delete Successful');				
			} else {
				echo json_encode('an error occurred while deleting');
			}
		}
	}
	
	function addImage() {
		
		$file_element_name = 'imageUpload';
		$directoryName = $_POST['directoryName'];

		$id_parish = $this->session->userdata['user_data']['id_parish'];		
		$keyword = $this->ck_db->model_getKeyword($id_parish);		

		$config['upload_path'] = './html_attrib/parishStyles/images/parish_images/'.$keyword[0]->keyword.'/'.$directoryName;
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '2048';
		$config['encrypt_name']	= true;
		
		
		$this->load->library('upload', $config);

		if (!$this->upload->do_upload($file_element_name)) {			
			$data['boolean'] = false;
			// $this->load->view('upload_form', $error);
		} else {
			$data['boolean'] = true;
			$data['data'] = $this->upload->data();
			$data['directoryName'] = $directoryName;
			$data['keyword'] = $keyword[0]->keyword;
			//$data = array('upload_data' => $this->upload->data());
			// $this->load->view('upload_success', $data);
		}
		
		echo json_encode($data);
	}
	
}
