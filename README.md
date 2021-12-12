<div align="center">
    <h1>Nice Pizza</h1>
    <p>Web application made with Symfony 6</p>
</div>

### Description
Build a web application to manage pizzeria.  
The application consists of:
* Online pizzas order
* Dashboard to render all the placed orders
* Owner Dashboard to add new pizzas, new ingredients ...etc.

### Progress
Implemented the online pizzas order and a homepage.

### Running
Install Docker and Docker Compose.  
    $ docker compose --env-file ".env.local" up -d
    $ docker exec -ti np_app_container /bin/sh
    $ php bin/console doctrine:migrations:migrate
    $ php bin/console doctrine:fixtures:load
    $ yes to purge the database
    $ symfony serve:start --no-tls -d




