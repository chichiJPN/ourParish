<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include "sessionController.php";

class parishadmin extends sessionController {

 function __construct()
 {
   parent::__construct();
   parent::sessionCheck();
   $this->load->model('user','',TRUE);
 }
 
 function deleteBaptism() {
	$this->deleteData('baptism_schedule');
 }
 
 function deleteConfession() {
	$this->deleteData('confession_schedule');
 }
 
 function deleteConfirmation() {
	$this->deleteData('confirmation_schedule');
 }
 
 function deleteMass() {
	$this->deleteData('mass_schedule');
 }
 

 
 //deletes data
 function deleteData($database) {
    $this->load->library('form_validation');
   
	$this->form_validation->set_rules('sched_id', 'Sched_id', 'trim|required|xss_clean');
	
	if($this->form_validation->run() == FALSE) {
		echo json_encode('Validation run fail');
    } 
	else
	{		
		$data = array(
			'id_'.$database => $this->input->post('sched_id'),
			'id_parish' => $this->session->userdata['user_data']['id_parish']
		);
		if($this->user->model_deleteSched($database, $data))
		{
			echo json_encode('success');
		}
	}
 }
 
  /* baptism, confession, confirmation and mass schedules have
     almost the same parameters*/
  function insertBaptism() {
	$this->insertData('baptism_schedule',false);

 }
 
 function insertConfession() {
	$this->insertData('confession_schedule',false);
 }
 
 function insertConfirmation() {
	$this->insertData('confirmation_schedule', false);
 }
 
 function insertMass() {
 	$this->insertData('mass_schedule', true);
 }
 
