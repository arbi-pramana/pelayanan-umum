LARASPELLS BOILERPLATE (ADMIN-BSB)
=====================================

## Guide

#### Install Dependencies

```
composer install
```

#### Setup

Setup common things by typing this command

```
php artisan setup
```

#### Modify Schema

* Open `.dev/laraspells/schema.yml`
* Modify some fields like name, author, controller, view, etc.

#### Add Table to Schema

* Create table schema (`.yml` file) inside `.dev/laraspells/tables`.
* Include it in `schema.yml` by putting `[tablename]: +include:tables/[tablename].yml`.

#### Generate CRUDs

```
php artisan spell:generate .dev/laraspells/schema
```

#### Generate CRUD per Table

```
php artisan spell:generate .dev/laraspells/schema --table=[tablename] --askme --no-public
```

#### Insert New Record via Artisan

```
php artisan model:add [model/class/name]
```

For example:

```
php artisan model:add App/User
```

