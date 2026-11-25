# task9

Homework 9 for Web Application Design. This Laravel 7 project moves the three [Flor Arte views from Activity 11](https://github.com/kellyocampo190-lab/menus) into an AdminLTE 3.2 admin panel.

| Sidebar link | URL | What it shows |
| --- | --- | --- |
| Overview | `/` | Three orders, six arrangements, one order ready for pickup, and the first pickup of the day. |
| Orders | `/orders` | The order number, arrangement, quantity, and preparation status of each order. |
| Pickups | `/pickups` | Each pickup time, arrangement, and order number, in chronological order. |

The three views reuse the same sample orders for November 7, 2026. The shared Blade layout highlights the active link and displays the Activity 11 author and course in the footer. The menu button collapses the sidebar on desktop and opens it on mobile.

## Run locally

Use PHP 7.4 and Composer. From the project directory, run:

```sh
composer install
cp .env.example .env
php artisan key:generate
php artisan serve
```

Open http://127.0.0.1:8000. The sample data is defined in the controller. A database and Node.js build are unnecessary for these pages.

## AdminLTE integration

The layout in `resources/views/layouts/studio.blade.php` loads the distribution CSS and JavaScript for AdminLTE 3.2.0 alongside jQuery 3.7.1 and the Bootstrap 4.6.2 JS bundle. The files and their licenses are included in `public/vendor/`, so the running panel does not need a CDN. The studio styles are in `public/css/studio.css`.

Only the top bar with the menu button, the three-link sidebar, the content area, and the shared footer are used. The dashboard examples, user panel, charts, messages, and notifications are omitted.

The three child templates are in `resources/views/studio/`. Routes are defined in `routes/web.php`, and `StudioController` supplies the same data as the Activity 11 project.
