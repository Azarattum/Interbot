<?php

require_once "config.php";
require_once "utils.php";

function getSchedule()
{
  global $api;
  $text = file_get_contents($api . "schedule/get/all/1/_");
  $data = json_decode(unwrap($text), true);
  return $data;
}
