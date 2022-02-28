Access Analytics
----------
# Getting started

## Installation

Clone the repository

    git clone git@github.com:hamzaouizied/tracking-module.git
Switch to the repo folder

    cd tracking-module

Install all the dependencies using composer

    composer install

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

Generate a new application key

    php artisan key:generate
    
Run the database migrations (**Set the database connection in .env before migrating**)

    php artisan migrate

Install node_modules
    
    npm install
 
Compile  JavaScript

    npm run watch
  