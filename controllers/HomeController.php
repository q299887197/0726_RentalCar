<?php

class HomeController extends Controller {

    
    ///=================================================================
    ////  首頁
    ///=================================================================
    function index() { 
        $this->view("index");
    }
    
    ///=================================================================
    ////  關於我們
    ///=================================================================    
    function about(){
        $this->view("about");
    }
    
    ///=================================================================
    ////  租車
    ///=================================================================
    function rentalCar(){
        $this->view("rentalCar");
    }
    
    ///=================================================================
    ////  租車內的 注意事項
    ///=================================================================
    function rentalCar_notice(){
        $this->view("rentalCar_notice");
    }
    
    
    ///=================================================================
    ////  租車內的 車款介紹
    ///=================================================================
    function showAllCar(){                   ///顯示所有車款
        $shoeCar=$this ->model("showCar");
        $data['active'] = "allCar";
        $data['cars'] = $shoeCar->showAllcar();
        $data['msg'] = "顯示成功";
        $this->view("rentalCar_showCar", $data);
    }
    
    function showCar($class){               ///顯示小客車或者休旅車
        $shoeCar=$this ->model("showCar");
        $data['active'] = $class;
        $data['cars'] = $shoeCar->showCarByClass($class);
        $data['msg'] = "顯示成功";
        $this->view("rentalCar_showCar", $data);
    }
        
        
    ///=================================================================
    ////  租車內的 我要租車
    ///=================================================================
    function rentalCar_iwantCar(){
        $this->view("rentalCar_iwantCar");
    }
    
