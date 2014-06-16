<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class parishadmin extends CI_Controller {

 function __construct()
 {
   parent::__construct();
   $this->load->model('user','',TRUE);
   // $this->load->helper('session_helper');
  // if(!inSession()) {
	// redirect('admin/loginPage', 'refresh');
   // }
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
 
 function deleteReading() {
	$this->deleteData('reading');
 }
 
 //deletes data
 function deleteData($database) {
    $this->load->library('form_validation');
   
 	$this->form_validation->set_rules('parish_id', 'Parish_id', 'trim|required|xss_clean');
 	$this->form_validation->set_rules('sched_id', 'Sched_id', 'trim|required|xss_clean');
	
	if($this->form_validation->run() == FALSE) {
		echo json_encode('Validation run fail');
    } 
	else 
	{		
		$data = array(
			'id_'.$database => $this->input->post('sched_id'),
			'id_parish' => $this->input->post('parish_id')
		);
		if($this->user->model_deleteSched($database, $data))
		{
			echo json_encode('success');
		}
	}
 }
 
 
 
 function insertReading() {
 
	$this->load->library('form_validation');
	
	$this->form_validation->set_rules('date', 'Date', 'trim|required|xss_clean');
	$this->form_validation->set_rules('language', 'Language', 'trim|xss_clean');
	
	if($this->form_validation->run() == FALSE) {
		echo json_encode('validation run fail');
	} else {
		
		$data = array(
			'date' => $this->input->post('date'),
			'language' => $this->input->post('language')
		);
		
		if($this->user->model_insert($data, $database)) {			
			echo json_encode('insert Successful');
		}
		else {
			echo json_encode('insert fail');
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
	$this->form_validation->set_rules('parish_id', 'Parish_id', 'trim|required|xss_clean');
	
	if($boolean == TRUE) {
		$this->form_validation->set_rules('language', 'Language', 'trim|required|xss_clean');
	}
	
	if($this->form_validation->run() == FALSE) {
		echo json_encode('validation run fail');
	} else {
		$data = array(
			'id_parish' => $this->input->post('parish_id') ,
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
	$this->form_validation->set_rules('parish_id', 'Parish_id', 'trim|required|xss_clean');
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
			'parish_id' => $this->input->post('parish_id'),
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
 
 	$this->load->library('form_validation');
	$this->form_validation->set_rules('parish_id', 'Parish_id', 'trim|required|xss_clean');
	
	if($this->form_validation->run() == FALSE) {
		echo json_encode('validation fail');
	} else {
		
		$parish_id = $this->input->post('parish_id');
		
		$data = $this->user->model_getAllSchedules($parish_id, $database);
		echo json_encode($data);
	}
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
 
  	$this->load->library('form_validation');
	$this->form_validation->set_rules('parish_id', 'Parish_id', 'trim|required|xss_clean');

	if($this->form_validation->run() == FALSE) {
		return;
	} else {
		$parish_id = $this->input->post('parish_id');
		$this->user->model_update($parish_id);
	}
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
	$this->form_validation->set_rules('parish_id', 'Parish_id', 'trim|required|xss_clean');
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

		$parish_id = $this->input->post('parish_id');
		
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
	$parish_id = $_POST['parish_id'];
	$failure = TRUE;

	$config['upload_path'] ='./html_attrib/parishStyles/images/parishcovers/';
	$config['allowed_types'] = 'jpg|jpeg|png|gif';
	$config['max_size'] = 1024 * 8;
	//$config['encrypt_name'] = TRUE; //encrypts the filename
	
	$this->load->library('upload', $config);

	//adds picture to folder
	if (!$this->upload->do_upload($file_element_name)) {
		$msg = $this->upload->display_errors('', '');
	}
	else
	{
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
				//updates name of parishes current image
				if($this->user->model_updateImgName($fileNeim, $imageID)) {
					$msg = $msg.'updated '.$fileArray[0].$fileArray[1].' in db';
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

 function getDetails() {
	
	$this->load->library('form_validation');
	$this->form_validation->set_rules('parish_id', 'Parish_id', 'trim|required|xss_clean');
	
	if($this->form_validation->run() == FALSE) {
		echo json_encode('validation run fail');
	} else {
		$data = array(
			'parish_id' => $this->input->post('parish_id')
		);
		
		
		$details = $this->user->model_getDetails($data);
		echo json_encode($details);		
		
		
	}
 
 }
 



 
}
?>
