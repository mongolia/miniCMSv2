<div id="row_col_1"><img src="templates/yadii/images/logo_w.png" alt="logo<?=$rand_db_user?>" width="153" height="45" /><!--logo_w.png//--></div>

<div id="row_col_2" class="header_menu" onclick="mbmShowSubDiv(1)">

    <a href="#" onclick="return false;"><strong>Yadii.Net</strong></a>

</div>

<div id="row_col_3" class="header_menu" onclick="mbmShowSubDiv(2)"><a href="#" onclick="return false;"><strong>Клип</strong></a></div>

<div id="row_col_4" class="header_menu" onclick="mbmShowSubDiv(3)"><a href="http://www.yadii.net/index.php?module=menu&cmd=content&menu_id=318" onclick="return false;" target="_blank"><strong>Студиуд</strong></a></div>

<div id="row_col_5" class="header_menu" onclick="mbmShowSubDiv(4)"><a href="#" onclick="return false;"><strong>Видео</strong></a></div>

<div id="row_col_6" class="header_menu" onclick="mbmShowSubDiv(5)"><a href="#" onclick="return false;"><strong>Видео хичээл</strong></a></div>

<div id="row_col_7" class="header_menu" onclick="mbmShowSubDiv(6)"><a href="http://www.yadii.net/index.php?module=menu&amp;cmd=content&amp;id=1812&amp;menu_id=314"><strong>ТВ үзэх</strong></a></div>

