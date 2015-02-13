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
 
  public function getParDetails() {
	$this->load->library('form_validation');
	$this->form_validation->set_rules('parish_id', 'Parish ID', 'trim|required|xss_clean');
	
	if($this->form_validation->run() == FALSE) {
		return;
	} else {
		$data = array(
			'parish_id' => $this->input->post('parish_id')
		);
		
		$details['details'] = $this->user->model_getParDetails($data);
		
		echo json_encode($details);
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
  
  function editLocation() {
	$this->load->library('form_validation');
	$this->form_validation->set_rules('street', 'Street', 'trim|required|xss_clean');
	$this->form_validation->set_rules('barangay', 'Barangay', 'trim|required|xss_clean');
	$this->form_validation->set_rules('town', 'Town', 'trim|required|xss_clean');
	$this->form_validation->set_rules('tnumber', 'Tnumber', 'trim|required|xss_clean');
	$this->form_validation->set_rules('parish_id', 'Parish ID', 'trim|required|xss_clean');
	$this->form_validation->set_rules('description', 'Description', 'trim|required|xss_clean');
	
	if($this->form_validation->run() == FALSE) {
		return;
	} else {
		$data = array(
			'street' => $this->input->post('street'),
			'barangay' => $this->input->post('barangay'), 
			'towncity' => $this->input->post('town'),
			'Tnumber' => $this->input->post('tnumber'),
			'description' => $this->input->post('description')
		);

		$parish_id = $this->input->post('parish_id');
		
		if($this->user->model_editLocation($parish_id, $data)) {
			echo json_encode('edit successful');		
		} else {
			echo json_encode('edit unsuccessful');		
		}
	}
 }
 
 function deleteBaptism() { $this->deleteData('baptism_schedule'); }
 function deleteConfession() { $this->deleteData('confession_schedule'); }
 function deleteConfirmation() { $this->deleteData('confirmation_schedule'); }
 function deleteMass() { $this->deleteData('mass_schedule');}
 
 //deletes data
 function deleteData($database) {
    $this->load->library('form_validation');
   
	$this->form_validation->set_rules('sched_id', 'Sched_id', 'trim|required|xss_clean');
	$this->form_validation->set_rules('parish_id', 'Parish ID', 'trim|required|xss_clean');
	
	if($this->form_validation->run() == FALSE) {
		echo json_encode(validation_errors());
    } 
	else
	{		
		$data = array(
			'id_'.$database => $this->input->post('sched_id'),
			'id_parish' => $this->input->post('parish_id')
			// 'id_parish' => $this->session->userdata['user_data']['id_parish']
		);
		if($this->user->model_deleteSched($database, $data))
		{
			echo json_encode('success');
		}
	}
 }

 function insertBaptism() {$this->insertData('baptism_schedule',false);} 
 function insertConfession() {$this->insertData('confession_schedule',false);} 
 function insertConfirmation() {$this->insertData('confirmation_schedule', false);} 
 function insertMass() { $this->insertData('mass_schedule', true);}
 
 //inserts data
 function insertData($database, $boolean) {
	$this->load->library('form_validation');

	$this->form_validation->set_rules('day', 'Day', 'trim|required|xss_clean');
	$this->form_validation->set_rules('time_start', 'Time_start', 'trim|required|xss_clean');
	$this->form_validation->set_rules('time_end', 'Time_end', 'trim|required|xss_clean');
	$this->form_validation->set_rules('parish_id', 'Parish ID', 'trim|required|xss_clean');

	if($boolean == TRUE) {
		$this->form_validation->set_rules('language', 'Language', 'trim|required|xss_clean');
	}
	
	if($this->form_validation->run() == FALSE) {
		echo json_encode(validation_errors());
	} else {
		$data = array(
			'id_parish' => $this->input->post('parish_id'),
			// 'id_parish' => $this->session->userdata['user_data']['id_parish'],
			'day' => $this->input->post('day'),
			'time_start' => $this->input->post('time_start'), 
			'time_end' => $this->input->post('time_end')
		);
		
		if($boolean == TRUE) {
			$data['language'] = $this->input->post('language');
		}
		
		if($this->user->model_insert($data, $database)) {			
			echo json_encode('insert Successful');
		}
	}
}

 function updateBaptism() { $this->updateData('baptism_schedule', false); }
 function updateConfession() { $this->updateData('confession_schedule', false); }
 function updateConfirmation() { $this->updateData('confirmation_schedule', false); }
 function updateMass() { $this->updateData('mass_schedule', true); }
 
 //updates data
 function updateData($database, $boolean) {
 	$this->load->library('form_validation');
	$this->form_validation->set_rules('day', 'Day', 'trim|required|xss_clean');
	$this->form_validation->set_rules('time_start', 'Time_start', 'trim|required|xss_clean');
	$this->form_validation->set_rules('time_end', 'Time_end', 'trim|required|xss_clean');
	$this->form_validation->set_rules('sched_id', 'Sched_id', 'trim|required|xss_clean');
	$this->form_validation->set_rules('parish_id', 'Parish ID', 'trim|required|xss_clean');

	if($boolean == true) {
		$this->form_validation->set_rules('language', 'Language', 'trim|required|xss_clean');		
	}
	
	if($this->form_validation->run() == FALSE) {
		echo json_encode(validation_errors());
	} else {
		$data = array(
			'day' => $this->input->post('day'),
			'time_start' => $this->input->post('time_start'),
			'time_end' => $this->input->post('time_end')
		);
		
		if($boolean == true) {
			$data['language'] = $this->input->post('language');
		}
		
		$ids= array(
			'parish_id' => $this->input->post('parish_id'),
			// 'parish_id' => $this->session->userdata['user_data']['id_parish'],
			'sched_id' => $this->input->post('sched_id')
		);
	
		
		if($this->user->model_updateSched($ids, $data, $database)) {
			echo json_encode('update success');
		} else {
			echo json_encode('update fail');
		}
	}
 }
 
  function updateCover() {
    $msg = "";
    $file_element_name = 'imageUpload';
	$imageID = $_POST['imageID'];
	$parish_id = $_POST['parish_id'];
	// $parish_id = $this->session->userdata['user_data']['id_parish'];
	$failure = TRUE;

	$config['upload_path'] ='./html_attrib/parishStyles/images/parishcovers/';
	$config['allowed_types'] = 'jpg|jpeg|png|gif';
	$config['max_size'] = 1024 * 8;
	$config['encrypt_name'] = TRUE; //encrypts the filename
	
	$this->load->library('upload', $config);

	//adds picture to folder
	if (!$this->upload->do_upload($file_element_name)) {
		$msg = $this->upload->display_errors('', '');
	} else {
		$data = $this->upload->data();

		$fileArray = explode(".", $data['file_name']);

		$fileNeim = array(
			'filename'      => $fileArray[0],
			'ext'           => $fileArray[1]
		);
		
		// if picture is default
		if($imageID == 1) {
			// insert image name into db		
			if($this->user->model_insertImg($fileNeim))
			{
				$msg = $msg.'uploaded '.$fileArray[0].$fileArray[1].' to db';
				$id = $this->user->model_getMaxImgID(); // gets Id of most recent image entry

				// update image ID column in 'parish' table
				if($this->user->model_updateParishImgID($id, $parish_id)) {
					$msg = $msg." updated parish id to ".$id;	
					$failure = false;
				}
			}
		// if picture was already changed and you want to change it aggain	
		} else {
			$query = $this->user->model_getImageName($imageID);
			
			//deletes picture in folder
			$path = "./html_attrib/parishStyles/images/parishcovers/".$query[0]->filename.'.'.$query[0]->ext;
						
			if(unlink($path)) {
				$msg = $msg.'deleted file '.$query[0]->filename.'.'.$query[0]->ext;
				//updates name of parishes current image
				if($this->user->model_updateImgName($fileNeim, $imageID)) {
					// $msg = $msg.' updated image ID '.$imageID.' to '.$fileArray[0].$fileArray[1].' in db function 2';
					$msg = 'Save successful!';
					$failure = false;
				}
			}			
		}
		
		if($failure == TRUE) {
			unlink($data['full_path']);
			$msg = "Something went wrong when saving the file, please try again.";			
		}
	}
	@unlink($_FILES[$file_element_name]);

    echo json_encode($msg);	
 }
  
 
 
 }
?>
