<?php
class Project_model extends CI_Model
{
	public function insert($data){
		$this->db->insert('project',$data);
	}

	public function get_project_by_user_id($user_id){
		$result=$this->db
		->join('account','account.id=project.user_id')
		->join('education','education_id=account.educational_level')
		->join('school','school_id=account.school')
		->join('project_status','project_status=project_status_id')
		->where('user_id',$user_id)->get('project');
		return $result;
	}
}

?>