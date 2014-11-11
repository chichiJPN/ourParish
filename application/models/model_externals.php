<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class model_externals extends CI_Model
{
	function model_getHome($parishKey) {
		$this->db->select('url');
		$this->db->from('parish');
		
		$this->db->where('keyword', $parishKey); 
				
		$query = $this->db->get();
 
		if($query->num_rows() == 1)
		{
			$query = $query->result_array();
			return $query[0]['url'];
		}
		else
		{
			return false;
		}
	}	
	
	function model_getPageNames($parishKey) {
		$this->db->select('page.page_name');
		$this->db->from('page');

		$this->db->where('parish.keyword', $parishKey); 

		$this->db->join('parish', 'parish.id_parish = page.id_parish');

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
	
	function model_getPage($parishKey, $pageName) {
	
		$this->db->select('page.description');
		$this->db->from('page');
		
		$this->db->where('parish.keyword', $parishKey); 
		$this->db->where('page.page_name', $pageName);
		
		$this->db->join('parish', 'parish.id_parish = page.id_parish');
	
		
		$query = $this->db->get();
 
		if($query->num_rows() == 1)
		{
			$query = $query->result_array();
			return $query[0]['description'];
		}
		else
		{
			return '<h1>Page not Found</h1>';
		}
	}
	
	function model_getNewsData($parishKey, $date, $title) {
		$this->db->select('news.content');
		$this->db->from('news');
		
		$this->db->where('parish.keyword', $parishKey); 
		$this->db->where('news.title', $title);
		
		$this->db->join('parish', 'parish.id_parish = news.id_parish');
	
		
		$query = $this->db->get();
 
		if($query->num_rows() > 0)
		{
			$row = $query->row(); 
			return $row->content;
		}
		else
		{
			return '<h1>News not Found</h1>';
		}
		
	}


}

?>