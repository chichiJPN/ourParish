
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
   $this->load->view('ourParish/home/homeHeader'); 
   $this->load->view('ourParish/navBar');
   $this->load->view('ourParish/home/homeBody');
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
	$this->load->view('ourParish/parishes/list'); 
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
	$this->load->view('ourParish/parishes/thumbnails'); 
 }
 
 function months()
 {
   $this->load->helper('url');
   $month = $this->uri->segment(3);
   $this->load->view('ourParish/news/months/'.$month); 
 }
 
 function sched() 
 {
   $this->load->helper('url');
   $schedType = $this->uri->segment(3);
   switch($schedType)
   {
		case 'read':
			$this->load->view('ourParish/services/readSched');  			
			break;
		case 'mass':
			$this->load->view('ourParish/services/massSched');  			
			break;
		case 'bapt':
			$this->load->view('ourParish/services/baptSched');  			
			break;
		case 'confess':
			$this->load->view('ourParish/services/confessSched');  			
			break;
		case 'confirm':
			$this->load->view('ourParish/services/confirmSched');  			
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
 
 function login() {
	
	
 }
}

?>