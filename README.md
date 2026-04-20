# KIYARAA — Online Shopping Store (PHP + MySQL)

A PHP/MySQL clothing store web app (storefront + admin panel) designed to run on XAMPP.

This repo contains:
- **Storefront**: product pages, cart sidebar, login/signup, contact, checkout form.
- **Admin panel**: manage categories, products, sizes/variations, and view orders.

---

## Tech Stack

- **Backend**: PHP (procedural)
- **Database**: MySQL / MariaDB (tested on XAMPP via phpMyAdmin)
- **Frontend**: HTML, CSS, Vanilla JavaScript
- **Icons/UI**:
  - Boxicons (storefront)
  - Bootstrap 4 + Font Awesome (admin panel)

---

## Key Features

### Storefront
- Responsive **modern navbar** (mobile toggle + active link highlighting)
- **Cart sidebar** (opens from header cart icon; persists with `localStorage`)
- Signup/login
  - Uses `password_hash()` on signup
  - Uses `password_verify()` on login
- Contact form (messages saved to DB)
- Checkout form (saves billing/shipping details to DB)
- Footer improvements
  - Auto-updating year
  - Back-to-top button

### Admin Panel
- Dashboard (counts for users/categories/products/orders)
- Category management
- Product management
- Size + product-variation stock management
- Order views and status updates (based on DB schema)

---

## Project Structure (high level)

- `index.php` — Web root entry (redirects to `PHP/index.php`)
- `.htaccess` — Disables directory listing, sets `DirectoryIndex`

### Storefront
- `PHP/` — storefront pages and controllers
- `CSS/` — storefront styles
- `JS/` — storefront scripts
- `PICS/` — storefront images

### Admin Panel
- `admin_panel/` — admin dashboard
- `admin_panel/config/dbconnect.php` — admin DB connection
- `admin_panel/controller/` — admin CRUD controllers
- `admin_panel/adminView/` — admin UI pages
- `admin_panel/DB/sample.sql` — database schema

---

## Setup (Windows + XAMPP)

### 1) Install / Start Services
1. Install **XAMPP**
2. Start **Apache** and **MySQL** from XAMPP control panel

### 2) Put the Project in htdocs
Place the folder here:

```
C:\xampp\htdocs\online-shopping-store
```

### 3) Import the Database
1. Open phpMyAdmin:
   - `http://localhost/phpmyadmin`
2. Import the schema:
   - Import file: `admin_panel/DB/sample.sql`
   - Database name: `sample`

See also: `admin_panel/DB/IMPORT_INSTRUCTIONS.md` for common import errors.

### 4) Configure DB Credentials (if needed)
Default config expects XAMPP defaults:
- Host: `localhost`
- User: `root`
- Password: empty
- DB: `sample`

Update these if your local MySQL differs:
- `admin_panel/config/dbconnect.php`
- Some storefront actions also create DB connections inside files in `PHP/`

---

## Run URLs

### Storefront
- Root:
  - `http://localhost/online-shopping-store/`
- Direct storefront entry:
  - `http://localhost/online-shopping-store/PHP/index.php`

### Admin Panel
- `http://localhost/online-shopping-store/admin_panel/index.php`

---

## Creating an Admin User

The `users` table uses `user_type` = `admin` or `user`.

Recommended easiest method:
1. Sign up using the storefront signup page
2. In phpMyAdmin:
   - Open DB `sample` → table `users`
   - Edit your user row and set `user_type` to `admin`
3. Log in again; admin users will be redirected to the admin panel

---

## Cart System (Important Notes)

- The cart is **client-side** and stored in the browser using `localStorage`.
- It is shared across storefront pages in the same browser.
- The cart UI is a **single reusable sidebar** included via the header.

Files:
- `PHP/cartSidebar.php` — cart sidebar markup
- `CSS/cartSidebar.css` — sidebar styling
- `JS/wnew.js` — cart behavior + persistence

---

## Troubleshooting

### “Index of /online-shopping-store” appears
- Ensure `.htaccess` is being applied (Apache must allow overrides).
- On XAMPP, check `httpd.conf` / directory config has `AllowOverride All`.

### MySQL import error #1071 (key too long)
- `sample.sql` uses `VARCHAR(191)` for indexed fields to avoid this.
- Drop the partially created tables (or the whole `sample` DB) and re-import.

### MySQL import error #1067 (invalid default value)
- Some MySQL/MariaDB versions reject `DATE DEFAULT CURRENT_TIMESTAMP`.
- Schema uses `TIMESTAMP DEFAULT CURRENT_TIMESTAMP` in relevant tables.

### Navbar/Footer looks broken or not styled
- Ensure pages include the shared header/footer correctly:
  - `include "header.php";`
  - `include "footer.php";`

---

## Security / Production Notes (Recommended)

This started as a university-style project. Before real deployment, consider:
- Move all DB config into **one shared config file** and include it everywhere
- Use prepared statements consistently for DB access
- Add server-side order creation from cart (current cart is client-side)
- Add CSRF protection for forms
- Restrict admin routes (session checks + redirects)

---

## License

No license is included. Treat as an educational/demo project unless you add a license.
