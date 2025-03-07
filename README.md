# Admin panel for an eCommerce shop


## Challenge description

"In this challenge, you are tasked with creating an admin panel for an eCommerce shop using PHP and a MySQL database. The goal is to implement basic CRUD (Create, Read, Update, Delete) functionality for managing product records within the database.

- Organise your challenge into clear files and folders.
- Include SQL queries in your PHP scripts for database operations (e.g., INSERT, SELECT, UPDATE, DELETE).
- Ensure proper error handling and validation (e.g., form validation for required fields).
- Use structured and readable code with comments where necessary.
- Test your admin panel thoroughly to ensure all CRUD operations are working correctly.
- Feel free to extend the challenge with extra features to showcase your skills."


## Set up git hooks - post commit 
This ensures the files are copied to the web server at XAMPP, so we don't have to manually do this. Certain file types and folders are ignored for transfer. eg. the `.sql/` folder is not copied. I wasn't sure where to put the SQL scripts to initially make the database in phpMyAdmin but wanted to make sure they are git tracked.

To configure the git hook run:
```
git config core.hooksPath .githooks
```

## Getting started

- I had to edit `xamppfiles/etc/php.ini` and change `display_errors = Off` to `display_errors =  On`. For PHP errors to print in the browser.

