function getRSS(target_div,url,tpl_file,title_limit){
	
	$(target_div).html('<img src="images/loading.gif" align="left" hspace="5" /> мэдээллийг ачааллаж байна...<br clear="all">');
	if(!tpl_file){
		tpl_file = 'rss_short';
	}if(!title_limit){
		title_limit = 100;
	}
	$.ajax({
			type: "POST", url: "zak_xml.php?action=rss&url="+encodeURI(url), data: "tpl="+tpl_file+"&title_limit="+title_limit,
			complete: function(data){
				$(target_div).html(data.responseText+'<br clear="all" />');
			}
		 });
}