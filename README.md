# Мой проект на Laravel

## Установка

1. **Клонирование репозитория:**

   ```bash
   git clone https://github.com/Seraf-seraf/lib-laravel.git
   cd lib-laravel
   ```
   
2. **Установка зависимостей PHP (Composer):**
    
    ```bash
    composer install
    ```

2. **Установка зависимостей JavaScript (npm):**

    ```bash
   npm install
   ```
   
## Настройка базы данных

1. **Настройка .env файла:**

Скопируйте .env.example в .env и настройте ваше подключение к базе данных.

2. **Выполнение миграций:**

    ```bash
    php artisan migrate
    ```
   
## Запуск приложения

1. **Сборка фронтенда (для разработки):**

    ```bash
    npm run build
    ```

2. **Запуск локального сервера:**

    ```bash
    php artisan serve
    ```
   или
    ```bash
    npm run dev
    ```
