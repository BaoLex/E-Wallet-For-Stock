# E-Wallet for Stock Management

## Overview
This project is an **E-Wallet for Stock** system built using **PHP** and **XAMPP**. It allows users to manage their wallet balance, deposit, withdrawal and monitor transactions in a simple web-based interface.

## Features
- User authentication (Login/Registration)
- Wallet balance management
- Account balance management
- Tracking feature management
- Transaction history
- Admin dashboard for managing users

## Technologies Used
- **Backend**: PHP (Core PHP, MySQL)
- **Frontend**: HTML, CSS, JavaScript, Bootstrap
- **Database**: MySQL (via phpMyAdmin in XAMPP)
- **Server**: Apache (XAMPP)

## Installation Guide
1. **Download & Install XAMPP**
   - [Download XAMPP](https://www.apachefriends.org/index.html)
2. **Clone the Repository**
   ```bash
   git clone https://github.com/your-repo/e-wallet-stock.git
   ```
3. **Move Project to XAMPP Directory**
   - Copy the project folder to `htdocs` (e.g., `C:\xampp\htdocs\e-wallet-stock`)
4. **Create Database**
   - Open phpMyAdmin (`http://localhost/phpmyadmin`)
   - Create a database named `ewallet_stock`
   - Import `database.sql` from the project folder
5. **Configure Database Connection**
   - Edit `config.php`
   ```php
   $servername = "localhost";
   $username = "root";
   $password = "";
   $dbname = "mydb";
   ```
6. **Start Apache & MySQL** in XAMPP
7. **Run the Application**
   - Open browser and go to `http://localhost/e-wallet-stock`

## Usage
1. Register/Login as a user
2. Deposit and withdraw to your e-wallet
3. Buy/Sell feature and track transactions
4. View transaction history

