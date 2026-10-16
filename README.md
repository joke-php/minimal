# Joke: Минимальный скелетон 

> Минимальный стартовый шаблон для проектов на основе [Joke микрофреймворк](https://github.com/Voral/joke).

Этот скелетон предоставляет готовую структуру приложения с базовой маршрутизацией, контроллером и встроенным веб-сервером PHP — хорошо подходит для обучения или быстрого старта.

## Быстрый старт

Создайте новый проект одной командой:

```bash
composer create-project voral/joke-minimal my-app
cd my-app
```
После создания проекта выполните `composer update`, чтобы получить последние версии зависимостей.

Запустите встроенный сервер разработки:

```bash
composer run dev
```

Откройте в браузере: [http://localhost:8000](http://localhost:8000)

Вы увидите:
> **Hello from Joke Framework!**

### Запуск с помощью Docker (без установки PHP или Composer)

Если у вас установлен [Docker](https://www.docker.com/), вы можете запустить приложение без глобальной установки PHP или Composer:

```bash
git clone https://github.com/Voral/joke-minimal my-app
cd my-app
docker compose up -d
```

Приложение будет доступно по адресу:  
[http://localhost:8000](http://localhost:8000)

> При первом запуске контейнер автоматически установит зависимости через Composer.  
> Все изменения в коде применяются мгновенно благодаря volume-монтированию.

Остановить сервер:
```bash
docker compose down
```

## Структура проекта

```
my-app/
├── app/                # Код приложения (контроллеры, сервисы)
│   └── Controllers/
├── bootstrap/          # Инициализация фреймворка
│   └── app.php
├── public/             # Публичная точка входа
│   ├── index.php
│   └── .htaccess
├── routes/             # Определение маршрутов
│   └── web.php
└── composer.json
```

## Как добавить свой маршрут

1. **Создайте контроллер** в `app/Controllers/`, например:
   ```php
   // app/Controllers/AboutController.php
   namespace App\Controllers;
   
   class AboutController
   {
       public function __invoke(): string
       {
           return 'About page';
       }
   }
   ```

2. **Зарегистрируйте маршрут** в `routes/web.php`:
   ```php
   use App\Controllers\AboutController;
   
   $router->get('/about', AboutController::class);
   ```

3. Готово! Откройте [http://localhost:8000/about](http://localhost:8000/about)

> Контроллеры необходимо реализовывать согласно [документации](https://github.com/Voral/joke/tree/master/docs)

## Поддержка ЧПУ

Скелетон включает `.htaccess` для Apache, который:
- Перенаправляет все запросы в `index.php`,
- Сохраняет заголовки `Authorization` и `X-XSRF-TOKEN`,
- Убирает завершающий слеш из URL.

Работает корректно на хостингах с включённым `mod_rewrite`.

## Документация

Более подробно о возможностях фреймворка — см. [официальный репозиторий Joke](https://github.com/Voral/joke).
