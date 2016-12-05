
$(document).ready(function() {
    var md = new MobileDetect(window.navigator.userAgent);
    var curOS = md.os().toLowerCase();
    if (curOS.indexOf('android') !== -1) {
        $("#iframe-inner-box").addClass('iframe-inner-box');
    } else {
        $("#iframe-inner-box").addClass('iframe-inner-box-ios');
    }
});
window.onload = function() {
    var md = new MobileDetect(window.navigator.userAgent);
    var curOS = md.os().toLowerCase();
    if (curOS == 'ios') {
        $('iframe').attr('scrolling', 'no');
        $('iframe').css({ 'width': '1px', 'min-width': '100%' }); //-webkit-overflow-scrolling: touch; overflow-y: scroll;
    }
    $("#loading").hide().remove();
    $('.box-one ').on('touchstart', function(event) {
        event.preventDefault();
    });
    $(".go").on('click', function() {
        $(this).hide();
        $(".box-one").hide();
    });
    var url1="http://t1.toptest.yidianzixun.com/2016/adcontent/ad201611182.php";
    var url2="http://t1.toptest.yidianzixun.com/2016/adcontent/ad20161118.php";
     $('.xinwen .btn1').on('click', function() {
        $('.box-one , .go').show();
        $('#aaa').attr('src', url1);
    });
     $('.xinwen .btn2').on('click', function() {
        $('.box-one , .go').show();
        $('#aaa').attr('src', url2);
    });
}
var mySwiper_one = new Swiper('#box_top', {
	direction: 'horizontal',
	pagination: '#fenye1',
	autoplay: 5000,
	speed: 700,
	autoplayDisableOnInteraction: false,
});

function a(b) {
	var swiper = new Swiper(b, {
		direction: 'horizontal',
		speed: 700,
		nextButton: '.right-jt',
		prevButton: '.left-jt'
	})
	return swiper;
}

