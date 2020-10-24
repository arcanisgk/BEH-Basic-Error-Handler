# [BEH] Basic Error Handler (SA) for PHP

[![GitHub license](https://img.shields.io/github/license/arcanisgk/BEH-Basic-Error-Handler)](https://github.com/arcanisgk/BEH-Basic-Error-Handler/blob/main/LICENSE)
[![State](https://img.shields.io/static/v1?label=release&message=1.0.0&color=blue 'Latest known version')](https://github.com/arcanisgk/Last-Hammer/tree/v0.1.3-alpha) <!-- __SEMANTIC_VERSION_LINE__ -->
[![GitHub issues](https://img.shields.io/github/issues/arcanisgk/BEH-Basic-Error-Handler)](https://github.com/arcanisgk/BEH-Basic-Error-Handler/issues)
[![Minimum PHP version](https://img.shields.io/static/v1?label=PHP&message=7.4.0+or+higher&color=blue "Minimum PHP version")](https://www.php.net/releases/7_4_0.php)

Acronym: [BEH].

Name: Basic Htaccess Error Handler.

Dependencies: Stand Alone / PHP v7.4.

## What does *[BEH]* do?

*[BEH]* is a very simple PHP [error handler] implementation that throws
[ErrorException] exceptions instead of using the default PHP error handling
behaviour. This means that all runtime errors including Fatal are presented to the
developer in the form of an exception. It also means that any unhandled errors
are delivered to a single point: the global exception handler.
also includes support for login errors with [error document]

[error document]: https://httpd.apache.org/docs/2.4/es/custom-error.html
[error handler]: http://php.net/set_error_handler
[errorexception]: http://php.net/ErrorException

## Why use *[BEH]*?

Developers need the ability to decide how their code behaves when an error
occurs. Exceptions offer the only truly consistent way to report and recover
from errors in PHP.

This method of handling errors has proven to be extremely effective. Similar
strategies are used in major PHP frameworks such as [Laravel]. *[BEH]* is a
standalone implementation that can be used for any project, and not required third party library or software.

## *[BEH]* Configuration:
- .htaccess: for Apache Version > 2.4.
- .user.ini: for CGI/FPM/FastCGI.
- error_conf.php: common configuration. 

Note: not tested in NGINX

## Custom *[BEH]* for PHP And Server Error

It must be configured manually in: `.htaccess`, `.user.ini` and `conf.json` depending on the scenario or desired host configuration; let's leave some examples:

1. Single host server.
2. Virtual Host and name of the github project.
3. Development with Xampp in Locally

### .htaccess

```apacheconfig
# php_value auto_prepend_file "/var/www/html/error/init_error.php"
# php_value auto_prepend_file "/var/www/virtual-hostc/git-hub-project-name/error/init_error.php"
php_value auto_prepend_file "C:/xampp/htdocs/error/error_init.php"
```

Note: because of dependencies you must set the configuration inside `<IfModule mod_php7.c>` to work correctly; `.htaccess` file have an example

### .user.ini

```ini
# auto_prepend_file = "/var/www/html/error/init_error.php"
# auto_prepend_file = "/var/www/virtual-host/git-hub-project-name/error/init_error.php"
auto_prepend_file = "C:/xampp/htdocs/error/error_init.php"
```

note: `.user.ini` files not use `php_value` statement.

### Error Server must be setting up with directive in `.htaccess` file:

```apacheconfig
ErrorDocument 400 /error/error_server.php
```

### Error_conf.php 
skin of *[BEH]* must be: basic, bs4, custom.

### Custom skin *[BEH]*
you must implement two files skin like.
- sk_custom_server_error.php
- sk_custom_handler_error.php
    
### Content of skin for *[BEH]* 
you must add the same variable print like basic skin, but you can use your own html design.

### Contributors
- (c) 2020 Walter Francisco Núñez Cruz icarosnet@gmail.com [![Donate](https://img.shields.io/static/v1?label=Donate&message=PayPal.me/wnunez86&color=brightgreen)](https://www.paypal.me/wnunez86/4.99USD)
