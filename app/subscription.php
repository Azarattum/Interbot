<?php

$filename = "subscribers.json";

function subscribe($id)
{
  global $filename;

  $subscribers = getSubscribers();
  if (array_search($id, $subscribers) === false) array_push($subscribers, $id);
  file_put_contents($filename, json_encode($subscribers));
}

function unsubscribe($id)
{
  global $filename;

  $subscribers = getSubscribers();
  array_splice($subscribers, array_search($id, $subscribers), 1);
  file_put_contents($filename, json_encode($subscribers));
}

function getSubscribers()
{
  global $filename;

  if (!file_exists($filename)) return [];
  $data = json_decode(file_get_contents($filename));
  if (!$data) $data = [];
  return $data;
}
