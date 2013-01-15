<?php
$items = array
(
  new SpawTbButton("core", "hyperlink", "isInDesignMode", "", "hyperlinkClick", SPAW_AGENT_ALL, true),
  new SpawTbButton("core", "unlink", "isStandardFunctionEnabled", "", "standardFunctionClick", SPAW_AGENT_ALL, true),
  new SpawTbButton("core", "image", "isInDesignMode", "", "imageClick", SPAW_AGENT_ALL, true),
  new SpawTbImage("core", "separator"),
  new SpawTbButton("core", "bold", "isStandardFunctionEnabled", "isStandardFunctionPushed", "standardFunctionClick"),
  new SpawTbButton("core", "italic", "isStandardFunctionEnabled", "isStandardFunctionPushed", "standardFunctionClick"),
  new SpawTbButton("core", "underline", "isStandardFunctionEnabled", "isStandardFunctionPushed", "standardFunctionClick"),
  new SpawTbButton("core", "strikethrough", "isStandardFunctionEnabled", "isStandardFunctionPushed", "standardFunctionClick"),
  new SpawTbImage("core", "separator"),
);
?>
