function divLayoutHide(div_id){
	divLayout = document.getElementById('bodyDivLayout');
	innerDiv = document.getElementById(div_id);
	divLayout.style.display = 'none';
	innerDiv.style.display = 'none';
}
function divLayoutShow(div_id){
	
	
	//width height av ehlev
	var viewportwidth;
	 var viewportheight;
	 
	 // the more standards compliant browsers (mozilla/netscape/opera/IE7) use window.innerWidth and window.innerHeight
	 
	 if (typeof window.innerWidth != 'undefined')
	 {
		  viewportwidth = window.innerWidth,
		  viewportheight = window.innerHeight
	 }
	 
	// IE6 in standards compliant mode (i.e. with a valid doctype as the first line in the document)
	
	 else if (typeof document.documentElement != 'undefined'
		 && typeof document.documentElement.clientWidth !=
		 'undefined' && document.documentElement.clientWidth != 0)
	 {
		   viewportwidth = document.documentElement.clientWidth,
		   viewportheight = document.documentElement.clientHeight
	 }
	 
	 // older versions of IE
	 
	 else
	 {
		   viewportwidth = document.getElementsByTagName('body')[0].clientWidth,
		   viewportheight = document.getElementsByTagName('body')[0].clientHeight
	 }
	//width height av duusav
	
	
	_divLayout = document.getElementById('bodyDivLayout');
	innerDiv = document.getElementById(div_id);
	
	innerDiv.style.zIndex = '999';
	_divLayout.style.zIndex = '900';
	//fromTop = Math.round(window.innerHeight/4);
	//fromLeft = Math.round((window.innerWidth-innerDiv.innerWidth.substr(0,3))/2);
	//alert(fromTop+'-'+fromLeft);
	innerDiv.style.top = '40px';//fromTop/2+'px';
	//alert(viewportwidth);
	innerDiv.style.left = Math.floor((viewportwidth-540)/2)+'px'; //*Math.floor(fromLeft/2)+'px';*/
	innerDiv.style.display = 'block';
	
	_divLayout.style.display = 'block';
	_divLayout.style.height = '1000%';
	_divLayout.style.width = '100%';
	_divLayout.style.top = '0px';
	_divLayout.style.left = '0px';
}