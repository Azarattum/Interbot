<?php

require_once "utils.php";

$keyboard = [
  [
    [
      "text" =>  lang("about_header"),
      "callback_data" => "about"
    ],
    [
      "text" =>  lang("contacts_header"),
      "callback_data" =>  "contacts"
    ]
  ], [
    [
      "text" =>  lang("courses_header"),
      "callback_data" =>  "courses"
    ],
    [
      "text" =>  lang("schedule_header"),
      "callback_data" =>  "schedule"
    ],
    [
      "text" =>  lang("blog_header"),
      "url" =>  "http://www.interkot.ru/pages/blog.html"
    ]
  ]
];

$menu = ["reply_markup" => ["inline_keyboard" => $keyboard], "parse_mode" => "MarkdownV2"];

function menu($text)
{
  global $menu;
  return [$text, $menu];
}

function page($page, $data = null, $keyboard = null)
{
  $content = "*" . mb_strtoupper(lang($page . "_header")) . "*\n\n" . lang($page . "_content");
  if (!is_null($data)) {
    $content = str_replace("{}", $data, $content);
  }
  if (is_null($keyboard)) return menu($content);

  return [$content, ["reply_markup" => ["inline_keyboard" => $keyboard], "parse_mode" => "MarkdownV2"]];
}
