<?php

require_once "lib/telebot.php";
require_once "app/subscription.php";
require_once "app/courses.php";
require_once "app/markup.php";
require_once "app/pages.php";
require_once "app/utils.php";
require_once "app/lang.php";
require_once "app/api.php";
require_once "config.php";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
  include "app/ui.php";
  exit;
}

$bot = new Telebot($token);

$bot->cmd('/subscribe', function () {
  subscribe(Bot::message()["chat"]["id"]);
  Bot::sendMessage(...menu(lang("subscribed")));
});

$bot->cmd('/unsubscribe', function () {
  unsubscribe(Bot::message()["chat"]["id"]);
  Bot::sendMessage(...menu(lang("unsubscribed")));
});

$bot->cmd('*', function () {
  Bot::sendMessage(...menu(lang("greeting")));
});

$bot->on("callback", function ($type) {
  switch ($type) {
    case 'about':
      about();
      break;
    case 'courses':
      courses();
      break;
    case 'contacts':
      contacts();
      break;
    case 'schedule':
      schedule();
      break;
    default:
      details($type);
  }
  Bot::answerCallbackQuery("");
});

$bot->run();
