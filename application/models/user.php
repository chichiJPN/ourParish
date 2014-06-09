<?php

Class User extends CI_Model
{
	function model_getParishData($parish_id, $database) {
		$this->db->select('*');
		$this->db->from($database);
		$this->db->where('id_parish', $parish_id); 
		
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
	
	function model_getLocations($database) {
		$this->db->select('*');
		$this->db->from($database);		
 
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
	
	
	function model_getAllSchedules($parish_id, $database)
	{
		$command = '';
		//$command ='id_'.$database.',id_parish,parish.parish,'.$database.'.day,'.$database.'.time_start,'.$database.'.time_end';
		
		switch($database) {
			case 'reading':
				$command = 'date, description, language.language, id_reading';
				$this->db->join('language', $database.'.id_language = language.id_language', 'inner');			
				break;

			case 'mass_schedule':
				$command = 'parish.parish, day.day, time_start, time_end,language.language,id_'.$database;
				$this->db->join('language', $database.'.language = language.id_language', 'inner');			
				
				break;
			default:
				// $command = 'parish.parish, day.day,'.$database.'.time_start,'.$database.'.time_end,'.$database.'.id_'.$database;
				$command = 'parish.parish, day.day, time_start, time_end, id_'.$database;
				break;
		}
		if($database != 'reading'){
			$this->db->join('parish', $database.'.id_parish = parish.id_parish', 'inner');
			$this->db->join('day', $database.'.day = day.id_day', 'inner');					
		}
		
		$this->db->select($command);
		$this->db->from($database);
		if($parish_id != null && $database != 'reading') {
			$this->db->where($database.'.id_parish', $parish_id); 
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
	
	function model_addAdmin($data) {
		$this->db->insert('user', $data);		
		return $this->db->affected_rows() > 0;		
	}
	
	function model_addParish($data)
	{
		$this->db->insert('parish', $data);		
		return $this->db->affected_rows() > 0;
	}

	function model_editLocation($parish_id, $data) 
	{
		$this->db->where('id_parish', $parish_id);
		$this->db->update('parish', $data); 
		
		return $this->db->affected_rows() > 0;
	}

	function model_updateSched($ids, $data, $database) 
	{
		$this->db->where('id_parish', $ids['parish_id']);
		$this->db->where('id_'.$database, $ids['sched_id']);
		$this->db->update($database, $data); 
		
		return $this->db->affected_rows() > 0;
	}

	
	function model_editDescription() {
		$this->db->where('id_parish', $parish_id);
		$this->db->update('parish', $data); 
		
		return $this->db->affected_rows() > 0;		
	}
	
	function model_getParishes()	
	{
		$this->db->select('id_parish, parish');
		$this->db->from('parish');
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
	
	function model_getLanguages() {
		$this->db->select('id_language, description');
		$this->db->from('language');
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
	
	function model_getAdmin($parish_id) {
		$this->db->select('id_user, username,role');
		$this->db->from('user');
		$this->db->where('id_parish', $parish_id); 
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
	
	function model_deleteAdmin($data)
	{
		$this->db->where_in('id_user', $data);
		$this->db->delete('user');
		return $this->db->affected_rows() > 0;
	}	
	
	function model_deleteSched($database, $data)
	{
		$this->db->delete($database, $data);
		return $this->db->affected_rows() > 0;
	}
	
	function model_deleteParish($parish_id) {	
		$this->db->delete('baptism_schedule', array('id_parish' => $parish_id));
		$this->db->delete('confession_schedule', array('id_parish' => $parish_id));
		$this->db->delete('confirmation_schedule', array('id_parish' => $parish_id));
		$this->db->delete('mass_schedule', array('id_parish' => $parish_id));
		$this->db->delete('news', array('id_parish' => $parish_id));
		$this->db->delete('user', array('id_parish' => $parish_id));
		$this->db->delete('parish', array('id_parish' => $parish_id));
		
		return $this->db->affected_rows() > 0;	
	}
	
	function model_insert($data, $database)
	{
		$this->db->insert($database, $data);		
		return $this->db->affected_rows() > 0;
	}

	function model_update($data, $database)
	{
		
	}
	
	function model_userExisting($username) {
		$this->db->select('username');
		$this->db->from('user');
		$this->db->where('username', $username);
		
		$query = $this->db->get();
 
		if($query->num_rows() > 0){
			return true;
		} else {
			return false;
		}
	}
	
	function login($username, $password)
	{
		$this->db->select('id, username,password');
		$this->db->from('employee');
		$this->db->where('username', $username);
		$this->db->where('password', $password);
		
		$query = $this->db->get();
 
		if($query->num_rows() == 1)
		{
			echo 'result found';
			return $query->result();
		}
		else
		{
			return false;
		}
	}
	
	function isAdmin($username)
	{
		$this->db->select('admin');
		$this->db->from('employee');
		$this->db->where('username', $username);
		
		$query = $this->db->get();
 
		if($query->num_rows() == 1)
		{
			echo 'result found';
			return $query->result();
		}
		else
		{
			return false;
		}
	}
	

	

}

?>