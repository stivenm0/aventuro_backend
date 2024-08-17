# Aventuro API

The Aventuro API provides functionalities for users to explore travel packages, make reservations, and manage their accounts. It supports user registration, authentication with JWT, and offers various features to facilitate a seamless travel booking experience.

## Frontend:
### [Frontend Repository](https://github.com/stivenm0/aventuro_frontend.git)

Video: [Watch Video](https://youtu.be/gSUW1SWNJuk?si=VmcKAuGltvgrbWJW)

## Content

* [Screenshots](#screenshots)
* [Requirements](#requirements)
* [Installation](#installation)
* [Technologies](#technologies)

## Screenshots
### Documentation
![Documentation](https://raw.githubusercontent.com/stivenm0/aventuro_backend/main/public/docs/doc-api.png)

### Admin Panels
![Dashboard](https://raw.githubusercontent.com/stivenm0/aventuro_backend/main/public/docs/dashboard.png)

![Admins](https://raw.githubusercontent.com/stivenm0/aventuro_backend/main/public/docs/admins.png)

![Packages](https://raw.githubusercontent.com/stivenm0/aventuro_backend/main/public/docs/packages.png)

![Bookigns](https://raw.githubusercontent.com/stivenm0/aventuro_backend/main/public/docs/bookings.png)

## Requirements

Package | Version
--- | ---
[Composer](https://getcomposer.org/)  | V2.4.1
[PHP](https://www.php.net/)  | V8.3.6
[MySQL](https://www.mysql.com/)  | V8.0.30

## Installation
Here is how you can run the project locally:

1. Clone the repository
    ```sh
    git clone https://github.com/stivenm0/aventuro_backend.git
    ```

2. Navigate to the project's root directory
    ```sh
    cd aventuro_backend
    ```

3. Copy the `.env.example` file to `.env`
    ```sh
    cp .env.example .env
    ```

4. Create a database named `aventuro`

5. Create a symbolic link
    ```sh
    php artisan storage:link
    ```

6. Install PHP dependencies
    ```sh
    composer install
    ```

7. Generate the application key
    ```sh
    php artisan key:generate
    ```

8. Generate the jwt key
    ```sh
    php artisan jwt:secret
    ```

9. Run migrations
    ```sh
    php artisan migrate
    ```

10. Run seeders
    ```sh
    php artisan db:seed
    ```

## Technologies

* Laravel 11
* MoonShine 2 
* MySQL
* JWT

## Database
![Database](https://raw.githubusercontent.com/stivenm0/aventuro_backend/main/public/docs/aventuroDB.jpg)