    function GOrentalCar(){              //rentalCar_iwantCar.php 租車頁確定送出租車動作
        if (isset($_POST["iwantCar"])) 
        {
            $GOrentalCar = $this ->model("crud");
    		$sUserName = $_COOKIE["userName"];
            $getCar =  $_POST['getCar'];
            $backCar =  $_POST['backCar'];
            $data['carGoName'] = $carGoName =  $_POST['carGoName'];
            $data['getDate'] = $getDate =  $_POST['getDate'];
            $data['backDate'] = $backDate =  $_POST['backDate'];
            $carSpecies = $_POST['carSpecies'];
            $carModel =  $_POST['carModel']; 
            $Date = date("Y-m-d H:i:s",strtotime($time1."+8 hour")); //租車訂單時的時間
            if($carGoName != null && $getCar != null && $backCar != null && $getDate != null && $backDate != null && $carSpecies != null  && $carModel != null ){ //內容不能為空值
                if($Date<$getDate && $Date<$backDate && $getDate<$backDate){  //租車時間不可小於目前時間 還車時間不可小於租車時間
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
                       $GOrentalCar -> create_iwantCar($sUserName,$Date,$carGoName,$getCar,$backCar,$getDate,$backDate,$carSpecies,$carModel);
                    		echo "<script language='javascript'> alert('租車成功,服務員會與您聯絡唷!');location.href='../Home/blog_record'; </script>";
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
        $this->view("contact");
    }
    
    ///=================================================================
    ////  會員專區
    ///=================================================================
    function blog(){
        $sUserName = $_COOKIE["userName"];
        $recordID = $this->model("crud");
        $display = $this->model("crud");
        $sUserName = $_COOKIE["userName"];
        $result = $display->read_CarRecord($sUserName);
        $Date = date("Y-m-d H:i:s",strtotime($time1."+8 hour"));

        $data['display'] = $result;
        $data['getDate'] = $Date;
        
        $this->view("blog",$data);
        
        if($_GET['id']){            //觸發租車刪除事件
        $id = $_GET["id"];
        $recordID->delete_record($id);
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
        $sUserName = $_COOKIE["userName"];
        $display = $this->model("crud");
        $result = $display->read_change($sUserName);
        $row = mysql_fetch_row($result);
        $data[1] = $row[1];
        $data[2] = $row[2];
        $data[3] = $row[3];
        $data[4] = $row[4];
        $data[5] = $row[5];
        $data[6] = $row[6];
        $this->view("blog_change",$data);
    }
    
    
    
    ///=================================================================
    ////  會員專區內的 會員資料內的 資料修改
    ///=================================================================
    function blog_change_write(){  //導頁到修改會員頁
        $sUserName = $_COOKIE["userName"];
        $display = $this->model("crud");
        $result = $display->read_change($sUserName);
        $row = mysql_fetch_row($result);
        $data[1] = $row[1];
        $data[2] = $row[2];
        $data[3] = $row[3];
        $data[4] = $row[4];
        $data[5] = $row[5];
        $data[6] = $row[6];
        $this->view("blog_change_write",$data);
    }
    
    function updata_blog(){         //修改會員資料送出後的資料庫update更新

    if (isset($_POST["OK"])) 
    { 
      $updataBlog = $this->model("crud");
      $sUserName = $_COOKIE["userName"];
      $MemberPW = $_POST['newMemberPW'];
      $MemberPW2 = $_POST['newMemberPW2'];
      $MemberTEL = $_POST['newMemberTEL'];
      $MemberEM = $_POST['newMemberEM'];
      if($MemberPW != null && $MemberPW2 != null && $MemberTEL != null && $MemberEM != null ){ //不能為空值
          if($MemberPW == $MemberPW2){ //驗證密碼是否兩次都相同
          //更新資料庫資料語法
          $updataBlog->update_blogWrite($MemberPW,$MemberPW2,$MemberTEL,$MemberEM,$sUserName);
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
    ////  會員專區內的 租車紀錄
    ///=================================================================
    function blog_record(){
        $sUserName = $_COOKIE["userName"];
        $display = $this->model("crud");
        $data = $result = $display->read_CarRecord($sUserName);
        $this->view("blog_record",$data);
    }
    
    
    ///=================================================================
    ////  會員登入
    ///=================================================================
    function member(){
    $this->view("member");
    }
 
    function login(){    //member 會員頁面 按確定動作
    if (isset($_POST["btnOK"])) 
    {
        $login = $this->model("login");
        $data[1] = $sUserName = $_POST["txtUserName"];
    	$sUserPassword = $_POST["txtPassword"];
    
    	if($sUserName != null && $sUserPassword != null){  // 帳號密碼不能為空直
        	//讀取sql_RentalCar資料庫的memberID  , 搜尋條件為 $MemberID
        	$result = $login -> member_login($sUserName);
        	$row = @mysql_fetch_row($result); 
        	
        	if($row[1] == $sUserName && $row[2] == $sUserPassword){
        	    
        		setcookie("userName", $sUserName, time()  +9900, "/");
        		if (isset($_COOKIE["lastPage"])){
        			header(sprintf("Location: ../Home/%s", $_COOKIE["lastPage"]));   //抓到lastPage的cookie返回到指定位子
        			setcookie("lastPage", "blog", time() - 3600,"/");                //清除返回bolg.php的cookie
        		}
        		elseif(isset($_COOKIE["goiWantCar"])){
        			header(sprintf("Location: ../Home/%s", $_COOKIE["goiWantCar"])); //抓到goiWantCar的cookie返回到指定位子
        			setcookie("goiWantCar", "rentalCar_iwantCar", time() - 3600,"/"); //清除返回bolg.php的cookie
        		}
        		else
        		    header("Location: ../Home/index");
        		  //$this->view("index");
        	    exit();
        	}
        	else
        		echo "<script language='javascript'> alert('帳號密碼錯誤');</script>";
        		$this->view("member",$data);  //將寫過的資料保留存回登入頁
        		
    	}
		else
		echo "<script language='javascript'> alert('請輸入正確帳號密碼');</script>";
		$this->view("member",$data);  //將寫過的資料保留存回登入頁

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
        $this->view("newMember");
    }
    
    function register(){            //註冊頁面按下註冊紐觸發事件
        if (isset($_POST["register"])) 
        {
            $registerID = $this->model("crud");
            $register = $this->model("crud");
            
        	$data[1] = $MemberID = $_POST['newMemberID'];
        	 $MemberPW = $_POST['newMemberPW'];
        	$data[2] = $MemberTEL = $_POST['newMemberTEL'];
        	$data[3] = $MemberEM = $_POST['newMemberEM'];
        	$data[4] = $MemberBD = $_POST['newMemberBD'];
        	$Date = date("Y-m-d H:i:s",strtotime($time1."+8 hour"));
        	if($MemberID != null && $MemberPW != null && $MemberTEL != null && $MemberEM != null && $MemberBD != null ){ //不能為空值
            	$result = $registerID -> read_register($MemberID);		
            	$row = @mysql_fetch_row($result);
            	if ( $row[1] == $id)  //比對帳號是否有相同重複
            	{
                	if($_POST['newMemberPW'] == $_POST['newMemberPW2']){ //驗證密碼是否兩次都相同
                	  $register -> create_register($MemberID,$MemberPW,$MemberTEL,$MemberEM,$MemberBD,$Date);
                	  setcookie("nweMember");
                	  header("location: ../Home/index"); //轉址, 會員專區沒有登入cookie會被請到 member登入頁面
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