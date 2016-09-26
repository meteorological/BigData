<?php

class Account extends CI_Controller
{

	public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('bigdata_model','bigdata');
        $this->load->model('user_model','user');
        $this->load->library('session');
    }

    /**
	 *前台注册按钮触发事件
	 */
	public function signup(){
		//获取经过处理过的注册信息
		$userdata=$this->info_standard($_POST);
		//数据库插入注册信息
		$this->user->insert($userdata);
		//向注册邮箱发送激活邮件
		$this->mail_send($userdata);
		//跳转到注册页面
		$this->load->view('bigdata/index');
	}

	/**
	 *处理注册信息，判断是否符合已制定的规范，符合返回经过处理的信息，不符合，显示错误信息
	 *@param $userdata
	 */
	private function info_standard($userdata){
		$userdata['username'] = stripslashes(trim($userdata['username']));
		$userdata['email'] = trim($userdata['email']);		
		//检测注册email是否存在	
		$query = $this->user->select_by_username($userdata['email']);
		if(count($query->result_array())!=0){
			show_error("邮箱已存在，请直接登陆");
		}
		if(!preg_match("/^(\w)+(\.\w+)*@(\w)+((\.\w{2,3}){1,3})$/",$userdata['email'])){
			show_error("邮箱格式不正确");
		}
		if($userdata['password']!=$userdata['password_confirm']){
			show_error("两次密码输入不一致");
		}
		if(strlen($userdata['password'])<6){
			show_error("密码长度不能小于6位");
		}
		if(strlen($userdata['password'])>18){
			show_error("密码长度不能大于18位");
		}
		if(!preg_match("/^(?![0-9]+$)(?![a-zA-Z]+$)[0-9A-Za-z]{6,18}$/",$userdata['password'])){
			show_error("密码需要由字母和数组组成");
		}
		if($userdata['identifying_code']!=$this->session->userdata('verification')){
			show_error("验证码不正确");
		}
		$userdata['password'] = md5(trim($userdata['password']));
		unset($userdata['password_confirm']);
		unset($userdata['identifying_code']);
		$userdata['createtime']=time();
		//创建用于激活识别码
		$userdata['token'] = md5($userdata['username'].$userdata['password'].$userdata['createtime']);
		//激活码过期时间为24小时 
		$userdata['token_exptime'] = time()+60*60*24;
		return $userdata;
	}

	/**
	 *发送激活邮件，发送成功返回1，发送失败显示错误信息
	 *@param $userdata
	 */
	private function mail_send($userdata){
		include_once("base_url('libraries/smtp.class.php')");
		//SMTP服务器
		$smtpserver = "smtp.163.com"; 
		//SMTP服务器端口
    	$smtpserverport = 25; 
    	//SMTP服务器的用户邮箱
    	$smtpusermail = "bigdata_test@163.com"; 
    	//SMTP服务器的用户帐号
    	$smtpuser = "bigdata_test@163.com"; 
    	//SMTP服务器的用户密码
    	$smtppass = "adminadmin123"; 
    	//这里面的一个true是表示使用身份验证,否则不使用身份验证.
    	$smtp = new Smtp($smtpserver, $smtpserverport, true, $smtpuser, $smtppass); 
    	//信件类型，文本:text；网页：HTML
    	$emailtype = "HTML"; 
    	//收件邮箱
    	$smtpemailto = $userdata['email'];
    	//发件箱
    	$smtpemailfrom = $smtpusermail;
    	//激活邮件主题
    	$emailsubject = "‘气象+大数据应用’创新创业大赛账号激活";
    	//激活邮件正文
    	$emailbody = "亲爱的".$userdata['username']."：<br/>感谢您注册‘气象+大数据应用’创新创业大赛官方网站帐号。<br/>请点击下列链接激活您的帐号。<br/><a href='http://192.168.31.185:8088/account/verify/?verify=".$userdata['token']."' target='_blank'>http://localhost:8088/account/verify/?verify=".$userdata['token']."</a><br/>如果以上链接无法点击，请将它复制到你的浏览器地址栏中进入访问，该链接24小时内有效。<br/>如果此次激活请求非你本人所发，请忽略本邮件。<br/><p style='text-align:right'></p><p>‘气象+大数据应用’创新创业大赛组委会</p>";
    	$rs = $smtp->sendmail($smtpemailto, $smtpemailfrom, $emailsubject, $emailbody, $emailtype);
		if($rs==1){
			return 1;	
		}else{
			show_error($rs);	
		}
	}

	/**
	 *验证激活，成功激活显示激活信息并跳转到登录页面，激活失败显示错误信息
	 */
	public function verify(){
		$verify = stripslashes(trim($_GET['verify']));
		$nowtime = time();
		$query =$this->user->select_by_token($verify)->result_array();
		if(count($query)!=0){
			if($nowtime>$query[0]['token_exptime']){
				show_error('您的激活有效期已过，请重新注册。');
			}else{
				$query[0]['status']=1;
				$this->user->active($query[0]);
				$msg = '已激活账号!';
			}
		}else{
			show_error('未知错误');	
		}
		echo "<script>alert('$msg');</script>";
		$this->load->view('bigdata/index');
	}

	/**
	 *判断注册账户是否存在，由前台ajax调用
	 */
	public function if_email_exists(){
		$email = trim($_POST['email']);
		$query=$this->user->select_by_email($email)->result_array();
		echo count($query);
	}

	/**
	 *生成验证码图片，返回验证码图片结果
	 */
	public function create_code(){
        function random($len) {
            $srcstr = "1a2s3d4f5g6hj8k9qwertyupzxcvbnm";
            mt_srand();
            $strs = "";
            for ($i = 0; $i < $len; $i++) {
                $strs .= $srcstr[mt_rand(0, 30)];
            }
            return $strs;
        } 
        //随机生成的字符串
        $str = random(4);  
        //验证码图片的宽度
        $width  = 50;       
        //验证码图片的高度
        $height = 25;      
        //声明需要创建的图层的图片格式
        @ header("Content-Type:image/png");
        //创建一个图层
        $im = imagecreate($width, $height); 
        //背景色
        $back = imagecolorallocate($im, 0xFF, 0xFF, 0xFF); 
        //模糊点颜色
        $pix  = imagecolorallocate($im, 187, 230, 247); 
        //字体色
        $font = imagecolorallocate($im, 41, 163, 238); 
        //绘模糊作用的点
        mt_srand();
        for ($i = 0; $i < 1000; $i++) {
            imagesetpixel($im, mt_rand(0, $width), mt_rand(0, $height), $pix);
        }
        //输出字符
        imagestring($im, 5, 7, 5, $str, $font); 
        //输出矩形
        imagerectangle($im, 0, 0, $width -1, $height -1, $font);
        //输出图片
        imagepng($im);
        imagedestroy($im); 
        $this->session->set_userdata('verification',$str);
    }

    /**
	 *前台登陆按钮触发事件
	 */
    public function login(){
    	//检测email是否存在	
		$query = $this->user->select_by_email($_POST['login-email'])->result_array();
		if(count($query)==0){
			show_error("邮箱不存在");
		}
		if($query[0]['status']==0){
			show_error("账号还未激活，请先前往邮箱激活");
		}
		if($query[0]['password']!=md5(trim($_POST['login-password']))){
			show_error("密码不正确");
		}
        $data['bigdata']=$this->bigdata->get_query(-1,-1,1);
		$data['name']=$query[0]['username'];
        $this->session->set_userdata('user',$data['name']);
        $this->load->view('bigdata/data', $data);
    }
}