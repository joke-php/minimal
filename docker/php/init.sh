#!/bin/bash
set -e

echo "Проверяю наличие зависимостей..."

# Если нет vendor/autoload.php — устанавливаем зависимости
if [ ! -f "vendor/autoload.php" ]; then
    echo "Устанавливаю зависимости через Composer..."
    composer install --no-dev --no-progress --no-interaction --optimize-autoloader
fi

echo "Запускаю встроенный PHP-сервер на порту 8000 (document root: public/)..."
exec php -S 0.0.0.0:8000 -t public