function b(b) {
	var swiper = new Swiper(b, {
		direction: 'horizontal',
		speed: 700,
		nextButton: '.rt1-jt',
		prevButton: '.br1-jt'
	})
	return swiper;
}
var page3Swiper = new Swiper('#pageCar', {
	direction: 'horizontal',
	speed: 700,
	nextButton: '.right-jt',
	prevButton: '.left-jt'
});
var brightSwiper = new Swiper('#brightTwo', {
	direction: 'horizontal',
	speed: 700,
	nextButton: '.rt1-jt',
	prevButton: '.br1-jt'
});
document.getElementById("videoSt").addEventListener('click', function() {
	console.log(1);
	$('#videoSt').hide();
	document.getElementById("videoSourse").play();
}, false);
var handleSelect = {
	cityHasChoose: false,
	init: function(option) {
		var self = this;
		var $userName = option['userName'],
			$tel = option['tel'],
			$province = option['province'],
			$prefectureCity = option['prefectureCity'],
			$dealerName = option['dealerName'],
			$submit = option['submit'],
			projectId = 41;
		var getProvince = 'http://t1.toptest.yidianzixun.com:8888/tool/getProvinceByFAW',
			getPrefectureCity = 'http://t1.toptest.yidianzixun.com:8888/tool/getPrefectureviCityByFAW',
			getDealerName = 'http://t1.toptest.yidianzixun.com:8888/tool/getDealerNameByFAW';
		if(!self.cityHasChoose) {
			$.ajax({
				url: getProvince,
				type: 'get',
				data: {
					projectId: projectId
				},
				dataType: 'json',
				success: function(data) {
					if(data['status'] == 1) {
						var dataList = data['data'],
							tpl = '<option value="">请选择</option>';
						for(var i = 0; i < dataList.length; i++) {
							tpl += '<option value="' + dataList[i]['provinceId'] + '">' + dataList[i]['province'] + '</option>';
						}
						$province.empty().append(tpl);
						self.cityHasChoose = true;
					}
				}
			});
		}
		$province.on('change', function() {
			var val = $(this).val();
			if(val === '') {
				$prefectureCity.empty().append('<option value="">请选择</option>');
				$dealerName.empty().append('<option value="">请选择经销商</option>');
				return;
			}
			$.ajax({
				url: getPrefectureCity,
				type: 'get',
				data: {
					provinceId: val,
					projectId: projectId
				},
				dataType: 'json',
				success: function(data) {
					if(data['status'] == 1) {
						var p_data_list = data['data'],
							tpl = '<option value="">请选择</option>';
						for(var i = 0; i < p_data_list.length; i++) {
							tpl += '<option value="' + p_data_list[i]['prefectureCityId'] + '">' + p_data_list[i]['prefectureCity'] + '</option>';
						}
						$dealerName.empty().append('<option value="">请选择经销商</option>');
						$prefectureCity.empty().append(tpl);
					}
				}
			});
		});

		$prefectureCity.on('change', function() {
			var val = $(this).val();
			if(val === '') {
				$dealerName.empty().append('<option value="">请选择经销商</option>');
				return;
			}
			$.ajax({
				url: getDealerName,
				type: 'get',
				data: {
					prefectureCityId: val,
					projectId: projectId
				},
				dataType: 'json',
				success: function(data) {
					if(data['status'] == 1) {
						var data_list = data['data'],
							tpl = '<option value="">请选择经销商</option>';
						for(var i = 0; i < data_list.length; i++) {
							tpl += '<option value="' + data_list[i]['dealerNameId'] + '">' + data_list[i]['dealerName'] + '</option>';
						}
						$dealerName.empty().append(tpl);
					}
				}
			});
		});
		$submit.on('click', function() {
			var data = {
				name: $.trim($userName.val()),
				phone: $.trim($tel.val()),
				province: $.trim($province.val()),
				city: $.trim($prefectureCity.val()),
				agency: $.trim($dealerName.val())
			};
			if(!self.valedate(data)) {
				return;
			}
			data.project = projectId;
			$.ajax({
				url: 'http://t1.toptest.yidianzixun.com:8888/tool/yysjInfoByFAW',
				type: 'post',
				data: {
					SERIES: 13,
					CUSTOMER_NAME: data.name,
					MOBILE: data.phone,
					PROVINCE: data.province,
					province: $province.find("option:selected").text(),
					CITY: data.city,
					city: $prefectureCity.find("option:selected").text(),
					FK_DEALER_ID: data.agency,
					agency: $dealerName.find("option:selected").text(),
					project: 57,
					testDriveTime: 0,
					LEAD_TYPE: 'BB489566-64E8-4D2D-BE7A-BF6C59079CF2',
					USER_KEY: 'ydinfo2016'
				},
				dataType: 'json',
				success: function(data) {
					if(data.status === 1) {
						alert('提交成功！');
					} else {
						alert('提交失败，请稍后重试！')
					}
				}
			})
		});
	},
	valedate: function(data) {
		var valHandle = {
			name: function(val) {
				if(val === '') {
					return {
						status: false,
						msg: '姓名不能为空'
					}
				}
				return {
					status: true
				}
			},
			phone: function(val) {
				var telReg = /^1[3|4|5|7|8]\d{9}$/;
				if(!telReg.test(val)) {
					return {
						status: false,
						msg: '手机号码格式错误'
					}
				}
				if(val === '') {
					return {
						status: false,
						msg: '手机号码不能为空'
					}
				}
				if(val === localStorage.getItem("roewePhone")) {
					return {
						status: false,
						msg: '您已经预约过啦'
					}
				}
				return {
					status: true
				}
			},
			province: function(val) {
				if(val === '') {
					return {
						status: false,
						msg: '省份不能为空'
					}
				}
				return {
					status: true
				}
			},
			city: function(val) {
				if(val === '') {
					return {
						status: false,
						msg: '城市不能为空'
					}
				}
				return {
					status: true
				}
			},
			agency: function(val) {
				if(val === '') {
					return {
						status: false,
						msg: '经销商不能为空'
					}
				}
				return {
					status: true
				}
			}
		};

		for(var key in data) {
			var result = valHandle[key](data[key]);
			if(!result['status']) {
				alert(result['msg']);
				return false;
			}
		}
		return true;
	}
};
$(function() {
	$('body').css('height', $(window).height());
    $('body').css('width', $(window).width());
	$('.new_btn').click(function() {
		$('.gsgs').css('display', 'block');
		$('.gsywly').css('display', 'none');
		a('#pageCar');
	});
	$('.next_btn').click(function() {
		$('.gsgs').css('display', 'none');
		$('.gsywly').css('display', 'block');
		a('#pageCar1');
	});
	$('.frist_btn').click(function() {
		$('.bright_one').css('display', 'block');
		$('.bright_two').css('display', 'none');
		b('#brightOne');
	});
	$('.sencond_btn').click(function() {
		$('.bright_one').css('display', 'none');
		$('.bright_two').css('display', 'block');
		b('#brightTwo');
	});
	var arr = document.getElementsByClassName('guanbi');
	var length = arr.length;
	$('.lb div .guanbi').on('click', function() {
		length--;
		if(length >=1) {
			$(this).parent().hide();
		} 
		$('.quanbu').show();
	})
	$('.quanbu').on('click', function() {
		$('.lb div').show();
		length=arr.length;
	})
	$('.gw').on('click', function() {
		window.location.href = "http://vw.faw-vw.com/";
	});
	$('.wb').on('click', function() {
		window.location.href = "http://weibo.com/fawvw";
	});
	$('.fh').on('click', function() {
		if(document.documentElement.scrollTop) {
			document.documentElement.scrollTop = 0
		} else {
			document.body.scrollTop = 0
		}
	});
	handleSelect.init({
		userName: $('#name'),
		tel: $('#phone'),
		province: $('#province'),
		prefectureCity: $('#city'),
		dealerName: $('#jxs'),
		submit: $('.btn')
	});

})