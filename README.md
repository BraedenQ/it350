IT350 Project

You need to use the test.sql file to load the sample database that I created.
You can do this by running 'mysql -uroot -p < test.sql

You will also need to add the line '127.0.0.1       clinic.com' to your /etc/hosts file.

Then you need to move all of these folders into your web root. Probably /var/www/html.
You may or may not need to change the owner.

If you used a different user and password when setting up the database you will need to edit application/config/database.php and change the username and password.

When your done you should be able to go to http://www.clinic.com/index.php/clinic/ and see the sample page I setup.
