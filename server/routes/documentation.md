# start server

```docker compose up```

## API endpoints

```<url-server-host>/api/player?name=mario&....```

## generate model class and seed with factory datas

php artisan make:model player
php artisan make:factory PlayerFactory
php artisan migrate:refresh --seed

