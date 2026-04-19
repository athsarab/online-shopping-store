### Import database (XAMPP / phpMyAdmin)

1. Open `http://localhost/phpmyadmin`
2. Create database named `sample` (or let the SQL do it)
3. Go to **Import** → choose `admin_panel/DB/sample.sql` → **Go**

### If you got error #1071 (key too long)

This happens on some MySQL/MariaDB setups with `utf8mb4` + older index limits.
`sample.sql` uses `VARCHAR(191)` for indexed columns to avoid it.

If you already partially imported before the fix, delete the failed table(s) and re-import:
- In phpMyAdmin → database `sample` → **Structure** → drop `users` (or drop the whole DB `sample`)
- Import `admin_panel/DB/sample.sql` again

### If you got error #1067 (invalid default value)

Some MySQL/MariaDB versions don’t allow `DATE DEFAULT CURRENT_TIMESTAMP`.
`sample.sql` uses `TIMESTAMP DEFAULT CURRENT_TIMESTAMP` for `orders.order_date` and `product.uploaded_date`.

If you already partially imported before the fix, drop the failed table(s) (`orders`, `product`) or drop the whole DB and re-import.

### Configure code

- Admin panel DB config: `admin_panel/config/dbconnect.php` uses database `sample`
- Storefront PHP pages also use database `sample`

If you want to use a different database name, change it in those files.
