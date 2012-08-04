<script src="../../Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="310" valign="top"><table width="300" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td><div class="talbarTitleBlue">Онцлох мэдээ</div></td>
      </tr>
      <tr>
        <td class="talbarBorderBlue"><?
        
			$htmls_normal[0] = '<ul>';
			$htmls_normal[2] = '<li style="margin-bottom:6px;">';
			$htmls_normal[3] = '</li>';
			$htmls_normal[1] = '</ul>';
           echo mbmContentNews($htmls_normal,mbmShowByLang(array('mn'=>31,'en'=>8888)),1,1);
		   
		?></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td><?=mbmShowBanner('home1')?></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td ><div class="talbarTitleGreen"><?=$lang['poll']['poll']?></div></td>
      </tr>
      <tr>
        <td><?=mbmShowPoll(0,1);?></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>
      
      <tr>
        <td><?=mbmShowBanner('home2')?></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td><div class="talbarTitleBlue2"><?=$lang["faqs"]["faqs_title"]?></div></td>
      </tr>
      <tr>
        <td><?
		echo mbmFAQsLastQuestions(5,1);
		echo mbmFAQsForm(30)
		?></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>
    </table></td>
    <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td valign="top"><table width="99%" border="0" align="left" cellpadding="0" cellspacing="0">
          <tr>
            <td><div class="talbarTitleGreen2">
              <?=$lang["menu"]["content_news"]?>
            </div></td>
          </tr>
          <tr>
            <td>
              <div style="height:400px; overflow-y:scroll;">
              <?
        
           echo mbmContentNews($htmls_normal,mbmShowByLang(array('mn'=>17,'en'=>8888)),10,10);
		   
		?>
              </div></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td><div class="talbarTitleBlue2"><?=$lang["menu"]["content_video"]?></div></td>
          </tr>
          <tr>
            <td align="center">
            <?
			$htmls_video[0] = '<table width="100%" cellpadding="3" cellspacing="2" border="0"><tr>';
			$htmls_video[2] = '<td align="center" width="25%" valign="top">';
			$htmls_video[3] = '</td>';
			$htmls_video[1] = '</tr></table>';
           echo mbmShowNewContents($htmls_video,4,"is_video",mbmShowByLang(array('mn'=>33,'en'=>8888)));
			?></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td><div class="talbarTitleYellow2"><?=$lang["menu"]["content_photo"]?></div></td>
          </tr>
          <tr>
            <td align="center"><?=mbmShowNewContents($htmls_video,4,"is_photo",mbmShowByLang(array('mn'=>32,'en'=>8888)));?></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td><div class="talbarTitleGreen2"><?=$lang['web']['web_directory']?></div></td>
          </tr>
          <tr>
            <td><?=mbmWebSubCatsList(16)?></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td><table width="100%" border="0" cellspacing="2" cellpadding="0">
              <tr>
                <td width="50%" valign="top"><?=mbmDicForm()?></td>
                <td width="50%" valign="top"><?=mbmDicEncycForm()?></td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
          </tr>
        </table></td>
        <td width="200" valign="top"><?
           echo  mbmUserPanel($_SESSION['user_id'],array('','','<div style="padding-left:10px;padding-bottom:4px;margin-bottom:3px;border-bottom:1px solid #DDDDDD;">','</div>'));
			?>
          <div align="center"><?=mbmShowBanner('home_right')?></div>
          <div align="center"><?=mbmShowBanner('home_right2')?></div>
          <div align="center"><?=mbmShowBanner('home_right3')?></div>
          <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:6px;">
            <tr>
              <td >&nbsp;</td>
              </tr>
            <tr>
              <td align="center" onclick="window.location='index.php?module=menu&cmd=content&id=293&menu_id=35'">
                <embed src="170x100.swf" width="170" height="100" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" wmode="opaque"></embed>
