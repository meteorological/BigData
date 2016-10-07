<?php

class Data extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('data_model','data');
        $this->load->model('account_model','user');
        $this->load->library('session');
    }

    public function index()
    {
/*        if($this->session->userdata('user')){
            $data['name']=$this->session->userdata('user');
        }
        $data['title'] = '气象大数据开放共享平台';*/
        $data['data']=$this->data->get_query(-1,-1,1);
        $data['page_num']=$this->data->get_page_num();
        $user_id=$this->user->loginAuthorize();
        if($user_id!=FALSE){
            $data['user']=$this->user->select_by_id($user_id)->result_array()[0];
            $this->load->view('data/index',$data);   
        }else{
            $this->load->view('data/index',$data);   
        }     
    }

    public function download(){
        $user_id=$this->user->loginAuthorize();
        if($user_id!=FALSE){
            header("Content-type: text/plain"); 
            header("Content-Disposition:attachment;filename=气象大数据.txt"); 
            header('Cache-Control: max-age=10');
            readfile(dirname(APPPATH).'/documents/bigdata/bigdata.txt');
            $this->index();
        }else{
            echo "<script>alert('请先登录')</script>";
            $this->load->view('account/login');
        }
    }

    public function get_query(){
        $result=$this->data->get_query($_POST['time'],$_POST['station'],$_POST['page']);
/*        for($i=0;$i<count($result);$i++){
            $result[$i]['time']=date('Y-m-d H:i',strtotime($result[$i]['time']));
        }*/
        echo json_encode($result);
    }

    public function enter(){
        /*判断是否登陆*/
            /*若没有登陆，跳转到“登陆”页面*/
            /*若已登录，判断是否完善个人资料*/
                /*没有完善个人资料，跳转到“完善个人资料”页面*/
                /*若已完善个人资料，跳转到“报名”页面*/
    }
}