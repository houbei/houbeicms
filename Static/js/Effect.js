// JavaScript Document
$(document).ready(function(){
     $(".Drop").click(function(){
		 $(".DwList").toggle();
		 });
	 $(".DwList p").click(function(){
		 $(".Drop span").text($(this).text());
		 $("input[name='type']").val($(this).text());
		 });
	function teb(Para){
	$(Para).children().each(function(index){
       $(this).mouseenter(
		function(){
			$(this).siblings().removeClass("active");
			$(this).addClass("active");
			$(this).parent().siblings().hide();
			$(this).parent().siblings().eq(index).show();});
    });
	};
	teb($(".Teb_1"));
	teb($(".Teb_2"));
	teb($(".Teb_3"));
	teb($(".Teb_4"));
	teb($(".Teb_5"));
	teb($(".Teb_6"));
	teb($(".Teb_7"));
	teb($(".Teb_8"));
	teb($(".Teb_9"));
	teb($(".Teb_10"));
	teb($(".Teb_11"));
	teb($(".Teb_12"));
	teb($(".Teb_13"));
	teb($(".Teb_14"));
	teb($(".Teb_15"));
	teb($(".Teb_16"));
	teb($(".Teb_17"));
	teb($(".Teb_18"));
	/*焦点图*/
	/*function imgBannerChange(oImgBanner){
			var Timer = AutoNum =0;
			oImgBanner.append("<ul class='img_btn'></ul>");
			var oImgUl = oImgBanner.children('ul');	
			var oImg = oImgBanner.find('a');
			var oImgNum = oImg.length;
			for (var oli = 0; oli < oImgNum; oli++) {
				var liHtml = "<li>"+oli+"</li>"
				oImgUl.append(liHtml);
			};
			var oImgList = oImgUl.children('li');
			oImgList.first().addClass('on');
			if (oImgNum <=1) {oImgList.css('display', 'none'); return;};
			oImg.not(oImg.first()).hide();
			oImgList.click(function(){
				$(this).addClass("on").siblings().removeClass("on");
				var i = $(this).text();
				AutoNum = i;
				if (i >= oImgNum) return;
				oImg.fadeOut(2000);
				$(".Imglist a:eq("+i+")").fadeIn(2000);
			});
			clearInterval(Timer);
			Timer = setInterval(showAuto, 5000);
			oImgBanner.mouseover(function(){clearInterval(Timer)});
			oImgBanner.mouseout(function(){Timer = setInterval(showAuto, 5000)});
			function showAuto(){
				AutoNum = AutoNum >=(oImgNum -1) ?0 : ++AutoNum;
				$(".BannerImg li").eq(AutoNum).trigger('click');
			};
		}*/
/*		imgBannerChange($(".BannerImg"));
		var i=0;
		var LiNum=$(".JsMove").children("li").toArray().length;
		$(".JsMove").css({"width":$(".JsMove").children("li").outerWidth(true)*LiNum});
		$(".Prev").click(function(){
			Prev ();})
		$(".Next").click(function(){
			Next ();})	
		function Next(){
			if(i==Math.ceil(LiNum)-1){
				i=-1;
				move();
				}
			else{
				move();
				}
			}
		function Prev(){
			if(i==0){
				i=Math.ceil(LiNum);
				move1();
				}
			else{
				move1();
				}
			}*/
/*		function move(){
		i++;
		$(".JsMove").animate({"left":-($(".JsMove").children("li").outerWidth(true)*i)})
		};
		function move1(){
		i--;
		$(".JsMove").animate({"left":-($(".JsMove").children("li").outerWidth(true)*i)})
		};*/
});