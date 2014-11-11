<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class ck_db extends CI_Model
{
	public function getPage($id)
	{
		$query = $this->db->query("SELECT page_name FROM page where id_parish=".$id);
		return $query->result();
	}
	
	function model_updateUrl($data, $id_parish) {
		$this->db->where('id_parish', $id_parish);
		$this->db->update('parish', $data); 
		//$query = $this->db->query("Update url FROM parish where id_parish='$id_parish'");
		return $this->db->affected_rows() > 0;
	}
	
	function model_getKeyword($id_parish) {
		$query = $this->db->query("SELECT keyword FROM parish where id_parish='$id_parish'");
		return $query->result();	
	}
	
	function model_getParishName($id_parish) {
		$query = $this->db->query("SELECT parish FROM parish where id_parish='$id_parish'");
		return $query->result();
	}

	function getDescription($id,$page_name)
	{
		$query = $this->db->query("SELECT description, id_page FROM page where id_parish='$id' and page_name='$page_name'");
		return $query->result();
	}

	function pageAdd($data)
	{
		$this->db->insert('page', $data);		
		return $this->db->affected_rows() > 0;
	}

	function model_selectIdPage($id,$page)
	{
		$query = $this->db->query("SELECT id_page FROM page where id_parish='$id' and page_name='$page'");
		return $query->result();	
	}

	function model_updatePage($id,$id_parish,$data)
	{
		$this->db->where('id_page', $id);
		$this->db->where('id_parish', $id_parish);
		$this->db->update('page', $data); 
		return $this->db->affected_rows() > 0;
	}

	function model_deletePage($data,$parish_id)
	{
		$this->db->where_in('page_name', $data);
		$this->db->where_in('id_parish', $parish_id);
		$this->db->delete('page');
		return $this->db->affected_rows() > 0;
	}

	function model_updateDescription($id_page,$description, $id_parish)
	{
		
		$this->db->where('id_page', $id_page);
		$this->db->where('id_parish', $id_parish);
		$this->db->update('page', $description); 
		return $this->db->affected_rows() > 0;
	}	
	
	function model_updateDescription2($title_page,$description, $id_parish)
	{		
		$this->db->where('page_name', $title_page);
		$this->db->where('id_parish', $id_parish);
		$this->db->update('page', $description); 
		return $this->db->affected_rows() > 0;
	}
	
	// updates existing news or adds new ones
	function model_updateNews($date, $id_parish, $data) {
		$this->db->where('date', $date);
		$this->db->where('id_parish', $id_parish);
		$this->db->update('news', $data);
		return $this->db->affected_rows() > 0;
	}
}

?>