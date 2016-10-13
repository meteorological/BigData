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
define('EVERY_PAGE_NUM',20);
class Data_model extends CI_Model
{
    public function insert($data)
    {
        $this->db->insert('data', $data);
    }

    public function signup($data)
    {
        $this->db->insert('user', $data);
    }

    public function update($data)
    {
        $this->db->where('id', $data["id"]);
        $this->db->update('data', $data);
    }

    public function get_all(){
        $query = $this->db->query('SELECT * FROM data WHERE id<100;');
        $result = $query->result_array();
        return $result;
    }

    public function get_page_num(){
        return ceil($this->db->count_all_results('data')/EVERY_PAGE_NUM);
    }

    /**
     *$time 观测时间、$station 观测站、$page 页数
     */
    public function get_query($time,$station,$page){
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
        $query_string='SELECT * FROM data ';
        if($station!=-1){
            $query_string=$query_string.'WHERE station_name=\''.$station_name.'\'';
        }
        if($time!=-1){
            if($station!=-1):
                $query_string=$query_string.' AND time>=\''.$time.'\'';
            endif;
            if($station==-1):
                $query_string=$query_string.'WHERE time>=\''.$time.'\'';
            endif;
        }
        $query_string=$query_string.' ORDER BY time LIMIT '.($page-1)*EVERY_PAGE_NUM.','.EVERY_PAGE_NUM.' ;';
        //echo "<script>alert($query_string)</script>";
        $query=$this->db->query($query_string);
        $result = $query->result_array();
        return $result;
    }

    public function record_download($user_id){
        $data['user_id']=$user_id;
        $data['download_time']=date("y-m-d h:i:s",time());
        $this->db->insert('bigdata_download',$data);
    }
}

?>