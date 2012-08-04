<table width="950" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="300"><img src="images/logo.gif" width="225" height="100" alt="Universal E-Money" /></td>
        <td align="right">
        <? if($_SESSION['lev']>0):?>
        <a href="index.php?module=jetons&cmd=payments" class="topMenu" style="color:#333;float:right; margin-right:2px; background-color:#ddd; line-height:20px; height:20px;">
        Balance : <strong><?=number_format(userRemainBalance($_SESSION['user_id']),0).' '.CURRENCY?></strong>
        </a>
        <? endif;?>
        <br clear="all" />
        </td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td height="24" style="background-image:url(templates/emoney/images/menu_bg.jpg);">
    	<div id="topMenus">
        	<a href="index.php">Home</a>
        	<a href="index.php?module=jetons&cmd=send_payment">Send Money</a>
        	<a href="index.php">Deposit</a>
        	<a href="index.php?module=jetons&cmd=r_payment">Withdraw</a>
        	<a href="index.php?module=message&cmd=box">Internal mail</a>
        	<a href="index.php?module=jetons&cmd=payments">History</a>
        	<a href="index.php?module=users&cmd=profile">My Account</a>
        	<a href="index.php">Settings</a>
            <?php
            if($_SESSION['user_id']!=0 && $_SESSION['lev']>0){
				?>
				<a href="index.php?action=logout">Logout</a>
				<?
			}else{
				?>
				<a href="index.php?module=users&amp;cmd=login">Login</a>
				<?
			}
			?>
        </div>
    </td>
  </tr>
  <tr>
    <td><img src="templates/emoney/images/header.jpg" alt="u-emoney" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>
     <?
    if(file_exists(ABS_DIR."modules/".$_GET['module']."/".$_GET['cmd'].".php")) {
       mbm_include_file("modules/".$_GET['module']."/".$_GET['cmd'].".php");
    }else {
        mbm_include_file("templates/".TEMPLATE."/home.php");
    }
    ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="40" align="center" style="border-top: 1px solid #DDD;">Universal E-Money System</td>
  </tr>
</table>
