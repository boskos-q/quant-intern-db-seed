# Quantox Interns generate DB for project

This app is built to seed db with 1M+ of records for the project of "imgur clone"

Stack used:

```
MySQL 5.7
PHP 7.4
RabbitMQ
supervisor
```

```
composer install
php bin/console quantox:db:messenger
```

You can run command multiple times if you want more than 1M records