Stronnica online bookstore
=============================
It is a online bookstore with whole backend and database. 
Frontend demo: https://ebi2626.github.io/stronnica/

About website possibilities
-------------------------------
- Making orders for books
- Adding/deleting positions to the shopping cart
- Making account (registration)
- Loggin in
- Setting up a profile picture
- Editing data in a profile
- Checking status of an order
- Checking the history of orders
- Full responsivity

Tech stack
---------------
- PHP
- MySql
- HTML5
- CSS3
- SCSS(Sass)
- JavaScript
- Webpack
- Git
- XAMPP

Installation
----------------
1. Install XAMPP from here: https://www.apachefriends.org/pl/index.html (It is necessary to run PHP and MySql) 
2. Install Node and npm from here: https://nodejs.org/en/
2. Download and unpack this repository to xampp/htdocs
3. Run XAMPP with MySql and Apache
4. Open in your browser: localhost:3000/phpMyAdmin/
5. Create a new database and import "ksiegarnia.sql" from the current folder
6. Open a console in the current folder and write command "npm build"
7. Open in your browser: localhost:3000/stronnica/
8. Enjoy

About the project
---------------------
The main target of this project was to discover how the web works from database to view on the client-side. During work on it, I made many mistakes and I wrote many lines of anti-pattern code. Despite these dark sides and many really bad way resolved problems, I have learned from it a lot.
During work on this project I learned how to deal with:
- problems with connection to DB
- MySql DB mechanism
- problems with logging and registration systems
- security issues (serializing, hashing, closing connections)
- advanced configure of webpack
- writing backend in PHP
- use global variables in PHP
- creating files and editing them from the code
- communicate between JS and PHP
- managing structure of a big website

About current issue
---------------------
- My project is unfinished, because of the problem which I created because of my lack of experience in combining JS and PHP. During planning the shopping cart I decided to make it as a file with txt extends in order to avoid losing information during end of the session. Unfortunately, I made mechanism to sum the same products in one line on the client-side and that makes hard to get information about a number of products on the server-side. That makes impossible to pass through all buying path and make an order.
- The project was an experiment with PHP which I hadn't known when I was starting to work on it. Some ideas of PHP usage I get from WordPress files but my creativity in combination with lack of experience and knowledge resulted in the mess in files and structure of pages. Despite my spaghetti code and many antipatterns which I am currently awarned, I still find this project as a value because of the knowledge which I received thanks to it.
