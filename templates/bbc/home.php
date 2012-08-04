<div id="homeContent">
<h2>Yadii.Net</h2>
<div id="yadii"></div>
<h2>Gazar.Org</h2>
<div id="gazar"></div>
</div>
<script language="javascript">
$(document).ready(function(){
    getRSS('#gazar', '<?=base64_encode('http://www.gazar.org/rss.php?action=content&lm=4')?>','rss_short');
    getRSS('#yadii', '<?=base64_encode('http://www.yadii.net/rss.php?action=content&menu_id=314&lm=4&order_by=rand()')?>','rss_short');

});
</script>