# 🌐 The Digital Hub Website

[![Laravel](https://img.shields.io/badge/Laravel-12.x-red?logo=laravel)](https://laravel.com/)
[![TailwindCSS](https://img.shields.io/badge/TailwindCSS-3.x-38B2AC?logo=tailwind-css)](https://tailwindcss.com/)
[![PHP](https://img.shields.io/badge/PHP-8.2-blue?logo=php)](https://www.php.net/)
[![MySQL](https://img.shields.io/badge/MySQL-8.0-orange?logo=mysql)](https://www.mysql.com/)
[![License](https://img.shields.io/badge/License-MIT-green.svg)](LICENSE)

A **full-stack web application** for managing the Digital Hub platform, built with **Laravel 12**, **Tailwind CSS**, and **Blade templates**.  
The dashboard enables administrators to manage users, roles, teams, workshops, programs, sponsors, FAQs, offers, and site content efficiently.  

---

## 📸 Screenshots


![Home Page](https://i.imgur.com/knmBpFZ.png)
![Login Page](https://i.imgur.com/U1K6grU.png)

### 🧭 Dashboard Examples
![User Management](https://i.imgur.com/BF0dZo4.png)
![Programs Management](https://i.imgur.com/SFB5kbl.png)




---


## ✨ Features

✅ **User Management**
- Add, edit, and delete users  
- Assign and manage roles (`Admin`, `Editor`)  
- Dropdown-style role management  

✅ **Programs & Workshops**
- Manage educational programs and workshops  

✅ **Teams**
- Add team members with roles and images  

✅ **Sponsors**
- Manage sponsors and partners  

✅ **Footer Management**
- Edit and view footer content directly from the dashboard  

✅ **FAQs & Offers**
- Add and manage FAQs and promotional offers  

✅ **Sliders**
- Manage homepage sliders with lazy-loaded images  

✅ **Contact Messages**
- View contact form messages with timestamps  

✅ **Performance**
- Lazy loading enabled for images  
- Optimized database queries  
- Clean and reusable Blade templates  

---

## 🛠️ Tech Stack

- **Backend:** Laravel 12, PHP 8.2+
- **Frontend:** Tailwind CSS, Blade, Alpine.js (optional)
- **Database:** MySQL
- **Authentication:** Laravel Breeze / Spatie Permissions
- **Icons:** Font Awesome
- **Version Control:** Git / GitHub

---

## 🚀 Getting Started

### Prerequisites
- PHP >= 8.2  
- Composer >= 2.x  
- Node.js & NPM  
- MySQL >= 8.0  

### Installation

```bash
# Clone repository
git clone git@github.com:yourusername/digital-hub.git
cd digital-hub

# Install PHP dependencies
composer install

# Install JS dependencies
npm install && npm run build

# Configure environment
cp .env.example .env
php artisan key:generate
