# PHP MVC Example (DDEV + MySQL)

This is a simple **PHP MVC application** running on **DDEV** with **MySQL**, demonstrating:

- MVC project structure
- REST API (`/api/users`, `/api/users/{id}`)
- Form-based Authentication
- Database connection via PDO wrapper

---

## 🚀 Project Structure

project-root/
│
├── public/ # Public web root (entry point)
│ └── index.php
│
├── src/
│ ├── Controllers/ # Controllers (Home, API, Auth)
│ ├── Models/ # Models (User.php)
│ ├── Views/ # Views (home.php, login.php, etc.)
│ ├── Database/ # DB connection (Connection.php)
│ └── Helpers/ # Helper classes (Auth.php)
│
├── composer.json # Dependencies
└── README.md # Project documentation


---

## ⚙️ Requirements

- [DDEV](https://ddev.readthedocs.io/en/stable/)
- PHP 8.1+
- MySQL

---

## 📦 Installation

1. Start the DDEV project:

```bash
ddev start
