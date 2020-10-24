# [BEH] Basic Error Handler (SA)

Acronym: [BEH].

Name: Basic Htaccess Error Handler.

Dependencies: Stand Alone / PHP v7.4.

Configuration:
- .htaccess: for Apache Version > 2.4.
- .user.ini: for CGI/FPM/FastCGI.
- error_conf.php: common configuration. 

Note: not tested in NGINX

# Custom Error Handling for PHP And Server Error

It must be configured manually in: `.htaccess`, `.user.ini` and `conf.json` depending on the scenario or desired host configuration; let's leave some examples:

1. Single host server.
2. Virtual Host and name of the github project.
3. Development with Xampp in Locally

- .htaccess

```apacheconfig
# php_value auto_prepend_file "/var/www/html/error/init_error.php"
# php_value auto_prepend_file "/var/www/virtual-hostc/git-hub-project-name/error/init_error.php"
php_value auto_prepend_file "C:/xampp/htdocs/error/error_init.php"
```

Note: because of dependencies you must set the configuration inside `<IfModule mod_php7.c>` to work correctly; `.htaccess` file have an example

- .user.ini

```ini
# auto_prepend_file "/var/www/html/error/init_error.php"
# auto_prepend_file "/var/www/virtual-host/git-hub-project-name/error/init_error.php"
auto_prepend_file "C:/xampp/htdocs/error/error_init.php"
```

note: `.user.ini` files not use `php_value` statement.

- Error Server must be setting up with directive in `.htaccess` file:

```apacheconfig
ErrorDocument 400 /error/error_server.php
```

- error_conf.php:

skin must be: basic, bs4, custom.

- custom skin: you must implement two files skin like.
    - sk_custom_server_error.php
    - sk_custom_handler_error.php
- content of skin you must add the same variable print like basic skin, but you can use your own html design.

