<?php
define('TIMEOUT_LIMIT', 1440);
class Account_model extends CI_Model
{
    public function select_by_username($username){
        $result=$this->db
        ->where('username',$username)
        ->get('account');
        return $result;
    } 

    public function select_by_email($email){
        $result=$this->db
        ->where('email',$email)
        ->get('account');
        return $result;
    } 

    public function select_by_token($token){
        $result=$this->db
        ->where('token',$token)
        ->get('account');
        return $result;
    }

    public function select_by_id($id){
        $result=$this->db
        ->where('id',$id)
        ->get('account');
        return $result;  
    }

    public function get_user_detail_by_id($id){
    $result=$this->db
        ->join('school','school_id=account.school')
        ->join('education','education_id=account.educational_level')
        ->where('id',$id)
        ->get('account');
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
        $this->db->update('account',$data);
    }
    public function insert($data)
    {
        $this->db->insert('account',$data);
    }

    public function update($data)
    {
        $this->db->where('id',$data['id']);
        $this->db->update('account',$data);
    }

    public function hasFeature($feature_directory_name, $feature_controller_name, $feature_name)
    {
        if ($feature_name == "index") {
            return TRUE;
        }
        if ($feature_name == "get_query") {
            return TRUE;
        }
        if ($feature_name == "download") {
            return TRUE;
        }
        if ($feature_controller_name == "account") {
            return TRUE;
        }
        if ($feature_controller_name == "home") {
            return TRUE;
        }
        /*$array = array("feature_directory_name" => $feature_directory_name, 'feature_controller_name' => $feature_controller_name, 'feature_name' => $feature_name);
        $queryforauthenticationunnecessary = $this->db->query("SELECT FD.feature_directory_name,FC.feature_controller_name,F.feature_name FROM feature AS F,feature_controller AS FC,feature_directory AS FD WHERE FC.feature_directory_id=FD.feature_directory_id AND F.feature_controller_id=FC.feature_controller_id AND F.feature_status=0 AND FC.feature_controller_status=0 AND FD.feature_directory_status=0 AND F.feature_isauthenticationnecessary=1");
        $resultforauthenticationunnecessary = $queryforauthenticationunnecessary->result_array();
        if (in_array($array, $resultforauthenticationunnecessary)) {
            return TRUE;
        }*/
        $user_id = $this->loginAuthorize();
        return $user_id;
/*        $query = null;
        if ($user_id == FALSE) {
            return FALSE;
            //$query = $this->db->query("SELECT FD.feature_directory_name,FC.feature_controller_name,F.feature_name FROM feature AS F,feature_controller AS FC,feature_directory AS FD WHERE FC.feature_directory_id=FD.feature_directory_id AND F.feature_controller_id=FC.feature_controller_id AND F.feature_status=0 AND FC.feature_controller_status=0 AND FD.feature_directory_status=0 AND F.feature_name = 'index'");
        } else {
            $query = $this->db->query("SELECT FD.feature_directory_name,FC.feature_controller_name,F.feature_name FROM feature AS F,feature_controller AS FC,feature_directory AS FD WHERE FC.feature_directory_id=FD.feature_directory_id AND F.feature_controller_id=FC.feature_controller_id AND F.feature_status=0 AND FC.feature_controller_status=0 AND FD.feature_directory_status=0 AND F.feature_id in (SELECT RF.feature_id FROM role_to_feature AS RF WHERE RF.role_id in(SELECT UR.role_id FROM user_to_role AS UR WHERE UR.user_id =" . $user_id . "))");
        }
        $result = $query->result_array();

        if (in_array($array, $result)) {
            return TRUE;
        }
        return FALSE;*/
    }

    public function loginAuthorize()
    {
        $user_id = $this->session->userdata('user_id');
        //print_r($user_id);
        if (!$user_id) {
            return FALSE;
        }
        $current = time();
        $lastActiveTime = $this->session->userdata('lastActiveTime');
        $timeSpan = $current - $lastActiveTime;
        //print_r($timeSpan);
        if ($timeSpan > TIMEOUT_LIMIT) {
            $this->logout();
            return FALSE;
        }
        $this->session->set_userdata('lastActiveTime', $current);
        return $user_id;
    }
}

?>