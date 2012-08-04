// JavaScript Document

$(document).ready(function(){
	$("#menusDD .menusDD").each(function(){
		$(this).mouseover(function(){
			$("#sub"+$(this).attr("id")+"").show();//alert(i);
			$("#"+$(this).attr("id")+" a:first").addClass("menu_active");
			$("#"+$(this).attr("id")+" a:first").css("color","#74382d");
		});
		$(this).mouseout(function(){
			$('.menusDDsub').hide();
			$("#"+$(this).attr("id")+" a:first").removeClass("menu_active");
			$("#"+$(this).attr("id")+" a:first").css("color","#FFF");
			makeTopMenuActive();
		});
	});
});