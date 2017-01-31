Введение.

Общую информацию о приложении можно посмотреть на тестовой системе:
http://laravel.foradmins.ru/admin/home


Требования к системе

Проект основан на фреймворке Laravel 5.3

Требованяи к системе:
PHP >= 5.6.4
OpenSSL PHP Extension
PDO PHP Extension
Mbstring PHP Extension
Tokenizer PHP Extension
XML PHP Extension
Mysql like Database

Установка и первый запуск.

1) Для установки скопируете и распакуйте последнюю версию приложения.
https://github.com/ngdude/netology/blob/master/graduate%20work/last.zip

 2) faq.sgl находится дамп базы, с предварительными настройками.
Для создания базы из дампа mysql -u root -p < faq.sgl 
3) Выдайте права пользователя под которым проект будет подключаться к базе
4) Замените значения переменных в .env согласно нужным вам;

DB_USERNAME=
DB_PASSWORD=

5) Дополнительные настройки находят в \config, информацию по ним можно посмотреть на сайте фремворка.


