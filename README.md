# Sports Shop eCommerce Website

Welcome to the Sports Shop eCommerce website! This Laravel application allows users to browse, purchase sports equipment, add items to their cart, and securely checkout using Razorpay. Additionally, the website features an admin panel for managing products, categories, and orders.

## Features

- Browse through a wide range of sports equipment.
- Add items to the shopping cart for later purchase.
- Checkout securely using Razorpay payment gateway.
- Search for specific products by category.
- Contact us page for any queries or support.
- About us page to learn more about our company.
- Admin panel for managing products, categories, and orders.

## Prerequisites

- PHP >= 7.3
- Composer
- MySQL or any other relational database supported by Laravel

## Installation

1. Clone the repository to your local machine:   git clone <repository_url>

2. Navigate to the project directory: cd sportsshop

3. Install Composer dependencies: composer install

4. Generate an application key: php artisan key:generate

5. Configure the database connection in the `.env` file:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_database_username
DB_PASSWORD=your_database_password


7. Run database migrations and seeders: php artisan migrate --seed


8. Obtain API keys from Razorpay and update them in the `.env` file: 
 RAZORPAY_KEY=your_razorpay_key
RAZORPAY_SECRET=your_razorpay_secret


9. Serve the application: php artisan serve


10. Access the website in your browser at `http://localhost:8000`.

## Admin Panel

To access the admin panel:
- Navigate to `/admin`.
- Log in using your admin credentials.
- Here you can manage products, categories, and orders.

## Folder Structure

- `app`: Contains application logic including controllers, models, and middleware.
- `config`: Contains configuration files for database connection and other settings.
- `database`: Contains migrations and seeders.
- `public`: Contains static assets such as images, CSS, and client-side JavaScript.
- `resources`: Contains views, language files, and other resources.
- `routes`: Contains route definitions.
- `tests`: Contains PHPUnit tests.
- `vendor`: Contains Composer dependencies.

## Contributing

Contributions are welcome! If you find any issues or have suggestions for improvements, feel free to open an issue or create a pull request.





