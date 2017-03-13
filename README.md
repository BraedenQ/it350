IT350 Project

You need to use the test.sql file to load the sample database that I created.
You can do this by running 'mysql -u <user> -p < test.dump


Then you need to move all of these folders into your web root. Probably /var/www/html.
You may or may not need to change the owner.

If you used a different user and password when setting up the database you will need to edit application/config/database.php and change the username and password.
