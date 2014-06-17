
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class parish_site extends CI_Controller {

 function __construct()
 {
   parent::__construct();
 }

 function index()
 {
   $this->home();
 }
 
 function home()
 {
   $this->load->model('model_parishsite');
   $data['information'] = $this->model_parishsite->model_homeData();
   // print_r($data['information']);
   $this->load->view('ourParish/home/homeHeader'); 
   $this->load->view('ourParish/navBar');
   $this->load->view('ourParish/home/homeBody',$data);
   // $this->load->view('ourParish/home/homeOriginal');
   
 }
 
 function news()
 {
	$this->load->view('ourParish/news/newsHeader'); 
	$this->load->view('ourParish/navBar');
	$this->load->view('ourParish/news/newsBody'); 
	// $this->load->view('ourParish/news/newsOriginal'); 
 }
 
 function about()
 {
    $this->load->view('ourParish/about/aboutHeader'); 
    $this->load->view('ourParish/navBar');
    $this->load->view('ourParish/about/aboutBody');
 }
 
  function services()
 {
	$this->load->view('ourParish/services/servicesHeader');
    $this->load->view('ourParish/navBar');	
	$this->load->view('ourParish/services/servicesBody'); 
	//$this->load->view('ourParish/services/services');
 }
 
  function parishes()
 {
	$this->load->view('ourParish/parishes/parishesHeader');
    $this->load->view('ourParish/navBar');	
	$this->load->view('ourParish/parishes/parishesBody'); 
	//$this->load->view('ourParish/parishes/parishes'); 
 }
 
 
 function lists()
 {
 	$this->load->model('model_parishsite');
	$this->load->helper('url');
    $keyword = $this->uri->segment(3);
	$data['information'] = $this->model_parishsite->model_getParishData($keyword);
	$this->load->view('ourParish/parishes/list', $data);
	
 }
 
 function listOne()
 {
	$this->load->view('ourParish/parishes/listOne'); 
 }
 
 function listTwo()
 {
	$this->load->view('ourParish/parishes/listTwo'); 
 }
 
 function listThree()
 {
	$this->load->view('ourParish/parishes/listThree'); 
 }

 function thumbnails()
 {
	$this->load->model('model_parishsite');
	$this->load->helper('url');
    $keyword = $this->uri->segment(3);
	$data['information'] = $this->model_parishsite->model_getParishData($keyword);
	$this->load->view('ourParish/parishes/thumbnails', $data); 
 }
 
 function months()
 {
   $this->load->helper('url');
   $this->load->model('model_parishsite');
   $month = $this->uri->segment(3);
   // $data = $this->db->group_by('MONTH(date), YEAR(date)');
   $data['info'] = $this->model_parishsite->model_getNews($month);
   //$data['month'] = $month;
   $this->load->view('ourParish/news/months/theOneTrueMonth', $data); 
 }
 
 function sched() 
 {
   $this->load->helper('url');
   $schedType = $this->uri->segment(3);
   $this->load->model('model_parishsite');
   switch($schedType)
   {
		case 'read':
			$this->load->view('ourParish/services/readSched');  			
			break;
		case 'mass':
			
			$data['parish'] = $this->model_parishsite->model_getParishData('');
			$data['street'] = $this->model_parishsite->model_getStreets();
			$data['barangay'] = $this->model_parishsite->model_getBarangays();
			$data['towncity'] = $this->model_parishsite->model_getTowncity();			
			$this->load->view('ourParish/services/massSched', $data);
			break;
		case 'bapt':
			$data['parish'] = $this->model_parishsite->model_getParishNameID();
			$this->load->view('ourParish/services/baptSched', $data);  			
			break;
		case 'confess':
			$data['parish'] = $this->model_parishsite->model_getParishNameID();
			$this->load->view('ourParish/services/confessSched', $data);  			
			break;
		case 'confirm':
			$data['parish'] = $this->model_parishsite->model_getParishNameID();
			$this->load->view('ourParish/services/confirmSched', $data);  			
			break;
   }
 }
 
 function firstReading()
 {
	$this->load->view('ourParish/services/firstreading');  	 
 }
 
 function psalms()
 {
	$this->load->view('ourParish/services/psalms');  	 	
 }
 
 


 
}

?>