<?php include_once'functions.php';
  require_once("WalkScore.php");
  

$temp = get_walkscore('1119 208th Ave S, Seattle, WA');
var_dump($temp);
  //$w = new WalkScore('dbd8b3f251a2ea4b4a6be60beae80642');
  // WalkScore example
  // Example data from http://www.walkscore.com/professional/api.php
  $options = array(
    'address' => '1119 208th Ave S, Seattle, WA',
    'lat'=>47.6085,
    'lon'=>-122.3295,
  );
  var_dump($options);
  //printf("WalkScore for %s:\n", $options['address']);
  //$score = $w->WalkScore($options)->walkscore;
  //echo $score; 
  ?>