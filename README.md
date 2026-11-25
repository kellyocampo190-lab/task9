# task9

Homework 9 for Web Application Design. This Laravel 7 project moves the three [Flor Arte views from Activity 11](https://github.com/kellyocampo190-lab/menus) into an AdminLTE 3.2 admin panel.

| Sidebar link | URL | What it shows |
| --- | --- | --- |
| Overview | `/` | Three orders, six arrangements, one order ready for pickup, and the first pickup of the day. |
| Orders | `/orders` | The order number, arrangement, quantity, and preparation status of each order. |
| Pickups | `/pickups` | Each pickup time, arrangement, and order number, in chronological order. |

The three views reuse the same sample orders for November 7, 2026. The shared Blade layout highlights the active link and displays the Activity 11 author and course in the footer. The menu button collapses the sidebar on desktop and opens it on mobile.

## Run locally

Use PHP 7.4 with Composer, Node.js 22.9+, and PostgreSQL. Create an empty database with `createdb flor_arte_task9`, or create it in your PostgreSQL administration tool.

In one terminal, start the Express API and build React:

```sh
cd studio
npm ci
cp .env.example .env
# Set DATABASE_URL in studio/.env to your PostgreSQL connection string.
npm run db:setup
npm run build
npm start
```

In a second terminal, from the Laravel project root:

```sh
composer install
cp .env.example .env
php artisan key:generate
php artisan serve
```

Open http://127.0.0.1:8000. Laravel serves the Blade views and forwards the browser’s same-origin `/api/studio` request to the Express service on port 18736. If you change that port, set the Laravel `STUDIO_API_URL` accordingly.

## Application architecture

React renders the summary, order rows, and pickup entries inside the inherited Blade views. The Express endpoint invokes an application use case that depends on a repository interface. The PostgreSQL adapter reads the orders by pickup time. The domain calculates totals for the overview from those same records. The backend entry point wires the dependencies together. The seed script is safe to run more than once.

## AdminLTE integration

The layout in `resources/views/layouts/studio.blade.php` loads the distribution CSS and JavaScript for AdminLTE 3.2.0 alongside jQuery 3.7.1 and the Bootstrap 4.6.2 JS bundle. The files and their licenses are included in `public/vendor/`, so the running panel does not need a CDN. The studio styles are in `public/css/studio.css`.

Only the top bar with the menu button, the three-link sidebar, the content area, and the shared footer are used. The dashboard examples, user panel, charts, messages, and notifications are omitted.

The three child templates are in `resources/views/studio/`. Routes are defined in `routes/web.php`, and Express supplies the same PostgreSQL-backed records as the Activity 11 project.
