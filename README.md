# Database Form

PHP example demonstrating how to post form data into a MySQL database and display it.

**NOTE**: This is only one of many methods one may want to architect this functionality. Please research further sources to see whether this example fully suits your needs.

## Requirements

* PHP ~v5.6+
  * PDO extension enabled
* MySQL ~v5.6+

**NOTE**: These are the versions the example has been tested with.

## Setup

* Configure `config.php` to meet your own mysql connection parameters.
* Create a database with the same name as the constant `DB` (default: **php-db-form**) in `config.php` and import `database.sql` to it.

## How it works ?

This is easy. The `index.php` connects to the database and loads all emails within the table `emails` and displays them.
Additionally, there is an input field, where new emails can be appended to the `emails` table.

When a new email is added, the form is submitted to `actions.php` where the action `add` is mapped to connect to the database and insert a new email in the `emails` table.
If an error occurs, then the script redirects back to `index.php` with an `error` GET parameter, containing an error message.

## Troubleshooting

If you are having any troubles ( with this example 😜 ), please create an issue here on GitHub.

## Licence

[The BSD 3-Clause License](https://opensource.org/licenses/BSD-3-Clause) (BSD-3-Clause)
