
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include "sessionController.php";

class admin extends sessionController {
  
  function __construct()
 {
   parent::__construct();
   parent::sessionCheck();
 }
 
 function index()
 {
   if($this->session->userdata['user_data']['role'] == 2) {
	 $this->_parishhomePage();   
   } else if($this->session->userdata['user_data']['role'] == 1) {
	 $this->_generalhomePage();
   } else {
      redirect( "validate/loginPage", 'refresh');
   }
 }
 
 private function _parishhomePage() {
   $this->load->model('user','',TRUE);
   $data['parish'] = $this->user->model_getParName($this->session->userdata['user_data']['id_parish']);
   $data['parish_id'] = $this->session->userdata['user_data']['id_parish'];   
 
   $this->load->helper(array('form', 'url'));
   $this->load->view('admin/Header');
   $this->load->view('admin/parishAdmin_Homepage', $data);
 }
 
 private function _generalhomePage() {
   $this->load->helper(array('form', 'url'));
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
 

}

?>

