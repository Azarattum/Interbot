<?php

function about()
{
  Bot::sendMessage(...page("about"));
}

function courses()
{
  global $courses;
  $titles = array_map(function ($x) {
    return $x["title"];
  }, $courses);

  $list = escape(join("", array_map(function ($x) {
    return "  • " . $x . "\n";
  }, $titles)));

  $keyboard = array_map(function ($x) {
    return [["text" => $x, "callback_data" => hash("md5", $x)]];
  }, $titles);

  Bot::sendMessage(...page("courses", $list, $keyboard));
}

function contacts()
{
  Bot::sendMessage(...page("contacts"));
}

function schedule()
{
  $location = "ЦМИТ Малахова";
  $text =  $location . "\n";

  $schedule = getSchedule();
  $relevant = array_filter($schedule, function ($item) use ($location) {
    return $item["point_title"] == $location;
  });

  $weekdays = ["monday", "tuesday", "wednesday", "thursday", "friday", "saturday"];
  foreach ($weekdays as $id => $day) {
    $courses = array_filter($relevant, function ($item) use ($id) {
      return $item["day_of_week"] == $id;
    });
    if (count($courses) == 0) continue;
    usort($courses, function ($a, $b) {
      return (explode(":", $a["time"])[0] < explode(":", $b["time"])[0]) ? -1 : 1;
    });

    $text .= "`  " . lang($day) . ":\n";
    foreach ($courses as $course) {
      $text .= "    " . $course["time"] . " (" . $course["duration"] . " " . lang("minutes") . ") - ";
      $text .= $course["curse_title"] . " (" . $course["age_s"] . "+)\n";
    }
    $text .= "`\n";
  }
  Bot::sendMessage(...page("schedule", $text));
}

function details($course)
{
  global $courses;
  $course = current(array_filter($courses, function ($x) use ($course) {
    return hash("md5", $x["title"]) == $course;
  }));
  if (!$course) return;

  $details = join("", array_map(function ($x) {
    return "  • " . $x . "\n";
  }, $course["details"]));

  $text = "*" . $course["title"] . "*\n" . "  _" . $course["description"] . "_\n\n" . $details;
  // Bot::sendMessage(...menu(escape($text)));
  $menu = menu(escape($text));
  Bot::sendPhoto($course["image"], [
    "caption" => $menu[0],
  ] + $menu[1]);
}
