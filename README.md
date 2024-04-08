# team009-app_fit3047

## Import sql schema into phpmyadmin
Import ```fit3047_team009.sql``` into phpmyadmin

## Setup cakephp project
Run composer install in terminal
```
composer install
```

## Connect cakephp to database
Open ```config/app_local.php``` in text editor/phpstorm

Username and password should match phpmyadmin user

Database should be ```fit3047_team009```

## Bake all tables
Run cake bake for all tables in terminal
```
bin/cake bake all customers
bin/cake bake all menuitems
bin/cake bake all orders
bin/cake bake all orders_menuitems
```