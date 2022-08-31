# start server

```console
docker compose up
```

[fresh install] in the case of a clean instance, you may need to add vendor dependecies:
```console
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v $(pwd):/var/www/html \
    -w /var/www/html \
    laravelsail/php81-composer:latest \
    composer install --ignore-platform-reqs
```

check .env file exists with all credential (you can copy and rename .env.example if missing)

Sail binary as wrapper as it introduces several required env vars for the build. Useful if you've purged your built image, or your built image laravel.test was corrupted (unlikely) and docker-compose do not rebuild without telling it to do so,
```
./vendor/bin/sail build
```
.

---
## General API endpoints

```<url-server-host>/api/player?name=mario&....```

.

---
## generate model class and seed with factory datas

```php artisan make:model Player```

```php artisan make:controller ListingController```

```php artisan make:factory PlayerFactory```

```php artisan make:migration create_players_table```

```php artisan migrate:refresh --seed```


