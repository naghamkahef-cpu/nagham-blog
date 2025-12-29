# Blog (Laravel Blade)

A simple blog web application built with Laravel and Blade.
The project includes a custom-built UI, authentication using Laravel Fortify, and a clean posts browsing experience.

## Features
- Welcome page
- Authentication using **Laravel Fortify**
  - Login
  - Register
- Posts listing with pagination
- Author profile page:
  - Displays author information and profile image
  - Lists all posts published by the author
  - Clicking a post title navigates to the post details page
- Post details page
- **Me** page (from the navbar):
  - View personal profile information
  - View all posts created by the logged-in user
  - Edit profile information
  - Edit and manage own posts
- Shared layout with navbar and footer
- Fully custom Blade views (no pre-built templates)

## Tech Stack
- Laravel (Blade)
- Laravel Fortify (Authentication)
- Custom CSS (public/css)
- MySQL / SQLite

## Main Pages
- `/` Welcome page
- Authentication pages (Login / Register)
- Posts list with pagination
- Author profile page
- Post details page
- `/me` User profile and posts management

## Project Structure
- `resources/views` Blade templates
- `resources/views/layouts` Shared layout
- `resources/views/partials` Navbar and footer
- `public/css` Custom styles
- `routes/web.php` Web routes
- `app/Http/Controllers` Controllers
- `app/Models` Models
- `database/migrations` Migrations

## Notes
- The `.env` file is not included in the repository for security reasons.
- `vendor/` and `node_modules/` are excluded via `.gitignore`.
