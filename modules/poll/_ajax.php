<?php
/*
 heregtei file-uud
  - CORE/xml/poll.php
  - CORE/modules/poll
 */
?>
<style>
    
    #myPollList a:link,a#myPollList a:visited{
        display: block;
        padding: 3px;
    }
</style>
<div style="width: 300px;" id="myPoll">
    <?php
    echo mbmShowPollAjax(0, 1);
    ?>
</div>
<div style="width: 180px;" id="myPollList">
    <?php echo getPolls(5, 1, '#myPoll'); ?>
</div>