 //inserts data
 function insertData($database, $boolean) {
	$this->load->library('form_validation');

	$this->form_validation->set_rules('day', 'Day', 'trim|required|xss_clean');
	$this->form_validation->set_rules('time_start', 'Time_start', 'trim|required|xss_clean');
	$this->form_validation->set_rules('time_end', 'Time_end', 'trim|required|xss_clean');

	if($boolean == TRUE) {
		$this->form_validation->set_rules('language', 'Language', 'trim|required|xss_clean');
	}
	
	if($this->form_validation->run() == FALSE) {
		echo json_encode('validation run fail');
	} else {
		$data = array(
			'id_parish' => $this->session->userdata['user_data']['id_parish'],
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
 
 function updateBaptism() {
	$this->updateData('baptism_schedule', false); 
 }	
 
 function updateConfession() {
	$this->updateData('confession_schedule', false); 
 }
 
 function updateConfirmation() {
	$this->updateData('confirmation_schedule', false); 
 }
 
 function updateMass() {
	$this->updateData('mass_schedule', true);
 }
 
 //updates data
 function updateData($database, $boolean) {
 	$this->load->library('form_validation');
	$this->form_validation->set_rules('day', 'Day', 'trim|required|xss_clean');
	$this->form_validation->set_rules('time_start', 'Time_start', 'trim|required|xss_clean');
	$this->form_validation->set_rules('time_end', 'Time_end', 'trim|required|xss_clean');
	$this->form_validation->set_rules('sched_id', 'Sched_id', 'trim|required|xss_clean');

	if($boolean == true) {
		$this->form_validation->set_rules('language', 'Language', 'trim|required|xss_clean');		
	}
	
	if($this->form_validation->run() == FALSE) {
		echo json_encode('Validation run Fail');
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
			'parish_id' => $this->session->userdata['user_data']['id_parish'],
			'sched_id' => $this->input->post('sched_id')
		);
	
		
		if($this->user->model_updateSched($ids, $data, $database)) {
			echo json_encode('update success');
		} else {
			echo json_encode('update fail');
		}
	}
 }
 
 
 
 function schedulesBaptism() {
	$this->getSchedules('baptism_schedule');
 }

 function schedulesConfession() {
	$this->getSchedules('confession_schedule');
 }

 function schedulesConfirmation() {
	$this->getSchedules('confirmation_schedule');
 }

 function schedulesMass() {
	$this->getSchedules('mass_schedule');
 }

 function schedulesReading() {
	$this->getSchedules('reading');
 }

 //gets all schedules of all parishes from specified table
 function getSchedules($database){
 

		$parish_id = $this->session->userdata['user_data']['id_parish'];
		
		$data = $this->user->model_getAllSchedules($parish_id, $database);
		echo json_encode($data);
 }

 
 
 function viewBaptism() {
	$this->viewParishData('baptism_schedule');
 }

 function viewConfession() {
	$this->viewParishData('confession_schedule');
 }

 function viewConfirmation() {
	$this->viewParishData('confirmation_schedule');
 }

 function viewMass() {
	$this->viewParishData('mass_schedule');
 }

 function viewReading() {
	$this->viewParishData('reading');
 }

 //gets all schedules of specified parish from specified table
 function viewParishData($database) {
 
	$parish_id = $this->session->userdata['user_data']['id_parish'];
	$this->user->model_update($parish_id);
	
 }

 function getParishes(){
   //This method will have the credentials validation
	$data = $this->user->model_getParishes();
	echo json_encode($data);
 }
 
  function getLocations() {
	$data['barangay'] = $this->user->model_getLocations('barangay');
	$data['street'] = $this->user->model_getLocations('street');
	$data['towncity'] = $this->user->model_getLocations('towncity');
	echo json_encode($data);	
 }
 
 function editLocation() {
	$this->load->library('form_validation');
	$this->form_validation->set_rules('street', 'Street', 'trim|required|xss_clean');
	$this->form_validation->set_rules('barangay', 'Barangay', 'trim|required|xss_clean');
	$this->form_validation->set_rules('town', 'Town', 'trim|required|xss_clean');
	$this->form_validation->set_rules('tnumber', 'Tnumber', 'trim|required|xss_clean');
	
	if($this->form_validation->run() == FALSE) {
		return;
	} else {
		$data = array(
			'street' => $this->input->post('street'),
			'barangay' => $this->input->post('barangay'), 
			'towncity' => $this->input->post('town'),
			'Tnumber' => $this->input->post('tnumber')
		);

		$parish_id = $this->session->userdata['user_data']['id_parish'];
		
		if($this->user->model_editLocation($parish_id, $data)) {
			echo json_encode('edit successful');		
		} else {
			echo json_encode('edit unsuccessful');		
		}
	}
 }
 
 function updateCover() {
    $msg = "";
    $file_element_name = 'imageUpload';
	$imageID = $_POST['imageID'];
	$parish_id = $this->session->userdata['user_data']['id_parish'];
	$failure = TRUE;

	$config['upload_path'] ='./html_attrib/parishStyles/images/parishcovers/';
	$config['allowed_types'] = 'jpg|jpeg|png|gif';
	$config['max_size'] = 1024 * 8;
	//$config['encrypt_name'] = TRUE; //encrypts the filename
	
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
					$msg = $msg.' updated image ID '.$imageID.' to '.$fileArray[0].$fileArray[1].' in db function 2';
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

 function getParDetails() {
	$data = array(
		'parish_id' => $this->session->userdata['user_data']['id_parish']
	);	
	
	$details['details'] = $this->user->model_getParDetails($data);
	//print_r($details);
	echo json_encode($details);		

 }
 
 
 
  function PadminCalendar() {
 
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

   {cal_cell_content}<div class="cellContent calendarCell" value="{content}">{day}</div>{/cal_cell_content}
   {cal_cell_content_today}<div class="cellContent cellHighlight calendarCell" value="{content}">{day}</div>{/cal_cell_content_today}

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
	
	$data['News'] = $this->user->model_getNewsData($id_parish, $year, $month);
	
	if($data['News'] == false) {	
		$data['calendar'] =  $this->calendar->generate($year, $month);
	} else {
		$data['calendar'] = $this->calendar->generate($year, $month, $data['News']);
	}
	
	echo json_encode($data);
 }
 
 function getCalendarCellData() {
	$this->load->library('form_validation');
	$this->form_validation->set_rules('cellData', 'CellData', 'trim|required|xss_clean');

	if($this->form_validation->run() == FALSE) {
		return;
	} else {
		$date = $this->input->post('cellData');
		$id_parish = $this->session->userdata['user_data']['id_parish'];
		
		$data = $this->user->model_getCalendarCellData($date, $id_parish);
		echo json_encode($data);
	}	
 }
 
 function addNewsDate() {
 	$this->load->library('form_validation');
	$this->form_validation->set_rules('modalDate', 'ModalDate', 'trim|required|xss_clean');

	if($this->form_validation->run() == FALSE) {
		echo json_encode('form validation error');
	} else {
		$data = array(
			'date' => $this->input->post('modalDate'),
			'title' => NULL,
			'content' => NULL,
			'id_parish' => $this->session->userdata['user_data']['id_parish']
		);
		
		echo json_encode($this->user->model_addNewsDate($data));
	}
 }
 
 function deleteNews() {
 	$this->load->library('form_validation');
	$this->form_validation->set_rules('date', 'Date', 'trim|required|xss_clean');
	// $this->form_validation->set_rules('title', 'Title', 'trim|xss_clean');
	if($this->form_validation->run() == FALSE) {
		echo json_encode('form validation error');
	} else {
	
		// if($this->input->post('title') == '') $title = NULL;
		// else $title = $this->input->post('title');
		
		$data = array(
			'date' => $this->input->post('date'),
			// 'title' => $title,
			'id_parish' => $this->session->userdata['user_data']['id_parish']
		);
		
		// echo json_encode($title);
		echo json_encode($this->user->model_deleteNews($data));
	}
 
 }
}
?>
