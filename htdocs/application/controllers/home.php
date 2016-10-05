<?php

class Home extends CI_Controller
{
    /**
     *构造函数
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('account_model','user');
    }

    /**
     *“主页”跳转函数
     */
    public function index()
    {
        /*START*/
        /*是否登陆：*/
            /*是：*/
                /*加载用户信息并跳转*/
            /*否：*/
                /*直接跳转*/
        /*END*/
        $user_id=$this->user->loginAuthorize();
        if($user_id!=FALSE){
            $data['user']=$this->user->select_by_id($user_id)->result_array()[0];
            $this->load->view('home/index',$data);   
        }else{
            $this->load->view('home/index');   
        }     
    }

    /**
     *“比赛规则”页面跳转函数
     */
    public function rule(){
        /*跳转到“大赛规则”页面*/
    }
}