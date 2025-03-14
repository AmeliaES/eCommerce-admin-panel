# Admin panel for an eCommerce shop


## Task description

"Create an admin panel for an eCommerce shop using PHP and a MySQL database. The goal is to implement basic CRUD (Create, Read, Update, Delete) functionality for managing product records within the database.

- Organise your challenge into clear files and folders.
- Include SQL queries in your PHP scripts for database operations (e.g., INSERT, SELECT, UPDATE, DELETE).
- Ensure proper error handling and validation (e.g., form validation for required fields).
- Use structured and readable code with comments where necessary.
- Test your admin panel thoroughly to ensure all CRUD operations are working correctly.
- Feel free to extend the challenge with extra features to showcase your skills."

## Directory structure

```
.
├── .githooks
│   └── post-commit
├── .gitignore
├── README.md
├── includes
│   └── database.php
├── public
│   ├── assets
│   │   └── images
│   │       ├── blue_tshirt.png
│   │       ├── red_tshirt.png
│   │       └── yellow_tshirt.png
│   ├── create.php
│   ├── delete.php
│   ├── index.php
│   ├── read.php
│   └── update.php
├── sql
│   └── create_tables.sql
└── templates
    ├── footer.php
    └── nav.php
```

- `sql/` contains the code used to create the initial SQL database and tables, which are empty.
-  `includes/` contains the PHP code to connect to the SQL database.
- `templates/` contains PHP code for the navigation bar and footer, which are used on all pages.
- `public/` contains all the pages browsed by the application. It also includes a subfolder for images where images for the items can be uploaded to select from when creating or updating an item.


## Set up git hooks - post commit 
This ensures the files are copied to the web server at XAMPP, so we don't have to manually do this. Certain file types and folders are ignored for transfer. eg. the `sql/` folder is not copied. I wasn't sure where to put the SQL scripts to initially make the database in phpMyAdmin but wanted to make sure they are git tracked.

`SOURCE_DIR` and `TARGET_DIR` will need changing. Better practice would be to put this in a `.env` file perhaps, or a `.config` file. So that this project can run on different computers more easily.

To configure the git hook run:
```
git config core.hooksPath .githooks
```

## Things I learnt

- I had to edit `xamppfiles/etc/php.ini` and change `display_errors = Off` to `display_errors =  On`. For PHP errors to print in the browser. The handy FAQ documentation at `localhost/dashboard` helped with finding the location of all the config files.

- `mysqli_real_escape_string` escapes any special characters, this can only partly help against SQL injection. The best way to prevent SQL injection is to use prepared statements or if that is not possible then use a strict whitelist (ie. a list of trusted values that can be matched against the entry).

- Difference between `isset()` and `empty()`. `empty()` returns true for values like 0, “0”, false, NULL, empty arrays, empty strings, or if the variable is not set. `isset()` returns true if the variable has a value other than NULL, and false if it’s unset or NULL. This meant we could not use "0" as `item_name` in `create.php`.
