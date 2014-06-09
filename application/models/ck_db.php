<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class ck_db extends CI_Model
{
	public function getPage($id)
	{
		$query = $this->db->query("SELECT page_name FROM page where id_parish=$id");
		return $query->result();
	}

	public function getDescription($id,$page_name)
	{
		$query = $this->db->query("SELECT description FROM page where id_parish='$id' and page_name='$page_name'");
		return $query->result();
	}

	public function pageAdd($data)
	{
		$this->db->insert('page', $data);		
		return $this->db->affected_rows() > 0;
	}

	public function pageUpdate()
	{
		
	}
	
}

?>