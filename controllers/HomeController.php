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
        $data['cars'] = $shoeCar->showAllcar();
        $this->view("rentalCar_showCar", $data);
    }
    
    function showCar($class){               ///顯示小客車或者休旅車
        $session = $this->model("session");
        $data['sUserName'] = $session -> session_in_out();
        $shoeCar=$this ->model("showCar");
        $data['active'] = $class;
        $data['cars'] = $shoeCar->showCarByClass($class);
        $this->view("rentalCar_showCar", $data);
    }
        
        
    ///=================================================================
    ////  租車內的 我要租車
    ///=================================================================
    function rentalCar_iwantCar(){
        $session = $this->model("session");
        $data['sUserName'] = $session -> session_in_out();
        $this->view("rentalCar_iwantCar",$data);
    }
    
    function GOrentalCar(){              //rentalCar_iwantCar.php 租車頁確定送出租車動作
        if (isset($_POST["iwantCar"])) 
        {
            $session = $this->model("session");
            $data['sUserName'] = $session -> session_in_out();
            $GOrentalCar = $this ->model("crud");
    		$sUserName = $_SESSION["userName"];
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
                       $GOrentalCar -> create_iwantCar_pdo($sUserName,$Date,$data['carGoName'],$getCar,$backCar,$data['getDate'],$data['backDate'],$carSpecies,$carModel);
                    		echo "<script language='javascript'> alert('租車成功,服務員會與您聯絡唷!');location.href='../Home/blog'; </script>";
                }
                else 
                    echo "<script language='javascript'> alert('您輸入的時間有錯誤');</script>";
                    $this->view("rentalCar_iwantCar",$data);  //將寫過的資料保留存回登入頁
            }
            else 
                echo "<script language='javascript'> alert('請輸入完整資料');location.href='../Home/rentalCar_iwantCar'; </script>";
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
        $data['sUserName'] = $session -> session_in_out();
        $recordID = $this->model("crud");
        $display = $this->model("crud");
        $sUserName = $_SESSION["userName"];
        $result = $display->read_CarRecord_pdo($sUserName);
        $Date = date("Y-m-d H:i:s",strtotime($time1."+8 hour"));

        $data['display'] = $result;
        $data['getDate'] = $Date;
        
        $this->view("blog",$data);
        
        if($_GET['id']){            //觸發租車刪除事件
        $id = $_GET["id"];
        $recordID->delete_record_pdo($id);
        if($result)                 //判斷是否正確執行
        echo "<script language='javascript'> alert('刪除成功');location.href='../Home/blog'; </script>";
        else
        echo "<script language='javascript'> alert('刪除失敗');location.href='../Home/blog'; </script>";
        }
    }
    
    
    ///=================================================================
    ////  會員專區內的 會員資料顯示
    ///=================================================================
    function blog_change(){
        $session = $this->model("session");
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
        $data['sUserName'] = $session -> session_in_out();
        $sUserName = $_SESSION["userName"];
        $display = $this->model("crud");
        $result = $display->read_change_pdo($sUserName);
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
      $updataBlog = $this->model("crud");
      $sUserName = $_SESSION["userName"];
      $MemberPW = $_POST['newMemberPW'];
      $MemberPW2 = $_POST['newMemberPW2'];
      $MemberTEL = $_POST['newMemberTEL'];
      $MemberEM = $_POST['newMemberEM'];
      if($MemberPW != null && $MemberPW2 != null && $MemberTEL != null && $MemberEM != null ){ //不能為空值
          if($MemberPW == $MemberPW2){ //驗證密碼是否兩次都相同
          //更新資料庫資料語法
          $updataBlog->update_blogWrite_pdo($MemberPW,$MemberTEL,$MemberEM,$sUserName);
          echo "<script language='javascript'> alert('修改完成!');location.href='../Home/blog_change'; </script>";
          }
          else
           echo "<script language='javascript'> alert('密碼不一致');location.href='../Home/blog_change'; </script>";
          }
      else
      	echo "<script language='javascript'> alert('請輸入完整資料');location.href='../Home/blog_change'; </script>";
        }
    
    
    if (isset($_POST["No"])) //修改會員資料頁面bolg_change_write.php按下取消返回會員資料頁 blog_change.php
    {
    	header("Location: ../Home/blog_change");
    }
    }
    ///=================================================================
    ////  會員專區>>租車紀錄
    ///=================================================================
    function blog_record(){
        $session = $this->model("session");
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
        $logout->member_logout();
        $this->view("member");
    }
 
    function login(){                                                                   //member 會員頁面 登入動作動作
    if (isset($_POST["btnOK"])) 
    {
        $login = $this->model("login");                                                 //指定models資料夾內的login.php
        $data[1] = $sUserName = $_POST["txtUserName"];                                  //讀取輸入的帳號內容
    	$sUserPassword = $_POST["txtPassword"];                                         //讀取輸入的密碼內容
    	
    	if($sUserName != null && $sUserPassword != null){                               // 帳號密碼不能為空直
        	$result = $login -> member_login($sUserName);	            //讀取sql_RentalCar資料庫的memberID  , 搜尋條件為 $MemberID
        // 	$row = @mysql_fetch_row($result);                                           // 將搜尋到的擺為陣列給$row
        	foreach($result as $row){
        	
        	if($row[1] == $sUserName && $row[2] == $sUserPassword){                     // 比對帳號密碼是否相同
        	    $_SESSION["userName"]=$sUserName;                                       // 正確給予相對應的session

        		if (isset($_COOKIE["lastPage"])){
        			header(sprintf("Location: ../Home/%s", $_COOKIE["lastPage"]));      //抓到lastPage的cookie返回到指定位子
        			setcookie("lastPage", "blog", time() - 3600,"/");                   //清除返回bolg.php的cookie
        		}
        		elseif(isset($_COOKIE["goiWantCar"])){
        			header(sprintf("Location: ../Home/%s", $_COOKIE["goiWantCar"]));    //抓到goiWantCar的cookie返回到指定位子
        			setcookie("goiWantCar", "rentalCar_iwantCar", time() - 3600,"/");   //清除返回rentalCar_iwantCar.php的cookie
        		}
        		else
        		    header("Location: ../Home/index");                                  //都沒有則導回首頁
        	    exit();
        	}
        	else
        		echo "<script language='javascript'> alert('帳號密碼錯誤');</script>";  //跳窗顯示帳號密碼錯誤
        		$this->view("member",$data);                                            //將寫過的資料保留存回登入頁
    	}
    	}
		else
		echo "<script language='javascript'> alert('請輸入正確帳號密碼');</script>";    //跳窗顯示帳號密碼錯誤
		$this->view("member",$data);                                                    //將寫過的資料保留存回登入頁

    } ///////////////////  login() 結束
    
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
            $register = $this->model("crud");
        
        	$data['$MemberID'] = $_POST['newMemberID'];
        	$MemberPW = $_POST['newMemberPW'];
        	$data['$MemberTEL'] = $_POST['newMemberTEL'];
        	$data['$MemberEM']  = $_POST['newMemberEM'];
        	$data['$MemberBD']  = $_POST['newMemberBD'];
        	$Date = date("Y-m-d H:i:s",strtotime($time1."+8 hour"));
        	if($data['$MemberID'] != null && $MemberPW != null && $data['$MemberTEL'] != null && $data['$MemberEM'] != null && $data['$MemberBD'] != null ){ //不能為空值
            	$result = $registerID -> read_change_pdo($data['$MemberID']);
            	foreach($result as $row);

            	if ( $row[1] == $id)  //比對帳號是否有相同重複
            	{
                	if($_POST['newMemberPW'] == $_POST['newMemberPW2']){ //驗證密碼是否兩次都相同
                	  $register -> create_register_pdo($data['$MemberID'],$MemberPW,$data['$MemberTEL'],$data['$MemberEM'],$data['$MemberBD'],$Date);
                	  echo "<script language='javascript'> alert('註冊成功,請重新登入');location.href='../Home/index'; </script>"; //轉址, 註冊完成導回首頁
                	  exit();
                	}
                	else{
                		 echo "<script language='javascript'> alert('密碼輸入不一致'); </script>";
                		 $this->view("newMember",$data);  //將寫過的資料保留存回註冊頁
                	}
            	}
            	else{
            		echo "<script language='javascript'> alert('此帳號使用過了');</script>";
            		$this->view("newMember",$data);  //將寫過的資料保留存回註冊頁
            	}
        	}
        	else{
        		echo "<script language='javascript'> alert('請輸入完整資料');</script>";
        		$this->view("newMember",$data);  //將寫過的資料保留存回註冊頁
        	}																								
        }
    } ///////////////////////  register() 結束


}


// https://codeigniter.org.tw/forum/viewtopic.php?f=7&t=2800    MVC觀念教學
?>