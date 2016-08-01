<?php

class HomeController extends Controller {
    
    ///=================================================================
    ////  首頁
    ///=================================================================
    function index() { 
        $session = $this->model("session");
        $data['sUserName'] = $session -> session_in_out();
        $this->view("index",$data);
    }
    
    
    ///=================================================================
    ////  關於我們
    ///=================================================================    
    function about(){
        $session = $this->model("session");
        $data['sUserName'] = $session -> session_in_out();
        $this->view("about",$data);
    }
    
    
    ///=================================================================
    ////  租車
    ///=================================================================
    function rentalCar(){
        $session = $this->model("session");
        $data['sUserName'] = $session -> session_in_out();
        $this->view("rentalCar",$data);
    }
    
    
    ///=================================================================
    ////  租車內的 注意事項
    ///=================================================================
    function rentalCar_notice(){
        $session = $this->model("session");
        $data['sUserName'] = $session -> session_in_out();
        $this->view("rentalCar_notice",$data);
    }
    
    
    ///=================================================================
    ////  租車內的 車款介紹
    ///=================================================================
    function showAllCar(){                   ///顯示所有車款
        $session = $this->model("session");
        $data['sUserName'] = $session -> session_in_out();
        $shoeCar=$this ->model("showCar");
        $data['active'] = "allCar";
        $data['cars'] = $shoeCar->showAllcar_pdo();
        $this->view("rentalCar_showCar", $data);
    }
    
    function showCar($class){               ///顯示小客車或者休旅車
        $session = $this->model("session");
        $data['sUserName'] = $session -> session_in_out();
        $shoeCar=$this ->model("showCar");
        $data['active'] = $class;
        $data['cars'] = $shoeCar->showCarByClass_pdo($class);
        $this->view("rentalCar_showCar", $data);
    }
        
        
    ///=================================================================
    ////  租車內的 我要租車
    ///=================================================================
    function rentalCar_iwantCar(){
        $session = $this->model("session");
        $session -> cookieGoBlog("rentalCar_iwantCar");
        $data['sUserName'] = $session -> session_in_out();
        $this->view("rentalCar_iwantCar",$data);
    }
    
