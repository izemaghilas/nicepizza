<div align="center">
    <h1>Nice Pizza</h1>
    <p>
        Website made with Symfony 6<br>
        https://nicepizza.herokuapp.com/
    </p>
</div>

## Description
**Nice Pizza** a website to order pizzas, it consists of :
* Landing page
* Place order page

## Install
install docker and docker compose  
https://docs.docker.com/engine/install/  
https://docs.docker.com/compose/install/  
In MacOs or Windows, Docker Desktop includes docker compose.  

## Running
    $ docker compose --env-file ".env.local" up -d
    $ docker exec -ti np_app_container /bin/sh
    $ php bin/console doctrine:migrations:migrate
    $ php bin/console doctrine:fixtures:load
    $ yes to purge the database
    $ symfony serve:start --no-tls -d




