# Kissagalleria plugin for CakePHP 3

## Installation

You can install this plugin into your CakePHP application using [composer](http://getcomposer.org).

The recommended way to install composer packages is:

```
composer self-update && composer create-project --prefer-dist cakephp/app www
composer config repositories.kissagalleria git https://github.com/sasilen/kissagalleria.git
composer require sasilen/Kissagalleria
```

## Configure CakeDC/Users
* permissions.php
* users.php

## Global templates
* paginator-templates.php

## Load Modules
* bootstrap.php

## Enable theme from Ḱissagalleria
```
# /src/Controller/AppController.php

public function initialize()
    {
    parent::initialize();
    $this->loadComponent('CakeDC/Users.UsersAuth');
.
.
 public function beforeRender(Event $event)
    {
    $this->viewBuilder()->theme('Kissagalleria');
```
