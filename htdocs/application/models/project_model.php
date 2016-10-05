<?php
class Project_model extends CI_Model
{
	public function insert($data){
		$this->db->insert('project',$data);
	}
}

?>