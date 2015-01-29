<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include "sessionController.php";

class generaladmin extends sessionController {

 function __construct()
 {
   parent::__construct();
   parent::sessionCheck();
   $this->load->model('user','',TRUE);
   $this->load->library('form_validation');
 }
 
 //adds parish
 function addParish() {
	$this->form_validation->set_rules('chname', 'church_name', 'trim|required|xss_clean');
	$this->form_validation->set_rules('keyword', 'Keyword', 'trim|required|xss_clean');

	if($this->form_validation->run() == FALSE) {
		echo json_encode('Validation run fail');
	} else {
		$data = array(
		   'parish' => $this->input->post('chname'),
		   'keyword' => strtolower($this->input->post('keyword'))
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
	$this->form_validation->set_rules('id_parish', 'Id_parish', 'trim|required|xss_clean');
	$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean|callback_username_check');
	$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');

	if($this->form_validation->run() == FALSE) {
		echo json_encode('Username exists or Validation run fail');
	} else {
		$data = array(
		   'username' => $this->input->post('username') ,
		   //'password' => $this->input->post('password') ,
		   'password' => MD5($this->input->post('password')) ,
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
 
 function getAdmin() {
	$this->form_validation->set_rules('parish_id', 'Parish_id', 'trim|required|xss_clean');

	if($this->form_validation->run() == FALSE) {
		echo json_encode('Validation run fail');
	} else {
	
		$parish_id = $this->input->post('parish_id');
		
		$data = $this->user->model_getAdmin($parish_id, 'user');
		
		echo json_encode($data);
		
	}
 }
 
  public function readingsCalendar() {
 
	$prefs = array (
	   'show_next_prev'  => TRUE,
	   'next_prev_url'   => '',
	   'day_type'     => 'short'
	 );

	$prefs['template'] = '

   {table_open}<table border="1" cellpadding="0" cellspacing="0">{/table_open}

   {heading_row_start}<tr>{/heading_row_start}

   {heading_previous_cell}<th><a href="javascript:void(0)" title="Go to Previous Month" id="prvCalendar" data-nextdate="{previous_url}">&lt;&lt;</a></th>{/heading_previous_cell}
   {heading_title_cell}   <th colspan="{colspan}">{heading}</th>{/heading_title_cell}
   {heading_next_cell}    <th><a href="javascript:void(0)" title="Go to Next Month" id="nextCalendar" data-nextdate="{next_url}">&gt;&gt;</a></th>{/heading_next_cell}

   {heading_row_end}</tr>{/heading_row_end}

   {week_row_start}<tr>{/week_row_start}
   {week_day_cell}<td class="noBorder">{week_day}</td>{/week_day_cell}
   {week_row_end}</tr>{/week_row_end}

   {cal_row_start}<tr>{/cal_row_start}
   {cal_cell_start}<td>{/cal_cell_start}

   {cal_cell_content}<div class="calendarCell" value="{content}">{day}</div>{/cal_cell_content}
   {cal_cell_content_today}<div class="cellHighlight calendarCell" value="{content}">{day}</div>{/cal_cell_content_today}

   {cal_cell_no_content}{day}{/cal_cell_no_content}
   {cal_cell_no_content_today}<div class="cellHighlight">{day}</div>{/cal_cell_no_content_today}

   {cal_cell_blank}&nbsp;{/cal_cell_blank}

   {cal_cell_end}</td>{/cal_cell_end}
   {cal_row_end}</tr>{/cal_row_end}

   {table_close}</table>{/table_close}
	
	';	 
	 
	$this->load->library('calendar', $prefs);
	
	$id_parish = $this->session->userdata['user_data']['id_parish'];
	$year      =  $this->uri->segment(3);
	$month	   =  $this->uri->segment(4);
	
	$num = cal_days_in_month(CAL_GREGORIAN, 8, 2003);
	
	for($var = 1 ; $var <= $num; $var++) {
		$content[$var] = $year.'-'.$month.'-'.$var;
	}
	// make churva
	
	// $data['calendar'] =  $this->calendar->generate($year, $month);
	$data['calendar'] = $this->calendar->generate($year, $month, $content);
	
	
	echo json_encode($data);
 }
 
    
  public function getReading() {
	$this->form_validation->set_rules('cellData', 'Date', 'trim|required|xss_clean');
	$this->form_validation->set_rules('language', 'Language', 'trim|required|xss_clean');
	
	if($this->form_validation->run() == FALSE) {
		echo json_encode('Validation run fail');
	} else {
		
		$this->load->helper('dir_helper');				
		
		$language = $this->input->post('language');
		$date = $this->input->post('cellData');
		$now = strtotime($date);
		
		$data['date'] = $date;
		
		$myFile = calc_directory($language, $now);
		
		$fh = fopen($myFile, 'r');
		$data['data'] = utf8_decode(fread($fh, filesize($myFile)));
		$data['path'] = $myFile;
		// $foo = fread($fh, filesize($myFile));
		// $data['path'] = $myFile;
		
		fclose($fh);
		
		echo json_encode($data);
	}
  }
  
  public function updateReading() {
	$this->form_validation->set_rules('date', 'Date', 'trim|required|xss_clean');
	$this->form_validation->set_rules('data_reading', 'text', 'trim|required|xss_clean');
	$this->form_validation->set_rules('language', 'Language', 'trim|required|xss_clean');
	
	if($this->form_validation->run() == FALSE) {
		echo json_encode('Validation run fail');
	} else {
		
		$this->load->helper('dir_helper');
		
		$text = utf8_decode($this->input->post('data_reading'));
		$date = $this->input->post('date');
		$language = $this->input->post('language');
		
		$now = strtotime($date);		
		$data['date'] = $date;
		
		$myFile = calc_directory($language, $now);
		
		$fh = fopen($myFile, 'w');
		$data['path'] = $myFile;
		// if($num = fwrite($fh, $text)) {
		if($num = fwrite($fh, $text)) {
			$data['message'] = 'Save Successful!';			
		} else {
			$data['message'] = 'An error has occurred while saving.';
		}
		fclose($fh);		
		echo json_encode($data);
	}
  
  }
}
?>
