<?php

require_once "lib/telebot.php";
require_once "app/subscription.php";
require_once "app/markup.php";
require_once "config.php";

$message = $_POST["message"];

if ($message) {
  $bot = new Telebot($token);
  $subscribers = getSubscribers();

  foreach ($subscribers as $subscriber) {
    [$text, $options] = page("notification", escape($message, true));
    Bot::sendMessage($text, $options + ["chat_id" => $subscriber]);
  }
}

header("Location: .");
