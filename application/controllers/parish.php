
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class parish extends CI_Controller {

 function __construct()
 { 
   parent::__construct();
   $this->load->model('model_externals');   
   $this->load->helper('url');
 }
 
 function index()
 {
   
   $data = "";
   $parishKey = $this->uri->segment(3);
   $pageName = str_replace("%20"," ",$this->uri->segment(4));
   
   if($parishKey == NULL) {
	return;
   }
   
   //if page name is not specified.
   if($pageName === false) {
	$link = $this->model_externals->model_getHome($parishKey);
	
	if($link === false) {
		$data['code'] = '<h1>An error has occurred</h1>';
	} else if($link === NULL) {
		$data['code'] = '<h1>Main page not found</h1>';
	} else {
		redirect($link);
	}	
   } else {
	$data['code'] = $this->model_externals->model_getPage($parishKey, $pageName);   
	$data['pages'] = $this->model_externals->model_getPageNames($parishKey);
	$data['parishKey'] = $parishKey;
   }
   
   $this->load->view('parishSites/parishHeader');
   $this->load->view('parishSites/parishMainBody', $data);
 }
 
 function news() {
   $data = "";
   $parishKey = $this->uri->segment(3);
   $date = $this->uri->segment(4);
   $title = str_replace("%20", " ", $this->uri->segment(5));
   
   if($parishKey == NULL || $date == NULL || $title == NULL) {
	return;
   }
	
	$data['title'] = $title;
	$data['content'] = $this->model_externals->model_getNewsData($parishKey, $date, $title);
	
   
   $this->load->view('parishSites/parishHeader');
   $this->load->view('parishSites/parishNewsBody', $data);;
 
 }

}

?>