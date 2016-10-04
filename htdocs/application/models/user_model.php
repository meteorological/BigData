<?php
class User_model extends CI_Model
{
    public function select_by_username($username){
        $result=$this->db
        ->where('username',$username)
        ->get('user');
        return $result;
    } 

    public function select_by_email($email){
        $result=$this->db
        ->where('email',$email)
        ->get('user');
        return $result;
    } 

    public function select_by_token($token){
        $result=$this->db->select('id')
        ->select('token_exptime')
        ->select('status')
        ->where('token',$token)
        ->where('status',0)
        ->get('user');
        return $result;
    }

    public function logout()
    {
        $this->session->unset_userdata('user_id');
        $this->session->unset_userdata('user_name');
        $this->session->unset_userdata('user_fullname');
        $this->session->unset_userdata('lastActiveTime');
    }
    
    public function active($data){
        $this->db->where('id', $data['id']);
        $this->db->update('user',$data);
    }
    public function insert($data)
    {
        $this->db->insert('user',$data);
    }
}

?>