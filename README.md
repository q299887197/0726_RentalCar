# 0726_RentalCar

功能寫在 HomeController.php <br>
資料庫寫在 models 內 <br>
畫面顯示寫在 views 內<br>


# 第二階段 (研發二處) 事項

* MVC 部分
 - 完成√ Control 負責處理流程 (不echo)
 - 完成√ 存取資料庫、Session、Cookie 只在 Model 
 - 完成√ 所有輸出顯示、echo 只在 View

* 要求部分
 - 完成√  程式碼必需縮排整齊
 - 完成√ 統一使用 `require_once`   
 - 完成√ 一個檔案只能定義一個class
 - 完成√ `require_once` 的檔案只能是 class 或 function 集合 (設定檔除外)
 - 完成√ SQL 語法使用大寫，欄位、database、table都加入 "\`" 如: 
 
```
SELECT * FROM `table` WHERE `id` = '1'
```
 
