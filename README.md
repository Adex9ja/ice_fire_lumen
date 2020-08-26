# API Service in Lumen


This is an API written in Lumen. It performs basic CRUD operation and as well make API call to an external API service  [ Ice And Fire API](https://anapioficeandfire.com/Documentation#books). using GuzzleHttp for API calls 

### Configure the environment

To get started,
* Create .env file from .env.example
* Create the database configured in .env 

Then, run the following commands

* composer install
* php artisan migrate

### Running the application.

To start the server and get the API running, run the command below

*  php artisan serve



### Running Test

Run the command below in terminal to run unit test

 *  .\vendor\bin\phpunit

