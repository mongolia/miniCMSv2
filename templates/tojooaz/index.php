<?
	$htmls_video[0] = '<table width="100%" cellpadding="3" cellspacing="2" border="0"><tr>';
	$htmls_video[2] = '<td align="center" width="25%" valign="top">';
	$htmls_video[3] = '</td>';
	$htmls_video[1] = '</tr></table>';
	
	$htmls_normal[0] = '<ul>';
	$htmls_normal[2] = '<li style="margin-bottom:6px;">';
	$htmls_normal[3] = '</li>';
	$htmls_normal[1] = '</ul>';
?><table width="950" border="0" align="center" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td><?=mbmShowBanner('header')?></td>
      </tr>
      <tr>
        <td height="30" style="background-image:url(templates/tojooaz/images/menu_bg.jpg);"><?=mbmDropDownMenus(0)?></td>
      </tr>
      <tr>
        <td height="5"></td>
      </tr>
    </table>
      <?
            if(file_exists(ABS_DIR."modules/".$_GET['module']."/".$_GET['cmd'].".php")){
				mbm_include_file("modules/".$_GET['module']."/".$_GET['cmd'].".php");
			}else{
				mbm_include_file("templates/".TEMPLATE."/home.php");
			}
		?></td>
    <td width="5" valign="top">&nbsp;</td>
    <td width="290" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="30" align="right" bgcolor="#F5F5F5" style="padding-right:5px; color:#003663;"><a href="index.php">Нүүр</a> | <a href="#">Холбоо тогтоох</a></td>
      </tr>
      <tr>
        <td height="1" bgcolor="#f2763d"></td>
      </tr>
      <tr>
        <td height="70" valign="top" style="color:#F7941C;"><br />
          Хайлт:<form action="http://search.az.mn" id="cse-search-box" target="_blank">
                      <div>
                        <input type="hidden" name="cx" value="partner-pub-3377050199087606:dwz8075rawc" />
                        <input type="hidden" name="cof" value="FORID:10" />
                        <input type="hidden" name="ie" value="UTF-8" />
                        <input type="text" name="q" size="31" class="search_input" />
                        <input type="submit" name="sa" value="Хайх" class="search_button" />
              </div>
          </form></td>
      </tr>
      <tr>
        <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td valign="top" style="border:1px solid #DDD;">
       
            <div class="talbar_title" style="border-top:1px solid #DDD;">Сэлбэгийн төрөл</div>
            <div style="padding:5px;">
              <?=mbmShoppingCat1()?>
            </div>
            <div class="talbar_title" style="border-top:1px solid #DDD;">Туслах цэс</div>
            <div style="padding:5px;" id="tuslahMenu">
              
              <? mbmShowMenuById(array('<li>','</li>','',''),396,'makers',1);?>
              <?
              echo mbmMenuListById(array(
								'menu_id'=>396,
								'lev'=>0,
								'st'=>1,
								'leftTitle'=>'',
								'subCatClass'=>''
								));
			  ?>
            </div>
            <div class="talbar_title" style="border-top:1px solid #DDD;">Авто уралдаан</div>
            <div style="padding:5px;" id="autoUraldaanMenu">
              <?
              echo mbmMenuListById(array(
								'menu_id'=>399,
								'lev'=>0,
								'st'=>1,
								'leftTitle'=>'',
								'subCatClass'=>''
								));
			  ?>
            </div>
            
            <div class="talbar_title">Үйлдвэрлэгчид</div>
            <div style="padding:5px;" id="maker">
              <ul style="line-height:17px; margin-left:-20px;">
			  <?=mbmAutoFirms(
							  array(
									'html_0'=>'<li>',
									'html_1'=>'</li>',
									'class'=>'makers',
									'order_by'=>'name'
									))?>
              </ul>
            </div>
            </td>
            <td width="5" valign="top"></td>
            <td width="120" align="right" valign="top">
            <p><?=mbmShowBanner('right_1')?></p>
            <p><?=mbmShowBanner('right_2')?></p>
            <p><?=mbmShowBanner('right_3')?></p>
            
            </td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>
    </table></td>
    <td width="5" valign="top">&nbsp;</td>
  </tr>
</table>
<h2>Partners</h2>
<div style="
            border-top:1px solid #DDD; 
            border-bottom:1px solid #DDD;
            background-color:#F5F5F5;
            padding:10px;
            margin-left:-10px;
            display:block;
            height:120px;
            margin-bottom:10px;"></div>
