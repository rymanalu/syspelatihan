# syspelatihan

## Installation

1. Clone or download
2. Go to the project directory
3. Run `php composer.phar install`
4. Create a new file named `.env` in your root project directory by copying the content from `.env.example`
5. Setup your database configuration in `DB_*` section
6. Set the `APP_URL` to `http://localhost:8000`
7. Run `php artisan key:generate`
8. Run `php artisan storage:link`
9. Run `php artisan migrate --seed`
10. Run `php artisan serve`
11. Open `http://localhost:8000`
12. Go to `Login`
13. Type `admin` in `username` field and `1234567890` in `password` field
14. Done
