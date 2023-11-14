# inline-test-task

Версия PHP: 8.1.9 <br>
Версия Laravel: 10.31.0

inline-test-task - это веб-приложение, разработанное с использованием Laravel, которое позволяет управлять записями постов и комментариев к ним. Оно предоставляет команду для скачивания данных в формате JSON, загрузки в БД, а также поиск постов по тексту их комментариев.

## Установка

1. Клонируйте репозиторий: git clone https://github.com/Ceebot/inline-test-task.git

2. Перейдите в директорию проекта: cd inline-test-task

3. Установите зависимости проекта с помощью Composer: composer install

4. Установите значения для переменных среды, создав файл .env (скопировать файл [.env.example](.env.example)) и добавив необходимую информацию.

5. Генерируйте ключ приложения: php artisan key:generate

6. Запустите миграции базы данных: php artisan migrate --seed

7. Выполните загрузку и установку данных о постах и комментариях: php artisan app:records

8. Запустите локальный сервер разработки: php artisan serve

Когда сервер запущен, вы можете получить доступ к приложению, посетив http://localhost:8000 в вашем веб-браузере.

## Навигация

- Создание схемы БД происходит через миграции laravel - database/[migrations](database%2Fmigrations).
- Скрипт, скачивающий данные и загружающий их в бд - app/Console/Commands/[DownloadRecords.php](app%2FConsole%2FCommands%2FDownloadRecords.php).
- Основной маршрут на главной странице - routes/[web.php](routes%2Fweb.php).
- Контроллер, на который ведет маршрут - app/Http/Controllers/[PostController.php](app%2FHttp%2FControllers%2FPostController.php).
- Шаблон главной страницы - resources/views/[index.blade.php](resources%2Fviews%2Findex.blade.php).
