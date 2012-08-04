// JavaScript Document
function uniOl(){
	zereg = $('#zereg');
	mergejil = $('#mergejil');
	uls = $('#uls');
	window.location='index.php?module=uni&cmd=search&ZEID='+zereg.val()+'&MEID='+mergejil.val()+'&ULID='+uls.val();
}

$(document).ready(function(){


$('#uls').submit(function(){
alert(2);
});

});