    function GOrentalCar(){              //rentalCar_iwantCar.php 租車頁確定送出租車動作
        if (isset($_POST["iwantCar"])) 
        {
            $session = $this->model("session");
            $data['sUserName'] = $session -> session_in_out();
            $GOrentalCar = $this ->model("crud");
            $getCar =  $_POST['getCar'];
            $backCar =  $_POST['backCar'];
            $data['carGoName'] = $_POST['carGoName'];
            $data['getDate'] =  $_POST['getDate'];
            $data['backDate'] = $_POST['backDate'];
            $carSpecies = $_POST['carSpecies'];
            $carModel =  $_POST['carModel']; 
            $Date = date("Y-m-d H:i:s",strtotime($time1."+8 hour")); //租車訂單時的時間
            if($data['carGoName'] != null && $getCar != null && $backCar != null && $data['getDate'] != null && $data['backDate'] != null && $carSpecies != null  && $carModel != null ){ //內容不能為空值
                if($Date<$data['getDate'] && $Date<$data['backDate'] && $data['getDate']<$data['backDate']){  //租車時間不可小於目前時間 還車時間不可小於租車時間
                      switch($carSpecies){
                       case '1' :
                        $carSpecies='小客車-豐田';
                        break;
                       case '2' :
                        $carSpecies='小客車-日產';
                        break;
                       case '3' :
                        $carSpecies='小客車-三菱';
                        break;
                       case '4' :
                        $carSpecies='休旅車-納智捷';
                        break;
                       case '5' :
                        $carSpecies='休旅車-日產';
                        break;
                       case '6' :
                        $carSpecies='休旅車-三菱';
                        break;
                      }
                       $GOrentalCar -> create_iwantCar_pdo($data['sUserName'],$Date,$data['carGoName'],$getCar,$backCar,$data['getDate'],$data['backDate'],$carSpecies,$carModel);
                       $data['timeNO'] = "<script language='javascript'> alert('租車成功,服務員會與您聯絡唷!');location.href='../Home/blog'; </script>";
                       $this->view("blog",$data);
                }
                else 
                    $data['timeNO']="<script language='javascript'> alert('您輸入的時間有錯誤'); </script>";
                    $this->view("rentalCar_iwantCar",$data);  //將寫過的資料保留存回登入頁
            }
            else 
                $data['timeNO']="<script language='javascript'> alert('請輸入完整資料'); </script>";
                $this->view("rentalCar_iwantCar",$data);  //將寫過的資料保留存回登入頁
        }
    }
    
    
    ///=================================================================
    ////  服務據點
    ///=================================================================
    function contact(){
        $session = $this->model("session");
        $data['sUserName'] = $session -> session_in_out();
        $this->view("contact",$data);
    }
    
    
    ///=================================================================
    ////  會員專區>>目前訂單
    ///=================================================================
    function blog(){
        $session = $this->model("session");
        $session -> cookieGoBlog("blog");
        $data['sUserName'] = $session -> session_in_out();
        $recordID = $this->model("crud");
        $display = $this->model("crud");
        $resultDS = $display->read_CarRecord_pdo($data['sUserName']);
        $Date = date("Y-m-d H:i:s",strtotime($time1."+8 hour"));
        $data['display'] = $resultDS;
        $data['getDate'] = $Date;
        
        if($_GET["id"]){            //觸發租車刪除事件
            $result = $recordID->delete_record_pdo($_GET["id"]);
            if($result){                 //判斷是否正確執行
                header("Location: ../Home/blog");                                  //都沒有則導回首頁
        	    exit();
            }
            else{
                $data["alert"]="<script language='javascript'> alert('刪除失敗'); </script>";
                $this->view("blog",$data);
            }
        }
        $this->view("blog",$data);
    }
    
    
    ///=================================================================
    ////  會員專區內的 會員資料顯示
    ///=================================================================
    function blog_change(){
        $session = $this->model("session");
        $session -> cookieGoBlog("blog");
        $data['sUserName'] = $session -> session_in_out();
        $display = $this->model("crud");

        $result = $display->read_change_pdo($data['sUserName']);
        // $row = mysql_fetch_row($result);
        foreach ($result as $row) {
            $data['memberID'] = $row[1];
            $data['memberTEL'] = $row[3];
            $data['memberEM'] = $row[4];
            $data['memberBD'] = $row[5];
            $data['memberDate'] = $row[6];
        }
        $this->view("blog_change",$data);
    }
    
    
    ///=================================================================
    ////  會員專區內的 會員資料內的 資料修改
    ///=================================================================
    function blog_change_write(){  //導頁到修改會員頁
        $session = $this->model("session");
        $session -> cookieGoBlog("blog");
        $data['sUserName'] = $session -> session_in_out();
        $display = $this->model("crud");
        $result = $display->read_change_pdo($data['sUserName']);
        foreach($result as $row){
            // $row = mysql_fetch_row($result);
            $data['memberID'] = $row[1];
            $data['memberPW'] = $row[2];
            $data['memberTEL'] = $row[3];
            $data['memberEM'] = $row[4];
            $data['memberBD'] = $row[5];
            $data['memberDate'] = $row[6];
        }
        $this->view("blog_change_write",$data);
    }
    
