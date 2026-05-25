```markdown
# Laravel To-Do Application

This is my solution for the to-do app interview challenge

## Features
* Implemented secure user authentication (Registration, Login, Password Reset) using breeze.
* Task management system (adding tasks to specific projects, also mark tasks as completed).
* Authorization checks to ensure users can only access and modify their own projects and tasks.
* Relational database structure with Eloquent .

## Prerequisites
To run this project locally, you will need:
* PHP 8.2 or higher
* Composer
* Node.js & NPM
* SQLite (Default database)

## Installation & Setup Instructions



1. **Install PHP dependencies:**
```bash
composer install

```


2. **Install and compile frontend dependencies:**
```bash
npm install
npm run build

```


3. **Environment Setup:**
Copy the example `.env` file to create your own environment configuration.
```bash
cp .env.example .env

```


*Note: The application is configured to use SQLite by default. You do not need to set up a MySQL database.*
4. **Generate Application Key:**
```bash
php artisan key:generate

```


5. **Run Database Migrations:**
This will create the SQLite database file and build the necessary tables.
```bash
php artisan migrate

```


6. **Start the local development server:**
```bash
php artisan serve

```



You can now access the application at `http://localhost:8000`. Use the "Register" button in the top right corner to create a new user account and start managing your projects!

```