</td>
            </tr>
            <tr>
              <td >&nbsp;</td>
            </tr>
          </table></td>
      </tr>
    </table><div class="talbarTitleGreen2">Зургийн цомог</div>
        <div align="center" style="margin-bottom:6px;">
		<marquee truespeed direction="left" scrollamount=1 scrolldelay=30  onmouseover=this.stop() onmouseout=this.start() >
		<?
        echo mbmPhotosByGalleryId(PHOTOGALLERY_ACTIVE_ID,15,15,1,0,'id','DESC',0,1,100,100);
		?>
		</marquee>
		<a href="index.php?module=photogallery&amp;cmd=cats">Бүх цомгуудыг харах</a> </div>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><div class="talbarTitleBlue2"><?=mbmShowByLang(array('mn'=>'Хүүхдийн булан','en'=>'Children area'))?></div></td>
          </tr>
          <tr>
            <td><table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:6px;">
              <tr>
                <td rowspan="2" valign="top">
                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td width="50%" id="bb" onclick="mbmChangeTab(1)" class="tab1_active">Блогийн шинэ бичлэгүүд <a href="blog.php" target="_blank">&raquo;</a></td>
                      <td width="50%" id="aa" onclick="mbmChangeTab(2)" class="tab1_inactive">Хэлэлцүүлэгт юу өрнөв <a href="index.php?module=forum&amp;cmd=forums" target="_blank">&raquo;</a></td>
                    </tr>
                    <tr>
                      <td colspan="2" id="sss" bgcolor="#eeeeee" style="border-bottom:1px solid #175796;
                      border-left:1px solid #175796; border-right:1px solid #175796;line-height:17px;"></td>
                    </tr>
                  </table>
                  <?
				$htmls_blog[0]='<div id="last10Blog" style="display:none;"><blockquote><el>';
				$htmls_blog[1]='</el></blockquote></div>';
				$htmls_blog[2]='<li>';
				$htmls_blog[3]='</li>';
               echo  mbmLastBlogContents($htmls_blog,15);
			   echo '<div id="last10forums" style="display:none;">';
			  echo mbmForumContentsList(0,'id','DESC');
			   echo '</div>';
				?>
                  <script language="javascript">
                function mbmChangeTab(a){
					a1 = document.getElementById('bb');
					a2 = document.getElementById('aa');
					a3 = document.getElementById('sss');
					a4 = document.getElementById('last10Blog');
					a5 = document.getElementById('last10forums');
					switch(a){
						case 1:
							a1.className='tab1_active';
							a2.className='tab1_inactive';
							a3.innerHTML = a4.innerHTML;
						document.getElementById("f1").style.display='block';
						document.getElementById("f2").style.display='block';
						document.getElementById("f2").style.className='talbarTitleYellow';
						break;
						case 2:
							a1.className='tab1_inactive';
							a2.className='tab1_active';
							a3.innerHTML = a5.innerHTML;
						document.getElementById("f1").style.display='none';
						document.getElementById("f2").style.display='none';
						break;
					}
				}
				mbmChangeTab(1);
                  </script></td>
                <td width="5" valign="top">&nbsp;</td>
                <td width="200" valign="top" class="talbarTitleYellow" id="f1"><?=$lang['photogallery']['random_image']?></td>
              </tr>
                <style>
				.tab1_active{
					border-left:1px solid #175796;
					border-right:1px solid #175796;
					border-top:1px solid #175796;
					font-weight:bold;
					color:#175796;
					background-color:#eeeeee;
					cursor:pointer;
					padding:5px;
				}
				.tab1_inactive{
					color:#FFFFFF;
					font-weight:bold;
					cursor:pointer;
					background-color:#c0c0c0;
					border-top:1px solid #FFFFFF;
					border-bottom:1px solid #175796;
					padding:5px;
				}
                </style>
              <tr>
                <td valign="top">&nbsp;</td>
                <td align="center" valign="top" class="talbarBorderYellow" id="f2"><?=mbmPhotosByGalleryId(PHOTOGALLERY_ACTIVE_ID,1,1,1,0,'RAND()','',0,0,190,'')?></td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td><marquee truespeed="truespeed" direction="left" scrollamount="1" scrolldelay="30"  onmouseover="this.stop()" onmouseout="this.start()" >
                <table width="100%" border="0" cellspacing="2" cellpadding="0">
                  <tr>
                    <td><a href="http://www.unicef.org" target="_blank"><img src="../../images/partners/unicef.gif" width="188" height="100" border="0" /></a></td>
                    <td><a href="http://www.nairamdal.mn/" target="_blank"><img src="../../images/partners/nairamdal.gif" width="119" height="100" border="0" /></a></td>
                    <td><a href="http://www.nlmmon.org" target="_blank"><img src="../../images/partners/nlm.gif" width="147" height="100" border="0" /></a></td>
                    <td><a href="http://redcross.mn/old/english/international.html" target="_blank"><img src="../../images/partners/redcross.gif" width="158" height="100" border="0" /></a></td>
                    <td><a href="http://www.savethechildren.mn" target="_blank"><img src="../../images/partners/save.gif" width="215" height="100" border="0" /></a></td>
                    <td><a href="http://www.worldvisionmongolia.org" target="_blank"><img src="../../images/partners/wv.gif" width="147" height="100" border="0" /></a></td>
                  </tr>
                </table>
            </marquee></td>
        </tr>
          <tr>
            <td>&nbsp;</td>
          </tr>
    </table></td>
  </tr>
</table>
