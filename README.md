# Interbot

[ENG] [[RU]](README.ru.md)

A telegram bot for [Interkot](http://www.interkot.ru/).

## Installation

1) Clone the repo
```sh
git clone https://github.com/Azarattum/Interbot.git
cd Interbot
```

2) Add a website's API endpoint and a telegram token ([obtain here](https://t.me/botfather/)) in `config.php`:
```php
$api = "https://example.com/";
$token = "123456:ASDFGH-9876";
```

3) Setup a Telegram web hook for your server using the following URL:
```
                            ↓ INSERT TOKEN HERE
https://api.telegram.org/bot   /setWebhook?url=
                                               ↑ INSERT URL HERE
```

4) Run the bot (for development environment)
```sh
php -S localhost:8000
```

5) (Optional) For development purposes you might also expose your local port using [ngrok](https://ngrok.com/):
```sh
ngrok http 8000
```

## Credit

This project uses a slightly modified version of [radyakaze's telebot library](https://github.com/radyakaze/Telebot).