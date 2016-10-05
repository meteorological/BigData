<?php
class Education_model extends CI_Model
{
    public function get_all_educations(){
        return $this->db->get('education')->result_array();
    }
}

?>