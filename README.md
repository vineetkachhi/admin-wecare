# We Care India - Laravel Admin Panel

A complete Laravel admin panel with authentication, category management, product management, and FAQ management.

## Features

✅ **User Authentication** - Login system with email verification
✅ **Dashboard** - Overview of all management modules with statistics
✅ **Category Management** - Add, edit, delete categories with slug and status
✅ **Product Management** - Manage products with category, image upload, descriptions
✅ **FAQ Management** - Manage frequently asked questions with status control
✅ **Admin Seeder** - Pre-seeded admin user (admin@gmail.com / admin)

## System Requirements

- PHP 8.2 or higher
- Composer
- MySQL or SQLite
- Node.js (for frontend assets)

## Installation

1. **Navigate to project directory:**

```bash
cd c:\xampp\htdocs\wecareindia\testing
```

2. **Install dependencies:**

```bash
composer install
npm install
```

3. **Build assets:**

```bash
npm run build
```

4. **Run migrations:**

```bash
php artisan migrate
```

5. **Seed the database with admin user:**

```bash
php artisan db:seed --class=AdminSeeder
```

## Running the Application

Start the development server:

```bash
php artisan serve
```

The application will be available at `http://127.0.0.1:8000`

## Default Admin Credentials

- **Email:** admin@gmail.com
- **Password:** admin

## Features Overview

### Dashboard

- Quick overview of total categories, products, and FAQs
- Quick access buttons for adding new items
- Real-time statistics

### Category Management

- View all categories
- Add new category with name, slug, and status
- Edit existing categories
- Delete categories (with cascade delete for products)
- Status toggle (active/inactive)

### Product Management

- View all products with their categories
- Add products with category, name, slug, descriptions, image, and status
- Edit product details
- Delete products (removes image from storage)
- Filter by status

### FAQ Management

- View all FAQs
- Add FAQ with name, description, and status
- Edit FAQ content
- Delete FAQs
- Status control

## Database Structure

- **Categories**: category_name, slug (unique), status
- **Products**: category_id (FK), product_name, slug (unique), short_description, long_description, image, status
- **FAQs**: name, description, status

## Login Instructions

1. Open http://127.0.0.1:8000
2. Click on Login
3. Enter email: `admin@gmail.com`
4. Enter password: `admin`
5. Click Login

After login, you'll be redirected to the Dashboard where you can:

- Click "Categories" menu to manage categories
- Click "Products" menu to manage products
- Click "FAQs" menu to manage FAQs
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
  </p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework. You can also check out [Laravel Learn](https://laravel.com/learn), where you will be guided through building a modern Laravel application.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Redberry](https://redberry.international/laravel-development)**
- **[Active Logic](https://activelogic.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