<div id="row_col_8" class="header_menu" onclick="mbmShowSubDiv(7)"><a href="#" onclick="return false;"><strong>RSS</strong></a></div>

    <div id="submenu_1" class="header_submenu">

        <div class="divClose" onclick="mbmHideSubDiv(1)">x</div>

        <a href="index.php" class="header_submenu_link">Сайтын эхлэл</a>

        <a href="index.php?module=menu&amp;cmd=content&menu_id=314" class="header_submenu_link">Шинэ мэдээ</a>

        <a href="index.php?module=menu&amp;cmd=content&menu_id=317" class="header_submenu_link">Фото мэдээ</a>

        <a href="index.php?module=grabber&cmd=fetch" class="header_submenu_link">Yadii.Net Урилга илгээх</a>

        <a href="index.php?module=photogallery&cmd=cats&cat_id=1" class="header_submenu_link">Хэрэглэгчийн зургууд</a>

        <a href="index.php?module=menu&amp;cmd=content&menu_id=387" class="header_submenu_link">Сурталчилгаа</a>

    </div>

    <div id="submenu_2" class="header_submenu">

        

        <table width="100%" border="0" cellspacing="2" cellpadding="2">

          <tr>

            <td width="20%" valign="top">

            

        <a href="index.php?module=menu&amp;cmd=yadii_singers&amp;menu_id=2" class="header_submenu_link">

            <strong>Бүх дуучид</strong>        </a>

        <a href="index.php?module=menu&cmd=yadii_singers&menu_id=3" class="header_submenu_link">

            Rock Pop        </a>

        <a href="index.php?module=menu&cmd=yadii_singers&menu_id=4" class="header_submenu_link">

            Hip Hop        </a>

        <a href="index.php?module=menu&cmd=yadii_singers&menu_id=6" class="header_submenu_link">

            Нийтийн дуу        </a>

        <a href="index.php?module=menu&cmd=yadii_singers&menu_id=5" class="header_submenu_link">

            R & B, Techno, Trance        </a>

        <a href="index.php?module=menu&cmd=yadii_singers&menu_id=7" class="header_submenu_link">

            Бусад        </a>

            </td>

            <td width="20%" valign="top">

        <a href="http://www.yadii.net/index.php?action=banner&amp;id=5&amp;url=aHR0cDovL3d3dy53b3JsZHZpZGVvbXVzaWMuY29t" class="header_submenu_link" target="_blank">

            <strong>www.WorldVideoMusic.com</strong>        </a>

          <!--

        <a href="http://www.yadii.net/index.php?action=banner&amp;id=7&amp;url=aHR0cDovL3d3dy5jaGFydDEwLmNvbS9pbmRleC5waHA=" class="header_submenu_link" target="_blank">

            www.chart10.com

        </a>

        //-->

        <a href="index.php?module=menu&amp;cmd=content&amp;menu_id=338" class="header_submenu_link">

            Embed clip        </a>

        <a href="#" class="header_submenu_link" onclick="window.open('http://www.yadii.net/radio.php','YadiiRadio','height=100,width=200,scrolbars=0,toolbars=0,resizeable=0'); return false;">

            Интернэт Радио        </a>            </td>

            <td width="20%" valign="top">

            

            </td>

            <td width="20%" valign="top">&nbsp;</td>

            <td width="20%" valign="top"><div class="divClose" onclick="mbmHideSubDiv(2)">x</div>

            </td>

          </tr>

        </table>

    </div>

    <div id="submenu_3" class="header_submenu">

        <table width="100%" border="0" cellspacing="2" cellpadding="2">

          <tr>

            <td height="140" bgcolor="#FFFFFF" style="padding:5px;"><?

				  echo mbmShowNewContents($htmls_video,8,"is_video",318,'date_added','DESC');

				  ?>            </td>

            <td width="20%" valign="top"> <div class="divClose" onclick="mbmHideSubDiv(3)">x</div>

              <a href="index.php?module=menu&cmd=content&menu_id=318" class="header_submenu_link">Нэвтрүүлгүүдийн жагсаалт</a></td>

          </tr>

        </table>

    </div>

    <div id="submenu_4" class="header_submenu">

        

        <table width="100%" border="0" cellspacing="2" cellpadding="2">

          <!--

          <tr>

            <td width="20%" class="submenu_title">Studios</td>

            <td width="20%" class="submenu_title">Байгууллага</td>

            <td width="20%" class="submenu_title">Нэвтрүүлэг</td>

            <td width="20%" class="submenu_title">Видео</td>

            <td width="20%" class="submenu_title"><div class="divClose" onclick="mbmHideSubDiv(4)">x</div>Бусад</td>

          </tr>

          //-->

          <tr>

            <td width="20%" valign="top">

            	<a href="index.php?module=menu&cmd=content&menu_id=318" class="header_submenu_link">Tick studio</a>

            </td>

            <td width="20%" valign="top"><a href="index.php?module=menu&amp;cmd=content&amp;menu_id=339" class="header_submenu_link">Скайтел</a>

              <a href="index.php?module=menu&cmd=content&menu_id=340" class="header_submenu_link" onclick="return false;">Мобиком</a>

              <a href="index.php?module=menu&cmd=content&menu_id=341" class="header_submenu_link" onclick="return false;">Юнитель</a>

              <a href="index.php?module=menu&cmd=content&menu_id=342" class="header_submenu_link" onclick="return false;">Ж-Мобайл</a></td>

            <td width="20%" valign="top">

           	  <a href="index.php?module=menu&cmd=content&menu_id=314&id=1812" class="header_submenu_link">Интернэт ТВ (MNBS)</a>

           	  <a href="index.php?module=menu&cmd=content&menu_id=327" class="header_submenu_link">ТВ Мэдээ</a>

              <a href="<?

              if($_SESSION['lev']>0){

			  	echo 'index.php?module=menu&cmd=content&menu_id=347';

			  }else{

			  	echo '#" onclick="alert(\'Та хэрэглэгчийн эрхээ ашиглан нэвтэрч орно уу.\'); return false;';

			  }

			  ?>" class="header_submenu_link">Тоглолт</a>

            <a href="index.php?module=menu&cmd=yadii_singers&menu_id=2" class="header_submenu_link" target="_blank">

                <strong>Монгол клип</strong>

            </a>

            <a href="http://www.yadii.net/index.php?action=banner&amp;id=5&amp;url=aHR0cDovL3d3dy53b3JsZHZpZGVvbXVzaWMuY29t" class="header_submenu_link" target="_blank">

                <strong>Гадаад клип</strong>

            </a>

            </td>

            <td width="20%" valign="top">

           	  <a href="index.php?module=menu&cmd=play_videolist" class="header_submenu_link" 

              <?

              if($_SESSION['lev']==0){

			  	echo 'onclick="alert(\'Та хэрэглэгчийн эрхээ ашиглан нэвтэрч орно уу.\'); return false;"';

			  }

			  ?>

               style="color:#FFFF00;"><strong>Хувийн видео сан</strong></a>

           	  <a href="index.php?module=menu&cmd=content&menu_id=373" class="header_submenu_link">Хошин шог, Инээд</a>

                <a href="index.php?module=menu&cmd=content&menu_id=374" class="header_submenu_link">Кино</a>

           	  <a href="index.php?module=menu&cmd=content&menu_id=319" class="header_submenu_link">Хэрэглэгчийн видео</a>

                <a href="index.php?module=menu&cmd=content&menu_id=338" class="header_submenu_link">Embed видео</a>
                <a href="index.php?module=menu&cmd=content&menu_id=379" class="header_submenu_link">Видео сурталчилгаа</a>

               <?

                if($_SESSION['lev']>0){

                	echo '<a href="index.php?module=menu&cmd=content&menu_id=331&ob=date_added&asc=asc" class="header_submenu_link"> Наруто (Anbu and Anime)</a>';

                	echo '<div class="header_submenu_link"> Аватар. Ном 

						<a href="index.php?module=menu&cmd=content&menu_id=370&ob=date_added&asc=asc" style="color:#FFFFFF;">1</a>-

						<a href="index.php?module=menu&cmd=content&menu_id=371&ob=date_added&asc=asc" style="color:#FFFFFF;">2</a>-

						<a href="index.php?module=menu&cmd=content&menu_id=372&ob=date_added&asc=asc" style="color:#FFFFFF;">3</a>

						</div>';

                }

                ?>            </td>

            <td width="20%" valign="top"><div class="divClose" onclick="mbmHideSubDiv(4)">x</div>

                <a href="index.php?module=menu&cmd=content&menu_id=337" class="header_submenu_link" onclick="return false;">Бусад</a>

                <a href="#" class="header_submenu_link"></a>

                <a href="#" class="header_submenu_link"></a>

            <br />

            <a href="http://www.yadii.net/index.php?module=video&amp;cmd=dl" class="header_submenu_link">Youtube-c видео татах</a></td>

          </tr>

        </table>

    </div>

    <div id="submenu_5" class="header_submenu">

         <table width="100%" border="0" cellspacing="2" cellpadding="2">

          <tr>

            <td width="20%" valign="top">

            	<a href="index.php?module=menu&amp;cmd=content&amp;menu_id=349" class="header_submenu_link">

                	PHP

                </a> 

            	<a href="index.php?module=menu&amp;cmd=content&amp;menu_id=350" class="header_submenu_link">

                	MySQL

                </a> 

            	<a href="index.php?module=menu&amp;cmd=content&amp;menu_id=351" class="header_submenu_link">

                	Web Server

                </a> 

            	<a href="index.php?module=menu&amp;cmd=content&amp;menu_id=353&amp;ob=date_added&amp;asc=asc" class="header_submenu_link">

                	PHP,MySQL багц хичээл 1

                </a> 

            </td>

            <td width="20%" valign="top">

            	<a href="index.php?module=menu&amp;cmd=content&amp;menu_id=368&amp;ob=date_added&amp;asc=asc" class="header_submenu_link" >

               		Adobe Flash

                </a>

            	<a href="index.php?module=menu&amp;cmd=content&amp;menu_id=380" class="header_submenu_link" >

               		Adobe Photoshop

                </a>

            	<a href="index.php?module=menu&amp;cmd=content&amp;menu_id=394" class="header_submenu_link" >

               		Adobe Dreamweaver

                </a>

            	<a href="#" class="header_submenu_link" onclick="return false;">

               		Adobe Illustrator

                </a>

            	<a href="#" class="header_submenu_link" onclick="return false;">

               		Adobe After effects

                </a>

            </td>

            <td width="20%" valign="top">

            	<a href="index.php?module=menu&amp;cmd=content&amp;menu_id=356" class="header_submenu_link">

               		Microsoft Excel

                </a>

            	<a href="index.php?module=menu&amp;cmd=content&amp;menu_id=357&amp;ob=date_added&amp;asc=asc" class="header_submenu_link">

               		MS Excel 2003 (by Mark)

                </a>

            </td>

            <td width="20%" valign="top">&nbsp;

            </td>

            <td width="20%" valign="top"><div class="divClose" onclick="mbmHideSubDiv(5)">x</div>

            	<a href="index.php?module=menu&amp;cmd=content&amp;menu_id=352" class="header_submenu_link" >

               		3d Max

                </a>

            </td>

          </tr>

        </table>

    </div>

    <div id="submenu_6" class="header_submenu">

        <div class="divClose" onclick="mbmHideSubDiv(6)">x</div>

        <p>Интернэтээр Монголын ТВ-үүдийн нэвтрүүлгүүдийг үзүүлэх туршилт явагдаж байна. Та дэлхийн хаана ч байсан шууд үзэх боломжтой.<br />

          Үзэхийн тулд:</p>

        <p>1. Windows Media Player ажлуулна. GOM PLAYER байсан ч болно.<br />

          2. File цэсний OPEN URL коммандыг сонгоно (CTRL+U дарж болно)<br />

          3. http://202.131.242.238:8080 хаягийг оруулаад OPEN товчлуурыг дарна.</p>

    </div>

    <div id="submenu_7" class="header_submenu">

      <table width="100%" border="0" cellspacing="2" cellpadding="2">

          <!--

          <tr>

            <td width="20%" class="submenu_title">Studios</td>

            <td width="20%" class="submenu_title">Байгууллага</td>

            <td width="20%" class="submenu_title">Нэвтрүүлэг</td>

            <td width="20%" class="submenu_title">Видео</td>

            <td width="20%" class="submenu_title"><div class="divClose" onclick="mbmHideSubDiv(4)">x</div>Бусад</td>

          </tr>

          //-->

          <tr>

            <td width="20%" valign="top"><a href="http://feedproxy.google.com/YadiiNetnew100" class="header_submenu_link" target="_blank"> Шинэ 100 Видео </a> <a href="rss.php?action=content&amp;type=photo" class="header_submenu_link" target="_blank"> Шинэ 100 Фото </a> <a href="rss.php?action=content&amp;type=normal" class="header_submenu_link" target="_blank"> Шинэ 100 мэдээлэл </a> <a href="http://feedproxy.google.com/YadiiNetTop100" class="header_submenu_link" target="_blank"> Хамгийн их үзсэн 100 видео </a> <a href="rss.php?action=content&amp;type=photo&amp;order_by=hits" class="header_submenu_link" target="_blank"> Хамгийн их үзсэн 100 фото </a> <a href="rss.php?action=content&amp;type=normal&amp;order_by=hits" class="header_submenu_link" target="_blank"> Их уншсан 100 мэдээлэл </a> </td>

            <td width="20%" valign="top">

            	<a href="http://www.yadii.net/rss.php?action=content&amp;type=video&amp;order_by=session_time&amp;asc=desc" class="header_submenu_link" target="_blank">

                	Хамгийн сүүлд үзсэн видео

                </a>

            	<a href="http://www.yadii.net/rss.php?action=content&amp;type=photo&amp;order_by=session_time&amp;asc=desc" class="header_submenu_link" target="_blank">

                	Хамгийн сүүлд үзсэн фото

                </a>

            	<a href="http://www.yadii.net/rss.php?action=content&amp;type=photo&amp;order_by=downloaded&amp;asc=desc" class="header_submenu_link" target="_blank">

                	Хамгийн их татагдсан видео

                </a>

            </td>

            <td width="20%" valign="top"><!--

           	  <a href="index.php?module=menu&cmd=content&menu_id=347" class="header_submenu_link">Тоглолт</a>

              //-->            </td>

            <td width="20%" valign="top">&nbsp;</td>

            <td width="20%" valign="top"><div class="divClose" onclick="mbmHideSubDiv(7)">x</div>

            <a href="#" class="header_submenu_link" onclick="return false;">Бусад</a> <a href="#" class="header_submenu_link"></a> <a href="#" class="header_submenu_link"></a> </td>

          </tr>

        </table>

    </div>

<script language="javascript" type="text/javascript">

    function mbmShowSubDiv(id){

    for(i=1;i<8;i++){

        if(i!=id){

            document.getElementById('submenu_'+i).style.display='none';

        }

    }

    document.getElementById('submenu_'+id).style.display='block';

    document.getElementById('r1').style.visibility='hidden';

    }

    function mbmHideSubDiv(id){

    document.getElementById('submenu_'+id).style.display='none';

    document.getElementById('r1').style.visibility='visible';

    }

    </script>