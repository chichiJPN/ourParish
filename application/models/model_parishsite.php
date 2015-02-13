<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class model_parishsite extends CI_Model
{
	function model_getReading($language, $column) {
		$this->db->select($column);
		$this->db->from('reading');
		
		$this->db->where('id_language', $language); 
		$this->db->where('month(date)', date('m')); 
		$this->db->where('year(date)', date('Y')); 
		$this->db->where('day(date)', date('d'));
				
		$query = $this->db->get();
 
		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	function model_homeData() {
		$this->db->select('parish.id_parish');
		$this->db->from('parish');		
		$query = $this->db->get();
		
		if($query->num_rows() > 0)
		{
			$query = $query->result();
			shuffle($query);
			
			$limit = 0;
			
			$limit = (count($query) >= 7) ? 7 : count($query);
			
			$data = null;
			for($count = 0; $count < $limit; $count++) {
				$this->db->select('parish.parish, image.filename, image.ext, parish.description');
				$this->db->from('parish');		
				$this->db->where('id_parish', $query[$count]->id_parish);
				$this->db->join('image', 'parish.image = image.image_id');
				$query2 = $this->db->get();
				$data[$count] = $query2->result();
			}
			return $data;
		}
		else
		{
			return false;
		}
	}
	
	
	function model_getParishData($keyword) {
			
		$this->db->select('parish.id_parish, parish.parish, parish.street, barangay.barangay, towncity.towncity, image.filename, image.ext, parish.url, parish.description');
		$this->db->from('parish');
		// $this->db->join('street', 'parish.street = street.id_street');
		$this->db->join('barangay', 'parish.barangay = barangay.id_barangay');
		$this->db->join('towncity', 'parish.towncity = towncity.id_towncity');
		$this->db->join('image', 'parish.image = image.image_id');		
		$keyword = trim($keyword);
		$keys = explode(" ", $keyword);
				
		foreach($keys as $key){
			$this->db->or_like('parish.street', $key);
			$this->db->or_like('parish.parish', $key);
			// $this->db->or_like('street.street', $key); 
			$this->db->or_like('barangay.barangay', $key); 
			$this->db->or_like('towncity.towncity', $key); 
		} 
		
		$query = $this->db->get();
 
		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}
	
	function model_getStreets() {
			
		$this->db->select('*');
		$this->db->from('street');
		
		$query = $this->db->get();
 
		if($query->num_rows() > 0) {
			return $query->result();
		} else {
			return false;
		}
	}
	
	function model_getBarangays() {
			
		$this->db->select('*');
		$this->db->from('barangay');
		
		$query = $this->db->get();
 
		if($query->num_rows() > 0) {
			return $query->result();
		}
		else {
			return false;
		}
	}
	
	function model_getParishNameID() {
		$this->db->select('id_parish, parish');
		$this->db->from('parish');
		
		$query = $this->db->get();
 
		if($query->num_rows() > 0) {
			return $query->result();
		}
		else {
			return false;
		}
		
	}
	
	function model_getTowncity() {
			
		$this->db->select('*');
		$this->db->from('towncity');
		
		$query = $this->db->get();
 
		if($query->num_rows() > 0) {
			return $query->result();
		}
		else {
			return false;
		}
	}

	function model_searchMass($data) {
		// $this->db->select('parish.parish, street.street, barangay.barangay, towncity.towncity, day.day, mass_schedule.time_start, language.language');
		$this->db->select('parish.parish, parish.street,
						   parish.barangay, barangay.barangay, 
						   parish.towncity, towncity.towncity,
						   day.day, mass_schedule.time_start,
						   language.language' );
		$this->db->from('mass_schedule');
		
 		$this->db->join('parish', 'mass_schedule.id_parish = parish.id_parish');
		$this->db->join('barangay', 'parish.barangay = barangay.id_barangay');
		$this->db->join('towncity', 'parish.towncity = towncity.id_towncity');
		$this->db->join('day', 'mass_schedule.day = day.id_day');
		$this->db->join('language', 'mass_schedule.language = language.id_language');
		
		if($data['id_parish'] != '0')
			$this->db->where('mass_schedule.id_parish', $data['id_parish']); 
		
		if($data['day'] != '0')
			$this->db->where('mass_schedule.day', $data['day']);

		if($data['time_start'] != '0')
			$this->db->where('mass_schedule.time_start', $data['time_start']);
			
		if($data['street'] != '')
			$this->db->where('parish.street', $data['street'],'after');
			
		if($data['barangay'] != '0')
			$this->db->where('parish.barangay', $data['barangay']);
			
		if($data['towncity'] != '0')
			 $this->db->where('parish.towncity', $data['towncity']);
			
		if($data['language'] != '0')
			$this->db->where('mass_schedule.language', $data['language']);
						
		$query = $this->db->get();
 
		if($query->num_rows() > 0)
		{
				return $query->result();
		}
		else
		{
			return false;
		}
	}
	
	function model_searchBapt($data) {
		$this->db->select('parish.parish, parish.street,
						   parish.barangay, barangay.barangay, 
						   parish.towncity, towncity.towncity,
						   day.day, baptism_schedule.time_start');
		$this->db->from('baptism_schedule');
		
 		$this->db->join('parish', 'baptism_schedule.id_parish = parish.id_parish');
 		// $this->db->join('street', 'parish.street = street.id_street');
		$this->db->join('barangay', 'parish.barangay = barangay.id_barangay');
		$this->db->join('towncity', 'parish.towncity = towncity.id_towncity');
		$this->db->join('day', 'baptism_schedule.day = day.id_day');

		if($data['id_parish'] != 0)
			$this->db->where('baptism_schedule.id_parish', $data['id_parish']); 
								
		$query = $this->db->get();
 
		if($query->num_rows() > 0)
		{
				return $query->result();
		}
		else
		{
			return false;
		}
	}
	
	function model_searchConfe($data) {
		$this->db->select('parish.parish, parish.street,
						   parish.barangay, barangay.barangay, 
						   parish.towncity, towncity.towncity,
						   day.day, confession_schedule.time_start');
		$this->db->from('confession_schedule');
		
 		$this->db->join('parish', 'confession_schedule.id_parish = parish.id_parish');
 		// $this->db->join('street', 'parish.street = street.id_street');
		$this->db->join('barangay', 'parish.barangay = barangay.id_barangay');
		$this->db->join('towncity', 'parish.towncity = towncity.id_towncity');
		$this->db->join('day', 'confession_schedule.day = day.id_day');

		if($data['id_parish'] != 0)
			$this->db->where('confession_schedule.id_parish', $data['id_parish']); 
								
		$query = $this->db->get();
 
		if($query->num_rows() > 0)
		{
				return $query->result();
		}
		else
		{
			return false;
		}
	}

	function model_searchConfi($data) {
		$this->db->select('parish.parish, parish.street,
						   parish.barangay, barangay.barangay, 
						   parish.towncity, towncity.towncity,
						   day.day, confirmation_schedule.time_start');
		$this->db->from('confirmation_schedule');
		
 		$this->db->join('parish', 'confirmation_schedule.id_parish = parish.id_parish');
 		// $this->db->join('street', 'parish.street = street.id_street');
		$this->db->join('barangay', 'parish.barangay = barangay.id_barangay');
		$this->db->join('towncity', 'parish.towncity = towncity.id_towncity');
		$this->db->join('day', 'confirmation_schedule.day = day.id_day');

		if($data['id_parish'] != 0)
			$this->db->where('confirmation_schedule.id_parish', $data['id_parish']); 
								
		$query = $this->db->get();
 
		if($query->num_rows() > 0)
		{
				return $query->result();
		}
		else
		{
			return false;
		}
	}
		
	function model_getNews($month) {
		switch($month) {
			case 'january'  : $month = 1; break;
			case 'febuary'  : $month = 2; break;
			case 'march'    : $month = 3; break;
			case 'april'    : $month = 4; break;
			case 'may'      : $month = 5; break;
			case 'june'     : $month = 6; break;
			case 'july'     : $month = 7; break;
			case 'august'   : $month = 8; break;
			case 'september': $month = 9; break;
			case 'october'  : $month = 10; break;
			case 'november' : $month = 11; break;
			case 'december' : $month = 12; break;
		}
		
		$this->db->select('news.id_news, parish.parish, parish.url, news.date, news.title, news.content');
		$this->db->from('news');
		
		$this->db->join('parish', 'news.id_parish = parish.id_parish');
 	
		$this->db->where('month(date)', $month);
		$this->db->where('year(date)', 2014);
		
		$query = $this->db->get();
 
		if($query->num_rows() > 0) {
			return $query->result();
		}
		else {
			return false;
		}
		
	}
}

?>