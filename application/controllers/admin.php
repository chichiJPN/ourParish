
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class admin extends CI_Controller {

 function __construct()
 {
   parent::__construct();
 }

 
 
 function index()
 {
   $this->loginPage();
 }
 
 function loginPage() {
   $this->load->view('admin/login_view'); 
 }
 
 function homePage() {
 
   $this->load->view('admin/Header');
   $this->load->view('admin/Admin_Homepage');
 }
 
 function confirmation()
 {
   $this->load->helper('url');
   $data['parish_id'] = $this->uri->segment(3);
   $this->load->view('admin/Admin_Confirmation',$data);	
 }

  function mass()
 {
   $this->load->helper('url');
   $data['parish_id'] = $this->uri->segment(3);
   $this->load->view('admin/Admin_Mass',$data);	
 }

  function confession()
 {
   $this->load->helper('url');
   $data['parish_id'] = $this->uri->segment(3);
   $this->load->view('admin/Admin_Confession',$data);	
 }
 
 function baptism()
 {
   $this->load->helper('url');
   $data['parish_id'] = $this->uri->segment(3);
   $this->load->view('admin/Admin_Baptism',$data);
 }
 
 function updateForm()
 {
    $this->load->helper('url');
    $data['sched_id'] = $this->uri->segment(3);
	$this->load->view('admin/UpdateForm',$data);
 }
 
 function updateFormL()
 {
    $this->load->helper('url');
    $data['sched_id'] = $this->uri->segment(3);
	$this->load->view('admin/UpdateFormL', $data);
 }
 
 function verifyUser() {
	$this->load->model('login');
	$this->load->library('form_validation');
	$this->load->helper('url');
	$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
	$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
	
	if($this->form_validation->run() == FALSE) {
		echo json_encode('validation run fail');
	} else {
	
		$data = array(
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password')
		);
		
		if($this->login->model_verifyUser($data)) {
			echo json_encode('success');
		}
		else {
			echo json_encode('Invalid Username or Password');
		}
	}
 }
}

?>

