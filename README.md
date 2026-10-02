# Job Application Tracker

A full-stack web application built with **Laravel and MySQL** to help users organize and track their job applications, companies, interviews, and notes in one place.

## 🚀 Technologies

* **Backend:** PHP, Laravel
* **Frontend:** Blade, HTML, CSS, JavaScript
* **Database:** MySQL
* **ORM:** Laravel Eloquent
* **Authentication:** Laravel Breeze
* **Architecture:** MVC
* **API:** RESTful API 

## ✨ Features

* User authentication and authorization
* Role-based access control
* Manage companies
* Create, update, view, and delete job applications
* Track application status
* Manage interviews
* Add and manage notes
* Relational database management
* Form validation
* Protected routes and middleware
* CRUD operations
* Eloquent relationships
* RESTful API concepts

## 🗄️ Database Relationships

The application uses relational database design with relationships between:

* User → Companies
* User → Applications
* Company → Applications
* Application → Interviews
* Application → Notes

Cascade delete relationships are implemented where appropriate to maintain database consistency.

## 🏗️ Laravel Concepts Applied

This project demonstrates practical use of:

* MVC architecture
* Routing and resource controllers
* Eloquent ORM
* Database migrations
* Model relationships
* Middleware
* Authentication
* Authorization and roles
* Request validation
* CRUD operations
* Blade templates
* RESTful API concepts
* Debugging and error handling

## 🎯 Project Purpose

The project was developed as a practical application to strengthen my skills in **backend development, databases, Laravel, PHP, and software engineering**.

It demonstrates my ability to design a relational database, build backend functionality, connect frontend views with application logic, implement authentication and authorization, and troubleshoot application issues.

## 💻 Installation

Clone the repository:

```bash
git clone https://github.com/RulaHamatto/Job_Application_Tracker.git
```

Navigate to the project:

```bash
cd Job_Application_Tracker
```

Install PHP dependencies:

```bash
composer install
```

Install frontend dependencies:

```bash
npm install
```

Create the environment file:

```bash
cp .env.example .env
```

Generate the application key:

```bash
php artisan key:generate
```

Configure the database in `.env`, then run:

```bash
php artisan migrate
```

Start the Laravel development server:

```bash
php artisan serve
```

In another terminal, run:

```bash
npm run dev
```

## 👩‍💻 Developer

**Rula Mohammed Hamatto**

Artificial Intelligence & Robotics
Amman, Jordan

* GitHub: https://github.com/RulaHamatto
* LinkedIn: https://www.linkedin.com/in/eng-rula-hamatto-622a30264
