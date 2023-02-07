# Online shopping app created by Aladin. 
## How to use?
- Clone repo to your PC.
- Install the Composer inside the project directory with autoloader namespace set to `"OnlineShopping\\": "src/"`
- Create a database called *"online_shopping_app"*
- Set up the /connection/connection.php file with your own credentials
- Inside the folder "db" run the following command using bash: `php run-db.php`
- If database and tables created successfully, you can now use the application as you want, inserting and modifying data, shopping, checking out and viewing previous orders.
- You can also import some placeholder products with */db/products.csv*

## App description
This application was created using the PHP - Object oriented style. The pattern used in this application is the Factory/Repository pattern.
The files are split into folders based on their role, database and business relations.
Application is starting up with src/App.php and I used Composer for autoloader/namespaces.

PHP version: 8.x

Composer.json "requires": 
- ext-pdo
- ext-readline