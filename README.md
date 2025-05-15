
# 🐾 Pet Care Management Website in Da Nang

A web platform that allows users to easily search, schedule, and use pet care services, while also providing tools for shop owners, staff, and admins to manage operations efficiently.

## 📋 Project Purpose

Nowadays, finding and using online pet care services can be challenging. This project aims to:
- Help users easily access and book pet care services.
- Streamline service booking and staff task management.
- Connect customers with pet care shops in Da Nang.

## 👥 System Actors

1. **Guest**
   - Register as member / shop owner
   - View services and shops

2. **Member**
   - Login / Logout / Change password
   - Update personal information
   - Book and update service appointments

3. **Shop Owner**
   - Manage personal information
   - Create and update services
   - Approve bookings
   - Manage staff accounts

4. **Staff**
   - Login
   - View assigned tasks
   - Confirm task completion

5. **Administrator**
   - Approve registration requests
   - Manage service categories
   - Confirm payments
   - Manage all accounts

## 🛠️ Technologies Used

- **Languages:** PHP (Laravel Framework), JavaScript, jQuery  
- **Frontend:** Bootstrap  
- **Database:** MySQL

## ⚙️ Installation & Running the Project

```bash
# Clone project
git clone https://github.com/yourusername/pet-care-website.git
cd pet-care-website

# Install Laravel dependencies
composer install

# Install frontend packages (if applicable)
npm install && npm run dev

# Create .env file
cp .env.example .env

# Generate application key
php artisan key:generate

# Create database & run migrations
php artisan migrate

# Start development server
php artisan serve
```

## 📷 Demo

![image](https://github.com/user-attachments/assets/68b02f61-d2f6-471f-be56-c58e507b5e38)


## 📌 Notes

- Make sure to configure the MySQL database credentials in the `.env` file.
- Recommended to use XAMPP/Laragon/Valet for PHP development environment.

## 📄 License

This project is for educational purposes only.
