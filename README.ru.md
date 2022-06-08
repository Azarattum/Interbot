# Интербот

[[ENG]](README.md) [RU]

Телеграм бот для [Интеркота](http://www.interkot.ru/).

## Установка

1) Клонируйте репозиторий
```sh
git clone https://github.com/Azarattum/Interbot.git
cd Interbot
```

2) Настройте эндпоинт вашего API и телеграм токен ([получить тут](https://t.me/botfather/)) в файле `config.php`:
```php
$api = "https://example.com/";
$token = "123456:ASDFGH-9876";
```

1) Активируйте Telegram веб хук для вашего сервера по следующей ссылке:
```
                            ↓ ВСТАВЬТЕ СЮДА ТОКЕН
https://api.telegram.org/bot   /setWebhook?url=
                                               ↑ ВСТАВЬТЕ СЮДА ССЫЛКУ
```

4) Запустите бота (для тестирования на локальном хосте)
```sh
php -S localhost:8000
```

5) (Необязательно) В целях удобства разработки, вы также можете открыть локальный порт используя [ngrok](https://ngrok.com/):
```sh
ngrok http 8000
```

## Сторонние Модули

Этот проект использует немного модифицированную версию [telebot библиотеки от radyakaze](https://github.com/radyakaze/Telebot).