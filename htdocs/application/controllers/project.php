<?php
define('FILE_MAX_SIZE',20);
class Project extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('account_model','account');
        $this->load->model('school_model','school');
        $this->load->model('education_model','education');
        $this->load->model('project_model','project');
    }

    public function index(){
    /*START*/
    /*是否已登陆：*/
    	/*是：*/
    		/*是否已完善个人资料*/
    			/*是：*/
    				/*跳转报名页面*/
    			/*否：*/
    				/*跳转完善个人资料页面*/
    	/*否：*/
    		/*跳转登陆页面*/
    /*END*/
        $user_id=$this->account->loginAuthorize();
        if($user_id!=FALSE){
            $user=$this->account->select_by_id($user_id)->result_array()[0];
            if($user['id_number']==""){
            	$data['user']=$user;
            	$data['school']=$this->school->get_all_schools();
            	$data['education']=$this->education->get_all_educations();
                $this->load->view('account/perinfo',$data);   
            }else{
            	$data['user']=$this->account->get_user_detail_by_id($user_id)->result_array()[0];
                $this->load->view('project/procreate',$data);   
            }
        }else{
            echo "<script>alert('您还没有登陆，请先登录！')</script>";
            $this->load->view('account/login');   
        }              
    }

    public function enter_for(){
    	$user_id=$this->account->loginAuthorize();
    	$count=$_FILES["project_word"]['name'];
        if($count!=""):
            $save_dir=dirname(dirname(dirname(__FILE__)))."/documents/projects/".$user_id."/";
            if (!is_dir($save_dir)){ 
                mkdir(iconv("UTF-8", "GBK", $save_dir),0777,true); 
            } 
            if($_FILES["project_word"]["size"]>FILE_MAX_SIZE*1024*1024){
            	show_error("WORD文件最大".FILE_MAX_SIZE."M,您的文件大小为".round(($_FILES["project_word"]["size"]/1024/1024),2)."M");
            }
            if ($_FILES["project_word"]["error"] > 0){
                show_error("上传WORD出错，错误代码 ".$_FILES["project_word"]["error"]);
            }else{
                $file_name=$_FILES["project_word"]["name"];
                $file_name=strrchr($file_name,'.');
                $file_name=time().'_'.rand().$file_name;
                $save_path=iconv("UTF-8", "GBK", $save_dir.$file_name);         
                $if_success=move_uploaded_file($_FILES["project_word"]["tmp_name"],$save_path);
        		$_POST['project_word']= $file_name;
        		$_POST['word_name']=$_FILES["project_word"]["name"];
            }
        endif;
    	$count=$_FILES["project_ppt"]['name'];
        if($count!=""):
            $save_dir=dirname(dirname(dirname(__FILE__)))."/documents/projects/".$user_id."/";
            if (!is_dir($save_dir)){ 
                mkdir(iconv("UTF-8", "GBK", $save_dir),0777,true); 
            }
            if($_FILES["project_ppt"]["size"]>FILE_MAX_SIZE*1024*1024){
            	show_error("PPT文件最大".FILE_MAX_SIZE."M,您的文件大小为".round(($_FILES["project_word"]["size"]/1024/1024),2)."M");
            } 
            if ($_FILES["project_ppt"]["error"] > 0){
                show_error("上传WORD出错，错误代码 ".$_FILES["project_ppt"]["error"]);
            }else{
                $file_name=$_FILES["project_ppt"]["name"];
                $file_name=strrchr($file_name,'.');
                $file_name=time().'_'.rand().$file_name;
                $save_path=iconv("UTF-8", "GBK", $save_dir.$file_name);         
                $if_success=move_uploaded_file($_FILES["project_ppt"]["tmp_name"],$save_path);
        		$_POST['project_ppt']= $file_name;
        		$_POST['ppt_name']=$_FILES["project_ppt"]["name"];
            }
        endif;
        $this->project->insert($_POST);
        echo "<script>alert('报名成功！')</script>";
        $data['user']=$this->user->select_by_id($user_id)->result_array()[0];
        $this->load->view('home/index',$data);
    }
}