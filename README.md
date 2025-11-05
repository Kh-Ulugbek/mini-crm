# 🎟️ Ticket System (Laravel 12 + Livewire + Docker)

## 🚀 Run with Docker

```bash
git clone <repo-url>
cd project-folder
cp .env.example .env
docker-compose up -d --build
docker exec -it laravel_app bash
composer install
php artisan key:generate
php artisan migrate --seed
