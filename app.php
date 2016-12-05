<?php

$url = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
$url = urlencode($url);
$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => "http://t1.toptest.yidianzixun.com/webservice/wxShare/get.php?clientUrl=" . $url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_POSTFIELDS => "Key=ydinfo2016&RequestObjectList=%5B%5D",
    CURLOPT_HTTPHEADER => array(
        "cache-control: no-cache",
        "content-type: application/x-www-form-urlencoded"
    ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
    echo "cURL Error #:" . $err;
} else {
    $response = json_decode($response);
    $data = $response->data;

    $timestamp = $data->timestamp;

    $nonceStr = $data->nonceStr;

    $signature = $data->signature;
}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
		<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,minimum-scale=1,user-scalable=no" />
		<!--从桌面icon启动IOS Safari是否进入全屏状态（APP模式-->
		<meta name="apple-mobile-web-app-capable" content="yes" />
		<!--	添加到主屏幕“后，全屏显示-->
		<meta name="apple-touch-fullscreen" content="yes" />
		<!--	指定状态栏的颜色-->
		<meta name="apple-mobile-web-app-status-bar-style" content="black" />
		<!--手机号码不被显示为拨号链接-->
		<meta name="format-detection" content="telephone=no">
		<!-- 浏览器全屏显示-->
		<meta name="screen-orientation" content="portrait">
		<meta name="full-screen" content="yes">
		<meta name="x5-orientation" content="portrait">
		<meta name="x5-fullscreen" content="true">
		<title>一汽新捷达</title>
		<link rel="stylesheet" href="css/swiper-3.3.1.min.css" />
		<link rel="stylesheet" href="css/style.css" />
	</head>
	<body>
	    <!--一点资讯分享-->
		<div id="yidian_share_title" class="yidianShare" style="display:none;"></div>
		<div id="yidian_share_content" class="yidianShare" style="display:none;"></div>
		<div id="yidian_share_url" class="yidianShare" style="display:none;">http://t1.toptest.yidianzixun.com/2016/vw/newModel/app.php</div>
		<div id="yidian_share_imageurl" class="yidianShare" style="display:none;">http://tstatic.toptest.yidianzixun.com.ks3-cn-beijing.ksyun.com/public/files/200x2001479293098089.png</div>
		<!-- end -->
		<div style="display: none;" id="timestamp" class="wxShare"><?php echo $timestamp; ?></div>
		<div style="display: none;" id="nonceStr" class="wxShare"><?php echo $nonceStr; ?></div>
		<div style="display: none;" id="signature" class="wxShare"><?php echo $signature; ?></div>
		<div id="loading" class="loading"></div>
		<div class="box">
			<img src="img/bg.jpg">
			<!--头图-->
			<div class="box_top">
				<div id="box_top" class="swiper-container">
					<div class="swiper-wrapper">
						<div class="swiper-slide top1"></div>
						<div class="swiper-slide top2"></div>
						<div class="swiper-slide top3"></div>
					</div>
					<div id="fenye1" class="fenye1"></div>
				</div>
			</div>
			<!--预约试驾-->
			<div class="formInput">
				<div class="title">
					<p class="title_one">预约试驾</p>
				</div>
				<div class="item1">
					<p>姓名：</p>
					<div class="input">
						<input type="text" name="name" id="name" placeholder="请输入您的真实姓名">
					</div>
				</div>
				<div class="item2">
					<p>手机：</p>
					<div class="input">
						<input type="text" name="phone" id="phone" placeholder="请输入11位手机号">
					</div>
				</div>
				<div class="item3">
					<p>省份：</p>
					<div class="sf">
						<select id="province">
							<option value="">&nbsp;&nbsp;省份</option>
					    <select>
					    <select id="city">
							<option value="">&nbsp;&nbsp;城市</option>
						<select>
					</div>
				</div>
				<div class="item4">
					<p>经销商：</p>
					<div class="input">
						<select id="jxs">
							<option value="">请选择经销商</option>
						<select>
					</div>
				</div>
				<div class="btn">立即预约试驾</div>
			</div>
			<!--视频-->
			<div class="video">
				<video id="videoSourse" preload="auto" controls="controls" src="http://tstatic.toptest.yidianzixun.com.ks3-cn-beijing.ksyun.com/public/files/WeChatSight91480391486767.mp4" x-webkit-airplay="true" webkit-playsinline="true"></video>

				<img id="videoSt" src="img/video.png">
			</div>
			<!--车型亮点-->
			<div class="car_dot">
				<div class="frist_btn"></div>
				<div class="sencond_btn"></div>
			</div>
			<div class="lunbo_two">
				<div class="bright_one">
					<div class="bright_one_top">
						
					</div>
					<div class="bright_one_bottom">
						<div id="brightOne" class="swiper-container">
						<div id="brightOne" class="swiper-wrapper ">
							<div class="swiper-slide brightOne1"></div>
							<div class="swiper-slide brightOne2"></div>
							<div class="swiper-slide brightOne3"></div>
							<div class="swiper-slide brightOne4"></div>
							<div class="swiper-slide brightOne5"></div>
							<div class="swiper-slide brightOne6"></div>
							<div class="swiper-slide brightOne7"></div>
							<div class="swiper-slide brightOne8"></div>
							<div class="swiper-slide brightOne9"></div>
							<div class="swiper-slide brightOne10"></div>
						</div>
						<!-- 如果需要导航按钮 -->
						<div class="swiper-button-prev br1-jt"></div>
						<div class="swiper-button-next rt1-jt"></div>
					</div>
					</div>
					
				</div>
				<div class="bright_two">
					<div class="bright_two_top">
						
					</div>
					<div class="bright_two_bottom">
						<div id="brightTwo" class="swiper-container">
						<div id="brightTwo" class="swiper-wrapper ">
							<div class="swiper-slide brighttwo1"></div>
							<div class="swiper-slide brighttwo2"></div>
							<div class="swiper-slide brighttwo3"></div>
							<div class="swiper-slide brighttwo4"></div>
							<div class="swiper-slide brighttwo5"></div>
							<div class="swiper-slide brighttwo6"></div>
							<div class="swiper-slide brighttwo7"></div>
							<div class="swiper-slide brighttwo8"></div>
							<div class="swiper-slide brighttwo9"></div>
							<div class="swiper-slide brighttwo10"></div>
						</div>
						<!-- 如果需要导航按钮 -->
						<div class="swiper-button-prev br1-jt"></div>
						<div class="swiper-button-next rt1-jt"></div>
					</div>
					</div>
				</div>
			</div>
			
			<!--精美车图-->
			<div class="car_psi">
				<div class="new_btn"></div>
				<div class="next_btn"></div>
			</div>
			<div class="lunbo_one">
			<div class="gsgs">
				<div class="gsgs_top">
				</div>
				<div class="gsgs_middle">
					<div id="pageCar" class="swiper-container">
						<div id="pageCar_one" class="swiper-wrapper ">
							<div class="swiper-slide carchild1"></div>
							<div class="swiper-slide carchild2"></div>
							<div class="swiper-slide carchild3"></div>
							<div class="swiper-slide carchild4"></div>
							<div class="swiper-slide carchild5"></div>
							<div class="swiper-slide carchild6"></div>
							<div class="swiper-slide carchild7"></div>
							<div class="swiper-slide carchild8"></div>
							<div class="swiper-slide carchild9"></div>
							<div class="swiper-slide carchild10"></div>
							<div class="swiper-slide carchild11"></div>
							<div class="swiper-slide carchild12"></div>
							<div class="swiper-slide carchild13"></div>
							<div class="swiper-slide carchild14"></div>
						</div>
						<!-- 如果需要导航按钮 -->
						<div class="swiper-button-prev left-jt"></div>
						<div class="swiper-button-next right-jt"></div>
					</div>
				</div>
				<div class="gsgs_bottom">
				</div>
			</div>
			<div class="gsywly">
				<div class="gsywly_top">

				</div>
				<div class="gsywly_middle">
					<div id="pageCar1" class="swiper-container ">
						<div id="pageCar1" class="swiper-wrapper ">
							<div class="swiper-slide car1"></div>
							<div class="swiper-slide car2"></div>
							<div class="swiper-slide car3"></div>
							<div class="swiper-slide car4"></div>
							<div class="swiper-slide car5"></div>
							<div class="swiper-slide car6"></div>
							<div class="swiper-slide car7"></div>
							<div class="swiper-slide car8"></div>
							<div class="swiper-slide car9"></div>
							<div class="swiper-slide car10"></div>

						</div>
						<!-- 如果需要导航按钮 -->
						<div class="swiper-button-prev left-jt"></div>
						<div class="swiper-button-next right-jt"></div>
					</div>
				</div>
				<div class="gsywly_bottom">

				</div>

			</div>
            </div>
			<!--车型配置-->
			<div class="chexing">
				<div class="cp">
					<div class="cp_top">
						<div class="cp1">
							<div class="quanbu"></div>
							<img src="img/03_01.png">
						</div>
						<div class="lb">
						<div class="cp2">
							<div class="guanbi"></div>
							
							<img src="img/02_02.png">
							
						</div>
						<div class="cp2">
							<div class="guanbi"></div>
							
							<img src="img/02_03.png">
							
						</div>
						<div class="cp2">
							<div class="guanbi"></div>
							
							<img src="img/02_04.png">
							
						</div>
						<div class="cp2">
							<div class="guanbi"></div>
							
							<img src="img/02_05.png">
							
						</div>
						<div class="cp2">
							<div class="guanbi"></div>
							
							<img src="img/02_06.png">
							
						</div>
						<div class="cp2">
							<div class="guanbi"></div>
							
							<img src="img/02_07.png">
							
						</div>
						<div class="cp2">
							<div class="guanbi"></div>
							
							<img src="img/02_08.png">
							
						</div>
						<div class="cp2">
							<div class="guanbi"></div>
							
							<img src="img/02_9.png">
							
						</div>
						<div class="cp2">
							<div class="guanbi"></div>
							
							<img src="img/02_10.png">
						</div>
					</div>
					</div>
					<div class="cp_bottom">
						<img src="img/01_11.jpg">
					</div>
				</div>
			</div>
            
			<!--新闻-->
			<div class="xinwen">
				<div class="btn1"></div>
				<div class="btn2"></div>
			</div>
			<!--返回顶部-->
			<div class="fh"></div>
			<!--官网-->
			<div class="gw"></div>
			<!--微博-->
			<div class="wb"></div>
		</div>
		<div class="box-one">
    		<div class="iframe-box">
				<div id="iframe-inner-box">
					<iframe id="aaa"  src="http://t1.toptest.yidianzixun.com/2016/adcontent/ad201611182.php"  name="main" frameborder="0" scrolling="auto"></iframe>
				</div>
    		</div>
    		<!--返回按钮-->
		 </div>
		 <div class="go">
		 </div>
		<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
		<script type="text/javascript" src="js/swiper-3.3.1.min.js"></script>
		<script type="text/javascript" src="js/mobile-detect.min.js" ></script>
		<script type="text/javascript" src="js/script.js"></script>
		<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
		<script type="text/javascript">
        		    var my_timestamp=document.getElementById('timestamp').innerText.trim();
        		    var my_nonceStr=document.getElementById('nonceStr').innerText.trim();
        		    var my_signature=document.getElementById('signature').innerText.trim();
        		    var myWXdata = {
        		       imgurl:$('#yidian_share_imageurl').text(),
        		       url:$('#yidian_share_url').text(),
        		       title:$('#yidian_share_title').text(),
        		       desc:$('#yidian_share_content').text()
        		   };
        		    wx.config({
        		        debug: false,//判断是否为debug模式
        		        appId:'wxdda4779e3944e490',
        		        timestamp:my_timestamp,
        		        nonceStr:""+my_nonceStr,
        		        signature:""+my_signature,
        		        jsApiList:[
        		            'checkJsApi',
        		            'onMenuShareTimeline',
        		            'onMenuShareAppMessage',
        		            'onMenuShareQQ',
        		            'onMenuShareWeibo'
        		        ]//开启的功能列表
        		    });
        		    var sharePerson = function(){
        		        wx.ready(function(){
        		            var mydata=myWXdata;
        		            wx.onMenuShareTimeline({
        		                title: mydata.title,
        		                link: mydata.url,
        		                imgUrl: mydata.imgurl,
        		                trigger: function (res) {
        		                    //alert('点击分享到朋友圈');
        		                },
        		                success:function(res){

        		                }
        		            });
        		            //alert('已注册获取“分享到朋友圈”状态事件');
        		            wx.onMenuShareAppMessage({
        		                title: mydata.title,
        		                desc: mydata.desc,
        		                link:  mydata.url,
        		                imgUrl: mydata.imgurl,
        		                trigger: function (res) {
        		                    //alert('用户点击发送给朋友');
        		                },
        		                success:function(res){

        		                }
        		            });
        		            wx.onMenuShareQQ({
        		                title: mydata.title,
        		                desc: mydata.desc,
        		                link: mydata.url,
        		                imgUrl: mydata.imgurl,
        		                trigger: function (res) {
        		                    //alert('用户点击分享到QQ');
        		                },
        		                success:function(res){

        		                }
        		            });
        		        });
        		    };
        		    sharePerson();
        		</script>
	</body>

</html>