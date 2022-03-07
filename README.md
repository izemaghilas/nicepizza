<div align="center">
    <h1>nicepizza</h1>
    <p>
        web application made with Symfony 6<br>
        https://nicepizza.herokuapp.com/
    </p>
</div>

## Description
**nicepizza** consists of :
* Home page
* Place order page
* Simulator of placed order tracker

## Install
install docker and docker compose  
https://docs.docker.com/engine/install/  
https://docs.docker.com/compose/install/  
In MacOs or Windows, Docker Desktop includes docker compose.  

## Config
Add **.env.local** file and set:
```
APP_ENV= # dev in local
APP_SECRET= # the app secret

# database
DB_USER=
DB_PASSWORD=
DB_NAME=
DATABASE_URL=

# for AJAX request
WEBSITE_URL= # the url used on local, useful on deployment
```

## Running
    $ docker compose --env-file ".env.local" up -d
    $ docker exec -ti np_app_container /bin/sh
    $ echo yes |php bin/console doctrine:migrations:migrate
    $ echo yes |php bin/console doctrine:fixtures:load
    $ symfony serve:start --no-tls -d




