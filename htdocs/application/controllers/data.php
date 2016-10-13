<?php

class Data extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('data_model','data');
        $this->load->model('account_model','account');
        $this->load->model('project_model','project');
        $this->load->model('school_model','school');
        $this->load->model('education_model','education');
        $this->load->library('session');
    }

    public function index()
    {
        $data['data']=$this->data->get_query(-1,-1,1);
        $data['page_num']=100;
        $user_id=$this->account->loginAuthorize();
        if($user_id!=FALSE){
            $data['user']=$this->account->select_by_id($user_id)->result_array()[0];
            $this->load->view('templates/header',$data);   
            $this->load->view('data/index',$data);   
            $this->load->view('templates/footer');   
        }else{
            $this->load->view('templates/header');   
            $this->load->view('data/index',$data);   
            $this->load->view('templates/footer');   
        }     
    }

    public function download(){
        $user_id=$this->account->loginAuthorize();
        if($user_id!=FALSE){
            $user=$this->account->select_by_id($user_id)->result_array()[0];
            if($user['id_number']==""){
                $data['user']=$user;
                $data['school']=$this->school->get_all_schools();
                $data['education']=$this->education->get_all_educations();
                $this->load->view('account/perinfo',$data);
                $data['message']="请先完善信息";
                $this->load->view('errors/blank',$data); 
            }else{
                $data['project']=$this->project->get_project_by_user_id($user_id)->result_array();
                $data['user']=$this->account->get_user_detail_by_id($user_id)->result_array()[0];
                $this->data->record_download($user_id);
                header("Content-type: text/plain"); 
                header("Content-Disposition:attachment;filename=气象大数据.txt"); 
                header('Cache-Control: max-age=10');
                readfile(dirname(APPPATH).'/documents/bigdata/bigdata.txt');
                $this->index();     
            }
        }else{
            $this->load->view('account/login');
            $data['message']="请先登录";
            $this->load->view('errors/blank',$data); 
        }
    }


    public function get_query(){
        $result=$this->data->get_query($_POST['time'],$_POST['station'],$_POST['page']);
/*        for($i=0;$i<count($result);$i++){
            $result[$i]['time']=date('Y-m-d H:i',strtotime($result[$i]['time']));
        }*/
        echo json_encode($result);
    }
}