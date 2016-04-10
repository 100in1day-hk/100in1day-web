100in1Day project
==================

This repository hosts the source of  100in1day.hk website.
This site is developed using Sliex PHP micro-framework (http://silex.sensiolabs.org/).

Directory Tree
```
src
├── resources
│   ├── css
│   ├── img
│   ├── js
│   ├── other
│   └── views
├── src
├── vendor
└── web
    ├── controllers
        └── views
```


- resources - the static files such as javascript and css files are placed here.

- src - the configuration files are placed here.

- vendor - composer downloaded files are placed here

-  web/contorllers - php sliex contorllers files are placed here

- web/views - twig template engine files are placed here.
        
special files:

- src/app.php - configuration files such as database

Prepare your development environment
=====================================


pre-requisite
-------------
Make sure you have the following software installed in your computer

- composer (https://getcomposer.org/)
- php 5.5
- mysql 5.5
- apache 2.4

```
cd __YOUR_HOST_PATH__
git clone https://github.com/100in1day-hk/100in1day-web .
composer install
```

In your apache configuration, (either using .htaccess or virtual host), you need to set the following:
```
<IfModule mod_rewrite.c>
Options -MultiViews

RewriteEngine On
#RewriteBase /path/to/app
RewriteCond %{REQUEST_FILENAME} !-f
RewriteRule ^ index.php [QSA,L]
</IfModule>
```



Contribution
===================
1. fork repository 
2. clone the repository
3. Make change and Commit changes
4. Push to your forked repo
5. Send pull requests

