<?php 
                    function VRcar($photoMunber,$photoMunber2){   
                    if($photoMunber=='4_1'):
                    $VRcar='納智捷 U7 2.2' ;
                    $money='4,500';
                    $content=  '廠牌: 納智捷<br>
                                車型: U7 2.2<br>
                                車型等級: 休旅車(5人座)<br>
                                租金定價: 4500 .NTD<br>
                                特色 :<br>
                                先進的SUV座艙、外觀設計新穎，讓行車有更高層次的享受。';
                    elseif($photoMunber=='4_2'):
                    $VRcar='納智捷 M7 2.2' ;
                    $money='5,000';
                    $content=  '廠牌: 納智捷<br>
                                車型: M7 2.2<br>
                                車型等級: 休旅車(7人座)<br>
                                租金定價: 5,000 .NTD<br>
                                特色 :<br>
                                裕隆所研發的世界第一部智慧科技車，具有Luxgen Think+全面性車用平台，以人性化科技為設計原點，滿足各種對車的需求。';
                    elseif($photoMunber=='4_3'):
                    $VRcar='納智捷 U6 1.8' ;
                    $money='3,200';
                    $content=  '廠牌: 納智捷<br>
                                車型: U6 1.8<br>
                                車型等級: 休旅車(5人座)<br>
                                租金定價: 3200 .NTD<br>';
                    elseif($photoMunber=='5_1'):
                    $VRcar='日產 X-Trail 2.0' ;
                    $money='4,500';
                    $content=  '廠牌: 日產<br>
                                車型: X-Trail 2.0<br>
                                車型等級: 休旅車(5人座)<br>
                                租金定價: 4,000 .NTD<br>
                                特色 :<br>
                                同時有著都會車的時尚、跑車的動感與SUV的實用，最適合喜歡郊外休閒活動的你。';
                    elseif($photoMunber=='5_2'):
                    $VRcar='日產 SERENA(Q-RV) 2.5' ;
                    $money='5,000';
                    $content=  '廠牌: 日產<br>
                                車型: SERENA(Q-RV) 2.5<br>
                                車型等級: 休旅車(8人座)<br>
                                租金定價: 5000 .NTD<br>
                                特色 :<br>
                                全家歡樂出遊的最佳遊伴，擁有較大的空間。<br>
                                汽車配備 :<br>
                                CD音響，隱藏式倒車雷達，皮質座椅，可折疊式後視鏡，晶鑽頭燈。';
                    else:
                    $VRcar='三菱 OUTLANDER 2.4' ;  //61
                    $money='4,500';
                    $content=  '廠牌: 三菱<br>
                                車型: OUTLANDER 2.4<br>
                                車型等級: 休旅車(5人座)<br>
                                租金定價: 4,500 .NTD<br>
                                特色 :<br>
                                先進的SUV座艙、外觀設計新穎，讓行車有更高層次的享受。<br>
                                汽車配備 :<br>
                                ABS防鎖死煞車系統，前置式單片CD音響，隱藏式倒車雷達，皮質座椅，電動折疊後視鏡。';
                    endif;
                    ?>
                    <div class="rentalCar-item apps col-xs-12 col-sm-4 col-md-3">
                        <div class="recent-work-wrap">
                            <img class="img-responsive" src="images/rentalCar/showCar/RV/<?php echo $photoMunber ?>.jpg" alt="">
                            <div class="overlay">
                                <div class="recent-work-inner">
                                    <h4><?php echo $VRcar; ?></h4>
                                    <p>每日租金價格：<?php echo $money; ?></p>
                                    <!--<a class="preview" href="images/rentalCar/full/item1.png" rel="prettyPhoto" title="休旅車"><i class="fa fa-eye"></i> View</a>-->
                                    <!--圖片選擇,display: none為隱藏,將img輸入隱藏起來-->
                                    <a name="<?php echo $photoMunber ?>" class="preview" href="images/rentalCar/showCar/RV/full/<?php echo $photoMunber ?>.jpg" rel="prettyPhoto<?php echo $photoMunber ?>[pp_gal]" title="<br><br><br><?php echo $content ?>" ><img style="display: none" alt="車身"/><i class="fa fa-eye"></i>詳細資料</a>
                                    <a name="<?php echo $photoMunber ?>" class="preview" href="images/rentalCar/showCar/RV/full/<?php echo $photoMunber2 ?>.jpg" rel="prettyPhoto<?php echo $photoMunber ?>[pp_gal]" title="<br><br><br><?php echo $content ?>" ><img style="display: none" alt="車內"/></a>
                                    
                                        <input type="image" name="sGOiwant" id="sGOiwant" align="right" value="<?php echo $photoMunber ?>" src="images/btnRentalCarRed.gif" onClick="myFunction();">
                                        
                                        <script>
                                            function myFunction() {
                                                document.getElementById("sGOiwant").submit();
                                            }
                                        </script>
                                        	
                                                                                                                                                    <!--document.formName.btnName.value-->
                                    <!--<a href="rentalCar_iwantCar.php"><img align="right" src="images/btnRentalCarRed.gif"></img></a>-->
                                </div> 
                            </div>
                        </div>
                    </div> <!-- 休旅車選擇器end -->
                    <?php } ?>