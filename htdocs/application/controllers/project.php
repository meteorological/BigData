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
        $this->load->model('member_model','member');
        $this->load->helper('url');
    }

    public function index(){
    /*START*/
    /*是否已登陆：*/
    	/*是：*/
    		/*是否已完善个人资料*/
    			/*是：*/
                    /*是否已报名：*/
                        /*是：*/
                            /*提示已报名信息，跳转个人中心页面*/
                        /*否：*/
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
                $data['project']=$this->project->get_project_by_user_id($user_id)->result_array();
                $data['user']=$this->account->get_user_detail_by_id($user_id)->result_array()[0];
                if(count($data['project'])!=0){
                    $data['project']=$data['project'][0];
                    $data['member']=$this->member->get_all_members($data['project']['project_id'])->result_array();
                    $data['teacher']=$this->member->get_all_teachers($data['project']['project_id'])->result_array();
                    echo "<script>alert('您已报名，请前往个人中心查看报名情况！')</script>";
                    $this->load->view('account/percenter',$data);  
                    $this->load->view('templates/footer',$data);  

                }else{
                    $this->load->view('project/procreate',$data);  
                    $this->load->view('templates/footer');  
                } 	 
            }
        }else{
            $this->load->view('account/login');
            $data['message']="请先登录";
            $this->load->view('errors/blank',$data);   
        }              
    }

    public function enter_for(){
    	$user_id=$this->account->loginAuthorize();
        $project=$this->project->get_project_by_user_id($user_id)->result_array();
        if(count($project)==0){
    	   //调用代码
    	   $count=$_FILES["project_pdf"]['name'];
            if($count!=""):
                if($_FILES["project_pdf"]['type']!="application/pdf"){
                    show_error("请上传正确的PDF类型：*.pdf");
                }
                $save_dir=dirname(dirname(dirname(__FILE__)))."/documents/projects/".$user_id."/";
                if (!is_dir($save_dir)){ 
                    mkdir(iconv("UTF-8", "GBK", $save_dir),0777,true); 
                }
                if($_FILES["project_pdf"]["size"]>FILE_MAX_SIZE*1024*1024){
            	   show_error("PDF文件最大".FILE_MAX_SIZE."M,您的文件大小为".round(($_FILES["project_pdf"]["size"]/1024/1024),2)."M");
                } 
                if ($_FILES["project_pdf"]["error"] > 0){
                    show_error("上传PDF出错，错误代码 ".$_FILES["project_pdf"]["error"]);
                }else{
                    $file_name=$_FILES["project_pdf"]["name"];
                    $file_name=strrchr($file_name,'.');
                    $file_name=time().'_'.rand().$file_name;
                    $save_path=iconv("UTF-8", "GBK", $save_dir.$file_name);         
                    $if_success=move_uploaded_file($_FILES["project_pdf"]["tmp_name"],$save_path);
                    $_POST['project_pdf']= $file_name;
        		  $_POST['pdf_name']=$_FILES["project_pdf"]["name"];
                }
            endif;
            $_POST['user_id']=$user_id;
            $this->project->insert($_POST);
            $project=$this->project->get_project_by_user_id($user_id)->result_array();
        }
        $data['project']=$project[0];
        /*echo "<script>alert('报名成功！')</script>";*/
        $data['user']=$this->account->get_user_detail_by_id($user_id)->result_array()[0];
        $this->load->view('project/teamadmin',$data);
        $this->load->view('templates/footer');
    }

    public function download_file(){
        $download_type=$this->uri->segment(3,0);
        $user_id=$this->account->loginAuthorize();
        $project=$this->project->get_project_by_user_id($user_id)->result_array()[0];   
        if($download_type!=0){   
            $save_path=dirname(dirname(dirname(__FILE__)))."/documents/projects/".$user_id."/".$project['project_pdf'];
            $save_filename=$project['pdf_name'];
            header("Content-type: application/vnd.ms-excel"); 
            header("Content-Disposition:attachment;filename=".$save_filename); 
            header('Cache-Control: max-age=10');
            ob_clean();//关键
            flush();//关键
            readfile($save_path);  
        }
    }

    public function add_member(){
        $this->member->add_member($_POST);
        $id=$this->db->insert_id();
        $result=$this->member->get_by_member_id($id)->result_array()[0];
        echo json_encode($result);
    }

    public function delete_member(){
        $this->member->delete_member($_POST['id']);
        echo 0;
    }

    public function edit_project(){
        $user_id=$this->account->loginAuthorize();
        $data['user']=$this->account->get_user_detail_by_id($user_id)->result_array()[0];
        $data['project']=$this->project->get_project_by_user_id($user_id)->result_array()[0];
        $data['member']=$this->member->get_all_members($data['project']['project_id'])->result_array();
        $data['teacher']=$this->member->get_all_teachers($data['project']['project_id'])->result_array();
        $this->load->view('project/perchange',$data);
        $this->load->view('templates/footer');
    }

    public function edit_teacher(){
        $this->member->update_member($_POST);
        echo 0;
    }

    public function get_member_detail(){
        $result=$this->member->get_by_member_id($_POST['id'])->result_array()[0];
        echo json_encode($result);
    }

    public function save_project(){
        $user_id=$this->account->loginAuthorize();
            $project=$this->project->get_project_by_user_id($user_id)->result_array()[0];
           //调用代码
           $count=$_FILES["project_pdf"]['name'];
            if($count!=""):
                if($_FILES["project_pdf"]['type']!="application/pdf"){
                    show_error("请上传正确的PDF类型：*.pdf");
                }
                $save_dir=dirname(dirname(dirname(__FILE__)))."/documents/projects/".$user_id."/";
                if (!is_dir($save_dir)){ 
                    mkdir(iconv("UTF-8", "GBK", $save_dir),0777,true); 
                }
                if($_FILES["project_pdf"]["size"]>FILE_MAX_SIZE*1024*1024){
                   show_error("PDF文件最大".FILE_MAX_SIZE."M,您的文件大小为".round(($_FILES["project_pdf"]["size"]/1024/1024),2)."M");
                } 
                if ($_FILES["project_pdf"]["error"] > 0){
                    show_error("上传PDF出错，错误代码 ".$_FILES["project_pdf"]["error"]);
                }else{
                    $file_name=$_FILES["project_pdf"]["name"];
                    $file_name=strrchr($file_name,'.');
                    $file_name=time().'_'.rand().$file_name;
                    $save_path=iconv("UTF-8", "GBK", $save_dir.$file_name);         
                    $if_success=move_uploaded_file($_FILES["project_pdf"]["tmp_name"],$save_path);
                    $delete_path=$save_dir.$project['project_pdf'];
                    unlink($delete_path);
                    $_POST['project_pdf']= $file_name;
                  $_POST['pdf_name']=$_FILES["project_pdf"]["name"];
                }
            endif;
            $_POST['user_id']=$user_id;
            $this->project->update($_POST);
            $data['user']=$this->account->get_user_detail_by_id($user_id)->result_array()[0];
            $data['project']=$this->project->get_project_by_user_id($user_id)->result_array();
            if(count($data['project'])!=0){
                $data['project']=$data['project'][0];
                $data['member']=$this->member->get_all_members($data['project']['project_id'])->result_array();
                $data['teacher']=$this->member->get_all_teachers($data['project']['project_id'])->result_array();
            }
            $this->load->view('account/percenter',$data);
            $this->load->view('templates/footer');
    }

    public function preview_pdf(){
        $user_id=$this->account->loginAuthorize();
        $project=$this->project->get_project_by_user_id($user_id)->result_array()[0];   
        $path = dirname(APPPATH).'/documents/projects/'.$user_id.'/'.$project['project_pdf']; 
        header('Content-type: application/pdf'); 
        header('filename='.$path); 
        readfile($path); 
    }
}