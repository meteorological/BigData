//<summary>
//文件名:if_info_standard.js
//作者：JKVX
//创建日期：2016-10-08
//描述:检查身份证号、姓名、手机号、密码、邮箱等信息是否符合规范，可用于注册、信息完善等网页的js信息判断
//修改日期：2016-10-08
//Email:357800013@qq.com
//</summary>

/**
 *检查身份证号是否合法
 *@param id_number
 *返回值 合法时true;不合法时false
 */
function if_id_number_standard(id_number){ 
    if(id_number.length!=0){ 
      if(!check_id_number(id_number)){ 
        return false;
      }else{ 
        return true;
      } 
    }
    return false;  
} 

/**
 *检查真实姓名是否合法:2-16个纯中文字
 *@param name
 *return 合法时true;不合法时false
 */
function if_name_standard(name){
  var reg=/^[\u4e00-\u9fa5]{2,16}$/;
  if(!reg.test(user_fullname)){
    return false;
  }
  return true;       
}

/**
 *检查手机号是否合法：13\15\18开始的11位手机号
 *@param telephone
 *return 合法时true;不合法时false
 */
function if_telephone_standard(telephone){
  var reg=/^(((13[0-9]{1})|(15[0-9]{1})|(18[0-9]{1}))+\d{8})$/;
  if(!reg.test(telephone)){
    return false;
  }
  return true;
}

/**
 *检查手机号是否合法：13\15\18开始的11位手机号
 *@param telephone
 *return 合法时true;不合法时false
 */
function if_addmission_year_standard(admission_year){
  var reg=/^((20[0-1]{1}[0-9]{1}))$/;
  if(!reg.test(admission_year)){
    return false;
  }
  return true;
}

/**
 *检查邮箱是否合法
 *@param email
 *return 合法时true;不合法时false
 */
