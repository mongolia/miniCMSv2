<script src="../../Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>
          <? '<h2>'.$DB->mbm_get_field(mbmShowByLang(array('mn'=>31,'en'=>79)),'id','name','menus').'</h2>';?>
      <div style="display:block;">
          <?
            echo mbmContentNews($htmls_normal,mbmShowByLang(array('mn'=>31,'en'=>79)),4,4,'date_added','desc',1,1)
			?>
          </div>
          <a href="http://nac.gov.mn/index.php?module=menu&amp;cmd=content&amp;menu_id=31"><strong>Бусад мэдээ мэдээлэл...
          </strong></a></td>
  </tr>
  <tr>
    <td height="10"></td>
  </tr>
  <tr>
    <td class="talbar"><table width="100%" border="0" cellpadding="3" cellspacing="2">
        <tr>
          <td width="50%" valign="top"><?
            echo '<h2>'.$DB->mbm_get_field(mbmShowByLang(array('mn'=>107,'en'=>107)),'id','name','menus').'</h2>';
			echo mbmContentNews($htmls_normal,mbmShowByLang(array('mn'=>109,'en'=>109)),0,8,'date_added','desc',0,1)
			?></td>
          <td valign="top"><?
            echo '<h2>'.$DB->mbm_get_field(mbmShowByLang(array('mn'=>35,'en'=>84)),'id','name','menus').'</h2>';
			echo mbmContentNews($htmls_normal,mbmShowByLang(array('mn'=>35,'en'=>84)),0,8,'date_added','desc',0,1)
			?>
          </td>
        </tr>
      </table></td>
  </tr>
  <!--
  <tr>
    <td height="5"></td>
  </tr>
  
  <tr>
    <td><?=mbmShowBanner('home3')?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  
  <tr>
    <td class="talbar"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td align="center" valign="top"><?=mbmShowBanner('home1')?></td>
        <td align="center" valign="top"><?=mbmShowBanner('home2')?></td>
      </tr>
    </table></td>
  </tr>
  //-->
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
