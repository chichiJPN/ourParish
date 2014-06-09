<?php

Class login extends CI_Model
{
	function model_verifyUser($data) {
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('username', $data['username']); 
		$this->db->where('password', $data['password']); 
		
		$query = $this->db->get();
 
		if($query->num_rows() == 1)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	
	

	

}

?>