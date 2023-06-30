composer install --ignore-platform-reqs
php artisan migrate --force
php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan storage:link
