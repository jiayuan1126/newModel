var mySwiper_one = new Swiper('#box_top', {
	direction: 'horizontal',
	pagination: '#fenye1',
	autoplay: 5000,
	speed: 700,
	autoplayDisableOnInteraction: false,
});
function a(b){
	var swiper=new Swiper(b,{
	direction: 'horizontal',
	autoplay: 5000,
	speed: 700,
	autoplayDisableOnInteraction: false,
	nextButton: '.left-jt',
	prevButton: '.right-jt'
	})
	return swiper;
}
var page3Swiper = new Swiper('#pageCar', {
	direction: 'horizontal',
	autoplay: 5000,
	speed: 700,
	autoplayDisableOnInteraction: false,
	nextButton: '.left-jt',
	prevButton: '.right-jt'
});
document.getElementById("videoSt").addEventListener('click', function() {
	console.log(1);
	$('#videoSt').hide();
	document.getElementById("videoSourse").play();
}, false);
$(function() {
	$('.new_btn').click(function() {
		$('.gsgs').css('display', 'block');
		$('.gsywly').css('display', 'none');
		a('#pageCar');
	});
	$('.next_btn').click(function(){
		$('.gsgs').css('display', 'none');
		$('.gsywly').css('display', 'block');
		a('#pageCar1');
	});
})