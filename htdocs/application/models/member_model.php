<?php
class Member_model extends CI_Model
{
    public function add_member($data){
        $this->db->insert('project_member',$data);
    }
    public function get_by_member_id($id){
        return $this->db->where('id',$id)->get('project_member');
    }
    public function delete_member($id){
        $this->db->where('id',$id)->delete('project_member');
    }
    public function update_member($data){
    	$this->db->where('id',$data['id']);
    	$this->db->update('project_member',$data);
    }
    public function get_all_members($id){
    	return $this->db->where('project_id',$id)->where('role',0)->get('project_member');
    }
    public function get_all_teachers($id){
    	return $this->db->where('project_id',$id)->where('role',1)->get('project_member');
    }
}

?>