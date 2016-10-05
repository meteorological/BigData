<?php
class School_model extends CI_Model
{
    public function get_all_schools(){
        return $this->db->get('school')->result_array();
    }
}

?>