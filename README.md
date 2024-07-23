# Template for local dev with PHP and MySQL

This template use Docker to create a local environment for developping PHP applications with MySQL database without require PHP and MySQL installation.

## Installation
No installations needed. The only requirement is to have Docker or Docker desktop installed.

## What does it contain?

The package contains 3 images to run in Docker : 

* A database server using MySQL, exposing port 4306
* A PHPMyAdmin server running on port 8899
* A Apache server exposing port 8081, which serve public directory.

## Setup

copy and past .env.dist and rename it .env.

Then setup the credentials for database access.

For php, the hostname  used for database is db. Username and password are defined in .env file.

Traditionally, public folder is used to serve files that are accessible to public (as frontal controller, css, js, assets and so).

So, put your code in the app directory, the server will automatically redirect requests to index.php that is in this folder.

Put the rest of your php code in **src** folder.

The mysql folder will contains your database files, so you can stop and restart containers without loosing datas.

If you want to use BD migrations, you can insert SQL code building your DB in database.sql. Then in the apache container run the following code : ```php migration.php```. This will build your database.

## Run code

To run system, simply run `docker compose up` in your project directory (this directory).

This will run the containers and you should access to your site trough http://locahost:8081 url.

Then edit your code in app directory as you want, it will automatically be rendered with server.

The server container has composer installed, so you can either use composer in your system or inside the server.

To do this in you server, you have to run a `docker exec` command on the server container and run composer in the container. This will install vendor folder in your project folder, so no need to re run it at every container start.

## Others

I let the php.ini files in the folders, so you can easily modify them, and by modifying Dockerfile, copy them as `php.ini` file in the server. The destination is stored in /usr/local/etc/php.ini

To obtain dabase credentials, you can use the GetEnvVars class which provide you username, password, db name and host for the mySQL server connection.