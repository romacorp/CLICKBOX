# Customer Rating System

A web application built with CodeIgniter 5 for customer consultation and rating.

## Features

- User Authentication (Login/Register)
- Customer Search by Identification Number
- Customer Rating System (1-5 stars)
- Comments System
- Rating History
- Secure Form Validation
- Protection against SQL Injection

## Installation

1. Clone the repository
2. Create a MySQL database named `customer_rating_db`
3. Configure the database connection in `app/Config/Database.php`
4. Run the migrations:
   ```bash
   php spark migrate
   ```
5. Start the development server:
   ```bash
   php spark serve
   ```

## Database Structure

The application uses three main tables:

1. `users`
   - id (Primary Key)
   - username
   - email
   - password
   - created_at
   - updated_at

2. `customers`
   - id (Primary Key)
   - identification_number
   - first_name
   - last_name
   - created_at
   - updated_at

3. `ratings`
   - id (Primary Key)
   - customer_id (Foreign Key)
   - user_id (Foreign Key)
   - rating
   - comment
   - created_at
   - updated_at

## Security Features

- Password Hashing
- CSRF Protection
- Form Validation
- SQL Injection Prevention
- XSS Protection
- Authentication Filter

## Requirements

- PHP 7.4 or higher
- MySQL 5.7 or higher
- CodeIgniter 5
- Composer

## License

MIT License