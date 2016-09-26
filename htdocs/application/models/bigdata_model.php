<?php
define('ALL', -1);
define('FENGXIAN', '奉贤');
define('MINHANG', '闵行');
define('BAOSHAN', '宝山');
define('JIADING', '嘉定');
define('CHONMING', '崇明');
define('XUJIAHUI', '徐家汇');
define('NANHUI', '南汇');
define('PUDONG', '浦东');
define('JINSHAN', '金山');
define('QINGPU', '青浦');
define('SONGJIANG', '松江');
class Bigdata_model extends CI_Model
{
    public function insert($data)
    {
        $this->db->insert('bigdata', $data);
    }

    public function signup($data)
    {
        $this->db->insert('user', $data);
    }

    public function get_user_by_email($email)
    {
        return $this->db->where('email',$email)->get('user');
    }

    public function update($data)
    {
        $this->db->where('id', $data["id"]);
        $this->db->update('bigdata', $data);
    }

    public function get_all(){
        $query = $this->db->query('SELECT * FROM bigdata WHERE id<100;');
        $result = $query->result_array();
        return $result;
    }

    public function get_query($time,$station){
        $station_name='';
        switch ($station) {
            case '1':$station_name='奉贤';break;
            case '2':$station_name='闵行';break;
            case '3':$station_name='宝山';break;
            case '4':$station_name='嘉定';break;
            case '5':$station_name='崇明';break;
            case '6':$station_name='徐家汇';break;
            case '7':$station_name='南汇';break;
            case '8':$station_name='浦东';break;
            case '9':$station_name='金山';break;
            case '10':$station_name='青浦';break;
            case '11':$station_name='松江';break;
        }
        $query_string='SELECT * FROM bigdata ';
        if($station!=-1){
            $query_string=$query_string.'WHERE station_name=\''.$station_name.'\'';
        }
        if($time!=-1){
            if($station!=-1):
                $query_string=$query_string.' AND time>\''.$time.'\'';
            endif;
            if($station==-1):
                $query_string=$query_string.'WHERE time>\''.$time.'\'';
            endif;
        }
        $query_string=$query_string.' ORDER BY time LIMIT 25; ';
        //echo "<script>alert($query_string)</script>";
        $query=$this->db->query($query_string);
        $result = $query->result_array();
        $count=count($result);
        return $result;
    }
}

?>