    function updata_blog(){         //修改會員資料送出後的資料庫update更新
    if (isset($_POST["OK"])) 
    { 
      $session = $this->model("session");
      $updataBlog = $this->model("crud");
      $data['sUserName'] = $session -> session_in_out();
      $data['memberPW'] = $_POST['newMemberPW'];
      $MemberPW2 = $_POST['newMemberPW2'];
      $data['memberTEL'] = $_POST['newMemberTEL'];
      $data['memberEM'] = $_POST['newMemberEM'];
      $data['memberBD'] = $_POST['newMemberBD'];
      $data['memberDate'] = $_POST['newMemberDate'];
      
      $result=$updataBlog->update_blogWrite_pdo123($data['memberPW'],$MemberPW2,$data['memberTEL'],$data['memberEM'],$data['sUserName']);
      $data["alert"] = $result["alert"];
      $dataGo= $result["go"];
      if($result["login"]=="OK"){                                                     //修改成功後進會員資料顯示註冊成功
    	  $this->view("$dataGo",$data);
      }
      elseif($result){                                                                //修改失敗傳回執並顯示訊息
    	  $this->view("$dataGo",$data);
      }
    }
    
    if (isset($_POST["No"])) //修改會員資料頁面bolg_change_write.php按下取消返回會員資料頁 blog_change.php
    {
    	header("Location: ../Home/blog_change");
    	exit();
    }
    }
    
    
    ///=================================================================
    ////  會員專區>>租車紀錄
    ///=================================================================
    function blog_record(){
        $session = $this->model("session");
        $session -> cookieGoBlog("blog");
        $data['sUserName'] = $session -> session_in_out();
        $display = $this->model("crud");
        $data['record'] = $display->read_CarRecord_pdo($data['sUserName']);
        
        $this->view("blog_record",$data);
    }
    
    
    ///=================================================================
    ////  會員登入
    ///=================================================================
    function member(){
        $logout = $this->model("login");
        $data["alert"]=$logout->member_logout();
        $this->view("member",$data);
    }
 
    function login(){                                                                   //member 會員頁面 登入動作動作
    if (isset($_POST["btnOK"])) 
    {
        $login = $this->model("login");                                                 //指定models資料夾內的login.php
        $data["UserName"] = $_POST["txtUserName"];                                  //讀取輸入的帳號密碼
    	$sUserPassword = $_POST["txtPassword"];
    	$result = $login -> member_login($data["UserName"],$sUserPassword);	            //讀取login.php資料庫內member_login的function
    	$data["alert"] = $result["alert"];
    	$dataGo= $result["go"];

    	if($result["login"]=="OK"){                                                     //登入成功後判斷cookie而導頁
    	    header("Location: ../Home/$dataGo");
    	    exit();
    	}
    	elseif($result){                                                                //登入失敗傳回執並顯示訊息
    	    $this->view("$dataGo",$data);
    	}
    } ///////////////////  login() 結束束
    
    
    if (isset($_POST["btnMember"])) //按下註冊鈕前往註冊頁面 newMember
    {
    	header("Location: ../Home/newMember");
    	exit();
    }
    }
    
    
    ///=================================================================
    ////  會員註冊
    ///=================================================================
    function newMember(){
        $session = $this->model("session");
        $data['sUserName'] = $session -> session_in_out();
        $this->view("newMember",$data);
    }
    
    function register(){            //註冊頁面按下註冊紐觸發事件
        if (isset($_POST["register"])) 
        {
            $session = $this->model("session");
            $data['sUserName'] = $session -> session_in_out();
            $registerID = $this->model("crud");
        
        	$data['$MemberID'] = $_POST['newMemberID'];
        	$MemberPW = $_POST['newMemberPW'];
        	$MemberPW2= $_POST['newMemberPW2'];
        	$data['$MemberTEL'] = $_POST['newMemberTEL'];
        	$data['$MemberEM']  = $_POST['newMemberEM'];
        	$data['$MemberBD']  = $_POST['newMemberBD'];
        	$Date = date("Y-m-d H:i:s",strtotime($time1."+8 hour"));
            $result = $registerID -> read_change_pdo123($data['$MemberID'],$MemberPW,$MemberPW2,$data['$MemberTEL'],$data['$MemberEM'],$data['$MemberBD'],$Date);
        	$data["alert"] = $result["alert"];
        	$dataGo= $result["go"];
    
        	if($result["login"]=="OK"){                                                     //註冊成功後進首頁顯示註冊成功
        	   // header("Location: ../Home/$dataGo");
        	   // exit();
        	   $this->view("$dataGo",$data);
        	}
        	elseif($result){                                                                //登入失敗傳回執並顯示訊息
        	    $this->view("$dataGo",$data);
        	}
        }
    } ///////////////////////  register() 結束


}


// https://codeigniter.org.tw/forum/viewtopic.php?f=7&t=2800    MVC觀念教學
?>