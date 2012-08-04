<br />
<br />
<!-- ++Begin Video Bar Wizard Generated Code++ --> <!--
  // Created with a Google AJAX Search Wizard
  // http://code.google.com/apis/ajaxsearch/wizards.html
  --> <!--
  // The Following div element will end up holding the actual videobar.
  // You can place this anywhere on your page.
  --> 
<div id="videoBar-bar"> <span style="margin: 10px; padding: 4px; color: rgb(103, 103, 103); font-size: 11px;">Loading...</span> 
</div> <!-- Ajax Search Api and Stylesheet
  // Note: If you are already using the AJAX Search API, then do not include it
  //       or its stylesheet again
  --> <script type="text/javascript" src="http://www.google.com/uds/api?file=uds.js&amp;v=1.0&amp;source=uds-vbw"></script> <style type="text/css">    @import url("http://www.google.com/uds/css/gsearch.css");
  </style> <!-- Video Bar Code and Stylesheet --> <script type="text/javascript">
    window._uds_vbw_donotrepair = true;
  </script> <script type="text/javascript" src="http://www.google.com/uds/solutions/videobar/gsvideobar.js?mode=new"></script> <style type="text/css">    @import url("http://www.google.com/uds/solutions/videobar/gsvideobar.css");
  </style> <style type="text/css">    .playerInnerBox_gsvb .player_gsvb {
      width : 320px;
      height : 260px;
    }
  </style> <script type="text/javascript">
    function LoadVideoBar() {

    var videoBar;
    var options = {
        largeResultSet : !true,
        horizontal : true,
        autoExecuteList : {
          cycleTime : GSvideoBar.CYCLE_TIME_MEDIUM,
          cycleMode : GSvideoBar.CYCLE_MODE_LINEAR,
          executeList : ["ytfeed:most_viewed.today","ytfeed:top_rated.today","ytchannel:ladies","ytchannel:fun","ytchannel:comedy"]
        }
      }

    videoBar = new GSvideoBar(document.getElementById("videoBar-bar"),
                              GSvideoBar.PLAYER_ROOT_FLOATING,
                              options);
    }
    // arrange for this function to be called during body.onload
    // event processing
    GSearch.setOnLoadCallback(LoadVideoBar);
  </script> <!-- ++End Video Bar Wizard Generated Code++ --> 