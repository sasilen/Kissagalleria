[![SSL Rating](https://sslbadge.org/?domain=www.kissagalleria.com)](https://www.ssllabs.com/ssltest/analyze.html?d=www.kissagalleria.com)

# Kissagalleria plugin for CakePHP 3

## Installation

You can install this plugin into your CakePHP application using [composer](http://getcomposer.org).

The recommended way to install composer packages is:

```
composer self-update && composer create-project --prefer-dist cakephp/app www
cd www;composer config repositories.kissagalleria git https://github.com/sasilen/kissagalleria.git
composer config minimum-stability dev
composer require sasilen/Kissagalleria:dev-master
```
## Load Modules
```
cake plugin load -r -b CakeDC/Users
cake plugin load -r Kissagalleria
cake plugin load -r Media
cake plugin load -r -b Thumber
cake plugin load -r Kareylo/Comments
cake plugin load Ratings
```

## Configure CakeDC/Users

### Bootstrap /config/bootsrap.php
```
Configure::write('Users.config', ['users']);
Plugin::load('CakeDC/Users', ['routes' => true, 'bootstrap' => true]);
Configure::write('Users.Social.login', true); //to enable social login
Configure::write('Auth.authenticate.Form.fields.username', 'email');
``` 
### Authorization
* permissions.php
* users.php

## Global templates
* paginator-templates.php

## Enable theme from Kissagalleria
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