function if_email_standard(email){
  var reg=/^([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$/;
  if(!reg.test(email)){
    return false;
  }
  return true;
}

/**
 *检查密码是否合法：6-18位字母与数组组成的密码
 *@param password
 *return 合法时true;不合法时false
 */
function if_password_standard(password){
  var reg=/^(?![0-9]+$)(?![a-zA-Z]+$)[0-9A-Za-z]{6,18}$/;
  if(!reg.test(password)){
    return false;
  }
  return true;
}
/************************if_id_number_standard Private Function************************************/
/*省份编号*/
var vcity={ 11:"北京",12:"天津",13:"河北",14:"山西",15:"内蒙古", 
    21:"辽宁",22:"吉林",23:"黑龙江",31:"上海",32:"江苏", 
    33:"浙江",34:"安徽",35:"福建",36:"江西",37:"山东",41:"河南", 
    42:"湖北",43:"湖南",44:"广东",45:"广西",46:"海南",50:"重庆", 
    51:"四川",52:"贵州",53:"云南",54:"西藏",61:"陕西",62:"甘肃", 
    63:"青海",64:"宁夏",65:"新疆",71:"台湾",81:"香港",82:"澳门",91:"国外"}; 

/**
 *身份证号是否符合规范
 *@param obj
 *return 符合规范：true;不符合规范:false
 */
check_id_number = function(obj) { 
  //校验长度，类型 
  if(isCardNo(obj) === false) 
  { 
    return false; 
  } 
  //检查省份 
  if(checkProvince(obj) === false) 
  { 
    return false; 
  } 
  //校验生日 
  if(checkBirthday(obj) === false) 
  { 
    return false; 
  } 
  //检验位的检测 
  if(checkParity(obj) === false) 
  { 
    return false; 
  } 
  return true; 
 };

/**
 *身份证号长度、格式是否符合规范
 *@param obj
 *return obj长度为15位且为纯数字或obj长度为18位且前17位为纯数字，最后一位为数字或X：true;其他:false
 */
isCardNo = function(obj) { 
  //身份证号码为15位或者18位，15位时全为数字，18位前17位为数字，最后一位是校验位，可能为数字或字符X 
  var reg = /(^\d{15}$)|(^\d{17}(\d|X)$)/; 
  if(reg.test(obj) === false) 
  { 
    return false; 
  } 
  return true; 
}; 

/**
 *身份证号省份是否符合规范
 *@param obj
 *return obj省份在省份编码中有定义：true;其他:false
 */
checkProvince = function(obj) { 
  var province = obj.substr(0,2); 
  if(vcity[province] == undefined) { 
    return false; 
  } 
  return true; 
};

/**
 *身份证号年月日是否符合规范
 *@param obj
 *return 年月日符合规范：true;其他:false
 */
checkBirthday = function(obj) { 
  var len = obj.length; 
  //身份证15位时，次序为省（3位）市（3位）年（2位）月（2位）日（2位）校验位（3位），皆为数字 
  if(len == '15') { 
    var re_fifteen = /^(\d{6})(\d{2})(\d{2})(\d{2})(\d{3})$/; 
    var arr_data = obj.match(re_fifteen); 
    var year = arr_data[2]; 
    var month = arr_data[3]; 
    var day = arr_data[4]; 
    var birthday = new Date('19'+year+'/'+month+'/'+day); 
    return verifyBirthday('19'+year,month,day,birthday); 
  } 
  //身份证18位时，次序为省（3位）市（3位）年（4位）月（2位）日（2位）校验位（4位），校验位末尾可能为X 
  if(len == '18') { 
    var re_eighteen = /^(\d{6})(\d{4})(\d{2})(\d{2})(\d{3})([0-9]|X)$/; 
    var arr_data = obj.match(re_eighteen); 
    var year = arr_data[2]; 
    var month = arr_data[3]; 
    var day = arr_data[4]; 
    var birthday = new Date(year+'/'+month+'/'+day); 
    return verifyBirthday(year,month,day,birthday); 
  } 
  return false; 
};

/**
 *身份证号年月份与生日是否符合规范
 *@param obj
 *return 年月日符合规范：true;其他:false
 */
verifyBirthday = function(year,month,day,birthday) { 
  var now = new Date(); 
  var now_year = now.getFullYear(); 
  //年月日是否合理 
  if(birthday.getFullYear() == year && (birthday.getMonth() + 1) == month && birthday.getDate() == day) { 
    //判断年份的范围（3岁到100岁之间) 
    var time = now_year - year; 
    if(time >= 0 && time <= 130) { 
      return true; 
    } 
    return false; 
  } 
  return false; 
};

/**
 *身份证号校验位检测
 *@param obj
 *return obj长度为18位且obj校验位正确：true;其他:false
 */
checkParity = function(obj) { 
  //15位转18位 
  obj = changeFivteenToEighteen(obj); 
  var len = obj.length; 
  if(len == '18') { 
    var arrInt = new Array(7, 9, 10, 5, 8, 4, 2, 1, 6, 3, 7, 9, 10, 5, 8, 4, 2); 
    var arrCh = new Array('1', '0', 'X', '9', '8', '7', '6', '5', '4', '3', '2'); 
    var cardTemp = 0, i, valnum; 
    for(i = 0; i < 17; i ++) { 
      cardTemp += obj.substr(i, 1) * arrInt[i]; 
    } 
    valnum = arrCh[cardTemp % 11]; 
    if (valnum == obj.substr(17, 1)) { 
      return true; 
    } 
    return false; 
  } 
  return false; 
}; 

/**
 *15位转18位身份证号
 *@param obj
 *return obj为15位时：转化后的18位身份证号;obj不为15位时:未做转化的obj 
 */
changeFivteenToEighteen = function(obj) 
{ 
  if(obj.length == '15') 
  { 
    var arrInt = new Array(7, 9, 10, 5, 8, 4, 2, 1, 6, 3, 7, 9, 10, 5, 8, 4, 2); 
    var arrCh = new Array('1', '0', 'X', '9', '8', '7', '6', '5', '4', '3', '2'); 
    var cardTemp = 0, i;  
    obj = obj.substr(0, 6) + '19' + obj.substr(6, obj.length - 6); 
    for(i = 0; i < 17; i ++) { 
      cardTemp += obj.substr(i, 1) * arrInt[i]; 
    } 
    obj += arrCh[cardTemp % 11]; 
    return obj; 
  } 
  return obj; 
};

function scCard(scCard){ 
/*  var scType=document.getElementById("sc_card_type").value; 
  if(scType=="1"){ 
    var scCard=document.getElementById("sc_card_num").value; */
    if(scCard.length!=0){ 
      if(!checkCard(scCard)){ 
        /*$("#errorTips").html("身份证号码格式错误"); */
        return false;
      }else{ 
        /*$("#errorTips").html(""); */
        return true;
      } 
    }  
  /*return false; */
} 
 //function checkidno(obj) { 
var vcity={ 11:"北京",12:"天津",13:"河北",14:"山西",15:"内蒙古", 
    21:"辽宁",22:"吉林",23:"黑龙江",31:"上海",32:"江苏", 
    33:"浙江",34:"安徽",35:"福建",36:"江西",37:"山东",41:"河南", 
    42:"湖北",43:"湖南",44:"广东",45:"广西",46:"海南",50:"重庆", 
    51:"四川",52:"贵州",53:"云南",54:"西藏",61:"陕西",62:"甘肃", 
    63:"青海",64:"宁夏",65:"新疆",71:"台湾",81:"香港",82:"澳门",91:"国外"}; 
checkCard = function(obj) { 
  //var card = document.getElementById('card_no').value; 
  //是否为空 
  // if(card === '') 
  // { 
  //  return false; 
  //} 
  //校验长度，类型 
  if(isCardNo(obj) === false) 
  { 
    return false; 
  } 
  //检查省份 
  if(checkProvince(obj) === false) 
  { 
    return false; 
  } 
  //校验生日 
  if(checkBirthday(obj) === false) 
  { 
    return false; 
  } 
  //检验位的检测 
  if(checkParity(obj) === false) 
  { 
    return false; 
  } 
  return true; 
 }; 
