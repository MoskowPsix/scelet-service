# Backend Service Template

Представляет из себя модифицированную под наши нужды экземпляр `Laravel 12.0` 

## Разворот сервиса Backend Service Template

1. git clone <repository_url>
2. cd backend-service-template
3. rm -rf .git && git init
4. git remote add origin <repository_url>
5. Указываем в .env.example нужный APP_NAME
6. `cp .env.example .env`
7. Указываем в `.env` доступы к БД
8. Обновляем `README.md`
9. composer i
10. git add . && git commit -m "Initial commit" && git push -u origin master
11. `php artisan key:generate`
12. `php artisan storage:link`

## Модификации относительно чистого Laravel

### routes

Изменены расположения маршрутовы

### docs

Установлен пакет для генерации спецйификации по yaml фалам и написан для него отдельный контроллер, маршрут и сервис провайдер

### tests

Установлны пакеты `pestphp/pest` `pestphp/pest-plugin-laravel`
### robots.txt

robots.txt изменен, чтобы по-умолчанию приложение запрещало роботам индексацию если они вдруг до него доберутся

