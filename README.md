Simple Heatmap API Application
==============================

Based on [Laminas API Tools](https://api-tools.getlaminas.org/) skeleton application.

API documentation is exposed via the `/api-tools/documentation`.

Requirements
------------

Please see the [composer.json](composer.json) file.

Installation
------------

### Via Git (clone)

First, clone the repository:

```bash
# git clone https://github.com/mihsar/test-php-heatmap-laminas.git # optionally, specify the directory in which to clone
$ cd path/to/install
```

At this point, you need to use [Composer](https://getcomposer.org/) to install dependencies. Assuming you already have
Composer:

```bash
$ composer install
```

### Setting development mode

Once you have the basic installation, you need to put it in development mode:

```bash
$ cd path/to/install
$ composer development-enable
```

Next you can use the built-in web server in PHP (only for development) as
described [here](https://github.com/laminas-api-tools/api-tools-skeleton#all-methods)

### Vagrant

Check the original info [here](https://github.com/laminas-api-tools/api-tools-skeleton#vagrant)

### Docker

If you develop or deploy using Docker, we provide configuration for you.

Prepare your development environment using [docker compose](https://docs.docker.com/compose/install/):

```bash
$ git clone https://github.com/mihsar/test-php-heatmap-laminas
$ cd test-php-heatmap-laminas
$ docker-compose build
# Install dependencies via composer, if you haven't already:
$ docker-compose run apigility composer install
# Copy separate local db connection details: username and password
$ docker-compose run apigility cp ./config/autoload/db.local.php.dist ./config/autoload/db.local.php
# Enable development mode:
$ docker-compose run apigility composer development-enable
```

Start the container:

```bash
$ docker-compose up
```

Access application from `http://localhost:8080/` or `http://<boot2docker ip>:8080/` if on Windows or Mac.

You may also use the provided `Dockerfile` directly if desired. And set up db connection details
in [db.global.php](config/autoload/db.global.php) and set username and password in `db.local.php`.

Or to manipulate development mode:

```bash
$ docker-compose run apigility composer development-enable
$ docker-compose run apigility composer development-disable
$ docker-compose run apigility composer development-status
```

A database service is provided inside docker-compose config, and it should import sql files provided with repo
in `./data/mysql-dump/`. Port 33060 is mapped to access from host as `localhost:33060` using
`username/password` details provided in docker-composer config.

QA Tools
--------

The app ships with a few basic tests for the endpoints exposed in documentation.

```bash
# Run PHPUnit tests:
$ composer test     
# You can execute in container as well (make sure `docker-compose up` has run, it needs db connection): 
$ docker-compose exec apigility composer test 
```
