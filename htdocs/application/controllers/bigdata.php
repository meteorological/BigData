<?php

class Bigdata extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('bigdata_model','bigdata');
        $this->load->library('session');
    }

    public function index()
    {
/*        if($this->session->userdata('user')){
            $data['name']=$this->session->userdata('user');
        }
        $data['title'] = '气象大数据开放共享平台';
        $data['bigdata']=$this->bigdata->get_query(-1,-1,1);
        $this->load->view('bigdata/data', $data);*/
        $this->load->view('bigdata/index');
        
    }

    public function download(){
        if($this->session->userdata('user')){   
            header("Content-type: text/plain"); 
            header("Content-Disposition:attachment;filename=气象大数据.txt"); 
            header('Cache-Control: max-age=10');
            readfile(dirname(APPPATH).'/documents/bigdata/bigdata.txt');
        }else{
            $data['error_message']='请先登录';
            $data['type']='login';
            $this->load->view('bigdata/index',$data);
        } 
    }

    public function get_query(){
        $result=$this->bigdata->get_query($_POST['time_select'],$_POST['station_select']);
        for($i=0;$i<count($result);$i++){
            $result[$i]['time']=date('Y-m-d H:i',strtotime($result[$i]['time']));
        }
        echo json_encode($result);
    }
}