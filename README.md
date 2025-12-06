# Money-Wise

A simple personal finance / expense tracker web application built with PHP, JavaScript and Tailwind CSS — helping you manage incomes and expenses and track your financial health.

## 📋 Table of Contents

- [About](#about)  
- [Features](#features)   
- [Getting Started](#getting-started)  
  - [Prerequisites](#prerequisites)  
  - [Installation](#installation)  

## About

Money-Wise is a lightweight finance management tool designed for individuals who want a simple and self-hosted solution to track incomes and expenses.  
It’s built using PHP for server-side logic, with JavaScript and Tailwind CSS for front-end — no heavy frameworks, easy to deploy.  
The goal is to keep things minimal yet functional, making it easy to understand, customize, and run on any standard PHP-capable environment.

## Features

- Add, edit and delete income entries  
- Add, edit and delete expense entries  
- View income, expense, and balance summaries  
- Simple, clean and responsive UI with Tailwind CSS  

## Getting Started

### Prerequisites

- A web server capable of running PHP (e.g. Apache, Nginx)  
- PHP (version 7.x or higher recommended)  
- A MySQL (or compatible) database server  
- Browser for accessing the web interface  

### Installation

```bash
# 1. Clone the repo
git clone https://github.com/WalidElmiloudi/Money-Wise.git

# 2. Import the database schema
mysql -u YOUR_DB_USER -p YOUR_DB_NAME < db.sql

# 3. Configure database credentials
#    Edit `config.php` and set DB host, name, user, password.

# 4. Place project in your web-server root
#    e.g., /var/www/html/money-wise or your local development folder

# 5. Open in browser
#    Visit http://localhost/money-wise (or your server URL)
