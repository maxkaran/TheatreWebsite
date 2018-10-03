# TheatreWebsite
Simple website that utilizes a MySQL database

This is a group project that was to implement a website with PHP that used a MySQL backend database.
The website is a mockup of a movie theatre companies site, which has two types of users. Admins who can edit the database, and users who can purchase tickets and leave reviews for films

### Apologies 
Let's get this out of the way, this is very poorly structured. There is no file structure or organization for the php files and the names have no conventions. ***This is very bad.***
Regardless, I will leave the code up as is, because it does work.
To run it you need to install XAMPP and run the Apache server and MySQL instance. In your browser you can navigate to http://localhost/phpmyadmin/ and run the .ddl files to generate the database.
Then navigate to the root folder of the project directory in your browser and you should land on the login page.

# User Guide
## Login Page
The index page for the website is a login page. Both admins and regular users access their accounts through this page. It is simple enough to use, login with the email and password linked to your account. If the login information is valid, it will redirect you to the either the admin control panel (if this is an admin account) or the account home page (if it is a regular user account). If the information is incorrect, they will be given the option to try again, or go to the register page.

![image](https://user-images.githubusercontent.com/32376872/46436452-d588d800-c726-11e8-9d20-d5bcdd4d8579.png)
## User Home Page
This is the hub for all the functions of a user account. They can choose a theatre complex here to see what movies are playing. Upon selecting a movie, they can purchase tickets for it or leave a review for the movie (as seen on the right).
They can also edit profile details or view the purchases they have made and cancel them by clicking the links on the bottom of the page.

![image](https://user-images.githubusercontent.com/32376872/46436490-eafe0200-c726-11e8-90e6-cf9ee97c60cc.png) ![image](https://user-images.githubusercontent.com/32376872/46436503-f5b89700-c726-11e8-8939-6546e2ca4d33.png)

## Control Panel
Here we can see all the options an admin has to handle data in the theatre. At the bottom of the page, above the logout button is also dynamically generated text that tells the admin the currently most popular movie and most popular theatre complex. 
List accounts will list all user accounts and allow the admin to delete them as well.
Theatre Complexes (the page is displayed below) displays all theatre complexes and data, while also allowing the admin to edit the data as well. There is also a button that lets them view the theatres in each complex and edit that data as well.
Finally, edit movies is similar to theatre complexes in that it will allow an admin to edit current movies, add new movies and also add showtimes at different theatres for those movies.

![image](https://user-images.githubusercontent.com/32376872/46436520-0537e000-c727-11e8-9685-5c06dbcbe9ee.png)

![image](https://user-images.githubusercontent.com/32376872/46436549-1680ec80-c727-11e8-8628-c477346be233.png)

## Register Page
This page allows a user to register account. It is straightforward, fill in the fields. A field is mandatory if it has a * symbol by the name (these are the not null fields in the database).

![image](https://user-images.githubusercontent.com/32376872/46436556-1a147380-c727-11e8-8783-c8344631d57f.png)
