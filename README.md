# quotes-backend

This is a REST API created in PHP + [Lumen](https://github.com/laravel/lumen). This API is used to register, get, delete and update information about medical appointments. This is something basic and this project was created for learning purposes, as there are many things that can be improved, such as using a standard like [JWT](https://jwt.io/introduction) to manage tokens.

## Installation

Simply clone the repository with the following command:
```git
git clone https://github.com/MrDave1999/quotes-backend.git
```

Then, install the necessary dependencies with [composer](https://getcomposer.org/download/) (you need to redirect to the project's working directory):
```composer
composer install
```
You can also install the test database [here](https://gist.github.com/MrDave1999/47b5523d35848fd8b29b4315f47bf8f0/archive/0c84e321573c88ffd1d0bef80d39a2063146fb1a.zip) (is with MySQL).

You can import the test database with the following command (obviously, you must first create the database):
```sql
mysql -u username -p dbname < dbquotes.sql
```
In the command you need to specify the username and database name.

## Consuming API

You can consume the API with any client such as [Postman](https://www.postman.com/), however, you will need to authenticate first in order to consume it.

In each HTTP request you will need to add an additional header:
```
Authorization <token>
```
Of course, you must generate the `token` with the following endpoint:
```
POST - /api/v1/login
```
The credentials must be specified in the body of the request, for example:
```json
{
    "username": "admin",
    "password": "1234"
}
```
You can check the [wiki](https://github.com/MrDave1999/quotes-backend/wiki/API-Endpoints) to see the endpoints to consume the API.

**Curiosity:** I know that the name `quote` does not mean medical appointments but I put it because the name was shorter :D XD
