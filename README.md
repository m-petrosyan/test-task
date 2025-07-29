# Тестовое задание: Административная панель и API на Laravel

## Описание

Проект представляет собой административную панель, разработанную с использованием FilamentPHP на фреймворке Laravel, с
поддержкой авторизации, управления сущностями (CRUD), уровнями доступа (полный, CRU, read-only) и REST API для
фронтенда. Включает простой фронтенд с пагинацией данных и опциональной картой. Проект упакован в Docker-образ и
развертывается через Docker Compose.

---

## Технологический стек

- Язык: PHP 8.2+ (Laravel 10)
- Админ-панель: FilamentPHP
- База данных: MySQL 8.0
- Контейнеризация: Docker, Docker Compose
- Фронтенд: Blade (опционально Leaflet для карты)
- API: Laravel REST API
- Тестовые данные: Laravel Seeder

---

## Сущности и связи

### Сущности

1. **Users**: Пользователи фронтенда (не администраторы).
    - Поля: `id`, `name`, `email`, `created_at`, `updated_at`.
2. **Activities**: Список активностей.
    - Поля: `id`, `title`, `description`, `activity_type_id`, `partner_id` (nullable), `created_at`, `updated_at`.
3. **Participants**: Участники активностей.
    - Поля: `id`, `user_id`, `activity_id`, `created_at`, `updated_at`.
4. **ActivityTypes**: Типы активностей.
    - Поля: `id`, `name`, `created_at`, `updated_at`.
5. **Partners**: Партнеры, связанные с активностями (опционально).
    - Поля: `id`, `name`, `created_at`, `updated_at`.

### Связи

- Users ↔ Participants: Many-to-Many через таблицу `Participants`.
- Activities → ActivityTypes: One-to-Many.
- Activities → Partners: One-to-Many (опционально).

---

## Требования

- Docker и Docker Compose
- PHP 8.2+
- Composer
- MySQL 8.0
- Node.js (для фронтенда, если используется JavaScript)

### Админ-панель

- URL: `/admin` (например, `http://localhost:8000/admin`)
- Авторизация: Используйте учетные данные администратора (создаются через seeder или вручную).
- Функции:
    - Управление администраторами с уровнями доступа (CRUD, CRU, read-only).
    - Управление пользователями фронтенда.

---

## Insallation

```
.env.example -> .env
composer install
npm install
php artisan key:generate
php artisan migrate
php artisan db:seed
php artisan storage:link
VITE_GOOGLE_MAPS_API_KEY= // add your Google Maps API key
npm run dev
php artisan serve
```

### for docker

``` 
docker-compose up --build // first time only
docker-compose up
```

### Routes

```
filament panel /admin
database info /db
```

### Login

> email: admin@gmail.com ,
> password: 12345678
