# Guestbook_PHP

This project is made via `composer create-project codeigniter4/appstarter`
(P.S. I removed the vendor folder before zipping my project folder since it's just too huge)

Features:
- Create, update, and delete functionality to manage guestbook entries with ease.
- Extremely basic ass styling.


Installation
-------------
1.`composer create-project codeigniter4/appstarter` then `composer update` whenever
there is a new release of the framework.

2. Set CI_ENVIRONMENT to development:
```bash
# .env file
CI_ENVIRONMENT = development
```

3. Configure Database.php accordingly:
```bash
'hostname'     => 'localhost',
'username'     => 'root',
'password'     => '', (your password goes here)
'database'     => 'guestbook',
'DBDriver'     => 'MySQLi',
```

4. Run development server:
```bash
php spark serve
```

5. Open in browser http://localhost:8080/
