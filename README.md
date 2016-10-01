# Advaith-Laravel

This work is done using [Laravel](https://laravel.com/) framework.
<br>Please [Install Laravel](https://laravel.com/docs/4.2) using [Composer](https://getcomposer.org/)
<br>Please install [xampp](https://www.apachefriends.org/download.html) for `php` and run `appache` and `mysql`

####For viewing this html please follow the following instructions: 
###For windows:
- Clone this Repo.
- Make sure you have php and composer installed in your system.
- cd to the main folder of the repo.
- Then type `composer install` It will install the neccassary files/folders to it.
- Then `rename .env.example .env` to rename the .env.example file to .env.
- Then `php artisan key:generate`
- Then `php artisan migrate`
- And finally run `php artisan serve` to open it in [localhost:8000](http://localhost:8000/)

###For Linux:
- Clone this Repo.
- Make sure you have php and composer installed in your system.
- cd to the main folder of the repo.
- Type `composer install`.
- Type `chmod -R 777 bootstrap/cache`.
- Type `cp .env.example .env`.
- Type `php artisan key:generate`.
- Start mysql `service mysql start`.
- Type `php artisan migrate`.
- To see the webpage type `php artisan serve`.
- Goto `localhost:8000`.

##If have an error of database:
- open [phpmyadmin](http://localhost/phpmyadmin/) and create a new database with any name.
- open `.env` file change database name to the newly created database, change username to root and leave the password field empty instead of secret.

Hope you enjoyed.........<br>
For suggestions and feedback please contact **advaitharunjeena@gmail.com**
