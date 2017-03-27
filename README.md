IT350 Project


NOTE!
You need to update your database now becuase I switched it over to the database we will be using. Also it directs you to the login page first. In order for the application to work correctly you will need to go to clinic.com/index.php or localhost/index.php






You need to use the test.sql file to load the sample database that I created.
You can do this by running 'mysql -u root -p test < test.sql

You will also need to add the line '127.0.0.1       clinic.com' to your /etc/hosts file.

Then you need to move all of these folders into your web root. Probably /var/www/html.
You may or may not need to change the owner.

If you used a different user and password when setting up the database you will need to edit application/config/database.php and change the username and password.

When your done you should be able to go to http://www.clinic.com/index.php/clinic/ and see the sample page I setup.


Testing git
