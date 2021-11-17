php artisan migrate:refresh --force
php artisan passport:install
php artisan db:seed --class="RolePermissionSeeder"
php artisan db:seed --class="SuperAdminSeeder"
php artisan db:seed --class="CountrySeeder"
php artisan db:seed --class="CategorySeeder"

