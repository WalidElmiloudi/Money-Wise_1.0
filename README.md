Money-Wise

A simple personal finance / expense tracker web application built with PHP (OOP), Composer autoloading, JavaScript, and Tailwind CSS — helping you manage incomes and expenses and track your financial health.

📋 Table of Contents

About

Features

Getting Started

Prerequisites

Installation

Usage

About

Money-Wise is a lightweight finance management tool designed for individuals who want a simple, self-hosted solution to track incomes and expenses.

It’s now refactored using Object-Oriented Programming (OOP), with:

Namespaced classes for controllers, models, and helpers

Singleton Database class for shared PDO connection

Composer PSR-4 autoloading for clean and modular code

The goal is to keep things minimal yet functional, making it easy to understand, customize, and run on any standard PHP-capable environment.

Features

Add, edit, and delete income entries

Add, edit, and delete expense entries

View income, expense, and balance summaries

OOP architecture for maintainable and reusable code

Shared database connection via singleton pattern

Composer autoloading for classes (no manual require needed)

Simple, clean, and responsive UI with Tailwind CSS

Getting Started
Prerequisites

A web server capable of running PHP (e.g., Apache, Nginx)

PHP 7.4+ recommended

MySQL (or compatible) database server

Composer installed (for autoloading classes)

Browser for accessing the web interface

Installation

Clone the repository

git clone https://github.com/WalidElmiloudi/Money-Wise.git
cd Money-Wise


Install dependencies via Composer

composer install


Import the database schema

mysql -u YOUR_DB_USER -p YOUR_DB_NAME < db.sql


Configure database credentials

Edit config.php (or controllers/Database.php if using singleton DB) and set:

// Database host, name, username, password
define('DB_HOST', 'localhost');
define('DB_NAME', 'money_wallet');
define('DB_USER', 'root');
define('DB_PASS', '');


Place the project in your web-server root

Example local: /var/www/html/money-wise

XAMPP Windows: C:\xampp\htdocs\Money-Wise

Open in browser

http://localhost/money-wise
