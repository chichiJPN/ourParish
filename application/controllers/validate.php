
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class validate extends CI_Controller {

 function __construct()
 {
   parent::__construct();
 }
 
  function loginPage() {
   if ( $this->session->userdata('user_data') == FALSE) {   
     $this->load->helper(array('form'));
	 $this->load->view('admin/login_view');  
   } else {
     redirect('admin/homePage', 'refresh');
  }
 }
 
 function verifyUser() {
	$this->load->model('login');
	$this->load->library('form_validation');
	$this->load->helper('url');
	$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
	$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_validate');
	
	if($this->form_validation->run() == FALSE) {
		$this->load->view('admin/login_view'); //user redirected to login page
	} else {
		//redirect('admin/homePage', 'refresh');
		redirect('admin', 'refresh');
	}
 }
 
 function validate($password) {
	$data = array(
		'username' => $this->input->post('username')
	);
	
	$data['password'] = MD5($password);
	
	if($this->login->model_verifyUser($data)) {
		$details = $this->login->model_getAdminDetails($data['username']);
		
		$data2['username'] = $this->input->post('username');
		$data2['id_parish'] = $details[0]['id_parish'];
		$data2['role'] = $details[0]['role'];
		
		$this->session->set_userdata('user_data', $data2);
		return TRUE;
	}
	else {
		$this->form_validation->set_message('validate', 'Invalid username or password');
		return FALSE;
	}
 }
 
 function logout() {
	//print_r($this->session->all_userdata());
	$this->session->unset_userdata('user_data');
	redirect('validate/loginPage', 'refresh');
 }
}

?>

