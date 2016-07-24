<meta charset="utf-8">
<?php

include_once 'models/class.crud.php';
$crud = new CRUD();


// if (isset($_POST["btnOK"])) //member.php 會員頁面 按確定動作
// {
// 	$sUserName = $_POST["txtUserName"];
// 	$sUserPassword = $_POST["txtPassword"];
// 	if($sUserName != null && $sUserPassword != null){  // 帳號密碼不能為空直
// 	//讀取sql_RentalCar資料庫的memberID  , 搜尋條件為 $MemberID
// 	$result = $crud -> read_login($sUserName,$sUserPassword);
// 	$row = @mysql_fetch_row($result); 
	
// 	if($row[1] == $sUserName && $row[2] == $sUserPassword){
// 		setcookie("userName", $sUserName, time()  +9900, "/");
// 		if (isset($_COOKIE["lastPage"])){
// 			header(sprintf("Location: ../Home/%s", $_COOKIE["lastPage"]));   //抓到lastPage的cookie返回到指定位子
// 			setcookie("lastPage", "blog", time() - 3600,"/"); //清除返回bolg.php的cookie
// 		}
// 		elseif(isset($_COOKIE["goiWantCar"])){
// 			header(sprintf("Location: ../Home/%s", $_COOKIE["goiWantCar"])); //抓到goiWantCar的cookie返回到指定位子
// 			setcookie("goiWantCar", "rentalCar_iwantCar", time() - 3600,"/"); //清除返回bolg.php的cookie
// 		}
// 		else
// 		    header("Location: ../Home/index");
// 		   //echo "<script language='javascript'> location.href='../Home/index'; </script>";
// 		exit();
// 	}
// 	else
// 		echo "<script language='javascript'> alert('帳號密碼錯誤');location.href='../Home/member'; </script>";
// 	}
// 		else
// 		echo "<script language='javascript'> alert('請輸入正確帳號密碼');location.href='../Home/member'; </script>";
// }


// if (isset($_POST["btnMember"])) //按下註冊鈕前往註冊頁面 newMember.php
// {
// 	header("Location: ../Home/newMember");
// 	exit();
// }



// if (isset($_POST["register"])) // nweMember.php註冊頁按下 註冊鈕
// {
// 	$MemberID = $_POST['newMemberID'];
// 	$MemberPW = $_POST['newMemberPW'];
// 	$MemberTEL = $_POST['newMemberTEL'];
// 	$MemberEM = $_POST['newMemberEM'];
// 	$MemberBD = $_POST['newMemberBD'];
// 	$Date = date("Y-m-d H:i:s",strtotime($time1."+8 hour"));
// 	if($MemberID != null && $MemberPW != null && $MemberTEL != null && $MemberEM != null && $MemberBD != null ){ //不能為空值
// 	$result = $crud -> read_register($MemberID);		
// 	$row = @mysql_fetch_row($result);
// 	if ( $row[1] == $id)  //比對帳號是否有相同重複
// 	{
// 	if($_POST['newMemberPW'] == $_POST['newMemberPW2']){ //驗證密碼是否兩次都相同
// 	  $crud -> create_register($MemberID,$MemberPW,$MemberTEL,$MemberEM,$MemberBD,$Date);
// 	  setcookie("nweMember");
// 	  header("location: ../Home/index"); //轉址, 會員專區沒有登入cookie會被請到 member登入頁面
// 	  exit();
// 	}
// 	else{
// 		 echo "<script language='javascript'> alert('密碼輸入不一致');location.href='../Home/newMember'; </script>";
// 	}
// 	}
// 	else{

// 		echo "<script language='javascript'> alert('此帳號使用過了');location.href='../Home/newMember'; </script>";
// 	}
// 	}
// 	else{

// 		echo "<script language='javascript'> alert('請輸入完整資料');location.href='../Home/newMember'; </script>";
// 	}																								
																													
																													 
																													 

// }


// if (isset($_POST["iwantCar"])) //rentalCar_iwantCar.php 租車頁確定送出租車動作
// { 
//     if (isset($_COOKIE["userName"])){  //會員登出裝置
// 		$sUserName = $_COOKIE["userName"];
// 		}
// 	else{ 
// 		$sUserName = "Guest";
// 	}
//     $carGoName =  $_POST['carGoName'];
//     $getCar =  $_POST['getCar'];
//     $backCar =  $_POST['backCar'];
//     $getDate =  $_POST['getDate'];
//     $backDate =  $_POST['backDate'];
//     $carSpecies = $_POST['carSpecies'];
//     $carModel =  $_POST['carModel']; 
//     $Date = date("Y-m-d H:i:s",strtotime($time1."+8 hour")); //租車訂單時的時間
    
//     if($carGoName != null && $getCar != null && $backCar != null && $getDate != null && $backDate != null && $carSpecies != null  && $carModel != null ){ //內容不能為空值
//       switch($carSpecies){
//        case '1' :
//         $carSpecies='小客車-豐田';
//         break;
//        case '2' :
//         $carSpecies='小客車-日產';
//         break;
//        case '3' :
//         $carSpecies='小客車-三菱';
//         break;
//        case '4' :
//         $carSpecies='休旅車-納智捷';
//         break;
//        case '5' :
//         $carSpecies='休旅車-日產';
//         break;
//        case '6' :
//         $carSpecies='休旅車-三菱';
//         break;
//       }
//       echo $carSpecies;
//        $crud -> create_iwantCar($sUserName,$Date,$carGoName,$getCar,$backCar,$getDate,$backDate,$carSpecies,$carModel);
//       //header("location: index.php");
//     		echo "<script language='javascript'> alert('租車成功,服務員會與您聯絡唷!');location.href='../Home/blog_record'; </script>";
//     }
//     else echo "<script language='javascript'> alert('請輸入完整資料');location.href='../Home/rentalCar_iwantCar'; </script>";
   
// }

// if (isset($_POST["No"])) //修改會員資料頁面bolg_change_write.php按下取消返回會員資料頁 blog_change.php
// {
// 	header("Location: ../Home/blog_change");
// 	exit();
// }


// if (isset($_POST["OK"])) //修改會員資料頁面bolg_change_write.php 按下確定送出後的資料庫update更新
// { 
// 	  if (isset($_COOKIE["userName"])){  //會員登出裝置
// 		$sUserName = $_COOKIE["userName"];
// 		}
// 	else{ 
// 		  $sUserName = "Guest";
// 		 }
//   $sUserName = $_COOKIE["userName"];
//   $MemberPW = $_POST['newMemberPW'];
//   $MemberPW2 = $_POST['newMemberPW2'];
//   $MemberTEL = $_POST['newMemberTEL'];
//   $MemberEM = $_POST['newMemberEM'];
//   if($MemberPW != null && $MemberPW2 != null && $MemberTEL != null && $MemberEM != null ){ //不能為空值
//       if($MemberPW == $MemberPW2){ //驗證密碼是否兩次都相同
//       //更新資料庫資料語法
//       $crud -> update_blogWrite($MemberPW,$MemberPW2,$MemberTEL,$MemberEM,$sUserName);
//      	echo "<script language='javascript'> alert('修改完成!');location.href='../Home/blog_change'; </script>";
//       }
//       else
//        echo "<script language='javascript'> alert('密碼不一致');location.href='../Home/blog_change'; </script>";
//   }
//   else
//   	echo "<script language='javascript'> alert('請輸入完整資料');location.href='../Home/blog_change'; </script>";
// }


?>