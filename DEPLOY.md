# WordPress → GitHub + Render

This repository is prepared for Docker-based WordPress hosting on Render.

## 1. GitHub
Create a new GitHub repository and upload all files in this folder. Do **not** upload `bank.sql` or any `.env` file.

## 2. Render MySQL
Render supports deploying MySQL as a private service with persistent storage. Create the Render MySQL template/service first.

Use:
- MySQL 8
- Database: `bank`
- User: `wordpress`
- A strong password
- Persistent disk mounted at `/var/lib/mysql`

The MySQL service's internal hostname is normally the service name, for example `mysql:3306`.

## 3. Import the supplied `bank.sql`
Use the Render MySQL service shell (or another machine that can reach the database) to import the supplied SQL dump. The dump creates the `wp_` tables and already contains the WordPress site data.

Example:
```bash
mysql -h 127.0.0.1 -u wordpress -p bank < bank.sql
```

If importing from another service, replace the host with the MySQL private hostname.

## 4. Render Web Service
Create a new **Web Service** from the GitHub repository.

Runtime: Docker
Port: `10000`
Health check: `/`

Environment variables:
```text
DB_NAME=bank
DB_USER=wordpress
DB_PASSWORD=<your MySQL password>
DB_HOST=<your MySQL private hostname>:3306
WP_HOME=https://<your-render-service>.onrender.com
WP_SITEURL=https://<your-render-service>.onrender.com
```

## 5. Persistent uploads
Render filesystems are ephemeral by default. If the WordPress site will receive uploads after deployment, attach a persistent disk to the web service and use a suitable mount path for `wp-content/uploads`.

## 6. Important: old local URL
The supplied SQL dump currently contains:
`http://localhost/webdesign`

After the database is imported, replace the `siteurl` and `home` values in `wp_options` with the final Render URL, or use WP-CLI/search-replace. If the site contains hard-coded `localhost/webdesign` URLs inside post content/theme settings, those also need replacement.

## 7. First login
Use the existing WordPress user from the imported database. If you do not know its password, reset it through WordPress/MySQL after the site is online.
