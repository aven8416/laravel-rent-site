# Avtorenda

# Уставновка

1. Склонируйте репозиторий
2. Установите node.js
 [node.js уставнока](https://nodejs.org/en/)
3. Установите php для вашей ОС
4. Уставновите composer
    [composer уставновка](https://getcomposer.org/doc/00-intro.md)
5. Уставновите базу данных MySql для вашей OS
    * создайте пользователя с такими данными (при желении их можно поменять в `.env` файле)
      - DB_USERNAME=root
      - DB_PASSWORD=1234
    * создайте базу данных с именем rent
6. Скопируйте и переименуйте `.env.example` в `.env` в корневой папке
7. В корне папки запустить (в терминале)
    ```bash
    $ composer install
    ```
    ```bash
    $ npm install
    ```
   ```bash
    $ php artisan migrate
    ```
    ```bash
    $ php artisan db:seed --class=UserSeeder
    ```
8. Запустить node.js сервер в новом терминале в корне папки
    ```bash
    $ npm run build
    ```
   ```bash
    $ npm run dev
    ```
9. Запустить проект в новом терминале в корне папки

    ```bash
    $ php artisan serve
    ```

10. Перейти на `http://localhost:8000`
11. Чтобы перейти на страницу админа надо залогиниться
    Пользовтель уже должен быть в базе с такими данными
     - email: `admin@gmail.com`
     - password: `admin1234`
12. Перейти на страницу админа `http://localhost:8000/admin`
