<table width="100%" border="0" cellspacing="2" cellpadding="3">
      <tr>
        <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><img src="templates/everyday4/images/tmp.jpg" width="582" height="310" alt="a" /></td>
          </tr>
          <tr>
            <td><div style="padding:5px;">
  <?
            echo mbmContentNews($htmls_normal,mbmShowByLang(array('mn'=>51,'en'=>76)),1,1,'id','DESC',0,1);
			?>
</div></td>
          </tr>
        </table></td>
        <td width="370" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td class="title_talbar">Шинэ бараа</td>
          </tr>
          <tr>
            <td style=" background-image:url(templates/everyday4/images/bg_new.gif); 
            background-position:5px 5px; background-repeat:no-repeat;">
           <div style="margin-left:15px;">
           <?
            echo mbmContentNews($htmls_normal,mbmShowByLang(array('mn'=>57,'en'=>76)),0,5,'id','DESC',0,0);
			?>
           </div>
            </td>
          </tr>
          <tr>
            <td class="title_talbar">Мэдээ мэдээлэл</td>
          </tr>
          <tr>
            <td>
              <div style="padding:5px; height:300px; overflow-y:auto;">
              <?
			echo mbmContentNews($htmls_normal,mbmShowByLang(array('mn'=>57,'en'=>76)),3,8,'id','DESC',0,1);
			?>
              </div>
            </td>
          </tr>
          <tr>
            <td><img src="templates/everyday4/images/tmp2.jpg" width="360" height="78" alt="a" /></td>
          </tr>
        </table></td>
      </tr>
    </table>