# checklister

Laravel Checklister

##System Requirements

1. PHP (Version 8+)
2. Composer 2
3. Git
4. Mysql (Version 5.7+)
5. 1 GB Ram(at least)
6. Apache Webserver(Version 2.4)

## Framework Used

1. Laravel for PHP
2. BootStrap for the UI

## Project Setup

1. Git clone the repository
2. Run composer install to load PHP dependencies to root of project folder

```shell
composer install
```

3. Create a .env file to the root of the project folder if not created by copying the .env.example file
4. Setup the configuration of app environment as local, database connection and other settings in .env file
5. Setup virtual host and point the document location to public folder
6. Turn on mod_rewrite engine for apache

##Folder Structure

```
.
+-- app
+-- bootstrap
+-- config
+-- database
+-- public
|	+-- css
|	+-- js
|	+-- fonts
|	+-- images
|	+-- upload
+-- vendor
```

Tested
