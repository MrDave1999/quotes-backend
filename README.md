# quotes-backend

This is a REST API created in PHP + [Lumen](https://github.com/laravel/lumen). This API is used to register, get, delete and update information about medical appointments. This is something basic and this project was created for learning purposes, as there are many things that can be improved, such as using a standard like [JWT](https://jwt.io/introduction) to manage tokens.

## Installation

### On Linux:

**1.** Clone the repository:
```git
git clone https://github.com/MrDave1999/quotes-backend.git
```

**2.** Change directory:
```
cd quotes-backend
```

**3.** Change user and group to the storage and bootstrap directories so that the web server can write to those directories:
```
sudo chown -R www-data:www-data ./storage ./bootstrap
```

**4.** Add your user to the `www-data` group and set write permissions to the group:
```
sudo usermod -aG www-data $USER
sudo chmod -R g+w ./bootstrap
```

**5.** Copy the contents of `.env.example` to `.env`:
```
cp .env.example .env
```

**6.**  Install the project dependencies:
```
docker run --rm -it -v $PWD:/app composer install
```

**7.** Build the image and initiate services:
```
docker-compose up --build -d
```

**8.** Access the application with this URL:
```
http://localhost:8080/
```

### On Windows:

**1.** Clone the repository:
```git
git clone https://github.com/MrDave1999/quotes-backend.git
```

**2.** Change directory:
```
cd quotes-backend
```

**3.** Copy the contents of `.env.example` to `.env`:
```
xcopy .env.example .env
```

**4.**  Install the project dependencies:
```
docker run --rm -it -v %cd%:/app composer install
```

**5.** Build the image and initiate services:
```
docker-compose up --build -d
```

**6.** Access the application with this URL:
```
http://localhost:8080/
```

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
