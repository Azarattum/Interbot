<?php

require_once "lang.php";

function debug($text)
{
  $console = fopen('php://stdout', 'w');
  fwrite($console, "[DEBUG]: " . var_export($text, true)  . "\n");
  fclose($console);
}

function escape($text, $full = false)
{
  $escape = $full ? ["_", "*", "[", "]", "(", ")", "~", "`", ">", "#", "+", "-", "=", "|", "{", "}", ".", "!"] :  ["-", ".", "!", "+"];
  foreach ($escape as $symbol) {
    $text = str_replace($symbol, "\\" . $symbol, $text);
  }
  return $text;
}

function lang($message)
{
  global $lang;
  return escape($lang[$message]);
}

function unwrap($text)
{
  return preg_replace("/(^_\()|(\)$)/", "", $text);
}
